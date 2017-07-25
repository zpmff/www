<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/7/6
 * Time: 22:13
 * url  127.0.0.1/shop/index.php/admin/goods/index
 */

namespace Admin\Controller;
use Component\AdminController;

class GoodsController extends AdminController{

    public  function index(){

//         在这个控制器里实例化，别的模型
//        $qq = new \Model\QqModel();
//        这个是打印的对象的内容，包括model里的连接配置全部打印出来
//        var_dump($qq);

        $goods = D('goods');
//        $result = $goods->select();
//        这个打印的是返回的结果数组
//        var_dump($result);

        //1. $total获得当前记录总条数, $per 每页条数，自己定义
//        $total = $goods->count();
        $sql1 = "select count(*) from sw_goods";
        //query 返回的是一个二维数组
        $tot = $goods->query($sql1);
        $total = $tot[0]['count(*)'];
        var_dump($tot);
        $per = 5;


        //2. 实例化分页类对象 ,think 里 autoload（）自动载入
        $page = new \Component\Page($total,$per);

        //3. 拼装sql获得每页信息
        $sql = "select * from sw_goods ".$page->limit ;
        $info = $goods->query($sql);

        //4. 获得页码列表
        $pagelist = $page->fpage();


        $this->assign('pagelist',$pagelist);
        $this->assign('goods',$info);
        $this->display();
    }


    public  function add(){

        echo __SELF__;
//        add方法，主要是控制兩件事，一件是提交数据库，另外一件就是展示添加表单；主要看post，非空的话，就是添加；为空的话，只是展示。
        if(!empty($_POST)){

            //判断附件是否有上传，如果有，则实例化upload，把附件上传到服务器指定位置
            //然后把附件的路径名获得到，存入post
            if( !empty( $_FILES)){
//                var_dump($_FILES);
                $config = array(
                    'rootPath'      =>  './public/', //保存根路径,根路径./,对应的是index.php对应的目录
                    'savePath'      =>  'Upload/', //保存路径，
                );
                //图片被上传到根目录+保存路径+创建日期目录+文件名
                $upload = new \Think\Upload($config);
//                var_dump($upload);
                //uploadone会返回图片上传后的信息
                $z = $upload->uploadOne($_FILES['goods_img']);

                if(!$z){//调用上传函数后，判断上传是否成功，如果失败，则获取失败信息
                    var_dump($upload->getError());
                }else{
                    var_dump($z);
                    //拼装图片的路径名
                    $bigimg = $z['savepath'].$z['savename'];
                    $data['goods_big_img'] = $bigimg;

                    //把已经上传好的图片，制作缩略图
                    $image = new \Think\Image();
                    //通过路径名找到图像
                    $srcimg = $upload->rootPath.$bigimg ;
                    $image ->open($srcimg);
                    $image ->thumb(150,150);
                    $smallimg = $z['savepath']."small_".$z['savename'];
                    $image->save($upload->rootPath.$smallimg);

                    $data['goods_small_img'] = $smallimg;
                }
            }


            $data['goods_name'] = trim(I('post.goods_name'));
            $data['goods_weight'] = I('post.goods_weight');
            $data['goods_price'] = I('post.goods_price');
            $data['goods_number'] = I('post.goods_number');
            $data['goods_introduce'] = trim(I('post.goods_introduce'));
            $data['goods_create_time'] = time();
//            var_dump($data);

            $goods = D('goods');
            if($goods ->create($data)){
                $result = $goods ->add();
                if($result){
//                    $this->success('添加商品成功',U(index));
                      echo "success";
                }else{
//                    $this->error('添加商品失败');
                    echo "error";
                }
            }else{

            }
//            $this->error($goods->getError());
            echo "error";

        }else{
            $this->display();
        }

    }


    public  function update($id){

//        可以用get拿到数据，不过这么写不太好
//        $id =  I('get.id');

        if(!empty($_POST)){

            $data['goods_name'] = trim(I('post.goods_name'));
            $data['goods_weight'] = I('post.goods_weight');
            $data['goods_price'] = I('post.goods_price');
            $data['goods_number'] = I('post.goods_number');
            $data['goods_introduce'] = trim(I('post.goods_introduce'));
            $data['goods_last_time'] = time();
            $data['goods_id'] =  I('post.goods_id');
            var_dump($data);

            $goods = D('goods');
            if($goods ->create($data)){
                $result = $goods->save();
                if($result){
                    $this->success('修改成功',U(index));
                }else{
                    $this->error('修改失败');
                }
            }else{
                $this->error($goods->getError());
            }


        }else{
            $goods = M('goods');
            $result = $goods ->find($id);
            var_dump($result);

            $this->assign('goods',$result);
            $this->display();
        }



    }

    public function delete($id){

        $goods = M('goods');
        $result = $goods ->delete($id);
        if($result){
            $this->success('删除成功',U(index));
        }else{
            $this->error('删除失败');
        }

    }

    //设置缓存，tp默认是文件缓存,文件位置在 Runtime/temp 中， 键是文件名，值是文件的值;一个键值对，存一个文件
    function  s1(){

        S('name','tom',10);
        S('age',25);
        S('addr','北京');
        S('hobby',array('篮球','棒球','足球 '));
        echo "success";
    }

    //读取缓存
    function s2(){
        echo  S('name');
        echo  S('age');
        echo  S('addr');
        print_r(S('hobby'));
    }

    //删除缓存
    function s3(){
        S('age',null);
        echo 'delete';
    }

    //小的使用，
    function  y1(){
        //外部用户使用的方法
        var_dump($this->y2());
    }


    function  y2(){

        //被其他方法调用获得，获得指定信息
        //第一次从数据库中获得，后续再有效期的缓存里获得

        //先从缓存里取，如果取出来就返回；取不出来，就从数据库中取，取出来后存入缓存
        $info = S('goods_info');
        if($info){
            return $info;
        }else{
            //假的连接数据库
            $dt = 'apple5s'.time();
            S('goods_info',$dt,10);
            return $dt;
        }
    }


}
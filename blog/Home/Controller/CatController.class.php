<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/6/7
 * Time: 23:19
 */
namespace Home\Controller;
use Think\Controller;
use Think\Model;

//http://127.0.0.1/blog/index.php/Home/Cat/index
//后台管理的栏目列表
class CatController extends Controller
{
    public function index()
    {
        $Cat = M('cat');
        $cat = $Cat ->select();
        var_dump($cat); //请求到了，打印出来?

        if($cat){
            $this->assign('cat',$cat);
        }else{
            $this->error('数据错误');
        }
        $this->display();
    }

//    栏目添加的展示页面，对应相应的view的html页面，这里有两个逻辑，一个是展示，一个是完成接收表单数据，插入insert
//    如果没有提交post，则展示列表，提交了的话，完成插入操作
    public function add()
    {
        if(!empty($_POST)){

//           create 是对$_post的验证，所以先过滤一下
            $_POST['catname'] = trim( I('post.catname') );
//        $catname = $_POST['catname']
            var_dump($_POST);
            //        第一种写法，在控制器里判断是否为空
//        if(empty($catname)){
//            exit('栏目不能为空');
//        }

//        第二种写法，在model里控制规则，用thinkphp写法,自动验证，自动添加
//        这个是自动验证，还有手动验证，写到model中，
//            $rules = array(
//                array('catname','require','栏目名称不能为空','',3), // 用户名必须
//                array('catname','','栏目名已经存在',1,'unique',3), // 用户名必须
//            );

            $Cat = D('cat');
//            $data  = getDate() ;
            if($Cat  -> create($data)){
                $result = $Cat ->add();
                if($result){
                    $this->success('cat栏目添加成功','index');
//                    $this->redirect('index','',1);
                }else{
                    $this->error('cat栏目添加失败','index');
                }
            }else{
                $this->error($Cat->getError());
            }
        }else{
            $this->display();
        }

    }



//127.0.0.1/blog/index.php/Home/Cat/catdel/cat_id/1

    public function catdel()
    {
        $cat_id = I('get.cat_id');
        echo $cat_id;

//        如果cat_id不为数字，则栏目错误
        if(!is_numeric($cat_id)){
            $this->error('栏目错误');
        }

//        如果栏目下有文章，则不能删除
        $art = M('art');
        $conditon['cat_id'] = $cat_id;
        $result = $art ->where($conditon)->select();
        if($result){
            $this->error('栏目下有文章，不能删除');
        }

//        查询该栏目是否存在
        $cat = M('cat');
        $conditon['cat_id'] = $cat_id;
        $result1 = $cat ->where($conditon)->select();
        if(!$result1){
            $this->error('栏目不存在');
        }

//        删除栏目,注意where写法，是错误的
//        $result2 = $cat ->where('cat_id = "$cat_id"')->delete();
        $result2 = $cat ->delete($cat_id);
        if(!$result2){
            $this->error('删除失败');
        }else{
            $this->success('删除成功',U('index'));
        }

    }


    //   栏目的编辑页面，完成两个逻辑，无post的话，仅仅是展示所有的原有数据，有post的话，修改数据
    public function catedit($cat_id='1')
    {

        if(!empty($_POST)){
//            post不是空的，修改信息操作update

//            echo $cat_id;
//            var_dump($_POST);
            $_POST['catname'] = trim( I('post.catname') );

            $cat = D('cat');
            if($cat -> create()){
                echo "1";
                $result = $cat ->save($_POST);//关键的id在post中，在html有hidden

                if($result){
//                修改成功，到index页面
//                    $this->redirect('catedit',array('cat_id'=>$cat_id) ,5,'cat内容修改成功');
                    $this->success('cat栏目修改成功',U('index'));

                }else{
//                修改失败，到了原页面,用this->error就行
//                    $this->redirect('',array('id'=>$cat_id) ,5,'cat内容修改成功');
                    $this->error('修改失败');
                }
            }else{
                echo "2";
                $this->error($cat->getError());
            }

        }else{
//      post是空的，完成展示信息
//            cat_id,取得是参数，不用获取，直接有变量的值
//            echo $cat_id;
//            var_dump($_POST);

            //        通过该栏目的id，查找该栏目的信息
            $cat = M('cat');
            $conditon['cat_id'] = $cat_id;
            $result = $cat ->where($conditon)->find();
            var_dump($result);
//        assign 必须在display前面。
            $this->assign('cat',$result);
            $this->display();
        }
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/6/17
 * Time: 7:06
 */

namespace Home\Controller;
use Think\Controller;

//http://127.0.0.1/blog/index.php/Home/Art/add
//后台管理的文章列表

class ArtController extends Controller{

    public function index(){

//        这个是通过原生的sql代码，来查询库里的东西。
        $sql = 'select art.* , cat.catname from art left join cat on art.cat_id = cat.cat_id';
        $model = M();
        $art = $model ->query($sql);
        var_dump($art);


        $this->assign('art',$art);
        $this->display();

    }

//        add 完成两个操作，一个是展示添加页输入内容，一个是insert插入数据
    public function add(){

        if(!empty($_POST)){

            $_POST['title'] = trim(I('post.title'));
            $_POST['cat_id'] = trim(I('post.cat_id'));
            $_POST['content'] = trim(I('post.content'));

            $_POST['pubtime'] = time();
//            tags,先不处理
//            $_POST['tags'] = trim(I('post.tags'));

            $art = D('art');
            if($art->create()){
                $result = $art->add();
                if($result) {
                    $this->success('添加文章成功', U('index'));
                }else{
                    $this->error('添加文章失败');
                }
            }
            else{
                $this->error($art->getError());
            }

            var_dump($_POST);

        }else{
            $cat = M('cat');
            $cat_all = $cat ->select();

            $this->assign('cat' ,$cat_all);
            $this->display();
        }
    }

//    形参的变量名要和url传过来的变量名一样
    public  function  artdel($art_id){
        echo $art_id;

        $art = M('art');
        $result = $art ->delete($art_id);

        if(!$result){
            $this->error('删除失败');
        }else{
            $this->success('删除成功',U('index'));
        }
    }

    public  function  artedit( $art_id){
        echo $art_id;

//        artedit完成两个逻辑，一个是展示编辑页面，一个是提交
        if( !empty($_POST)){
//        post为空，则为展示，非空，则为提交

            $_POST['title'] = trim(I('post.title'));
            $_POST['cat_id'] = trim(I('post.cat_id'));
            $_POST['content'] = trim(I('post.content'));

            $_POST['pubtime'] = time();


            $art = D('art');
//            记着页面带着<input type="hidden'>
            if($art->create()){
                $result = $art->save();
                if($result) {
                    $this->success('修改文章成功', U('index'));
                }else{
                    $this->error('修改文章失败');
                }
            }
            else{
                $this->error($art->getError());
            }

            var_dump($_POST);



        }else{
//        展示
            $art = M('art');
            $result = $art->find($art_id);
//            var_dump($result);
            $cat = M('cat');
            $result1 = $cat->select();
//            var_dump($result1);

            $this->assign('art',$result);
            $this->assign('cat',$result1);
            $this->display();

        }

    }



}
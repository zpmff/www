<?php
namespace Home\Controller;
use Think\Controller;

//http://127.0.0.1/blog/index.php/home/Index/index
//前台首页

class IndexController extends Controller
{
//    首页内容
    public function index()
    {
//        $this->show('hello world');

//        首页和栏目列表页，所有样式都一样，只是展示的列表不一样，所以列表页走同样的url，只是上面带了一个cat_id的参数
        if($_GET['cat_id']){
            $where = "and cat.cat_id =".$_GET['cat_id'];
        }else{
            $where = "";
        }

//       联表查询，where 1 对所有的都不影响，如果传了cat_id，就搜寻栏目下的
        $sql = 'select art_id,user_id,title,nick,pubtime,content,catname from art INNER JOIN cat on art.cat_id = cat.cat_id where 1 '.$where;
        $art = M();
        $result = $art->query($sql);
        $this->assign('art',$result);
        echo $sql;
        var_dump($result);




        $cat = M('cat');
        $result1 = $cat->select();
        $this->assign('cat',$result1);

        $this->display();
    }


//    文章详情页，打开某一篇帖子的详情页

    public function art($art_id=0){


        if($art_id ==0){
            $this->redirect('/Home/Index/index','',3,'art_id参数未传入');
        }
        if(!is_numeric($art_id)){
            $this->redirect('/Home/Index/index','',3,'参数不为数字');
        }

        $sql = 'select art_id,user_id,title,nick,pubtime,content,catname,comm from art INNER JOIN cat on art.cat_id = cat.cat_id where art.art_id= '.$art_id;
        $art = M();
        $result = $art ->query($sql);
        $res = $result[0];
        var_dump($res);
        $this ->assign('art',$res);

//        文章详情页，下面也有评论，提交评论后还是这个页面，判断是否有post，有的话就是提交，没的话，就是展示
        if(!empty($_POST)){
//            post 非空，代表有输入留言内容的
            $cont['nick'] = trim(I('post.nick'));
            $cont['email'] = trim(I('post.email'));
            $cont['content'] = trim(I('post.content'));
            $cont['art_id'] = $art_id;
            $cont['pubtime'] = time();

            $comment = D('comment');
            if($comment->create($cont)){
                $re = $comment->add();
                if($re){
                    echo '成功';
//                    $this->redirect('art',array('art_id'=>$art_id),1);
                      $this->success('新增成功','',2);
                }else{
                    echo '失败';
                }

            }else{
                $this->error($comment->getError());
            }


        }
        else{
//            post为空，说明没有用户录入回帖，展示回帖内容,根据上面拿到帖子的art_id,来选择回帖内容。
                $co = M('comment');
                $res_comment = $co ->where('art_id ='.$art_id)->select();
                var_dump($res_comment);

                $this->assign('comment',$res_comment);
        }

//这个是展示整个页面
        $this->display();
    }

}
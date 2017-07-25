<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/7/8
 * Time: 12:03
 *  url: http://127.0.0.1/shop/index.php/home/user/login
 */


namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{

    public  function login(){

        $this ->display();
    }


    public  function  register(){

        if(!empty($_POST)){

            $data['username'] = trim(I('post.username'));
            $data['password'] = trim(I('post.password'));
            $data['password2'] = trim(I('post.password2'));
            $data['user_email'] = trim(I('post.user_email'));
            $data['user_qq'] = trim(I('post.user_qq'));
            $data['user_tel'] = trim(I('post.user_tel'));
            $data['user_sex'] = trim(I('post.user_sex'));
            $data['user_xueli'] = trim(I('post.user_xueli'));
//            hobby是个二位数组，不能用trim()来处理
            $data['user_hobby'] = I('post.user_hobby');
            $data['user_introduce'] = trim(I('post.user_introduce'));
//            var_dump($data);



//             D方法实例化，只能实例化本模块下的，所以不能用在这里
//            $User = D('User');
// 相当于 $User = new \Home\Model\UserModel();


            $user = new \Model\UserModel();
            if($user->create($data)){

//              hobby，数组不能直接写到库里，必须转为字符串，通过验证后，再处理
//              create（）方法收集数据也是把数据变为模型对象的属性，和AR方式处理是一样的
                $user ->user_hobby = implode(',',$data['user_hobby']);

                $result = $user->add();
                if($result){
                    $this->success('添加用户成功',U('login'));
                }else{
                    $this->error('添加用户失败');
                }
            }else{
                var_dump($user->getError());
//                $this->error($user->getError());
            }


        }else{
            $this->display();
        }


    }


//    http://127.0.0.1/shop/index.php/home/user/aaa ;   没有方法名的处理办法
//访问到没有的控制器方法，读源码可知道，一种是在控制器里写_empty（），方法；一种是在模板中直接出现方法名
//推荐第一种；也有的把empty放到父类中后，User直接继承新新控制器
    public function  _empty(){

        $content =  "<img src='"."../../../Public/Img/111.jpg "."' alt='' /> 404欢迎你";
        $this->show($content);
    }


}
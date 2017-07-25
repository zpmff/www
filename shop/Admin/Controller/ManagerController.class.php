<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/7/12
 * Time: 22:39
 *  * url  127.0.0.1/shop/index.php/admin/manager/login
 */

namespace Admin\Controller;
use Component\AdminController;

class  ManagerController extends AdminController{

    public function  login(){
//        两个功能，post非空，执行登录功能，post为空，展示页面

        if(!empty($_POST)){
//            echo $_POST['captcha'];

            $verify  = new \Think\Verify();
            if( $verify->check($_POST['captcha'])){
                echo "验证码输入正确";

                $user = new \Think\Model();
//            注意这里，当时一直错，双引号是整条sql，单引号是说明那个变量是字符串，如果是数字啥的，就不需要单引号了
//            $sql = 'select  *  from sw_manager where  mg_name = '.$_POST[mg_username];
                $sql = "select  *  from sw_manager where  mg_name = '$_POST[mg_username]'";
//                echo $sql;
                $result = $user->query($sql);

                if($result != null){
                    if( $result[0][mg_pwd] == $_POST[mg_password] ){
                        echo "登录成功";
                        //登录信息持久化
                        session('mg_username',$result[0]['mg_name']);
                        session('mg_id',$result[0]['mg_id']);
                        $this->redirect('Index/index',array('id'=>100,'name'=>'tom'));
                    }else{
                        echo "用户名或密码错误";
                    }
                }else{
                    echo "用户名不存在";
                }

            }else{
                echo "验证码输入错误";
                $this->redirect('','',2);
            }

        }
    }


    public function logout(){

        session(null);
        $this-> redirect("Manager/login");
    }






    public function verifyImg(){

        $config =    array(
            'fontSize'    =>    15,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
            'imageW'      =>   100,     // 验证码位数
            'imageH'    =>   30, // 关闭验证码杂点
        );

        $verify = new \Think\Verify($config);
//        var_dump($verify);//对象的输出

        $verify->entry();


    }
}
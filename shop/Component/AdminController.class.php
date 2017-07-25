<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/7/23
 * Time: 22:53
 */



namespace  Component ;
use Think\Controller  ;

class AdminController extends Controller{

    //构造方法
    function __construct()
    {
        //先执行父类的构造方法
        parent::__construct();


        if($_SESSION['mg_id']){

        }else{
            $this ->redirect('Manager/Login');
        }




















        //当前请求操作
        //连接控制器名和方法名
        $now_ac = CONTROLLER_NAME."-".ACTION_NAME ;
//        echo $now_ac;










//        $sql = "select role_auth_ac from sw_manager as a join sw_role as b  on a.mg_role_id = b.role_id where a.mg_id =  ".$_SESSION['mg_id'];
//        $auth_ac = M()->query($sql);
////        var_dump($auth_ac);
//        $auth_ac = $auth_ac[0]['role_auth_ac'];
////        var_dump($auth_ac);
//
//        //判断$now_ac 是否在$auth_ac出现过，strpos（）返回false就是没出现过，如果返回数值，就是代表出现的位置
//        //如果mg_id = 1 超级管理员不用限制
//        //默认一下权限没有限制
//
//        if(!in_array($now_ac,$allow_ac) && strpos( $_SESSION['mg_id'] !=1 && $auth_ac,$now_ac)===false ){
//
//            exit('没有访问权限');
//            $this->error('没有访问权限',U(Index/index));
//        }



    }
}
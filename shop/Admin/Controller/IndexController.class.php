<?php
/**
 * url   127.0.0.1/shop/index.php/admin/index/index  先得访问 http://127.0.0.1/shop/index.php/admin/manager/login
 */
namespace Admin\Controller;
use Component\AdminController;
class IndexController extends AdminController {

    public function index(){

        $this->display();

    }

    public function head(){

        $this->display();

    }

    public function left(){

        //1. 通过session_id，找到该用户的角色
        $sql = "select * from sw_manager where mg_id = ".$_SESSION['mg_id'];
        $info1 = M()->query($sql);
//        var_dump($info1);
        $role_id  =  $info1[0]['mg_role_id'];

        //2、通过角色信息获得权限ids的信息
        $sql1= "select * from sw_role where role_id = ".$role_id;
        $info2 = M()->query($sql1);
//        var_dump($info2);
        $auth_ids  =  $info2[0]['role_auth_ids'];
//        var_dump($auth_ids);

        //3. 根据$auth_ids查询全部拥有的权限信息,注意sql中的in 的用法
        //获得顶级权限,如果是admin，则mg_id=1,获得全部的顶级权限，如果不等于1，则继续拼接后面的，不获得全部权限
        $sql2 = "select * from sw_auth where auth_level = 0 ";
        if($_SESSION['mg_id'] != 1){
            $sql2 .= "and auth_id in ($auth_ids) ";
        }
        $info3 = M()->query($sql2);
//        var_dump($info3);

        //获得次顶级权限,如果是admin，则mg_id=1,获得全部的顶级权限，如果不等于1，则继续拼接后面的，不获得全部权限
        $sql3 = "select * from sw_auth where  auth_level = 1 ";
        if($_SESSION['mg_id'] != 1){
            $sql3 .= " and auth_id in ($auth_ids) ";
        }
        $info4 = M()->query($sql3);
//        var_dump($info4);


        $this->assign('pauth_info',$info3);
        $this->assign('sauth_info',$info4);
        $this->display();

    }

    public function right(){

        $this->display();

    }


}
<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/7/15
 * Time: 17:10
 */

namespace  Model;
use Think\Model;

class ManagerModel extends Model{

//    制作一个方法对用户和密码进行比较
    function  checkNamePwd($name , $pwd){

//        1.根据$name 查询是否有此记录  2.再看密码对不
        $sql = "select * from sw_manager where mg_name = ".'"$name"' ;
        $result = $this->query($sql);
        var_dump($result);

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/7/8
 * Time: 20:52
 */



namespace Model;
use Think\Model;


class QqModel extends Model{

//    设置属性，定义当前模型操作的真实的数据表
    protected  $trueTableName  = "tencent_qq";
}
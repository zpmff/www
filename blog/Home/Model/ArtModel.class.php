<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/6/17
 * Time: 7:35
 */



namespace Home\Model;
use Think\Model;
class ArtModel extends Model{

//    这是静态验证的方法，动态验证放在控制器中
    protected $_validate = array(
        array('title','require','标题不能为空'), // 标题不能为空
        array('title','','标题已经存在',1,'unique',3), // 标题不能重复
        array('content','require','所属栏目不能为空'), // 内容不能为空
        array('content','require','内容不能为空'), // 内容不能为空
        array('cat_id','number','栏目不为数字'), //栏目不为数字
    );
}


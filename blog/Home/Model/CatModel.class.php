<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/6/11
 * Time: 22:18
 */

namespace Home\Model;
use Think\Model;
class CatModel extends Model{

//    这是静态验证的方法，动态验证放在控制器中
    protected $_validate = array(
        array('catname','require','栏目名称不能为空'), // 栏目名必须
        array('catname','','栏目名已经存在',1,'unique',3), // 栏目名不为空
    );
}
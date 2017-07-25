<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/7/8
 * Time: 15:42
 *
 * http://127.0.0.1/shop/index.php/home/aaa/aaa   无此控制器
 */

namespace Home\Controller ;
use Think\Controller;


//空控制器的处理方法，看源码，会读一个空的控制器
class  EmptyController extends Controller{



    public function _empty(){

        $this->show('404控制器没有找到');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/7/4
 * Time: 20:21
 * 用在首页下，帖子详情页， 对回帖的判断
 */



namespace Home\Model;
use Think\Model;
class CommentModel extends Model{

//    这是静态验证的方法，动态验证放在控制器中
    protected $_validate = array(
        array('nick','require','姓名不能为空'), // 标题不能为空
        array('email','require','email不能为空'), // 内容不能为空
        array('content','require','内容不能为空'), // 内容不能为空
        array('cat_id','number','栏目不为数字'), //栏目不为数字
    );
}


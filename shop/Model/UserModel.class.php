<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/7/11
 * Time: 21:17
 */

namespace  Model;
use Think\Model;

class UserModel extends Model{

    // 是否批处理验证
    protected $patchValidate    =   true;

    protected $_validate = array(
        array('username','require','用户名不能为空'),
        array('password','require','密码不能为空'),
        array('password2','require','确认密码不能为空'),
        array('password2','password','确认密码和密码必须相同',0,'confirm'),
        array('user_email','email','邮箱格式不正确',2),
//        验证qq，都是数组，长度5-10位，首位不为0，正则表达式/^[1-9]\d{4,9}$/ ,第五位默认是正则表达式
        array('user_qq','/^[1-9]\d{4,9}$/','qq格式不正确'),
//        学历必须选择一个,值在2,3,4,5范围内即可
        array('user_xueli',"2,3,4,5",'学历必须选择',0,'in'),
//        爱好至少选择两项以上，爱好这是一个数组，只要数组的元素个数大于等于2即可。利用model里面指定方法验证
        array('user_hobby',"check_hobby",'爱好必须选择2个以上',0,'callback'),
    );


//    自定义方法验证爱好信息
//        参数是当前被验证项目的信息，$name = $_data['user_hobby]
    public function  check_hobby($name){
//        var_dump($name);

        if(count($name)<2){
            return false;
        }else{
            return true;
        }
    }

}
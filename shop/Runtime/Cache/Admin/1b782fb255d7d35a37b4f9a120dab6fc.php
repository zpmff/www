<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv=content-type content="text/html; charset=utf-8" />
    <link href="/shop/Public/Css/admin.css" type="text/css" rel="stylesheet" />
    <script language = javascript>
        function expand(el)
        {
            childobj = document.getElementById("child" + el);

            if (childobj.style.display == 'none')
            {
                childobj.style.display = 'block';
            }
            else
            {
                childobj.style.display = 'none';
            }
            return;
        }
    </script>
</head>
<body>
<table height="100%" cellspacing=0 cellpadding=0 width=170
       background=../../../Public/Img/menu_bg.jpg border=0>
    <tr>
        <td valign=top align=middle>
            <table cellspacing=0 cellpadding=0 width="100%" border=0>

                <tr>
                    <td height=10></td></tr></table>


            <?php foreach($pauth_info as $v ){ ?>
            <table cellspacing=0 cellpadding=0 width=150 border=0>
                <?php echo ($v["auth_id"]); ?>
                <tr height=22>
                    <td style="padding-left: 30px" background=../../../Public/Img/menu_bt.jpg><a  class=menuparent onclick="expand(<?php echo ($v["auth_id"]); ?>)" href="javascript:void(0);"><?php echo ($v["auth_name"]); ?></a></td></tr>
                <tr height=4>
                    <td></td></tr>
            </table>


            <table id=child<?php echo ($v["auth_id"]); ?>  style="display: none" cellspacing=0 cellpadding=0
                   width=150 border=0>

                <?php  foreach($sauth_info as $vv){ ?>
                <!--<?php echo ($vv["auth_pid"]); ?> <?php echo ($v["auth_id"]); ?> <br>-->
                <!--{*当前父级id与外边的id一致，才显示,注意这里，一直错误， 模板才是 $v.vv   php 是 $v[xxxx]*}-->
                <?php  if($vv[auth_pid] == $v[auth_id]){ ?>

                <tr height=20>
                    <td align=middle width=30><img height=9 src="../../../Public/Img/menu_icon.gif" width=9></td>
                    <td><a class=menuchild  href="#" target=main><?php echo ($vv["auth_name"]); ?> </a></td>
                </tr>

                <?php  } ?>
                <?php  } ?>

            </table>

            <?php } ?>

       </td>
        <td width=1 bgcolor=#d1e6f7></td>
    </tr>
</table>
</body>
</html>
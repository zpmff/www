<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>修改商品</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="/shop/Public/Css/mine.css" type="text/css" rel="stylesheet">
</head>

<body>

<div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》修改商品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="/shop/index.php/Admin/Goods/index">【返回】</a>
                </span>
            </span>
</div>
<div></div>

<div style="font-size: 13px;margin: 10px 5px">
    <form action="/shop/index.php/Admin/Goods/update/id/8" method="post" enctype="multipart/form-data">
        <table border="1" width="100%" class="table_a">
            <tr>
                <td>商品名称</td>
                <td><input type="text" name="goods_name" value="<?php echo ($goods["goods_name"]); ?>" /></td>
            </tr>
            <!--<tr>-->
                <!--<td>商品分类</td>-->
                <!--<td>-->
                    <!--<select name="f_goods_category_id">-->
                        <!--<option>请选择</option>-->
                        <!--<option>家用电器</option>-->
                        <!--<option>手机数码</option>-->
                        <!--<option>电脑办公</option>-->
                        <!--<option>服饰鞋帽</option>-->
                    <!--</select>-->
                <!--</td>-->
            <!--</tr>-->
            <!--<tr>-->
                <!--<td>商品品牌</td>-->
                <!--<td>-->
                    <!--<select name="f_goods_brand_id">-->
                        <!--<option>请选择</option>-->
                        <!--<option>苹果</option>-->
                        <!--<option>诺基亚</option>-->
                        <!--<option>HTC</option>-->
                        <!--<option>摩托罗拉</option>-->
                    <!--</select>-->
                <!--</td>-->
            <!--</tr>-->
            <tr>
                <td>商品价格</td>
                <td><input type="text" name="goods_price" value="<?php echo ($goods["goods_price"]); ?>" /></td>
            </tr>
            <!--<tr>-->
                <!--<td>商品图片</td>-->
                <!--<td><input type="file" name="f_goods_image" value="./img/2013-12-33.jpg" /></td>-->
            <!--</tr>-->
            <tr>
                <td>商品数量</td>
                <td><input type="text" name="goods_number" value="<?php echo ($goods["goods_number"]); ?>" /></td>
            </tr>
            <tr>
                <td>商品重量</td>
                <td><input type="text" name="goods_weight" value="<?php echo ($goods["goods_weight"]); ?>" /></td>
            </tr>
            <tr>
                <td>商品详细描述</td>
                <td>
                    <textarea name="goods_introduce"><?php echo ($goods["goods_introduce"]); ?></textarea>
                </td>
            </tr>
            <input type="hidden" name="goods_id" value="<?php echo ($goods["goods_id"]); ?>">
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="修改">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
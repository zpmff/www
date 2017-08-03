<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/blog/Public/css/reset.css">
    <link rel="stylesheet" href="/blog/Public/css/adm.css">
</head>
<body>
<header>
    <h1>Blog后台管理界面</h1>
</header>
<div id="main">
    <div id="lside">
        <aside>
            <h4>栏目管理</h4>
            <ul>
                <li><a href="">栏目列表</a></li>
                <li><a href="">添加栏目</a></li>
            </ul>
        </aside>
        <aside>
            <h4>文章管理</h4>
            <ul>
                <li><a href="">文章列表</a></li>
                <li><a href="">发布文章</a></li>
            </ul>
        </aside>
        <aside>
            <h4>个人中心</h4>
            <ul>
                <li><a href="">修改密码</a></li>
                <li><a href="">退出登陆</a></li>
            </ul>
        </aside>
    </div>
    <div id="rside">
        <table>
            <tr>
                <td>序号</td>
                <td>日期</td>
                <td>标题</td>
                <td>分类</td>
                <td>回复</td>
                <td>状态</td>
                <td>操作</td>
            </tr>
            <?php foreach($art as $v ){ ?>
            <tr>
                <td><?php echo $v['art_id']; ?></td>
                <td><?php echo date('Y/m/d',$v['pubtime']) ; ?></td>
                <td><a href="#"><?php echo $v['title']; ?></a></td>
                <td><?php echo $v['catname']; ?></td>
                <td><span class="badge"><?php echo $v['comm']; ?></span></td>
                <td><?php echo $v['art_id']; ?></td>
                <!--echo 处的“” 才会让变量变成数字 ， 单引号不会变成数字,所以被注释掉的是错的-->
                <td>
                    <!--<?php echo "<a href='/blog/index.php/Home/Art/artedit/art_id/$v[art_id]'>"; ?>编辑</a> |-->
                    <!--<?php echo '<a href="/blog/index.php/Home/Art/artdel/art_id/$v[art_id]">'; ?>删除</a>-->
                    <?php echo "<a href='/blog/index.php/Home/Art/artdel/art_id/$v[art_id]'>"; ?>删除</a>
                    <a href="/blog/index.php/Home/Art/artedit/art_id/<?php echo $v['art_id']; ?>" >编辑</a>
                </td>
            </tr>
            <?php } ?>

        </table>
        <div id="pagebar">
            Pages:&nbsp;
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            4
            <a href="#">5</a>
            <a href="#">6</a>
        </div>
    </div>
</div>
<footer>
    Copyright &copy; 2015 · GeneratePress · WordPress
</footer>
</body>
</html>
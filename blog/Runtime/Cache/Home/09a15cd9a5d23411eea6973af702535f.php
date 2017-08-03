<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
        <form action="/blog/index.php/Home/Art/artedit/art_id/aaa" method="post">
            <input type="hidden" name='art_id'  value="<?php echo ($art["art_id"]); ?>">
            <div class="form-group">
                <label>标题:</label>
                <p>
                    <input type="text" name="title" value="<?php echo ($art["title"]); ?>">
                </p>
            </div>
            <div class="form-group">
                <label>栏目:</label>
                <p>
                    <select name="cat_id">
                        <?php foreach($cat as $v){ ?>

                        <option value="<?php echo $v['cat_id'];?>"  <?php if($v['cat_id'] == $art['cat_id']){ echo 'selected="selected"';} ?>
                        >
                            <?php echo $v['catname']; ?>

                        </option>
                        <?php } ?>
                    </select>
                </p>
            </div>
            <div class="form-group">
                <label >内容:</label>
                <p>
                    <textarea name="content" ><?php echo ($art["content"]); ?></textarea>
                </p>
            </div>
            <!--<div class="form-group">-->
            <!--<label>标签:</label>-->
            <!--<p>-->
            <!--<input type="text" name="tags">-->
            <!--</p>-->
            <!--</div>-->
            <div class="form-group">
                <label>&nbsp;</label>
                <p>
                    <button type="submit">提交</button>
                </p>
            </div>
        </form>
    </div>
</div>
<footer>
    Copyright &copy; 2015 · GeneratePress · WordPress
</footer>
</body>
</html>
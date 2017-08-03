<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/blog/Public/css/reset.css">
    <link rel="stylesheet" href="/blog/Public/css/index.css">
</head>
<body>
<header>
    <h1>十八哥的Blog</h1>
    <h4>乘风行,无惧</h4>
</header>
<nav>
    <ul>
        <li><a href="">导航1</a></li>
        <li><a href="">导航2</a></li>
        <li><a href="">导航3</a></li>
        <li><a href="">导航4</a></li>
    </ul>
</nav>
<div id="main">
    <div id="lside">
        <?php foreach($art as $a){ ?>
        <article>
            <h2><a href="/blog/index.php/Home/Index/art/art_id/<?php echo $a['art_id']; ?> "><?php echo $a['title']; ?></a></h2>
            <div class="entry_header">
                <time><?php echo date("y-m-d",$a['pubtime']); ?></time>
                by
                <a href="#">十八</a>
                <a class="catlink" href="#"><?php echo $a['catname']; ?></a>
                <a class="comment" href="#"><?php echo $a['comm']; ?>条评论</a>
            </div>
            <div class="entry_content">
                <p><?php echo $a['content']; ?></p>

            </div>
        </article>
        <?php } ?>
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
    <div id="rside">
        <aside>
            <form action="">
                <input type="text" name="search" placeholder="Search...">
            </form>
        </aside>
        <aside>
            <h4>所有栏目</h4>
            <ul>
                <?php foreach($cat as $c){ ?>
                <li><a href="/blog/index.php/Home/Index/index/cat_id/<?php echo $c['cat_id'] ; ?>"><?php echo $c['catname']; ?></a></li>
                <?php } ?>
            </ul>
        </aside>
        <aside>
            <h4>测试标题</h4>
            <ul>
                <li><a href="">文章标题1</a></li>
                <li><a href="">文章标题2</a></li>
                <li><a href="">文章标题3</a></li>
                <li><a href="">文章标题4</a></li>
            </ul>
        </aside>
        <aside>
            <h4>测试标题</h4>
            <ul>
                <li><a href="">文章标题1</a></li>
                <li><a href="">文章标题2</a></li>
                <li><a href="">文章标题3</a></li>
                <li><a href="">文章标题4</a></li>
            </ul>
        </aside>
        <aside>
            <h4>测试标题</h4>
            <ul>
                <li><a href="">文章标题1</a></li>
                <li><a href="">文章标题2</a></li>
                <li><a href="">文章标题3</a></li>
                <li><a href="">文章标题4</a></li>
            </ul>
        </aside>
    </div>
</div>
<footer>
    Copyright &copy; 2015 · GeneratePress · WordPress
</footer>
</body>
</html>
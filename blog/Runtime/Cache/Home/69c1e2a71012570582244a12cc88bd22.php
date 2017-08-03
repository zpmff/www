<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/blog/Public/css/reset.css">
    <link rel="stylesheet" href="/blog/Public/css/index.css">
    <link rel="stylesheet" href="/blog/Public/css/art.css">
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
        <li>
            <a href="">导航3</a></li>
        <li><a href="">导航4</a></li>
    </ul>
</nav>
<div id="main">
    <div id="lside">
        <article>
            <h2><a href="#"><?php echo ($art["title"]); ?></a></h2>
            <div class="entry_header">
                <time><?php echo (date('y-m-d',$art["pubtime"])); ?></time>
                by
                <a href="#">十八</a>
                <a class="catlink" href="#"><?php echo ($art["catname"]); ?></a>
                <a class="comment" href="#"><?php echo ($art["comm"]); ?>条评论</a>
            </div>
            <div class="entry_content">
                <?php echo ($art["content"]); ?>
            </div>
        </article>
        <div id="comments">
            <?php foreach($comment as $v){ ?>
            <ol>
                <li>
                    <img src="https://secure.gravatar.com/avatar/582b66ad5ae1b69c7601a990cb9a661a?s=50&d=identicon&r=pg" alt="">
                    <cite><a href="#"><?php echo $v['nick']; ?> </a></cite> <br>
                    <time><?php echo date("y年m月d日h时i分", $v['pubtime']); ?></time>
                </li>
                <li>
                    <?php echo $v['content']; ?>
                </li>
            </ol>
            <?php } ?>

        </div>
        <div id="respond" class="comment-respond">
            <h3>Leave a Comment</h3>
            <form action="/blog/index.php/Home/Index/art/art_id/23" method="post">
                <p>
                    <input placeholder="your nick" name="nick" type="text" value="" size="30">
                </p>
                <p>
                    <input placeholder="Email" name="email" type="text" value="" size="30">
                </p>
                <p>
                    <textarea name="content" cols="45" rows="8" aria-required="true"></textarea>
                <p>
                {TOKEN}
                    <input type="submit" value="Post Comment">
                </p>
            </form>
        </div>
    </div>
    <div id="rside">
        <aside>
            <form action="">
                <input type="text" name="search" placeholder="Search...">
            </form>
        </aside>
        <aside>
            <h4>测试标题</h4>
            <ul>
                <li><a href="">文章标题</a>&nbsp;(1)</li>
                <li><a href="">文章标题</a>&nbsp;(3)</li>
                <li><a href="">文章标题</a>&nbsp;(5)</li>
                <li><a href="">文章标题</a>&nbsp;(3)</li>
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
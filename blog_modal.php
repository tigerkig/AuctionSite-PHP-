<?php
    require_once("function.php");
    $about = getDetails(doSelect("content, id, photo, title", "blog", array("id" => $_POST["id"])));

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {  
         $url = "https://";
    } else {
         $url = "http://";
    }     
    $url.= $_SERVER['HTTP_HOST'];   
    
    $site_url = $url.$_SERVER['REQUEST_URI'];   

    $img_url = $url.'/blog_photo/'.$about[0]["photo"];
    $fb_url  = "s=100&p[title]=".$about[0]["title"]."&p[summary]=".$about[0]["content"]."&p[url]=".$site_url."&p[images][0]=".$img_url;

    $twitter_url  = "url=".$site_url."&text=".$about[0]["title"];
?>
<div>
    <img src="./blog_photo/<?php echo $about[0]["photo"]; ?>" alt="Blog Photo" style="height: 250px;width: 100%;object-fit: cover;">
    <h2 style="font-weight: bold"><?php echo $about[0]["title"]; ?></h2>
    <div><?php echo $about[0]["content"];  ?></div>
    <div class="blog-social">
        <a href="http://www.facebook.com/sharer.php?<?php echo $fb_url ?>" target="_blank" class="facebook">
            <span class="fa fa-facebook"></span>
        </a>
        <a href="https://twitter.com/share?<?php echo $twitter_url ?>" target="_blank" class="twitter">
            <span class="fa fa-twitter"></span>
        </a>
        <a href="#" class="tiktok">
            <svg viewBox="4 4 42 42" xmlns="http://www.w3.org/2000/svg" width="2500" height="2500"><path d="M41 4H9C6.243 4 4 6.243 4 9v32c0 2.757 2.243 5 5 5h32c2.757 0 5-2.243 5-5V9c0-2.757-2.243-5-5-5m-3.994 18.323a7.482 7.482 0 0 1-.69.035 7.492 7.492 0 0 1-6.269-3.388v11.537a8.527 8.527 0 1 1-8.527-8.527c.178 0 .352.016.527.027v4.202c-.175-.021-.347-.053-.527-.053a4.351 4.351 0 1 0 0 8.704c2.404 0 4.527-1.894 4.527-4.298l.042-19.594h4.02a7.488 7.488 0 0 0 6.901 6.685v4.67"/></svg>
        </a>
        <a href="#" class="instagram">
            <span class="fa fa-instagram"></span>
        </a>
    </div>
</div>

<style>
    .blog-social {
        margin-top: 10px;
        display: flex;
        justify-content: flex-end;
    }
    .blog-social a {
        font-size: 18px;
        width: 30px;
        height: 30px;
        color: #FFFFFF;
        text-align: center;
        padding: 5px;
        margin-left: 5px;
        border-radius: 4px;
    }
    .blog-social .facebook {
        background-color: #4267B2;
    }
    .blog-social .twitter {
        background-color: #00acee;
    }
    .blog-social .tiktok {
        padding: 0;
    }
    .blog-social .tiktok svg {
        width: 30px;
        height: 30px;
    }
    .blog-social .instagram {
        background-color: #dd2a7b;
    }
</style>
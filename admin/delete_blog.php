<?php
require_once("function.php");
if($_POST["set"] == 'delete_blog'){
    $prev_image = seeMoreDetails("photo", "blog", array("id" => $_POST["id"]));
    if(file_exists("../blog_photo/".$prev_image)){
        unlink("../blog_photo/".$prev_image);
    }

    $status = doDelete("blog", array("id" => $_POST["id"]));

    if($status){
        echo 1;
    }else{
        echo 0;
    }
}
?>
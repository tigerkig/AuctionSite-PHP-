<?php
require_once("function.php");

if(isset($_FILES["photo"]["name"]) && $_FILES["photo"]["error"] == 0){
    $image = time().$_FILES["photo"]["name"];
    $_POST["photo"] = $image;
    $tmp_name = $_FILES["photo"]["tmp_name"];
    move_uploaded_file($tmp_name, "../blog_photo/".$image);
    $prev_image = seeMoreDetails("photo", "blog", array("id" => $_POST["id"]));
    if(file_exists("../blog_photo/".$prev_image)){
        unlink("../blog_photo/".$prev_image);
    }
}

if(isset($_POST["id"]) && $_POST["id"] != ""){
	$status = doUpdate("blog", $_POST, array("id" => $_POST["id"]));
} else {
    $status = doInsert($_POST, "blog");
}

if($status){
    echo 1;
}else{
    echo 0;
}
?>
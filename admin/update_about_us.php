<?php
require_once("function.php");
if(isset($_POST["id"])){

if(isset($_FILES["image"]["name"]) && $_FILES["image"]["error"]==0){
	$image=time().$_FILES["image"]["name"];
	$_POST["image"]=$image;
	$tmp_name=$_FILES["image"]["tmp_name"];
	move_uploaded_file($tmp_name,"../about_photo/".$image);
	$prev_image=seeMoreDetails("image","ambit_about",array("id"=>$_POST["id"]));
	if(file_exists("../about_photo/".$prev_image)){
		unlink("../about_photo/".$prev_image);
	}
}


	$status=doUpdate("ambit_about",$_POST,array("id"=>$_POST["id"]));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
?>
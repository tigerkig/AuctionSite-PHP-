<?php
require_once("function.php");

//Add Country
if(isset($_GET["msg"]) && $_GET["msg"]=='add_color'){
	unset($_GET["msg"]);
	if(trim($_FILES['image']["error"])==0){
	$image=time().$_FILES["image"]["name"];	
	$image_tmp=$_FILES["image"]["tmp_name"];
	move_uploaded_file($image_tmp,"../image/demo/colors/".$image);
	$_POST["image"]=$image;
	}
	$status=doInsert($_POST,"ambit_product_color");
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

//Update Country
if(isset($_POST["msg"]) && $_POST["msg"]=='update_color'){
	unset($_POST["msg"]);
	$status=doUpdate("ambit_product_color",$_POST,array("apc_id"=>$_POST["apc_id"]));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

//Delete Country
if(isset($_POST["msg"]) && $_POST["msg"]=='delete_color'){
	unset($_POST["msg"]);
	$status=doDelete("ambit_product_color",$_POST);
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

?>
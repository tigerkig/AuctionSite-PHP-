<?php
session_start();
require_once("function.php");
/* print_r($_POST);
print_r($_FILES); */
if(isset($_FILES["aas_slider"]) && trim($_FILES["aas_slider"]["name"]) != ""){
	$image=time().$_FILES["aas_slider"]["name"];
	$temp_name=$_FILES["aas_slider"]["tmp_name"];
	move_uploaded_file($temp_name,"../image/demo/slider/".$image);
	$_POST["aas_slider"]=$image;
	if(trim($_POST["aas_link"])==""){
		$_POST["aas_link"]="#";
	}
	$status=doInsert($_POST,"ambit_add_slider");
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

?>
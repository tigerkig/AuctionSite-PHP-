<?php
session_start();
require_once("function.php");
/* print_r($_POST);
print_r($_FILES); */
if(isset($_FILES["aab_banner"]) && trim($_FILES["aab_banner"]["name"]) != ""){
	$image=time().$_FILES["aab_banner"]["name"];
	$temp_name=$_FILES["aab_banner"]["tmp_name"];
	move_uploaded_file($temp_name,"../image/demo/cms/".$image);
	$_POST["aab_banner"]=$image;
	if(trim($_POST["aab_link"])==""){
		$_POST["aab_link"]="#";
	}
	$status=doInsert($_POST,"ambit_add_banner");
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

?>
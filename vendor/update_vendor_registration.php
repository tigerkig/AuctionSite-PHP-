<?php
session_start();
require_once("function.php");
if(isset($_FILES) && $_FILES["image"]["error"]==0){
	$image=time().$_FILES["image"]["name"];
	$_POST["image"]=$image;
	$tmp_name=$_FILES["image"]["tmp_name"];
	move_uploaded_file($tmp_name,'vendor_image/'.$image);
	$prev_image=seeMoreDetails("image","vendor_registration",array('vr_id'=>$_SESSION["vendor_id"]));
	if(file_exists('vendor_image/'.$prev_image)){
		unlink('vendor_image/'.$prev_image);
	}
}

$_POST["status"]=0;
$status=doUpdate("vendor_registration",$_POST,array('vr_id'=>$_SESSION["vendor_id"]));
if($status){
	echo 1;
}else{
	echo 0;
}
?>
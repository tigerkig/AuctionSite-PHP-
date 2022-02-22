<?php
session_start();
require_once("function.php");

$_POST["new_password"]=md5($_POST["new_password"]);
$_POST["old_password"]=md5($_POST["old_password"]);
$check=getDetails(doSelect('fname','vendor_registration',array("vr_id"=>$_SESSION["vendor_id"],"password"=>$_POST["old_password"])));
if(!empty($check)){
	$status=doUpdate('vendor_registration',array("password"=>$_POST["new_password"]),array("vr_id"=>$_SESSION["vendor_id"]));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}else{
	echo 404;
}
?>
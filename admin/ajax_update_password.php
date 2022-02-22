<?php
session_start();
require_once("function.php");

$_POST["new_password"]=md5($_POST["new_password"]);
$_POST["old_password"]=md5($_POST["old_password"]);
$check=getDetails(doSelect('username','admin',array("id"=>$_SESSION["id"],"password"=>$_POST["old_password"])));
if(!empty($check)){
	$status=doUpdate('admin',array("password"=>$_POST["new_password"]),array("id"=>$_SESSION["id"]));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}else{
	echo 404;
}
?>
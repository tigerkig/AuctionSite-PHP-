<?php
session_start();
require_once("function.php");

$_POST["new_password"]=md5($_POST["new_password"]);
$_POST["old_password"]=md5($_POST["old_password"]);
$check=getDetails(doSelect('name','ambit_customer',array("ac_id"=>$_SESSION["ac_id"],"password"=>$_POST["old_password"])));
if(!empty($check)){
	$status=doUpdate('ambit_customer',array("password"=>$_POST["new_password"]),array("ac_id"=>$_SESSION["ac_id"]));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}else{
	echo 404;
}
?>
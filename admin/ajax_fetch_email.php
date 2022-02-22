<?php
session_start();
require_once("function.php");
$msg=trim($_POST["msg"]);
unset($_POST["msg"]);

if($msg=='customer_email'){
	$_POST["ac_id"]=trim($_POST["ac_id"]);
	echo seeMoreDetails("email","ambit_customer",$_POST);
}

if($msg=='vendor_email'){
	$_POST["vr_id"]=trim($_POST["vr_id"]);
	echo seeMoreDetails("email","vendor_registration",$_POST);
}

?>
<?php
session_start();
require_once("function.php");
//print_r($_POST);
$status=doUpdate("ambit_customer",$_POST,array("ac_id"=>$_SESSION["ac_id"]));
if($status){
	echo 1;
}else{
	echo 0;
}

?>
<?php
session_start();
require_once("function.php");

unset($_POST["name"]);
unset($_POST["email"]);

$status=doUpdate("ambit_customer",$_POST,array('ac_id'=>$_POST['ac_id']));

if($status){
	echo 1;
	
	if(isset($_SESSION["target_path"])){
		echo " || ".$_SESSION["target_path"];
	}
}else{
	echo 0;
}
?>
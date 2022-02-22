<?php
session_start();
require_once("function.php");
//print_r($_POST);
if(isset($_POST["set"]) && trim($_POST["set"])=="add_coupon"){
	unset($_POST["set"]);
$status=doInsert($_POST,"ambit_coupon");
if($status){
	echo 1;
}else{
	echo 0;
}
}
if(isset($_POST["set"]) && trim($_POST["set"])=="delete_coupon"){
unset($_POST["set"]);
$status=doDelete("ambit_coupon",$_POST);
if($status){
	echo 1;
}else{
	echo 0;
}
}
?>
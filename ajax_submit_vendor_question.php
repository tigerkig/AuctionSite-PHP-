<?php
session_start();
require_once("function.php");
if(isset($_SESSION["ac_id"])){
$vr_id=trim($_POST["vr_id"]);
$question=trim($_POST["question"]);
$ac_id=$_SESSION["ac_id"];
$field=array("vr_id"=>$vr_id,"question"=>$question,"ac_id"=>$ac_id);
$status=doInsert($field,"ambit_vendor_qustn_ans");
if($status){
	echo 1;
}else{
	echo 0;
}
}else{
	echo 3;
}
?>
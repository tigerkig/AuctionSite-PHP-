<?php
session_start();
require_once("function.php");
if(isset($_SESSION["ac_id"])){
$apa_id=trim($_POST["apa_id"]);
$question=trim($_POST["question"]);
$vr_id=getVendorId($apa_id);
$ac_id=$_SESSION["ac_id"];
$field=array("apa_id"=>$apa_id,"question"=>$question,"vr_id"=>$vr_id,"ac_id"=>$ac_id);
$status=doInsert($field,"ambit_pro_qustn_ans");
if($status){
	echo 1;
}else{
	echo 0;
}
}else{
	echo 3;
}
?>
<?php
session_start();
require_once("function.php");

$status=doUpdate("ambit_withdraw",array("transaction_date"=>$_POST["date"]),array("aw_id"=>$_POST["aw_id"]));
if($status){
	echo 1;
	
}else{
	echo 0;
}
?>
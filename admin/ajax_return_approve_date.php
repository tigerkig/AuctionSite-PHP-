<?php
session_start();
require_once("function.php");

$status=doUpdate("ambit_return_product",array("approve_date"=>$_POST["date"]),array("arp_id"=>$_POST["arp_id"]));
if($status){
	echo 1;
	
}else{
	echo 0;
}
?>
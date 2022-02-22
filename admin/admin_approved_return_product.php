<?php
session_start();
require_once("function.php");
$status=doUpdate("ambit_return_product",array("status"=>1),$_POST);
if($status){
	echo 1;
}else{
	echo 0;
}
?>
<?php
session_start();
require_once("function.php");

$_POST["currency"]=trim($_POST["currency"]);
$_POST["unit_price"]=trim($_POST["unit_price"]);
$_POST["symbol"]=trim($_POST["symbol"]);
$status=doInsert($_POST,'ambit_currency');
if($status){
	echo 1;
}else{
	echo 0;
}
?>
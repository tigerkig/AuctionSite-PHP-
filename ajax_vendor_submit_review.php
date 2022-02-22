<?php
session_start();
require_once("function.php");
if(isset($_SESSION["ac_id"])){
$status=doInsert($_POST,"ambit_vendor_review");
if($status){
	echo 1;
}else{
	echo 0;
}
}else{
	echo 3;
}
?>
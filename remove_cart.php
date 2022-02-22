<?php
session_start();
require_once("function.php");
if($_GET["msg"]=='remove_cart'){
$status=doDelete("ambit_add2cart",array("aad_cart_id"=>$_POST["id"]));
if($status){
	echo '1';
}else{
	echo '0';
}
}


if($_GET["msg"]=='remove_guest_cart'){	
$cart_details=explode("//",$_SESSION["add2cart"]);
unset($cart_details[$_POST["key"]]);
$details=implode("//",$cart_details);
unset($_SESSION["add2cart"]);
if(trim($details) != ""){
$_SESSION["add2cart"]=$details;
}
echo 1;
}
?>
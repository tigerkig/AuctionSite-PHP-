<?php
session_start();
require_once("function.php");

if(isset($_SESSION["ac_id"])){
	//session_destroy();
	$where=array("aad_cart_ac_id"=>$_SESSION["ac_id"]);
  	$status=doDelete("ambit_add2cart", $where);
	
	unset($_SESSION["ac_id"]);
	unset($_SESSION["token"]);
	
	echo 1;
}

?>
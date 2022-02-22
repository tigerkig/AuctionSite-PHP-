<?php
require_once("function.php");
if($_POST["set"]=='delete_account'){
	$status=doDelete("payment_gateway",array("id"=>$_POST["id"]));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

?>
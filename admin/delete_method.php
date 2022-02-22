<?php
require_once("function.php");
if($_POST["set"]=='delete_account'){
	$status=doDelete("ambit_payment_method",array("apm_id"=>$_POST["apm_id"]));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

?>
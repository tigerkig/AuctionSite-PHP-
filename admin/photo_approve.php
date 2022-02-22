<?php
session_start();
require_once("function.php");
if(isset($_POST["api_id"])){
	$status=doUpdate("ambit_product_image",array("status"=>1),$_POST);
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}


?>
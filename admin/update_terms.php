<?php
require_once("function.php");
if(isset($_POST["id"])){




	$status=doUpdate("ambit_terms_condition",$_POST,array("id"=>$_POST["id"]));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
?>
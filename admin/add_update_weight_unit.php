<?php
require_once("function.php");

//Add Country
if(isset($_POST["msg"]) && $_POST["msg"]=='add_wu'){
	unset($_POST["msg"]);
	$status=doInsert($_POST,"ambit_weight_unit");
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

//Update Country
if(isset($_POST["msg"]) && $_POST["msg"]=='update_wu'){
	unset($_POST["msg"]);
	$status=doUpdate("ambit_weight_unit",$_POST,array("awu_id"=>$_POST["awu_id"]));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

//Delete Country
if(isset($_POST["msg"]) && $_POST["msg"]=='delete_wu'){
	unset($_POST["msg"]);
	$status=doDelete("ambit_weight_unit",$_POST);
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

?>
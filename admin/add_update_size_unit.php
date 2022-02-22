<?php
require_once("function.php");

//Add Country
if(isset($_POST["msg"]) && $_POST["msg"]=='add_su'){
	unset($_POST["msg"]);
	$status=doInsert($_POST,"ambit_size_unit");
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

//Update Country
if(isset($_POST["msg"]) && $_POST["msg"]=='update_su'){
	unset($_POST["msg"]);
	$status=doUpdate("ambit_size_unit",$_POST,array("asu_id"=>$_POST["asu_id"]));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

//Delete Country
if(isset($_POST["msg"]) && $_POST["msg"]=='delete_su'){
	unset($_POST["msg"]);
	$status=doDelete("ambit_size_unit",$_POST);
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

?>
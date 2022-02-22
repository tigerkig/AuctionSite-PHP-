<?php
require_once("function.php");

//Add Country
if(isset($_POST["msg"]) && $_POST["msg"]=='add_brand'){
	unset($_POST["msg"]);
	$status=doInsert($_POST,"ambit_brand");
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

//Update Country
if(isset($_POST["msg"]) && $_POST["msg"]=='update_brand'){
	unset($_POST["msg"]);
	$status=doUpdate("ambit_brand",$_POST,array("ab_id"=>$_POST["ab_id"]));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

//Delete Country
if(isset($_POST["msg"]) && $_POST["msg"]=='delete_brand'){
	unset($_POST["msg"]);
	$status=doDelete("ambit_brand",$_POST);
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=='get_desc'){
	unset($_POST["msg"]);
    echo seeMoreDetails("asb_desc","ambit_suggest_brand",array("asb_id"=>$_POST["asb_id"]));
}

if(isset($_POST["msg"]) && $_POST["msg"]=='add_suggest_brand'){
	unset($_POST["msg"]);
	$brand=seeMoreDetails("asb_name","ambit_suggest_brand",array("asb_id"=>$_POST["asb_id"]));
	doDelete("ambit_suggest_brand",array("asb_id"=>$_POST["asb_id"]));
	$status=doInsert(array("ab_name"=>$brand),"ambit_brand");
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=='delete_suggest_brand'){
	unset($_POST["msg"]);	
	$status=doDelete("ambit_suggest_brand",array("asb_id"=>$_POST["asb_id"]));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
?>
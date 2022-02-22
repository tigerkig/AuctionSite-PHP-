<?php
require_once("function.php");
//print_r($_POST);
if(isset($_POST["msg"]) && trim($_POST["msg"]=="approve_slider")){
	unset($_POST["msg"]);
$val=seeMoreDetails("status","ambit_add_slider",$_POST);
if($val==0){
	$status=1;
}else{
	$status=0;
}
$s=doUpdate1("ambit_add_slider",array("status"=>$status),$_POST);
//doUpdate1("ambit_product_image",array("status"=>$status),array("api_apa_id"=>$_POST["apa_id"]));
if($s){
	echo 1;
}else{
	echo 0;
}
}

if(isset($_POST["msg"]) && trim($_POST["msg"]=="delete_slider")){
	unset($_POST["msg"]);
$prev_image=seeMoreDetails("aas_slider","ambit_add_slider",$_POST);

$status=doDelete("ambit_add_slider",$_POST);
if($status){
	if(file_exists("../image/demo/slider/".$prev_image)){
		unlink("../image/demo/slider/".$prev_image);
	}
	echo 1;
}else{
	echo 0;
}
}

if(isset($_POST["msg"]) && trim($_POST["msg"]=="update_slider")){
	if(trim($_POST["aas_link"]) != "#" && trim($_POST["aas_link"]) != ""){
	$link='product.php?id=';
$link.=trim($_POST["aas_link"]);
}else{
	$link="#";
}
	unset($_POST["msg"]);
	unset($_POST["aas_link"]);
$status=doUpdate1("ambit_add_slider",array("aas_link"=>$link),$_POST);
if($status){
	echo 1;
}else{
	echo 0;
}
}
?>
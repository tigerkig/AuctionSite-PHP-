<?php
require_once("function.php");
//print_r($_POST);
if(isset($_POST["msg"]) && trim($_POST["msg"]=="approve_banner")){
	unset($_POST["msg"]);
$val=seeMoreDetails("status","ambit_add_banner",$_POST);
if($val==0){
	$status=1;
}else{
	$status=0;
}
$s=doUpdate1("ambit_add_banner",array("status"=>$status),$_POST);
//doUpdate1("ambit_product_image",array("status"=>$status),array("api_apa_id"=>$_POST["apa_id"]));
if($s){
	echo 1;
}else{
	echo 0;
}
}

if(isset($_POST["msg"]) && trim($_POST["msg"]=="delete_banner")){
	unset($_POST["msg"]);
$prev_image=seeMoreDetails("aab_banner","ambit_add_banner",$_POST);

$status=doDelete("ambit_add_banner",$_POST);
if($status){
	if(file_exists("../image/demo/cms/".$prev_image)){
		unlink("../image/demo/cms/".$prev_image);
	}
	echo 1;
}else{
	echo 0;
}
}

if(isset($_POST["msg"]) && trim($_POST["msg"]=="update_banner")){
	if(trim($_POST["aab_link"]) != "#" && trim($_POST["aab_link"]) != ""){
	$link='product.php?id=';
$link.=trim($_POST["aab_link"]);
}else{
	$link="#";
}
	unset($_POST["msg"]);
	unset($_POST["aab_link"]);
$status=doUpdate1("ambit_add_banner",array("aab_link"=>$link),$_POST);
if($status){
	echo 1;
}else{
	echo 0;
}
}
?>
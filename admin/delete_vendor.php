<?php
require_once("function.php");
$status=doDelete("vendor_registration",$_POST);
if($status){
	$product_id=getDetails(doSelect("apa_id","ambit_product_add",array("apa_vr_id"=>$_POST["vr_id"])));
	$status=doDelete("ambit_product_add",array("apa_vr_id"=>$_POST["vr_id"]));
}
if($status){
	foreach($product_id as $k=>$v){
	$status=doDelete("ambit_product_image",array("api_apa_id"=>$v["apa_id"]));
	}
}
if($status){
	echo 1;
}else{
	echo 0;
}
?>
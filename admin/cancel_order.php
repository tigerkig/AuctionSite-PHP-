<?php
session_start();
require_once("function.php");
$ass_id=trim($_POST["ass_id"]);
$status=doUpdate1("ambit_shipment_status",array("cancel_status"=>1),$_POST);
$order_id=seeMoreDetails("order_id","ambit_shipment_status",$_POST);
$apa_id=trim(seeMoreDetails("ass_apa_id","ambit_shipment_status",$_POST));
$product_details=trim(seeMoreDetails("product_details","ambit_buy_product",array("id"=>$order_id)));
$ex_product_details=explode("||",$product_details);

foreach($ex_product_details as $k=>$v){
	$product=explode(":",$v);
	if($apa_id==trim($product[0])){
		$key=$k;
	}
	
}
unset($ex_product_details[$key]);

$ex_product_details=implode("||",$ex_product_details);

if($status){
$status=doUpdate("ambit_buy_product",array("product_details"=>$ex_product_details),array("id"=>$order_id));
}
if($status){
	echo 1;
}else{
	echo 0;
}
?>
<?php
session_start();
require_once("function.php");

$status=doUpdate("ambit_shipment_status",array("payment_transfer"=>1),$_POST);
if($status){
	
	//$balance=currency_price(trim(seeMoreDetails("currency","ambit_shipment_status",array("ass_id"=>$_POST["ass_id"]))),trim(seeMoreDetails("price","ambit_shipment_status",array("ass_id"=>$_POST["ass_id"]))));
	$productDetails=getDetails(doSelect1("posting_type, listing_duration, reserve_price","ambit_product_add",array("apa_id"=>$_POST["ass_apa_id"])));
	if($productDetails[0]["posting_type"] ==1 ){
	//if($productDetails[0]["listing_duration"] != '0000-00-00' ){
		$balance = $productDetails[0]["reserve_price"];
	}else{
		$balance 	= getPrice($_POST["ass_apa_id"]) - getTax($_POST["ass_apa_id"]) - getDiscount($_POST["ass_apa_id"]) + getShippingCost($_POST["ass_apa_id"]);
	
	} 
    $quantity=trim(seeMoreDetails("quantity","ambit_shipment_status",array("ass_id"=>$_POST["ass_id"])));

	$commision=explode("||",get_site_settings(30)); 
    $min_chrng=$commision[0]*$quantity;
    $percentage=$commision[1];
    $c_blnc=($percentage/100)*$balance;
    if($c_blnc < $min_chrng){
    	$balance=$balance-$min_chrng;
    }else{
    	$balance=$balance-$c_blnc;
    }

	$balance1=seeMoreDetails("balance","ambit_vendor_balance",array("avb_vr_id"=>$_POST["ass_vr_id"]));
	$balance=$balance + $balance1;
	doUpdate("ambit_vendor_balance",array("avb_vr_id"=>$_POST["ass_vr_id"],"balance"=>$balance),array("avb_vr_id"=>$_POST["ass_vr_id"]));
	echo 1;
}else{
	echo 0;
}


?>
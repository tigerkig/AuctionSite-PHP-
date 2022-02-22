<?php
require_once("function.php");
$status		=	seeMoreDetails("shipment_status","ambit_shipment_status",$_POST);
$ac_id		=	seeMoreDetails("ass_ac_id","ambit_shipment_status",$_POST);
$apa_id		=	seeMoreDetails("ass_apa_id","ambit_shipment_status",$_POST);
$vendor		=	seeMoreDetails("ass_vr_id","ambit_shipment_status",$_POST);
if($status==0){
	$status=1;
}else{
	$status=0;
}
$status		=doUpdate("ambit_shipment_status",array("shipment_status"=>$status),$_POST);
$quantity	=trim(seeMoreDetails("quantity",'ambit_shipment_status',$_POST));
$stock		=trim(seeMoreDetails("stock",'ambit_product_add',array("apa_id"=>$apa_id)));
$stock		=$stock-$quantity;
doUpdate("ambit_product_add",array("stock"=>$stock),array("apa_id"=>$apa_id));
	
//mail send to Customer
$from=get_site_settings(23);
$to = trim(seeMoreDetails("email","ambit_customer",array("ac_id"=>$_SESSION["ac_id"])));

$subject = "Confirmation Message";
$string =get_mail_settings(3);
$patterns = array();
$patterns[0] = '/VENDOR/';
$patterns[1] = '/CUSTOMER/';
$patterns[2] = '/PRODUCT/';
$replacements = array();
$replacements[2] =getVendorName($vendor);
$replacements[1] =getCustomerName($ac_id);
$replacements[0] =getProductName($apa_id);
$txt=preg_replace($patterns, $replacements, $string);
$headers = "From: ".$from. "\r\n" ."CC: ".$to;
mail($to,$subject,$txt,$headers);

//mail send to Vendor
$from=get_site_settings(23);
$to = trim(seeMoreDetails("email","vendor_registration",array("vr_id"=>$vendor)));

$subject = "Confirmation Message";
$string =get_mail_settings(1);
$patterns = array();
$patterns[0] = '/VENDOR/';
$patterns[1] = '/CUSTOMER/';
$patterns[2] = '/PRODUCT/';
$replacements = array();
$replacements[2] =getVendorName($vendor);
$replacements[1] =getCustomerName($ac_id);
$replacements[0] =getProductName($apa_id);
$txt=preg_replace($patterns, $replacements, $string);
$headers = "From: ".$from. "\r\n" ."CC: ".$to;
mail($to,$subject,$txt,$headers);


?>
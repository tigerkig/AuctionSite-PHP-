<?php
require_once("function.php");

$result=getDetails(doSelect("ass_id, ass_apa_id, ass_ac_id, ass_vr_id, shipment_status","ambit_shipment_status",$_POST));
$status = $result[0]['shipment_status'];
$ac_id  = $result[0]['ass_ac_id'];
$apa_id = $result[0]['ass_apa_id'];
$vr_id  = $result[0]['ass_vr_id'];

$product_name = seeMoreDetails("name","ambit_product_add",array('apa_id'=>$apa_id));

if($status==0){
	$status=1;
}else{
	$status=0;
}
$status=doUpdate("ambit_shipment_status",array("shipment_status"=>$status),$_POST);


$vendorName = getVendorName($vr_id);

//mail send to Customer
$from=get_site_settings(23);
$to = trim(seeMoreDetails("email","ambit_customer",array("ac_id"=>$ac_id)));

$subject = "Confirmation Message";

$txt = "Hi, buyer.\n The product ".$product_name." has shipped by seller ".$vendorName.".\nPlease check it.\nThank you.";
$headers = "From: ".$from. "\r\n" ."CC: ".$to;
mail($to,$subject,$txt,$headers);


			
//mail send to admin
$from=get_site_settings(23);
$to = $from;

$subject = "Confirmation Message";
$txt = "Hi, Admin.\n The product ".$product_name." has shipped by seller ".$vendorName.".\nPlease check it.\nThank you.";
$headers = "From: ".$from. "\r\n" ."CC: ".$to;
mail($to,$subject,$txt,$headers);
		
?>
<?php
session_start();
require_once("function.php");
$status = doUpdate("ambit_shipment_status",array("delivery_status"=>"1"),array("ass_id"=>$_POST["ass_id"]));
if($status){
	//mail send to Admin
	//$from=get_site_settings(23);
	$ac_id = trim(seeMoreDetails("ass_ac_id","ambit_shipment_status",array("ass_id"=>$_POST["ass_id"])));
	$buyer_email = trim(seeMoreDetails("email","ambit_customer",array("ac_id"=>$ac_id)));
	$from = $buyer_email;
	$to   = get_site_settings(23);

	$subject = "Confirmation Message";
	$txt =get_mail_settings(6);
	$headers = "From: ".$from. "\r\n" ."CC: ".$to;
	mail($to,$subject,$txt,$headers);	
	
	echo 1;
}else{
	echo 0;
}
?>
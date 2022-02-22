<?php
session_start();
require_once("function.php");

$status=doInsert(array("aw_vr_id"=>$_SESSION["vendor_id"],"aw_withdraw_amnt"=>$_POST["withdraw_amnt"],"bank_account_paypal_email"=>$_POST["bank_account_paypal_email"], "bank_routing_no"=>$_POST["bank_routing_no"]),"ambit_withdraw");
if($status){
	
	//mail send to Admin
	//$from=get_site_settings(23);
	$from = trim(seeMoreDetails("email","vendor_registration",array("vr_id"=>$_SESSION["vendor_id"])));
	$to   = get_site_settings(23);

	$subject = "Confirmation Message";
	$txt =get_mail_settings(7);
	$headers = "From: ".$from. "\r\n" ."CC: ".$to;
	mail($to,$subject,$txt,$headers);	
	
	echo 1;
}else{
	echo 0;
}

?>
<?php
session_start();
require_once("function.php");

$return_detail = getDetails(doSelect3("SELECT a.vr_id, b.arp_ac_id FROM vendor_registration AS a JOIN ambit_return_product AS b ON a.vr_id=b.arp_vr_id WHERE arp_id=".$_POST["arp_id"]));

//mail send to seller
		
		$subject  = "Confirmation Message";
		$customer = getCustomerName($return_detail[0]["arp_ac_id"]);
		$vendor   = getVendorName($return_detail[0]["vr_id"]);
		
		$email=getDetails(doSelect1("email","vendor_registration",array("vr_id"=>$return_detail[0]["vr_id"])));
		$email=$email[0]["email"];
		
		$from = get_site_settings(23);
		$to   = $email;
		
		$string   = "Hi, ".$vendor.".\nBuyer ".$customer." returned some products.\nThanks.";
		
		//$product =getCustomerName($_v["ass_ac_id"]);	
		
		$headers = "From: ".$from. "\r\n" ."CC: ".$to;
		mail($to,$subject,$string,$headers);


$status=doUpdate("ambit_return_product",array("send_vendor"=>1),$_POST);
if($status){
	echo 1;
}else{
	echo 0;
}

?>
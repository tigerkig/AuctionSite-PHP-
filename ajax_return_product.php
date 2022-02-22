<?php
session_start();
require_once("function.php");
//print_r($_POST);
$status=doInsert($_POST,"ambit_return_product");
if($status){
	
	

	//mail send to Vendor
				
		$subject  = "Confirmation Message";
		$customer = getCustomerName($_POST["arp_ac_id"]);
		$vendor   = getVendorName($_POST["arp_vr_id"]);
		
		$email=getDetails(doSelect1("email","vendor_registration",array("vr_id"=>$_POST["arp_vr_id"])));
		$email=$email[0]["email"];
		
		$from = get_site_settings(23);
		$to   = $email;
		
		$string   = "Hi, ".$vendor.".\nCustomer ".$customer." returned some products.\nThanks.";
		
		//$product =getCustomerName($_v["ass_ac_id"]);	
		
		$headers = "From: ".$from. "\r\n" ."CC: ".$to;
		mail($to,$subject,$string,$headers);


		//mail send to Admin
		$from = get_site_settings(23);
		$to   = $from;

		$subject = "Confirmation Message";
		$string   = "Hi, admin.\nCustomer ".$customer." returned some products.\nThanks.";
		
		$headers = "From: ".$from. "\r\n" ."CC: ".$to;
		mail($to,$subject,$txt,$headers);
	
	
	
	echo 1;
}else{
	echo 0;
}
?>
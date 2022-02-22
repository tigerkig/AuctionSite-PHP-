<?php
session_start();
require_once("function.php");
$status=doUpdate("ambit_return_product",array("return_status"=>1),$_POST);

$ass_id = getDetails(doSelect1("arp_ass_id", "ambit_return_product", $_POST));
$ass_id = $ass_id[0]["arp_ass_id"];

$status=doUpdate("ambit_shipment_status",array("shipment_status"=>0),array("ass_id" => $ass_id));

//mail send to Admin
	$from=get_site_settings(23);
	$to =get_site_settings(23);

	$subject = "Confirmation Message";	
	$txt	 =	"The seller has received the returned product.\nPlease return the money to the buyer.";
	$headers = "From: ".$from. "\r\n" ."CC: ".$to;
	mail($to,$subject,$txt,$headers);

if($status){
	echo 1;
}else{
	echo 0;
}

?>
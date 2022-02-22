<?php
session_start();
require_once("function.php");
$_POST["abp_ac_id"]	=	$_SESSION["ac_id"];
//print_r($_POST);
$_POST["currency"]	=	put_currency();
$status		=	doInsert($_POST,"ambit_buy_product");
$recent_id	=	newly_insert_id();

if(isset($_GET["msg"]) && trim($_GET["msg"]=="COD")){

	$product_id=getDetails(doSelect("currency,product_details","ambit_buy_product",array("id"=>$recent_id)));	
	$product_dtls=explode("||",$product_id[0]["product_details"]);
	$currency=$product_id[0]["currency"];
	foreach($product_dtls as $k=>$v){
		$details=explode(":",$v);
		$vendor=seeMoreDetails("apa_vr_id","ambit_product_add",array("apa_id"=>$details[0]));
		$price=$details[2];
		$field=array("ass_apa_id"=>$details[0],"ass_ac_id"=>$_SESSION["ac_id"],"ass_vr_id"=>$vendor,"quantity"=>$details[1],"currency"=>$currency,"price"=>$price,"order_id"=>$recent_id,"payment_status"=>"2");
		doInsert($field,"ambit_shipment_status");
		
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
		$replacements[1] =getCustomerName($_SESSION["ac_id"]);
		$replacements[0] =getProductName($details[0]);
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
		$replacements[1] =getCustomerName($_SESSION["ac_id"]);
		$replacements[0] =getProductName($details[0]);
		$txt=preg_replace($patterns, $replacements, $string);
		$headers = "From: ".$from. "\r\n" ."CC: ".$to;
		mail($to,$subject,$txt,$headers);


		//mail send to Admin
		$from=get_site_settings(23);
		$to =get_site_settings(23);

		$subject = "Confirmation Message";
		$string =get_mail_settings(2);
		$patterns = array();
		$patterns[0] = '/VENDOR/';
		$patterns[1] = '/CUSTOMER/';
		$patterns[2] = '/PRODUCT/';
		$replacements = array();
		$replacements[2] =getVendorName($vendor);
		$replacements[1] =getCustomerName($_SESSION["ac_id"]);
		$replacements[0] =getProductName($details[0]);
		$txt=preg_replace($patterns, $replacements, $string);
		$headers = "From: ".$from. "\r\n" ."CC: ".$to;
		mail($to,$subject,$txt,$headers);

	}
	
}

if(isset($_GET["msg"]) && trim($_GET["msg"]=="PAYPAL")){
	$pro_id_dtls=explode("||",$_POST["product_details"]);
	foreach($pro_id_dtls as $k=>$v){
		$pro_id 			=	explode(":",trim($v));
		$prev_popularity	=	seeMoreDetails("popularity","ambit_product_add",array("apa_id"=>trim($pro_id[0])));
		$prev_popularity	=	trim($prev_popularity)+trim($pro_id[1]);
		
		doUpdate("ambit_product_add",array("popularity"=>$prev_popularity),array("apa_id"=>trim($pro_id[0])));
		
			$vendor		=	seeMoreDetails("apa_vr_id","ambit_product_add",array("apa_id"=>$pro_id[0]));
			$price		=	$pro_id[2];
			$currency	=	put_currency();
			$field		=	array("ass_apa_id"=>$pro_id[0],"ass_ac_id"=>$_SESSION["ac_id"],"ass_vr_id"=>$vendor,"quantity"=>$pro_id[1],"currency"=>$currency,"price"=>$price,"order_id"=>$recent_id,"payment_status"=>"0");//payment_status=1

			doInsert($field,"ambit_shipment_status");
			
			/*$stock		=	seeMoreDetails("stock","ambit_product_add",array("apa_id"=>$pro_id[0]));
			if($stock == $pro_id[1]){
				$status=doUpdate("ambit_product_add",array('posting_type' => 0, "stock"=> 0,"status" => 0),array("apa_id"=>$pro_id[0]));
			}elseif($stock > $pro_id[1]){
				$tmp = $stock - $pro_id[1];
				$status=doUpdate("ambit_product_add",array('posting_type' => 0, "stock"=> $tmp),array("apa_id"=>$pro_id[0]));
			}*/
				
		/*	
			
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
			$replacements[1] =getCustomerName($_SESSION["ac_id"]);
			$replacements[0] =getProductName($pro_id[0]);
			$txt=preg_replace($patterns, $replacements, $string);
			$headers = "From: ".$from. "\r\n" ."CC: ".$to;
			mail($to,$subject,$txt,$headers);*/

			//mail send to Vendor
			$from	= get_site_settings(23);
			$to 	= trim(seeMoreDetails("email","vendor_registration",array("vr_id"=>$vendor)));

			$subject = "Confirmation Message";
			
			$vendorName 	= getVendorName($vendor);
			$customerName 	= getCustomerName($_SESSION["ac_id"]);
			$productName	= getProductName($pro_id[0]);
			$txt 	 = 'Hi, '.$vendorName.'.\n'.$customerName.' has ordered the product "'.$productName.'".\n';
			$txt 	 .= $_POST["comments"];
			$headers = "From: ".$from. "\r\n" ."CC: ".$to;
			mail($to,$subject,$txt,$headers);

			/*
			//mail send to Admin
			$from=get_site_settings(23);
			$to =get_site_settings(23);

			$subject = "Confirmation Message";
			$string =get_mail_settings(2);
			$patterns = array();
			$patterns[0] = '/VENDOR/';
			$patterns[1] = '/CUSTOMER/';
			$patterns[2] = '/PRODUCT/';
			$replacements = array();
			$replacements[2] =getVendorName($vendor);
			$replacements[1] =getCustomerName($_SESSION["ac_id"]);
			$replacements[0] =getProductName($pro_id[0]);
			$txt=preg_replace($patterns, $replacements, $string);
			$headers = "From: ".$from. "\r\n" ."CC: ".$to;
			mail($to,$subject,$txt,$headers);*/
	}


}




if(isset($_GET["msg"]) && trim($_GET["msg"]=="qrcode")){
	$pro_id_dtls=explode("||",$_POST["product_details"]);
	foreach($pro_id_dtls as $k=>$v){
		$pro_id 			=	explode(":",trim($v));
		$prev_popularity	=	seeMoreDetails("popularity","ambit_product_add",array("apa_id"=>trim($pro_id[0])));
		$prev_popularity	=	trim($prev_popularity)+trim($pro_id[1]);
		
		doUpdate("ambit_product_add",array("popularity"=>$prev_popularity),array("apa_id"=>trim($pro_id[0])));
		
			$vendor		=	seeMoreDetails("apa_vr_id","ambit_product_add",array("apa_id"=>$pro_id[0]));
			$price		=	$pro_id[2];
			$currency	=	put_currency();
			//$field		=	array("ass_apa_id"=>$pro_id[0],"ass_ac_id"=>$_SESSION["ac_id"],"ass_vr_id"=>$vendor,"quantity"=>$pro_id[1],"currency"=>$currency,"price"=>$price,"order_id"=>$recent_id,"payment_status"=>"0");//payment_status=1
			$field		=	array("ass_apa_id"=>$pro_id[0],"ass_ac_id"=>$_SESSION["ac_id"],"ass_vr_id"=>$vendor,"quantity"=>$pro_id[1],"currency"=>$currency,"price"=>$price,"order_id"=>$recent_id,"payment_status"=>"1");//payment_status=1

			doInsert($field,"ambit_shipment_status");
			
			$stock		=	seeMoreDetails("stock","ambit_product_add",array("apa_id"=>$pro_id[0]));
			if($stock == $pro_id[1]){
				$status=doUpdate("ambit_product_add",array('posting_type' => 0, "stock"=> 0,"status" => 0),array("apa_id"=>$pro_id[0]));
			}elseif($stock > $pro_id[1]){
				$tmp = $stock - $pro_id[1];
				$status=doUpdate("ambit_product_add",array('posting_type' => 0, "stock"=> $tmp),array("apa_id"=>$pro_id[0]));
			}
				
			
			
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
			$replacements[1] =getCustomerName($_SESSION["ac_id"]);
			$replacements[0] =getProductName($pro_id[0]);
			$txt=preg_replace($patterns, $replacements, $string);
			$headers = "From: ".$from. "\r\n" ."CC: ".$to;
			mail($to,$subject,$txt,$headers);

			//mail send to Vendor
			$from	= get_site_settings(23);
			$to 	= trim(seeMoreDetails("email","vendor_registration",array("vr_id"=>$vendor)));

			$subject = "Confirmation Message";
			
			/*$vendorName 	= getVendorName($vendor);
			$customerName 	= getCustomerName($_SESSION["ac_id"]);
			$productName	= getProductName($pro_id[0]);*/
			//$txt 	 = 'Hi, '.$vendorName.'.\n'.$customerName.' has ordered the product "'.$productName.'".\n';
			//$txt 	 .= $_POST["comments"];
		
			$string =get_mail_settings(1);
			$patterns = array();
			$patterns[0] = '/VENDOR/';
			$patterns[1] = '/CUSTOMER/';
			$patterns[2] = '/PRODUCT/';
			$replacements = array();
			$replacements[2] =getVendorName($vendor);
			$replacements[1] =getCustomerName($_SESSION["ac_id"]);
			$replacements[0] =getProductName($pro_id[0]);
			$txt=preg_replace($patterns, $replacements, $string);
			$headers = "From: ".$from. "\r\n" ."CC: ".$to;
			mail($to,$subject,$txt,$headers);


			
			//mail send to Admin
			$from=get_site_settings(23);
			$to =get_site_settings(23);

			$subject = "Confirmation Message";
			$string =get_mail_settings(2);
			$patterns = array();
			$patterns[0] = '/VENDOR/';
			$patterns[1] = '/CUSTOMER/';
			$patterns[2] = '/PRODUCT/';
			$replacements = array();
			$replacements[2] =getVendorName($vendor);
			$replacements[1] =getCustomerName($_SESSION["ac_id"]);
			$replacements[0] =getProductName($pro_id[0]);
			$txt=preg_replace($patterns, $replacements, $string);
			$headers = "From: ".$from. "\r\n" ."CC: ".$to;
			mail($to,$subject,$txt,$headers);
	}


}


$_SESSION["order_id"]=$recent_id;
if($status){
	doDelete("ambit_add2cart",array("aad_cart_ac_id"=>$_SESSION["ac_id"]));
	echo $recent_id;
}else{
	echo 0;
}



?>
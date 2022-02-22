
<?php
session_start();
require_once("function.php");
$field=array();
$field["abp_ac_id"]=$_SESSION["ac_id"];
//print_r($_POST);
$field["currency"]=put_currency();
$field["payment_method"]=$_POST["payment_method"];
$field["amount"]=$_POST["amount"];
$field["custom"]=$_POST["custom"];
$field["comments"]=$_POST["comments"];
$field["status"]=1;
$details_custom=explode("||",$_POST["custom"]);
$ambit_product_bid_id=$details_custom[3];
$field["bid_id"]=$ambit_product_bid_id;

//$field["auction_flag"]=1;



$status=doInsert($field,"ambit_buy_product_auction");
//$status=doInsert($field,"ambit_buy_product");
$recent_id=newly_insert_id();
if(isset($_GET["msg"]) && trim($_GET["msg"]=="COD")){


	$custom=explode("||",$_POST["custom"]);
	$vendor=seeMoreDetails("apa_vr_id","ambit_product_add",array("apa_id"=>$custom[0]));
	$field=array("ass_apa_id"=>$custom[0],"ass_ac_id"=>$_SESSION["ac_id"],"ass_vr_id"=>$vendor,"quantity"=>1,"currency"=>put_currency(),"price"=>$_POST["amount"],"order_id"=>$recent_id,"payment_status"=>"1","auction_flag"=>1);
	doInsert($field,"ambit_shipment_status");
	doUpdate("ambit_product_bid",array("purchase_status"=>1),array("id"=>$ambit_product_bid_id));
		
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
	$replacements[0] =getProductName($custom[0]);
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
	$replacements[0] =getProductName($custom[0]);
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
	$replacements[0] =getProductName($custom[0]);
	$txt=preg_replace($patterns, $replacements, $string);
	$headers = "From: ".$from. "\r\n" ."CC: ".$to;
	mail($to,$subject,$txt,$headers);


	
}

if(isset($_GET["msg"]) && trim($_GET["msg"]=="PAYPAL")){


	$custom=explode("||",$_POST["custom"]);
	$vendor=seeMoreDetails("apa_vr_id","ambit_product_add",array("apa_id"=>$custom[0]));
	$field=array("ass_apa_id"=>$custom[0],"ass_ac_id"=>$_SESSION["ac_id"],"ass_vr_id"=>$vendor,"quantity"=>1,"currency"=>put_currency(),"price"=>$_POST["amount"],"order_id"=>$recent_id,"payment_status"=>"0","auction_flag"=>1);
	doInsert($field,"ambit_shipment_status");
	
	//mail send to Vendor
	$from	= get_site_settings(23);
	$to 	= trim(seeMoreDetails("email","vendor_registration",array("vr_id"=>$vendor)));

	$subject = "Confirmation Message";
	
	$vendorName 	= getVendorName($vendor);
	$customerName 	= getCustomerName($_SESSION["ac_id"]);
	$productName	= getProductName($custom[0]);
	$txt 	 = 'Hi, '.$vendorName.'.\n'.$customerName.' has ordered the product "'.$productName.'".\n';
	$txt 	 .= $_POST["comments"];
	$headers = "From: ".$from. "\r\n" ."CC: ".$to;
	mail($to,$subject,$txt,$headers);
	
}

if(isset($_GET["msg"]) && trim($_GET["msg"]=="qrcode")){


	$custom=explode("||",$_POST["custom"]);
	$vendor=seeMoreDetails("apa_vr_id","ambit_product_add",array("apa_id"=>$custom[0]));
	//$field=array("ass_apa_id"=>$custom[0],"ass_ac_id"=>$_SESSION["ac_id"],"ass_vr_id"=>$vendor,"quantity"=>1,"currency"=>put_currency(),"price"=>$_POST["amount"],"order_id"=>$recent_id,"payment_status"=>"0","auction_flag"=>1);
	$field=array("ass_apa_id"=>$custom[0],"ass_ac_id"=>$_SESSION["ac_id"],"ass_vr_id"=>$vendor,"quantity"=>1,"currency"=>put_currency(),"price"=>$_POST["amount"],"order_id"=>$recent_id,"payment_status"=>"1","auction_flag"=>1);
	doInsert($field,"ambit_shipment_status");
	
		
	doUpdate("ambit_buy_product_auction",array("status"=>2,"paid_ammount"=>$amount),array("bid_id"=>$ambit_product_bid_id));
	
	
		$vendor=seeMoreDetails("apa_vr_id","ambit_product_add",array("apa_id"=>$custom[0]));
			
		//doUpdate("ambit_shipment_status",array("payment_status"=>"1"),array("order_id"=>$order_id));
		
		doUpdate("ambit_product_bid",array("purchase_status"=>1),array("id"=>$ambit_product_bid_id));
	

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
		$replacements[0] =getProductName($custom[0]);
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
		$replacements[0] =getProductName($custom[0]);
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
		$replacements[0] =getProductName($custom[0]);
		$txt=preg_replace($patterns, $replacements, $string);
		$headers = "From: ".$from. "\r\n" ."CC: ".$to;
		mail($to,$subject,$txt,$headers);
		
		
		$status=doUpdate("ambit_product_add",array('posting_type' => 0, "stock"=> 0),array("apa_id"=>$custom[0]));
	
}


$_SESSION["order_id"]=$recent_id;
echo $recent_id;


?>
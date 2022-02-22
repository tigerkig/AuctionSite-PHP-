<?php
require_once("function.php");

$product_detail 	= getDetails(doSelect1("posting_type,listing_duration,posting_date","ambit_product_add",array("apa_id"=>$_POST["apa_id"])));
$listing_duration   = $product_detail[0]['listing_duration'];
$posting_date		= $product_detail[0]['posting_date'];

if($listing_duration == '0000-00-00' ){
	$shipment_status = trim(seeMoreDetails("ass_apa_id","ambit_shipment_status",array("ass_apa_id"=>$_POST["apa_id"], "payment_status"=>1)));	
	
	if($shipment_status != NULL){
		$status = doUpdate("ambit_product_add",array("status"=>0),array("apa_id"=>$_POST["apa_id"]));	
	}else{
		$status=doDelete("ambit_product_add",$_POST);
			if($status){
				$status=doDelete("ambit_product_image",array("api_apa_id"=>$_POST["apa_id"]));

				doDelete("ambit_product_bid",array("apa_id"=>$_POST["apa_id"]));
				doDelete("ambit_add2cart",array("aad_cart_apa_id"=>$_POST["apa_id"]));
				doDelete("ambit_add2wish",array("aaw_apa_id"=>$_POST["apa_id"]));

				doDelete("ambit_shipment_status",array("ass_apa_id"=>$_POST["apa_id"]));
				doDelete("ambit_return_product",array("arp_apa_id"=>$_POST["apa_id"]));
				doDelete("ambit_product_review",array("apr_apa_id"=>$_POST["apa_id"]));
			}
	}
		
}else{
	$shipment_status = trim(seeMoreDetails("ass_apa_id","ambit_shipment_status",array("ass_apa_id"=>$_POST["apa_id"], "payment_status"=>1)));
		
	if($shipment_status != NULL){
		$status = doUpdate("ambit_product_add",array("status"=>0),array("apa_id"=>$_POST["apa_id"]));	
	}else{
		$shipment_status = trim(seeMoreDetails("ass_apa_id","ambit_shipment_status",array("ass_apa_id"=>$_POST["apa_id"], "auction_flag"=>1)));
		
		if($shipment_status != NULL){
			$status = 2;
			$alert = "The product cannot be deleted during auction.";
		}else{
			$status=doDelete("ambit_product_add",$_POST);
			if($status){
				$status=doDelete("ambit_product_image",array("api_apa_id"=>$_POST["apa_id"]));

				doDelete("ambit_product_bid",array("apa_id"=>$_POST["apa_id"]));
				doDelete("ambit_add2cart",array("aad_cart_apa_id"=>$_POST["apa_id"]));
				doDelete("ambit_add2wish",array("aaw_apa_id"=>$_POST["apa_id"]));

				doDelete("ambit_shipment_status",array("ass_apa_id"=>$_POST["apa_id"]));
				doDelete("ambit_return_product",array("arp_apa_id"=>$_POST["apa_id"]));
				doDelete("ambit_product_review",array("apr_apa_id"=>$_POST["apa_id"]));
			}
		}
	}
}

if($status == 1){
	echo 1;
}elseif($status == 0){
	echo 0;
}elseif($status == 2){
	echo $alert;
}
?>
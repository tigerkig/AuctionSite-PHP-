<?php
session_start();
require_once("function.php");

if(isset($_POST["msg"]) && trim($_POST["msg"])=='login'){
	$quantity=trim($_POST["quantity"]);
	$product_id=trim($_POST["aad_cart_apa_id"]);	
	
	$stock = seeMoreDetails("stock","ambit_product_add",array("apa_id"=>$product_id));
	if($stock < $quantity){
		$quantity = $stock;
		echo 0;
	}else{
		echo 1;
	}
	$productDetails = getDetails(doSelect1("posting_type","ambit_product_add",array("apa_id"=>$product_id)));
	if($productDetails[0]["posting_type"] == 1){
		$quantity = 1;
	}			

		$price=currency_price(currency($product_id),getPrice($product_id)*$quantity);
		$discount=currency_price(currency($product_id),getDiscount($product_id)*$quantity);
		$tax=currency_price(currency($product_id),getTax($product_id)*$quantity);
		$shipping_cost=currency_price(currency($product_id),getShippingCost($product_id)*$quantity);	
		
		// $price += $shipping_cost;	
		$price += $shipping_cost - $discount;
		
	$field=array("currency"=>put_currency(),"price"=>$price,"discount"=>$discount,"tax"=>$tax,"shipping_cost"=>$shipping_cost,"quantity"=>$quantity);
	doUpdate('ambit_add2cart',$field,array("aad_cart_id"=>$_POST["aad_cart_id"]));
	
}

if(isset($_POST["msg"]) && trim($_POST["msg"])=='with_out_login'){
	if(isset($_SESSION["add2cart"]) && trim($_SESSION["add2cart"])!=""){
		$cart_details=explode("//",$_SESSION["add2cart"]);
		foreach($cart_details as $key1=>$val){
			$pro_id=explode("||",$val);
			
			if($key1==trim($_POST["id"])){
				//$cart_details[$key1]=$pro_id[0].'||'.$_POST["quantity"];
				$productDetails = getDetails(doSelect1("posting_type,stock","ambit_product_add",array("apa_id"=>$pro_id[0])));
				
				$stock = $productDetails[0]["stock"];
				if($stock < $_POST["quantity"]){
					$_POST["quantity"] = $stock;
					echo 0;
				}else{
					echo 1;
				}
				if($productDetails[0]["posting_type"] == 1){
					$cart_details[$key1]=$pro_id[0].'||1';	
				}else{
					$cart_details[$key1]=$pro_id[0].'||'.$_POST["quantity"];
				}				
			}			
		}			
	}
	$_SESSION["add2cart"]=implode("//",$cart_details);
}
?>
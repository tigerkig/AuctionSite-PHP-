<?php
session_start();
#pattern :::   product_id || quantity // product_id || quantity // product_id || quantity......
require_once("function.php");
$temp="";
	

if(isset($_SESSION["add2cart"])){
	$temp=$_SESSION["add2cart"].'//';
}
$_SESSION["add2cart"]=$temp.$_POST["product_id"].'||'.$_POST["quantity"];
if(isset($_SESSION["ac_id"])){
	if(isset($_SESSION["add2cart"]) && trim($_SESSION["add2cart"])!=""){
		$cart_details=explode("//",$_SESSION["add2cart"]);
		$pro_id=explode("||",end($cart_details));
		$price			=	currency_price(currency($pro_id[0]),trim(getPrice($pro_id[0]))*trim($pro_id[1])); //pro_id[0]=>product_id, pro_id[1]=>quantity
		$discount		=	currency_price(currency($pro_id[0]),trim(getDiscount($pro_id[0]))*trim($pro_id[1]));
		$tax			=	currency_price(currency($pro_id[0]),trim(getTax($pro_id[0]))*trim($pro_id[1]));
		$shipping_cost	=	currency_price(currency($pro_id[0]),trim(getShippingCost($pro_id[0]))*trim($pro_id[1]));
		
		// $price += $shipping_cost;
		$price += $shipping_cost - $discount;
	}
	
	$field=array("aad_cart_ac_id"=>$_SESSION["ac_id"],"aad_cart_apa_id"=>$pro_id[0],"currency"=>put_currency(),"price"=>$price,"discount"=>$discount,"tax"=>$tax,"shipping_cost"=>$shipping_cost,"quantity"=>$pro_id[1]);
	
	$posting_type = seeMoreDetails("posting_type", "ambit_product_add", array("apa_id" => $pro_id[0]));
	if($posting_type != 1){
		doInsert($field,'ambit_add2cart');
	}
	
	unset($_SESSION["add2cart"]);
}






$price=0;
$discount=0;
$tax=0;
$shipping_cost=0;
$count=0;
if(!isset($_SESSION["ac_id"])){
	if(isset($_SESSION["add2cart"]) && trim($_SESSION["add2cart"])!=""){
		$cart_details=explode("//",$_SESSION["add2cart"]);
		foreach($cart_details as $key1=>$val){
			$pro_id=explode("||",$val);
			
			$count=$count+trim($pro_id[1]);
			$price=currency_price(currency($pro_id[0]),$price+trim(getPrice($pro_id[0]))*trim($pro_id[1]));
			$discount=currency_price(currency($pro_id[0]),$discount+trim(getDiscount($pro_id[0]))*trim($pro_id[1]));
			$tax=currency_price(currency($pro_id[0]),$tax+trim(getTax($pro_id[0]))*trim($pro_id[1]));
			$shipping_cost=currency_price(currency($pro_id[0]),$shipping_cost+trim(getShippingCost($pro_id[0]))*trim($pro_id[1]));
			
			// $price += $shipping_cost;
			$price += $shipping_cost - $discount;
		}
		$total_item=$count.' item(s)';
		$cart=$count.' item(s) - '.get_currency().$price;
	}else{
		$total_item='0 item(s)';
		$cart='0 item(s) - '.get_currency().'0.00';
	}
}else{
	$cus_cart_dtls=getDetails(doSelect1("aad_cart_id,aad_cart_ac_id,aad_cart_apa_id,currency,price,tax,discount,shipping_cost,quantity","ambit_add2cart",array("aad_cart_ac_id"=>$_SESSION["ac_id"])));
	//$cus_cart_dtls=array();
	if(!empty($cus_cart_dtls)){
		foreach($cus_cart_dtls as $key1=>$val){
			$pro_id=$val["aad_cart_apa_id"];
			
			$count=$count+trim($val["quantity"]);
			$price=currency_price(currency($pro_id),$price+trim(getPrice($pro_id))*trim($val["quantity"]));
			$discount=currency_price(currency($pro_id),$discount+trim(getDiscount($pro_id))*trim($val["quantity"]));
			$tax=currency_price(currency($pro_id),$tax+trim(getTax($pro_id))*trim($val["quantity"]));
			$shipping_cost=currency_price(currency($pro_id),$shipping_cost+trim(getShippingCost($pro_id))*trim($val["quantity"]));
			
			// $price += $shipping_cost;
			$price += $shipping_cost - $discount;			
		}	
		$total_item=$count.' item(s)';
		$cart=$count.' item(s) - '.get_currency().$price;	
	}else{
		$total_item='0 item(s)';
		$cart='0 item(s) - '.get_currency().'0.00';
	}
	
	$productDetails=getDetails(doSelect1("posting_type, reserve_price","ambit_product_add",array("apa_id"=>$_POST["product_id"])));
	if($productDetails[0]["posting_type"] ==1 ){
			
		//$yesterday = date("Y-m-j", strtotime( '-1 days' ) );
		//$status=doUpdate("ambit_product_add",array('listing_duration' => $yesterday),array("apa_id"=>$_POST["product_id"]));
		//$status=doUpdate("ambit_product_add",array('posting_type' => 0),array("apa_id"=>$_POST["product_id"]));
		
		//echo '<script>alert("The product was sold directly for a reserve price.")</script>'; 	
	}
	
	
	

}


echo $cart." || ";
?>

								<table class="table table-bordered">
									<tbody>
										<tr>
											<td class="text-left"><strong><?php echo $lang_125; ?></strong>
											</td>
											<td class="text-right"><?php echo $total_item; ?></td>
										</tr>
										<tr>
											<td class="text-left"><strong><?php echo $lang_93; ?></strong>
											</td>
											<td class="text-right"><?php echo get_currency().$tax; ?></td>
										</tr>
										
										<tr>
											<td class="text-left"><strong><?php echo $lang_39; ?></strong>
											</td>
											<td class="text-right"><?php echo get_currency().$discount; ?></td>
										</tr>
										<tr>
											<td class="text-left"><strong><?php echo $lang_29; ?></strong>
											</td>
											<td class="text-right"><?php echo get_currency().$shipping_cost; ?></td>
										</tr>
									</tbody>
								</table>
								<p class="text-right"> <a class="btn view-cart" href="cart.php"><i class="fa fa-shopping-cart"></i><?php echo $lang_35; ?></a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="checkout.php"><i class="fa fa-share"></i><?php echo $lang_34; ?></a> </p>
				
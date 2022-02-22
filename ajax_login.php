<?php
session_start();
require_once("function.php");
$_POST["password"]=md5($_POST["password"]);
$_POST["status"]=1;
$data=loginCheck(doSelect("*","ambit_customer",$_POST));
if(!empty($data)){
foreach ($data as $key => $v) {
	$_SESSION["ac_id"]=$v["ac_id"];
	$_SESSION["name"]=$v["name"];
	echo '1 || ';
	//Add Cart Details
	
	if(isset($_SESSION["add2cart"]) && trim($_SESSION["add2cart"])!=""){
    $cart_details=explode("//",$_SESSION["add2cart"]);
	foreach($cart_details as $key1=>$val){
		$pro_id=explode("||",$val);
		$price			=currency_price(currency($pro_id[0]),trim(getPrice($pro_id[0]))*trim($pro_id[1]));
		$discount		=currency_price(currency($pro_id[0]),trim(getDiscount($pro_id[0]))*trim($pro_id[1]));
		$tax			=currency_price(currency($pro_id[0]),trim(getTax($pro_id[0]))*trim($pro_id[1]));
		$shipping_cost	=currency_price(currency($pro_id[0]),trim(getShippingCost($pro_id[0]))*trim($pro_id[1]));
		$field			=array("aad_cart_ac_id"=>$v["ac_id"],"aad_cart_apa_id"=>$pro_id[0],"currency"=>put_currency(),"price"=>$price,"discount"=>$discount,"tax"=>$tax,"shipping_cost"=>$shipping_cost,"quantity"=>$pro_id[1]);
	    doInsert($field,'ambit_add2cart');
	}
    unset($_SESSION["add2cart"]);
}

	
	
	// !-- CArt Details --! 
}
if(isset($_SESSION["target_path"])){
	echo $_SESSION["target_path"];
}
}else{
	echo '0 || ';
}
?>
<?php
session_start();
require_once("function.php");
$select="type,discount,status,currency";
$from="ambit_coupon";
$result=getDetails(doSelect($select,$from,array("coupon_name"=>trim($_POST["coupon"]),"status"=>1)));
//echo $result[0]["currency"];
if(empty($result)){
	echo 'invalid';
}else{
	if($result[0]["type"]==1){
	$discount_price=trim($_POST["total"])-currency_price($result[0]["currency"],trim($result[0]["discount"]));
	}else{
	$discount_price=(trim($result[0]["discount"])/100)*trim($_POST["total"]);	
	}
	echo get_currency().'||'.$discount_price.'||'.currency_price($result[0]["currency"],trim($result[0]["discount"]));
}

?>
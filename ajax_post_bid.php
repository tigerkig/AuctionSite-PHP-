<?php
session_start();
require_once("function.php");
$_POST["cus_id"] = $_SESSION["ac_id"];
 $amount=seeMoreDetails('MAX(bid_amount)','ambit_product_bid',array("apa_id"=>trim($_POST["apa_id"])));
if(trim($amount)==''){
	$amount=0;
} 

$prev_amount=trim(seeMoreDetails('MAX(bid_amount)','ambit_product_bid',array("apa_id"=>trim($_POST["apa_id"]),"auction_status"=>1,"bid_status"=>1)));
$prev_cus_id=trim(seeMoreDetails('cus_id','ambit_product_bid',array("bid_amount"=>$prev_amount,"apa_id"=>trim($_POST["apa_id"]),"auction_status"=>1,"bid_status"=>1)));
if($prev_cus_id == $_SESSION["ac_id"]){
	echo '404 ||';
	exit(0);
}

$currency=trim(seeMoreDetails('currency','ambit_product_bid',array("apa_id"=>trim($_POST["apa_id"]),"bid_status"=>1)));
if($prev_amount==''){
	$pre_price=trim(seeMoreDetails('price','ambit_product_add',array("apa_id"=>trim($_POST["apa_id"]))));
	$price_part=explode("||",$pre_price);
	$prev_amount = $price_part[0] - $price_part[2];
	$currency=trim(seeMoreDetails('currency','ambit_product_add',array("apa_id"=>trim($_POST["apa_id"]))));
	$amount=currency_amount($currency,$prev_amount);
	$prev_amount = $amount;
}else{
	$amount=currency_amount($currency,$prev_amount);
}

if(isset($_COOKIE['acu_id'])){
	$now_currency=$_COOKIE['acu_id'];
}else{
	$now_currency=1;
}
	
$_POST["bid_amount"]=currency_amount_to_unit1($now_currency,trim($_POST["bid_amount"]));
$_POST['currency']=1;	

if(trim($_POST["bid_amount"]) > $prev_amount){
	$status=doInsert($_POST,'ambit_product_bid');
	if($status){
		echo '1 || '.$amount;
	}else{
		echo '0 || '.$amount;
	}
}else{
	echo '2 || '.$amount;
}
?>
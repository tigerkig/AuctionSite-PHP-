<?php
session_start();
require_once("function.php");

// $prev_amount=trim(seeMoreDetails('MAX(bid_amount)','ambit_product_bid',array("apa_id"=>trim($_POST["apa_id"]),"auction_status"=>1,"bid_status"=>1)));
// $prev_cus_id=trim(seeMoreDetails('cus_id','ambit_product_bid',array("bid_amount"=>$prev_amount)));
// echo $prev_amount."------------".$_SESSION["ac_id"]."------------".$prev_cus_id."----------".$_POST["apa_id"];
// if($prev_cus_id == $_SESSION["ac_id"]){
// 	echo '404';
// 	exit(0);
// }

if(isset($_SESSION["ac_id"])){
	$details=getDetails(doSelect1("address","ambit_customer",array("ac_id"=>$_SESSION["ac_id"])));
	if(isset($details) && $details[0]["address"] != ""){
		echo 1;
	}else{
		echo 2;		
	}
	
}else{
	echo 0;
	$_SESSION["target_path"]=trim($_POST["target_path"]);
}
?>
<?php
session_start();
require_once("function.php");

$prev_amount=trim(seeMoreDetails('MAX(bid_amount)','ambit_product_bid',array("apa_id"=>trim($_POST["apa_id"]),"auction_status"=>1,"bid_status"=>1,"cus_id"=>$_SESSION["ac_id"])));
$status=doUpdate('ambit_product_bid',array("bid_status"=>0),array("cus_id"=>$_SESSION["ac_id"],"apa_id"=>trim($_POST["apa_id"]),"auction_status"=>1,"bid_amount"=>$prev_amount));
echo $prev_amount;

?>
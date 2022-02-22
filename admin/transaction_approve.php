<?php
require_once("function.php");
$date=date('Y-m-d');
$field=array("transaction_status"=>1,"transaction_date"=>$date);
$status=doUpdate("ambit_withdraw",$field,array("aw_id"=>$_POST["aw_id"]));
if($status){
	$balance=seeMoreDetails("balance","ambit_vendor_balance",array("avb_vr_id"=>$_POST["aw_vr_id"]));
	$amount=seeMoreDetails("aw_withdraw_amnt","ambit_withdraw",array("aw_id"=>$_POST["aw_id"]));
	$balance=$balance-$amount;
	doUpdate("ambit_vendor_balance",array("balance"=>$balance),array("avb_vr_id"=>$_POST["aw_vr_id"]));
	echo 1;
}else{
	echo 0;
}
?>
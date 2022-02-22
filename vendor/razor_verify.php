<?php
session_start();
require_once("function.php");
$row_al=getDetails(doSelect("*","ambit_payment_method",array("id"=>'3')));
$keyId = $row_al[0]["apm_id1"];;
$keySecret = $row_al[0]["apm_id2"];;
$displayCurrency = ''.get_currency().'';
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
$success = true;
$error = "Payment Failed";
$order_id=$_SESSION['razorpay_order_id'];
if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}
if ($success === true)
{
$date=date("Y-m-d H:i:s");
$expire=date('Y-m-d H:i:s', mktime(date('h'),date('i'),date('s'),date('m'),date('d')+30,date('Y')));
$pkg_id=explode("|",$order_id);
$u_id=explode("|",$order_id);
$query=getDetails(doSelect1("name,price","ambit_membership",array("p_id"=>$pkg_id)));
$amount = $query[0]["price"];
if($amount==$query[0]["price"]){
	$check_vendor=seeMoreDetails("abp_agent_id","ambit_buy_package",array("abp_agent_id"=>$u_id));
	if(!empty(trim($check))){
	doUpdate("ambit_buy_package",array("abp_p_id"=>$pkg_id,"abp_agent_id"=>$u_id,"abp_price"=>$query[0]["price"],"paid"=>$amount,"status"=>'Pass',"expire"=>$expire,"abp_buy_date"=>$date),array("abp_agent_id"=>$u_id));
	}else{
	doInsert(array("abp_p_id"=>$pkg_id,"abp_agent_id"=>$u_id,"abp_price"=>$query[0]["price"],"paid"=>$amount,"status"=>'Pass',"expire"=>$expire,"abp_buy_date"=>$date),"ambit_buy_package");	
	}
	}else{
	doInsert(array("abp_p_id"=>$pkg_id,"abp_agent_id"=>$u_id,"abp_price"=>$query[0]["price"],"paid"=>$amount,"status"=>'Fail',"expire"=>$expire,"abp_buy_date"=>$date),"ambit_buy_package");
}
}
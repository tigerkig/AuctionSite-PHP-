<?
require_once("function.php");
$req = 'cmd=_notify-validate';

foreach ($_POST as $key => $value)
{
	$value = urlencode(stripslashes($value));
	$req .= '&' . $key . '=' . $value;
}
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
// If testing on Sandbox use: 
//$header .= "Host: www.sandbox.paypal.com:443\r\n";
$header .= "Host: www.paypal.com:443\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);


$payment_status = $_POST['payment_status'];
$amount = $_POST['mc_gross'];
$pay_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$custom1 = $_POST['custom'];
$scustom = explode('||',$_POST['custom']);
$u_id=$scustom[1];
$order_id=$scustom[0];

if (!$fp)
{
$checkpay="no";
	$error_output = $errstr . ' (' . $errno . ')';
}
else
{
	fputs ($fp, $header . $req);
	while (!feof($fp))
	{
		$res = fgets ($fp, 1024);
		if (strcmp ($res, "VERIFIED") == 0)
		{
$checkpay="yes";

		}
	}
	fclose ($fp);
}

if($checkpay=="yes")
{
	//code
$date=date("Y-m-d h:i:s");
$expire=date('Y-m-d h:i:s', mktime(date('h'),date('i'),date('s'),date('m'),date('d')+30,date('Y')));
$pkg_id=explode("|",$custom)[0];
$u_id=explode("|",$custom)[1];
$query=getDetails(doSelect1("name,price","ambit_membership",array("p_id"=>$pkg_id)));
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
//code
}
?>
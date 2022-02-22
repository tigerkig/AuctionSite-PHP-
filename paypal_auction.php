<?php
   session_start();
  // if(isset($_SESSION["ac_id"])){
   require_once("function.php");
   include("include/header.php");
   ?>
<!-- //Header Top -->
<!-- Header center -->
<?php
   include("include/header_center.php");
   ?>
<!-- //Header center -->
<!-- Header Bottom -->
<div class="header-bottom">
   <div class="container">
      <div class="row">
         <?php
            include("include/side_menu_close.php");
            ?>
         <!-- Main menu -->
         <?php
            include("include/main_menu.php");
            ?>
         <!-- //end Main menu -->
      </div>
   </div>
</div>
</header>
<!-- //Header Container  -->
<?php
/*session_start();
require_once("function.php");*/
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


$payment_status = 	$_POST['payment_status'];
$amount 		= 	$_POST['mc_gross'];
$pay_currency 	= 	$_POST['mc_currency'];
$txn_id 		= 	$_POST['txn_id'];
$detls			=	explode("||",$_POST['custom']);
$product_id		=	$detls[0];
$customer_id	=	$detls[1];
//$amount			=	$detls[2];
$order_id		=	$detls[3];

$productName = getProductName($product_id);	
$productPrice = getPrice($product_id);

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


if($_POST['payment_status'] == 'Completed'){
	$checkpay = "yes";
}

if($checkpay=="yes")
{
		doUpdate("ambit_buy_product_auction",array("status"=>2,"paid_ammount"=>$amount),array("bid_id"=>$order_id));

		$vendor=seeMoreDetails("apa_vr_id","ambit_product_add",array("apa_id"=>$detls[0]));
			
		doUpdate("ambit_shipment_status",array("payment_status"=>"1"),array("order_id"=>$order_id));
		//doUpdate("ambit_shipment_status_auction",array("payment_status"=>"1"),array("order_id"=>$order_id));
			
		//doUpdate("ambit_product_bid",array("purchase_status"=>1),array("id"=>$ambit_product_bid_id));
		doUpdate("ambit_product_bid",array("purchase_status"=>1),array("id"=>$order_id));
	

		//mail send to Customer
		$from=get_site_settings(23);
		//$to = trim(seeMoreDetails("email","ambit_customer",array("ac_id"=>$_SESSION["ac_id"])));
		$to = trim(seeMoreDetails("email","ambit_customer",array("ac_id"=>$customer_id)));

		$subject = "Confirmation Message";
		$string =get_mail_settings(3);
		$patterns = array();
		$patterns[0] = '/VENDOR/';
		$patterns[1] = '/CUSTOMER/';
		$patterns[2] = '/PRODUCT/';
		$replacements = array();
		$replacements[2] =getVendorName($vendor);
		$replacements[1] =getCustomerName($customer_id);
		$replacements[0] =getProductName($detls[0]);
		$txt=preg_replace($patterns, $replacements, $string);
		$headers = "From: ".$from. "\r\n" ."CC: ".$to;
		mail($to,$subject,$txt,$headers);

		//mail send to Vendor
		$from=get_site_settings(23);
		$to = trim(seeMoreDetails("email","vendor_registration",array("vr_id"=>$vendor)));

		$subject = "Confirmation Message";
		$string =get_mail_settings(1);
		$patterns = array();
		$patterns[0] = '/VENDOR/';
		$patterns[1] = '/CUSTOMER/';
		$patterns[2] = '/PRODUCT/';
		$replacements = array();
		$replacements[2] =getVendorName($vendor);
		$replacements[1] =getCustomerName($customer_id);
		$replacements[0] =getProductName($detls[0]);
		$txt=preg_replace($patterns, $replacements, $string);
		$headers = "From: ".$from. "\r\n" ."CC: ".$to;
		mail($to,$subject,$txt,$headers);


		//mail send to Admin
		$from=get_site_settings(23);
		$to =get_site_settings(23);

		$subject = "Confirmation Message";
		$string =get_mail_settings(2);
		$patterns = array();
		$patterns[0] = '/VENDOR/';
		$patterns[1] = '/CUSTOMER/';
		$patterns[2] = '/PRODUCT/';
		$replacements = array();
		$replacements[2] =getVendorName($vendor);
		$replacements[1] =getCustomerName($customer_id);
		$replacements[0] =getProductName($detls[0]);
		$txt=preg_replace($patterns, $replacements, $string);
		$headers = "From: ".$from. "\r\n" ."CC: ".$to;
		mail($to,$subject,$txt,$headers);
		
		
		$status=doUpdate("ambit_product_add",array('posting_type' => 0, "stock"=> 0),array("apa_id"=>$product_id));
			
	
		//echo '<script>alert("The product was sold directly for a reserve price.")</script>'; 	
		
		//unset($_SESSION["order_id"]);
	/*}else{
		//doUpdate("ambit_buy_product_auction",array("payment_status"=>0,"paid_ammount"=>$amount),array("order_id"=>$order_id));
		doUpdate("ambit_buy_product_auction",array("payment_status"=>0,"paid_ammount"=>$amount),array("bid_id"=>$order_id));
	    unset($_SESSION["order_id"]);
	}*/
	
}
?>



<div class="main-container container">
      <ul class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-home"></i></a></li>
         <li><a href=""><?php echo $lang_378; ?></a></li>
      </ul>
      <div class="row">
         <!--Middle Part Start-->
         <div id="content" class="col-sm-12">
            <h2 class="title"><?php echo $lang_378; ?></h2>
			<div class="container" style="min-height: 500px;">
			    <div class="status">
			        <?php 
			        if(!empty($payment_status))
			        { 
			        ?>

			            <h1 style="font-size: 36px;text-align:center; color:#8B0000;  text-shadow: 2px 2px 2px grey;"><?php echo $lang_370; ?></h1>

			            <h2 style="color:blue"><?php echo $lang_371; ?></h2>
						<div class="container" style="line-height: 36px; font-size:18px; text-color:grey">
				            <div class="col-xs-6"><?php echo $lang_372; ?></div> 	<div class="col-xs-6"><?php echo $_POST["receiver_id"]; ?></div>
				            <div class="col-xs-6"><?php echo $lang_373; ?></div> 	<div class="col-xs-6"><?php echo $txn_id; ?></div>
				            <div class="col-xs-6"><?php echo $lang_374; ?></div> 	 	<div class="col-xs-6"><?php echo $amount.$_POST["mc_currency"]; ?></div>
				            <div class="col-xs-6"><?php echo $lang_375; ?></div> 	<div class="col-xs-6"><?php echo $payment_status; ?></div>
			            </div>
			            
			            <h2 style="margin-top:24px; color:blue"><?php echo $lang_376; ?></h2>
			            <div class="container" style="line-height: 36px; font-size:18px; text-color:grey">

							
				            <div class="col-xs-6">Name</div> 	 <div class="col-xs-6"><?php echo $productName; ?></div>
				            <!--<div class="col-xs-6">Price</div>   <div class="col-xs-6"><?php echo $amount.$_POST["mc_currency"]; ?></div>-->
				            <div class="col-xs-6">Price</div>   <div class="col-xs-6"><?php echo $productPrice.$_POST["mc_currency"]; ?></div>
			           </div>

			        <?php }else{ ?>
			            <h1 class="error"  style="font-size: 36px;text-align:center; color:#8B0000;  text-shadow: 2px 2px 2px grey;"><?php echo $lang_376; ?></h1>
			        <?php } ?>
			    </div>

			    <!--<a href="index.php" class="btn-link">Back to Products</a>-->

			</div>
		</div>
	</div>
</div>


<!-- Footer Container -->
<?php
   include("include/footer.php");
   /*}else{
   echo '<script>window.location="index.php";</script>';
   }*/
   ?>

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
$amount			= 	$_POST['mc_gross'];
$pay_currency 	= 	$_POST['mc_currency'];
$txn_id 		= 	$_POST['txn_id'];
$detls			=	explode("||",$_POST['custom']);
$order_id		=	$detls[0];
$price			=	$detls[1];

if (!$fp)
{
$checkpay="no";
	$error_output = $errstr . ' (' . $errno . ')';
}
else
{
	fputs ($fp, $header.$req);
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
		//doUpdate("ambit_coupon",array("status"=>0),array("aco_id"=>));
		//doUpdate("ambit_buy_product",array("payment_status"=>2,"paid_amnt"=>$amount),array("id"=>$_SESSION["order_id"]));
		doUpdate("ambit_buy_product",array("payment_status"=>2, "paid_amnt"=>$amount), array("id"=>$order_id));

		$product_id		=	getDetails(doSelect("product_details, abp_ac_id", "ambit_buy_product", array("id"=>$order_id)));	
		$product_dtls	=	explode("||",$product_id[0]["product_details"]);
		
		$customer_id    =	$product_id[0]["abp_ac_id"];

		foreach($product_dtls as $k=>$v){
			$details=explode(":",$v);
			/*$vendor=seeMoreDetails("apa_vr_id","ambit_product_add",array("apa_id"=>$details[0]));
			$field=array("ass_apa_id"=>$details[0],"ass_ac_id"=>$_SESSION["ac_id"],"ass_vr_id"=>$vendor,"quantity"=>$details[1],"price"=>$price,"order_id"=>$_SESSION["order_id"],"payment_status"=>"1");
			doInsert($field,"ambit_shipment_status");*/
			
			doUpdate("ambit_shipment_status",array("payment_status"=>"1"),array("order_id"=>$order_id));
			
				$stock		=	seeMoreDetails("stock","ambit_product_add",array("apa_id"=>$details[0]));
			if($stock == $details[1]){
				$status=doUpdate("ambit_product_add",array('posting_type' => 0, "stock"=> 0,"status" => 0),array("apa_id"=>$details[0]));
			}elseif($stock > $details[1]){
				$tmp = $stock - $details[1];
				$status=doUpdate("ambit_product_add",array('posting_type' => 0, "stock"=> $tmp),array("apa_id"=>$details[0]));
			}

			//mail send to Customer
			$from=get_site_settings(23);
			$to = trim(seeMoreDetails("email","ambit_customer",array("ac_id" => $customer_id)));

			$subject = "Confirmation Message";
			$string =get_mail_settings(3);
			$patterns = array();
			$patterns[0] = '/VENDOR/';
			$patterns[1] = '/CUSTOMER/';
			$patterns[2] = '/PRODUCT/';
			$replacements = array();
			$replacements[2] =getVendorName($vendor);
			$replacements[1] =getCustomerName($customer_id);
			$replacements[0] =getProductName($details[0]);
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
			$replacements[0] =getProductName($details[0]);
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
			$replacements[0] =getProductName($details[0]);
			$txt=preg_replace($patterns, $replacements, $string);
			$headers = "From: ".$from. "\r\n" ."CC: ".$to;
			mail($to,$subject,$txt,$headers);
			
			
			
			//stop bidding - date -> yesterday replace
		 	//$yesterday = date("Y-m-j", strtotime( '-1 days' ) );
		 	//$status=doUpdate("ambit_product_add",array('listing_duration' => $yesterday),array("apa_id"=>$custom[0]));
			//$status=doUpdate("ambit_product_add",array('posting_type' => 0, "stock"=> 0),array("apa_id"=>$details[0]));
			
		}
		//echo '<script>alert("The product was sold directly for a reserve price.")</script>'; 	
		
		//unset($_SESSION["order_id"]);
	
}
?>

<div class="main-container container">
      <ul class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-home"></i></a></li>
         <li><a href=""><?php echo $lang_369; ?></a></li>
      </ul>
      <div class="row">
         <!--Middle Part Start-->
         <div id="content" class="col-sm-12">
            <h2 class="title"><?php echo $lang_369; ?></h2>
			<div class="container" style="min-height: 500px;">
			    <div class="status">
			        <?php if(!empty($payment_status)){ ?>

			            <h1 style="font-size: 36px;text-align:center; color:#8B0000;  text-shadow: 2px 2px 2px grey;"><?php echo $lang_370; ?></h1>

			            <h2 style="color:blue"><?php echo $lang_371; ?></h2>
						<div class="container" style="line-height: 36px; font-size:18px; text-color:grey">
				            <div class="col-xs-6"><?php echo $lang_372; ?></div> 	<div class="col-xs-6"><?php echo $_POST["receiver_id"]; ?></div>
				            <div class="col-xs-6"><?php echo $lang_373; ?></div> 	<div class="col-xs-6"><?php echo $txn_id; ?></div>
				            <div class="col-xs-6"><?php echo $lang_374; ?></div> 	 	<div class="col-xs-6"><?php echo $amount; ?></div>
				            <div class="col-xs-6"><?php echo $lang_375; ?></div> 	<div class="col-xs-6"><?php echo $payment_status; ?></div>
			            </div>
			            
			            <h2 style="margin-top:24px; color:blue"><?php echo $lang_376; ?></h2>
			            <div class="container" style="line-height: 36px; font-size:18px; text-color:grey">

			<?php
						$product_id		=	getDetails(doSelect("product_details", "ambit_buy_product", array("id"=>$order_id)));	
						$product_dtls	=	explode("||",$product_id[0]["product_details"]);

						foreach($product_dtls as $k=>$v){
							$details=explode(":",$v);
							$productName = getProductName($details[0]);	
							$productPrice = getPrice($details[0]);
							?>
							
				            
				            <div class="col-xs-6"><?php echo $lang_128; ?>:</div> 	 <div class="col-xs-6"><?php echo $productName; ?></div>
				            <div class="col-xs-6"><?php echo $lang_312; ?>:</div>   <div class="col-xs-6"><?php echo $productPrice; ?></div>
				            <?php
						}
			?>
			           </div>

			        <?php }else{ ?>
			            <h1 class="error"  style="font-size: 36px;text-align:center; color:#8B0000;  text-shadow: 2px 2px 2px grey;"><?php echo $lang_377; ?></h1>
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


<?php
   include('qrcode_lib/qrlib.php');  
   
   session_start();
   
   if(isset($_POST["bid_amount"])){
   if(isset($_SESSION["ac_id"])){
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
<!-- Navbar switcher -->
<!-- //end Navbar switcher -->
</header>
<!-- //Header Container  -->
<!-- Main Container  -->
<script type="text/javascript">
	$(document).ready(function(){
	   	$("#qrcode_confirm").hide();
   });

   function submit_order(){   		
	   	var payment_method=$("input[name='payment_method']:checked").val();
	   	var amount=$("#amount").val();
	   	var custom=$("#custom").val();
	   	var comments=$("#comments").val();
	   	var payment_status=1;
	   	$.post(
	   		"ajax_submit_order_auction.php?msg=PAYPAL",
	   		{payment_method:payment_method,amount:amount,custom:custom,comments:comments},
	   		function(r){
	   		$("#custom").val(custom+'||'+r);
	   		$("#paypal1").submit();
	   		}
	   	);   	
   }
   
   
   function submit_qrcode(){
   		if(confirm("Did you make QR code payment?")){
		   	//var payment_method=$("input[name='payment_method']:checked").val();
		   	var payment_method = 6;
		   	var amount=$("#amount").val();
		   	var custom=$("#custom").val();
		   	var comments=$("#comments").val();
		   	var payment_status=1;
		   	$.post(
		   		"ajax_submit_order_auction.php?msg=qrcode",
		   		{payment_method:payment_method,amount:amount,custom:custom,comments:comments},
		   		function(r){
		   			$("#custom").val(custom+'||'+r);
		   			//$("#paypal1").submit();
		   			location.href = "order-history.php";
		   		}
		   	); 
		}  	
   }
   
   
   
   	function submit_order1(){
	   	var payment_method=$("input[name='payment_method']:checked").val();
	   	var amount=$("#amount").val();
	   	var custom=$("#custom").val();
	   	var comments=$("#comments").val();
	   	var payment_status=1;
         $('#loader-wrapper').show();
	   	$.post(
	   		"ajax_submit_order_auction.php?msg=COD",
	   		{payment_method:payment_method,amount:amount,custom:custom,comments:comments},
	   		function(r){
	   		toastr.success("Order replace successfully");
	   		window.location="index.php";
	   		}
   		);   	
   }
   
   
   function payment_method(){
	   	var payment_method=$("input[name='payment_method']:checked").val();
	   	if(payment_method==1){
	   		$("#cod").hide();
	   		$("#paypal").show();
	   		$("#confirm_order").show();
	   		$("#pay_confirm").show();
	   		$("#qrcode_confirm").hide();
	   		$("input[name='payment_method_qrcode']").prop("checked", false);
	   	}
	   	
	   	if(payment_method==3){
	   		$("#paypal").hide();
	   		$("#cod").show();
	   	}
   }
   
    function payment_method_qrcode(){
	   	var payment_method_qrcode=$("input[name='payment_method_qrcode']:checked").val();
	   	if(payment_method_qrcode=="qrcode"){
	   		
	   		//$("input[name='payment_method']:checked").val(0);
	   		$("input[name='payment_method_qrcode']").prop("checked", true);
	   		$("input[name='payment_method']").prop("checked", false);
	   		$("#cod").hide();
	   		$("#paypal").hide();
	   		
	   		$("#confirm_order").hide();
	   		$("#pay_confirm").hide();
	   		$("#confirm_qrcode").show();
	   		$("#qrcode_confirm").show();
	   		$("#qrcode").show();
	   	}
   }   
   
  
     
   function change_discount(total){
   	//alert("siddhartha");
   	var coupon=$("#coupon").val();
   	//alert(total);
   	if(coupon.trim()==""){
   		alert("Please enter Coupon Code");
   		$("#coupon").focus();
   		return false;
   	}
   	$.post(
   	"ajax_apply_coupon.php",
   	{coupon:coupon,total:total},
   	function(r){
   		//alert(r);
   		if(r=='invalid'){
   			alert("Invalid Coupon");
   			$("#coupon").val("");
   			$("#coupon").focus();
   		}else{
   			
   			$('#coupon').attr('readonly', true);
   			var rs=r.split("||");
   		$("#total_price1").text(rs[0]+rs[1]);
   		$("#amount").val(rs[1]);
   		$("#total_price").val(rs[1]);
   		//$("#total_price2").html('<font color="red">'+rs[0]+rs[2]+'</font>');
   		$("#total_price2").val(rs[0]+rs[2]);
   		}	
   	}
   	);
   	
   }
   function remove_coupon(){
   	location.reload();
   }
</script>	

<div class="main-container container">
   <ul class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i></a></li>
      <li><a href="cart.php"><?php echo $lang_35;  ?></a></li>
      <li><a href="checkout.php"><?php echo $lang_34;  ?></a></li>
   </ul>
   <div class="row">
      <!--Middle Part Start-->
      <div id="content" class="col-sm-12">
         <!-- <h2 class="title"><?php echo $lang_34;  ?></h2> -->
         <div class="row">
            <div class="col-sm-12">
               <!-- <form action="" method="post" id="ajax_des" onsubmit="return submit_order();" >	 -->
               <div class="row">
                  <div>
                     <div class="col-sm-9">
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h4 class="panel-title font_style"><i class="fa fa-credit-card credit_pad_right "></i><?php echo $lang_36;  ?></h4>
                           </div>
                           <div class="panel-body">
                              <p class="font_style"><?php echo $lang_37;  ?></p>
                              <div class="alert alert-info font_style" id="payment" style="padding: 8px 8px 8px 15px;" role="alert"><a class="close" onclick="$(this).parents('div').first().slideUp();">×</a>Contactless payment is a very safe process. Just take a picture of the code, enter the amount and confirm.</div>
                              
                              <?php
                                 $payment_method=getDetails(doSelect1("apm_id,apm_name,status","ambit_payment_method",array("status"=>1)));
                                 foreach($payment_method as $k6=>$v6){							
                                 ?>
                              <div class="radio col-md-3 col-sm-3"  style="margin-top: 10px;">
                                 <label class="font_style">
                                    <input type="radio" onclick="payment_method();"  name="payment_method" value="<?php echo $v6["apm_id"]; ?>"  ><?php echo $v6["apm_name"]; ?>
                                 </label>
                              </div>
                              <?php
                                 }
                                 ?>
                                 
                                 <div class="radio col-md-3 col-sm-3" style="margin-top: 10px;">
                                 <label class="font_style">
                                    <!-- <input type="radio" onclick="payment_method_qrcode();" name="payment_method" value="qrcode"  >Contactless payment -->
                                    <input type="radio" onclick="payment_method_qrcode();" name="payment_method_qrcode" value="qrcode"  >Contactless payment
                                 </label>
                           </div>
                           </div>
                        
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h4 class="panel-title font_style"><i class="fa fa-credit-card credit_pad_right"></i>Price</h4>
                           </div>
                           <div class="panel-body font_style">
                              <?php  echo get_currency().$_POST["bid_amount"]; ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12" id="pay_confirm">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $lang_42;  ?></h4>
                        </div>
                        <div class="panel-body">
                           <textarea rows="4" class="form-control" id="comments" name="comments"></textarea>
                           <br>
                           <label class="control-label font_style" for="confirm_agree">
                          	 	<input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
                           		<span><?php echo $lang_122;  ?> <a class="agree" href="terms_condition.php"><b><?php echo $lang_123;  ?></b></a></span>
                           </label>
                           <?php  
                              if(empty($_SERVER['REQUEST_URI'])) {
                                  $_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'];
                              }
                              
                              // Strip off query string so dirname() doesn't get confused
                              $url = preg_replace('/\?.*$/', '', $_SERVER['REQUEST_URI']);
                              if($url=''){
                              $url = 'http://'.$_SERVER['HTTP_HOST'].'/'.ltrim(dirname($url), '/').'';
                              }
                              if($url==''){
                              $url = 'http://'.$_SERVER['HTTP_HOST'].'/'.ltrim(dirname($url), '').'';
                              }
                              $gateway=1;
                              $row_al=getDetails(doSelect("*","payment_gateway",array("id"=>$gateway)));
                              
                              //$url .= "paypal_auction.php";
                              //$url .= "ouslet/paypal_auction.php";
                              $url 		= "https://www.ouslet.com/paypal_auction.php";
                              //$url 		= "https://localhost/ouslet/paypal_auction.php";
                              $cancel_url = "https://www.ouslet.com/auction_checkout.php";
                              //$cancel_url= "http://localhost/ouslet/auction_checkout.php";
                              
                              ?>							
                           <div class="buttons" id="paypal" style="display:none;">
                              <div class="pull-right">
                                 <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="paypal1"  >
                                    <input type='hidden' name="cmd" value=_xclick>
                                    <input type='hidden' name="business" value="<?php echo $row_al[0]["pg_id"];?>">
                                    <input type='hidden' name="item_name" value="<?php echo get_site_settings(25);  ?>">
                                    <input type='hidden' name="amount" id="amount" value="<?php echo $_POST["bid_amount"]; ?>">
                                    <input type='hidden' name="no_note" value=1>
                                    <input type='hidden' name="currency_code" value="USD">
                                    <input type='hidden' name="rm" value=2 />
                                    <input type='hidden' name="custom" id="custom" value="<?php echo $_POST["apa_id"].'||'.$_POST["cus_id"].'||'.$_POST["bid_amount"].'||'.$_POST["id"]; ?>" />
                                    <input type='hidden' name="return" value="<?php echo $url;?>">
                                    <!--<input type='hidden' name="cancel_return" value="<?php echo $url;?>" />-->
                                    <input type='hidden' name="cancel_return" value="<?php echo $cancel_url;?>" />
                                    <input type='hidden' name="notify_url" value="<?php echo $url;?>" />
                                    <input type='submit' onclick="submit_order();" data-toggle="tooltip" title="Buy Now"  class="btn btn-primary" value='Confirm'  />
                                 </form>
                                 <!-- 	<input type="submit" class="btn btn-primary" name="confirm_order" id="button-confirm" value="Confirm Order"> -->				
                              </div>
                           </div>
                           <div class="buttons" id="cod" style="display:none;">
                              <div class="pull-right">
                                 <input type="button" class="btn btn-primary" onclick="submit_order1();" name="confirm_order" id="button-confirm" value="Confirm">				
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- 	</form> -->
                  
                <div class="col-sm-12" id="qrcode_confirm">
                     <div class="panel panel-default col-sm-9" style="padding-left:0px; padding-right:0px;">
                        <div class="panel-heading">
                           <h4 class="panel-title"><i class="fa fa-pencil"></i> Contactless payment</h4>
                        </div>
                        <div class="panel-body">
                           <div class="row col-12">
                              <?php						  
                                 $dataText   = 'https://www.paypal.com/qrcodes/managed/e6d54552-e5c6-43eb-895a-e29e031ff6be?utm_source=merchant_lp';
                                 $svgTagId   = 'id-of-svg';
                                 $saveToFile = false;
                                 $imageWidth = 250; // px
                                 
                                 // SVG file format support
                                 $svgCode = QRcode::svg($dataText, $svgTagId, $saveToFile, $errorCorrectionLevel, $imageWidth);
                                 
                                 //echo $svgCode;
                                 ?>
                              <div class="col-md-5 col-sm-5 center-block" style="margin:0px;padding:0px">
                              		<?php //echo $svgCode;?>
                              	<img src="qrcode_lib/ouslet_paypal_qrcode.png"/>
                              </div>
                              <div class="col-md-7 col-sm-7">
                                 <!--<input type='button' data-toggle="tooltip" title="Buy Now"  class="btn btn-primary" id="confirm_qrcode" value='Confirm' onclick="submit_qrcode()" />-->
                                 <button title="Buy Now"  class="btn btn-primary center-block" id="confirm_qrcode" onclick="submit_qrcode()" style="margin-top: 80px;">Confirm</button>
                                 <label class="control-label font_style" for="confirm_agree" style="margin-top:50px;" >
                                    <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree_qrcode" name="confirm agree_qrcode">
                                    <span> <?php echo $lang_122;  ?> <a class="agree" href="terms_condition.php"><b><?php echo $lang_123;  ?></b></a></span> 
                                 </label>
                              </div>
                              
                           </div>
                           
                        </div>
                     </div>
                     <div class="row">
                     	<a href="cart.php" class="btn btn-primary font_style" style="right:0px !important; bottom:20px !important;position: absolute; ">Return to my account</a>
                     </div>
                  </div>
                  
                  
               </div>
            </div>
         </div>
      </div>
      <!--Middle Part End -->
   </div>

</div>
<!-- //Main Container -->
<?php
   if(isset($_POST["confirm_order"])){
   	unset($_POST["confirm_order"]);
   	//print_r($_POST);
   }
   
   
   ?>	
<!-- Footer Container -->
<?php
   include("include/footer.php");
   }else{
   echo "<script>alert('You Have To Login First !');window.location='login.php';</script>";
   }
   }else{
   echo "<script>window.location='won_auction.php';</script>";
   }
   ?>





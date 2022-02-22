

<?php
   include('qrcode_lib/qrlib.php');  
   
   session_start();
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
   	var coupon=$("#coupon").val();
   	var total_price=$("#total_price").val();
   	var product_details=$("#product_details").val();
   	//var voucher=$("#voucher").val();
   	var comments=$("#comments").val();
   	var confirm_agree=$("input[type='checkbox']").val();
   	$.post(
   		// "ajax_submit_order.php",
   		"ajax_submit_order.php?msg=PAYPAL",
   		{payment_method:payment_method,coupon:coupon,comments:comments,confirm_agree:confirm_agree,total_price:total_price,product_details:product_details},
   		function(r){
   			$("#custom").val(r+'||'+total_price);
   			
   			$("#pay_form").submit();
   		}
   		);
   	
   } 
   
   function submit_qrcode(){
	   	if(confirm("Did you make QR code payment?")){
		   	//var payment_method=$("input[name='payment_method']:checked").val();
		   	var payment_method= 6;
		   	var coupon=$("#coupon").val();
		   	var total_price=$("#total_price").val();
		   	var product_details=$("#product_details").val();
		   	//var voucher=$("#voucher").val();
		   	var comments=$("#comments").val();
		   	var confirm_agree=$("input[type='checkbox']").val();
		   	$.post(
		   		// "ajax_submit_order.php",
		   		"ajax_submit_order.php?msg=qrcode",
		   		{payment_method:payment_method,coupon:coupon,comments:comments,confirm_agree:confirm_agree,total_price:total_price,product_details:product_details},
		   		function(r){
		   			$("#custom").val(r+'||'+total_price);
		   			
		   			//$("#pay_form").submit();
		   			location.href = "order-history.php";
		   		}
		   		);
		}  	
   }
   
   	function submit_order1(){
	   	var payment_method=$("input[name='payment_method']:checked").val();
	   	var coupon=$("#coupon").val();
	   	var total_price=$("#total_price").val();
	   	var product_details=$("#product_details").val();
	   	var voucher=$("#voucher").val();
	   	var comments=$("#comments").val();
	   	var confirm_agree=$("input[type='checkbox']").val();
	   	var payment_status=1;
	   	$.post(
	   		"ajax_submit_order.php?msg=COD",
	   		{payment_method:payment_method,coupon:coupon,voucher:voucher,comments:comments,confirm_agree:confirm_agree,total_price:total_price,product_details:product_details,payment_status:payment_status},
	   		function(r){
	   		alert("Order replace successfully");
	   		window.location="index.php";
	   		}
   		);   	
   }   
   
   // function payment_method(){
	//    	var payment_method=$("input[name='payment_method']:checked").val();
	//    	if(payment_method==1){
	//    		$("#cod").hide();
	//    		$("#paypal").show();
	//    		$("#confirm_order").show();
	//    		$("#pay_confirm").show();
	//    		$("#qrcode_confirm").hide();
	//    		$("input[name='payment_method_qrcode']").prop("checked", false);
	//    	}
	   	
	//    	if(payment_method==3){
	//    		$("#paypal").hide();
	//    		$("#cod").show();
	//    	}
   // }
      
   // function payment_method_qrcode(){
	//    	var payment_method_qrcode=$("input[name='payment_method_qrcode']:checked").val();
	//    	if(payment_method_qrcode=="qrcode"){
	   		
	//    		//$("input[name='payment_method']:checked").val(0);
	//    		$("input[name='payment_method_qrcode']").prop("checked", true);
	//    		$("input[name='payment_method']").prop("checked", false);
	//    		$("#cod").hide();
	//    		$("#paypal").hide();
	   		
	//    		$("#confirm_order").hide();
	//    		$("#pay_confirm").hide();
	//    		$("#confirm_qrcode").show();
	//    		$("#qrcode_confirm").show();
	//    		$("#qrcode").show();
	//    	}
   // }   
   function payment_method(val) {
      console.log(val);
      value = val.toLowerCase();
      if(value == "paypal" || value == "ivan"){
         $("#cod").hide();
         $("#paypal").show();
         $("#confirm_order").show();
         $("#pay_confirm").show();
         $("#qrcode_confirm").hide();
      }
      if( value == "cash on delivery"){
         $("#qrcode_confirm").hide();
         $("#paypal").hide();
         $("#pay_confirm").show();
         $("#cod").show();
      }
      if(value == "qrcode"){
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
	   	var coupon=$("#coupon").val();
	   	if(coupon.trim()==""){
	   		alert("Please enter Coupon Code");
	   		$("#coupon").focus();
	   		return false;
	   	}
	   	$.post(
		   	"ajax_apply_coupon.php",
		   	{coupon:coupon,total:total},
		   	function(r){
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
      <div id="content" class="col-sm-12">
         <!-- <h2 class="title"><?php echo $lang_34;  ?></h2> -->
         <div class="row">
            <div class="col-sm-12">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title font_style"><i class="fa fa-credit-card"></i> <?php echo $lang_36;  ?></h4>
                        </div>
                        <div class="panel-body">
                           <p class="font_style"><?php echo $lang_37;  ?></p>
                           <div class="alert alert-info font_style" id="payment" style="padding: 8px 8px 8px 15px;" role="alert"><a class="close" onclick="$(this).parents('div').first().slideUp();">×</a><?php echo $lang_315;  ?></div>
                           <?php
                              $payment_method=getDetails(doSelect1("apm_id,apm_name,status","ambit_payment_method",array("status"=>1)));
                              foreach($payment_method as $k6=>$v6){							
                              ?>
                           <div class="radio col-md-3 col-sm-3"  style="margin-top: 10px;">
                              <label class="font_style">
                              <input type="radio" onclick="payment_method(this.value);" name="payment_method" value="<?php echo $v6["apm_name"]; ?>"  ><?php echo $v6["apm_name"]; ?>									
                              </label>
                           </div>
                           <?php
                              }
                              ?>
                           <div class="radio col-md-3 col-sm-3 " style="margin-top: 10px;">
                              <label class="font_style" >
                              <input type="radio"onclick="payment_method(this.value);" name="payment_method" value="qrcode"><?php echo $lang_311;  ?>
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title font_style"><i class="fa fa-shopping-cart"></i> <?php echo $lang_25;  ?></h4>
                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table class="table table-bordered">
                                 <thead>
                                    <tr class="font_style">
                                       <td class="text-center"><?php echo $lang_26;  ?></td>
                                       <td class="text-right"><?php echo $lang_27;  ?></td>
                                       <td class="text-right"><?php echo $lang_30;  ?></td>
                                       <td class="text-right"><?php echo $lang_38;  ?></td>
                                       <td class="text-right"><?php echo $lang_31;  ?></td>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $select="aad_cart_id,aad_cart_ac_id,aad_cart_apa_id,currency,price,tax,discount,shipping_cost,quantity";
                                       $from="ambit_add2cart";
                                       $where=array("aad_cart_ac_id"=>$_SESSION["ac_id"]);
                                       $cus_cart_dtls=getDetails(doSelect1($select,$from,$where));
                                       $total_price=0;
                                       $product_details="";
                                       foreach($cus_cart_dtls as $k=>$v){
                                       	if($k !=0){
                                       	$product_details.=' || ';
                                       }
                                       ?>
                                    <tr>
                                       <?php
                                          $image=seeMoreDetails("image","ambit_product_image",array("api_apa_id"=>$v["aad_cart_apa_id"]));
                                          ?>
                                       <td class="text-center"><a href="product.php?id=<?php echo $v["aad_cart_apa_id"];?>"><img width="70px" src="vendor/product_photo/<?php echo $image; ?>" alt="Xitefun Causal Wear Fancy Shoes" title="Xitefun Causal Wear Fancy Shoes" class="img-thumbnail" /></a></td>
                                       <td class="text-left"><a href="product.php?id=<?php echo $v["aad_cart_apa_id"];?>"><?php echo seeMoreDetails("name","ambit_product_add",array("apa_id"=>$v["aad_cart_apa_id"]));  ?></a></td>
                                       <td class="text-left" width="200px">
                                          <div class="input-group btn-block quantity">
                                             <input type="text" name="quantity" id="quanty_num<?php echo $v["aad_cart_id"]; ?>" value="<?php echo $v["quantity"];  ?>" size="1" class="form-control" />
                                             <span class="input-group-btn">
                                             	<button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary" onclick="refresh_item('<?php echo $v["aad_cart_id"]; ?>','<?php echo $v["aad_cart_apa_id"]; ?>');"><i class="fa fa-refresh"></i></button>                
                                             	<button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick="remove_cart('<?php echo $v["aad_cart_id"]; ?>');"><i class="fa fa-times-circle"></i></button>
                                             </span>
                                          </div>
                                       </td>
                                       <td class="text-right"><?php echo currency1($v["currency"],trim($v["price"]) / trim($v["quantity"]));  ?></td>
                                       <td class="text-right"><?php echo currency1($v["currency"],$v["price"]);  ?></td>
                                    </tr>
                                    <?php
                                       $total_price=currency_price($v["currency"],$total_price+trim($v["price"]));
                                       $product_details.=$v["aad_cart_apa_id"].':'.$v["quantity"].':'.$v["price"];
                                       }
                                       ?>
                                 </tbody>
                                 <tfoot>
                                    <tr>
                                       <td class="text-right font_style" colspan="4"><font color="red"><strong><?php echo $lang_39;  ?>:</strong></font></td>
                                       <td class="text-left" width="200px">
                                          <div class="input-group btn-block quantity">
                                             <input type="text" name="total_price2" id="total_price2" style="color:red;" value="0" size="1" class="form-control" readonly />
                                             <span class="input-group-btn">
                                             <button type="button" data-toggle="tooltip" title="Remove Coupon" class="btn btn-danger" onClick="remove_coupon();"><i class="fa fa-times-circle"></i></button>
                                             </span>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="text-right" colspan="4"><strong><?php echo $lang_31;  ?>:</strong></td>
                                       <td class="text-right" id="total_price1"><?php echo get_currency().$total_price;  ?></td>
                                    </tr>
                                    <input type="hidden" id="total_price" value="<?php echo $total_price;  ?>">
                                    <input type="hidden" id="product_details" value="<?php echo $product_details;  ?>">
                                 </tfoot>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="panel panel-default col-sm-12" style="padding-left:0px; padding-right:0px;">
                        <div class="panel-heading">
                           <h4 class="panel-title"><i class="fa fa-ticket"></i> <?php echo $lang_40;  ?></h4>
                        </div>
                        <div class="panel-body">
                           <label for="input-coupon" class="col-sm-3 control-label font_style" style="padding-top:4px"><?php echo $lang_41;  ?></label>
                           <div class="input-group">
                              <input type="text" class="form-control" id="coupon" placeholder="<?php echo $lang_43;  ?>" value="" name="coupon" id="coupon">
                              <span class="input-group-btn">
                              <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-coupon" onclick="change_discount('<?php echo $total_price;  ?>');" value="Apply Coupon">
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12" id="qrcode_confirm">
                     <div class="panel panel-default col-sm-6" style="padding-left:0px; padding-right:0px;">
                        <div class="panel-heading">
                           <h4 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $lang_311;  ?> </h4>
                        </div>
                        <div class="panel-body">
                           <div class="row col-12">
                              <div class="col-md-7 col-sm-7">
                                 <!--<input type='button' data-toggle="tooltip" title="Buy Now"  class="btn btn-primary" id="confirm_qrcode" value='Confirm' onclick="submit_qrcode()" />-->
                                 <button title="Buy Now"  class="btn btn-primary center-block" id="confirm_qrcode" onclick="submit_qrcode()" style="margin-top: 80px;"> <?php echo $lang_313;  ?></button>
                                 <label class="control-label" for="confirm_agree" style="margin-top:50px;" >
		                           <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree_qrcode" name="confirm agree_qrcode">
		                           <span class="font_style"> <?php echo $lang_122;  ?> <a class="agree" href="terms_condition.php"><b><?php echo $lang_123;  ?></b></a></span> 
		                         </label>
                              </div>
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
                           </div>
                           
                        </div>
                     </div>
                     <div class="row">
                     	<a href="cart.php" class="btn btn-primary" style="right:0px !important; bottom:20px !important;position: absolute; "> <?php echo $lang_314;  ?></a>
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
                           <label class="control-label" for="confirm_agree">
                           <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
                           <span class="font_style"><?php echo $lang_122;  ?> <a class="agree" href="terms_condition.php"><b><?php echo $lang_123;  ?></b></a></span> </label>
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
                              //$url .= "paypal.php";
                              //$url .= "ouslet/paypal.php";
                              $url 		= "https://www.ouslet.com/paypal.php";
                              $cancel_url = "https://www.ouslet.com/checkout.php";
                              //$cancel_url = "http://localhost/ouslet/checkout.php";
                              
                              $gateway=1;
                              $row_al=getDetails(doSelect("*","payment_gateway",array("id"=>$gateway)));
                              
                              ?>							
                           <?php
                              if(!empty($cus_cart_dtls)){
                              
                              ?>							
                           <div class="buttons" id="paypal" style="display:none;">
                              <div class="pull-right">
                                 <!--<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="pay_form" onsubmit="return submit_order();" >-->
                                 <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="pay_form"  >
                                    <input type='hidden' name="cmd" value=_xclick>
                                    <input type='hidden' name="business" value="<?php echo $row_al[0]["pg_id"];?>">
                                    <input type='hidden' name="item_name" value="<?php echo get_site_settings(25);  ?>">
                                    <input type='hidden' name="amount" id="amount" value="<?php echo $total_price; ?>">
                                    <input type='hidden' name="no_note" value=1>
                                    <input type='hidden' name="currency_code" value="USD">
                                    <input type='hidden' name="rm" value=2 />
                                    <input type='hidden' name="custom" id="custom" value="" />
                                    <input type='hidden' name="return" value="<?php echo $url;?>">
                                    <input type='hidden' name="cancel_return" value="<?php echo $cancel_url;?>" />
                                    <input type='hidden' name="notify_url" value="<?php echo $url;?>" />
                                    <!--<input type='submit' data-toggle="tooltip" title="Buy Now"  class="btn btn-primary" value='Confirm Order'  />-->
                                    <input type='button' data-toggle="tooltip" title="Buy Now"  class="btn btn-primary" id="confirm_order" value='Confirm Order' onclick="submit_order()" />
                                 </form>
                              </div>
                           </div>
                           <div class="buttons" id="cod" style="display:none;">
                              <div class="pull-right">
                                 <input type="button" class="btn btn-primary" onclick="submit_order1();" name="confirm_order" id="button-confirm" value="<?php echo $lang_266;  ?>">				
                              </div>
                           </div>
                           <?php
                              }
                              ?>
                        </div>
                     </div>
                  </div>
                  <!-- 	</form> -->
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
   	print_r($_POST);
   }
   
   
   ?>	
<!-- Footer Container -->
<?php
   include("include/footer.php");
   }else{
   echo "<script>alert('You Have To Login First !');window.location='login.php';</script>";
   }
   ?>


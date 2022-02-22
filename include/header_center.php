<script type="text/javascript">
	function fetch_sub_cat(){
    var pc_id=$("#category_id").val();
    $.ajax({
      url:'fetch_category.php?pc_id='+pc_id,
      type:'post',
      dataType:'text',
      cache:false,
      contentType:false,
      processData:false,
      success:function(response){
      //alert(response);
       $("#sub_category_id").html(response); 
      }
    });
  }

  function fetch_sub_sub_cat(){
    var psc_id=$("#sub_cat").val();

    $.ajax({
      url:'fetch_category.php?psc_id='+psc_id,
      type:'post',
      dataType:'text',
      cache:false,
      contentType:false,
      processData:false,
      success:function(response){
      //alert(response);
       $("#sub_sub_cat").html(response); 
      }
    });
  }
  </script>
  
  <style>
  	@media only screen and (max-width: 1200px) { 
  		.dropdown-backdrop {
  		 z-index:-1;	
		}  	
	}
  </style>
  
  
<div class="header-center left" style="padding:20px">
	<div class="container">
		<div class="row">
			<!-- Logo -->
			<div class="navbar-logo col-md-3 col-sm-12 col-xs-12">
				<a href="index.php"><img src="sitelogo/<?php echo get_site_settings(17);  ?>" title="<?php echo get_site_settings(25);  ?>" alt="<?php echo get_site_settings(25);  ?>" /></a>
			</div>
			<!-- //end Logo -->

			<!-- Search -->
			<div id="sosearchpro" class="col-sm-7 search-pro">
				<form method="GET" action="search.php">
					<div id="search0" class="search input-group">
						<div class="select_category filter_type icon-select">
							<select class="no-border" name="category_id" id="category_id" onchange="fetch_sub_cat();">
								<option value="0"><?php echo $lang_253; ?></option>
						<?php
                        $category=getDetails(doSelect("pc_id,pc_name","product_category",array()));
                        foreach ($category as $k => $v) {
                        ?>
						<option value="<?php echo $v["pc_id"]; ?>"><?php echo $v["pc_name"];  ?></option>
						<?php
                        }
                        ?>
							</select>
						</div>
						<div class="select_category filter_type icon-select">
							<select class="no-border" name="sub_category_id" id="sub_category_id">
							<option value="0"><?php echo $lang_254; ?></option>	
								
							</select>
						</div>
						<input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="<?php echo $lang_255; ?>" name="<?php echo $lang_255; ?>" >
						<span class="input-group-btn">
						<button type="submit" class="button-search btn btn-primary" ><i class="fa fa-search"></i></button>
						</span>
					</div>
					
				</form>
			</div>
			<!-- //end Search -->

			<!-- Secondary menu -->
			<div class="col-md-2 col-sm-5 col-xs-12 shopping_cart pull-right">
				<!--cart-->
				<div id="cart" class=" btn-group btn-shopping-cart">
					<a data-loading-text="Loading..." class="top_cart dropdown-toggle" data-toggle="dropdown">
						<div class="shopcart">
							<span class="handle pull-left"></span>
							<span class="title"><?php echo $lang_256; ?></span>
<?php
$price=0;
$discount=0;
$tax=0;
$shipping_cost=0;
$count=0;
if(!isset($_SESSION["ac_id"])){
if(isset($_SESSION["add2cart"]) && trim($_SESSION["add2cart"])!=""){
$cart_details=explode("//",$_SESSION["add2cart"]);
foreach($cart_details as $key1=>$val){
	$pro_id=explode("||",$val);
	
	$count			=	$count		+	trim($pro_id[1]);
	$price			=	$price		+	trim(getPrice($pro_id[0]))*trim($pro_id[1]);
	$discount		=	$discount	+	trim(getDiscount($pro_id[0]))*trim($pro_id[1]);
	$tax			=	$tax		+	trim(getTax($pro_id[0]))*trim($pro_id[1]);
	$shipping_cost	=	$shipping_cost+	trim(getShippingCost($pro_id[0]))*trim($pro_id[1]);
	
	//$price += $shipping_cost;
	$price += trim(getShippingCost($pro_id[0]))*trim($pro_id[1]) - trim(getDiscount($pro_id[0]))*trim($pro_id[1]);
}
$total_item=$count.' item(s)';
$cart=$count.' item(s) - '.currency1('1',$price);
}else{
	$total_item='0 item(s)';
$cart='0 item(s) - '.currency('1','0.00');
}
}else{
$cus_cart_dtls=getDetails(doSelect1("aad_cart_id,aad_cart_ac_id,aad_cart_apa_id,price,tax,discount,shipping_cost,quantity","ambit_add2cart",array("aad_cart_ac_id"=>$_SESSION["ac_id"])));
//$cus_cart_dtls=array();
if(!empty($cus_cart_dtls)){
foreach($cus_cart_dtls as $key1=>$val){
	$pro_id=$val["aad_cart_apa_id"];
	
	$count=$count+trim($val["quantity"]);
	/*$price=$price+trim(getPrice($pro_id))*trim($val["quantity"]);
	$discount=$discount+trim(getDiscount($pro_id))*trim($val["quantity"]);
	$tax=$tax+trim(getTax($pro_id))*trim($val["quantity"]);
	$shipping_cost=$shipping_cost+trim(getShippingCost($pro_id))*trim($val["quantity"]);*/
	
	$price			=	$price	+		trim($val['price'])		*trim($val["quantity"]);
	$discount		=	$discount	+	trim($val['discount'])	*trim($val["quantity"]);
	$tax			=	$tax	+		trim($val['tax'])		*trim($val["quantity"]);
	$shipping_cost	=	$shipping_cost+	trim(getShippingCost($pro_id))*trim($val["quantity"]);
	
	// $price += $shipping_cost;
	//$price += $shipping_cost - $discount;
}	
$total_item=$count.' item(s)';
$cart=$count.' item(s) - '.currency1('1',$price);	
}else{
$total_item='0 item(s)';
$cart='0 item(s) - '.currency1('1','0.00');
}
}
?>							
							<p class="text-shopping-cart cart-total-full" id="crt_dtls"><?php echo $cart; ?></p>
						</div>
					</a>

					<ul class="tab-content content dropdown-menu pull-right shoppingcart-box" role="menu">		
						<li>
							<div id="ckt_dtls">
								<table class="table table-bordered">
									<tbody>
										<tr>
											<td class="text-left"><strong><?php echo $lang_125; ?></strong>
											</td>
											<td class="text-right"><?php echo $total_item; ?></td>
										</tr>
										<tr>
											<td class="text-left"><strong><?php echo $lang_93; ?></strong>
											</td>
											<td class="text-right"><?php echo currency1('1',$tax); ?></td>
										</tr>
										
										<tr>
											<td class="text-left"><strong><?php echo $lang_39; ?></strong>
											</td>
											<td class="text-right"><?php echo currency1('1',$discount); ?></td>
										</tr>
										<tr>
											<td class="text-left"><strong><?php echo $lang_168; ?></strong>
											</td>
											<td class="text-right"><?php echo currency1('1',$shipping_cost); ?></td>
										</tr>
									</tbody>
								</table>
								<p class="text-right"> 
									<a href="cart.php" class="btn view-cart"><i class="fa fa-shopping-cart"></i><?php echo $lang_35; ?></a>&nbsp;&nbsp;&nbsp;
									<?php  if($count > 0){ ?> <a class="btn btn-mega checkout-cart" href="checkout.php"><i class="fa fa-share"></i><?php echo $lang_34; ?></a><?php  } ?> 
								</p>
							</div>
						</li>
					</ul>
				</div>
				<!--//cart-->
			</div>
		</div>

	</div>
</div>
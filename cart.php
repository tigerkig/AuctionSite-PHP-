<?php
session_start();
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
<script type="text/javascript">

</script>
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-home"></i></a></li>
			<li><a href="cart.php"><?php echo $lang_25;  ?></a></li>
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h2 class="title"><?php echo $lang_25;  ?></h2>
            <div class="table-responsive form-group">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center"><?php echo $lang_26;  ?></td>
                    <td class="text-left"><?php echo $lang_27;  ?></td>
                    <td class="text-left"><?php echo $lang_28;  ?></td>
                    <td class="text-left"><?php echo $lang_336;  ?></td>
                    <td class="text-left"><?php echo $lang_39;  ?></td>
                    <td class="text-left"><?php echo $lang_87;  ?></td>
                    <td class="text-left"><?php echo $lang_29;  ?></td>
                    <td class="text-left"><?php echo $lang_30;  ?></td>
                    
                    <td class="text-right"><?php echo $lang_31;  ?></td>
                  </tr>
                </thead>
                <tbody>
<?php  
/* if(empty($_SERVER['REQUEST_URI'])) {
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
 */
?>



<?php
if(isset($_SESSION["ac_id"])){
	if(isset($_GET["page"]))
	  $page = (int)$_GET["page"];
	else
	  //$_GET["page"]=1;
		$page = 1;
		
	$setLimit =10;
	$pageLimit = ($page * $setLimit) - $setLimit;
	$limit=' LIMIT '.$pageLimit.','.$setLimit;
	  
	$select="aad_cart_id,aad_cart_ac_id,aad_cart_apa_id,currency,price,tax,discount,shipping_cost,quantity,date";
	$from="ambit_add2cart";
	$where=array("aad_cart_ac_id"=>$_SESSION["ac_id"]);
	$total_cus_cart_dtls=getDetails(doSelect1($select,$from,$where));
	$total_page=ceil(count($total_cus_cart_dtls)/$setLimit);
	
	$cus_cart_dtls=getDetails(doSelect1($select,$from,$where,$limit));

	if(!empty($total_cus_cart_dtls)){
		foreach($cus_cart_dtls as $k=>$v){
?>				
                  <tr>
				  <?php
				  $image=seeMoreDetails("image","ambit_product_image",array("api_apa_id"=>$v["aad_cart_apa_id"]));
				  
				  $posting_type = seeMoreDetails("posting_type","ambit_product_add",array("apa_id"=>$v["aad_cart_apa_id"]));
				  ?>
                    <td class="text-center"><a href="product.php?id=<?php echo $v["aad_cart_apa_id"];?>"><img width="70px" src="vendor/product_photo/<?php echo $image; ?>" alt="Xitefun Causal Wear Fancy Shoes" title="Xitefun Causal Wear Fancy Shoes" class="img-thumbnail" /></a></td>
                    <td class="text-left"><a href="product.php?id=<?php echo $v["aad_cart_apa_id"];?>"><?php echo seeMoreDetails("name","ambit_product_add",array("apa_id"=>$v["aad_cart_apa_id"]));  ?></a></td>
                    <td class="text-left"><?php echo get_date_str($v["date"]);  ?></td>
                    
                    <td class="text-left"><?php echo currency1($v["currency"],$v["price"] - $v["tax"] -$v["shipping_cost"]);  ?></td>
	                <td class="text-left"><?php echo currency1($v["currency"],$v["discount"]);  ?></td>
	                <td class="text-left"><?php echo currency1($v["currency"],$v["tax"]);  ?></td>                        
                    
                    <td class="text-left"><?php echo currency1($v["currency"],$v["shipping_cost"]);  ?></td>
                    <td class="text-left" width="200px"><div class="input-group btn-block quantity">
                        <!--<input type="text" name="quantity" id="quanty_num<?php echo $v["aad_cart_id"]; ?>" value="<?php echo $v["quantity"];  ?>" size="1" class="form-control" />-->
                        <input type="text" name="quantity" id="quanty_num<?php echo $v["aad_cart_id"]; ?>" value="<?php echo $v["quantity"];  ?>" size="1" class="form-control" 
                        	<?php if($posting_type == 1) echo 'readonly';?>
                        />
                        <span class="input-group-btn">
						<button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary" onclick="refresh_item('<?php echo $v["aad_cart_id"]; ?>','<?php echo $v["aad_cart_apa_id"]; ?>');"><i class="fa fa-refresh"></i></button>                
                        <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick="remove_cart('<?php echo $v["aad_cart_id"]; ?>');"><i class="fa fa-times-circle"></i></button>
                        </span></div></td>
                    
                    <td class="text-right"><?php echo currency1($v["currency"],$v["price"]);  ?></td>
                    <!--<td class="text-right"><?php echo currency1($v["currency"],$v["price"] - $v["discount"]);  ?></td>-->
                  </tr>
		<?php
		}

	}else{
		?>
		<tr><td colspan="9"><center><font color="red"><?php echo $lang_32;  ?></font></center></td></tr>	
	<?php
	}
}else{
	$select="apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size,currency,price,status";	
	if(isset($_SESSION["add2cart"]) && trim($_SESSION["add2cart"])!=""){
		$cart_details=explode("//",$_SESSION["add2cart"]);
		foreach($cart_details as $key1=>$val){
			$pro_id=explode("||",$val);

			$guest_cart_dtls=getDetails(doSelect1($select,"ambit_product_add",array("apa_id"=>$pro_id[0])));
			if(!empty($guest_cart_dtls)){
				foreach($guest_cart_dtls as $k3=>$v3){
	?>
					<tr>
					  <?php
					  	$image=seeMoreDetails("image","ambit_product_image",array("api_apa_id"=>$v3["apa_id"]));
					  	
					  	$posting_type = seeMoreDetails("posting_type","ambit_product_add",array("apa_id"=>$v3["apa_id"]));
				  	  ?>
	                    <td class="text-center"><a href="product.php?id=<?php echo $v3["apa_id"];?>"><img width="70px" src="vendor/product_photo/<?php echo $image; ?>" alt="Xitefun Causal Wear Fancy Shoes" title="Xitefun Causal Wear Fancy Shoes" class="img-thumbnail" /></a></td>
	                    <td class="text-left"><a href="product.php?id=<?php echo $v3["apa_id"];?>"><?php echo $v3["name"];  ?></a></td>
	                    <td class="text-left"><?php echo get_date_str(date("Y-m-d"));  ?></td>
	                    
	                    <td class="text-left"><?php echo currency1($v3["currency"],trim(getPrice($v3["apa_id"]) - getTax($v3["apa_id"])));  ?></td>
	                    <td class="text-left"><?php echo currency1($v3["currency"],trim(getDiscount($v3["apa_id"])));  ?></td>
	                    <td class="text-left"><?php echo currency1($v3["currency"],trim(getTax($v3["apa_id"])));  ?></td>                        
                    
						<td class="text-left"><?php echo currency1($v3["currency"],trim(getShippingCost($v3["apa_id"])));  ?></td>
	                    <td class="text-left" width="200px"><div class="input-group btn-block quantity">
	                        <!--<input type="text" name="quantity" id="quanty_num<?php echo $key1; ?>" value="<?php echo $pro_id[1];  ?>" size="1" class="form-control" />-->
	                         <input type="text" name="quantity" id="quanty_num<?php echo $key1; ?>" value="<?php echo $pro_id[1];  ?>" size="1" class="form-control" 
	                        	<?php if($posting_type == 1) echo 'readonly';?>
	                        />
	                        <span class="input-group-btn">
		                   		<button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary" onclick="refresh_session_item('<?php echo $key1; ?>');"><i class="fa fa-refresh"></i></button>                
		                        <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick="remove_guest_cart('<?php echo $v3["apa_id"]; ?>','<?php echo $key1; ?>');"><i class="fa fa-times-circle"></i></button>
	                        </span></div></td>
	                    
	                    <!--<td class="text-right"><?php echo currency1($v3["currency"],trim(getPrice($v3["apa_id"]))*trim($pro_id[1]));  ?></td>-->
	                    <!--<td class="text-right"><?php echo currency1($v3["currency"],trim(getPrice($v3["apa_id"]) + getShippingCost($v3["apa_id"]))*trim($pro_id[1]));  ?></td>-->
	                    <td class="text-right"><?php echo currency1($v3["currency"],trim(getPrice($v3["apa_id"]) + getShippingCost($v3["apa_id"])- getDiscount($v3["apa_id"]))*trim($pro_id[1]));  ?></td>
	    			</tr>
				<?php	
				}
			}else{
			?>
				<tr><td colspan="9"><center><font color="red"><?php echo $lang_32;  ?></font></center></td></tr>	
			<?php
			}

		}
		$total_item=count($cart_details).' item(s)';

		$cart=count($cart_details).' item(s) - '.get_currency().$price;
	}else{
		?>
		<tr><td colspan="9"><center><font color="red"><?php echo $lang_32;  ?></font></center></td></tr>
	<?php
	}
	?>
<!-- <tr><td colspan="6"><font color="red">No Data Found !</font></td></tr> -->
<?php
}
?>				  
                </tbody>
              </table>
<?php
if(isset($_SESSION["ac_id"])){
?>
<ul class="pagination">
                    <?php
                    if($page != 1){
                      $prev=$page-1;
                    ?>
                    <li><a href="cart.php?page=1" title="First"><i class="fa fa-angle-double-left"></i></a></li>
                    <li><a href="cart.php?page=<?php  echo $prev ?>"><i class="fa fa-chevron-left"></i></a></li>
                    <?php
                    }
                   ?>
                   <!-- new -->
                   <?php
$l=1;
$s=$page-5;
if($s < 1){
  $s=1;
  }
for($p=$s;$p<$page;$p++){
  if($p!=$page){
?>
<li><a href="cart.php?page=<?php echo $p; ?>"><?php echo $p;  ?></a></li>
<?php
}else{
?>
<li class="active"><a href="javascript:void(0);"><?php echo $p; ?></a></li>
<?php
}
$l++;
if($l==7){
  break;
}
}

if($total_page > 1){
$l=1;
for($p=$page;$p<=$total_page;$p++){
  if($p!=$page){
?>
<li><a href="cart.php?page=<?php echo $p; ?>"><?php echo $p;  ?></a></li>
<?php
}else{
?>
<li class="active"><a href="javascript:void(0);"><?php echo $p; ?></a></li>
<?php
}
$l++;
if($l==5){
  break;
}
}
}

                    if($page < $total_page){
                      $next=$page+1;
                      ?>
                      <li><a href="cart.php?page=<?php echo $next;  ?>"><i class="fa fa-chevron-right"></i></a></li>
                      <li><a href="cart.php?page=<?php echo $total_page;  ?>" title="Last"><i class="fa fa-angle-double-right"></i></a></li>
                      <?php
                      }
                      ?>
                    </ul>
<?php
}
?>
            </div>
          
		  
         
          <div class="buttons">
            <div class="pull-left"><a href="index.php" class="btn btn-default"><?php echo $lang_33;  ?></a></div>
			<?php
			if(isset($_SESSION["ac_id"])){
			if(!empty($total_cus_cart_dtls)){		
			?>
            <div class="pull-right"><a href="checkout.php" class="btn btn-primary"><?php echo $lang_34;  ?></a></div>
			<?php
			  }
			}else{
			if(!empty($guest_cart_dtls)){
			?>
			 <div class="pull-right"><a href="checkout.php" class="btn btn-primary"><?php echo $lang_34;  ?></a></div>
			<?php				
			}	
			}
			?>
          </div>
        </div>
        <!--Middle Part End -->
			
		</div>
	</div>
	<!-- //Main Container -->
	<script type="text/javascript">
	/*$('.date').datetimepicker({
		pickTime: false
	});*/
	</script>

	<!-- Footer Container -->
		<?php
	include("include/footer.php");
	?>
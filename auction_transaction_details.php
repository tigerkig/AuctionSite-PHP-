<?php
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
	function return_product(arp_ass_id,arp_apa_id,arp_ac_id,arp_vr_id,quantity){
	  $.post(
	  "ajax_return.php",
	  {arp_ass_id:arp_ass_id,arp_apa_id:arp_apa_id,arp_ac_id:arp_ac_id,arp_vr_id:arp_vr_id,quantity:quantity},
	  function(r){
		  $("#ajax").html(r);
	  }
	  );
	}
	</script>
	<div id="ajax">
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-home"></i></a></li>
			<li><a href="order-history.php"><?php echo $lang_9;  ?></a></li>
			<li><a href="javascript:void(0);"><?php echo $lang_82;  ?></a></li>
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			<div id="content" class="col-sm-12">
				<h2 class="title"><?php echo $lang_82;  ?></h2>
<?php

$apa_id=trim(seeMoreDetails("apa_id","ambit_product_bid",array("id"=>trim($_GET["id"]))));

$result=getDetails(doSelect("ass_id,ass_apa_id,ass_ac_id,ass_vr_id,date,shipment_status,order_id,quantity,currency,price","ambit_shipment_status",array("ass_apa_id"=>$apa_id, "auction_flag" => 1)));
foreach($result as $k=>$v){
?>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<td colspan="2" class="text-left"><?php echo $lang_83;  ?></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="width: 50%;" class="text-left"> <b><?php echo $lang_78;  ?>:</b> <?php echo $v["order_id"];  ?>
								<br>
								<b><?php echo $lang_81;  ?>:</b> <?php echo get_date_str($v["date"]);  ?></td>
								<?php
								$payment_method=trim(seeMoreDetails("payment_method","ambit_buy_product_auction",array("bid_id"=>trim($_GET["id"]))));
								?>
							<td style="width: 50%;" class="text-left"> <b><?php echo $lang_36;  ?>:</b> 
							<?php
							if($payment_method==1){
								echo 'PayPal';
							}else if($payment_method==3){
								echo 'COD';
							}
							
							?>
							
								<br>
								<b><?php echo $lang_84;  ?>:</b> <?php echo $lang_335;  ?> </td>
						</tr>
					</tbody>
				</table>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<td style="width: 100%; vertical-align: top;" class="text-left"><?php echo $lang_85;  ?></td>
							
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-left">
							<?php
							echo getCustomerAddr($v["ass_ac_id"]);
							?>
							</td>
							
						</tr>
					</tbody>
				</table>
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td class="text-left"><?php echo $lang_27;  ?></td>
								<td class="text-left"><?php echo $lang_49;  ?></td>
								<td class="text-right"><?php echo $lang_30;  ?></td>
								<td class="text-right"><?php echo $lang_47;  ?></td>
								<td class="text-right"><?php echo $lang_80;  ?></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-left"><?php echo getProductName($v["ass_apa_id"]);  ?></td>
								
								<td class="text-left"><?php echo getBrand($v["ass_apa_id"]); ?></td>
								<td class="text-right"><?php echo $v["quantity"]; ?></td>
								<td class="text-right"><?php echo currency1($v["currency"],$v["price"]);  ?></td>
<?php
if($v["shipment_status"]==1){
	$status="Shipped";
}else{
	$status="Pending";
}
if($v["shipment_status"]==1){
?>
								
<?php
}
?>								
								<td class="text-right"><?php echo $status;  ?></td>

							</tr>

						</tbody>
						
					</table>
				</div>
				<?php
				}
				?>
		
			</div>
			<!--Middle Part End-->
			<!--Right Part Start -->
			
			<!--Right Part End -->
		</div>
	</div>
	
	<!-- //Main Container -->
</div>
<!-- //End Ajax Div -->

<!-- Footer Container -->
			<?php
	include("include/footer.php");
	}else{
	echo '<script>window.location="index.php";</script>';
}
	?>
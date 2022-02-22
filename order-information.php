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
$result=getDetails(doSelect("ass_id,ass_apa_id,ass_ac_id,ass_vr_id,date,shipment_status,order_id,price, quantity","ambit_shipment_status",array("ass_id"=>$_GET["id"])));
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
							<td style="width: 50%;" class="text-left"> <b><?php echo $lang_36;  ?>:</b><?php echo $lang_369; ?>
								<br>
								<b><?php echo $lang_84;  ?>:</b><?php echo $lang_335; ?> </td>
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
								<td class="text-right"><?php echo $lang_31;  ?></td>
								<td style="width: 20px;"></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-left"><?php echo getProductName($v["ass_apa_id"]);  ?></td>
								
								<td class="text-left"><?php echo getBrand($v["ass_apa_id"]); ?></td>
								<td class="text-right"><?php echo $v["quantity"]; ?></td>
								
								<td class="text-right"><?php echo get_currency().$v["price"]/$v["quantity"];  ?></td>
								<td class="text-right"><?php echo get_currency().$v["price"];  ?></td>
<?php
if($v["shipment_status"]==1){
	$status="Shipped";
}else{
	$status="Pending";
}
if($v["shipment_status"]==1){
?>
								<td style="white-space: nowrap;" class="text-right">
									<a class="btn btn-danger" title="" data-toggle="tooltip" href="javascript:void(0);" onclick="return_product('<?php echo $v["ass_id"]; ?>','<?php echo $v["ass_apa_id"]; ?>','<?php echo $v["ass_ac_id"]; ?>','<?php echo $v["ass_vr_id"]; ?>','<?php echo $v["quantity"]; ?>');" data-original-title="Return"><i class="fa fa-reply"></i></a>
								</td>
<?php
}
?>
							</tr>

						</tbody>
						<tfoot>
							
							<tr>
								<td colspan="3"></td>
								<td class="text-right"><b><?php echo $lang_86;  ?></b>
								</td>
								<td class="text-right"><?php echo get_currency().getShippingCost($v["ass_apa_id"]);  ?></td>
								
							</tr>
							<tr>
								<td colspan="3"></td>
								<td class="text-right"><b><?php echo $lang_87;  ?></b>
								</td>
								<td class="text-right"><?php echo get_currency().getTax($v["ass_apa_id"]);  ?></td>
								
							</tr>
							<tr>
								<td colspan="3"></td>
								<td class="text-right"><b><?php echo $lang_39;  ?></b>
								</td>
								<td class="text-right"><?php echo get_currency().getDiscount($v["ass_apa_id"]);  ?></td>
								
							</tr>
						</tfoot>
					</table>
				</div>
				<?php
				}
				?>
			<!--	<h3>Order History</h3>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<td class="text-left">Date Added</td>
							<td class="text-left">Status</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-left">20/06/2016</td>
							<td class="text-left">Processing</td>
						</tr>
						<tr>
							<td class="text-left">21/06/2016</td>
							<td class="text-left">Shipped</td>
						</tr>
						<tr>
							<td class="text-left">24/06/2016</td>
							<td class="text-left">Complete</td>
						</tr>
					</tbody>
				</table>
				<div class="buttons clearfix">
					<div class="pull-right"><a class="btn btn-primary" href="#">Continue</a>
					</div>
				</div> -->



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
<?php
session_start();
require_once("function.php");
if(isset($_SESSION["vendor_id"]) && $_SESSION["vendor_email"]){
$vendor_details=getDetails(doSelect("*","vendor_registration",array("vr_id"=>$_SESSION["vendor_id"])));

$_SESSION["main_menu"] = "product_shipment";
$_SESSION["sub_menu"]  = "ship_product_listing";

include("include/header.php");
?>

<section id="content_wrapper">
 
<header id="topbar" class="alt">
<div class="topbar-left">
<ol class="breadcrumb">
<li class="breadcrumb-icon">
<a href="index.php">
<span class="fa fa-home"></span>
</a>
</li>
<li class="breadcrumb-active">
<a href="index.php"><?php  echo $lang_148; ?></a>
</li>
<li class="breadcrumb-link">
<a href="index.php"><?php  echo $lang_149; ?></a>
</li>
<li class="breadcrumb-current-item">Shipment Product Listing</li>
</ol>
</div>
</header>
 
<script type="text/javascript">
	function change_status(id){
		$.post(
		"shipment_approve.php",
		{ass_id:id},
		function(r){
			location.reload();
		}
		);
	}
	/* function delete_product(id){
		 if(confirm("Are you sure , to delete User ???")){
		$.post("delete_product.php",{apa_id:id},function(r){
			if(r==1){
		window.location="product_listing.php";	
	}else{
		alert("Something went wrong !");
		}
			}
		);
	}
	} */
	
	function delete_order(ass_id){
		//alert(ass_id);
		$.post(
		"cancel_order.php",
		{ass_id:ass_id},
		function(r){
			if(r==1){
				alert("Order Cancel Successfully");
				location.reload();
			}else{
				alert("Something Went Wrong !");
			}
		}
		);
	}
</script> 
<section id="content" class="table-layout animated fadeIn">
 
<div class="chute chute-center">
<div class="row">
<!--  -->
<div class="col-md-12">
<div class="panel panel-visible" id="spy6">
<div class="panel-heading">
<div class="panel-title hidden-xs">
<?php  echo $lang_187; ?>
<?php
$result=getDetails(doSelect("ass_id,ass_apa_id,cancel_status,ass_ac_id,ass_vr_id,date,shipment_status,quantity","ambit_shipment_status",array("ass_vr_id"=>$_SESSION["vendor_id"]),"ORDER BY date DESC"));
?>
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable_ship" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m"><?php  echo $lang_27; ?></th>
<th class="va-m"><?php  echo $lang_189; ?></th>
<th class="va-m"><?php  echo $lang_113; ?></th>
<th class="va-m"><?php  echo $lang_115; ?></th>
<th class="va-m"><?php  echo $lang_28; ?></th>
<th class="va-m"><?php  echo $lang_30; ?></th>
<th class="va-m">Product Price</th>
<th class="va-m">Shipping Price</th>
<th class="va-m">Tax</th>
<th class="va-m"><?php  echo $lang_196; ?></th>
</tr>
</thead>
<tbody>
<?php
foreach($result as $k=>$v){

?>
<tr>
<td><a href="product_details.php?id=<?php echo $v["ass_apa_id"]; ?>" title="Product Details"><?php echo getProductName($v["ass_apa_id"]);  ?></a></td>

<td><a href="customer_details.php?ac_id=<?php echo $v["ass_ac_id"]; ?>" style="color:blue;"><?php echo seeMoreDetails("name","ambit_customer",array("ac_id"=>$v["ass_ac_id"]));  ?></a></td>
<td><?php echo seeMoreDetails("email","ambit_customer",array("ac_id"=>$v["ass_ac_id"]));  ?></td>
<td><?php echo seeMoreDetails("address","ambit_customer",array("ac_id"=>$v["ass_ac_id"]));  ?></td>
<td><?php echo get_date_str($v["date"]);  ?></td>
<td><?php echo $v["quantity"];  ?></td>
<!--<td><?php echo getPrice($v["ass_apa_id"]);  ?></td> -->
<td><?php echo (getPrice($v["ass_apa_id"]) - getTax($v["ass_apa_id"]) - getDiscount($v["ass_apa_id"]));  ?></td>
<td><?php echo getShippingCost($v["ass_apa_id"]);  ?></td>
<td><?php echo getTax($v["ass_apa_id"]);  ?></td>
<td>
<?php
if($v["cancel_status"]==0){
?>
<?php
$shipment_by=trim(seeMoreDetails("shipment_by","ambit_shipment_by",array("asb_id"=>1)));
?>
<?php if($v["shipment_status"]==1)echo '<img src="icon/tick1.png" width="20">'; else echo '<img src="icon/cross.png" width="20">';  ?><?php if($v["shipment_status"]==0 && $shipment_by=="Vendor") {?> 
<a href="javascript:void(0);" onclick="change_status('<?php echo $v["ass_id"];  ?>');" title="Change"><img src="icon/edit.png" width="13" /></a>
<?php
if($v["cancel_status"]==0){
?>
<a href="javascript:void(0);" onclick="delete_order('<?php echo $v["ass_id"];  ?>');" title="Cancel Order"><img src="icon/delete.png" width="20" /></a>

<?php 
}
} 
}else{
	echo '<font color="red"> Cancel</font>';
}
?>

</td>
</tr>
<?php

}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>

</div>
</div>
 
</section>
 
</section>
 
<aside id="sidebar_right" class="nano affix">
 
<div class="sidebar-right-wrapper nano-content">
<div class="sidebar-block br-n p15">
<h6 class="title-divider text-muted mb20"> Visitors Stats
<span class="pull-right"> 2015
<i class="fa fa-caret-down ml5"></i>
</span>
</h6>
<div class="progress mh5">
<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%">
<span class="fs11">New visitors</span>
</div>
</div>
<div class="progress mh5">
<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
<span class="fs11 text-left">Returnig visitors</span>
</div>
</div>
<div class="progress mh5">
<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
<span class="fs11 text-left">Orders</span>
</div>
</div>
<h6 class="title-divider text-muted mt30 mb10">New visitors</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">350</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-warning mn">
<i class="fa fa-caret-down"></i> 15.7% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt25 mb10">Returnig visitors</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">660</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-success-dark mn">
<i class="fa fa-caret-up"></i> 20.2% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt25 mb10">Orders</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">153</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-success mn">
<i class="fa fa-caret-up"></i> 5.3% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt40 mb20"> Site Statistics
<span class="pull-right text-primary fw600">Today</span>
</h6>
</div>
</div>
</aside>
 
</div>
 
 
 
<script src="assets/js/jquery/jquery-1.11.1.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
 
<script src="assets/js/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="assets/js/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="assets/js/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script src="assets/js/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
 
<script src="assets/js/plugins/highcharts/highcharts.js"></script>
 
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/demo/widgets_sidebar.js"></script>
<script src="assets/js/pages/tables-data.js"></script>
 
</body>
</html>
<?php
}else{
	echo '<script>window.location="vendor_login.php";</script>';
}

?>

<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "dashboard";
$_SESSION["sub_menu"]  = "transfer_to_vendor";

include("include/header.php");
?>
<script type="text/javascript">
	function validation(){
	var name=$("#name1").val();
	var pg_id=$("#pg_id").val();
	if(name.trim()==""){
		alert("Please enter Account name");
		$("#name1").focus();
		return false;
	}
	if(pg_id.trim()==""){
		alert("Please enter Account Id");
		$("#pg_id").focus();
		return false;
	}
	
	}

	
	function delete_account(id){
		if(confirm("Do You Want To Delete This Account?")){
		$.post("delete_account.php",{id:id,set:'delete_account'},function(r){
		if(r==1){
			alert("Delete Successfully");
			window.location="add_account.php";
		}
		if(r==0){
			alert("Something Went Wrong....");
		}
		});
		}
	}
		function edit_account(id){
		$.post(
			"edit_account.php",
			{id:id},
			function(r){
				$("#for_edit_ajax").html(r);
			}
			);
	}

	function money_not_added(){
		alert("Money Can not transfer due to shipment !");
		return false;
	}
	
	function add_money(ass_id,ass_apa_id,money_transfer,ass_vr_id){
		if(money_transfer.trim()==1){
			alert("Money Allready Added to vendor account");
			return false;
		}
		if(confirm('Do you want to add money to vendor account?')){
		$.post(
		"ajax_money_to_vendor.php",
		{ass_id:ass_id,ass_apa_id:ass_apa_id,ass_vr_id:ass_vr_id},
		function(r){
			//alert(r);
			if(r==1){
				alert("Money added to vendor account");
				window.location="transfer_to_vendor.php";
			}
			if(r==0){
				alert("Something went wrong !");
				window.location="transfer_to_vendor.php";
			}
		}
		);
		}
	}
	
	function change_status(id,product_id,quantity){
		if(confirm('Do you want to change this order status?')){
		$.post(
		'ajax_stock_check.php',
		{product_id:product_id,quantity:quantity},
		function(r){
			if(r==1){
				
			$.post(
			"shipment_approve.php",
			{ass_id:id},
			function(r){
				location.reload();
			}
			);	
			
			}else{
			alert('Out of stock');
			}
		}
		);
		}
	}
	
	function delete_order(ass_id){
		if(confirm('Do you want to delete this order?')){
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
	}

</script>
<section id="content_wrapper">
 
<div id="topbar-dropmenu-wrapper">
<div class="topbar-menu row">
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-danger">
<span class="fa fa-music"></span>
<span class="service-title">Audio</span>
</a>
</div>
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-success">
<span class="fa fa-picture-o"></span>
<span class="service-title">Images</span>
</a>
</div>
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-primary">
<span class="fa fa-video-camera"></span>
<span class="service-title">Videos</span>
</a>
</div>
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-alert">
<span class="fa fa-envelope"></span>
<span class="service-title">Messages</span>
</a>
</div>
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-system">
<span class="fa fa-cog"></span>
<span class="service-title">Settings</span>
</a>
</div>
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-dark">
<span class="fa fa-user"></span>
<span class="service-title">Users</span>
</a>
</div>
</div>
</div>
 
 
<header id="topbar" class="alt">
<div class="topbar-left">
<ol class="breadcrumb">
<li class="breadcrumb-icon">
<a href="dashboard1.html">
<span class="fa fa-home"></span>
</a>
</li>
<li class="breadcrumb-active">
<a href="dashboard1.html">Dashboard</a>
</li>
<li class="breadcrumb-link">
<a href="index.html">Home</a>
</li>
<li class="breadcrumb-current-item">Dashboard</li>
</ol>
</div>
<div class="topbar-right">
<div class="ib topbar-dropdown">
<label for="topbar-multiple" class="control-label">Reporting Period</label>
<select id="topbar-multiple" class="hidden">
<optgroup label="Filter By:">
<option value="1-1">Last 30 Days</option>
<option value="1-2" selected="selected">Last 60 Days</option>
<option value="1-3">Last Year</option>
</optgroup>
</select>
</div>
<div class="ml15 ib va-m" id="sidebar_right_toggle">
<div class="navbar-btn btn-group btn-group-number mv0">
<button class="btn btn-sm btn-default btn-bordered prn pln">
<i class="fa fa-bar-chart fs22 text-default"></i>
</button>
</div>
</div>
</div>
</header>
 
<div id="full_ajax"> 
<section id="content" class="table-layout animated fadeIn">
 
<div class="chute chute-center">
<div class="row">
<!--  -->
<div class="col-md-12">
<div class="panel panel-visible" id="spy6">
<div class="panel-heading">
<div class="panel-title hidden-xs">
Transfer Money
<?php
//$result=getDetails(doSelect("ass_id,ass_apa_id,cancel_status,ass_ac_id,ass_vr_id,date,shipment_status,delivery_status, payment_transfer,quantity","ambit_shipment_status",array()));
$result=getDetails(doSelect("ass_id,ass_apa_id,cancel_status,ass_ac_id,ass_vr_id,date,shipment_status,delivery_status, payment_transfer,quantity","ambit_shipment_status",array("auction_flag"=>0)));

?>
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m">Product Name</th>
<th class="va-m">Customer Name</th>
<th class="va-m">Email</th>
<th class="va-m">Address</th>
<th class="va-m">Date</th>
<th class="va-m">Quantity</th>
<th class="va-m">Shipment</th>
<th class="va-m">Action</th>
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
<!--<td><?php if($v["shipment_status"]==1){ echo 'Yes';}else{ echo 'No';}  ?></td>-->
<td><?php if($v["delivery_status"]==1){ echo 'Yes';}else{ echo 'No';}  ?></td>

<td>
<?php
if($v["cancel_status"]==0){
?>
<a href="javascript:void(0);"<?php if($v["shipment_status"]==1){?> onclick="add_money('<?php echo $v["ass_id"]; ?>','<?php echo $v["ass_apa_id"];  ?>','<?php echo $v["payment_transfer"];  ?>','<?php echo $v["ass_vr_id"];  ?>');" <?php }else{ ?> onclick="money_not_added();" <?php } ?> title="Added Money To Vendor Account"><img src="icon/<?php if($v["payment_transfer"]==1){ echo 'plus_red.png'; }else{ echo 'plus.png'; }    ?>" width="20" /></a>
<?php
$shipment_by=trim(seeMoreDetails("shipment_by","ambit_shipment_by",array("asb_id"=>1)));
if($shipment_by=="Admin" && $v["shipment_status"]==0){
?>
<?php if($v["shipment_status"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20" title="Not shipment yet">';  ?> <a href="javascript:void(0);" onclick="change_status('<?php echo $v["ass_id"];  ?>','<?php echo $v["ass_apa_id"];  ?>','<?php echo $v["quantity"];  ?>');" title="Change Shipment Status"><img src="icon/edit.png" width="13" /></a>
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
</div>
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
//require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>

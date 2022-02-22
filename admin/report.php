<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "dashboard";
$_SESSION["sub_menu"]  = "report";

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
<a href="index.php">Dashboard</a>
</li>
<li class="breadcrumb-link">
<a href="index.html">Home</a>
</li>
<li class="breadcrumb-current-item">Report Item</li>
</ol>
</div>

</header>
<br/>
<br/>
<br/>

<script type="text/javascript">

function show_details(id){
	window.location="return_product_details.php?id="+id;
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
Top Selling Vendor
<?php
$sub_query='';
	$date=date('Y-m-d');
	$from_date=subDaysWithDate($date,30);
	$from_date=$from_date.' '.'00:00:00';
	$to_date=$date.' '.'00:00:00';
	$sub_query=" AND date BETWEEN '".$from_date."' AND '".$to_date."'";

$select="ass_id,ass_apa_id,cancel_status,ass_ac_id,ass_vr_id,date,shipment_status,SUM(quantity) as quantity";
$from="ambit_shipment_status";
$con=array("shipment_status"=>1);
$query=doSelect2($select,$from,$con);
$query=$query.$sub_query.' GROUP BY ass_vr_id ORDER BY quantity DESC';
//echo $query;
$result=getDetails(doSelect3($query));

?>
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-bordered mbn">
<thead>
<tr>
<th class="va-m">Vendor Name</th>
<th class="va-m">Quantity</th>
<th class="va-m">Action</th>
</tr>
</thead>
<tbody>
<?php
foreach($result as $k=>$v){

?>
<tr>
<td><a href="vendor_details.php?id=<?php echo $v["ass_vr_id"]; ?>" style="color:red;" title="Product Details"><?php echo getVendorName($v["ass_vr_id"]);  ?></a></td>
<td><?php echo $v["quantity"];  ?></td>
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
if(empty($result)){
?>
<tr>
<td colspan="4">No Data Found !</td>
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



<div class="row">
<!--  -->
<div class="col-md-12">
<div class="panel panel-visible" id="spy6">
<div class="panel-heading">
<div class="panel-title hidden-xs">
Selling Good Product
<?php
$sub_query='';
	$date=date('Y-m-d');
	$from_date=subDaysWithDate($date,30);
	$from_date=$from_date.' '.'00:00:00';
	$to_date=$date.' '.'00:00:00';
	$sub_query=" AND date BETWEEN '".$from_date."' AND '".$to_date."'";

$select="ass_id,ass_apa_id,cancel_status,ass_ac_id,ass_vr_id,date,shipment_status,SUM(quantity) as quantity";
$from="ambit_shipment_status";
$con=array("shipment_status"=>1);
$query=doSelect2($select,$from,$con);
$query=$query.$sub_query.' GROUP BY ass_apa_id ORDER BY quantity DESC';
//echo $query;
$result=getDetails(doSelect3($query));

?>
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-bordered mbn">
<thead>
<tr>
<th class="va-m">Product Name</th>
<th class="va-m">Vendor Name</th>
<th class="va-m">Quantity</th>
<th class="va-m">Action</th>
</tr>
</thead>
<tbody>
<?php
foreach($result as $k=>$v){

?>
<tr>
<td><a href="product_details.php?id=<?php echo $v["ass_apa_id"]; ?>" title="Product Details"><?php echo getProductName($v["ass_apa_id"]);  ?></a></td>
<td><a href="vendor_details.php?id=<?php echo $v["ass_vr_id"]; ?>" style="color:red;" title="Product Details"><?php echo getVendorName($v["ass_vr_id"]);  ?></a></td>
<td><?php echo $v["quantity"];  ?></td>
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
if(empty($result)){
?>
<tr>
<td colspan="4">No Data Found !</td>
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
 
</div>
 
 
 

<?php
require_once("include/footer_date.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>

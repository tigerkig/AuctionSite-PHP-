<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "product";
$_SESSION["sub_menu"]  = "product_stock_report";

include("include/header.php");
?>

<link href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<link href='https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>


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
<header id="topbar" class="alt">
<div class="topbar-left">

 
<div class="chute chute-center">
<div class="mw1000 center-block">
 
<div class="allcp-form">
<div class="panel">
<div class="panel-heading">
<div class="panel-title">Date Filter ( YYYY-MM-DD )
</div>
</div>
<div class="panel-body">

<?php
if(isset($_POST["submit"])){
	$ass_vr_id=trim($_POST["ass_vr_id"]);
	$status=trim($_POST["status"]);
}else{
	$ass_vr_id=0;
	$status='5';
}
?>

<form method="post" action="product_stock_report.php" id="" enctype="multipart/form-data">

<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select  id="vendor_id" name="ass_vr_id" >
<option value="0" selected >Select Vendor</option>
<?php
$vendor=getDetails(doSelect("vr_id,fname,email","vendor_registration",array()));
foreach($vendor as $k=>$v){
?>
<option value="<?php echo $v["vr_id"]; ?>" <?php if($ass_vr_id==$v["vr_id"]) echo 'selected'; ?>  ><?php echo trim($v["fname"]); ?></option>
<?php
}
?>
</select>
<i class="arrow double"></i>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<label class="field select">
<select  id="status1" name="status" >
<option value="5" selected >Select Status</option>
<option value="1" <?php if($status==1) echo 'selected'; ?> >Active</option>
<option value="0" <?php if($status==0) echo 'selected'; ?> >InActive</option>


</select>
<i class="arrow double"></i>
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Search" >
</div>
</div>
</form>
</div>
</div>
</div>
</div>

</header> 
<script type="text/javascript">

function show_details(id){
	window.location="return_product_details.php?id="+id;
}

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<section id="content" class="table-layout animated fadeIn">
 
<div class="chute chute-center">

<div class="row">
<!--  -->
<div class="col-md-12">
<div class="panel panel-visible" id="spy6">
<div class="panel-heading">
<div class="panel-title hidden-xs">
Product Stock Report
<?php
$sub_query='';
if(isset($_POST["submit"])){
	if(trim($_POST["ass_vr_id"])!='0'){
	$sub_query.=" AND apa_vr_id=".trim($_POST["ass_vr_id"]);
	}
	if(trim($_POST["status"])!=''){
	$sub_query.=" AND status=".trim($_POST["status"]);
	}
}
$select="apa_id,name,apa_vr_id,stock,keep_in,status, listing_duration";
$from="ambit_product_add";
$con=array();
$query=doSelect2($select,$from,$con);
$query=$query.$sub_query;
$result=getDetails(doSelect3($query));

?>
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="example" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m">Product Name</th>
<th class="va-m">Vendor Name</th>
<th class="va-m">Stock</th>
<th class="va-m">Type</th>
<th class="va-m">Status</th>
</tr>
</thead>
<tbody>
<?php
foreach($result as $k=>$v){

?>
<tr>
<td><a href="product_details.php?id=<?php echo $v["apa_id"]; ?>" title="Product Details"><?php echo $v["name"];  ?></a></td>
<td><a href="vendor_details.php?id=<?php echo $v["apa_vr_id"]; ?>" style="color:red;" title="Product Details"><?php echo getVendorName($v["apa_vr_id"]);  ?></a></td>
<td><?php echo $v["stock"];  ?></td>
<td>
<?php 
if($v["keep_in"]==0)
	echo 'Simple'; 
else 
	echo 'Featured';
?>
</td>

<td>
<?php 
$shipmentDetail_1 	= getDetails(doSelect("ass_apa_id,ass_vr_id,shipment_status, payment_status","ambit_shipment_status",array("ass_apa_id" => $v["apa_id"]), ' ORDER BY date DESC'));

$sold_status = $shipmentDetail_1[0]['payment_status'];

if($v['listing_duration'] != '0000-00-00'){
		
	$curDatetime = new DateTime();
	$duration	 = new DateTime($v["listing_duration"]);
	$time_diff = date_diff($curDatetime,$duration);					
	$diff_days =  intval($time_diff->format('%R%a'));

} else {
	$diff_days = 0;
}
	

if($v["status"]==0 || $v["stock"]==0 || $diff_days < 0)
	echo 'Inactive'; 
else 
	echo 'Active';
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
 
</div>
 

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


<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>


<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
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
<li class="breadcrumb-current-item">Product Listing</li>
</ol>
</div>

</header>
 
<script type="text/javascript">
	function changeStatus(id){
		$.post("admin_approved_product.php",{apa_id:id},function(r){
			if(r==1){	
		window.location="product_listing.php";	
	}else{
		alert("Something went wrong !");
		}
	});
	}
	function delete_product(id){
	 	if(confirm("Are you sure , to delete product?")){
			$.post("delete_product.php",{apa_id:id},function(r){
				if(r==1){
					window.location="product_listing.php";	
				}else if(r==0){
					alert("Something went wrong !");
				}else{
					alert(r);
				}
			});
		}
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
Product Listing 
<?php
if(isset($_GET["id"]) && trim($_GET["id"]) != ""){
	$condition=array("apa_vr_id"=>trim($_GET["id"]));
}else{
	$condition=array();
}
$result=getDetails(doSelect("apa_id,apa_vr_id,name,category,brand,status","ambit_product_add",$condition,' ORDER BY apa_id DESC'));

?>
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="example" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m">Product Name</th>
<th class="va-m">Posted By</th>
<th class="va-m">Category</th>
<th class="va-m">Brand</th>
<th class="va-m">Approve</th>
</tr>
</thead>
<tbody>
<?php
foreach($result as $k=>$v){

?>
<tr>
<td><a href="product_details.php?id=<?php echo $v["apa_id"]; ?>" title="Product Details"><?php echo ucwords($v["name"]);  ?></a></td>
<td><a href="vendor_details.php?id=<?php echo $v["apa_vr_id"]; ?>" title="Vendor Details">
<?php echo ucfirst(seeMoreDetails("fname","vendor_registration",array("vr_id"=>$v["apa_vr_id"]))).' '.ucfirst(seeMoreDetails("lname","vendor_registration",array("vr_id"=>$v["apa_vr_id"])));  ?>
</a></td>
<td><?php echo seeMoreDetails("pc_name","product_category",array("pc_id"=>$v["category"]));  ?></td>
<td><?php echo seeMoreDetails("ab_name","ambit_brand",array("ab_id"=>$v["brand"]));  ?></td>

<td><?php if($v["status"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?> <a href="javascript:void(0);" onclick="changeStatus('<?php echo $v["apa_id"];  ?>');" title="Change Status"><img src="icon/edit.png" width="13" /></a> <a href="javascript:void(0);" onclick="delete_product('<?php echo $v["apa_id"];  ?>');" title="Delete"><img src="icon/delete.png" width="19" /></a>


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
<!-- 
<script src="assets/js/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="assets/js/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="assets/js/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script src="assets/js/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
--> 

 
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


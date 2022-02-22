<?php

session_start();
require_once("function.php");
if(isset($_SESSION["vendor_id"]) && $_SESSION["vendor_email"]){
$vendor_details=getDetails(doSelect("*","vendor_registration",array("vr_id"=>$_SESSION["vendor_id"])));
include("include/header.php");
$define='<font color="red">Not Specified</font>';
?>
<script type="text/javascript">
	function edit_product(id){
		window.location='edit_product.php?id='+id;
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
	function myFunction() {
    var key = $("#search").val();
    $.post("ajax_user_details.php",{key:key},function(r){
    	$("#ajax_field").html(r);
    }

    	);
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
<span class="service-title">ImStates</span>
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
<span class="service-title">MessStates</span>
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
<a href="index.php"><?php echo $lang_148;  ?></a>
</li>
<li class="breadcrumb-link">
<a href="index.php"><?php echo $lang_149;  ?></a>
</li>
<li class="breadcrumb-current-item">Data Tables</li>
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
<button class="btn btn-primary btn-sm btn-bordered hidden-xs"> 3</button>
</div>
</div>
</div>
</header>
 
<?php
if(isset($_GET["id"])){
$select="apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size,price,reserve_price,status,currency,posting_type";
$result=getDetails(doSelect1($select,"ambit_product_add",array("apa_id"=>$_GET["id"],"apa_vr_id"=>$_SESSION["vendor_id"])));
}else{
	$result=array();
}

?>
<section id="content" class="table-layout animated fadeIn">
 
<div class="chute chute-center">
<div class="row">
<!--  -->
<div class="col-md-12">

<!-- <input type="text" id="search" onkeyup="myFunction()" style="width:99%;" placeholder="Search By Category,Product Name,Brand...."  value="" /> -->
<!-- <input type="text" id="search" onkeyup="myFunction()" style="width:33%;" placeholder="Search By Name"  value="" />
<input type="text" id="search" onkeyup="myFunction()" style="width:33%;" placeholder="Search By Email"  value="" /> -->

<div id="ajax_field">
<div class="panel panel-visible" id="spy6">

<?php

if(!empty($result)){
foreach($result as $k=>$v){

?>
<div class="panel-heading">

<div class="panel-title hidden-xs"><?php echo ucwords($v["name"]);  ?>
</div>
</div>

<div class="panel-body pn">
<div class="table-responsive">
<div class="col-sm-12">
<div class="panel">
<div class="panel-body pn">
<div class="bs-component">
<table class="table">
<thead>
<tr class="info">
<th><?php echo $lang_27;  ?></th>
<th><?php echo $lang_184;  ?></th>
<th><?php echo $lang_49;  ?></th>
<th>
<code><?php echo $lang_185;  ?></code>
</th>
</tr>
</thead>
<tbody>
<tr>
<td ><?php echo ucwords($v["name"]);  ?></td>
<td ><?php echo seeMoreDetails("pc_name","product_category",array("pc_id"=>$v["category"]));  ?></td>
<td><?php echo seeMoreDetails("ab_name","ambit_brand",array("ab_id"=>$v["brand"]));  ?></td>
<td><?php if($v["status"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?> <a href="javascript:void(0);" onclick="edit_product('<?php echo $v["apa_id"];  ?>');" title="Edit"><img src="icon/edit.png" width="13" /></a> <a href="javascript:void(0);" onclick="delete_user('<?php echo $v["apa_id"];  ?>');" title="Delete"><img src="icon/delete.png" width="19" /></a>


</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>

<div class="col-sm-12">
<div class="panel">
<div class="panel-body pn">
<div class="bs-component">
<table class="table">
<thead>
<tr class="info">
<th colspan="2">
<?php echo $lang_45;  ?>
</th>
</tr>
</thead>
<tbody>
<?php
if(trim($v["features"])!=""){
?>
<tr>
<td><?php echo $lang_54;  ?></td>
<td align="right"><?php $feature=explode("||",$v["features"]); 
foreach($feature as $k1=>$v1){
	echo $v1.'<br/>';
}
?></td>
</tr>
<?php
}
?>
<?php
if(trim($v["description"])!=""){
?>
<tr>
<td><?php echo $lang_98;  ?></td>
<td align="right"><?php echo $v["description"]; ?></td>
</tr>
<?php
}
?>
<?php
if(trim($v["weight"])!=""){
?>
<tr>
<td><?php echo $lang_53;  ?></td>
<td align="right"><?php $weight=explode(":",$v["weight"]); echo $weight[0].seeMoreDetails("awu_unit","ambit_weight_unit",array("awu_id"=>$weight[1])); ?></td>
</tr>
<?php
}
?>
<?php
if(trim($v["color"])!=""){
?>
<tr>
<td><?php echo $lang_95;  ?></td>
<td align="right"><?php $color=explode("||",$v["color"]);  
foreach ($color as $k2 => $v2) {
	if($k2!=0){
		echo ',';
	}
echo seeMoreDetails("apc_name","ambit_product_color",array("apc_id"=>$v2));
}
?></p></td>
</tr>
<?php
}
?>
<tr>
<?php
if(trim($v["size"])!=""){
?>
<td><?php echo $lang_96;  ?></td>
<td align="right"><?php $size=explode("||",$v["size"]); 
foreach($size as $k3=>$v3){
	$size1=explode(":",$v3);
	echo $size1[0].seeMoreDetails("asu_name","ambit_size_unit",array("asu_id"=>$size1[1]))."<br/>";
}
?></td>
</tr>
<?php
}
?>

<?php
if(trim($v["price"])!=""){
?>
<tr>
<td><?php echo $lang_47;  ?></td>
<td align="right"><?php $price=explode("||",$v["price"]);  
echo 'Total Price : '.currency1($v["currency"],$price[0]).'<br/>Tax : '.currency1($v["currency"],$price[1]).'<br/>'.$lang_39.' : '.currency1($v["currency"],$price[2]).'<br/>'.$lang_168.' : '.currency1($v["currency"],$price[3]);if($v['posting_type'] == 1) echo '<br/>Reserve price : '.currency1($v["currency"],$v["reserve_price"]);
?></td>
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
<div class="btn-group ib mr10 mb5">
<a href="gallery.php?id=<?php echo $v["apa_id"]; ?>">
<button type="button" class="btn btn-default hidden-xs">
<span class="fa fa-tag"></span> <?php echo $lang_186; ?>
</button>
</a>
</div>
<?php

}
}else{
	?>
	<p><?php echo $lang_32; ?></p>
	<?php
}
?>
</div>


</div> 
<!-- ajax field end -->

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
 
 
 
<?php
require_once("include/footer.php");

}else{
	echo '<script>window.location="vendor_login.php";</script>';
}
?>

<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "dashboard";
$_SESSION["sub_menu"]  = "dashboard";

include("include/header.php");
?>
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
<li class="breadcrumb-current-item">Dashboard</li>
</ol>
</div>
<!-- <div class="topbar-right">
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
</div> -->
</header>
 
 
<section id="content" class="table-layout animated fadeIn">
 
<div class="chute chute-center">
 
<div class="row">
<div class="col-sm-6 col-xl-3">
<div class="panel panel-tile">
<div class="panel-body">
<div class="row pv10">
<div class="col-xs-5 ph10"><img src="assets/img/pages/clipart0.png" class="img-responsive mauto" alt=""/></div>
<div class="col-xs-7 pl5">
<a href="vendor_listing.php" style="text-decoration: none;"><h6 class="text-muted">TOTAL VENDOR</h6></a>
<?php
$total_vendor=getDetails(doSelect("COUNT(*) as total_vendor","vendor_registration",array("status"=>1)));
?>
<h2 class="fs50 mt5 mbn"><?php echo $total_vendor[0]["total_vendor"];  ?></h2>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-xl-3">
<div class="panel panel-tile">
<div class="panel-body">
<div class="row pv10">
<div class="col-xs-5 ph10"><img src="assets/img/pages/clipart1.png" class="img-responsive mauto" alt=""/></div>
<div class="col-xs-7 pl5">
<a href="customer_listing.php" style="text-decoration: none;"><h6 class="text-muted">TOTAL CUSTOMER</h6></a>
<?php
$total_user=getDetails(doSelect("COUNT(*) as total_user","ambit_customer",array('status'=>1)));
?>
<h2 class="fs50 mt5 mbn"><?php echo $total_user[0]["total_user"];  ?></h2>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-xl-3">
<div class="panel panel-tile">
<div class="panel-body">
<div class="row pv10">
<div class="col-xs-5 ph10"><img src="assets/img/pages/clipart2.png" class="img-responsive mauto" alt=""/></div>
<div class="col-xs-7 pl5">
<a href="product_listing.php" style="text-decoration: none;"><h6 class="text-muted">TOTAL PRODUCT</h6></a>
<?php
$total_pro=getDetails(doSelect("COUNT(*) as total_pro","ambit_product_add",array('status'=>1)));
?>
<h2 class="fs50 mt5 mbn"><?php echo $total_pro[0]["total_pro"];  ?></h2>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-xl-3">
<div class="panel panel-tile">
<div class="panel-body">
<div class="row pv10">
<div class="col-xs-5 ph10"><img src="assets/img/pages/clipart3.png" width="127" class="img-responsive mauto" alt=""/></div>
<div class="col-xs-7 pl5">
<a href="gallery.php" style="text-decoration: none;"><h6 class="text-muted">PENDING PHOTOS</h6></a>
<?php
$image=getDetails(doSelect("COUNT(*) as image","ambit_product_image",array("status"=>0)));

?>
<h2 class="fs50 mt5 mbn"><?php echo $image[0]["image"]; ?></h2>
</div>
</div>
</div>
</div>
</div>
</div>
 

</div>

 
<?php
require_once("include/footer.php");

}else{
	//echo '<script>window.location="utility-login.php";</script>';
	echo '<script>window.location="'.$admin_url.'utility-login.php";</script>';
}
?>

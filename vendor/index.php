<?php
session_start();
require_once("function.php");

	// Email check
	if(isset($_GET["email_check"]) && isset($_GET["vr_id"]) && $_GET["email_check"] == "checked"){

			$ret=doUpdate("vendor_registration",array('status'=>1),array('vr_id'=>$_GET["vr_id"]));
			if($ret == true)
				echo "<script>alert('Login information was verified successfully.')</script>";
		}
		
if(isset($_SESSION["vendor_id"]) && $_SESSION["vendor_email"]){
$vendor_details=getDetails(doSelect("*","vendor_registration",array("vr_id"=>$_SESSION["vendor_id"])));
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
<a href="index.php">Home</a>
</li>


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
<a href="vendor_details.php?id=<?php echo $_SESSION["vendor_id"]; ?>" style="text-decoration: none;"><h6 class="text-muted"><?php echo $lang_140; ?></h6></a>
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
					<a href="product_listing.php" style="text-decoration: none;"><h6 class="text-muted"><?php echo $lang_139; ?></h6></a>
					<?php
					$total_pro=getDetails(doSelect("COUNT(*) as total_pro","ambit_product_add",array("apa_vr_id"=>$_SESSION["vendor_id"])));
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
				<div class="col-xs-5 ph10"><img src="assets/img/pages/clipart2.png" class="img-responsive mauto" alt=""/></div>
				<!--<div class="col-xs-7 pl5">
					<a href="properties_listing.php" style="text-decoration: none;"><h6 class="text-muted"><?php echo $lang_141; ?></h6></a>
					<?php
						$total_pro=getDetails(doSelect("COUNT(*) as total_pro","ambit_product_add",array("apa_vr_id"=>$_SESSION["vendor_id"],'status'=>0)));
					?>
					<h2 class="fs50 mt5 mbn"><?php echo $total_pro[0]["total_pro"];  ?></h2>
				</div>-->
				<div class="col-xs-7 pl5">
					<a href="ship_product_listing.php" style="text-decoration: none;"><h6 class="text-muted"><?php echo "SOLD PRODUCT"; ?></h6></a>
					<?php
						
						$total_pro1=getDetails(doSelect("COUNT(*) as total_pro","ambit_shipment_status",array("ass_vr_id"=>$_SESSION["vendor_id"],'shipment_status'=>1, 'payment_status'=>1)));
						
						$total_sold = $total_pro1[0]["total_pro"];
					?>
					<h2 class="fs50 mt5 mbn"><?php echo $total_sold;  ?></h2>
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
<a href="javascript:void(0);" style="text-decoration: none;"><h6 class="text-muted"><?php echo $lang_142; ?></h6></a>
<?php
$pro_id=getDetails(doSelect("apa_id","ambit_product_add",array("apa_vr_id"=>$_SESSION["vendor_id"])));
$photo=0;
foreach($pro_id as $k=>$v){
$pending=getDetails(doSelect("COUNT(*) as pending","ambit_product_image",array("api_apa_id"=>$v["apa_id"],'status'=>0)));
$photo=$photo + $pending[0]["pending"];
}

?>
<h2 class="fs50 mt5 mbn"><?php echo $photo; ?></h2>
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
	//echo '<script>window.location="vendor_login.php";</script>';
	echo '<script>window.location="https://www.ouslet.com/vendor/vendor_login.php";</script>';
}
?>

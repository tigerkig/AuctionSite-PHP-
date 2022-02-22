<?php
session_start();
require_once("function.php");
if(isset($_SESSION["vendor_id"]) && $_SESSION["vendor_email"]){
$vendor_details=getDetails(doSelect("*","vendor_registration",array("vr_id"=>$_SESSION["vendor_id"])));

$_SESSION["main_menu"] = "dashboard";
$_SESSION["sub_menu"]  = "my_balance";

include("include/header.php");
?>
<section id="content_wrapper">
 

 
 
<header id="topbar" class="alt">
<div class="topbar-left">
<ol class="breadcrumb">
<li class="breadcrumb-icon">
<a href="index.php">
<span class="fa fa-usd"></span>
</a>
</li>
<li class="breadcrumb-active">
<a href="my_balance.php"><?php echo $lang_181;  ?></a>
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
<a href="vendor_details.php?id=<?php echo $_SESSION["vendor_id"]; ?>" style="text-decoration: none;"><h6 class="text-muted"><?php echo $lang_140;  ?></h6></a>
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
<a href="ship_product_listing.php" style="text-decoration: none;"><h6 class="text-muted"><?php echo $lang_182;  ?></h6></a>
<?php
//$total_pro=getDetails(doSelect("SUM(quantity) as total_pro","ambit_shipment_status",array("ass_vr_id"=>$_SESSION["vendor_id"])));
$total_pro=getDetails(doSelect("coalesce(sum(quantity), 0) as total_pro","ambit_shipment_status",array("ass_vr_id"=>$_SESSION["vendor_id"])));
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
<a href="ship_product_listing.php" style="text-decoration: none;"><h6 class="text-muted"><?php echo $lang_183;  ?></h6></a>
<?php
$total_pro=getDetails(doSelect("COUNT(*) as total_pro","ambit_shipment_status",array("ass_vr_id"=>$_SESSION["vendor_id"],"shipment_status"=>0)));
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
<div class="col-xs-5 ph10"><img src="assets/img/pages/dolar.png" class="img-responsive mauto" alt=""/></div>
<div class="col-xs-7 pl5">
<a href="withdraw_request_balance.php" style="text-decoration: none;"><h6 class="text-muted"><?php echo $lang_181;  ?></h6></a>
<?php
$balance=getDetails(doSelect("balance,currency","ambit_vendor_balance",array("avb_vr_id"=>$_SESSION["vendor_id"])));
?>
<h2 class="fs20 mt5 mbn"><?php echo currency1($balance[0]["currency"],$balance[0]["balance"]);  ?></h2>
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
	echo '<script>window.location="vendor_login.php";</script>';
}
?>

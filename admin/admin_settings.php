<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "site_setting";
$_SESSION["sub_menu"]  = "admin_settings";

include("include/header.php");
?>
<script type="text/javascript">

function edit_admin_settings_logo(){
	 $.post("edit_admin_settings_logo.php",{},function(r){
	 $("#ajax").html(r);
	 });
}

function shipment_by(asb_id){
	$.post("ajax_edit_shipment_by.php",{},function(r){
	 $("#ajax").html(r);
	 });
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
 
<div id="ajax">
<section id="content" class="table-layout animated fadeIn">
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Admin Site Settings
</span>
</div>

<div class="panel-body pn" id="a17">
<font color="blue">Logo &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_admin_settings_logo();"><img src="icon/edit.png" width="12" /></a>
<p><br/>
<img src="assets/img/<?php echo seeMoreDetails("login_page_logo","admin",array());  ?>" width="160" />
</p>
</div>

<div class="panel-body pn" id="a17">
<font color="blue">Shipment By &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="shipment_by('1');"><img src="icon/edit.png" width="12" /></a>
<p><br/><font style="color:red;" size="4">
<?php
echo seeMoreDetails("shipment_by","ambit_shipment_by",array("asb_id"=>1));
?></font>
</p>
</div>

<div class="panel-footer"></div>
</div>
</div>
</section>
</div> 
<!-- ajax div -->
<?php
if(isset($_POST["update"])){
	unset($_POST["update"]);
	if(isset($_FILES["login_page_logo"]["name"]) &&  $_FILES["login_page_logo"]["name"] != "" && $_FILES["login_page_logo"]["error"] == 0 ){
		$image=$_FILES["login_page_logo"]["name"];
		$temp_image=$_FILES["login_page_logo"]["tmp_name"];
		move_uploaded_file($temp_image,"assets/img/".$image);
		doUpdate("admin",array("login_page_logo"=>$image),array());
	}
	echo '<script>window.location="admin_settings.php";</script>';
}

if(isset($_POST["update1"])){
	unset($_POST["update1"]);
	doUpdate("ambit_shipment_by",array("shipment_by"=>$_POST["shipment_by"]),array("asb_id"=>$_POST["asb_id"]));
	echo '<script>window.location="admin_settings.php";</script>';
}
?>

<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>

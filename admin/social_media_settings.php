<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">
function edit_sm_settings(){
	 $.post("edit_social_media.php",{},function(r){
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
Social Media Settings &nbsp <a href="javascript:void(0);" title="Edit & Update" onclick="edit_sm_settings();"><img src="icon/edit.png" width="12" /></a>
</span>
</div>
<div class="panel-body pn" id="a14">
<font color="blue">Facebook &nbsp</font><p>
<?php echo seeMoreDetails("facebook","ambit_social_media",array());  ?>
</p>
</div>

<div class="panel-body pn" id="a25">
<font color="blue">Twitter &nbsp</font><p>
<?php echo seeMoreDetails("twitter","ambit_social_media",array());  ?>
</p>
</div>


<div class="panel-body pn" id="a18">
<font color="blue">Pinterest &nbsp</font>
<p>
<?php echo seeMoreDetails("pinterest","ambit_social_media",array());  ?>
</p>
</div>

<div class="panel-body pn" id="a18">
<font color="blue">Google Plus &nbsp</font>
<p>
<?php echo seeMoreDetails("google_plus","ambit_social_media",array());  ?>
</p>
</div>

<div class="panel-body pn" id="a18">
<font color="blue">Youtube &nbsp</font>
<p>
<?php echo seeMoreDetails("youtube","ambit_social_media",array());  ?>
</p>
</div>

<div class="panel-body pn" id="a18">
<font color="blue">Instagram &nbsp</font>
<p>
<?php echo seeMoreDetails("instagram","ambit_social_media",array());  ?>
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
	//print_r($_POST);
	doUpdate1("ambit_social_media",$_POST,array());
	echo '<script>window.location="social_media_settings.php";</script>';
}


?>

<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>

<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "footer_setting";
$_SESSION["sub_menu"]  = "contact_us";

include("include/header.php");
?>
<script type="text/javascript">
function error_border(id){
	$("#"+id).css("border", "2px solid red");
}
function update_validation(id){
	//alert("sidd");
	var st_value=$("#field").val();
	if(st_value.trim()==""){
		alert("field is empty");
		//$("#field").focus();
		error_border('field');
		return false;
	}
	$.post(
		"update_contact_settings.php",
		{st_id:id,st_value:st_value},
		function(r){
			//alert(r);
			window.location="contact_us.php";
		}
		);
}
function edit_site_settings(id){
	 $.post("edit_contact_settings.php",{id:id},function(r){
	 $("#a"+id).html(r);
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
Contact Us &nbsp
</span>
</div>
<div class="panel-body pn" id="a26">
<font color="blue">COMPANY NAME : </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('26');"><img src="icon/edit.png" width="12" /></a><p>
<?php  echo get_site_settings(26); ?>
</p>
</div>

<div class="panel-body pn" id="a23">
<font color="blue">COMPANY EMAIL : </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('23');"><img src="icon/edit.png" width="12" /></a><p>
<?php  echo get_site_settings(23); ?>
</p>
</div>

<div class="panel-body pn" id="a22">
<font color="blue">COMPANY PHONE : </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('22');"><img src="icon/edit.png" width="12" /></a><p>
<?php  echo get_site_settings(22); ?>
</p>
</div>

<div class="panel-body pn" id="a28">
<font color="blue">ADDRESS : </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('28');"><img src="icon/edit.png" width="12" /></a><p>
<?php  echo get_site_settings(28); ?>
</p>
</div>


<div class="panel-body pn" id="a27">
<font color="blue">DESCRIPTION : </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('27');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(27); ?>
</p>
</div>


<div class="panel-footer"></div>
</div>
</div>
</section>
</div> 
<!-- ajax div -->


<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>

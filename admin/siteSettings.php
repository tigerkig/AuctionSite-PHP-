<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "site_setting";
$_SESSION["sub_menu"]  = "siteSettings";

include("include/header.php");
?>
<script type="text/javascript">
function error_border(id){
	$("#"+id).css("border", "2px solid red");
}
	function update_validation(id){
	var st_value=$("#field").val();
	if(st_value.trim()==""){
		alert("field is empty");
		//$("#field").focus();
		error_border('field');
		return false;
	}
	$.post(
		"update_site_settings.php",
		{st_id:id,st_value:st_value},
		function(r){
			//alert(r);
			$("#ajax").html(r);
		}
		);
	}

	function update_validation1(id){
	var st_value=$("#field").val();
	var st_value1=$("#field1").val();
	if(st_value.trim()==""){
		alert("field is empty");
		//$("#field").focus();
		error_border('field');
		return false;
	}
	if(st_value1.trim()==""){
		alert("field is empty");
		//$("#field").focus();
		error_border('field1');
		return false;
	}
	var st_value=st_value+'||'+st_value1;
	$.post(
		"update_site_settings.php",
		{st_id:id,st_value:st_value},
		function(r){
			//alert(r);
			$("#ajax").html(r);
		}
		);
	}

function edit_site_settings(id){
	 $.post("edit_site_settings.php",{id:id},function(r){
	 $("#a"+id).html(r);
	 });
}
function edit_commision_settings(id){
	 $.post("edit_commision_settings.php",{id:id},function(r){
	 $("#a"+id).html(r);
	 });
}
function edit_site_settings_country(id){
	 $.post("edit_site_settings_country.php",{id:id},function(r){
	 $("#a"+id).html(r);
	 });
}
function edit_site_settings_logo(id){
	 $.post("edit_site_settings_logo.php",{id:id},function(r){
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
Site Settings
</span>
</div>
<div class="panel-body pn" id="a14">
<font color="blue">Title &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('14');"><img src="icon/edit.png" width="12" /></a><p>
<?php  echo get_site_settings(14); ?>
</p>
</div>

<div class="panel-body pn" id="a25">
<font color="blue">Site Name &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('25');"><img src="icon/edit.png" width="12" /></a><p>
<?php  echo get_site_settings(25); ?>
</p>
</div>
<div class="panel-body pn" id="a34">
<font color="blue">Footer Text &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('34');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(34); ?>
</p>
</div>


<div class="panel-body pn" id="a18">
<font color="blue">Default Country &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings_country('18');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  $id=get_site_settings(18); echo ucfirst(seeMoreDetails("cn_name","ambit_country",array("cn_id"=>$id))); ?>
</p>
</div>

<div class="panel-body pn" id="a19">
<font color="blue">Currency &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('19');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(19); ?>
</p>
</div>
<div class="panel-body pn" id="a20">
<font color="blue">Currency Sign &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('20');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(20); ?>
</p>
</div>
<div class="panel-body pn" id="a29">
<font color="blue">Withdraw Limit &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('29');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(29); ?>
</p>
</div>
<div class="panel-body pn" id="a30">
<font color="blue">Commision &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_commision_settings('30');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  
$val=get_site_settings(30); 
$val=explode("||",$val);
echo 'Minimum Price :'.currency().$val[0].'<br/>';
echo 'Otherwise Percentage :'.$val[1].'%';
?>
</p>
</div>
<div class="panel-body pn" id="a15">
<font color="blue">Meta Keyword &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('15');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(15); ?>
</p>
</div>

<div class="panel-body pn" id="a16">
<font color="blue">Meta Description &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('16');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(16); ?>
</p>
</div>

<div class="panel-body pn" id="a24">
<font color="blue">Working Hours &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('24');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(24); ?>
</p>
</div>

<div class="panel-body pn" id="a31">
<font color="blue">Facebook Account &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('31');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(31); ?>
</p>
</div>
<div class="panel-body pn" id="a32">
<font color="blue">Twitter Account &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('32');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(32); ?>
</p>
</div>
<div class="panel-body pn" id="a33">
<font color="blue">Youtube Account &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('33');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(33); ?>
</p>
</div>
<div class="panel-body pn" id="a17">
<font color="blue">Logo &nbsp</font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings_logo('17');"><img src="icon/edit.png" width="12" /></a>
<p>
<img src="../sitelogo//<?php  echo get_site_settings(17); ?>" width="130" />
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
	if(isset($_FILES["image"]["name"]) &&  $_FILES["image"]["name"] != "" && $_FILES["image"]["error"] == 0 ){
		$image=$_FILES["image"]["name"];
		doUpdate("site_settings",array("st_value"=>$image),array("st_id"=>$_POST["st_id"]));
		$temp_image=$_FILES["image"]["tmp_name"];
		move_uploaded_file($temp_image,"../sitelogo//".$image);
	}
	echo '<script>window.location="siteSettings.php";</script>';
}


?>

<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>

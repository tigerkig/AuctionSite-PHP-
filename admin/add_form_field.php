<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">
function error_border(id){
	$("#"+id).css("border", "2px solid red");
}
function no_border(id){
	$("#"+id).css("border", "2px solid SlateGrey  ");
}
	function add_furnish_status(){
	var afs_status=$("#afs_status").val();
	no_border("afs_status");
	if(afs_status.trim()==""){
		alert("Please Type Your Furnish Status");
		//$("#add_country").focus();
		error_border('afs_status');
		return false;
	}
	$.post(
		"update_form_field.php",
		{afs_status:afs_status,msg:'add_furnish'},
		function(res){
			var r=res.split("||");
			if(r[1]==1){
			alert("Furnish Status added successfully");
			}
			//$("#ajax").html(r[2]);
			window.location="add_form_field.php";
		}
		);
	}

function update_furnish_status(){
	//alert("sidd");
	var afs_id=$("#update_afs_status").val();
	no_border('update_afs_status');
	if(afs_id==0){
		alert("Please Select Furnish Status");
		error_border('update_afs_status');
		return false;
	}
	
	var afs_status=$("#new_afs_status").val();

	if(afs_status.trim()==""){
	alert("Please Type Furnish Status");
	//$("#new_country").focus();
	error_border('new_afs_status');
	return false;
	}
	$.post(
	"update_form_field.php",
	{afs_id:afs_id,afs_status:afs_status,msg:'update_furnish'},
	function(res){
		var r=res.split("||");
			if(r[1]==1){
	alert("Furnish Status updated successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_form_field.php";
	}
	);
}

function delete_furnish_status()
{
	var afs_id=$("#delete_afs_status").val();
	no_border('delete_afs_status');
	if(afs_id==0){
		alert("Please select Furnish Status");
		error_border('delete_afs_status');
		return false;
	}
	$.post(
	"update_form_field.php",
	{afs_id:afs_id,msg:'delete_furnish_status'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("Furnish Status deleted successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_form_field.php";
	}
	);
}

	function add_possesion_status(){
	var aps_type=$("#aps_type").val();
	no_border("aps_type");
	if(aps_type.trim()==""){
		alert("Please Type Possesion Status");
		//$("#add_country").focus();
		error_border('aps_type');
		return false;
	}
	$.post(
		"update_form_field.php",
		{aps_type:aps_type,msg:'add_possesion'},
		function(res){
			var r=res.split("||");
			if(r[1]==1){
			alert("Possesion Status added successfully");
			}
			//$("#ajax").html(r[2]);
			window.location="add_form_field.php";
		}
		);
	}

	function update_possesion_status(){
	//alert("sidd");
	var aps_id=$("#aps_id").val();
	no_border('aps_id');
	if(aps_id==0){
		alert("Please Select Possesion Status");
		error_border('aps_id');
		return false;
	}
	
	var aps_type=$("#new_aps_type").val();

	if(aps_type.trim()==""){
	alert("Please Type Possesion Status");
	//$("#new_country").focus();
	error_border('new_aps_type');
	return false;
	}
	$.post(
	"update_form_field.php",
	{aps_id:aps_id,aps_type:aps_type,msg:'update_possesion'},
	function(res){
		var r=res.split("||");
			if(r[1]==1){
	alert("Possesion Status updated successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_form_field.php";
	}
	);
}

function delete_possesion_status()
{
	var aps_id=$("#delete_aps_id").val();
	no_border('delete_aps_id');
	if(aps_id==0){
		alert("Please select Possesion Status");
		error_border('delete_aps_id');
		return false;
	}
	$.post(
	"update_form_field.php",
	{aps_id:aps_id,msg:'delete_possesion'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("Posseision Status deleted successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_form_field.php";
	}
	);
}

	function add_property(){
	var apf_name=$("#apf_name").val();
	no_border("apf_name");
	if(apf_name.trim()==""){
		alert("Please Type Property Type");
		//$("#add_country").focus();
		error_border('apf_name');
		return false;
	}
	$.post(
		"update_form_field.php",
		{apf_name:apf_name,msg:'add_property'},
		function(res){
			var r=res.split("||");
			if(r[1]==1){
			alert("Property Type added successfully");
			}
			//$("#ajax").html(r[2]);
			window.location="add_form_field.php";
		}
		);
	}

	function update_property(){
	//alert("sidd");
	var apf_id=$("#apf_id").val();
	no_border('apf_id');
	if(apf_id==0){
		alert("Please Select Property Type");
		error_border('apf_id');
		return false;
	}
	
	var apf_name=$("#new_apf_name").val();

	if(apf_name.trim()==""){
	alert("Please Type Property Type");
	//$("#new_country").focus();
	error_border('new_apf_name');
	return false;
	}
	$.post(
	"update_form_field.php",
	{apf_id:apf_id,apf_name:apf_name,msg:'update_property'},
	function(res){
		var r=res.split("||");
			if(r[1]==1){
	alert("Property Type updated successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_form_field.php";
	}
	);
}

function delete_property()
{
	var apf_id=$("#delete_apf_id").val();
	no_border('delete_apf_id');
	if(apf_id==0){
		alert("Please select Property Type");
		error_border('delete_apf_id');
		return false;
	}
	$.post(
	"update_form_field.php",
	{apf_id:apf_id,msg:'delete_property'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("Property type deleted successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_form_field.php";
	}
	);
}

	function add_property_cat(){
	var apt_name=$("#apt_name").val();
	no_border("apt_name");
	if(apt_name.trim()==""){
		alert("Please Type Property Category");
		//$("#add_country").focus();
		error_border('apt_name');
		return false;
	}
	$.post(
		"update_form_field.php",
		{apt_name:apt_name,msg:'add_property_cat'},
		function(res){
			var r=res.split("||");
			if(r[1]==1){
			alert("Property Category added successfully");
			}
			//$("#ajax").html(r[2]);
			window.location="add_form_field.php";
		}
		);
	}

	function update_property_cat(){
	//alert("sidd");
	var apt_id=$("#apt_id").val();
	no_border('apt_id');
	if(apt_id==0){
		alert("Please Select Property Category");
		error_border('apt_id');
		return false;
	}
	
	var apt_name=$("#new_apt_name").val();

	if(apt_name.trim()==""){
	alert("Please Type Property Category");
	//$("#new_country").focus();
	error_border('new_apt_name');
	return false;
	}
	$.post(
	"update_form_field.php",
	{apt_id:apt_id,apt_name:apt_name,msg:'update_property_cat'},
	function(res){
		var r=res.split("||");
			if(r[1]==1){
	alert("Property Category updated successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_form_field.php";
	}
	);
}

function delete_property_cat()
{
	var apt_id=$("#delete_apt_id").val();
	no_border('delete_apt_id');
	if(apt_id==0){
		alert("Please select Property Category");
		error_border('delete_apt_id');
		return false;
	}
	$.post(
	"update_form_field.php",
	{apt_id:apt_id,msg:'delete_property_cat'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("Property Category deleted successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_form_field.php";
	}
	);
}
function add_pro_sub_cat(){
var asp_apt_id=$("#pc_apt_id").val();
no_border('pc_apt_id');
if(asp_apt_id==0){
alert("Please Select Property Category");
error_border('pc_apt_id');
return false;
}
var asp_name=$("#asp_name").val();
if(asp_name.trim()==""){
alert("Please Type Property Sub Category");
	//$("#add_city").focus();
	error_border('asp_name');
	return false;
	}
 	$.post(
    "update_form_field.php",
	{asp_apt_id:asp_apt_id,asp_name:asp_name,msg:'add_pro_sub_cat'},
	function(res){
 	var r=res.split("||");
		if(r[1]==1){
 	alert("Sub Category Added Successfully");
	}
	//$("#ajax").html(r[2]);
 	window.location="add_form_field.php";
 	}
 	);

 }

 function update_pro_sub_cat(){
	var asp_apt_id=$("#asp_apt_id").val();
 	no_border('asp_apt_id');
 	if(asp_apt_id==0){
 		alert("Please Select Property Category");
 		error_border('asp_apt_id');
 		return false;
 	}
 	var asp_id=$("#asp_id").val();
 	var asp_name=$("#update_asp_name").val();
 	if(asp_name.trim()==""){
		alert("Please Type Property Sub Category");
		//$("#update_city").focus();
 		error_border('update_asp_name');
 		return false;
 	}
 	$.post(
 	"update_form_field.php",
 	{asp_apt_id:asp_apt_id,asp_id:asp_id,asp_name:asp_name,msg:'update_pro_sub_cat'},
 	function(res){
 	var r=res.split("||");
 			if(r[1]==1){
 	alert("Sub Category Updated successfully");
 	}
 	//$("#ajax").html(r[2]);
 	window.location="add_form_field.php";
 	}
 	);
 }

 function delete_pro_sub_cat(){
 	var asp_apt_id=$("#delete_asp_apt_id").val();
 	no_border('delete_asp_apt_id');
 	if(asp_apt_id==0){
		alert("Please Select Property Category");
 		error_border('delete_asp_apt_id');
 		return false;
 	}
 	var asp_id=$("#delete_asp_id").val();
 	$.post(
 	"update_form_field.php",
 	{asp_id:asp_id,msg:'delete_pro_sub_cat'},
 	function(res){
 	var r=res.split("||");
 			if(r[1]==1){
	alert("Sub Category Deleted Successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_form_field.php";
 	}
 	);

 }
function fetch_sub_cat(){
var asp_apt_id=$("#asp_apt_id").val();
	$.ajax({
			url:'fetch_sub_cat.php?asp_apt_id='+asp_apt_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
			$("#asp_id").html(response);
			}
		});
 	}

function fetch_sub_cat1(){
var asp_apt_id=$("#delete_asp_apt_id").val();
	$.ajax({
			url:'fetch_sub_cat.php?asp_apt_id='+asp_apt_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
			$("#delete_asp_id").html(response);
			}
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
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Add Furnish Status
</span>
</div>
 
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<input type="text" name="afs_status" id="afs_status" value="" style="margin: 0px; width: 938px;height:40px;" />
</label>
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="add_furnish_status();" value="Add"  />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>

<hr>
<div class="panel-heading">
<span class="panel-title">
Update Furnish Status
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select  id="update_afs_status" style="margin: 0px; width: 938px; height:40px;">
<option value="0">Select Furnish Status</option>
<?php
$furnish=getDetails(doSelect("afs_id,afs_status","ambit_furnish_status",array()));
foreach($furnish as $k=>$v){
?>
<option value="<?php echo $v["afs_id"]; ?>" >
<?php echo $v["afs_status"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>
<br/>
<div class="section">
<label for="field" class="field prepend-icon">
<input type="text"  id="new_afs_status" value="" style="margin: 0px; width: 938px;height:40px;" />
</label>
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="update_furnish_status();" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>


<hr>
<div class="panel-heading">
<span class="panel-title">
Delete Furnish Status
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select  id="delete_afs_status" style="margin: 0px; width: 938px;height:40px;">
<option value="0" >Select Furnish Status </option>
<?php
$furnish=getDetails(doSelect("afs_id,afs_status","ambit_furnish_status",array()));
foreach($furnish as $k=>$v){
?>
<option value="<?php echo $v["afs_id"]; ?>" >
<?php echo $v["afs_status"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>
<br/>


<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="delete_furnish_status();" value="Delete" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
 <!-- For City -->
 <!-- For City -->
 <!-- For City -->
 <!-- For City -->
 <hr/>
 <div class="panel-heading">
<span class="panel-title">
Add Possesion Status
</span>
</div>
 
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<input type="text" name="aps_type" id="aps_type" value="" style="margin: 0px; width: 938px;height:40px;" />
</label>
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="add_possesion_status();" value="Add"  />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>

<hr>
<div class="panel-heading">
<span class="panel-title">
Update Possesion Status
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select  id="aps_id" style="margin: 0px; width: 938px; height:40px;">
<option value="0">Select Possesion Status</option>
<?php
$possesion=getDetails(doSelect("aps_id,aps_type","ambit_possession_status",array()));
foreach($possesion as $k=>$v){
?>
<option value="<?php echo $v["aps_id"]; ?>" >
<?php echo $v["aps_type"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>
<br/>
<div class="section">
<label for="field" class="field prepend-icon">
<input type="text"  id="new_aps_type" value="" style="margin: 0px; width: 938px;height:40px;" />
</label>
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="update_possesion_status();" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>


<hr>
<div class="panel-heading">
<span class="panel-title">
Delete Possesion Status
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select  id="delete_aps_id" style="margin: 0px; width: 938px;height:40px;">
<option value="0" >Select Possesion Status </option>
<?php
$possesion=getDetails(doSelect("aps_id,aps_type","ambit_possession_status",array()));
foreach($possesion as $k=>$v){
?>
<option value="<?php echo $v["aps_id"]; ?>" >
<?php echo $v["aps_type"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>
<br/>


<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="delete_possesion_status();" value="Delete" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
 <hr/>

 <div class="panel-heading">
<span class="panel-title">
Add Property type
</span>
</div>
 
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<input type="text" name="apf_name" id="apf_name" value="" style="margin: 0px; width: 938px;height:40px;" />
</label>
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="add_property();" value="Add"  />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>

<hr>
<div class="panel-heading">
<span class="panel-title">
Update Property type
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select  id="apf_id" style="margin: 0px; width: 938px; height:40px;">
<option value="0">Select Property Type</option>
<?php
$property=getDetails(doSelect("apf_id,apf_name","ambit_property_for",array()));
foreach($property as $k=>$v){
?>
<option value="<?php echo $v["apf_id"]; ?>" >
<?php echo $v["apf_name"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>
<br/>
<div class="section">
<label for="field" class="field prepend-icon">
<input type="text"  id="new_apf_name" value="" style="margin: 0px; width: 938px;height:40px;" />
</label>
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="update_property();" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>


<hr>
<div class="panel-heading">
<span class="panel-title">
Delete Property type
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select  id="delete_apf_id" style="margin: 0px; width: 938px;height:40px;">
<option value="0" >Select Property Type </option>
<?php
$property=getDetails(doSelect("apf_id,apf_name","ambit_property_for",array()));
foreach($property as $k=>$v){
?>
<option value="<?php echo $v["apf_id"]; ?>" >
<?php echo $v["apf_name"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>
<br/>


<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="delete_property();" value="Delete" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
<hr/>

 <div class="panel-heading">
<span class="panel-title">
Add Property Category
</span>
</div>
 
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<input type="text" name="apt_name" id="apt_name" value="" style="margin: 0px; width: 938px;height:40px;" />
</label>
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="add_property_cat();" value="Add"  />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>

<hr>
<div class="panel-heading">
<span class="panel-title">
Update Property Category
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select  id="apt_id" style="margin: 0px; width: 938px; height:40px;">
<option value="0">Select Property Category</option>
<?php
$property_cat=getDetails(doSelect("apt_id,apt_name","ambit_property_type",array()));
foreach($property_cat as $k=>$v){
?>
<option value="<?php echo $v["apt_id"]; ?>" >
<?php echo $v["apt_name"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>
<br/>
<div class="section">
<label for="field" class="field prepend-icon">
<input type="text"  id="new_apt_name" value="" style="margin: 0px; width: 938px;height:40px;" />
</label>
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="update_property_cat();" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>


<hr>
<div class="panel-heading">
<span class="panel-title">
Delete Property Category
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select  id="delete_apt_id" style="margin: 0px; width: 938px;height:40px;">
<option value="0" >Select Property Category </option>
<?php
$property_cat=getDetails(doSelect("apt_id,apt_name","ambit_property_type",array()));
foreach($property_cat as $k=>$v){
?>
<option value="<?php echo $v["apt_id"]; ?>" >
<?php echo $v["apt_name"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>
<br/>


<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="delete_property_cat();" value="Delete" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
<hr>

<div class="panel-heading">
<span class="panel-title">
Add Property Sub Category
</span>
</div>
 
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select  id="pc_apt_id" style="margin: 0px; width: 938px;height:40px;">
<option value="0" >Select Property category</option>
<?php
$property=getDetails(doSelect("apt_id,apt_name","ambit_property_type",array()));
foreach($property as $k=>$v){
?>
<option value="<?php echo $v["apt_id"]; ?>" >
<?php echo $v["apt_name"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>
<br/>
<div class="section">
<label for="field" class="field prepend-icon">
<input type="text"  id="asp_name" value="" style="margin: 0px; width: 938px;height:40px;" />
</label>
</div>

<br/>
<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="add_pro_sub_cat();" value="Add" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>

<hr>
<div class="panel-heading">
<span class="panel-title">
Update Property Sub Category
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select name="asp_apt_id" id="asp_apt_id" onchange="fetch_sub_cat();" style="margin: 0px; width: 938px;height:40px;">
<option value="0" >Select Property Category </option>
<?php
$property=getDetails(doSelect("apt_id,apt_name","ambit_property_type",array()));
foreach($property as $k=>$v){
?>
<option value="<?php echo $v["apt_id"]; ?>" >
<?php echo $v["apt_name"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>
<br/>
<div class="section">
<label for="field" class="field prepend-icon">
<select name="asp_id" id="asp_id" style="margin: 0px; width: 938px;height:40px;">
<option value="0">Select Property Sub Category</option>
</select>
</label>
</div>
<br/>
<div class="section">
<label for="field" class="field prepend-icon">
<input type="text"  id="update_asp_name" value="" style="margin: 0px; width: 938px;height:40px;" />
</label>
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="update_pro_sub_cat();" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>


<hr>
<div class="panel-heading">
<span class="panel-title">
Delete Property Sub Category
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select name="field" id="delete_asp_apt_id" onchange="fetch_sub_cat1();" style="margin: 0px; width: 938px;height:40px;">
<option value="0" >Select Property category </option>
<?php
$property=getDetails(doSelect("apt_id,apt_name","ambit_property_type",array()));
foreach($property as $k=>$v){
?>
<option value="<?php echo $v["apt_id"]; ?>" >
<?php echo $v["apt_name"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>
<br/>
<div class="section">
<label for="field" class="field prepend-icon">
<select  id="delete_asp_id" style="margin: 0px; width: 938px;height:40px;">
<option value="0">Select Sub Category</option>
</select>
</label>
</div>
<br/>


<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="delete_pro_sub_cat();" value="Delete" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
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

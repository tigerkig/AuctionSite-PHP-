<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "add_features";
$_SESSION["sub_menu"]  = "add_country";

include("include/header.php");
?>
<script type="text/javascript">
function error_border(id){
	$("#"+id).css("border", "2px solid red");
}
function no_border(id){
	$("#"+id).css("border", "2px solid SlateGrey  ");
}
	function add_cntry_validation(){
	var country=$("#add_country").val();
	no_border("add_country");
	if(country.trim()==""){
		alert("Please Type Your country Name");
		//$("#add_country").focus();
		error_border('add_country');
		return false;
	}
	$.post(
		"add_update_country.php",
		{cn_name:country,msg:'add_country'},
		function(res){
			var r=res.split("||");
			if(r[1]==1){
			alert("Country added successfully");
			}
			//$("#ajax").html(r[2]);
			window.location="add_country.php";
		}
		);
	}

function update_cntry_validation(){
	//alert("sidd");
	var cn_id=$("#update_cntry").val();
	no_border('update_cntry');
	if(cn_id==0){
		alert("Please Select Country");
		error_border('update_cntry');
		return false;
	}
	
	var country=$("#new_country").val();

	if(country.trim()==""){
	alert("Please Type Your country Name");
	//$("#new_country").focus();
	error_border('new_country');
	return false;
	}
	$.post(
	"add_update_country.php",
	{cn_id:cn_id,cn_name:country,msg:'update_country'},
	function(res){
		var r=res.split("||");
			if(r[1]==1){
	alert("Country updated successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_country.php";
	}
	);
}

function delete_cntry_validation()
{
	var cn_id=$("#delete_cntry_field").val();
	no_border('delete_cntry_field');
	if(cn_id==0){
		alert("Please select country");
		error_border('delete_cntry_field');
		return false;
	}
	$.post(
	"add_update_country.php",
	{cn_id:cn_id,msg:'delete_country'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("Country deleted successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_country.php";
	}
	);
}

function add_city_validation(){
	var cn_id=$("#cntry_id").val();
	no_border('cntry_id');
	if(cn_id==0){
		alert("Please select country");
		error_border('cntry_id');
		return false;
	}
	var city=$("#add_city").val();
	if(city.trim()==""){
		alert("Please type city name");
		//$("#add_city").focus();
		error_border('add_city');
		return false;
	}
	$.post(
	"add_update_country.php",
	{ct_cn_id:cn_id,ct_name:city,msg:'add_city'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("City added successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_country.php";
	}
	);

}

function update_city_validation(){
	var cn_id=$("#update_field").val();
	no_border('update_field');
	if(cn_id==0){
		alert("Please select country");
		error_border('update_field');
		return false;
	}
	var ct_id=$("#city_update").val();
	var city=$("#update_city").val();
	if(city.trim()==""){
		alert("Please Type City Nmae");
		//$("#update_city").focus();
		error_border('update_city');
		return false;
	}
	$.post(
	"add_update_country.php",
	{ct_cn_id:cn_id,ct_name:city,ct_id:ct_id,msg:'update_city'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("City updated successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_country.php";
	}
	);
}

function delete_city_validation(){
	var cn_id=$("#delete_field").val();
	no_border('delete_field');
	if(cn_id==0){
		alert("Please select country");
		error_border('delete_field');
		return false;
	}
	var ct_id=$("#city_delete").val();
	$.post(
	"add_update_country.php",
	{ct_id:ct_id,msg:'delete_city'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("City deleted successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_country.php";
	}
	);

}
function fetch_city(){
		var cn_id=$("#update_field").val();
		$.ajax({
			url:'fetch_city.php?cn_id='+cn_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#city_update").html(response);
			}
		});
	}

	function fetch_city1(){
		var cn_id=$("#delete_field").val();
		$.ajax({
			url:'fetch_city.php?cn_id='+cn_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#city_delete").html(response);
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
Add Country
</span>
</div>
 
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
	<input class="form-control" type="text" name="country" id="add_country" value=""/>
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <input type="text" name="country" id="add_country" value="" style="margin: 0px; width: 938px;height:40px;" /> -->
<!-- </label> -->
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="add_cntry_validation();" value="Add"  />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>

<hr>
<div class="panel-heading">
<span class="panel-title">
Update Country
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <select  id="update_cntry" style="margin: 0px; width: 938px; height:40px;"> -->
<select  class="form-control" id="update_cntry">
<option value="0">Select Country</option>
<?php
$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["cn_name"];  ?>
</option>
<?php
}
?>
</select>
<!-- </label> -->
</div>
<br/>
<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <input type="text"  id="new_country" value="" style="margin: 0px; width: 938px;height:40px;" /> -->
<input  class="form-control" type="text"  id="new_country" value=""/>
<!-- </label> -->
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="update_cntry_validation();" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>


<hr>
<div class="panel-heading">
<span class="panel-title">
Delete Country
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <select  id="delete_cntry_field" style="margin: 0px; width: 938px;height:40px;"> -->
<select class="form-control" id="delete_cntry_field">
<option value="0" >Select Country </option>
<?php
$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["cn_name"];  ?>
</option>
<?php
}
?>
</select>
<!-- </label> -->
</div>
<br/>


<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="delete_cntry_validation();" value="Delete" />
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
Add City
</span>
</div>
 
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <select  id="cntry_id" style="margin: 0px; width: 938px;height:40px;"> -->
<select class="form-control" id="cntry_id">
<option value="0" >Select Country </option>
<?php
$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["cn_name"];  ?>
</option>
<?php
}
?>
</select>
<!-- </label> -->
</div>
<br/>
<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <input type="text"  id="add_city" value="" style="margin: 0px; width: 938px;height:40px;" /> -->
<input class="form-control" type="text"  id="add_city" value=""/>
<!-- </label> -->
</div>

<br/>
<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="add_city_validation();" value="Add" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>

<hr>
<div class="panel-heading">
<span class="panel-title">
Update City
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <select name="field" id="update_field" onchange="fetch_city();" style="margin: 0px; width: 938px;height:40px;"> -->
<select class="form-control" name="field" id="update_field" onchange="fetch_city();">
<option value="0" >Select Country </option>
<?php
$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["cn_name"];  ?>
</option>
<?php
}
?>
</select>
<!-- </label> -->
</div>
<br/>
<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <select name="city" id="city_update" style="margin: 0px; width: 938px;height:40px;"> -->
<select class="form-control" name="city" id="city_update">
<option value="0">Select City</option>
</select>
</label>
</div>
<br/>
<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <input type="text"  id="update_city" value="" style="margin: 0px; width: 938px;height:40px;" /> -->
<input class="form-control" type="text"  id="update_city" value=""/>
<!-- </label> -->
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="update_city_validation();" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>


<hr>
<div class="panel-heading">
<span class="panel-title">
Delete City
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <select name="field" id="delete_field" onchange="fetch_city1();" style="margin: 0px; width: 938px;height:40px;"> -->
<select class="form-control" name="field" id="delete_field" onchange="fetch_city1();">
<option value="0" >Select Country </option>
<?php
$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["cn_name"];  ?>
</option>
<?php
}
?>
</select>
<!-- </label> -->
</div>
<br/>
<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <select  id="city_delete" style="margin: 0px; width: 938px;height:40px;"> -->
<select class="form-control" id="city_delete">
<option value="0">Select City</option>
</select>
<!-- </label> -->
</div>
<br/>


<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="delete_city_validation();" value="Delete" />
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

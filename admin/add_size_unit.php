<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "add_features";
$_SESSION["sub_menu"]  = "add_size_unit";

include("include/header.php");
?>
<script type="text/javascript">
function error_border(id){
	$("#"+id).css("border", "2px solid red");
}
function no_border(id){
	$("#"+id).css("border", "2px solid SlateGrey  ");
}
	function add_su_validation(){
	var asu_name=$("#asu_name").val();
	no_border("asu_name");
	if(asu_name.trim()==""){
		alert("Please Type Unit");
		error_border('asu_name');
		return false;
	}
	$.post(
		"add_update_size_unit.php",
		{asu_name:asu_name,msg:'add_su'},
		function(r){
			if(r==1){
			alert("Unit added successfully");
			}
			//$("#ajax").html(r[2]);
			window.location="add_size_unit.php";
		}
		);
	}

function update_su_validation(){
	//alert("sidd");
	var asu_id=$("#asu_id").val();
	no_border('asu_id');
	if(asu_id==0){
		alert("Please Select Unit");
		error_border('asu_id');
		return false;
	}
	
	var asu_name=$("#new_asu_name").val();

	if(asu_name.trim()==""){
	alert("Please Type Unit");
	//$("#new_country").focus();
	error_border('new_asu_name');
	return false;
	}
	$.post(
	"add_update_size_unit.php",
	{asu_id:asu_id,asu_name:asu_name,msg:'update_su'},
	function(r){
		
			if(r==1){
	alert("Unit updated successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_size_unit.php";
	}
	);
}

function delete_su_validation()
{
	var asu_id=$("#delete_asu_id").val();
	no_border('delete_asu_id');
	if(asu_id==0){
		alert("Please select Unit");
		error_border('delete_asu_id');
		return false;
	}
	$.post(
	"add_update_size_unit.php",
	{asu_id:asu_id,msg:'delete_su'},
	function(r){
			if(r==1){
	alert("Unit deleted successfully");
	}
	//$("#ajax").html(r[2]);
	window.location="add_size_unit.php";
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
Add Size Unit
</span>
</div>
 
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <input type="text" name="asu_name" id="asu_name" value="" style="margin: 0px; width: 938px;height:40px;" /> -->
<input class="form-control" type="text" name="asu_name" id="asu_name" value=""/>
<!-- </label> -->
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="add_su_validation();" value="Add"  />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>

<hr>
<div class="panel-heading">
<span class="panel-title">
Update Size Unit
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <select  id="asu_id" style="margin: 0px; width: 938px; height:40px;"> -->
<select class="form-control"  id="asu_id">
<option value="0">Select Size Unit</option>
<?php
$unit=getDetails(doSelect("asu_id,asu_name","ambit_size_unit",array()));
foreach($unit as $k=>$v){
?>
<option value="<?php echo $v["asu_id"]; ?>" >
<?php echo $v["asu_name"];  ?>
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
<!-- <input type="text"  id="new_asu_name" value="" style="margin: 0px; width: 938px;height:40px;" /> -->
<input class="form-control" type="text"  id="new_asu_name" value=""/>
<!-- </label> -->
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="update_su_validation();" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>


<hr>
<div class="panel-heading">
<span class="panel-title">
Delete Size Unit
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <select  id="delete_asu_id" style="margin: 0px; width: 938px;height:40px;"> -->
<select class="form-control"  id="delete_asu_id">
<option value="0">Select Size Unit</option>
<?php
$unit=getDetails(doSelect("asu_id,asu_name","ambit_size_unit",array()));
foreach($unit as $k=>$v){
?>
<option value="<?php echo $v["asu_id"]; ?>" >
<?php echo $v["asu_name"];  ?>
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
<input type="submit" name="update" class="btn  btn-primary" onclick="delete_su_validation();" value="Delete" />
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

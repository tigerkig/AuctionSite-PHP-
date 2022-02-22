<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "add_features";
$_SESSION["sub_menu"]  = "add_color";

include("include/header.php");
?>
<script type="text/javascript">
function error_border(id){
	$("#"+id).css("border", "2px solid red");
}
function no_border(id){
	$("#"+id).css("border", "2px solid SlateGrey  ");
}

$(document).ready(function() {
	$("#ajax_add_color").on('submit',(function(e){ 
   var apc_name=$("#apc_name").val();
	no_border("apc_name");
	if(apc_name.trim()==""){
		alert("Please Type Your color Name");
		error_border('apc_name');
		return false;
	}
var image=$("#image").val();
	no_border("image");
	if(image.trim()==""){
		alert("Please Select color");
		error_border('image');
		return false;
	}	
	$.ajax({
        	url: "add_update_color.php?msg=add_color",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			if(data==1){
			alert("Color added successfully");
			}
			window.location="add_color.php";
		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
	  });



/* 	function add_color_validation(){
	var apc_name=$("#apc_name").val();
	no_border("apc_name");
	if(apc_name.trim()==""){
		alert("Please Type Your color Name");
		error_border('apc_name');
		return false;
	}
	$.post(
		"add_update_color.php",
		{apc_name:apc_name,msg:'add_color'},
		function(r){
			if(r==1){
			alert("Color added successfully");
			}
			//$("#ajax").html(r[2]);
			window.location="add_color.php";
		}
		);
	} */

function update_color_validation(){
	//alert("sidd");
	var apc_id=$("#apc_id").val();
	no_border('apc_id');
	if(apc_id==0){
		alert("Please Select Color");
		error_border('apc_id');
		return false;
	}
	
	var apc_name=$("#new_apc_name").val();

	if(apc_name.trim()==""){
	alert("Please Type Your color Name");
	//$("#new_country").focus();
	error_border('new_apc_name');
	return false;
	}
	$.post(
	"add_update_color.php",
	{apc_id:apc_id,apc_name:apc_name,msg:'update_color'},
	function(r){
		
			if(r==1){
	alert("Color updated successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);
}

function delete_color_validation()
{
	var apc_id=$("#delete_apc_id").val();
	no_border('delete_apc_id');
	if(apc_id==0){
		alert("Please select color");
		error_border('delete_apc_id');
		return false;
	}
	$.post(
	"add_update_color.php",
	{apc_id:apc_id,msg:'delete_color'},
	function(res){
	var r=res.split("||");
			if(r[1]==1){
	alert("Color deleted successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
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
Add Color
</span>
</div>
 
<form method="post" action="javascript:void(0);" id="ajax_add_color"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <input type="text" name="apc_name" id="apc_name" value="" style="margin: 0px; width: 938px;height:40px;" /> -->
<input class="form-control" type="text" name="apc_name" id="apc_name" value=""/>
<!-- </label> -->
</div>
<br/>
<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <input type="file" name="image" id="image" value="" style="margin: 0px; width: 938px;height:40px;" /> -->
<input class="button" type="file" name="image" id="image" value=""/>
<!-- </label> -->
</div><br/>
<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary"  value="Add"  />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>

<hr>
<div class="panel-heading">
<span class="panel-title">
Update Color
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <select  id="apc_id" style="margin: 0px; width: 938px; height:40px;"> -->
<select class="form-control"  id="apc_id">
<option value="0">Select Color</option>
<?php
$color=getDetails(doSelect("apc_id,apc_name","ambit_product_color",array()));
foreach($color as $k=>$v){
?>
<option value="<?php echo $v["apc_id"]; ?>" >
<?php echo $v["apc_name"];  ?>
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
<!-- <input type="text"  id="new_apc_name" value="" style="margin: 0px; width: 938px;height:40px;" /> -->
<input class="form-control" type="text"  id="new_apc_name" value=""/>
<!-- </label> -->
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="button" name="update" class="btn  btn-primary" onclick="update_color_validation();" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>


<hr>
<div class="panel-heading">
<span class="panel-title">
Delete Color
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<!-- <label for="field" class="field prepend-icon"> -->
<!-- <select  id="delete_apc_id" style="margin: 0px; width: 938px;height:40px;"> -->
<select class="form-control"  id="delete_apc_id">
<option value="0">Select Color</option>
<?php
$color=getDetails(doSelect("apc_id,apc_name","ambit_product_color",array()));
foreach($color as $k=>$v){
?>
<option value="<?php echo $v["apc_id"]; ?>" >
<?php echo $v["apc_name"];  ?>
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
<input type="button" name="update" class="btn  btn-primary" onclick="delete_color_validation();" value="Delete" />
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

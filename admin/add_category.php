<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "add_features";
$_SESSION["sub_menu"]  = "add_category";

include("include/header.php");
?>
<script type='text/javascript' src='js/jquery-1.6.2.min.js'></script>
<script type="text/javascript">
function error_border(id){
	$("#"+id).css("border", "2px solid red");
}
function no_border(id){
	$("#"+id).css("border", "2px solid SlateGrey  ");
}
	// function add_category_validation(){
	// var pc_name=$("#pc_name").val();
	// no_border("pc_name");
	// if(pc_name.trim()==""){
	// 	alert("Please Type Category");
	// 	//$("#add_country").focus();
	// 	error_border('pc_name');
	// 	return false;
	// }
	// $.post(
	// 	"add_update_category.php",
	// 	{pc_name:pc_name,msg:'add_category'},
	// 	function(r){
	// 		if(r==1){
	// 		alert("Category added successfully");
	// 		}
	// 		location.reload();
	// 	}
	// 	);
	// }

function update_category_validation(){
	//alert("sidd");
	var pc_id=$("#update_category").val();
	no_border('update_category');
	if(pc_id==0){
		alert("Please Select Category");
		error_border('update_category');
		return false;
	}
	
	var pc_name=$("#new_category").val();

	if(pc_name.trim()==""){
	alert("Please Type Category Name");
	//$("#new_country").focus();
	error_border('new_category');
	return false;
	}
	/*$.post(
	"add_update_category.php",
	{pc_id:pc_id,pc_name:pc_name,msg:'update_category'},
	function(r){
			if(r==1){
	alert("Category updated successfully");
	}
	location.reload();
	}
	);*/
	//add 2021/03/14
	var pc_image=$("#pc_update_image").val();
   	if(pc_image.trim()==""){
    	alert("Image Field Require !");
    	error_border('pc_update_image');
		return false;
    }
	
	var pc_image = $('#pc_update_image')[0].files[0];
	
	var form = $('#ajax_update_category')[0];
	var data = new FormData(form);
	data.append("msg", "update_category");
	data.append("pc_name", pc_name);
	data.append("pc_id", pc_id);
	
	$.ajax({
        	url: "add_update_category.php",
			type: "POST",
			enctype: 'multipart/form-data',
			data:  data,
			//data:  {pc_id:pc_id,pc_name:pc_name, pc_image:pc_image, msg:'update_category'},
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			if(data==1){
				alert("Category updated successfully");
			}
			location.reload();
		    },
		    error: function() 
	    	{
	    	}	        
	   });
}

function delete_category_validation()
{
	var pc_id=$("#delete_category_field").val();
	no_border('delete_category_field');
	if(pc_id==0){
		alert("Please select category");
		error_border('delete_category_field');
		return false;
	}
	$.post(
	"add_update_category.php",
	{pc_id:pc_id,msg:'delete_category'},
	function(r){
			if(r==1){
	alert("Category deleted successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);
}

function add_sub_cat_validation(){
	var psc_pc_id=$("#sub_cat_id").val();
	no_border('sub_cat_id');
	if(psc_pc_id==0){
		alert("Please select Category");
		error_border('sub_cat_id');
		return false;
	}
	var psc_name=$("#psc_name").val();
	if(psc_name.trim()==""){
		alert("Please type sub-category");
		//$("#add_city").focus();
		error_border('psc_name');
		return false;
	}
	$.post(
	"add_update_category.php",
	{psc_pc_id:psc_pc_id,psc_name:psc_name,msg:'add_sub_cat'},
	function(r){
			if(r==1){
	alert("Sub-Category added successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);

}

function update_sub_cat_validation(){
	var psc_pc_id=$("#update_field").val();
	no_border('update_field');
	if(psc_pc_id==0){
		alert("Please select category");
		error_border('update_field');
		return false;
	}
	var psc_id=$("#psc_id").val();
	var psc_name=$("#update_sub_cat").val();
	if(psc_name.trim()==""){
		alert("Please Type Sub-Category");
		//$("#update_city").focus();
		error_border('update_sub_cat');
		return false;
	}
	$.post(
	"add_update_category.php",
	{psc_id:psc_id,psc_name:psc_name,psc_pc_id:psc_pc_id,msg:'update_sub_cat'},
	function(r){
			if(r==1){
	alert("Sub-Category updated successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);
}

function delete_sub_cat_validation(){
	var psc_pc_id=$("#delete_field").val();
	no_border('delete_field');
	if(psc_pc_id==0){
		alert("Please select category");
		error_border('delete_field');
		return false;
	}
	var psc_id=$("#sub_cat_delete").val();
	$.post(
	"add_update_category.php",
	{psc_id:psc_id,msg:'delete_sub_cat'},
	function(r){
			if(r==1){
	alert("Sub-Category deleted successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);

}

function add_sub_sub_cat_validation(){
	var psc_pc_id=$("#update_field1").val();
	no_border('update_field1');
	if(psc_pc_id==0){
		alert("Please select category");
		error_border('update_field1');
		return false;
	}
	var psc_id=$("#psc_id1").val();
	var pssc_name=$("#pssc_name").val();
	if(pssc_name.trim()==""){
		alert("Please Type Sub-Category");
		//$("#update_city").focus();
		error_border('pssc_name');
		return false;
	}
	$.post(
	"add_update_category.php",
	{pssc_psc_id:psc_id,pssc_name:pssc_name,msg:'add_sub_sub_cat'},
	function(r){
			if(r==1){
	alert("Sub-Sub-Category added successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);
}

function update_sub_sub_cat_validation(){
	var psc_pc_id=$("#update_field11").val();
	no_border('update_field11');
	if(psc_pc_id==0){
		alert("Please select category");
		error_border('update_field11');
		return false;
	}
	var pssc_id=$("#pssc_id").val();
	var pssc_name=$("#new_pssc_name").val();
	if(pssc_name.trim()==""){
		alert("Please Type Sub-Sub-Category");
		//$("#update_city").focus();
		error_border('pssc_name');
		return false;
	}
	$.post(
	"add_update_category.php",
	{pssc_id:pssc_id,pssc_name:pssc_name,msg:'update_sub_sub_cat'},
	function(r){
			if(r==1){
	alert("Sub-Sub-Category updated successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);
}

function delete_sub_sub_cat_validation(){
	var psc_pc_id=$("#update_field111").val();
	no_border('update_field111');
	if(psc_pc_id==0){
		alert("Please select category");
		error_border('update_field111');
		return false;
	}
	var pssc_id=$("#pssc_id1").val();
	
	$.post(
	"add_update_category.php",
	{pssc_id:pssc_id,msg:'delete_sub_sub_cat'},
	function(r){
			if(r==1){
	alert("Sub-Sub-Category deleted successfully");
	}
	//$("#ajax").html(r[2]);
	location.reload();
	}
	);
}

function fetch_sub_cat(){
		var psc_pc_id=$("#update_field").val();
		$.ajax({
			url:'fetch_sub_cat.php?psc_pc_id='+psc_pc_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#psc_id").html(response);
			}
		});
	}
function fetch_sub_cat2(){
		var psc_pc_id=$("#update_field1").val();
		$.ajax({
			url:'fetch_sub_cat.php?psc_pc_id='+psc_pc_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#psc_id1").html(response);
			}
		});
	}
	function fetch_sub_cat22(){
		var psc_pc_id=$("#update_field11").val();
		$.ajax({
			url:'fetch_sub_cat.php?psc_pc_id='+psc_pc_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#psc_id11").html(response);
				var pssc_psc_id=$("#psc_id11").val();
			$.ajax({
			url:'fetch_sub_cat.php?pssc_psc_id='+pssc_psc_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#pssc_id").html(response);
			}
		});
			}
		});
	}

	function fetch_sub_cat222(){
		var psc_pc_id=$("#update_field111").val();
		$.ajax({
			url:'fetch_sub_cat.php?psc_pc_id='+psc_pc_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#psc_id111").html(response);
				var pssc_psc_id=$("#psc_id111").val();
			$.ajax({
			url:'fetch_sub_cat.php?pssc_psc_id='+pssc_psc_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#pssc_id1").html(response);
			}
		});
			}
		});
	}
	function fetch_sub_sub_cat(){
		var pssc_psc_id=$("#psc_id11").val();
		$.ajax({
			url:'fetch_sub_cat.php?pssc_psc_id='+pssc_psc_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#pssc_id").html(response);
			}
		});
	}

	function fetch_sub_sub_cat1(){
		var pssc_psc_id=$("#psc_id111").val();
		$.ajax({
			url:'fetch_sub_cat.php?pssc_psc_id='+pssc_psc_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#pssc_id1").html(response);
			}
		});
	}
function fetch_sub_cat1(){
		var psc_pc_id=$("#delete_field").val();
		$.ajax({
			url:'fetch_sub_cat.php?psc_pc_id='+psc_pc_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#sub_cat_delete").html(response);
			}
		});
	}

$(document).ready(function() {
	$("#ajax_des").on('submit',(function(e){ 
    //alert('sidd');
    var pc_name=$("#pc_name").val();
    var pc_image=$("#pc_image").val();
    no_border('pc_name');
    no_border('pc_image');
    if(pc_name.trim()==""){
    	alert("Category Field Require !");
    	error_border('pc_name');
		return false;
    }
    if(pc_image.trim()==""){
    	alert("Image Field Require !");
    	error_border('pc_image');
		return false;
    }
	
	$.ajax({
        	url: "add_update_category.php?msg=add_category",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			if(data==1){
				alert("Category Added successfully");
			}
			location.reload();
		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
	  });
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
Add Category
</span>
</div>
 
<form method="post" action="javascript:void(0);" id="ajax_des"  enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<input class="form-control" type="text" name="pc_name" id="pc_name" value=""/>
</div>
<br/>
<div class="section">
<input class="button" type="file" name="pc_image" id="pc_image" value=""/>
</div>
<br/>
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
Update Category
</span>
</div>
	<form method="post" action="javascript:void(0);"  id="ajax_update_category"    enctype="multipart/form-data" >
		<div class="panel-body pn">
			<div class="section">
				<select class="form-control"  name="update_category" id="update_category">
					<option value="0">Select Category</option>
					<?php
					$category=getDetails(doSelect("pc_id,pc_name","product_category",array()));
					foreach($category as $k=>$v){
					?>
					<option value="<?php echo $v["pc_id"]; ?>" >
					<?php echo $v["pc_name"];  ?>
					</option>
					<?php
					}
					?>
				</select>
			</div>
			<br/>
			<div class="section">
				<input class="form-control" type="text" name="new_category" id="new_category" value=""/>
			</div>
			<br/>			
			<div class="section">
				<input class="button" type="file" name="pc_update_image" id="pc_update_image" value=""/>
			</div>

			<div class="section">
				<div class="pull-right">
					<!--<input type="button" name="update" class="btn  btn-primary" onclick="update_category_validation();" value="Update" />-->
					<input type="button" name="update" class="btn  btn-primary" onclick="update_category_validation();" value="Update" />
				</div>
			</div>
		 
		</div>
		 
	<div class="panel-footer"></div>
	</form>


<hr>
<div class="panel-heading">
<span class="panel-title">
Delete Category
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<select class="form-control"  id="delete_category_field">
<option value="0" >Select Category </option>
<?php
$category=getDetails(doSelect("pc_id,pc_name","product_category",array()));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["pc_id"]; ?>" >
<?php echo $v["pc_name"];  ?>
</option>
<?php
}
?>
</select>
</div>
<br/>


<div class="section">
<div class="pull-right">
<input type="button" name="update" class="btn  btn-primary" onclick="delete_category_validation();" value="Delete" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
 <!-- For City -->
 <hr/>
<div class="panel-heading">
<span class="panel-title">
Add Sub Category
</span>
</div>
 
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<select class="form-control"  id="sub_cat_id">
<option value="0" >Select Category </option>
<?php
$category=getDetails(doSelect("pc_id,pc_name","product_category",array()));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["pc_id"]; ?>" >
<?php echo $v["pc_name"];  ?>
</option>
<?php
}
?>
</select>
</div>
<br/>
<div class="section">
<input class="form-control" type="text"  id="psc_name" value=""/>
</div>

<br/>
<div class="section">
<div class="pull-right">
<input type="button" name="update" class="btn  btn-primary" onclick="add_sub_cat_validation();" value="Add" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>

<hr>
<div class="panel-heading">
<span class="panel-title">
Update Sub-Category
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<select class="form-control" name="field" id="update_field" onchange="fetch_sub_cat();">
<option value="0" >Select Category </option>
<?php
$category=getDetails(doSelect("pc_id,pc_name","product_category",array()));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["pc_id"]; ?>" >
<?php echo $v["pc_name"];  ?>
</option>
<?php
}
?>
</select>
</div>
<br/>
<div class="section">
<select class="form-control" name="psc_id" id="psc_id">
<option value="0">Select Sub-Category</option>
</select>
</div>
<br/>
<div class="section">
<input class="form-control" type="text"  id="update_sub_cat" value=""/>
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="button" name="update" class="btn  btn-primary" onclick="update_sub_cat_validation();" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>


<hr>
<div class="panel-heading">
<span class="panel-title">
Delete Sub-Category
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<select class="form-control" name="field" id="delete_field" onchange="fetch_sub_cat1();">
<option value="0" >Select Category </option>
<?php
$category=getDetails(doSelect("pc_id,pc_name","product_category",array()));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["pc_id"]; ?>" >
<?php echo $v["pc_name"];  ?>
</option>
<?php
}
?>
</select>
<!-- </label> -->
</div>
<br/>
<div class="section">
<select class="form-control"  id="sub_cat_delete">
<option value="0">Select Sub-Category</option>
</select>
<!-- </label> -->
</div>
<br/>


<div class="section">
<div class="pull-right">
<input type="button" name="update" class="btn  btn-primary" onclick="delete_sub_cat_validation();" value="Delete" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>




<hr>
<div class="panel-heading">
<span class="panel-title">
Add Sub-Sub-Category
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<select class="form-control" name="field" id="update_field1" onchange="fetch_sub_cat2();">
<option value="0" >Select Category </option>
<?php
$category=getDetails(doSelect("pc_id,pc_name","product_category",array()));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["pc_id"]; ?>" >
<?php echo $v["pc_name"];  ?>
</option>
<?php
}
?>
</select>
</div>
<br/>
<div class="section">
<select class="form-control" name="psc_id1" id="psc_id1">
<option value="0">Select Sub-Category</option>
</select>
</div>
<br/>
<div class="section">
<input class="form-control" type="text"  id="pssc_name" value=""/>
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="button" name="update" class="btn  btn-primary" onclick="add_sub_sub_cat_validation();" value="Add" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>



<hr>
<div class="panel-heading">
<span class="panel-title">
Update Sub-Sub-Category
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<select class="form-control" name="field" id="update_field11" onchange="fetch_sub_cat22();">
<option value="0" >Select Category </option>
<?php
$category=getDetails(doSelect("pc_id,pc_name","product_category",array()));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["pc_id"]; ?>" >
<?php echo $v["pc_name"];  ?>
</option>
<?php
}
?>
</select>
</div>
<br/>
<div class="section">
<select class="form-control" name="psc_id11" id="psc_id11" onchange="fetch_sub_sub_cat();">
<option value="0">Select Sub-Category</option>
</select>
</div>
<br/>
<div class="section">
<select class="form-control" name="pssc_id" id="pssc_id">
<option value="0">Select Sub-Sub-Category</option>
</select>
</div>
<br/>
<div class="section">
<input class="form-control" type="text"  id="new_pssc_name" value=""/>
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="button" name="update" class="btn  btn-primary" onclick="update_sub_sub_cat_validation();" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>

<hr>
<div class="panel-heading">
<span class="panel-title">
Delete Sub-Sub-Category
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<select class="form-control" name="field" id="update_field111" onchange="fetch_sub_cat222();">
<option value="0" >Select Category </option>
<?php
$category=getDetails(doSelect("pc_id,pc_name","product_category",array()));
foreach($category as $k=>$v){
?>
<option value="<?php echo $v["pc_id"]; ?>" >
<?php echo $v["pc_name"];  ?>
</option>
<?php
}
?>
</select>
<!-- </label> -->
</div>
<br/>
<div class="section">
<select class="form-control" name="psc_id11" id="psc_id111" onchange="fetch_sub_sub_cat1();">
<option value="0">Select Sub-Category</option>
</select>
</div>
<br/>
<div class="section">
<select class="form-control" name="pssc_id1" id="pssc_id1">
<option value="0">Select Sub-Sub-Category</option>
</select>
<!-- </label> -->
</div>
<br/>


<div class="section">
<div class="pull-right">
<input type="button" name="update" class="btn  btn-primary" onclick="delete_sub_sub_cat_validation();" value="Delete" />
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

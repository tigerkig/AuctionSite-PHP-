<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "dashboard";
$_SESSION["sub_menu"]  = "membershipPlan";

include("include/header.php");
?>
<script type="text/javascript">
	function validation(){
	var name=$("#name1").val();
	var price=$("#price").val();
	var image=$("#image").val();
	if(name.trim()==""){
		alert("Please enter package name");
		$("#name1").focus();
		return false;
	}
	if(price.trim()==""){
		alert("Please enter package price");
		$("#price").focus();
		return false;
	}
	if(isNaN(price)){
		alert("Price must be numeric !");
		$("#price").val("");
		$("#price").focus();
		return false;
	}
	if(image.trim()==""){
		alert("Please select image");
		return false;
	}
	}

	
	function delete_package(id){
		$.post("active_package_item.php",{id:id,set:'delete_package'},function(r){
			//alert(r);
		$("#ajax").html(r);
		});
	}
		function edit_package(id){
		$.post(
			"edit_package.php",
			{id:id},
			function(r){
				$("#for_edit_ajax").html(r);
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
 
 
<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Membership Plan
</span>
</div>
 
<form method="post" action=""   enctype="multipart/form-data" onsubmit="return validation();">
<div class="panel-body pn">

<div class="section">
<label for="name" class="field prepend-icon">
<!-- <input type="text" name="name" id="name1" class="gui-input" placeholder="Package Name...." style="margin: 0px; width: 920px;"> -->
<!-- <label for="email" class="field-icon">
<i class="fa fa-suitcase" aria-hidden="true"></i>
</label> -->
</label>
<input class="form-control" type="text" name="name" id="name1" class="gui-input" placeholder="Package Name....">
</div>

<div class="section">
<label for="price" class="field prepend-icon">
<!-- <input type="text" name="price" id="price" class="gui-input" placeholder="Package Price..." style="margin: 0px; width: 920px;"> -->
<!-- <label for="confirmPassword" class="field-icon">
<i class="fa fa-usd" aria-hidden="true"></i>
</label> -->
</label>
<input class="form-control" type="text" name="price" id="price" class="gui-input" placeholder="Package Price...">
</div>
 
<div class="section">
<label for="image" class="field prepend-icon">
<!-- <input type="file" name="image" id="image" class="gui-input" style="margin: 0px; width: 920px;"> -->
<!-- <label for="image" class="field-icon">
<i class="fa fa-file" aria-hidden="true"></i>
</label> -->
</label>
<input class="button" type="file" name="image" id="image" class="gui-input">
</div>

<div class="section">
<!-- <div class="bs-component pull-left mt10">
<div class="checkbox-custom checkbox-primary mb10">
<input type="checkbox" checked="" id="agree">
<label for="agree">I agree to the
<a href="#"> terms of use. </a></label>
</div>
</div> -->
<div class="pull-right">
<!-- <button type="submit" class="btn  btn-primary" onclick="sub_membership();">Submit
</button> -->
<input type="submit" name="submit" class="btn  btn-primary" value="Submit" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>
<?php
if(isset($_POST["submit"])){
unset($_POST["submit"]);
if(isset($_FILES['image']["name"]) && $_FILES['image']["error"]==0){
	$name=time().$_FILES["image"]["name"];
	$temp=$_FILES["image"]["tmp_name"];
	$_POST["image"]=$name;
	move_uploaded_file($temp,"../image/".$name);
}

doInsert($_POST,"ambit_membership");
$id=newly_insert_id();
doInsert(array("package_id"=>$id),"ambit_package_description");
echo '<script>window.location="membershipPlan.php";</script>';
}

?>
<div id="for_edit_ajax">

<section id="content" class="table-layout animated fadeIn">
 
<div class="chute chute-center">
<div class="row">
<!-- div ajax -->
<div id="ajax">
<div class="col-md-12">
<div class="panel panel-visible" id="spy6">
<div class="panel-heading">
<div class="panel-title hidden-xs">
Package Accessibility <span style="color: red;opacity: 0.6;">(** -1 For Unlimited)</span>
<?php
$select='p_id,name,price,no_of_product,no_of_featured,no_of_image';
$from='ambit_membership,ambit_package_description';
$where=array('package_id'=>'p_id');
$result=getDetails(doSelect1($select,$from,$where));

?>
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m">Package Name</th>
<th class="va-m">Price</th>
<th class="va-m">Post Product Limit</th>
<th class="hidden-xs va-m">Post Product Photo Limit</th>
<th class="hidden-xs va-m">Featured Product Limit</th>
<th class="hidden-xs va-m">Action</th>

</tr>
</thead>
<tbody>
<?php
foreach($result as $k=>$v){
?>
<tr>
<td ><?php echo ucfirst($v["name"]);  ?></td>
<td><?php if($v["price"] != 0) echo currency1(base_currency(),$v["price"]); else echo 'Free';  ?></td>
<?php
if($v["no_of_product"]== -1){
$property_p='<font color="red">Unlimited</font>';
}else{
$property_p=$v["no_of_product"];
}

?>
<td style="text-align: center;"><?php echo $property_p;  ?></td>
<?php
if($v["no_of_image"]== -1){
$property_ph='<font color="red">Unlimited</font>';
}else{
$property_ph=$v["no_of_image"];
}

?>
<td><?php echo $property_ph;  ?></td>
<?php
if($v["no_of_featured"]== -1){
$featured_pro_limit='<font color="red">Unlimited</font>';
}else{
$featured_pro_limit=$v["no_of_featured"];
}

?>
<td><?php echo $featured_pro_limit;  ?></td>
<td><a href="javascript:void(0);" onclick="delete_package('<?php echo $v["p_id"];  ?>');" title="Delete Package"><img src="icon/delete.png" width="19" /></a><a href="javascript:void(0);" onclick="edit_package('<?php echo $v["p_id"];  ?>');" title="Edit Package"><img src="icon/edit.png" width="13" /></a>
</td>
</tr>
<?php
}
?>
</tbody>
</table>

</div>
</div>
</div>
</div>
</div> <!-- ajax div -->
</div>
</div>
 
</section>

</div>
<!-- For edit ajax -->
<?php
if(isset($_POST["update"])){
unset($_POST["update"]);
$p_id=$_POST["p_id"];
unset($_POST["p_id"]);
$prev_image=seeMoreDetails("image","ambit_membership",array("p_id"=>$p_id));
$_POST["image"]=$prev_image;
if(isset($_FILES['new_image']["name"]) && $_FILES['new_image']["error"]==0){
	$name=time().$_FILES["new_image"]["name"];
	$temp=$_FILES["new_image"]["tmp_name"];
	$_POST["image"]=$name;
	move_uploaded_file($temp,"../image/".$name);
	if(file_exists("../image/".$prev_image)){
		unlink("../image/".$prev_image);
}	
}
extract($_POST);
$status=doUpdate("ambit_membership",array("name"=>$name,"price"=>$price,"image"=>$image),array("p_id"=>$p_id));
doUpdate("ambit_package_description",array("no_of_product"=>$no_of_product,"no_of_image"=>$no_of_image,"no_of_featured"=>$no_of_featured),array("package_id"=>$p_id));
echo '<script>window.location="membershipPlan.php";</script>';
}

?>
 
<!-- <script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
 
<script src="assets/js/plugins/highcharts/highcharts.js"></script>
<script src="assets/js/plugins/c3charts/d3.min.js"></script>
<script src="assets/js/plugins/c3charts/c3.min.js"></script>
 
<script src="assets/js/plugins/circles/circles.js"></script>
 
<script src="assets/js/plugins/jvectormap/jquery.jvectormap.min.js"></script>
<script src="assets/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>
 
<script src="assets/js/plugins/fullcalendar/lib/moment.min.js"></script>
<script src="assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
 
<script src="assets/allcp/forms/js/jquery-ui-monthpicker.min.js"></script>
<script src="assets/allcp/forms/js/jquery-ui-datepicker.min.js"></script>
 
<script src="assets/js/plugins/magnific/jquery.magnific-popup.js"></script>
 
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
 
<script src="assets/js/demo/widgets.js"></script>
<script src="assets/js/demo/widgets_sidebar.js"></script>
<script src="assets/js/pages/dashboard1.js"></script>
 
</body>
</html> -->
<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>

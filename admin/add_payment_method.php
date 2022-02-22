<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "dashboard";
$_SESSION["sub_menu"]  = "add_payment_method";

include("include/header.php");
?>
<script type="text/javascript">
	function validation(){
	var apm_name=$("#apm_name").val();
	if(apm_name.trim()==""){
		alert("Please enter Payment Method");
		$("#apm_name").focus();
		return false;
	}
	}

	
	function delete_method(id){
		if(confirm("Do You Want To Delete This Method?")){
		$.post("delete_method.php",{apm_id:id,set:'delete_account'},function(r){
		if(r==1){
			alert("Delete Successfully");
			location.reload();
		}
		if(r==0){
			alert("Something Went Wrong....");
		}
		});
		}
	}
		function edit_method(id){
		$.post(
			"edit_method.php",
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
Add Payment Method  
</span>
</div>
 
<form method="post" action=""   enctype="multipart/form-data" onsubmit="return validation();">
<div class="panel-body pn">

<div class="section">
<input class="form-control" type="text" name="apm_name" id="apm_name" class="gui-input" placeholder="Payment Method....">
<label for="name" class="field prepend-icon">
<!-- <input type="text" name="apm_name" id="apm_name" class="gui-input" placeholder="Payment Method...." style="margin: 0px; width: 937px;"> -->
</label>

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
<input type="submit" name="submit" class="btn  btn-primary" value="Add" />
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

doInsert($_POST,"ambit_payment_method");

echo '<script>window.location="add_payment_method.php";</script>';
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
Payment Method Listing 
<?php
$select='apm_id,apm_name,status';
$from='ambit_payment_method';
$where=array();
$result=getDetails(doSelect1($select,$from,$where));

?>
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m">Sl. No: </th>
<th class="va-m">Payment Method</th>
<th class="hidden-xs va-m">Action</th>

</tr>
</thead>
<tbody>
<?php
$i=1;
foreach($result as $k=>$v){
?>
<tr>
<td ><?php echo $i;  ?></td>
<td ><?php echo ucfirst($v["apm_name"]);  ?></td>
<td><?php if($v["status"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?><a href="javascript:void(0);" onclick="delete_method('<?php echo $v["apm_id"];  ?>');" title="Delete Account"><img src="icon/delete.png" width="19" /></a><a href="javascript:void(0);" onclick="edit_method('<?php echo $v["apm_id"];  ?>');" title="Edit Account"><img src="icon/edit.png" width="13" /></a>
</td>
</tr>
<?php
$i++;
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
doUpdate("ambit_payment_method",$_POST,array("apm_id"=>$_POST["apm_id"]));
echo '<script>window.location="add_payment_method.php";</script>';
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

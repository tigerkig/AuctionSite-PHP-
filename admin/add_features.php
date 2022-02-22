<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "home_setting";
$_SESSION["sub_menu"]  = "add_features";

include("include/header.php");
?>
<script type="text/javascript">
	function validation(){
	var about_us=$("#about_us").val();
	if(about_us.trim()==""){
		alert("Please write About Us");
		$("#about_us").focus();
		return false;
	}
	}
function delete_about(id){
	 $.post("delete_about.php",{id:id},function(r){
	 $("#ajax").html(r);
	 });
}
function edit_terms(id){
	 $.post("edit_features.php",{id:id},function(r){
	 $("#ajax").html(r);
	 });
}
function update_validation(id){
	var about=$("#about_us").val();
 $.post("update_about.php",{id:id,about:about},function(r){
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
<?php
$terms=getDetails(doselect1("id,features","ambit_features",array()));
?>
<span class="panel-title">
Features &nbsp <?php if(!empty($terms)) { ?> <a href="javascript:void(0);" title="Edit" onclick="edit_terms('<?php echo $terms[0]["id"];  ?>');"><img src="icon/edit.png" width="15" /></a><?php } ?>
</span>
</div>
<div class="panel-body pn">
<span style="text-decoration:none;color:blue;">Features:</span>
<p style="text-align: justify;">
<?php //if(!empty($terms)) echo htmlspecialchars($terms[0]["features"]); else echo '<font color="red">Please write about above !</font>';  ?>
<?php if(!empty($terms)) echo $terms[0]["features"]; else echo '<font color="red">Please write about above !</font>';  ?>
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

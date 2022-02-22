<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "customer";
$_SESSION["sub_menu"]  = "change_customer_password";

include("include/header.php");
?>

 
<section id="content_wrapper">
 

 
 
<header id="topbar" class="alt">
<div class="topbar-left">
<ol class="breadcrumb">
<li class="breadcrumb-icon">
<a href="index.php">
<span class="fa fa-home"></span>
</a>
</li>
<li class="breadcrumb-active">
<a href="index.php">Dashboard</a>
</li>
<li class="breadcrumb-link">
<a href="index.php">Home</a>
</li>
<li class="breadcrumb-current-item">Change Customer Password</li>
</ol>
</div>

</header>
 
<script type="text/javascript">

$(document).ready(function() {
$("#ajax_des").on('submit',(function(e){  
var ac_id=$("#ac_id").val();
var email=$("#email").val();
var new_password=$("#new_password").val();
var c_password=$("#c_password").val();
var type=$("#type").val();


if(ac_id.trim()=="0"){
	alert("Select Customer Name");
	return false;
}

if(email.trim()==""){
	alert("Select Customer please");
	return false;
}

if(new_password.trim()==""){
	alert("Password Required");
	$("#new_password").focus();
	return false;
}

if(c_password.trim()==""){
	alert("Confirm Password Required");
	$("#c_password").focus();
	return false;
}

if(c_password.trim()!=new_password.trim()){
	alert("Password mismatch !");
	$("#c_password").val('');
	$("#c_password").focus();
	return false;
}

if(type.trim()=="0"){
	alert("Select Type");
	return false;
}


	
	$.ajax({
        	url: "ajax_update_customer_password.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			if(data==1){
				alert("Update Successfully");
				window.location='<?php echo $_SERVER["REQUEST_URI"]; ?>';
			}else if(data==0){
				alert("Update Failed");
			}else { 
				alert("Password not exist !");
			}
		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
	  });
	  
function fetch_email(id,id1){
	var ac_id=$("#"+id).val().trim();
	if(ac_id!=0){
		$.post(
		'ajax_fetch_email.php',
		{ac_id:ac_id,msg:'customer_email'},
		function(r){
		$("#"+id1).val(r);
		}
		);
	}else{
		$("#"+id1).val('');
		return false;
	}
}
</script>
<section id="content" class="table-layout animated fadeIn">

 
<div class="chute chute-center">
<div class="mw1000 center-block">
 
<div class="allcp-form">
<div class="panel">
<div class="panel-heading">

</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="ajax_des" enctype="multipart/form-data">
<h6 class="mb20" id="spy1">Update Password</h6>
 
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="ac_id" name="ac_id" onchange="fetch_email('ac_id','email');">
<option value="0">Select Customer</option>
<?php
$customer=getDetails(doSelect("ac_id,name,email","ambit_customer",array()));
foreach($customer as $k=>$v){
?>
<option value="<?php echo $v["ac_id"]; ?>"><?php echo trim($v["name"]); ?></option>
<?php
}
?>
</select>
<i class="arrow double"></i>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<label class="field">
<input type="text" name="email" id="email" value="" class="gui-input" readonly placeholder="Email Id">
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4">
<div class="section">
<label class="field">
<input type="password" name="new_password" id="new_password"  class="gui-input" placeholder="New password">
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<label class="field">
<input type="password"  id="c_password" class="gui-input" placeholder="Confirm password">
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<label class="field select">
<select id="type" name="type">
<option value="0">Send Mail to customer???</option>
<option value="1">Yes</option>
<option value="2">No</option>

</select>
<i class="arrow double"></i>
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Update" >
</div>
</div>
</form>
 
</div>
</div>
</div>
</div>
</div>
 
</section>
 
</section>
 
<aside id="sidebar_right" class="nano affix">
 
<div class="sidebar-right-wrapper nano-content">
<div class="sidebar-block br-n p15">
<h6 class="title-divider text-muted mb20"> Visitors Stats
<span class="pull-right"> 2015
<i class="fa fa-caret-down ml5"></i>
</span>
</h6>
<div class="progress mh5">
<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%">
<span class="fs11">New visitors</span>
</div>
</div>
<div class="progress mh5">
<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
<span class="fs11 text-left">Returnig visitors</span>
</div>
</div>
<div class="progress mh5">
<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
<span class="fs11 text-left">Orders</span>
</div>
</div>
<h6 class="title-divider text-muted mt30 mb10">New visitors</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">350</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-warning mn">
<i class="fa fa-caret-down"></i> 15.7% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt25 mb10">Returnig visitors</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">660</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-success-dark mn">
<i class="fa fa-caret-up"></i> 20.2% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt25 mb10">Orders</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">153</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-success mn">
<i class="fa fa-caret-up"></i> 5.3% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt40 mb20"> Site Statistics
<span class="pull-right text-primary fw600">Today</span>
</h6>
</div>
</div>
</aside>
 
</div>
 
<style>body{min-height:2300px;}.content-header b,.allcp-form .panel.heading-border:before,.allcp-form .panel .heading-border:before{transition:all 0.7s ease;}@media (max-width: 800px) {.allcp-form .panel-body{padding:18px 12px;}.option-group .option{display:block;}.option-group .option+.option{margin-top:8px;}}</style>
 
 
<?php
require_once("include/footer.php");

}else{
	echo '<script>window.location="vendor_login.php";</script>';
}
?>

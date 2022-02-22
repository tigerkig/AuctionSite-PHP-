<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "vendor";
$_SESSION["sub_menu"]  = "add_vendor";

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
<li class="breadcrumb-current-item">Add Vendor</li>
</ol>
</div>

</header>
 
<script type="text/javascript">
$(document).ready(function() {
$("#ajax_des").on('submit',(function(e){  
var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var fname=$("#fname").val();
var lname=$("#lname").val();
var email=$("#email").val();
var phone=$("#phone").val();
var fax=$("#fax").val();
var image=$("#image").val();
var company=$("#company").val();
var address_one=$("#address_one").val();
var address_two=$("#address_two").val();
var country=$("#country").val();
var city=$("#city").val();
var post_code=$("#post_code").val();
var password=$("#password").val();
var cpassword=$("#cpassword").val();
if(fname.trim()==""){
	alert("First Name Required");
	$("#fname").focus();
	return false;
}
if(lname.trim()==""){
	alert("Last Name Required");
	$("#lname").focus();
	return false;
}
if(email.trim()==""){
	alert("Email Required");
	$("#email").focus();
	return false;
}
if(!regex.test(email)){
      alert("email invalid");
      $("#email").val("");
      $("#email").focus();
      return false;
    }
if(phone.trim()==""){
	alert("Phone Required");
	$("#phone").focus();
	return false;
}

if(isNaN(phone)){
	alert("Phone Invalid");
    $("#phone").val("");
    $("#phone").focus();
	return false;
}

    if(fax.trim()==""){
	alert("Fax Required");
	$("#fax").focus();
	return false;
}
if(image.trim()==""){
	alert("Profile Pic Required");
	$("#image").focus();
	return false;
}
   if(company.trim()==""){
	alert("Company Required");
	$("#company").focus();
	return false;
}

if(address_one.trim()==""){
	alert("Address Required");
	$("#address_one").focus();
	return false;
}

if(address_two.trim()==""){
	alert("Address Required");
	$("#address_two").focus();
	return false;
}

if(country.trim()=="0"){
	alert("Country Required");
	$("#country").focus();
	return false;
}

if(city.trim()=="0"){
	alert("City Required");
	$("#city").focus();
	return false;
}

if(post_code.trim()==""){
	alert("Post Code Required");
	$("#post_code").focus();
	return false;
}

if(password.trim()==""){
	alert("Password Required");
	$("#password").focus();
	return false;
}

if(cpassword.trim()==""){
	alert("Confirm Password Required");
	$("#cpassword").focus();
	return false;
}

if(password != cpassword){
	alert("Password Mismatch");
	$("#cpassword").val("");
	$("#cpassword").focus();
	return false;
}



	
	$.ajax({
        	url: "ajax_vendor_registration.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			if(data==1){
				alert("Registration Successfull");
				alert("Password sucessfully sent to vendor email. THANK YOU");
				window.location="index.php";
			}
			if(data==0){
				alert("Registration Failed");
			}

		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
	  });
	  
function fetch_city(){
		var cn_id=$("#country").val();
		$.ajax({
			url:'fetch_city.php?cn_id='+cn_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				$("#city").html(response);
			}
		});
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
<h6 class="mb20" id="spy1">Add Vendor</h6>

<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field">
<input type="text" name="fname" id="fname"  class="gui-input" placeholder="First Name">
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<label class="field">
<input type="text" name="lname" id="lname" class="gui-input" placeholder="Last Name">
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field">
<input type="email" name="email" id="email"  class="gui-input" placeholder="Email">
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<label class="field">
<input type="text"  name="phone" id="phone" class="gui-input" placeholder="Phone">
</label>
</div>
</div>
</div> 
<input type="hidden" name="terms_agree" value="1" />
<input type="hidden" name="status" value="1" />
<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field">
<input type="text" name="fax" id="fax"  class="gui-input" placeholder="Fax">
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<label class="field">
<input type="file"  name="image" id="image" class="gui-input" >
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4">
<div class="section">
<label class="field">
<input type="text" name="company" id="company"  class="gui-input" placeholder="Company Name">
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<label class="field">
<input type="text"  name="address_one" id="address_one" class="gui-input" placeholder="Address One">
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<label class="field">
<input type="text"  name="address_two" id="address_two" class="gui-input" placeholder="Address Two">
</label>
</div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="country" name="country" onchange="fetch_city('country','city');">
<option value="0">Select Country</option>
<?php
$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
foreach ($country as $k => $v) {
?>
<option value="<?php echo $v["cn_id"]; ?>"><?php echo $v["cn_name"];  ?></option>
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
<label class="field select">
<select id="city" name="city">
<option value="0">Select City</option>

</select>
<i class="arrow double"></i>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="section">
<label class="field">
<input type="text" name="post_code" id="post_code" class="gui-input" placeholder="Zip Code">
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<label class="field">
<input type="password" name="password" id="password" class="gui-input" placeholder="Password">
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<label class="field">
<input  type="password" name="cpassword" id="cpassword" class="gui-input" placeholder="Confirm password">
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Add" >
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

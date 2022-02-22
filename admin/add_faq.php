<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "footer_setting";
$_SESSION["sub_menu"]  = "add_faq";

include("include/header.php");
?>
<script type="text/javascript">
	function validation(){
	var question=$("#question").val();
	var answer=$("#answer").val();
	if(question.trim()==""){
		alert("Please Type your question");
		$("#question").focus();
		return false;
	}
	if(answer.trim()==""){
		alert("Please Type your answer");
		$("#answer").focus();
		return false;
	}
	}
function delete_faq(id){
	  $.post("delete_faq.php",{id:id},function(r){
	  $("#ajax").html(r);
	  });
}
function edit_faq(id){
	  $.post("edit_faq.php",{id:id},function(r){
	  $("#full_ajax").html(r);
	  });
}
function update_validation(id){
	var question=$("#question").val();
	var answer=$("#answer").val();
 	$.post("update_faq.php",{id:id,question:question,answer:answer},function(r){
 	$("#full_ajax").html(r);
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
 
<div id="full_ajax">
<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Add FAQ
</span>
</div>
 
<form method="post" action=""   enctype="multipart/form-data" onsubmit="return validation();">
<div class="panel-body pn">

<div class="section">
<!-- <label for="question" class="field prepend-icon"> -->
<textarea class="form-control" name="question" id="question" placeholder="Write Question.........." rows="2" cols="100"></textarea>
<!-- </label> -->
<br/>
</div>

<div class="section">
<!-- <label for="answer" class="field prepend-icon"> -->
<textarea class="form-control" name="answer" id="answer" placeholder="Write Answer.........." rows="5" cols="100"></textarea>
<br/>
<!-- </label> -->
</div>


<div class="section">
<div class="pull-right">
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
doInsert($_POST,"ambit_faq");
echo '<script>alert("FAQ added Successfully");window.location="add_faq.php";</script>';
}
?>


<div id="ajax">
<section id="content" class="animated fadeIn">
<div class="panel">
<div class="mt40">
<h5 class="text-muted mb20 mtn"> FAQ </h5>
<div class="panel-group accordion" id="accordion1">
<?php
$faq=getDetails(doSelect1("id,question,answer","ambit_faq",array()));
if(!empty($faq)){
foreach($faq as $k=>$v){
?>


<div class="panel" >
<div class="panel-heading" >
<a class="accordion-toggle accordion-icon link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_<?php echo $v["id"]; ?>">
<?php echo $v["question"]; ?>
</a>
<img src="icon/delete.png" title="Delete" style="cursor:pointer" onclick="delete_faq('<?php echo $v["id"]; ?>')" width="25" />
<img src="icon/edit.png" title="Edit" style="cursor:pointer" onclick="edit_faq('<?php echo $v["id"]; ?>')" width="15" />
</div>
<div id="accordion1_<?php echo $v["id"]; ?>" class="panel-collapse collapse" style="height: 0px;">
<div class="panel-body">
<?php
echo $v["answer"];
?>
</div>
</div>
</div>
<?php
}
}else{
	echo '<font color="red">Please add FAQ</font>';
}
?>
</div>
</div>
</div>
</section>
</div>
<!-- end ajax div -->
</div>

<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>

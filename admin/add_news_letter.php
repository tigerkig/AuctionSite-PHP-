<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">




function delete_news(id){
	$.post("delete_news_totaly.php",
		{anfs_id:id},
		function(r){
			if(r==1){
				alert("Deleted Successfully");
			}
			window.location="add_news_letter.php";
		}

		);
}

function edit_news(id){
	$.post("edit_news_letter.php",
		{anfs_id:id},
		function(r){
			$("#full_ajax").html(r);
		}

		);
}
function back(){
	window.location="add_news_letter.php";
}
function view(id){
	$.post("view_news_letter.php",
		{anfs_id:id},
		function(r){
			$("#full_ajax").html(r);
		}

		);
}

function send_mail(id){
	var title=$("#title").val();
	var news=$("#news").val();
	if(title.trim()==""){
		alert("Title Required");
		$("#title").focus();
		return false;
	}
	if(news.trim()==""){
		alert("News Required");
		$("#news").focus();
		return false;
	}
	$.post(
		"send_news.php",
		{id:id,title:title,news:news},
		function(r){
			if(r==1){
				alert("Sent Successfully");
				window.location="add_news_letter.php";
			}else{
				alert(r);
				window.location="add_news_letter.php";
			}
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
 
<div id="full_ajax">
<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
News Letter
</span>
</div>
 
<form method="post" action="javascript:void(0);"  >
<div class="panel-body pn">

<div class="section">
<label for="partner" class="field prepend-icon">
<input type="text" name="title" id="title" placeholder="News Title" style="margin: 0px; width: 937px; height: 40px;" required>
</label>
</div>

<div class="section">
<label for="partner" class="field prepend-icon">
<textarea name="news" id="news" placeholder="Type News" style="margin: 0px; width: 937px; height: 150px;" required></textarea>
</label>
</div>



<input type="submit" name="submit" onclick="send_mail('1');" class="btn  btn-primary" value="Save & Send" />


<input type="submit" name="submit" onclick="send_mail('2');" class="btn  btn-primary" value="Send" />

 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>


<section id="content" class="table-layout animated fadeIn">
 
<div class="chute chute-center">
<div class="row">
<!--  -->
<div class="col-md-12">
<div class="panel panel-visible" id="spy6">
<div class="panel-heading">
<div class="panel-title hidden-xs">
News Listing
<?php
//Fetch gift Details 
$news_details=getDetails(doSelect("anfs_id,title,news","ambit_nws_fr_subscrption",array()));
?>
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="hidden-xs va-m">Title</th>
<th class="va-m">News</th>
<th class="va-m">Action</th>
</tr>
</thead>
<tbody> 
<?php
foreach($news_details as $k=>$v){

?>
<tr>
<td class="hidden-xs"><?php echo $v["title"]; ?></td>
<td class="hidden-xs"><p style="text-align: justify;"><?php echo substr($v["news"],0,300).'.....<a href="javacsript:void(0);" onclick="view('. $v["anfs_id"].');">See Details</a>'; ?></p></td>

<td>  <a href="javascript:void(0);" onclick="delete_news('<?php echo $v["anfs_id"];  ?>');" title="Delete"><img src="icon/delete.png" width="23" /></a> &nbsp
<a href="javascript:void(0);" onclick="edit_news('<?php echo $v["anfs_id"];  ?>');" title="Edit & Send"><img src="icon/edit.png" width="20" /></a> &nbsp
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

</div>
</div>
 
</section>


<!-- end ajax div -->
</div>

<?php
if(isset($_POST["update"])){
unset($_POST["update"]);
$aln_id=$_POST["aln_id"];
unset($_POST["act_id"]);
$date=date("Y-m-d");
$_POST["date"]=$date;
$status=doUpdate("ambit_latest_news",$_POST,array("aln_id"=>$aln_id));
	

		
echo '<script>window.location="add_latest_news.php";</script>';	
}
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>

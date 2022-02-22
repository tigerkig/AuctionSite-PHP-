<?php
session_start();
require_once("function.php");
if(isset($_SESSION["vendor_id"]) && $_SESSION["vendor_email"]){
$vendor_details=getDetails(doSelect("*","vendor_registration",array("vr_id"=>$_SESSION["vendor_id"])));

$_SESSION["main_menu"] = "dashboard";
$_SESSION["sub_menu"]  = "vendor_details";

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
<a href="index.php"><?php echo $lang_148; ?></a>
</li>
<li class="breadcrumb-link">
<a href="index.php"><?php echo $lang_149; ?></a>
</li>
<li class="breadcrumb-current-item">My Profile</li>
</ol>
</div>

</header>

<script type="text/javascript">
function edit(vr_id){
$.post(
	"update_vendor_profile.php",
	{},
	function(r){
		$("#ajax").html(r);
	}
	);
	}
</script>

<?php
if(isset($_GET["id"])){
$select="vr_id,fname,lname,email,phone,fax,company,address_one,address_two,cn_name,ct_name,post_code,image,status";
$result=getDetails(doSelect1($select,"vendor_registration,ambit_country,ambit_city",array("vr_id"=>$_GET["id"],"cn_id"=>"country","ct_id"=>"city")));
}else{
	$result=array();
}
?>
<div id="ajax">
<section id="content" class="table-layout animated fadeIn">
 
<div class="chute chute-center">
<div class="row">
<!--  -->
<div class="col-md-12">

<!-- <input type="text" id="search" onkeyup="myFunction()" style="width:99%;" placeholder="Search By Category,Product Name,Brand...."  value="" /> -->
<!-- <input type="text" id="search" onkeyup="myFunction()" style="width:33%;" placeholder="Search By Name"  value="" />
<input type="text" id="search" onkeyup="myFunction()" style="width:33%;" placeholder="Search By Email"  value="" /> -->

<div id="ajax_field">
<div class="panel panel-visible" id="spy6">

<?php

if(!empty($result)){
foreach($result as $k=>$v){

?>
<div class="panel-heading">

<div class="panel-title hidden-xs"><?php echo ucwords($v["company"]);  ?>
</div>
</div>

<div class="panel-body pn">
<div class="table-responsive">
<div class="col-sm-12">
<div class="panel">
<div class="panel-body pn">
<div class="bs-component">
<table class="table">
<thead>
<tr class="info">
<th><?php echo $lang_26; ?></th>
<th><?php echo $lang_207; ?></th>
<th><?php echo $lang_190; ?></th>
<th>
<code><?php echo $lang_138; ?></code>
</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src="../vendor/vendor_image/<?php echo $v["image"];  ?>" width="70px"></td>
<td ><?php echo ucfirst($v["company"]); ?></td>
<td ><?php echo ucfirst($v["fname"]).' '.ucfirst($v["lname"]); ?></td>
<td><?php if($v["status"]==1) echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?> <a href="javascript:void(0);" onclick="edit('<?php echo $v["vr_id"];  ?>');" title="Edit & Update"><img src="icon/edit.png" width="13" /></a>


</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>

<div class="col-sm-12">
<div class="panel">
<div class="panel-body pn">
<div class="bs-component">
<table class="table">
<thead>
<tr class="info">
<th colspan="2">
<?php echo $lang_208; ?>
</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo $lang_113; ?></td>
<td align="right"><?php echo $v["email"];  ?></td>
</tr>

<tr>
<td><?php echo $lang_59; ?></td>
<td align="right"><?php echo $v["phone"];  ?></td>
</tr>


<tr>
<td><?php echo $lang_131; ?></td>
<td align="right"><?php echo $v["fax"];  ?></td>
</tr>

<tr>
<td><?php echo $lang_134; ?></td>
<td align="right"><?php echo $v["address_one"];  ?></td>
</tr>

<tr>
<td><?php echo $lang_135; ?></td>
<td align="right"><?php echo $v["address_two"];  ?></td>
</tr>
<tr>
<td><?php echo $lang_117; ?></td>
<td align="right"><?php echo $v["cn_name"];  ?></td>
</tr>
<tr>
<td><?php echo $lang_136; ?></td>
<td align="right"><?php echo $v["ct_name"];  ?></td>
</tr>
<tr>
<td><?php echo $lang_119; ?></td>
<td align="right"><?php echo $v["post_code"];  ?></td>
</tr>

</tbody>
</table>
</div>
</div>
</div>
</div>

</div>
</div>

<?php

}
}else{
	?>
	<p><?php echo $lang_32; ?></p>
	<?php
}
?>
</div>


</div> 
<!-- ajax field end -->

</div>

</div>
</div>
 



</section>
 </div>
 <!-- Ajax End -->
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
 
 
<?php
require_once("include/footer.php");

}else{
	echo '<script>window.location="vendor_login.php";</script>';
}
?>
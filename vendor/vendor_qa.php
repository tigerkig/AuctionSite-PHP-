<?php
session_start();
require_once("function.php");
if(isset($_SESSION["vendor_id"]) && $_SESSION["vendor_email"]){
$vendor_details=getDetails(doSelect("*","vendor_registration",array("vr_id"=>$_SESSION["vendor_id"])));
include("include/header.php");
?>
<script type="text/javascript">
	function give_answer(id){
   	$.post("answer_vr_question.php",
		{avqa_id:id},
		function(r){
			$("#full_ajax").html(r);
		}

		);
	}
	function delete_vr_question(id){
		 if(confirm("Are you sure , to delete Question ???")){
		$.post("delete_vr_question.php",{avqa_id:id},function(r){
			if(r==1){
		location.reload();	
	}else{
		alert("Something went wrong !");
		}
			}
		);
	}
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
<span class="service-title">ImStates</span>
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
<span class="service-title">MessStates</span>
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
<a href="index.php"><?php  echo $lang_148; ?></a>
</li>
<li class="breadcrumb-link">
<a href="index.php"><?php  echo $lang_149; ?></a>
</li>
<li class="breadcrumb-current-item">Data Tables</li>
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
<button class="btn btn-primary btn-sm btn-bordered hidden-xs"> 3</button>
</div>
</div>
</div>
</header>
 
<div id="full_ajax"> 
<section id="content" class="table-layout animated fadeIn">
 
<div class="chute chute-center">
<div class="row">
<!--  -->
<div class="col-md-12">
<div class="panel panel-visible" id="spy6">
<div class="panel-heading">
<div class="panel-title hidden-xs">
<?php  echo $lang_276; ?>
<?php
$result=getDetails(doSelect("avqa_id,ac_id,question,answer,date,ans_status","ambit_vendor_qustn_ans",array("vr_id"=>$_SESSION["vendor_id"])));

?>
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m"><?php  echo $lang_189; ?></th>
<th class="va-m"><?php  echo $lang_277; ?></th>
<th class="va-m"><?php  echo $lang_278; ?></th>
<th class="va-m"><?php  echo $lang_28; ?></th>
<th class="va-m"><?php  echo $lang_138; ?></th>

</tr>
</thead>
<tbody>
<?php
foreach($result as $k=>$v){

?>
<tr>
<td><?php echo getCustomerName($v["ac_id"]);  ?></td>

<td><?php echo $v["question"];  ?></td>
<td><?php if($v["ans_status"]==0){echo '<font color="red">'.$lang_279.'</font>';}else{ echo substr($v["answer"],0,300).'.....'; }  ?></td>
<td><?php echo get_date_str($v["date"]);  ?></td>
<td><a href="javascript:void(0);" onclick="give_answer('<?php echo $v["avqa_id"];  ?>');" title="Click Here To Give Answer"><img src="icon/edit.png" width="13" /></a> <a href="javascript:void(0);" onclick="delete_vr_question('<?php echo $v["avqa_id"];  ?>');" title="Delete"><img src="icon/delete.png" width="19" /></a>


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
</div>
<!-- Ajax end -->
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
 
 
 
<script src="assets/js/jquery/jquery-1.11.1.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
 
<script src="assets/js/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="assets/js/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="assets/js/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script src="assets/js/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
 
<script src="assets/js/plugins/highcharts/highcharts.js"></script>
 
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/demo/widgets_sidebar.js"></script>
<script src="assets/js/pages/tables-data.js"></script>
 
</body>
</html>
<?php
}else{
	echo '<script>window.location="vendor_login.php";</script>';
}

?>

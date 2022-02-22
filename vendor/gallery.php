<?php
session_start();
require_once("function.php");
if(isset($_SESSION["vendor_id"]) && $_SESSION["vendor_email"]){
$vendor_details=getDetails(doSelect("*","vendor_registration",array("vr_id"=>$_SESSION["vendor_id"])));
//include("include/header.php");
?>
<!DOCTYPE html>
<html>
<head>
 
<meta charset="utf-8">
<title>Vendor Admin Panel</title>
<meta name="keywords" content="Vendor Admin Panel"/>
<meta name="description" content="Vendor Admin Panel">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
 
<link rel="stylesheet" type="text/css" href="assets/js/plugins/magnific/magnific-popup.css">
 
<link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">
 
<link rel="stylesheet" type="text/css" href="assets/allcp/forms/css/forms.css">
 
<link rel="shortcut icon" href="assets/img/favicon.ico">

<!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="basic-gallery">
 

 
 
<div id="main">
 
<?php
include_once("include/header_gallery.php");

?>

 
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
<a href="index.php">
<span class="fa fa-home"></span>
</a>
</li>
<li class="breadcrumb-active">
<a href="index.php"><?php echo $lang_148;  ?></a>
</li>
<li class="breadcrumb-link">
<a href="index.php"><?php echo $lang_149;  ?></a>
</li>
<li class="breadcrumb-current-item"><?php echo $lang_178;  ?></li>
</ol>
</div>

</header>
 
<section id="content" class="table-layout animated fadeIn">
<div class="chute chute-center">
<div class="mh15 pv15 br-b br-light">
<div class="row">
<div class="col-xs-7">
<div class="mixitup-controls ib">
<form class="controls" id="select-filters">
<div class="btn-group ib mr10">
<button type="button" class="btn btn-default hidden-xs">
<span class="fa fa-folder"></span>
</button>
<div class="btn-group mb5">
<fieldset>
<select id="filter1">
<option value=""><?php echo $lang_179;  ?></option>
<!-- <option value=".folder1">Properties Photo</option>
<option value=".folder2">Agents Photo</option> -->
<!-- <option value=".folder3">Folder 3</option> -->
</select>
</fieldset>
</div>
</div>
<div class="btn-group ib mr10 mb5">

</div>
</form>
</div>
</div>
<div class="col-xs-5 text-right">
<button type="button" id="mixitup-reset" class="btn btn-default mb5 mr5"><?php echo $lang_180;  ?></button>
<div class="btn-group mb5">
<button type="button" class="btn btn-default to-grid">
<span class="fa fa-th"></span>
</button>
<button type="button" class="btn btn-default to-list">
<span class="fa fa-navicon"></span>
</button>
</div>
</div>
</div>
<div class="mixitup-controls hidden">
<form class="controls allcp-form" id="checkbox-filters">
<fieldset class="">
<h4>Cars</h4>
<label class="option block mt10">
<input type="checkbox" value=".circle">
<span class="checkbox"></span>Circle
</label>
</fieldset>
<button id="mixitup-reset2">Clear All</button>
</form>
</div>
</div>
<div id="mixitup-container">

<?php
if(!isset($_GET["id"])){
$pro_photo=array();
}else{

$pro_photo=getDetails(doSelect1("image,api_id,status",'ambit_product_image',array("api_apa_id"=>$_GET["id"])));	
}
?>
<script type="text/javascript">

function delete_image(api_id){
	$.post("photo_delete.php",{api_id:api_id},function(r)
	{
		 if(r==1){
			window.location="<?php echo $_SERVER['REQUEST_URI'];  ?>";
		 }else{
		 	window.location="<?php echo $_SERVER['REQUEST_URI'];  ?>";
		 }
	}
		);
}


</script>

<?php
foreach($pro_photo as $k=>$v){
?>

 <div class="mix folder1">
<div class="panel p6 pbn">
<div class="of-h">
<img src="product_photo/<?php echo $v["image"];  ?>" class="img-responsive" title="<?php  echo getProductName($_GET["id"]); ?>"  width="200" height="200">


<h6><a href="javascript:void(0);" onclick="delete_image('<?php echo $v["api_id"];  ?>');" title="Delete"><img src="icon/cross.png" style="position: absolute; top:0; left: 0;height:20px;width:20px;" /></a></h6>

<div class="row table-layout">
<div class="col-xs-8 va-m pln">
<h6><?php  echo getProductName($_GET["id"]); ?></h6>
</div>
<div class="col-xs-4 text-right va-m prn">
<a href="javascript:void(0)" title=" <?php if($v["status"]==0)echo ' Not Approved ';else echo 'Approved';  ?> "><span class="fa fa-circle fs10 <?php if($v["status"]==0)echo ' text-danger ';  ?> ml10"></span></a>
</div>
</div>
</div>
</div>
</div> 
<?php
}
?>

<div class="gap"></div>
<div class="gap"></div>
<div class="gap"></div>
<div class="gap"></div>
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
 
 
 
<script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
 
<script src="assets/js/plugins/highcharts/highcharts.js"></script>
 
<script src="assets/js/plugins/mixitup/jquery.mixitup.min.js"></script>
 
<script src="assets/js/plugins/magnific/jquery.magnific-popup.js"></script>
<script src="assets/js/plugins/fileupload/fileupload.js"></script>
<script src="assets/js/plugins/holder/holder.min.js"></script>
 
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/demo/widgets_sidebar.js"></script>
<script src="assets/js/pages/basic-gallery.js"></script>
 
</body>
</html>
<?php
}else{
	echo '<script>window.location="vendor_login.php";</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
 
<meta charset="utf-8">
<title>Vendor Admin Panel</title>
<meta name="keywords" content="<?php echo get_site_settings(15);  ?>" />
<meta name="description" content="<?php echo get_site_settings(16);  ?>" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
 
<link rel="stylesheet" type="text/css" href="assets/fonts/icomoon/icomoon.css">
 
<link rel="stylesheet" type="text/css" href="assets/js/plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" type="text/css" href="assets/js/plugins/magnific/magnific-popup.css">
 
<link rel="stylesheet" type="text/css" href="assets/js/plugins/c3charts/c3.min.css">
 
<link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/js/plugins/datatables/media/css/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/js/plugins/datatables/extensions/Editor/css/dataTables.editor.css">
<link rel="stylesheet" type="text/css" href="assets/js/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css">
<link rel="stylesheet" type="text/css" href="assets/allcp/forms/css/forms.css">
<link rel="shortcut icon" href="assets/img/favicon.ico">
<script type='text/javascript' src='js/jquery-1.6.2.min.js'></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js'></script>

<!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
function pending_photo(){
	window.location="gallery.php";
}
function notification(){
	window.location="ship_product_listing.php";
}
function return_notification(){
	window.location="return_product.php";
}
function go_to_home(){
	window.location="index.php";
}
function my_balance(){
	window.location="my_balance.php";
}
function product_query(){
	window.location="product_qa.php";
}
function vendor_query(){
	window.location="vendor_qa.php";
}


</script>


    <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-187584630-1">
		</script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-187584630-1');
		</script>
</head>
<body class="dashboard-page">
 

 
 
<div id="main">
 
<header class="navbar navbar-fixed-top bg-dark">
<div class="navbar-logo-wrapper">
<a class="navbar-logo-text" href="index.php">
<b><?php echo $lang_220; ?></b>
</a>
<span id="sidebar_left_toggle" class="ad ad-lines"></span>
</div>
<ul class="nav navbar-nav navbar-left">
<li class="dropdown dropdown-fuse hidden-xs">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><font color="green"><?php echo $lang_221; ?></font>
<span class="fa fa-chevron-down"></span>
</a>
<ul class="dropdown-menu" role="menu">


<li><a href="add_product.php"><?php echo $lang_150; ?></a></li>
<li><a href="product_listing.php"><?php echo $lang_187; ?></a></li>
<li><a href="ship_product_listing.php"><?php echo $lang_222; ?></a></li>

<!-- <li><a href="add_gift.php">Add Gift</a></li> -->
</ul>
</li>
<li class="hidden-xs">
<a class="navbar-fullscreen toggle-active" href="#">
<span class="glyphicon glyphicon-fullscreen"></span>
</a>
</li>
</ul>

<ul class="nav navbar-nav navbar-right">
<li class="hidden-xs">
<div class="navbar-btn btn-group">
<button  class="btn dropdown-toggle" onclick="go_to_home();" title="<?php echo $lang_149; ?>">
<span class="fa fa-home fs20 text-info"></span>
</button>
</div>
</li>

<!-- <li class="hidden-xs">
<div class="navbar-btn btn-group">
<button  class="btn dropdown-toggle" onclick="pending_photo();" title="Pending Photo">
<span class="fa fa-camera fs20 text-info" ></span>
</button>
</div>
</li> -->
<li class="dropdown dropdown-fuse">
<div class="navbar-btn btn-group">
<button  class="btn dropdown-toggle" onclick="notification();" title="<?php echo $lang_223; ?>">
<?php
$notification=getDetails(doSelect("COUNT(*) as notification","ambit_shipment_status",array("ass_vr_id"=>$_SESSION["vendor_id"],"shipment_status"=>0)));
$notification=$notification[0]["notification"]; 
?>
<span class="fa fa-bell fs20 text-info"></span>
<?php
if($notification > 0){
?>
<font color="red">(<?php  echo $notification; ?>) &nbsp </font>
<?php
}
?>
</button>
</div>
</li>

<li class="dropdown dropdown-fuse">
<div class="navbar-btn btn-group">
<button  class="btn dropdown-toggle" onclick="return_notification();" title="Product Return">
<?php
$notification1=getDetails(doSelect("COUNT(*) as notification","ambit_return_product",array("arp_vr_id"=>$_SESSION["vendor_id"],"send_vendor"=>1,"return_status"=>0)));
$notification1=$notification1[0]["notification"]; 
?>
<span class="fa fa-bell-slash-o fs20 text-info"></span>
<?php
if($notification1 > 0){
?>
<font color="red">(<?php  echo $notification1; ?>) &nbsp </font>
<?php
}
?>
</button>
</div>
</li>


<li class="dropdown dropdown-fuse">
<div class="navbar-btn btn-group">
<button  class="btn dropdown-toggle" onclick="my_balance();" title="<?php echo $lang_224; ?>">
<span class="fa fa-usd fs20 text-info"></span>
</button>
</div>
</li>

<li class="dropdown dropdown-fuse">
<div class="navbar-btn btn-group">
<button  class="btn dropdown-toggle" onclick="product_query();" title="<?php echo $lang_274; ?>">
<span><img src="icon/qa1.png" width="35px" /></span>
</button>
</div>
</li>
<li class="dropdown dropdown-fuse">
<div class="navbar-btn btn-group">
<button  class="btn dropdown-toggle" onclick="vendor_query();" title="<?php echo $lang_275; ?>">
<span><img src="icon/qa.png" width="35px" /></span>
</button>
</div>
</li>
<li class="dropdown dropdown-fuse">
<a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">
<span class="hidden-xs"><name> <?php echo $vendor_details[0]["fname"];  ?> </name> </span>
<span class="fa fa-caret-down hidden-xs mr15"></span>
<img src="vendor_image/<?php echo $vendor_details[0]["image"]; ?>" alt="avatar" class="mw55">
</a>
<ul class="dropdown-menu list-group keep-dropdown w250" role="menu">


<li class="list-group-item">
<a href="ship_product_listing.php" class="animated animated-short fadeInUp">
<span class="fa fa-bell"></span> <?php echo $lang_223; ?>

</a>
</li>
<li class="list-group-item">
<a href="return_product.php" class="animated animated-short fadeInUp">
<span class="fa fa-bell-slash-o"></span> <?php echo $lang_225; ?> </a>
</li>
<li class="list-group-item">
<a href="my_balance.php" class="animated animated-short fadeInUp">
<span class="fa fa-usd"></span> <?php echo $lang_212; ?> </a>
</li>
<li class="dropdown-footer text-center">
<a href="logout.php" class="btn btn-primary btn-sm btn-bordered">
<span class="fa fa-power-off pr5"></span> <?php echo $lang_226; ?> </a>
</li>
</ul>
</li>
</ul>
</header>
 
 
<aside id="sidebar_left" class="nano nano-light affix">
 
<div class="sidebar-left-content nano-content">
 
<header class="sidebar-header">
 
<div class="sidebar-widget author-widget">
<div class="media">
<a class="media-left" href="#">
<img src="vendor_image/<?php echo $vendor_details[0]["image"]; ?>" class="img-responsive">
</a>
<div class="media-body">
<div class="media-links">
<a href="#" class="sidebar-menu-toggle"></a> <a href="logout.php"><?php echo $lang_226; ?></a>
</div>
<div class="media-author">  <?php  echo explode(" ",$vendor_details[0]["fname"])[0];  ?>  </div>
</div>
</div>
</div>
 
</header>
 
 
<ul class="nav sidebar-menu">
	<li class="sidebar-label pt30"><?php echo $lang_227; ?></li>
	<!-- <li class="active">
		<a class="accordion-toggle menu-open" href="#"> -->
	<li class="<?php if($_SESSION["main_menu"] == "dashboard") echo "active";?>">
  		<a class="accordion-toggle <?php if($_SESSION["main_menu"] == "dashboard") echo "menu-open";?>" href="#">
    		<span class="fa fa-dashboard"></span>
			<span class="sidebar-title"><?php echo $lang_148; ?></span>
			<span class="caret"></span>
		</a>
		<ul class="nav sub-nav">
			<li class="<?php if($_SESSION["sub_menu"] == "vendor_details") echo "active";?>">
				<a href="vendor_details.php?id=<?php echo $_SESSION["vendor_id"];  ?>">
				<span class="fa fa-file-text-o"></span> <?php echo $lang_228; ?> </a>
			</li>
			<li class="<?php if($_SESSION["sub_menu"] == "add_product") echo "active";?>">
				<a href="add_product.php">
				<span class="fa fa-file-text-o"></span> <?php echo $lang_150; ?> </a>
			</li>
			<li class="<?php if($_SESSION["sub_menu"] == "add_product_by_excel") echo "active";?>">
				<a href="add_product_by_excel.php">
				<span class="fa fa-file-text-o"></span>Add product by excel file </a>
			</li>
			<li class="<?php if($_SESSION["sub_menu"] == "my_balance") echo "active";?>">
				<a href="my_balance.php">
				<span class="fa fa-file-text-o"></span> <?php echo $lang_181; ?> </a>
			</li>
			<li class="<?php if($_SESSION["sub_menu"] == "subscribe_package") echo "active";?>">
				<a href="subscribe_package.php">
				<span class="fa fa-file-text-o"></span> <?php echo $lang_229; ?> </a>
			</li>
			<li class="<?php if($_SESSION["sub_menu"] == "change_password") echo "active";?>">
				<a href="change_password.php">
				<span class="fa fa-file-text-o"></span> Change Password </a>
			</li>

			<li class="<?php if($_SESSION["sub_menu"] == "ship_auction_product_listing") echo "active";?>">
				<a href="ship_auction_product_listing.php">
				<span class="fa fa-file-text-o"></span> Shipment for auction </a>
			</li>
			<!-- <li>
			<a href="social_media_settings.php">
			<span class="fa fa-file-text-o"></span>Social Media Settings</a>
			</li> -->
		</ul>
	</li>
	<li class="sidebar-label pt25"><?php echo $lang_230; ?></li>
	<li class="<?php if($_SESSION["main_menu"] == "product") echo "active";?>">
		<a class="accordion-toggle <?php if($_SESSION["main_menu"] == "product") echo "menu-open";?>" href="#">
			<span class="fa fa-share-square-o"></span>
			<span class="sidebar-title"><?php echo $lang_46; ?></span>
			<span class="caret"></span>
		</a>
		<ul class="nav sub-nav">
			<li class="<?php if($_SESSION["sub_menu"] == "product_listing") echo "active";?>">
				<a href="product_listing.php">
				<span class="fa fa-file-text-o"></span> <?php echo $lang_187; ?></a>
			</li>
			<li class="<?php if($_SESSION["sub_menu"] == "auction_product_listing") echo "active";?>">
				<a href="auction_product_listing.php">
				<span class="fa fa-file-text-o"></span> Auction Product Listing</a>
			</li>
			<!-- <li>
			<a href="product_details.php">
			<span class="fa fa-file-text-o"></span> Product Details</a>
			</li> -->
		</ul>
	</li>

	<li class="<?php if($_SESSION["main_menu"] == "product_shipment") echo "active";?>">
		<a class="accordion-toggle <?php if($_SESSION["main_menu"] == "product_shipment") echo "menu-open";?>" href="#">
			<span class="fa fa-share-square-o"></span>
			<span class="sidebar-title"><?php echo $lang_231; ?></span>
			<span class="caret"></span>
		</a>
		<ul class="nav sub-nav">
			<li class="<?php if($_SESSION["sub_menu"] == "ship_product_listing") echo "active";?>">
				<a href="ship_product_listing.php">
				<span class="fa fa-file-text-o"></span>Shipment Product Listing</a>
			</li>
			<!-- <li class="<?php if($_SESSION["sub_menu"] == "ship_auction_product_listing") echo "active";?>">
				<a href="ship_auction_product_listing.php" style="padding-right:0;">
				<span class="fa fa-file-text-o"></span>Shipment Auction Product Listing</a>
			</li> -->
		</ul>
	</li>
	<li class="<?php if($_SESSION["main_menu"] == "pending_return") echo "active";?>">
		<a class="accordion-toggle <?php if($_SESSION["main_menu"] == "pending_return") echo "menu-open";?>" href="#">
			<span class="fa fa-share-square-o"></span>
			<span class="sidebar-title"><?php echo $lang_232; ?></span>
			<span class="caret"></span>
		</a>
		<ul class="nav sub-nav">
			<li class="<?php if($_SESSION["sub_menu"] == "return_product") echo "active";?>">
				<a href="return_product.php">
				<span class="fa fa-file-text-o"></span><?php echo $lang_188; ?></a>
			</li>
		</ul>
	</li>
	<li class="<?php if($_SESSION["main_menu"] == "withdraw_details") echo "active";?>">
		<a class="accordion-toggle <?php if($_SESSION["main_menu"] == "withdraw_details") echo "menu-open";?>" href="#">
			<span class="fa fa-share-square-o"></span>
			<span class="sidebar-title"><?php echo $lang_233; ?></span>
			<span class="caret"></span>
		</a>
		<ul class="nav sub-nav">
			<li class="<?php if($_SESSION["sub_menu"] == "withdraw_request_balance") echo "active";?>">
				<a href="withdraw_request_balance.php">
				<span class="fa fa-file-text-o"></span><?php echo $lang_212; ?></a>
			</li>
			<li class="<?php if($_SESSION["sub_menu"] == "commission") echo "active";?>">
				<a href="commission.php">
				<span class="fa fa-file-text-o"></span>Commission</a>
			</li>
		</ul>
	</li>
<!-- <li>
<a class="accordion-toggle" href="#">
<span class="fa fa-desktop"></span>
<span class="sidebar-title">Approval</span>
<span class="caret"></span>
</a>
<ul class="nav sub-nav">
<li>
<a href="gallery.php">
<span class="fa fa-file-text-o"></span> Pending Photo </a>
</li>
<li>
<a href="review_approve.php">
<span class="fa fa-file-text-o"></span>Approve Review </a>
</li>
</ul>
</li> -->
<!-- <li>
<a class="accordion-toggle" href="#">
<span class="fa fa-wrench"></span>
<span class="sidebar-title">Add Features</span>
<span class="caret"></span>
</a>
<ul class="nav sub-nav">
<li>
<a href="add_country.php">
<span class="fa fa-file-text-o"></span>Add Country City</a>
</li>
<li>
<a href="add_partner.php">
<span class="fa fa-file-text-o"></span>Add Partner</a>
</li>
<li>
<a href="add_form_field.php">
<span class="fa fa-file-text-o"></span>Form Settings</a>
</li>
<li>
<a href="add_testimonial.php">
<span class="fa fa-file-text-o"></span>Add Client Testimonial</a>
</li>
<li>
<a href="add_latest_news.php">
<span class="fa fa-file-text-o"></span>Add Latest News</a>
</li>
<li>
<a href="add_news_letter.php">
<span class="fa fa-file-text-o"></span>News Letter</a>
</li>
<li>
<a href="before_login.php">
<span class="fa fa-file-text-o"></span>Add Login Page</a>
</li>
</ul>
</li> -->
<li>
</li>



<br/>
</ul>

 
</div>
 
</aside>
 
 
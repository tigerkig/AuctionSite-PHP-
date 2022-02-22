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
<li class="active">
<a class="accordion-toggle menu-open" href="#">
<span class="fa fa-dashboard"></span>
<span class="sidebar-title"><?php echo $lang_148; ?></span>
<span class="caret"></span>
</a>
<ul class="nav sub-nav">
<li>
<a href="vendor_details.php?id=<?php echo $_SESSION["vendor_id"];  ?>">
<span class="fa fa-file-text-o"></span> <?php echo $lang_228; ?> </a>
</li>
<li>
<a href="add_product.php">
<span class="fa fa-file-text-o"></span> <?php echo $lang_150; ?> </a>
</li>
<li>
<a href="my_balance.php">
<span class="fa fa-file-text-o"></span> <?php echo $lang_181; ?> </a>
</li>
<li>
<a href="subscribe_package.php">
<span class="fa fa-file-text-o"></span> <?php echo $lang_229; ?> </a>
</li>
<!-- <li>
<a href="social_media_settings.php">
<span class="fa fa-file-text-o"></span>Social Media Settings</a>
</li> -->
</ul>
</li>
<li class="sidebar-label pt25"><?php echo $lang_230; ?></li>
<li>
<a class="accordion-toggle" href="#">
<span class="fa fa-share-square-o"></span>
<span class="sidebar-title"><?php echo $lang_46; ?></span>
<span class="caret"></span>
</a>
<ul class="nav sub-nav">
<li class="active">
<a href="product_listing.php">
<span class="fa fa-file-text-o"></span> <?php echo $lang_187; ?></a>
</li>
<!-- <li>
<a href="product_details.php">
<span class="fa fa-file-text-o"></span> Product Details</a>
</li> -->
</ul>
</li>

<li>
<a class="accordion-toggle" href="#">
<span class="fa fa-share-square-o"></span>
<span class="sidebar-title"><?php echo $lang_231; ?></span>
<span class="caret"></span>
</a>
<ul class="nav sub-nav">
<li class="active">
<a href="ship_product_listing.php">
<span class="fa fa-file-text-o"></span><?php echo $lang_187; ?></a>
</li>
</ul>
</li>
<li>
<a class="accordion-toggle" href="#">
<span class="fa fa-share-square-o"></span>
<span class="sidebar-title"><?php echo $lang_232; ?></span>
<span class="caret"></span>
</a>
<ul class="nav sub-nav">
<li class="active">
<a href="return_product.php">
<span class="fa fa-file-text-o"></span><?php echo $lang_187; ?></a>
</li>
</ul>
</li>
<li>
<a class="accordion-toggle" href="#">
<span class="fa fa-share-square-o"></span>
<span class="sidebar-title"><?php echo $lang_233; ?></span>
<span class="caret"></span>
</a>
<ul class="nav sub-nav">
<li class="active">
<a href="withdraw_request_balance.php">
<span class="fa fa-file-text-o"></span><?php echo $lang_212; ?></a>
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
 
 
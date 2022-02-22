

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Admin Panel</title>
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
      <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script type="text/javascript">
         function pending_photo(){
         	window.location="gallery.php";
         }
         function return_notification(){
         	window.location="return_product.php";
         }
         function all_properties(){
         	window.location="product_listing.php";
         }
         
         function go_to_home(){
         	window.location="index.php";
         }
         function notification(){
         	window.location="withdraw_request.php";
         }
      </script>
      <?php
         if (strpos($_SERVER['HTTP_HOST'], 'itechscripts.com') !== false) {
         ?>
      <script type="text/javascript">
         var _gaq = _gaq || [];
         _gaq.push(['_setAccount', 'UA-25344887-1']);
         _gaq.push(['_trackPageview']);
         (function() {
           var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
           ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
           var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
         })();
      </script>
      <?php
         }
         ?>
         
         
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
            <b>admin panel</b>
            </a>
            <span id="sidebar_left_toggle" class="ad ad-lines"></span>
         </div>
         <ul class="nav navbar-nav navbar-left">
            <li class="dropdown dropdown-fuse hidden-xs">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><font color="green">Quick Link</font>
               <span class="fa fa-chevron-down"></span>
               </a>
               <ul class="dropdown-menu" role="menu">
                  <li><a href="about_us.php">About Us</a></li>
                  <li><a href="contact_us.php">Contact Us</a></li>
                  <li><a href="siteSettings.php">Site Settings</a></li>
                  <li><a href="terms_services.php">Term & Services</a></li>
                  <li><a href="add_country.php">Country & City</a></li>
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
                  <button  class="btn dropdown-toggle" onclick="go_to_home();" title="Home">
                  <span class="fa fa-home fs20 text-info"></span>
                  </button>
               </div>
            </li>
            <li class="hidden-xs">
               <div class="navbar-btn btn-group">
                  <button  class="btn dropdown-toggle" onclick="pending_photo();" title="Pending Photo">
                  <span class="fa fa-camera fs20 text-info" ></span>
                  </button>
               </div>
            </li>
            <li class="dropdown dropdown-fuse">
               <div class="navbar-btn btn-group">
                  <button  class="btn dropdown-toggle" onclick="all_properties();" title="All Product">
                  <span class="fa fa-th-large fs20 text-info"></span>
                  </button>
               </div>
            </li>
            <li class="dropdown dropdown-fuse">
               <div class="navbar-btn btn-group">
                  <button  class="btn dropdown-toggle" onclick="notification();" title="Withdraw Request">
                  <?php
                     $notification=getDetails(doSelect("COUNT(*) as notification","ambit_withdraw",array("view_status"=>0)));
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
                     $notification1=getDetails(doSelect("COUNT(*) as notification","ambit_return_product",array("status"=>0)));
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
            <!-- <li class="dropdown dropdown-fuse">
               <div class="navbar-btn btn-group">
               <button  class="btn dropdown-toggle" onclick="poke_list();">
               <span class="fa fa-hand-o-right text-primary"></span>
               </button>
               </div>
               </li> -->
            <!--
               <li class="dropdown dropdown-fuse">
               <div class="navbar-btn btn-group">
               <button data-toggle="dropdown" class="btn btn-md dropdown-toggle">
               EN
               </button>
               <ul class="dropdown-menu pv5 animated animated-short fadeIn" role="menu">
               <li>
               <a href="javascript:void(0);"> Spanish </a>
               </li>
               <li>
               <a href="javascript:void(0);"> Italian </a>
               </li>
               </ul>
               </div>
               </li> -->
            <li class="dropdown dropdown-fuse">
               <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">
                  <span class="hidden-xs">
                     <name> <?php echo explode(" ",$admin_details[0]["full_name"])[0];  ?> </name>
                  </span>
                  <span class="fa fa-caret-down hidden-xs mr15"></span>
                  <img src="admin_image/<?php echo $admin_details[0]["image"]; ?>" alt="avatar" class="mw55">
               </a>
               <ul class="dropdown-menu list-group keep-dropdown w250" role="menu">
                  <!-- <li class="dropdown-header clearfix">
                     <div class="pull-left ml10">
                     <select id="user-status">
                     <optgroup label="Current Status:">
                     <option value="1-1">Away</option>
                     <option value="1-2">Busy</option>
                     <option value="1-3" selected="selected">Online</option>
                     <option value="1-4">Offline</option>
                     </optgroup>
                     </select>
                     </div>
                     <div class="pull-right mr10">
                     <select id="user-role">
                     <optgroup label="Logged in As:">
                     <option value="1-1" selected="selected">Admin</option>
                     <option value="1-2">Editor</option>
                     <option value="1-3">User</option>
                     </optgroup>
                     </select>
                     </div>
                     </li> -->
                  <li class="list-group-item">
                     <a href="transfer_to_vendor.php" class="animated animated-short fadeInUp">
                     <span class="fa fa-bell"></span> Pending Shipment
                     </a>
                  </li>
                  <li class="dropdown-footer text-center">
                     <a href="logout.php" class="btn btn-primary btn-sm btn-bordered">
                     <span class="fa fa-power-off pr5"></span> Logout </a>
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
                     <img src="admin_image/<?php echo $admin_details[0]["image"]; ?>" class="img-responsive">
                     </a>
                     <div class="media-body">
                        <div class="media-links">
                           <a href="#" class="sidebar-menu-toggle"></a> <a href="logout.php">Logout</a>
                        </div>
                        <div class="media-author">  <?php  echo explode(" ",$admin_details[0]["full_name"])[0];  ?>  </div>
                     </div>
                  </div>
               </div>
            </header>
            <ul class="nav sidebar-menu">
               <li class="sidebar-label pt30">Menu</li>
               <!-- <li class="active"> -->
               <li class="<?php if($_SESSION["main_menu"] == "dashboard") echo "active";?>">
                  <!-- <a class="accordion-toggle menu-open" href="#"> -->
                  <a class="accordion-toggle <?php if($_SESSION["main_menu"] == "dashboard") echo "menu-open";?>" href="#">
                  <span class="fa fa-dashboard"></span>
                  <span class="sidebar-title">Dashboard</span>
                  <span class="caret"></span>
                  </a>
                  <ul class="nav sub-nav">
                     <li class="<?php if($_SESSION["sub_menu"] == "add_account") echo "active";?>">
                        <a href="add_account.php">
                        <span class="fa fa-file-text-o"></span>Add Bank Account </a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "membershipPlan") echo "active";?>">
                        <a href="membershipPlan.php">
                        <span class="fa fa-file-text-o"></span>Add Membership </a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "add_payment_method") echo "active";?>">
                        <a href="add_payment_method.php">
                        <span class="fa fa-file-text-o"></span>Add Payment Method </a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "add_product_by_excel") echo "active";?>">
                        <a href="add_product_by_excel.php">
                        <span class="fa fa-file-text-o"></span>Add product by excel file </a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "add_coupon") echo "active";?>">
                        <a href="add_coupon.php">
                        <span class="fa fa-file-text-o"></span>Add Coupon </a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "add_product") echo "active";?>">
                        <a href="add_product.php">
                        <span class="fa fa-file-text-o"></span>Add Product </a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "transfer_to_vendor") echo "active";?>">
                        <a href="transfer_to_vendor.php">
                        <span class="fa fa-file-text-o"></span>Transfer Money</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "transfer_auction_money") echo "active";?>">
                        <a href="transfer_auction_money.php">
                        <span class="fa fa-file-text-o"></span>Transfer Auction Money</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "withdraw_request") echo "active";?>">
                        <a href="withdraw_request.php">
                        <span class="fa fa-file-text-o"></span>Withdraw Request</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "return_product") echo "active";?>">
                        <a href="return_product.php">
                        <span class="fa fa-file-text-o"></span>Return Product</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "send_mail_structure") echo "active";?>">
                        <a href="send_mail_structure.php">
                        <span class="fa fa-file-text-o"></span>Mail Structure</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "change_password") echo "active";?>">
                        <a href="change_password.php">
                        <span class="fa fa-file-text-o"></span>Change Password</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "add_currency") echo "active";?>">
                        <a href="add_currency.php">
                        <span class="fa fa-file-text-o"></span>Add Currency</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "sale_report") echo "active";?>">
                        <a href="sale_report.php">
                        <span class="fa fa-file-text-o"></span>Sales report</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "report") echo "active";?>">
                        <a href="report.php">
                        <span class="fa fa-file-text-o"></span>Report</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "move_stock") echo "active";?>">
                        <a href="move_stock.php">
                        <span class="fa fa-file-text-o"></span>Move Stock</a>
                     </li>
                  </ul>
               </li>
               <li class="sidebar-label pt25">Listing</li>
               <li class="<?php if($_SESSION["main_menu"] == "product") echo "active";?>">
                  <a class="accordion-toggle <?php if($_SESSION["main_menu"] == "product") echo "menu-open";?>" href="#">
                  <span class="fa fa-share-square-o"></span>
                  <span class="sidebar-title">Product</span>
                  <span class="caret"></span>
                  </a>
                  <ul class="nav sub-nav">
                     <li class="<?php if($_SESSION["sub_menu"] == "product_listing") echo "active";?>">
                        <a href="product_listing.php">
                        <span class="fa fa-file-text-o"></span> Product Listing</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "product_sale_report") echo "active";?>">
                        <a href="product_sale_report.php">
                        <span class="fa fa-file-text-o"></span> Product Sale Report</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "product_return_report") echo "active";?>">
                        <a href="product_return_report.php">
                        <span class="fa fa-file-text-o"></span> Product Return Report</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "product_stock_report") echo "active";?>">
                        <a href="product_stock_report.php">
                        <span class="fa fa-file-text-o"></span> Product Stock Report</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "sale_amount_report") echo "active";?>">
                        <a href="sale_amount_report.php">
                        <span class="fa fa-file-text-o"></span> Product Sale Amount Report</a>
                     </li>
                  </ul>
               </li>
               <li class="<?php if($_SESSION["main_menu"] == "vendor") echo "active";?>">
                  <a class="accordion-toggle <?php if($_SESSION["main_menu"] == "vendor") echo "menu-open";?>" href="#">
                  <span class="fa fa-share-square-o"></span>
                  <span class="sidebar-title">Vendor</span>
                  <span class="caret"></span>
                  </a>
                  <ul class="nav sub-nav">
                     <li class="<?php if($_SESSION["sub_menu"] == "vendor_listing") echo "active";?>">
                        <a href="vendor_listing.php">
                        <span class="fa fa-file-text-o"></span>Vendor Listing</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "add_vendor") echo "active";?>">
                        <a href="add_vendor.php">
                        <span class="fa fa-file-text-o"></span>Add Vendor</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "change_vendor_password") echo "active";?>">
                        <a href="change_vendor_password.php">
                        <span class="fa fa-file-text-o"></span>Change Vendor's Password</a>
                     </li>
                  </ul>
               </li>
               <li class="<?php if($_SESSION["main_menu"] == "customer") echo "active";?>">
                  <a class="accordion-toggle <?php if($_SESSION["main_menu"] == "customer") echo "menu-open";?>" href="#">
                  <span class="fa fa-share-square-o"></span>
                  <span class="sidebar-title">Customer</span>
                  <span class="caret"></span>
                  </a>
                  <ul class="nav sub-nav">
                     <li class="<?php if($_SESSION["sub_menu"] == "customer_listing") echo "active";?>">
                        <a href="customer_listing.php">
                        <span class="fa fa-file-text-o"></span>Customer Listing</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "change_customer_password") echo "active";?>">
                        <a href="change_customer_password.php">
                        <span class="fa fa-file-text-o"></span>Change Customer's Password</a>
                     </li>
                  </ul>
               </li>
               <li class="<?php if($_SESSION["main_menu"] == "approval") echo "active";?>">
                  <a class="accordion-toggle <?php if($_SESSION["main_menu"] == "approval") echo "menu-open";?>" href="#">
                  <span class="fa fa-desktop"></span>
                  <span class="sidebar-title">Approval</span>
                  <span class="caret"></span>
                  </a>
                  <ul class="nav sub-nav">
                     <li class="<?php if($_SESSION["sub_menu"] == "gallery") echo "active";?>">
                        <a href="gallery.php">
                        <span class="fa fa-file-text-o"></span>Pending Photo </a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "review_approve") echo "active";?>">
                        <a href="review_approve.php">
                        <span class="fa fa-file-text-o"></span>Approve Review </a>
                     </li>  
                     <li class="<?php if($_SESSION["sub_menu"] == "reward_approve") echo "active";?>">
                        <a href="reward_approve.php">
                        <span class="fa fa-file-text-o"></span>Rewards </a>
                     </li>
                  </ul>
               </li>
               <li class="<?php if($_SESSION["main_menu"] == "add_features") echo "active";?>">
                  <a class="accordion-toggle <?php if($_SESSION["main_menu"] == "add_features") echo "menu-open";?>" href="#">
                  <span class="fa fa-wrench"></span>
                  <span class="sidebar-title">Add Features</span>
                  <span class="caret"></span>
                  </a>
                  <ul class="nav sub-nav">
                     <li class="<?php if($_SESSION["sub_menu"] == "add_country") echo "active";?>">
                        <a href="add_country.php">
                        <span class="fa fa-file-text-o"></span>Add Country City</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "add_category") echo "active";?>">
                        <a href="add_category.php">
                        <span class="fa fa-file-text-o"></span>Form Settings</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "add_color") echo "active";?>">
                        <a href="add_color.php">
                        <span class="fa fa-file-text-o"></span>Add Color</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "add_weight_unit") echo "active";?>">
                        <a href="add_weight_unit.php">
                        <span class="fa fa-file-text-o"></span>Add Weight Unit</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "add_size_unit") echo "active";?>">
                        <a href="add_size_unit.php">
                        <span class="fa fa-file-text-o"></span>Add Size Unit</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "add_brand") echo "active";?>">
                        <a href="add_brand.php">
                        <span class="fa fa-file-text-o"></span>Add Product Brand</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "add_best_story") echo "active";?>">
                        <a href="add_best_story.php">
                        <span class="fa fa-file-text-o"></span>Add Best Story</a>
                     </li>
                  </ul>
               </li>
               <li>
               </li>
               <li class="sidebar-label pt30">Tools</li>
               <li class="<?php if($_SESSION["main_menu"] == "home_setting") echo "active";?>">
                  <a class="accordion-toggle <?php if($_SESSION["main_menu"] == "home_setting") echo "menu-open";?>" href="#">
                  <span class="fa fa-cogs"></span>
                  <span class="sidebar-title">Home &nbsp Settings</span>
                  <span class="caret"></span>
                  </a>
                  <ul class="nav sub-nav">
                     <li class="<?php if($_SESSION["sub_menu"] == "add_slider") echo "active";?>">
                        <a href="add_slider.php">
                        <span class="fa fa-file-text-o"></span> Add Slider </a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "add_banner") echo "active";?>">
                        <a href="add_banner.php">
                        <span class="fa fa-file-text-o"></span>Add Banner </a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "add_features") echo "active";?>">
                        <a href="add_features.php">
                        <span class="fa fa-file-text-o"></span>Add Features</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "add_advertisement") echo "active";?>">
                        <a href="add_advertisement.php">
                        <span class="fa fa-file-text-o"></span>Add Advertisement</a>
                     </li>
                  </ul>
               </li>
               <li class="<?php if($_SESSION["main_menu"] == "footer_setting") echo "active";?>">
                  <a class="accordion-toggle <?php if($_SESSION["main_menu"] == "footer_setting") echo "menu-open";?>" href="#">
                  <span class="fa fa-cogs"></span>
                  <span class="sidebar-title">Footer &nbsp Settings</span>
                  <span class="caret"></span>
                  </a>
                  <ul class="nav sub-nav">
                     <li class="<?php if($_SESSION["sub_menu"] == "add_faq") echo "active";?>">
                        <a href="add_faq.php">
                        <span class="fa fa-file-text-o"></span> Add FAQ </a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "terms_services") echo "active";?>">
                        <a href="terms_services.php">
                        <span class="fa fa-file-text-o"></span>Add Terms & Conditions </a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "about_us") echo "active";?>">
                        <a href="about_us.php">
                        <span class="fa fa-file-text-o"></span>Add About Us</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "how_it_works") echo "active";?>">
                        <a href="how_it_works.php">
                        <span class="fa fa-file-text-o"></span>How It Works</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "for_buyers") echo "active";?>">
                        <a href="for_buyers.php">
                        <span class="fa fa-file-text-o"></span>For Buyers</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "for_sellers") echo "active";?>">
                        <a href="for_sellers.php">
                        <span class="fa fa-file-text-o"></span>For Sellers</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "blog") echo "active";?>">
                        <a href="blog.php">
                        <span class="fa fa-file-text-o"></span>Blog</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "contact_us") echo "active";?>">
                        <a href="contact_us.php">
                        <span class="fa fa-file-text-o"></span>Add Contact Us</a>
                     </li>
                  </ul>
               </li>
               <li class="<?php if($_SESSION["main_menu"] == "site_setting") echo "active";?>">
                  <a class="accordion-toggle <?php if($_SESSION["main_menu"] == "site_setting") echo "menu-open";?>" href="#">
                  <span class="fa fa-cogs"></span>
                  <span class="sidebar-title">Site &nbsp Settings</span>
                  <span class="caret"></span>
                  </a>
                  <ul class="nav sub-nav">
                     <li class="<?php if($_SESSION["sub_menu"] == "siteSettings") echo "active";?>">
                        <a href="siteSettings.php">
                        <span class="fa fa-file-text-o"></span>Client Site Settings</a>
                     </li>
                     <li class="<?php if($_SESSION["sub_menu"] == "admin_settings") echo "active";?>">
                        <a href="admin_settings.php">
                        <span class="fa fa-file-text-o"></span>Admin Site Settings</a>
                     </li>
                  </ul>
               </li>
               <br/>
            </ul>
            <div class="sidebar-toggler">
               <a href="#">
               <span class="fa fa-arrow-circle-o-left"></span>
               </a>
            </div>
         </div>
      </aside>


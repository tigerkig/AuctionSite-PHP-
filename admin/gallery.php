

<?php
   session_start();
   require_once("function.php");
   $target_page=base64_encode(basename($_SERVER["SCRIPT_FILENAME"]).'?'.$_SERVER['QUERY_STRING']);
   $_SESSION["target_page"]=$target_page;
   if(isset($_SESSION["id"]) && $_SESSION["username"]){
   $admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
   
   $_SESSION["main_menu"] = "approval";
   $_SESSION["sub_menu"]  = "gallery";
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Admin Panel</title>
      <meta name="keywords" content="Admin Panel" />
      <meta name="description" content="Admin Panel">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
      <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="assets/js/plugins/magnific/magnific-popup.css">
      <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">
      <link rel="stylesheet" type="text/css" href="assets/allcp/forms/css/forms.css">
      <link rel="shortcut icon" href="assets/img/favicon.ico">
      <script type="text/javascript">
         function pending_photo() {
         	window.location = "gallery.php";
         }
         
         function return_notification() {
         	window.location = "return_product.php";
         }
         
         function all_properties() {
         	window.location = "product_listing.php";
         }
         
         function go_to_home() {
         	window.location = "index.php";
         }
         
         function notification() {
         	window.location = "withdraw_request.php";
         }
      </script>
      <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="basic-gallery">
      <div id="main">
         <header class="navbar navbar-fixed-top bg-dark">
            <div class="navbar-logo-wrapper">
               <a class="navbar-logo-text" href="index.php"> <b>admin panel</b> </a> <span id="sidebar_left_toggle" class="ad ad-lines"></span> 
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
                  <a class="navbar-fullscreen toggle-active" href="#"> <span class="glyphicon glyphicon-fullscreen"></span> </a>
               </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li class="hidden-xs">
                  <div class="navbar-btn btn-group">
                     <button class="btn dropdown-toggle" onclick="go_to_home();" title="Home"> <span class="fa fa-home fs20 text-info"></span> </button>
                  </div>
               </li>
               <li class="hidden-xs">
                  <div class="navbar-btn btn-group">
                     <button class="btn dropdown-toggle" onclick="pending_photo();" title="Pending Photo"> <span class="fa fa-camera fs20 text-info"></span> </button>
                  </div>
               </li>
               <li class="dropdown dropdown-fuse">
                  <div class="navbar-btn btn-group">
                     <button class="btn dropdown-toggle" onclick="all_properties();" title="All Product"> <span class="fa fa-th-large fs20 text-info"></span> </button>
                  </div>
               </li>
               <li class="dropdown dropdown-fuse">
                  <div class="navbar-btn btn-group">
                     <button class="btn dropdown-toggle" onclick="notification();" title="Withdraw Request">
                     <?php
                        $notification=getDetails(doSelect("COUNT(*) as notification","ambit_withdraw",array("view_status"=>0)));
                        $notification=$notification[0]["notification"]; 
                        ?> <span class="fa fa-bell fs20 text-info"></span>
                     <?php
                        if($notification > 0){
                        ?> <font color="red">(<?php  echo $notification; ?>) &nbsp</font>
                     <?php
                        }
                        ?>
                     </button>
                  </div>
               </li>
               <li class="dropdown dropdown-fuse">
                  <div class="navbar-btn btn-group">
                     <button class="btn dropdown-toggle" onclick="return_notification();" title="Product Return">
                     <?php
                        $notification1=getDetails(doSelect("COUNT(*) as notification","ambit_return_product",array("status"=>0)));
                        $notification1=$notification1[0]["notification"]; 
                        ?> <span class="fa fa-bell-slash-o fs20 text-info"></span>
                     <?php
                        if($notification1 > 0){
                        ?> <font color="red">(<?php  echo $notification1; ?>) &nbsp</font>
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
                     <span class="fa fa-caret-down hidden-xs mr15"></span> <img src="admin_image/<?php echo $admin_details[0][" image "]; ?>" alt="avatar" class="mw55"> 
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
                        <a href="transfer_to_vendor.php" class="animated animated-short fadeInUp"> <span class="fa fa-bell"></span> Pending Shipment </a>
                     </li>
                     <li class="dropdown-footer text-center">
                        <a href="logout.php" class="btn btn-primary btn-sm btn-bordered"> <span class="fa fa-power-off pr5"></span> Logout </a>
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
                           <div class="media-author">
                              <?php  echo explode(" ",$admin_details[0]["full_name"])[0];  ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </header>
               <ul class="nav sidebar-menu">
                  <li class="sidebar-label pt30">Menu</li>
                  <!-- <li class="active"> -->
                  <li class="<?php if($_SESSION[" main_menu "] == "dashboard ") echo "active ";?>">
                     <!-- <a class="accordion-toggle menu-open" href="#"> -->
                     <a class="accordion-toggle <?php if($_SESSION[" main_menu "] == "dashboard ") echo "menu-open ";?>" href="#"> <span class="fa fa-dashboard"></span> <span class="sidebar-title">Dashboard</span> <span class="caret"></span> </a>
                     <ul class="nav sub-nav">
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_account ") echo "active ";?>">
                           <a href="add_account.php"> <span class="fa fa-file-text-o"></span>Add Bank Account </a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "membershipPlan ") echo "active ";?>">
                           <a href="membershipPlan.php"> <span class="fa fa-file-text-o"></span>Add Membership </a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_payment_method ") echo "active ";?>">
                           <a href="add_payment_method.php"> <span class="fa fa-file-text-o"></span>Add Payment Method </a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_product_by_excel ") echo "active ";?>">
                           <a href="add_product_by_excel.php"> <span class="fa fa-file-text-o"></span>Add product by excel file </a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_coupon ") echo "active ";?>">
                           <a href="add_coupon.php"> <span class="fa fa-file-text-o"></span>Add Coupon </a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_product ") echo "active ";?>">
                           <a href="add_product.php"> <span class="fa fa-file-text-o"></span>Add Product </a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "transfer_to_vendor ") echo "active ";?>">
                           <a href="transfer_to_vendor.php"> <span class="fa fa-file-text-o"></span>Transfer Money</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "transfer_auction_money ") echo "active ";?>">
                           <a href="transfer_auction_money.php"> <span class="fa fa-file-text-o"></span>Transfer Auction Money</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "withdraw_request ") echo "active ";?>">
                           <a href="withdraw_request.php"> <span class="fa fa-file-text-o"></span>Withdraw Request</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "return_product ") echo "active ";?>">
                           <a href="return_product.php"> <span class="fa fa-file-text-o"></span>Return Product</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "send_mail_structure ") echo "active ";?>">
                           <a href="send_mail_structure.php"> <span class="fa fa-file-text-o"></span>Mail Structure</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "change_password ") echo "active ";?>">
                           <a href="change_password.php"> <span class="fa fa-file-text-o"></span>Change Password</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_currency ") echo "active ";?>">
                           <a href="add_currency.php"> <span class="fa fa-file-text-o"></span>Add Currency</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "sale_report ") echo "active ";?>">
                           <a href="sale_report.php"> <span class="fa fa-file-text-o"></span>Sales report</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "report ") echo "active ";?>">
                           <a href="report.php"> <span class="fa fa-file-text-o"></span>Report</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "move_stock ") echo "active ";?>">
                           <a href="move_stock.php"> <span class="fa fa-file-text-o"></span>Move Stock</a>
                        </li>
                     </ul>
                  </li>
                  <li class="sidebar-label pt25">Listing</li>
                  <li class="<?php if($_SESSION[" main_menu "] == "product ") echo "active ";?>">
                     <a class="accordion-toggle <?php if($_SESSION[" main_menu "] == "product ") echo "menu-open ";?>" href="#"> <span class="fa fa-share-square-o"></span> <span class="sidebar-title">Product</span> <span class="caret"></span> </a>
                     <ul class="nav sub-nav">
                        <li class="<?php if($_SESSION[" sub_menu "] == "product_listing ") echo "active ";?>">
                           <a href="product_listing.php"> <span class="fa fa-file-text-o"></span> Product Listing</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "product_sale_report ") echo "active ";?>">
                           <a href="product_sale_report.php"> <span class="fa fa-file-text-o"></span> Product Sale Report</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "product_return_report ") echo "active ";?>">
                           <a href="product_return_report.php"> <span class="fa fa-file-text-o"></span> Product Return Report</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "product_stock_report ") echo "active ";?>">
                           <a href="product_stock_report.php"> <span class="fa fa-file-text-o"></span> Product Stock Report</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "sale_amount_report ") echo "active ";?>">
                           <a href="sale_amount_report.php"> <span class="fa fa-file-text-o"></span> Product Sale Amount Report</a>
                        </li>
                     </ul>
                  </li>
                  <li class="<?php if($_SESSION[" main_menu "] == "vendor ") echo "active ";?>">
                     <a class="accordion-toggle <?php if($_SESSION[" main_menu "] == "vendor ") echo "menu-open ";?>" href="#"> <span class="fa fa-share-square-o"></span> <span class="sidebar-title">Vendor</span> <span class="caret"></span> </a>
                     <ul class="nav sub-nav">
                        <li class="<?php if($_SESSION[" sub_menu "] == "vendor_listing ") echo "active ";?>">
                           <a href="vendor_listing.php"> <span class="fa fa-file-text-o"></span>Vendor Listing</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_vendor ") echo "active ";?>">
                           <a href="add_vendor.php"> <span class="fa fa-file-text-o"></span>Add Vendor</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "change_vendor_password ") echo "active ";?>">
                           <a href="change_vendor_password.php"> <span class="fa fa-file-text-o"></span>Change Vendor's Password</a>
                        </li>
                     </ul>
                  </li>
                  <li class="<?php if($_SESSION[" main_menu "] == "customer ") echo "active ";?>">
                     <a class="accordion-toggle <?php if($_SESSION[" main_menu "] == "customer ") echo "menu-open ";?>" href="#"> <span class="fa fa-share-square-o"></span> <span class="sidebar-title">Customer</span> <span class="caret"></span> </a>
                     <ul class="nav sub-nav">
                        <li class="<?php if($_SESSION[" sub_menu "] == "customer_listing ") echo "active ";?>">
                           <a href="customer_listing.php"> <span class="fa fa-file-text-o"></span>Customer Listing</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "change_customer_password ") echo "active ";?>">
                           <a href="change_customer_password.php"> <span class="fa fa-file-text-o"></span>Change Customer's Password</a>
                        </li>
                     </ul>
                  </li>
                  <li class="<?php if($_SESSION[" main_menu "] == "approval ") echo "active ";?>">
                     <a class="accordion-toggle <?php if($_SESSION[" main_menu "] == "approval ") echo "menu-open ";?>" href="#"> <span class="fa fa-desktop"></span> <span class="sidebar-title">Approval</span> <span class="caret"></span> </a>
                     <ul class="nav sub-nav">
                        <li class="<?php if($_SESSION[" sub_menu "] == "gallery ") echo "active ";?>">
                           <a href="gallery.php"> <span class="fa fa-file-text-o"></span>Pending Photo </a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "review_approve ") echo "active ";?>">
                           <a href="review_approve.php"> <span class="fa fa-file-text-o"></span>Approve Review </a>
                        </li>
                     </ul>
                  </li>
                  <li class="<?php if($_SESSION[" main_menu "] == "add_features ") echo "active ";?>">
                     <a class="accordion-toggle <?php if($_SESSION[" main_menu "] == "add_features ") echo "menu-open ";?>" href="#"> <span class="fa fa-wrench"></span> <span class="sidebar-title">Add Features</span> <span class="caret"></span> </a>
                     <ul class="nav sub-nav">
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_country ") echo "active ";?>">
                           <a href="add_country.php"> <span class="fa fa-file-text-o"></span>Add Country City</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_category ") echo "active ";?>">
                           <a href="add_category.php"> <span class="fa fa-file-text-o"></span>Form Settings</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_color ") echo "active ";?>">
                           <a href="add_color.php"> <span class="fa fa-file-text-o"></span>Add Color</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_weight_unit ") echo "active ";?>">
                           <a href="add_weight_unit.php"> <span class="fa fa-file-text-o"></span>Add Weight Unit</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_size_unit ") echo "active ";?>">
                           <a href="add_size_unit.php"> <span class="fa fa-file-text-o"></span>Add Size Unit</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_brand ") echo "active ";?>">
                           <a href="add_brand.php"> <span class="fa fa-file-text-o"></span>Add Product Brand</a>
                        </li>
                     </ul>
                  </li>
                  <li> </li>
                  <li class="sidebar-label pt30">Tools</li>
                  <li class="<?php if($_SESSION[" main_menu "] == "home_setting ") echo "active ";?>">
                     <a class="accordion-toggle <?php if($_SESSION[" main_menu "] == "home_setting ") echo "menu-open ";?>" href="#"> <span class="fa fa-cogs"></span> <span class="sidebar-title">Home &nbsp Settings</span> <span class="caret"></span> </a>
                     <ul class="nav sub-nav">
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_slider ") echo "active ";?>">
                           <a href="add_slider.php"> <span class="fa fa-file-text-o"></span> Add Slider </a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_banner ") echo "active ";?>">
                           <a href="add_banner.php"> <span class="fa fa-file-text-o"></span>Add Banner </a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_features ") echo "active ";?>">
                           <a href="add_features.php"> <span class="fa fa-file-text-o"></span>Add Features</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_advertisement ") echo "active ";?>">
                           <a href="add_advertisement.php"> <span class="fa fa-file-text-o"></span>Add Advertisement</a>
                        </li>
                     </ul>
                  </li>
                  <li class="<?php if($_SESSION[" main_menu "] == "footer_setting ") echo "active ";?>">
                     <a class="accordion-toggle <?php if($_SESSION[" main_menu "] == "footer_setting ") echo "menu-open ";?>" href="#"> <span class="fa fa-cogs"></span> <span class="sidebar-title">Footer &nbsp Settings</span> <span class="caret"></span> </a>
                     <ul class="nav sub-nav">
                        <li class="<?php if($_SESSION[" sub_menu "] == "add_faq ") echo "active ";?>">
                           <a href="add_faq.php"> <span class="fa fa-file-text-o"></span> Add FAQ </a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "terms_services ") echo "active ";?>">
                           <a href="terms_services.php"> <span class="fa fa-file-text-o"></span>Add Terms & Conditions </a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "about_us ") echo "active ";?>">
                           <a href="about_us.php"> <span class="fa fa-file-text-o"></span>Add About Us</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "how_it_works ") echo "active ";?>">
                           <a href="how_it_works.php"> <span class="fa fa-file-text-o"></span>How It Works</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "for_buyers ") echo "active ";?>">
                           <a href="for_buyers.php"> <span class="fa fa-file-text-o"></span>For Buyers</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "for_sellers ") echo "active ";?>">
                           <a href="for_sellers.php"> <span class="fa fa-file-text-o"></span>For Sellers</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "blog ") echo "active ";?>">
                           <a href="blog.php"> <span class="fa fa-file-text-o"></span>Blog</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "contact_us ") echo "active ";?>">
                           <a href="contact_us.php"> <span class="fa fa-file-text-o"></span>Add Contact Us</a>
                        </li>
                     </ul>
                  </li>
                  <li class="<?php if($_SESSION[" main_menu "] == "site_setting ") echo "active ";?>">
                     <a class="accordion-toggle <?php if($_SESSION[" main_menu "] == "site_setting ") echo "menu-open ";?>" href="#"> <span class="fa fa-cogs"></span> <span class="sidebar-title">Site &nbsp Settings</span> <span class="caret"></span> </a>
                     <ul class="nav sub-nav">
                        <li class="<?php if($_SESSION[" sub_menu "] == "siteSettings ") echo "active ";?>">
                           <a href="siteSettings.php"> <span class="fa fa-file-text-o"></span>Client Site Settings</a>
                        </li>
                        <li class="<?php if($_SESSION[" sub_menu "] == "admin_settings ") echo "active ";?>">
                           <a href="admin_settings.php"> <span class="fa fa-file-text-o"></span>Admin Site Settings</a>
                        </li>
                     </ul>
                  </li>
                  <br/> 
               </ul>
               <div class="sidebar-toggler">
                  <a href="#"> <span class="fa fa-arrow-circle-o-left"></span> </a>
               </div>
            </div>
         </aside>
         <section id="content_wrapper">
            <header id="topbar" class="alt">
               <div class="topbar-left">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-icon">
                        <a href="index.php"> <span class="fa fa-home"></span> </a>
                     </li>
                     <li class="breadcrumb-active"> <a href="index.php">Dashboard</a> </li>
                     <li class="breadcrumb-link"> <a href="index.php">Home</a> </li>
                     <li class="breadcrumb-current-item">Gallery</li>
                  </ol>
               </div>
               <!-- <div class="topbar-right">
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
                  </div> -->
            </header>
            <section id="content" class="table-layout animated fadeIn">
               <div class="chute chute-center">
                  <div class="mh15 pv15 br-b br-light">
                     <div class="row">
                        <div class="col-xs-7">
                           <div class="mixitup-controls ib">
                              <form class="controls" id="select-filters">
                                 <div class="btn-group ib mr10">
                                    <button type="button" class="btn btn-default hidden-xs"> <span class="fa fa-folder"></span> </button>
                                    <div class="btn-group mb5">
                                       <fieldset>
                                          <select id="filter1">
                                             <option value="">All Photos</option>
                                             <option value=".folder2">Product Photo</option>
                                             <!-- <option value=".folder3">Folder 3</option> -->
                                          </select>
                                       </fieldset>
                                    </div>
                                 </div>
                                 <div class="btn-group ib mr10 mb5"> </div>
                              </form>
                           </div>
                        </div>
                        <div class="col-xs-5 text-right">
                           <button type="button" id="mixitup-reset" class="btn btn-default mb5 mr5">Clear Filters</button>
                           <div class="btn-group mb5">
                              <button type="button" class="btn btn-default to-grid"> <span class="fa fa-th"></span> </button>
                              <button type="button" class="btn btn-default to-list"> <span class="fa fa-navicon"></span> </button>
                           </div>
                        </div>
                     </div>
                     <div class="mixitup-controls hidden">
                        <form class="controls allcp-form" id="checkbox-filters">
                           <fieldset class="">
                              <h4>Cars</h4>
                              <label class="option block mt10">
                              <input type="checkbox" value=".circle"> <span class="checkbox"></span>Circle </label>
                           </fieldset>
                           <button id="mixitup-reset2">Clear All</button>
                        </form>
                     </div>
                  </div>
                  <div id="mixitup-container">
                     <div class="filter-error-message"> <span>No items were found matching the selected filters</span> </div>
                     <?php
                        if(isset($_GET["id"])){
                        $pro_photo=getDetails(doSelect1("api_id,image,status,api_apa_id","ambit_product_image",array("api_apa_id"=>$_GET["id"])));
                        }else{
                        $pro_photo=getDetails(doSelect1("api_id,image,status,api_apa_id","ambit_product_image",array("status"=>0)));
                        }
                        foreach($pro_photo as $k=>$v){
                        ?>
                     <div class="mix folder2">
                        <div class="panel p6 pbn">
                           <div class="of-h">
                              <img src="../vendor/product_photo/<?php echo $v["image"];  ?>" class="img-responsive" title="<?php  echo getProductName($v["api_apa_id"]); ?>" width="200" height="200" style="cursor:zoom-in;">
                              <a href="javascript:void(0);" onclick="delete_image('<?php echo $v[" api_id "];  ?>');" title="Delete"><img src="icon/cross.png" style="position: absolute; top:100; right: 100;height:20px;width:20px;" /></a>
                              <h6><a href="javascript:void(0);" onclick="approve_image('<?php echo $v["api_id"];  ?>');" title="Approved"><img src="icon/tick.png" style="position: absolute; top:0; left: 0;height:20px;width:20px;" /></a></h6>
                              <div class="row table-layout">
                                 <div class="col-xs-8 va-m pln">
                                    <h6><?php  echo getProductName($v["api_apa_id"]); ?></h6>
                                 </div>
                                 <div class="col-xs-4 text-right va-m prn">
                                    <a href="javascript:void(0)" title=" <?php if($v[" status "]==0)echo ' Not Approved ';else echo 'Approved';  ?> "><span class="fa fa-circle fs10 <?php if($v["status"]==0)echo ' text-danger ';  ?> ml10"></span></a>
                                    <!-- text-danger for red icon -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php
                        }
                        ?>
                     <script type="text/javascript">
                        function approve_image(api_id) {
                        	//alert(api_id);
                        	$.post("photo_approve.php", {
                        		api_id: api_id
                        	}, function(r) {
                        		if(r == 1) {
                        			window.location = "<?php echo $_SERVER['REQUEST_URI'];  ?>";
                        		}
                        	});
                        }
                        
                        function delete_image(api_id) {
                        	$.post("photo_delete.php", {
                        		api_id: api_id
                        	}, function(r) {
                        		if(r == 1) {
                        			window.location = "<?php echo $_SERVER['REQUEST_URI'];  ?>";
                        		} else {
                        			window.location = "<?php echo $_SERVER['REQUEST_URI'];  ?>";
                        		}
                        	});
                        }
                     </script>
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
                     <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%"> <span class="fs11">New visitors</span> </div>
                  </div>
                  <div class="progress mh5">
                     <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%"> <span class="fs11 text-left">Returnig visitors</span> </div>
                  </div>
                  <div class="progress mh5">
                     <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%"> <span class="fs11 text-left">Orders</span> </div>
                  </div>
                  <h6 class="title-divider text-muted mt30 mb10">New visitors</h6>
                  <div class="row">
                     <div class="col-xs-5">
                        <h3 class="text-primary mn pl5">350</h3>
                     </div>
                     <div class="col-xs-7 text-right">
                        <h3 class="text-warning mn">
                           <i class="fa fa-caret-down"></i> 15.7% 
                        </h3>
                     </div>
                  </div>
                  <h6 class="title-divider text-muted mt25 mb10">Returnig visitors</h6>
                  <div class="row">
                     <div class="col-xs-5">
                        <h3 class="text-primary mn pl5">660</h3>
                     </div>
                     <div class="col-xs-7 text-right">
                        <h3 class="text-success-dark mn">
                           <i class="fa fa-caret-up"></i> 20.2% 
                        </h3>
                     </div>
                  </div>
                  <h6 class="title-divider text-muted mt25 mb10">Orders</h6>
                  <div class="row">
                     <div class="col-xs-5">
                        <h3 class="text-primary mn pl5">153</h3>
                     </div>
                     <div class="col-xs-7 text-right">
                        <h3 class="text-success mn">
                           <i class="fa fa-caret-up"></i> 5.3% 
                        </h3>
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
   }
   ?>


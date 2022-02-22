<?php
   session_start();
   require_once("function.php");
   if(isset($_SESSION["id"]) && $_SESSION["username"]){
   $admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
   
   $_SESSION["main_menu"] = "dashboard";
   $_SESSION["sub_menu"]  = "send_mail_structure";
   
   include("include/header.php");
   ?>
<script type="text/javascript">
   function error_border(id){
   	$("#"+id).css("border", "2px solid red");
   }
   	function update_validation(id){
   	var body=$("#field").val();
   	if(body.trim()==""){
   		alert("field is empty");
   		//$("#field").focus();
   		error_border('field');
   		return false;
   	}
   	$.post(
   		"update_mail_settings.php",
   		{mbs_id:id,body:body},
   		function(r){
   			//alert(r);
   			$("#ajax").html(r);
   		}
   		);
   	}
   
   
   function edit_mail_settings(id){
   	 $.post("edit_mail_settings.php",{id:id},function(r){
   	 $("#a"+id).html(r);
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
<div id="ajax">
   <section id="content" class="table-layout animated fadeIn">
      <div class="" id="register" role="tabpanel">
         <div class="panel">
            <div class="panel-heading">
               <span class="panel-title">
               Mail Body Structure
               </span>
            </div>
            <div class="panel-body pn" id="a1">
               <font color="blue">Mail Send To Vendor &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_mail_settings('1');"><img src="icon/edit.png" width="12" /></a>
               <p>
                  <?php  echo get_mail_settings(1); ?>
               </p>
            </div>
            <div class="panel-body pn" id="a2">
               <font color="blue">Mail Send To Admin &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_mail_settings('2');"><img src="icon/edit.png" width="12" /></a>
               <p>
                  <?php  echo get_mail_settings(2); ?>
               </p>
            </div>
            <div class="panel-body pn" id="a3">
               <font color="blue">Mail Send To Buyer &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_mail_settings('3');"><img src="icon/edit.png" width="12" /></a>
               <p>
                  <?php  echo get_mail_settings(3); ?>
               </p>
            </div>
            <div class="panel-body pn" id="a4">
               <font color="blue">After Shipping Mail Send To Buyer &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_mail_settings('4');"><img src="icon/edit.png" width="12" /></a>
               <p>
                  <?php  echo get_mail_settings(4); ?>
               </p>
            </div>
            <div class="panel-body pn" id="a5">
               <font color="blue">After Shipping Mail Send To Vendor &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_mail_settings('5');"><img src="icon/edit.png" width="12" /></a>
               <p>
                  <?php  echo get_mail_settings(5); ?>
               </p>
            </div>
            <div class="panel-body pn" id="a6">
               <font color="blue">After Verification Of The Takeover Of The Product By The Buyer &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_mail_settings('6');"><img src="icon/edit.png" width="12" /></a>
               <p>
                  <?php  echo get_mail_settings(6); ?>
               </p>
            </div
               >
            <div class="panel-body pn" id="a7">
               <font color="blue">After Sending a Request Of The Seller For The Withdrawal Of Money &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_mail_settings('7');"><img src="icon/edit.png" width="12" /></a>
               <p>
                  <?php  echo get_mail_settings(7); ?>
               </p>
            </div>
            <div class="panel-footer"></div>
         </div>
      </div>
   </section>
</div>
<!-- ajax div -->
<?php
   if(isset($_POST["update"])){
   	if(isset($_FILES["image"]["name"]) &&  $_FILES["image"]["name"] != "" && $_FILES["image"]["error"] == 0 ){
   		$image=$_FILES["image"]["name"];
   		doUpdate("site_settings",array("st_value"=>$image),array("st_id"=>$_POST["st_id"]));
   		$temp_image=$_FILES["image"]["tmp_name"];
   		move_uploaded_file($temp_image,"../ico/".$image);
   	}
   	echo '<script>window.location="siteSettings.php";</script>';
   }
   
   
   ?>
<?php
   require_once("include/footer.php");
   }else{
   	echo '<script>window.location="utility-login.php";</script>';
   }
   ?>


<?php
   session_start();
   require_once("function.php");
   if(isset($_SESSION["vendor_id"]) && $_SESSION["vendor_email"]){
   $vendor_details=getDetails(doSelect("*","vendor_registration",array("vr_id"=>$_SESSION["vendor_id"])));
   include("include/header.php");
   ?>
<script type="text/javascript">
   function validation(){
   var name=$("#name1").val();
   var pg_id=$("#pg_id").val();
   if(name.trim()==""){
   	alert("Please enter Account name");
   	$("#name1").focus();
   	return false;
   }
   if(pg_id.trim()==""){
   	alert("Please enter Account Id");
   	$("#pg_id").focus();
   	return false;
   }
   
   }
   
   
   function delete_account(id){
   	if(confirm("Do You Want To Delete This Buyer?")){
   	$.post("delete_account.php",{id:id,set:'delete_account'},function(r){
   	if(r==1){
   		alert("Delete Successfully");
   		window.location="add_account.php";
   	}
   	if(r==0){
   		alert("Something Went Wrong....");
   	}
   	});
   	}
   }
   	function edit_account(id){
   	$.post(
   		"edit_account.php",
   		{id:id},
   		function(r){
   			$("#for_edit_ajax").html(r);
   		}
   		);
   }
   
   function money_not_added(){
   	alert("Money Can not transfer due to shipment !");
   	return false;
   }
   
   function add_money(ass_id,ass_apa_id,money_transfer,ass_vr_id){
   	if(money_transfer.trim()==1){
   		alert("Money Allready Added to vendor account");
   		return false;
   	}
   	$.post(
   	"ajax_money_to_vendor.php",
   	{ass_id:ass_id,ass_apa_id:ass_apa_id,ass_vr_id:ass_vr_id},
   	function(r){
   		//alert(r);
   		if(r==1){
   			alert("Money added to vendor account");
   			window.location="transfer_to_vendor.php";
   		}
   		if(r==0){
   			alert("Something went wrong !");
   			window.location="transfer_to_vendor.php";
   		}
   	}
   	);
   }
   
   function change_status(id){
   	$.post(
   	"shipment_approve.php",
   	{ass_id:id},
   	function(r){
   		location.reload();
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
   <?php
      require_once("function.php");
      if(isset($_GET["ac_id"])){
      
      $details=getDetails(doSelect1("name,email,address,landmark,country,city,phone,post_code,status","ambit_customer",array("ac_id"=>$_GET["ac_id"])));
      
      foreach($details as $k=>$v){
      ?>
   <section id="content" class="table-layout animated fadeIn">
      <div class="" id="register" role="tabpanel">
         <div class="panel-heading">
            <span class="panel-title">
            Details &nbsp 
            </span>
         </div>
         <div class="panel">
            <div class="panel-body pn" id="ajax_heading">
               <font color="blue">Name</font>
               <p>
                  <?php echo ucfirst($v["name"]);  ?>
               </p>
            </div>
            <div class="panel-body pn" id="ajax_desc">
               <font color="blue">Email</font>
               <p>
                  <?php echo $v["email"];  ?>
               </p>
            </div>
            <div class="panel-body pn" id="ajax_desc">
               <font color="blue">Address</font>
               <p>
                  <?php  echo $v["address"]; ?>
               </p>
            </div>
            <div class="panel-body pn" id="ajax_desc">
               <font color="blue">Landmark</font>
               <p>
                  <?php
                     echo $v["landmark"];
                     ?>
               </p>
            </div>
            <div class="panel-body pn" id="ajax_desc">
               <font color="blue">Country</font>
               <p>
                  <?php
                     echo ucfirst($v["country"]);
                     ?>
               </p>
            </div>
            <div class="panel-body pn" id="ajax_desc">
               <font color="blue">City</font>
               <p>
                  <?php
                     echo ucfirst($v["city"]);
                     ?>
               </p>
            </div>
            <div class="panel-body pn" id="ajax_desc">
               <font color="blue">Phone</font>
               <p>
                  <?php
                     echo $v["phone"];
                     ?>
               </p>
            </div>
            <div class="panel-body pn" id="ajax_desc">
               <font color="blue">Post Code</font>
               <p>
                  <?php
                     echo $v["post_code"];
                     ?>
               </p>
            </div>
            <a href="index.php">Back</a>
            <div class="panel-footer"></div>
         </div>
         <hr/>
      </div>
   </section>
   <?php
      }
      }
      ?>
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
   //require_once("include/footer.php");
   }else{
   	echo '<script>window.location="vendor_login.php";</script>';
   }
   
   ?>


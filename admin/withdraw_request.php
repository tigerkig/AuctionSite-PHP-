<?php
   session_start();
   require_once("function.php");
   if(isset($_SESSION["id"]) && $_SESSION["username"]){
   $admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
   
   $_SESSION["main_menu"] = "dashboard";
   $_SESSION["sub_menu"]  = "withdraw_request";
   
   include("include/header.php");
   ?>
<script type="text/javascript">
   function show_details(aw_id){
   	window.location="withdraw_details.php?id="+aw_id;
   }
   function delete_vendor(vr_id){
   	 if(confirm("Are you sure , to delete User ???")){
   	$.post("delete_vendor.php",{vr_id:vr_id},function(r){
   		if(r==1){
   	window.location="vendor_listing.php";	
   }else{
   	alert("Something went wrong !");
   	}
   		}
   	);
   }
   }
</script>
<section id="content_wrapper">
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
   <section id="content" class="table-layout animated fadeIn">
      <div class="chute chute-center">
         <div class="row">
            <!--  -->
            <div class="col-md-12">
               <div class="panel panel-visible" id="spy6">
                  <div class="panel-heading">
                     <div class="panel-title hidden-xs">
                        Withdraw Request
                        <?php
                           $result=getDetails(doSelect("aw_id,aw_vr_id,aw_withdraw_amnt,view_status,request_date,bank_account_paypal_email,bank_routing_no","ambit_withdraw",array()));
                           
                           ?>
                     </div>
                  </div>
                  <div class="panel-body pn">
                     <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                           <thead>
                              <tr>
                                 <th class="va-m">Vendor Name</th>
                                 <th class="va-m">Amount</th>
                                 <th class="va-m">Request Date</th>
                                 <th class="va-m">Bank Account or Paypal Email</th>
                                 <!--<th class="va-m">Bank Email</th>-->
                                 <th class="va-m">Bank Routing No.</th>
                                 <th class="va-m">View & Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 foreach($result as $k=>$v){
                                 
                                 ?>
                              <tr>
                                 <td><a href="vendor_details.php?id=<?php echo $v["aw_vr_id"];  ?>" title="Show Vendor Details" style="color:blue;"><?php echo seeMoreDetails("fname","vendor_registration",array("vr_id"=>$v["aw_vr_id"]));  ?></a></td>
                                 <td><?php echo currency1(base_currency(),$v["aw_withdraw_amnt"]);  ?></td>
                                 <td><?php echo get_date_str($v["request_date"]);  ?></td>
                                 <td><?php echo $v["bank_account_paypal_email"];  ?></td>
                                 <td><?php echo $v["bank_routing_no"];  ?></td>
                                 <td><?php if($v["view_status"]==0) { ?> <a href="javascript:void(0);" onclick="show_details('<?php echo $v["aw_id"];  ?>');" title="View"><img src="icon/view.png" width="20" /></a><?php  }else{ ?><a href="javascript:void(0);" onclick="show_details('<?php echo $v["aw_id"];  ?>');" title="View"><img src="icon/views.png" width="20" /></a> <?php } ?></td>
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
   	echo '<script>window.location="utility-login.php";</script>';
   }
   ?>
<?php
   session_start();
   require_once("function.php");
   if(isset($_SESSION["id"]) && $_SESSION["username"]){
   $admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
   doUpdate("ambit_withdraw",array("view_status"=>1),array("aw_id"=>$_GET["id"]));
   include("include/header.php");
   ?>
<script type="text/javascript">
   function edit_product(id){
   	window.location='edit_product.php?id='+id;
   }
   function changeStatus(id,aw_vr_id){
   	 	if(confirm("Are you sure?")){
		   	$.post("transaction_approve.php",{aw_id:id,aw_vr_id:aw_vr_id},function(r){
		   		if(r==1){	   
				   	window.location="<?php  echo $_SERVER['REQUEST_URI']; ?>";	
				}else{
				   	alert("Something went wrong!");
			   	}
	   		});
   		}
   }
   function myFunction() {
      var key = $("#search").val();
      $.post("ajax_user_details.php",{key:key},function(r){
      	$("#ajax_field").html(r);
      });
   }
   
   function changeDate(id){
   	 	if(confirm("Are you sure?")){
   	 		var change_date = $("#date_" + id).val();
		   	$.post("ajax_withdraw_change_date.php",{aw_id:id,date:change_date},function(r){
		   		if(r==1){	   
				   	window.location="<?php  echo $_SERVER['REQUEST_URI']; ?>";	
				}else{
				   	alert("Something went wrong !");
				   	window.location="<?php  echo $_SERVER['REQUEST_URI']; ?>";
			   	}
	   		});
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
   <?php
      if(isset($_GET["id"])){
      
      $result=getDetails(doSelect("aw_id,aw_vr_id,aw_withdraw_amnt,view_status,request_date,bank_account_paypal_email,transaction_status, transaction_date","ambit_withdraw",array("aw_id"=>$_GET["id"])));
      }else{
      	$result=array();
      }
      ?>
   <section id="content" class="table-layout animated fadeIn">
      <div class="chute chute-center">
      <div class="row">
         <!--  -->
         <div class="col-md-12">
            <div id="ajax_field">
               <div class="panel panel-visible" id="spy6">
                  <?php
                     if(!empty($result)){
                     foreach($result as $k=>$v){
                     
                     ?>
                  <div class="panel-heading">
                     <div class="panel-title hidden-xs">Withdraw Details</div>                    
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
                                             <th>Vendor Name</th>
                                             <th>Amount</th>
                                             <th>Vendor's Account Balance</th>
                                             <th>Paid - Date</th>
                                             <th>Bank Account</th>
                                             <th>Bank Rooting No.</th>
                                             <th>
                                                <code>Approved</code>
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td><a href="vendor_details.php?id=<?php echo $v["aw_vr_id"];  ?>" title="Show Vendor Details" style="color:blue;"><?php echo seeMoreDetails("fname","vendor_registration",array("vr_id"=>$v["aw_vr_id"]));  ?></a></td>
                                             <td><?php echo $v["aw_withdraw_amnt"];  ?></td>
                                             <td><?php echo seeMoreDetails("balance","ambit_vendor_balance",array("avb_vr_id"=>$v["aw_vr_id"]));  ?></td>
                                             <td>
                                             	<input class="paid_date" id='<?php echo "date_".$v["aw_id"];?>' value='<?php echo $v["transaction_date"];  ?>'> 
                                             	
                                             	<a href="javascript:void(0);" onclick="changeDate('<?php echo $v["aw_id"];?>');" title="Paid Date Change"><img src="icon/tick1.png" width="20"></a>
                                             </td>
                                             <td><?php echo $v["bank_account_paypal_email"];  ?></td>
                                             <td><?php echo $v["bank_routing_no"];  ?></td>
                                             <td><?php if($v["view_status"]==0) { ?> <a href="javascript:void(0);" onclick="show_details('<?php echo $v["aw_id"];  ?>');" title="View"><img src="icon/view.png" width="20" /></a><?php  }else{ ?><a href="javascript:void(0);" onclick="show_details('<?php echo $v["aw_id"];  ?>');" title="View"><img src="icon/views.png" width="20" /></a> 
                                                <?php } ?>
                                                <?php if($v["transaction_status"]==1) { echo '<img src="icon/tick1.png" width="20">'; } else {echo '<img src="icon/cross.png" width="20">'; ?> <a href="javascript:void(0);" onclick="changeStatus('<?php echo $v["aw_id"];  ?>','<?php echo $v["aw_vr_id"];  ?>');" title="Transaction Approved"><img src="icon/edit.png" width="13" /></a><?php  } ?>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php
                           }
                           }else{
                           	?>
                        <p>No Data Found</p>
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
<?php
   require_once("include/footer.php");
   
   }else{
   	echo '<script>window.location="utility-login.php";</script>';
   }
   ?>
   <script>
   	
   $(".paid_date").datepicker({
        dateFormat: 'yy-mm-dd',
              numberOfMonths: 1,
              prevText: '<i class="fa fa-chevron-left"></i>',
              nextText: '<i class="fa fa-chevron-right"></i>',
              showButtonPanel: false,
             // minDate:new Date(),
              maxDate:new Date(),
              beforeShow: function (input, inst) {
                  var newclass = 'allcp-form';
                  var themeClass = $(this).parents('.allcp-form').attr('class');
                  var smartpikr = inst.dpDiv.parent();
                  if (!smartpikr.hasClass(themeClass)) {
                      inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
                  }
              }
   
          });
   </script>
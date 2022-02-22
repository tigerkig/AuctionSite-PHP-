

<?php
   session_start();
   require_once("function.php");
   if(isset($_SESSION["id"]) && $_SESSION["username"]){
   $admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
   include("include/header.php");
   ?>
<script type="text/javascript">
   function changeStatus(arp_id){
   		$.post("admin_approved_return_product.php",{arp_id:arp_id},function(r){
   			if(r==1){	
   		window.location="<?php echo $_SERVER['REQUEST_URI'];  ?>";	
   	}else{
   		alert("Something went wrong !");
   		}
   	});
   	}
   
   
   function send_mail(arp_id,send_vendor){
   	if(send_vendor.trim()==1){
   		alert("Message Allready Sent");
   		return false;
   	}
   	$.post(
   		"ajax_send_msg_vendor.php",
   		{arp_id:arp_id},
   		function(r){
   			if(r==1){
   				alert("Message Sent Successfully");
   				window.location="<?php echo $_SERVER['REQUEST_URI'];  ?>";	
   			}
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
      $select="arp_id,arp_ass_id,arp_apa_id,arp_ac_id,arp_vr_id,date,status,reason,open_or_not,details,send_vendor,return_status,quantity";
      $result=getDetails(doSelect($select,"ambit_return_product",array("arp_id"=>$_GET["id"])));
      }else{
      	$result=array();
      }
      ?>
   <section id="content" class="table-layout animated fadeIn">
      <div class="chute chute-center">
         <div class="row">
            <!--  -->
            <div class="col-md-12">
               <!-- <input type="text" id="search" onkeyup="myFunction()" style="width:99%;" placeholder="Search By Category,Product Name,Brand...."  value="" /> -->
               <!-- <input type="text" id="search" onkeyup="myFunction()" style="width:33%;" placeholder="Search By Name"  value="" />
                  <input type="text" id="search" onkeyup="myFunction()" style="width:33%;" placeholder="Search By Email"  value="" /> -->
               <div id="ajax_field">
                  <div class="panel panel-visible" id="spy6">
                     <?php
                        if(!empty($result)){
                        foreach($result as $k=>$v){
                        
                        ?>
                     <div class="panel-body pn">
                        <div class="table-responsive">
                           <div class="col-sm-12">
                              <div class="panel">
                                 <div class="panel-body pn">
                                    <div class="bs-component">
                                       <table class="table">
                                          <thead>
                                             <tr class="info">
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Vendor Name</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>
                                                   <code>Action</code>
                                                </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td><img src="../vendor/product_photo/<?php echo getImage($v["arp_apa_id"]);  ?>" width="70px"></td>
                                                <td ><?php echo ucfirst(getProductName($v["arp_apa_id"])); ?></td>
                                                <td><?php echo $v["quantity"];  ?></td>
                                                <td ><?php echo ucfirst(getVendorName($v["arp_vr_id"])); ?></td>
                                                <td ><?php echo get_date_str($v["date"]); ?></td>
                                                <?php
                                                   if($v["status"]==0){
                                                   	$status="Pending";
                                                   }else{
                                                   	$status="Successfull";
                                                   }
                                                   
                                                   ?>
                                                <td><font color="red"><?php echo $status;  ?></font></td>
                                                <td><?php if($v["status"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?> 
                                                   <?php
                                                      if($v["return_status"]==1 && $v["status"]==0){
                                                      ?>
                                                   <a href="javascript:void(0);" onclick="changeStatus('<?php echo $v["arp_id"];  ?>');" title="Change Status"><img src="icon/edit.png" width="13" /></a>
                                                   &nbsp 
                                                   <?php
                                                      }
                                                      ?>
                                                   <?php
                                                      if($v["send_vendor"]==0){
                                                      ?>
                                                   <a href="javascript:void(0);" onclick="send_mail('<?php echo $v["arp_id"];  ?>','<?php echo $v["send_vendor"];  ?>');" title="Send message to Vendor"><i class="fa fa-paper-plane" style="color: red;"  aria-hidden="true"></i></a>
                                                   <?php
                                                      }
                                                      ?>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-12">
                              <div class="panel">
                                 <div class="panel-body pn">
                                    <div class="bs-component">
                                       <table class="table">
                                          <thead>
                                             <tr class="info">
                                                <th colspan="2">
                                                   Details
                                                </th>
                                             </tr>
                                          </thead>
                                          <?php
                                             if($v["reason"]==1){
                                             	$reason='Dead On Arrival';
                                             }
                                             if($v["reason"]==2){
                                             	$reason='Order Error';
                                             }
                                             if($v["reason"]==3){
                                             	$reason='Received Wrong Item';
                                             }
                                             if($v["reason"]==4){
                                             	$reason='Other';
                                             }
                                             if($v["open_or_not"]==1){
                                             	$open_or_not='Open';
                                             }else{
                                             	$open_or_not='Not Open';
                                             }
                                             ?>
                                          <tbody>
                                             <tr>
                                                <td>Reason</td>
                                                <td align="right"><?php echo $reason;  ?></td>
                                             </tr>
                                             <tr>
                                                <td>Product Open Or Not</td>
                                                <td align="right"><?php echo $open_or_not;  ?></td>
                                             </tr>
                                             <tr>
                                                <td>Comment</td>
                                                <td align="right"><?php echo $v["details"];  ?></td>
                                             </tr>
                                             <tr>
                                                <td><font color="blue">Address</font></td>
                                                <td align="right"><font color="blue"><?php echo getCustomerAddr($v["arp_ac_id"]);  ?></font></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
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


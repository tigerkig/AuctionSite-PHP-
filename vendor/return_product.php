

<?php
   session_start();
   require_once("function.php");
   if(isset($_SESSION["vendor_id"]) && $_SESSION["vendor_email"]){
   $vendor_details=getDetails(doSelect("*","vendor_registration",array("vr_id"=>$_SESSION["vendor_id"])));
   
   $_SESSION["main_menu"] = "pending_return";
   $_SESSION["sub_menu"]  = "return_product";
   
   include("include/header.php");
   ?>
<section id="content_wrapper">
   <header id="topbar" class="alt">
      <div class="topbar-left">
         <ol class="breadcrumb">
            <li class="breadcrumb-icon">
               <a href="index.php">
               <span class="fa fa-home"></span>
               </a>
            </li>
            <li class="breadcrumb-active">
               <a href="index.php"><?php echo $lang_148; ?></a>
            </li>
            <li class="breadcrumb-link">
               <a href="index.php"><?php echo $lang_149; ?></a>
            </li>
            <li class="breadcrumb-current-item">Return product listing</li>
         </ol>
      </div>
   </header>
   <script type="text/javascript">
      function show_details(id){
      	window.location="return_product_details.php?id="+id;
      }
      
      function changeStatus(arp_id){
      	if(confirm("Are You Sure?")){
      		$.post("retrn_aceptd_by_vndr.php",{arp_id:arp_id},function(r){
      			if(r==1){	
      				window.location="<?php echo $_SERVER['REQUEST_URI'];  ?>";	
      			}else{
      				alert("Something went wrong !");
      			}
      		});
      	}
      }
      
   </script> 
   <section id="content" class="table-layout animated fadeIn">
      <div class="chute chute-center">
         <div class="row">
            <!--  -->
            <div class="col-md-12">
               <div class="panel panel-visible" id="spy6">
                  <div class="panel-heading">
                     <div class="panel-title hidden-xs">
                        <?php echo $lang_188; ?>
                        <?php
                           $select="arp_id,arp_ass_id,arp_apa_id,arp_ac_id,arp_vr_id,date,return_status,quantity";
                           $result=getDetails(doSelect($select,"ambit_return_product",array("arp_vr_id"=>$_SESSION["vendor_id"])));
                           ?>
                     </div>
                  </div>
                  <div class="panel-body pn">
                     <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                           <thead>
                              <tr>
                                 <th class="va-m"><?php echo $lang_27; ?></th>
                                 <th class="va-m"><?php echo $lang_30; ?></th>
                                 <th class="va-m"><?php echo $lang_189; ?></th>
                                 <th class="va-m"><?php echo $lang_190; ?></th>
                                 <th class="va-m"><?php echo $lang_28; ?></th>
                                 <!--<th class="va-m"><?php echo $lang_80; ?></th>-->
                                 <th class="va-m">Delivered Status</th>
                                 <th class="va-m">Return Status</th>
                                 <th class="va-m"><?php echo $lang_138; ?></th>
                                 <th class="va-m">Details</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 foreach($result as $k=>$v){
                                 
                                 ?>
                              <tr>
                                 <td><a href="product_details.php?id=<?php echo $v["arp_apa_id"]; ?>" style="color:blue;" title="<?php echo $lang_45; ?>"><?php echo getProductName($v["arp_apa_id"]);  ?></a></td>
                                 <td><?php echo $v["quantity"];  ?></td>
                                 <td><?php echo getCustomerName($v["arp_ac_id"]);  ?></td>
                                 <td><a href="vendor_details.php?id=<?php echo $v["arp_vr_id"]; ?>" style="color:red;" title="<?php echo $lang_45; ?>"><?php echo getVendorName($v["arp_vr_id"]);  ?></a></td>
                                 <td><?php echo get_date_str($v["date"]);  ?></td>
                                 <?php
                                    $shipment_detail = getDetails(doSelect("ass_apa_id, shipment_status, payment_status, delivery_status","ambit_shipment_status",array("ass_id"=>$v["arp_ass_id"])))
                                    ?>
                                 <td>
                                    <?php 
                                       $status = "";
                                       if($shipment_detail[0]["shipment_status"]){
                                       	$status = "Shipped";
                                       	if($shipment_detail[0]["delivery_status"])
                                       		//$status .= ", Delivered";						
                                       		$status = "Delivered/Checked";						
                                       }
                                       	echo '<span style="color:green">'.$status.'</span>';  ?>
                                 </td>
                                 <?php
                                    if($v["return_status"]==0){
                                    	$status="Pending";
                                    }else{
                                    	//$status="Successfull";
                                    	$status="Returned";
                                    }
                                    
                                    ?>
                                 <td><font color="red"><?php echo $status;  ?></font></td>
                                 <td><?php if($v["return_status"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?> 
                                    <?php
                                       if($v["return_status"]==0){
                                       ?>
                                    <a href="javascript:void(0);" onclick="changeStatus('<?php echo $v["arp_id"];  ?>');" title="Change Status"><img src="icon/edit.png" width="13" /></a>
                                    <?php
                                       }
                                       ?>
                                    &nbsp 
                                 </td>
                                 <td> <a href="javascript:void(0);" onclick="show_details('<?php echo $v["arp_id"];  ?>');" title="View"><img src="icon/view.png" width="20" /></a></td>
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
   }else{
   	echo '<script>window.location="vendor_login.php";</script>';
   }
   
   ?>


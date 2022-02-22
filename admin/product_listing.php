<?php
   session_start();
   require_once("function.php");
   if(isset($_SESSION["id"]) && $_SESSION["username"]){
   $admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
   
   $_SESSION["main_menu"] = "product";
   $_SESSION["sub_menu"]  = "product_listing";
   
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
               <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-link">
               <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-current-item">Product Listing</li>
         </ol>
      </div>
   </header>
   <script type="text/javascript">
      function changeStatus(id){
      	$.post("admin_approved_product.php",{apa_id:id},function(r){
      		if(r==1){	
      	window.location="product_listing.php";	
      }else{
      	alert("Something went wrong !");
      	}
      });
      }
      function delete_product(id){
       	if(confirm("Are you sure , to delete product?")){
      		$.post("delete_product.php",{apa_id:id},function(r){
      			if(r==1){
      				window.location="product_listing.php";	
      			}else if(r==0){
      				alert("Something went wrong !");
      			}else{
      				alert(r);
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
                        Product Listing 
                        <?php
                           if(isset($_GET["id"]) && trim($_GET["id"]) != ""){
                           	$condition=array("apa_vr_id"=>trim($_GET["id"]));
                           }else{
                           	$condition=array();
                           }
							                            
                           date_default_timezone_set("America/Chicago");
                           $curdatetime = date("Y-m-d H:i:s");
							
                           //$result=getDetails(doSelect("apa_id,apa_vr_id,name,category,brand,status, stock, posting_type, TIME_TO_SEC(TIMEDIFF(posting_date, '".$curdatetime."')) AS diff_time", "ambit_product_add",$condition,' ORDER BY apa_id DESC'));
                           // $result=getDetails(doSelect("apa_id,apa_vr_id,name,category,brand,status, stock, posting_type, TIME_TO_SEC(TIMEDIFF(concat(listing_duration,' ', TIME(posting_date)), '".$curdatetime."')) AS diff_time", "ambit_product_add",$condition,' ORDER BY apa_id DESC'));
                           $result=getDetails(doSelect("apa_id,apa_vr_id,name,category,brand,status, stock, posting_type, TIME_TO_SEC(TIMEDIFF(concat(listing_duration,' ', listing_start), '".$curdatetime."')) AS diff_time", "ambit_product_add",$condition,' ORDER BY time_sort DESC'));
                           // SELECT apa_id,apa_vr_id,NAME,category,brand,STATUS, stock, posting_type, TIME_TO_SEC(TIMEDIFF( NOW(), posting_date)) AS diff_time FROM ambit_product_add WHERE 1  ORDER BY apa_id DESC
                           ?>
                     </div>
                  </div>
                  <div class="panel-body pn">
                     <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                           <thead>
                              <tr>
                                 <th class="va-m">Product Name</th>
                                 <th class="va-m">Posted By</th>
                                 <th class="va-m">Category</th>
                                 <th class="va-m">Brand</th>
                                 <th class="va-m">Status</th>
                                 <th class="va-m">Approve</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 foreach($result as $k=>$v){
                                 	$status = '';
                                 	if($v["posting_type"] == 1 && $v["status"]==1){
										$status = "<span style='color:green'>Active auction</span>";//#32CD32
									}elseif($v["posting_type"] == 0 && $v["status"]==1){										
										$status = "<span style='color:green'>Active sale</span>";
									}else{
										$status = "<span style='color:grey'>N/A</span>";
									}
									if($v["posting_type"] == 1 && $v["diff_time"] < 0){
										$status = "<span style='color:red'>Ended</span>";//#32CD32
									}
									
									$quantity_sold = seeMoreDetails("sum(quantity)","ambit_shipment_status",array("ass_apa_id"=>$v["apa_id"], "shipment_status" => 1, "payment_status" => 1));  
                                 	$quantity_paid = seeMoreDetails("sum(quantity)","ambit_shipment_status",array("ass_apa_id"=>$v["apa_id"], "payment_status" => 1));  
                                
                                	
							   		if($quantity_sold > 0)
							   	 		$status = '<span style="color:red">Sold|Paid</span>';  
							   	 	elseif($quantity_paid > 0)
							   	 		$status = '<span style="color:red">Sold|Unpaid</span>';  
							   	 		
							   	 	$return_count = seeMoreDetails("sum(quantity)","ambit_return_product",array("arp_apa_id"=>$v["apa_id"]));  
							   	 	if($return_count > 0){
										$status = '<span style="color:red">Refunded</span>';  
									}
								
                                 ?>
                              <tr>
                                 <td><a href="product_details.php?id=<?php echo $v["apa_id"]; ?>" title="Product Details"><?php echo ucwords($v["name"]);  ?></a></td>
                                 <td><a href="vendor_details.php?id=<?php echo $v["apa_vr_id"]; ?>" title="Vendor Details">
                                    <?php echo ucfirst(seeMoreDetails("fname","vendor_registration",array("vr_id"=>$v["apa_vr_id"]))).' '.ucfirst(seeMoreDetails("lname","vendor_registration",array("vr_id"=>$v["apa_vr_id"])));  ?>
                                    </a>
                                 </td>
                                 <td><?php echo seeMoreDetails("pc_name","product_category",array("pc_id"=>$v["category"]));  ?></td>
                                 <td><?php echo seeMoreDetails("ab_name","ambit_brand",array("ab_id"=>$v["brand"]));  ?></td>
                                 <td>
                                 	<?php
                                 		/*if($v["status"] == 1){
                                 			echo "<span style='color:green'>Active Sale</span>";
										}else{
											echo "<span style='color:grey'>N/A</span>";
										}*/
										echo $status;
                                 	?>
                                 </td>
                                 <td><?php if($v["status"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?> <a href="javascript:void(0);" onclick="changeStatus('<?php echo $v["apa_id"];  ?>');" title="Change Status"><img src="icon/edit.png" width="13" /></a> <a href="javascript:void(0);" onclick="delete_product('<?php echo $v["apa_id"];  ?>');" title="Delete"><img src="icon/delete.png" width="19" /></a>
                                 </td>
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
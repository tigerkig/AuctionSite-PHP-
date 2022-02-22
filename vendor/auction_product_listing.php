<?php
   session_start();
   require_once("function.php");
   if(isset($_SESSION["vendor_id"]) && $_SESSION["vendor_email"]){
   $vendor_details=getDetails(doSelect("*","vendor_registration",array("vr_id"=>$_SESSION["vendor_id"])));
   
   $_SESSION["main_menu"] = "product";
   $_SESSION["sub_menu"]  = "auction_product_listing";
   
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
            <li class="breadcrumb-current-item">Auction Product Listing</li>
         </ol>
      </div>
   </header>
   <script type="text/javascript">
      function edit_product(id){
      	window.location='edit_product.php?id='+id;
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
               <div class="panel panel-visible" id="spy3">
                  <div class="panel-heading">
                     <div class="panel-title hidden-xs">
                        Auction Product Listing
                        <?php
                           // $sql  = "SELECT apa_id,apa_vr_id,`name`,category,brand,`status`,listing_duration , posting_date,TIME_TO_SEC(TIMEDIFF(CONCAT(listing_duration, ' ', TIME(posting_date)), NOW())) AS diff_time FROM ambit_product_add ";
                           $sql  = "SELECT apa_id,apa_vr_id,`name`,category,brand,`status`,listing_duration , posting_date,TIME_TO_SEC(TIMEDIFF(CONCAT(listing_duration, ' ', listing_start), NOW())) AS diff_time FROM ambit_product_add ";
                           $sql .= "WHERE apa_vr_id=".$_SESSION["vendor_id"]." AND listing_duration !='0000-00-00' ";
                           $sql .= " ORDER BY time_sort DESC";
                           $result=getDetails(doSelect3($sql));
                           
                           ?>
                     </div>
                  </div>
                  <div class="panel-body pn">
                     <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable2" width="100%">
                           <thead>
                              <tr>
                                 <th class="va-m"><?php echo $lang_27; ?></th>
                                 <th class="va-m"><?php echo $lang_184; ?></th>
                                 <th class="va-m"><?php echo $lang_49; ?></th>
                                 <th class="va-m">Auction Details</th>
                                 <th class="va-m">Status</th>
                                 <th class="va-m">Payment</th>
                                 <th class="va-m"><?php echo $lang_185; ?></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 foreach($result as $k=>$v){
                                 	if($v["status"] == 1)
                                 		$status = "<span style='color:green'>Active Auction</span>";
                                 	else
                                 		$status = "<span style='color:grey'>N/A</span>";
                                 	$payment = '';
                                 	$bid_count 			= seeMoreDetails("count(*)","ambit_product_bid",array("apa_id"=>$v["apa_id"])); 
                                 	$shipmentDetail_1 	= getDetails(doSelect("ass_apa_id,ass_vr_id,shipment_status, payment_status","ambit_shipment_status",array("ass_vr_id"=>$_SESSION["vendor_id"],"ass_apa_id" => $v["apa_id"]), ' ORDER BY date DESC'));
                                 	//$shipmentDetail_2 	= getDetails(doSelect("ass_apa_id,ass_vr_id,shipment_status, payment_status","ambit_shipment_status_auction",array("ass_vr_id"=>$_SESSION["vendor_id"],"ass_apa_id" => $v["apa_id"]), ' ORDER BY date DESC'));
                                 ?>
                              <tr>
                                 <td><a href="product_details.php?id=<?php echo $v["apa_id"]; ?>" title="Product Details"><?php echo ucwords($v["name"]);  ?></a></td>
                                 <td><?php echo seeMoreDetails("pc_name","product_category",array("pc_id"=>$v["category"]));  ?></td>
                                 <td><?php echo seeMoreDetails("ab_name","ambit_brand",array("ab_id"=>$v["brand"]));  ?></td>
                                 <td><a href="auction_details.php?id=<?php echo $v["apa_id"]; ?>" target="_blank" ><span class="fa fa-gavel fa-2x"></span></a></td>
                                 <td>
                                    <?php
                                       /*$curDatetime = new DateTime();
                                       $duration	 = new DateTime($v["listing_duration"]);
                                       $time_diff = date_diff($curDatetime,$duration);					
                                       $diff_days =  intval($time_diff->format('%R%a'));*/
                                       
                                       	//if($bid_count != 0)
                                       	//{
                                       	//	$status = '<span style="color:green">Active Bid</span>';
                                       	
                                       	//if($bid_count == 0 && $diff_days < 0){
                                       	if($v['diff_time'] < 0){
                                       		$status =  '<span style="color:red">Ended</span>';	
                                       		$res = doUpdate('ambit_product_add',array("status"=>0),array("apa_id"=>$v["ac_id"]));
                                       		$v["status"] = 0;
                                       	}
                                       	
                                       		$payment_status = $shipmentDetail_1[0]["payment_status"];
                                       		$shipment_status = $shipmentDetail_1[0]["shipment_status"];
                                       		
                                       		
                                       		//if($shipment_status == 1){
                                       		if($payment_status == 1){
                                       			$status = '<span style="color:red">Sold</span>';	
                                       			$payment = '<span style="color:red">Paid</span>';
                                       			if($shipment_status == 1 || $payment_status==1){									
                                       				$payment = '<span style="color:red">Paid</span>';
                                       			//}elseif($shipment_status == 0){
                                       			}elseif($payment_status == 0){
                                       				$payment = '<span style="color:red">Unpaid</span>';
                                       			}							
                                       		}elseif($payment_status === 0){
                                       			$status = '<span style="color:green">Direct Bid</span>';	
                                       			$payment = '<span style="color:red">Unpaid</span>';							
                                       		}else{
                                       			/*$payment_status  = $shipmentDetail_2[0]["payment_status"];
                                       			$shipment_status = $shipmentDetail_2[0]["shipment_status"];
                                       			
                                       			if($payment_status == 1){
                                       				$status = '<span style="color:red">Sold</span>';	
                                       				
                                       				if($shipment_status == 1){									
                                       					$payment = '<span style="color:red">Paid</span>';
                                       				}elseif($shipment_status == 0){
                                       					$payment = '<span style="color:red">Unpaid</span>';
                                       				}							
                                       			}elseif($payment_status === 0 && $diff_days < 0){									
                                       				$status =  '<span style="color:red">Ended</span>';								
                                       			}elseif(empty($payment_status) && $diff_days < 0){
                                       				
                                       				$status =  '<span style="color:red">Ended</span>';								
                                       			}					*/			
                                       			
                                       		}
                                       		
                                       		
                                       	//}
                                       	echo $status;
                                       ?>
                                 </td>
                                 <td><a href="auction_details.php?id=<?php echo $v["apa_id"]; ?>" target="_blank" ><?php echo $payment;?></a></td>
                                 <td><?php if($v["status"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?> <a href="javascript:void(0);" onclick="edit_product('<?php echo $v["apa_id"];  ?>');" title="Edit"><img src="icon/edit.png" width="13" /></a> <a href="javascript:void(0);" onclick="delete_product('<?php echo $v["apa_id"];  ?>');" title="Delete"><img src="icon/delete.png" width="19" /></a>
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
   }else{
   	echo '<script>window.location="vendor_login.php";</script>';
   }
   
   ?>
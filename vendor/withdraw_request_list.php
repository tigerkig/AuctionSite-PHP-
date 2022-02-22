<?php
   session_start();
   require_once("function.php");
   if(isset($_SESSION["vendor_id"]) && $_SESSION["vendor_email"]){
   $vendor_details=getDetails(doSelect("*","vendor_registration",array("vr_id"=>$_SESSION["vendor_id"])));
   
   $_SESSION["main_menu"] = "withdraw_details";
   $_SESSION["sub_menu"]  = "withdraw_request_balance";
   
   include("include/header.php");
   ?>
<section id="content_wrapper">
<header id="topbar" class="alt">
   <div class="topbar-left">
      <ol class="breadcrumb">
         <li class="breadcrumb-icon">
            <a href="index.php">
            <span class="fa fa-usd"></span>
            </a>
         </li>
         <li class="breadcrumb-active">
            <a href="javascript:void(0);">Withdraw request List</a>
         </li>
      </ol>
   </div>
</header>
<section id="content" class="table-layout animated fadeIn">
   <div class="chute chute-center">
      <div class="row">
         <div class="col-sm-12 col-xl-12">
            <div class="panel panel-tile">
               <div class="panel">
                  <div class="panel-heading">
                     <div class="panel-title hidden-xs">
                        <?php //echo $lang_212; ?>
                        Withdraw Request List
                        <?php
                           $result=getDetails(doSelect1("aw_id,aw_vr_id,aw_withdraw_amnt,transaction_status,view_status,request_date,bank_account_paypal_email,bank_routing_no,transaction_date","ambit_withdraw",array("aw_vr_id"=>$_SESSION["vendor_id"]),' ORDER BY aw_id DESC'));
                           
                           ?>
                     </div>
                  </div>
                  <div class="panel-body pn">
                     <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                           <thead>
                              <tr>
                                 <th class="va-m"><?php echo $lang_190; ?></th>
                                 <th class="va-m"><?php echo $lang_215; ?></th>
                                 <th class="va-m">Bank Account No. Or PayPay Email Address</th>
                                 <th class="va-m">Bank Routing No.</th>
                                 <th class="va-m"><?php echo $lang_217; ?></th>
                                 <th class="va-m"><?php echo $lang_218; ?></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 foreach($result as $k=>$v){
                                 
                                 ?>
                              <tr>
                                 <td><a href="vendor_details.php?id=<?php echo $v["aw_vr_id"];  ?>" title="Show Vendor Details" style="color:blue;"><?php echo seeMoreDetails("fname","vendor_registration",array("vr_id"=>$v["aw_vr_id"]));  ?></a></td>
                                 <td><?php echo currency1(base_currency(),$v["aw_withdraw_amnt"]);  ?></td>
                                 <td><?php echo $v["bank_account_paypal_email"];  ?></td>
                                 <td><?php echo $v["bank_routing_no"];  ?></td>
                                 <td><?php echo get_date_str($v["request_date"]);  ?></td>
                                 <td><?php if($v["view_status"]==0) { ?> <a href="javascript:void(0);"  title="<?php echo $lang_219; ?>"><img src="icon/view1.png" width="20" /></a><?php  }else{ ?><a href="javascript:void(0);" title="Seen"><img src="icon/view2.png" width="20" /></a> <?php } ?> &nbsp
                                    <?php if($v["transaction_status"]==1) { ?> <a href="javascript:void(0);"  title="Approved on <?php echo get_date_str($v["transaction_date"]);  ?>"><img src="icon/tick.png" width="20" /></a><?php  } ?>
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
   </div>
</section>
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
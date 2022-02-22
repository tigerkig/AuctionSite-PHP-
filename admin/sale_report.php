<?php
   session_start();
   require_once("function.php");
   if(isset($_SESSION["id"]) && $_SESSION["username"]){
   $admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
   
   $_SESSION["main_menu"] = "dashboard";
   $_SESSION["sub_menu"]  = "sale_report";
   
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
            <li class="breadcrumb-current-item">Sales Report</li>
         </ol>
      </div>
   </header>
   <br/>
   <br/>
   <br/>
   <header id="topbar" class="alt">
      <div class="topbar-left">
      <div class="chute chute-center">
         <div class="mw1000 center-block">
            <div class="allcp-form">
               <div class="panel">
                  <div class="panel-heading">
                     <div class="panel-title">Date Filter ( YYYY-MM-DD )</div>
                  </div>
                  <div class="panel-body">
                     <form method="post" action="sale_report.php" id="" enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="section">
                                 <label class="field prepend-icon">
                                 <input type="text" name="from_date" id="from_date" class="gui-input" placeholder="From Date">
                                 <b class="tooltip tip-right-top" id="departure_date_error"><em>From Date</em></b>
                                 <label for="tooltip1" class="field-icon">
                                 <i class="fa fa-sign-out"></i>
                                 </label>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="section">
                                 <label class="field prepend-icon">
                                 <input type="text" name="to_date" id="to_date" class="gui-input" placeholder="To Date">
                                 <b class="tooltip tip-right-top" id="departure_time_error"><em>To Date</em></b>
                                 <label for="tooltip1" class="field-icon">
                                 <i class="fa fa-sign-out"></i>
                                 </label>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <input class="btn btn-default btn-primary" type="submit" name="submit" value="Search" >
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
   </header>
   <script type="text/javascript">
      function show_details(id){
      	window.location="return_product_details.php?id="+id;
      }
      
   </script>
  <section id="content" class="table-layout animated fadeIn">
   <div class="chute chute-center">
	  <div class="row">
         <div class="col-sm-6 col-xl-4">
            <div class="panel panel-tile">
               <div class="panel-body">
                  <div class="row pv10">
                     <div class="col-xs-5 ph10"><img src="assets/img/pages/clipart0.png" class="img-responsive mauto" alt=""/></div>
                     <div class="col-xs-7 pl5">
                        <!--<a href="vendor_listing.php" style="text-decoration: none;"><h6 class="text-muted">PURCHASE AMOUNT</h6></a>-->
                        <a href="sale_amount_report.php" style="text-decoration: none;">
                           <h6 class="text-muted">PURCHASE AMOUNT</h6>
                        </a>
                        <?php
                           $sub_query='';
                           if(isset($_POST["submit"]) && $_POST["from_date"]!="" && $_POST["to_date"]!=""){
                           	$from_date=trim($_POST["from_date"]).' '.'00:00:00';
                           	$to_date=trim($_POST["to_date"]).' '.'00:00:00';
                           	$sub_query=" AND date BETWEEN '".$from_date."' AND '".$to_date."'";
                           }
                           //$select="currency,price,quantity";
                           $select="ass_apa_id, currency,price,quantity";
                           $from="ambit_shipment_status";
                           $con=array("shipment_status"=>1);
                           $query=doSelect2($select,$from,$con);
                           $query=$query.$sub_query;
                           $result=getDetails(doSelect3($query));
                           $purchase_amount=0;
                           foreach($result as $k3=>$v3){
                           	//$purchase_amount=$purchase_amount + currency_price($v3["currency"],$v3['price']);
                           	//$price = getPrice($v3['ass_apa_id'])- getTax($v3['ass_apa_id']);
                           	//$price_str = trim(seeMoreDetails("price","ambit_product_add",array("ac_id"=>$v3['ass_apa_id'])));
                           	
                           	$price = getPrice($v3['ass_apa_id']) - getTax($v3['ass_apa_id'])- getDiscount($v3['ass_apa_id']) + getShippingCost($v3['ass_apa_id']);
                           	$purchase_amount=$purchase_amount + currency_price($v3["currency"],$price);
                           	
                           }
                           $vendor_balance=$purchase_amount;
                           foreach($result as $k3=>$v3){
                           	$commision=explode("||",get_site_settings(30)); 
                           	$min_chrng=$commision[0]*$v3['quantity'];
                           	$percentage=$commision[1];
                           	//$c_blnc=($percentage/100)* currency_price($v3["currency"],$v3['price']);
                           	//$price = getPrice($v3['ass_apa_id'])- getTax($v3['ass_apa_id']);
                           	$price = getPrice($v3['ass_apa_id']) - getTax($v3['ass_apa_id'])- getDiscount($v3['ass_apa_id']) + getShippingCost($v3['ass_apa_id']);
                           	$c_blnc=($percentage/100)* currency_price($v3["currency"],$price);
                           	if($c_blnc < $min_chrng){
                           		$vendor_balance=$vendor_balance-$min_chrng;
                           	}else{
                           		$vendor_balance=$vendor_balance-$c_blnc;
                           	}
                           }
                           $admin_comisson=$purchase_amount-$vendor_balance;
                           ?>
                        <!--<h2 class="fs50 mt5 mbn"><?php echo get_currency().$purchase_amount; ?></h2>-->
                        <h2><?php echo get_currency().$purchase_amount; ?></h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-xl-4">
            <div class="panel panel-tile">
               <div class="panel-body">
                  <div class="row pv10">
                     <div class="col-xs-5 ph10"><img src="assets/img/pages/clipart1.png" class="img-responsive mauto" alt=""/></div>
                     <div class="col-xs-7 pl5">
                       <!-- <a href="sale_amount_report.php" style="text-decoration: none;">-->
                        <a href="commission.php" style="text-decoration: none;">
                           <h6 class="text-muted">COMISSION</h6>
                        </a>
                        <h2><?php echo get_currency().$admin_comisson;  ?></h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-xl-4">
            <div class="panel panel-tile">
               <div class="panel-body">
                  <div class="row pv10">
                     <div class="col-xs-5 ph10"><img src="assets/img/pages/clipart2.png" class="img-responsive mauto" alt=""/></div>
                     <div class="col-xs-7 pl5">
                       <!-- <a href="sale_amount_report.php" style="text-decoration: none;">-->
                        <a href="commission.php" style="text-decoration: none;">
                           <h6 class="text-muted">VENDOR AMOUNT</h6>
                        </a>
                        <h2><?php echo get_currency().$vendor_balance;  ?></h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <!--  -->
         <div class="col-md-12">
            <div class="panel panel-visible" id="spy6">
               <div class="panel-heading">
                  <div class="panel-title hidden-xs">
                     Shipment Status
                     <?php
                        $sub_query='';
                        if(isset($_POST["submit"])){
                        	$from_date=trim($_POST["from_date"]).' '.'00:00:00';
                        	$to_date=trim($_POST["to_date"]).' '.'00:00:00';
                        	$sub_query=" AND date BETWEEN '".$from_date."' AND '".$to_date."'";
                        }
                        $select="ass_id,ass_apa_id,cancel_status,ass_ac_id,ass_vr_id,date,shipment_status,quantity";
                        $from="ambit_shipment_status";
                        $con=array();
                        $query=doSelect2($select,$from,$con);
                        $query=$query.$sub_query;
                        $result=getDetails(doSelect3($query));
                        
                        ?>
                  </div>
               </div>
               <div class="panel-body pn">
                  <div class="table-responsive">
                     <table class="table table-striped table-hover" id="datatable22" cellspacing="0" width="100%">
                        <thead>
                           <tr>
                              <th class="va-m">Product Name</th>
                              <th class="va-m">Seller Name</th>
                              <th class="va-m">Buyer Name</th>
                              <th class="va-m">Buyer Email</th>
                              <th class="va-m">Address</th>
                              <th class="va-m">Date</th>
                              <th class="va-m">Quantity</th>
                              <th class="va-m">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              foreach($result as $k=>$v){
                              
                              ?>
                           <tr>
                              <td><a href="product_details.php?id=<?php echo $v["ass_apa_id"]; ?>" title="Product Details"><?php echo getProductName($v["ass_apa_id"]);  ?></a></td>
                              <td><a href="vendor_details.php?id=<?php echo $v["ass_vr_id"]; ?>" style="color:red;" title="Product Details"><?php echo getVendorName($v["ass_vr_id"]);  ?></a></td>
                              <td><a href="customer_details.php?ac_id=<?php echo $v["ass_ac_id"]; ?>" style="color:blue;"><?php echo seeMoreDetails("name","ambit_customer",array("ac_id"=>$v["ass_ac_id"]));  ?></a></td>
                              <td><?php echo seeMoreDetails("email","ambit_customer",array("ac_id"=>$v["ass_ac_id"]));  ?></td>
                              <td><?php echo seeMoreDetails("address","ambit_customer",array("ac_id"=>$v["ass_ac_id"]));  ?></td>
                              <td><?php echo get_date_str($v["date"]);  ?></td>
                              <td><?php echo $v["quantity"];  ?></td>
                              <td>
                                 <?php
                                    if($v["cancel_status"]==0){
                                    ?>
                                 <?php
                                    $shipment_by=trim(seeMoreDetails("shipment_by","ambit_shipment_by",array("asb_id"=>1)));
                                    ?>
                                 <?php if($v["shipment_status"]==1)echo '<img src="icon/tick1.png" width="20">'; else echo '<img src="icon/cross.png" width="20">';  ?><?php if($v["shipment_status"]==0 && $shipment_by=="Vendor") {?> 
                                 <a href="javascript:void(0);" onclick="change_status('<?php echo $v["ass_id"];  ?>');" title="Change"><img src="icon/edit.png" width="13" /></a>
                                 <?php
                                    if($v["cancel_status"]==0){
                                    ?>
                                 <a href="javascript:void(0);" onclick="delete_order('<?php echo $v["ass_id"];  ?>');" title="Cancel Order"><img src="icon/delete.png" width="20" /></a>
                                 <?php 
                                    }
                                    } 
                                    }else{
                                    	echo '<font color="red"> Cancel</font>';
                                    }
                                    ?>
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
	  <div class="row">
         <!--  -->
         <div class="col-md-12">
            <div class="panel panel-visible" id="spy6">
               <div class="panel-heading">
                  <div class="panel-title hidden-xs">
                     Return Product Listing 
                     <?php
                        $sub_query='';
                        if(isset($_POST["submit"])){
                        	$from_date=trim($_POST["from_date"]).' '.'00:00:00';
                        	$to_date=trim($_POST["to_date"]).' '.'00:00:00';
                        	$sub_query=" AND date BETWEEN '".$from_date."' AND '".$to_date."'";
                        }
                        $con=array();
                        $select="arp_id,arp_ass_id,arp_apa_id,arp_ac_id,arp_vr_id,date,status,return_status,quantity";
                        $query=doSelect2($select,"ambit_return_product",$con);
                        $query=$query.$sub_query;
                        $result=getDetails(doSelect3($query));
                        //print_r($result);
                        ?>
                  </div>
               </div>
               <div class="panel-body pn">
                  <div class="table-responsive">
                     <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                        <thead>
                           <tr>
                              <th class="va-m">Product Name</th>
                              <th class="va-m">Quantity</th>
                              <th class="va-m">Buyer Name</th>
                              <th class="va-m">Seller Name</th>
                              <th class="va-m">Date</th>
                              <th class="va-m">Status</th>
                              <th class="va-m">Accepted By Seller</th>
                              <th class="va-m">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              foreach($result as $k=>$v){
                              
                              ?>
                           <tr>
                              <td><a href="product_details.php?id=<?php echo $v["arp_apa_id"]; ?>" style="color:blue;" title="Product Details"><?php echo getProductName($v["arp_apa_id"]);  ?></a></td>
                              <td><?php echo $v["quantity"];  ?></td>
                              <td><?php echo getCustomerName($v["arp_ac_id"]);  ?></td>
                              <td><a href="vendor_details.php?id=<?php echo $v["arp_vr_id"]; ?>" style="color:red;" title="Product Details"><?php echo getVendorName($v["arp_vr_id"]);  ?></a></td>
                              <td><?php echo get_date_str($v["date"]);  ?></td>
                              <?php
                                 if($v["status"]==0){
                                 	$status="Pending";
                                 }else{
                                 	$status="Successfull";
                                 }
                                 
                                 ?>
                              <td><font color="red"><?php echo $status;  ?></font></td>
                              <?php
                                 if($v["return_status"]==0){
                                 	$status1="Pending";
                                 }else{
                                 	$status1="Yes";
                                 }
                                 
                                 ?>
                              <td><font color="blue"><?php echo $status1;  ?></font></td>
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
</div>
<?php
   require_once("include/footer_date.php");
   }else{
   	echo '<script>window.location="utility-login.php";</script>';
   }
   ?>
<script>
   $("#from_date").datepicker({
   			dateFormat: 'yy-mm-dd',
              numberOfMonths: 1,
              prevText: '<i class="fa fa-chevron-left"></i>',
              nextText: '<i class="fa fa-chevron-right"></i>',
              showButtonPanel: false,
              beforeShow: function (input, inst) {
                  var newclass = 'allcp-form';
                  var themeClass = $(this).parents('.allcp-form').attr('class');
                  var smartpikr = inst.dpDiv.parent();
                  if (!smartpikr.hasClass(themeClass)) {
                      inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
                  }
              }
   
          });
   
    $("#to_date").datepicker({
   			dateFormat: 'yy-mm-dd',
              numberOfMonths: 1,
              prevText: '<i class="fa fa-chevron-left"></i>',
              nextText: '<i class="fa fa-chevron-right"></i>',
              showButtonPanel: false,
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
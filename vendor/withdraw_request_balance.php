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
            <a href="javascript:void(0);">Withdraw request</a>
         </li>
      </ol>
   </div>
</header>
<script type="text/javascript">
   $(document).ready(function(){
   	$("#withdraw_request").on('submit',(function(e){ 
   		var withdraw_amnt = $("#withdraw_amnt").val(); 
   		var bank_account_paypal_email = $("#bank_account_paypal_email").val(); 
   		var bank_routing_no = $("#bank_routing_no").val(); 
   		
   		if(withdraw_amnt.trim()==""){
   			alert("Confirm Withdraw_Amount Required");
   			$("#withdraw_amnt").focus();
   			return false;
   		}
   
   		if(bank_account_paypal_email.trim()==""){
   			alert("Confirm PayPal Account Required");
   			$("#bank_account_paypal_email").focus();
   			return false;
   		}
   		if(bank_routing_no.trim()==""){
   			alert("Confirm PayPal Email Required");
   			$("#bank_routing_no").focus();
   			return false;
   		}
   		
   		/*var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   		if(!regex.test(bank_routing_no)){
   	      alert("Email invalid");
   	      $("#bank_routing_no").val("");
   	      $("#bank_routing_no").focus();
   	      return false;
   	    }*/
   		$.post(
   			"ajax_withdraw_request.php",
   			{withdraw_amnt:withdraw_amnt, bank_account_paypal_email:bank_account_paypal_email, bank_routing_no:bank_routing_no},
   			function(data){
   				if(data == 1)
   				 	alert("Withdraw Request Success!");
   				 else
   				 	alert("Withdraw Request Failure!");
   				window.location="withdraw_request_balance.php";
   			}
   		);
   	}));
   		  
   
   });
   
</script>
<section id="content" class="table-layout animated fadeIn">
   <div class="chute chute-center">
      <div class="row">
         <div class="col-sm-6 col-xl-6">
            <div class="panel panel-tile">
               <div class="panel-body">
                  <div class="row pv10">
                     <div class="col-xs-4 ph10"><img src="assets/img/pages/dolar.png" class="img-responsive mauto" alt=""/></div>
                     <div class="col-xs-12 col-sm-6 col-md-3">
                        <a href="commission.php" style="text-decoration: none;">
                           <h6 class="text-muted"><?php echo $lang_181; ?></h6>
                        </a>
                        <?php
                           $balance=getDetails(doSelect("balance,currency","ambit_vendor_balance",array("avb_vr_id"=>$_SESSION["vendor_id"])));
                           ?>
                        <h4><?php echo currency1($balance[0]["currency"],$balance[0]["balance"]);  ?></h4>
                     </div>
                     <div class="col-xs-12 col-sm-6 col-md-5">
                        <a href="withdraw_request_list.php" style="text-decoration: none;">
                           <h6 class="text-muted">My Balance after withdrawal</h6>
                        </a>
                        <?php
                           $balance_total   = $balance[0]["balance"];			
                           $balance_request = seeMoreDetails("SUM(aw_withdraw_amnt)","ambit_withdraw",array("aw_vr_id"=>$_SESSION["vendor_id"], "transaction_status"=>0));
                           
                           $balance_after = round($balance_total - $balance_request, 2);
                           
                           ?>
                        <h4><?php echo currency1($balance[0]["currency"],$balance_after);  ?></h4>
                     </div>
                     <!--</div>-->
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-xl-6">
            <div class="panel panel-tile">
               <div class="panel-body">
                  <div class="row pv10">
                     <div class="col-xs-5 ph10"><img src="assets/img/pages/dolar.png" class="img-responsive mauto" alt=""/></div>
                     <div class="col-xs-7 pl5">
                        <a href="commission.php" style="text-decoration: none;">
                           <h6 class="text-muted"><?php echo $lang_209; ?></h6>
                        </a>
                        <h2 class="fs20 mt5 mbn"><?php   echo currency1(base_currency(),trim(get_site_settings(29)));  ?></h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-xl-12">
            <div class="panel panel-tile">
               <div class="panel-body">
                  <div class="row pv10">
                     <div class="col-xs-5 ph10"><img src="assets/img/pages/commision-icon.png" class="img-responsive mauto" alt=""/></div>
                     <?php
                        $val=trim(get_site_settings(30));
                        $val=explode("||",$val);
                        ?>
                     <div class="col-xs-7 pl5">
                        <a href="commission.php" style="text-decoration: none;">
                           <h6 class="text-muted"><?php echo $lang_210; ?></h6>
                        </a>
                        <h2 class="fs50 mt5 mbn"><?php   echo currency().$val[0];  ?></h2>
                     </div>
                     <div class="col-xs-7 pl5">
                        <a href="javascript:void(0);" style="text-decoration: none;">
                           <h6 class="text-muted"><?php echo $lang_211; ?></h6>
                        </a>
                        <h2 class="fs50 mt5 mbn"><?php   echo $val[1].'%';  ?></h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-12">
            <div class="panel panel-tile">
               <div class="panel">
                  <div class="panel-heading">
                     <div class="panel-title">
                        <?php echo $lang_212; ?>
                     </div>
                  </div>
                  <br/>
                  <form method="post" action="javascript:void(0);" id="withdraw_request"  enctype="multipart/form-data" >
                     <div class="panel-body pn">
                        <div class="section">
                           <label for="question" class="field prepend-icon">
                           </label>
                           <input class="form-control col-md-12" type="text" id="withdraw_amnt" value="" placeholder="<?php echo $lang_213; ?>" />
                        </div>
                        <br/>
                        <div class="section">
                           <label for="question" class="field prepend-icon">
                           </label>
                           <input class="form-control col-md-12" type="text" id="bank_account_paypal_email" value="" placeholder="Bank Account No. Or PayPal Email Address" />
                        </div>
                        <div class="section">
                           <label for="question" class="field prepend-icon">
                           </label>
                           <input class="form-control col-md-12" type="text" id="bank_routing_no" value="" placeholder="<?php echo "Bank Routing No."; ?>" />
                        </div>
                        <br/>
                        <div class="section" style="margin-top: 2rem;">
                           <div class="pull-right">
                              <input type="submit" name="submit" class="btn  btn-primary" onclick="withdraw('<?php echo trim(get_site_settings(29)); ?>','<?php echo $balance[0]["balance"]; ?>');" value="<?php echo $lang_64; ?>" />
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-sm-12">
            <div class="panel panel-tile">
               <div class="panel">
                  <div class="panel-heading">
                     <div class="panel-title hidden-xs">
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
                                 <th class="va-m">Bank Account No. Or PayPal Email Address</th>
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
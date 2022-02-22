<?php
   session_start();
   if(isset($_SESSION["ac_id"])){
   require_once("function.php");
   include("include/header.php");
   ?>
<!-- //Header Top -->
<!-- Header center -->
<?php
   include("include/header_center.php");
   ?>
<!-- //Header center -->
<!-- Header Bottom -->
<div class="header-bottom">
   <div class="container">
      <div class="row">
         <?php
            include("include/side_menu_close.php");
            ?>
         <!-- Main menu -->
         <?php
            include("include/main_menu.php");
            ?>
         <!-- //end Main menu -->
      </div>
   </div>
</div>
<script>
   function verification(ass_id) {
     var txt;
     var r = confirm("Has been the product you purchased delivered correctly?");
     if (r == true) {
       
      	$.post(
   		"ajax_delivery_verification.php",
   		{ass_id:ass_id},
   		function(r){
   			if(r==1){
   				alert("Verification Successfully");
   				location.reload();
   			}else{
   				alert("Verification Failure!");
   			}
   		}
   	);
   
      // txt = "You pressed OK!";
     } else {
       //txt = "You pressed Cancel!";
     }
     
   }
   
   function return_product(arp_ass_id,arp_apa_id,arp_ac_id,arp_vr_id,quantity){
     $.post(
     "ajax_return.php",
     {arp_ass_id:arp_ass_id,arp_apa_id:arp_apa_id,arp_ac_id:arp_ac_id,arp_vr_id:arp_vr_id,quantity:quantity},
     function(r){
   	  $("#ajax").html(r);
     }
     );
   }
</script>
<!-- Navbar switcher -->
<!-- //end Navbar switcher -->
</header>
<!-- //Header Container  -->
<!-- Main Container  -->
<div id="ajax">
   <div class="main-container container">
      <ul class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-home"></i></a></li>
         <li><a href="order-history.php"><?php echo $lang_9; ?></a></li>
      </ul>
      <div class="row">
         <!--Middle Part Start-->
         <div id="content" class="col-sm-12">
            <h2 class="title"><?php echo $lang_9; ?></h2>
            <div class="table-responsive">
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <td class="text-center"><?php echo $lang_26; ?></td>
                        <td class="text-left"><?php echo $lang_27; ?></td>
                        <td class="text-center"><?php echo $lang_78; ?></td>
                        <td class="text-center"><?php echo $lang_30; ?></td>
                        <td class="text-center"><?php echo $lang_79; ?></td>
                        <td class="text-center"><?php echo $lang_80; ?></td>
                        <td class="text-center"><?php echo $lang_379; ?></td>
                        <td class="text-center"><?php echo $lang_10; ?></td>
                        <td class="text-center"><?php echo $lang_81; ?></td>
                        <td></td>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        //$result=getDetails(doSelect("ass_id,ass_apa_id,cancel_status,date,shipment_status,order_id,quantity,payment_status","ambit_shipment_status",array("ass_ac_id"=>$_SESSION["ac_id"])));
                        $result=getDetails(doSelect("ass_id,ass_apa_id,ass_ac_id,ass_vr_id,cancel_status,date,shipment_status,order_id,quantity,payment_status, delivery_status","ambit_shipment_status",array("ass_ac_id"=>$_SESSION["ac_id"])));
                        
                        foreach($result as $k=>$v){
                        ?>
                     <tr>
                        <?php
                           $image=getProductPhoto($v["ass_apa_id"]);
                           ?>
                        <td class="text-center">
                           <a  href="product.php?id=<?php echo $v["ass_apa_id"] ?>"><img style="width:70px;height:37px;border: 1px solid #c9c6c6; padding: 1px" src="vendor/product_photo/<?php echo $image; ?>" alt="<?php echo getProductName($v["ass_apa_id"]);  ?>" title="<?php echo getProductName($v["ass_apa_id"]);  ?>">
                           </a>
                        </td>
                        <td class="text-left"><a href="product.php?id=<?php echo $v["ass_apa_id"] ?>"><?php echo getProductName($v["ass_apa_id"]);  ?></a>
                        </td>
                        <td class="text-center"><?php echo $v["order_id"];  ?></td>
                        <td class="text-center"><?php echo $v["quantity"];  ?></td>
                        <?php
                           if($v["payment_status"]==1){
                           	$status=$lang_281;
                           }else if($v["payment_status"]==0){
                           	$status=$lang_282;
                           }else if($v["payment_status"]==2){
                           	$status=$lang_283;
                           }
                           ?>								
                        <td class="text-center"><?php echo $status;  ?></td>
                        <?php
                           if($v["cancel_status"]==0){
	                           if($v["shipment_status"]==1){
	                           	$status=$lang_284;
	                           }else{
	                           	$status=$lang_279;
	                           }
                           }else{
                           	$status='<font color="red">'.$lang_285.'</font>';
                           }
                           ?>								
                        <td class="text-center"><?php echo $status;  ?></td>
                        <td class="text-center">
                        	<?php
                        	if($v["delivery_status"] == 0){
							?>	
                           		<button class="btn btn-info" title="" data-toggle="tooltip" onclick="verification(<?php echo $v["ass_id"]; ?>)" ><?php echo $lang_380?></button>
                           	<?php
							}else{
							?>
								<span style="color: green"><?php echo $lang_382; ?></span>
							<?php	
							}
                           	?>
                        </td>
                        <td class="text-center">
                        	<?php
                        	//$return_status = seeMoreDetails("return_status", "ambit_return_product", array("arp_ass_id" => $v["ass_id"]));
                        	$sql = "SELECT COUNT(*) AS cnt FROM ambit_return_product WHERE arp_ass_id =".$v["ass_id"];
                        	$countArr = getDetails(doSelect3($sql));
                        	$return_status = $countArr[0]["cnt"];
                        	
                        	if($return_status >= 1){
							?>
								<span style="color:red"><?php echo $lang_381; ?></span>
							<?php
							}else{
							?>
								<a class="btn btn-danger" title="" data-toggle="tooltip" href="javascript:void(0);" onclick="return_product('<?php echo $v["ass_id"]; ?>','<?php echo $v["ass_apa_id"]; ?>','<?php echo $v["ass_ac_id"]; ?>','<?php echo $v["ass_vr_id"]; ?>','<?php echo $v["quantity"]; ?>');" data-original-title="Return"><i class="fa fa-reply"></i></a>	
							<?php	
							}
                        		
                        	?>
                        
                        
                           
                        </td>
                        <td class="text-center"><?php echo get_date_str($v["date"]); ?></td>
                        <td class="text-center">
                        	<a class="btn btn-info" title="" data-toggle="tooltip" href="order-information.php?id=<?php echo $v["ass_id"]; ?>" data-original-title="View"><i class="fa fa-eye"></i></a>
                        </td>
                     </tr>
                     <?php
                        }
                        ?>							
                  </tbody>
               </table>
            </div>
         </div>
         <!--Middle Part End-->
         <!--Right Part Start -->
         <!--Right Part End -->
      </div>
   </div>
   <!-- //Main Container -->
</div>
<!-- Footer Container -->
<?php
   include("include/footer.php");
   }else{
  	 echo '<script>window.location="index.php";</script>';
   }
   ?>
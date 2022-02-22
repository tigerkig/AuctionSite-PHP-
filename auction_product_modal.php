   
   <?php
   session_start();
   require_once("function.php");
?>
<!-- Modal Bid history -->
<div class="modal fade" id="bid_history" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
            <h2 class="modal-title" id="myModalLabel" style = "text-align:center; font-weight: bold; font-size:22px;  color:#bd0000;"><?php echo $lang_316; ?></h2>
         </div>
         <div class="modal-body" style="min-height: 100px; font-family:serif;  /*font-size: 22px; color: green;*/">
            <div id="ajax">
               <div class="main-container container">                
                  <div class="row">
                     <!--Middle Part Start-->
                     <div id="content" class="col-sm-12">
                        <div class="table-responsive">
                           <table class="table table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <td class="text-center" style="vertical-align: middle"><?php echo $lang_26; ?></td>
                                    <td class="text-left" style="vertical-align: middle"><?php echo $lang_27; ?></td>
                                    <td class="text-center" style="vertical-align: middle"><?php echo $lang_317; ?></td>
                                    <td class="text-center" style="vertical-align: middle"><?php echo $lang_318; ?></td>
                                    <td class="text-center" style="vertical-align: middle"><?php echo $lang_319; ?></td>
                                    <td class="text-center" style="vertical-align: middle"><?php echo $lang_320; ?></td>
                                    <td class="text-center" style="vertical-align: middle"><?php echo $lang_321; ?></td>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $sql = "SELECT b.apa_id, b.`name`, a.id, a.`bid_amount`, b.`posting_type`,a.auction_status, a.status, c.`nick_name`, a.`date` FROM ambit_product_bid AS a ";
                                    $sql .= " JOIN ambit_product_add AS b ";
                                    $sql .= " JOIN ambit_customer AS c ";
                                    $sql .= " ON a.`apa_id` = b.`apa_id` AND a.`cus_id`=c.`ac_id` ";
                                    $sql .= "WHERE b.apa_id =".$v["apa_id"]." ORDER BY bid_amount DESC";
                                    
                                    $result = getDetails(doSelect3($sql));                                    
                                    $i = 0;
                                    foreach($result as $k=>$v1){
                                    	$i++;
                                    ?>
                                 <tr>
                                    <?php
                                       $image=getProductPhoto($v["apa_id"]);
                                       ?>
                                    <td class="text-center" style="vertical-align: middle">
                                       <a  href="product.php?id=<?php echo $v1["apa_id"] ?>"><img width="70px" src="vendor/product_photo/<?php echo $image; ?>"> </a>
                                    </td>
                                    <td class="text-left" style="vertical-align: middle"><a href="product.php?id=<?php echo $v1["apa_id"] ?>"><?php echo  $v1["name"];  ?></a> </td>
                                    <td class="text-center" style="vertical-align: middle"><?php echo $v1["id"];  ?></td>
                                    <td class="text-center" style="vertical-align: middle"><?php echo $v1["bid_amount"].get_currency();  ?></td>
                                    <td class="text-center" style="vertical-align: middle">
                                       <?php
                                          if($v1["status"] == 1){
                                          echo '<span style="color: green">Winner<br/>End of Auction</span>';
                                          }elseif($v1["auction_status"] == 1){
                                          echo '<i class="fa fa-check" style="color: blue"></i>';
                                          }
                                           	
                                          ?>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle">
                                       <?php 
                                          echo $v1["nick_name"];
                                          ?>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle"><?php echo $v1["date"]; ?></td>
                                 </tr>
                                 <?php
                                    }
                                    ?>							
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <!--Middle Part End-->
                  </div>
               </div>
               <!-- //Main Container -->
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $lang_296; ?></button>            
         </div>
      </div>
   </div>
</div>


<!-- Modal List of Auctioneers -->
<div class="modal fade" id="auctioneer_list" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h2 class="modal-title" id="myModalLabel" style = "text-align:center; font-weight: bold; font-size:22px;  color:#bd0000;"><?php echo $lang_322; ?></h2>
         </div>
         <div class="modal-body" style="min-height: 100px; font-family:serif;  /*font-size: 22px; color: green;*/">
           	<!-- Main Container  -->
			<div class="main-container container">				
				<div class="row">
					<!--Middle Part Start-->
					<div id="content" class="col-sm-12">
							<?php
							$sql = "SELECT a.ac_id,a.name, a.nick_name, a.email, a.phone, a.post_code, a.country, a.city, a.address, a.status FROM ambit_customer AS a ";
							$sql .= " JOIN ambit_add2wish AS b ";
							$sql .= " ON a.ac_id=b.aaw_ac_id";
							$sql .= " WHERE b.`aaw_apa_id` = ".$v["apa_id"];
							$sql .= " ORDER BY a.ac_id;";
							
							$result = getDetails(doSelect3($sql));
							?>
									
							<div class="table-responsive">
								<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th class="va-m"><?php echo $lang_323; ?> </th>
										<th class="va-m"><?php echo $lang_324; ?> </th>
										<th class="va-m"><?php echo $lang_325; ?> </th>
										<th class="va-m"><?php echo $lang_326; ?> </th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach($result as $k=>$v2){

										?>
										<tr>
										<td class="text-center"><?php echo ucfirst($v2["nick_name"]);  ?></td>
										<td class="text-center"><?php echo $v2["country"];  ?></td>
										<td class="text-center"><?php echo $v2["city"];  ?></td>
										<td class="text-center">
										<?php 
										$purchase_count = getDetails(doSelect3("SELECT COUNT(*) AS cnt FROM ambit_shipment_status WHERE payment_status=1 AND ass_ac_id=".$v2["ac_id"]));
											echo $purchase_count[0]["cnt"];
										
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
					<!--Middle Part End-->					
				</div>
			</div>
			<!-- //Main Container -->
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $lang_296; ?></button>            
         </div>
      </div>
   </div>
</div>


<!-- Modal All offers from the seller -->
<div class="modal fade" id="product_by_seller" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h2 class="modal-title" id="myModalLabel" style = "text-align:center; font-weight: bold; font-size:22px;  color:#bd0000;"><?php echo $lang_333; ?></h2>
         </div>
         <div class="modal-body" style="min-height: 100px; font-family:serif;">
         	<h3 style="color: green; font-weightbold;"><?php echo $lang_334; ?> <span style="color:blue;">
         	<?php 
         	$nick_name = seeMoreDetails("company", "vendor_registration", array("vr_id" => $v["apa_vr_id"]));
			echo $nick_name;
			?>
			</span></h3>
			<div class="table-responsive">
	           <table class="table table-bordered table-hover">
	              <thead>
	                 <tr>
	                    <td class="text-center" style="vertical-align: middle"><?php echo $lang_327; ?></td>
	                    <td class="text-left" style="vertical-align: middle"><?php echo $lang_328; ?> </td>
	                    <td class="text-center" style="vertical-align: middle"><?php echo $lang_312; ?></td>
	                    <td class="text-center" style="vertical-align: middle"><?php echo $lang_329; ?> </td>
	                    <td class="text-center" style="vertical-align: middle"><?php echo $lang_330; ?> </td>
	                 </tr>
	              </thead>
	              <tbody>
	                 <?php
	                    $query = "SELECT apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size, reserve_price, price,listing_duration, DATE(posting_date) as start_date,status,stock,currency ";
	  					$query .= " FROM ambit_product_add WHERE status = 1 and posting_type = 1 and apa_vr_id=".trim($v["apa_vr_id"]);
	  					//$query .= " FROM ambit_product_add WHERE status = 1 ";
	                     $result = getDetails(doSelect3($query));     
	                                                   
	                    $i = 0;
	                    foreach($result as $k=>$v3){
	                    	$i++;
	                    ?>
	                 <tr>
	                    <?php
	                       $image=getProductPhoto($v3["apa_id"]);
	                       
	                        $price_part=explode("||",$v3["price"]);
							?>
	                    <td class="text-center" style="vertical-align: middle">
	                       <a  href="product.php?id=<?php echo $v["apa_id"] ?>" target="_blank"><img width="70px" src="vendor/product_photo/<?php echo $image; ?>"> </a>
	                    </td>
	                    <td class="text-left" style="vertical-align: middle"><a href="product.php?id=<?php echo $v3["apa_id"] ?>"><?php echo  $v3["name"];  ?></a> </td>
	                    <td class="text-center" style="vertical-align: middle"><?php echo currency1($v3["currency"],$price_part[0]);  ?></td>
	                    <td class="text-center" style="vertical-align: middle"><?php echo $v3["start_date"];  ?></td>
	                    <td class="text-center" style="vertical-align: middle"><?php echo $v3["listing_duration"];?></td>
	                 </tr>
	                 <?php
	                    }
	                    ?>							
	              </tbody>
	           </table>
	        </div>


         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $lang_296; ?></button>            
         </div>
      </div>
   </div>
</div>



<!-- Modal Show similar auction products -->
<div class="modal fade" id="similar_auction_products" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
            <h2 class="modal-title" id="myModalLabel" style = "text-align:center; font-weight: bold; font-size:22px;  color:#bd0000;"><?php echo $lang_332; ?></h2>
         </div>
         <div class="modal-body" style="min-height: 100px; font-family:serif;">
         <?php
         $category_detail = getDetails(doSelect1("category, sub_cat, sub_sub_cat", "ambit_product_add", array("apa_id" => $v["apa_id"])));
         $category 	 = $category_detail[0]["category"];
         $sub_cat	 = $category_detail[0]["sub_cat"];
         $sub_sub_cat= $category_detail[0]["sub_sub_cat"];
         
         $category_name 	 = seeMoreDetails("pc_name", 	"product_category", 	array("pc_id" => $category));
         $sub_cat_name	 	 = seeMoreDetails("psc_name", 	"product_sub_category", array("psc_id" => $sub_cat));
         $sub_sub_cat_name   = seeMoreDetails("pssc_name", 	"product_sub_sub_cat", 	array("pssc_id" => $sub_sub_cat));
         ?>
         	<h3 style="color: green; font-weightbold;"><?php echo $lang_331; ?> <span style="color:blue;">
         	<?php 
         	$category_str = '';
         	if($category > 0){
				$category_str .= $category_name;
				if($sub_cat > 0){
					$category_str .= " / ".$sub_cat_name;
					if($sub_sub_cat > 0){
						$category_str .= " / ".$sub_sub_cat_name;
					}
				}
			}
			echo $category_str;
			?>
			</span></h3>
			<div class="table-responsive">
	           <table class="table table-bordered table-hover">
	              <thead>
	                 <tr>
	                    <td class="text-center" style="vertical-align: middle"><?php echo $lang_327; ?></td>
	                    <td class="text-left" style="vertical-align: middle"><?php echo $lang_328; ?> </td>
	                    <td class="text-center" style="vertical-align: middle"><?php echo $lang_312; ?></td>
	                    <td class="text-center" style="vertical-align: middle"><?php echo $lang_329; ?></td>
	                    <td class="text-center" style="vertical-align: middle"><?php echo $lang_330; ?></td>
	                 </tr>
	              </thead>
	              <tbody>
	                 <?php
	                     
$select="apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size,currency,price,status,stock, reserve_price,DATE(posting_date) as start_date, listing_duration";
$result=getDetails(doSelect1($select,"ambit_product_add",array("status"=>1, "posting_type"=>'1', "category" => $category_detail[0]['category'], "sub_cat" => $category_detail[0]['sub_cat'], "sub_sub_cat" => $category_detail[0]['sub_sub_cat']),' ORDER BY apa_id'));
	                                                   
	                   
	                    foreach($result as $k=>$v4){
	                    ?>
	                 <tr>
	                    <?php
	                       $image=getProductPhoto($v4["apa_id"]);
	                       
	                       $price_part=explode("||",$v4["price"]);
	                       ?>
	                    <td class="text-center" style="vertical-align: middle">
	                       <a  href="product.php?id=<?php echo $v["apa_id"] ?>" target="_blank"><img width="70px" src="vendor/product_photo/<?php echo $image; ?>"> </a>
	                    </td>
	                    <td class="text-left" style="vertical-align: middle"><a href="product.php?id=<?php echo $v4["apa_id"] ?>"><?php echo  $v4["name"];  ?></a> </td>
	                    <td class="text-center" style="vertical-align: middle"><?php echo currency1($v4["currency"],$price_part[0]);   ?></td>
	                    <td class="text-center" style="vertical-align: middle"><?php echo $v4["start_date"];  ?></td>
	                    <td class="text-center" style="vertical-align: middle"><?php echo $v4["listing_duration"];?></td>
	                 </tr>
	                 <?php
	                    }
	                    ?>							
	              </tbody>
	           </table>
	        </div>


         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $lang_296; ?></button>            
         </div>
      </div>
   </div>
</div>



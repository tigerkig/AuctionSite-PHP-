
<style>
		
	@media only screen and (max-width: 480px) { 
		
		div.tab-slider h3.modtitle {
		    position: relative; 
		    top: 5px;
		}
		
		div.tab-slider .so-listing-tabs .ltabs-tabs-container .ltabs-tabs-wrap .ltabs-tabs li span {
	            padding:0 5px !important; 
	            font-size: 10px;
	             
	    }
	    .ltabs-tabs-container{
			height:50px;
			display: inline-block;
		
		}
		
		.so-listing-tabs .ltabs-wrap {
		   /* overflow: hidden;
		    	 display:flex;
			  flex-direction: column;
			  align-items: center;*/
		}
		
		
		div.so-listing-tabs .ltabs-tabs-container .ltabs-tabs-wrap.ltabs-selectbox .ltabs-tabs {
		    position: revert !important; 
		   /* top: 28px;*/
		    left: 0;
		    width: 100%;
		    margin: 0 !important;
		    border: 1px solid #ddd;
		    border-bottom-right-radius: 3px;
		    border-bottom-left-radius: 3px;
		    overflow: hidden;
		    background: #fff;
		    display: inline !important; 
		    z-index: 65;
		}
		
		div.tab-slider .so-listing-tabs .ltabs-tabs-container .ltabs-tabs-wrap .ltabs-tabs li.tab-sel {
		    background-color: white;
		    border-left: 1px solid #ddd;
		    border-bottom: 1px solid white;
		    margin-top: 1px;
		    padding-bottom: 1px;
		    margin-bottom: 0px;
		    border-right: 1px solid #ddd;
		    border-top: 3px solid #3498db;
		}
		
		/* div */
	}
	
	@media only screen and (max-width: 1200px) { 
		
		div.tab-slider h3.modtitle {
		    position: relative; 
		    top: 5px;
		}
		
		div.tab-slider .so-listing-tabs .ltabs-tabs-container .ltabs-tabs-wrap .ltabs-tabs li span {
	            padding:0 8px !important; 
	            font-size: 10px;
	    }
	    
	    div.tab-slider .so-listing-tabs .ltabs-tabs-container .ltabs-tabs-wrap .ltabs-tabs {
		    float: left !important;
		    margin-right: 80px;
		}
	}
	
</style>


<div class="module tab-slider titleLine">
   <h3 class="modtitle">Auction Sale</h3>
   <div id="so_listing_tabs_2" class="so-listing-tabs first-load module">
      <div class="loadeding"></div>
      <div class="ltabs-wrap ">
         <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="http://localhost/ytc_templates/opencart/so_market/" data-type_source="0" style="width:100%">
            <!--Begin Tabs-->
            <div class="ltabs-tabs-wrap" style="width:100%">
               <div class="item-sub-cat">
                  <ul class="ltabs-tabs cf" style="display:flex !important; flex-wrap:wrap">
                     <?php
                        //$cat_listing_for_2ndslider=getDetails(doSelect1("pc_id,pc_name","product_category",array(),' ORDER BY rand() LIMIT 3'));
                        $cat_listing_for_2ndslider=getDetails(doSelect1("pc_id,pc_name","product_category",array(),' LIMIT 8'));
                        foreach($cat_listing_for_2ndslider as $k3=>$v3){
                        
                        ?>
                     		<li class="ltabs-tab <?php if($k3==0) echo "tab-sel";  ?>" data-category-id="<?php echo $v3["pc_id"];  ?>" data-active-content=".items-category-<?php echo $v3["pc_id"];  ?>"> <span class="ltabs-tab-label"><?php echo $v3["pc_name"];  ?></span> </li>
                     <?php
                        }
                        ?>
                  </ul>
               </div>
            </div>
            <!-- End Tabs-->
         </div>
         <div class="ltabs-items-container">
            <!--Begin Items-->
            <?php
               foreach($cat_listing_for_2ndslider as $k3=>$v3){
               ?>	
            <div class="ltabs-items <?php if($k3==0) echo "ltabs-items-selected";  ?> items-category-<?php echo $v3["pc_id"];  ?> grid" data-total="10">
               <div class="ltabs-items-inner ltabs-slider ">
                  <?php
                     if(isset($_COOKIE['vr_id'])){
                     	$vr_id=trim($_COOKIE['vr_id']);
                     }else{
                     	$vr_id=0;
                     }
                     $con1=array();
                     if($vr_id !=0){
                     	$con1=array("apa_vr_id"=>$vr_id);	
                     }
                     $condition=array("status"=>1,"category"=>$v3["pc_id"],"posting_type"=>1);
                     $condition=array_merge($condition,$con1);		
                     date_default_timezone_set("America/Chicago");
                     $curdatetime = date("Y-m-d H:i:s");
                     $select="apa_id,apa_vr_id,name,category,  sub_cat,sub_sub_cat,features,description,weight,color,brand,size,currency,price,stock,video,status,selling_price,posting_type,listing_duration,listing_start, posting_date, new_flag, warranty_flag, warranty_long, original_flag, auth_flag, view_count, TIME_TO_SEC(TIMEDIFF(listing_duration,NOW())) as diff_time";
                     $query=doSelect2($select,"ambit_product_add",$condition);
                     $query .= " and listing_duration >'".$curdatetime."' and listing_start <= '".$curdatetime."' ORDER BY time_sort DESC limit 6";
                     $result=getDetails(doSelect3($query));
                     
                     foreach($result as $k=>$v){					
                     					?>
                  <div class="ltabs-item product-layout">
                     <div class="product-item-container slider_width">
						 
                     <div class="left-block">
		                     <div class="product-image-container  second_img ">
		                        <?php
		                           $select1 = "api_id,image,status";
		                           $image = getDetails(doSelect1($select1, "ambit_product_image", array("api_apa_id" => $v["apa_id"]) , ' LIMIT 0,1'));
		                           foreach ($image as $k1 => $v1)
		                           {
		                               $cart_image = $v1["image"];
		                           ?>	
		                        <img src="vendor/product_photo/<?php echo $v1["image"]; ?>"  alt="<?php echo $v["name"]; ?>" class="img-responsive ex_auction_boder" />
		                        <?php
		                           }
		                           $image = getDetails(doSelect1($select1, "ambit_product_image", array("api_apa_id" => $v["apa_id"],"status" => 1) , ' LIMIT 1,1'));
		                           if (!empty($image))
		                           {
		                               foreach ($image as $k1 => $v1)
		                               {
		                           ?>
		                        <img src="vendor/product_photo/<?php echo $v1["image"]; ?>"  alt="<?php echo $v["name"]; ?>" class="img_0 img-responsive ex_auction_boder" />
		                        <?php
		                           }
		                           }
		                           ?>
		                     </div>
		                     <!--Sale Label-->
		                     <?php
		                        if ($v["selling_price"] > 0)
		                        {
		                        ?>
		                     <span class="label label-sale">Sale</span>
		                     <?php
		                        }
		                        if ($v["posting_type"] == 1)
		                        {
		                        ?>
		                     <span class="label label-new">Auction</span>
		                     <?php
		                        }
		                        ?>
		                   
		                     <!--full quick view block-->
		                     <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.php?id=<?php echo $v["apa_id"]; ?>">  <?php echo $lang_263; ?></a>
		                     <!--end full quick view block-->
		                  </div>
		                  <div class="right-block">
		                     <div class="caption">
		                        <div class="galleryTitle"><a href="product.php?id=<?php echo $v["apa_id"]; ?>" class="titleTxt"><?php echo $v["name"]; ?></a></div>
		                        <div class="ratings flexRating">
									   <div style="text-align:center">Number of views: <?php echo $v["view_count"];?></div>
			                           <div class="rating-box" style="text-align:center">
			                              <?php
			                                 getRatingStar($v["apa_id"]);
			                                 ?>
			                                 <!-- &nbsp;&nbsp; Number of views: <?php echo $v["view_count"];?> -->
			                           </div>
		                        </div>
		                      

								<div class="flexDiv">
									<div class="currentBID flex1">
										<div>
											<?php 
												$highest_bid_amount = higest_bid_amount($v["apa_id"]);
												if ($highest_bid_amount != 0)
											{	
												echo "CURRENT BID";
											}
											else {
												echo "BUY NOW";
											}
											?>
											
										</div>
										<div  class="titleTxt">
											<?php
												
												if ($highest_bid_amount != 0)
												{	
													echo higest_bid($v["apa_id"]);							
												} 
												else {
													$price_part = explode("||", $v["price"]);
													if (trim($price_part[0]) != "")
														echo currency1($v["currency"], $price_part[0] - $price_part[2]); 
												}
											?>
										</div>
									</div>

									<div class="flex1 textRight">
										<?php 
											date_default_timezone_set("America/Chicago");
											$curdatetime = strtotime(date("Y-m-d H:i:s"));
											if(strtotime($v["listing_start"]) < $curdatetime ){ ?>
												<div >TIME REMAINING </div>
												<div  class="titleTxt">
													<!-- 0 Days 22:24:51  -->
													<div class="defaultCountdown-<?php echo $v["apa_id"]; ?>" style="display:flex;justify-content: flex-end;color: #e74c3c;    font-weight: 700;"></div>

													<script>
														$(function() {													
															let d = new Date();
															let timestamp = d.getTime();
															var diffTime = <?php echo $v['diff_time']; ?> ;
															var listing_duration = timestamp + diffTime * 1000;
															changed_duration = new Date(listing_duration);
															$('.defaultCountdown-<?php echo $v["apa_id"]; ?>').countdown(changed_duration, function(event) {
																var $this = $(this).html(event.strftime(''
																+ '<div class="time-item time-day"><div class="num-time">%D</div></div>'
																+ '<div >&nbsp;Days&nbsp;</div>'
																+ '<div class="time-item time-hour"><div class="num-time">%H</div></div>'
																+ '<div>:</div>'
																+ '<div class="time-item time-min"><div class="num-time">%M</div></div>'
																+ '<div >:</div>'
																+ '<div class="time-item time-sec"><div class="num-time">%S</div></div>'));
															});
															
														});                             

													</script>
												</div>
										<?php }else{ ?>   
											<div >THIS LISTING HAS NOT STARTED</div>
										<?php } ?>
									</div>
								</div>
								
		                     </div>
		                     <?php
		                        $stock = trim($v["stock"]);
		                        ?>
							<div class="button-group" style=" display: flex; justify-content: space-between;">
		                     <?php
		                        if ($v["selling_price"] > 0)
		                        {
		                        ?>
		                     
								 <div>
									<!--<button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" <?php if ($stock > 0)
									{ ?> onclick="cart.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php $v["name"] = str_replace("'", "@#@#@#@#", $v["name"]);
									echo $v["name"]; ?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');" <?php
									}
									else
									{ ?> onclick="empty_alert();" <?php
									} ?>  ><i class="fa fa-shopping-cart"></i> <span class=""><?php echo $lang_264; ?></span></button>-->
									<?php
									if (!isset($_SESSION["ac_id"]))
									{
									?>
									<button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php echo $v["name"]; ?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');"><i class="fa fa-heart"></i></button>
									<?php
									}
									else
									{
									?>
									<button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist3.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php echo $v["name"]; ?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');"><i class="fa fa-heart"></i></button>
									<?php
									}
									?>
									<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php echo $v["name"]; ?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');"><i class="fa fa-exchange"></i></button>
								</div>							
		                     <?php
		                        }
		                        ?>
								 <div class="button-group" style="margin:0; flex:1; margin-left:5px">
									<button onclick="product_details('<?php echo $v["apa_id"]; ?>');" style="background-color: #3498db;width:100%;padding-top:4px;padding-bottom:4px;" class="addToCart" type="button" data-toggle="tooltip"  ><i class="fa fa-gavel fa-2x"></i> <span class="">Bid Now</span></button>
								</div>
							</div>
		                    
		                  </div>
                        <!-- right block -->
                     </div>
                  </div>
                  <?php
                     }
                     if(empty($result)){
                     echo '<h2>No data found !</h2>';	
                     }
                     ?>
               </div>
            </div>
            <?php
               }
               ?>					
         </div>
         <!--End Items-->
      </div>
   </div>
</div>
<script>
   function product_details(id){
   	window.location='product.php?id='+id
   }
   
</script>
<?php
   session_start();
   require_once ("function.php");
   include ("include/header.php");
   
   date_default_timezone_set("America/Chicago");		
	$currnet_date = date("Y-m-d H:i:s");
   ?>
<!-- //Header Top -->
<!-- Header center -->
<?php
   include ("include/header_center.php");
   ?>
<!-- //Header center -->
<!-- Header Bottom -->
<div class="header-bottom">
   <div class="container">
      <div class="row">
         <?php
            include ("include/side_menu_close.php");
            ?>
         <!-- Main menu -->
         <?php
            include ("include/main_menu.php");
            ?>	
         <!-- //end Main menu -->
      </div>
   </div>
</div>
<!-- Navbar switcher -->
<!-- //end Navbar switcher -->
</header>
<!-- //Header Container  -->

<!-- Main Container  -->
<div class="main-container container">
   <ul class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i></a></li>
      <li><a href="<?php echo $_SERVER["REQUEST_URI"]; ?>"><?php echo $lang_302; ?></a></li>
   </ul>
   <div class="row">
      <!--Middle Part Start-->
      <div id="content" class="col-md-12 col-sm-12">
         <!-- //Product Tabs -->
         <!-- <?php echo $lang_3; ?> -->
         <div class="products-list row grid">
            <?php
               if (isset($_COOKIE['vr_id']))
               {
                   $vr_id = trim($_COOKIE['vr_id']);
               }
               else
               {
                   $vr_id = 0;
               }
               $con1 = array();
               if ($vr_id != 0)
               {
                   $con1 = array(
                       "apa_vr_id" => $vr_id
                   );
               }
               $condition = array(
                   "status" => 1,
                   "posting_type" => 1
               );
               $condition = array_merge($condition, $con1);
               
               date_default_timezone_set("America/Chicago");
			   $curdatetime = date("Y-m-d H:i:s");
			  
               $select = "apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size,currency,price,selling_price,status,stock,posting_type,listing_duration, posting_date, view_count, TIME_TO_SEC(TIMEDIFF(listing_duration,NOW())) as diff_time";
               $query = doSelect2($select, "ambit_product_add", $condition);
			   $query .= " AND listing_duration > '".$curdatetime."' and  listing_start <='".$curdatetime."' ORDER BY apa_id DESC";     
               $result = getDetails(doSelect3($query));
               
               $nCnt = 0;
               
               foreach ($result as $k => $v)
               {
               	
               	$nCnt += 1;
				if($nCnt % 4 == 1){
				?>
					<div class="col-md-12 col-sm-12 col-xs-12">	
				<?php	
				}
               	?>
		            <div class="product-layout col-md-3 col-sm-6 col-xs-12 ">
		               <div class="product-item-container">
		                  <div class="left-block">
		                     <div class="product-image-container  second_img ">
		                        <?php
		                           $select1 = "api_id,image,status";
		                           //$image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$v["apa_id"],"status"=>1),' LIMIT 0,1'));
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
		                     <span class="label label-sale"><?php echo $lang_303; ?></span>
		                     <?php
		                        }
		                        if ($v["posting_type"] == 1)
		                        {
		                        ?>
		                     <span class="label label-new"><?php echo $lang_304; ?></span>
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
									   <div style="text-align:center"><?php echo $lang_305; ?> <?php echo $v["view_count"];?></div>
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
													echo $lang_310;
												}
												else {
													echo $lang_308;
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
										<div ><?php echo $lang_306; ?></div>
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
									<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php echo $v["name"]; ?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');location.reload();"><i class="fa fa-exchange"></i></button>
								</div>							
		                     <?php
		                        }
		                        ?>
								 <div class="button-group" style="margin:0; flex:1; margin-left:5px">
									<button onclick="product_details('<?php echo $v["apa_id"]; ?>');" style="background-color: #3498db;width:100%;padding-top:4px;padding-bottom:4px;" class="addToCart" type="button" data-toggle="tooltip"  ><i class="fa fa-gavel fa-2x"></i> <span class=""><?php echo $lang_308; ?></span></button>
								</div>
							</div>
		                    
		                  </div>
		                  <!-- right block -->
		               </div>
		            </div>
		            
	            <?php
					if($nCnt % 4 == 0){
					?>
								</div>
					<?php	
					}											
					?>
            <div class="clearfix visible-xs-block"></div>
            <?php
               }
               if (empty($result))
               {
                   echo '<h2>No data found !</h2>';
               }
               ?>
         </div>
         <!-- end Related  Products--></div>
      </div>
   </div>
   <!--Middle Part End-->
</div>
<!-- //Main Container -->
<!-- Footer Container -->
<?php
   include ("include/footer.php");
   ?>
<script>
	var current_date = '<?php echo $current_date;?>';
   function product_details(id){
   	window.location='product.php?id='+id;
   }
</script>
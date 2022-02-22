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
      <li><a href="<?php echo $_SERVER["REQUEST_URI"]; ?>">Auction Sale</a></li>
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
			//   $curdatetime = date("Y-m-d");
               $select = "apa_id,apa_vr_id,name,category,  sub_cat,sub_sub_cat,features,description,weight,color,brand,size,currency,price,stock,video,status,selling_price,posting_type,listing_duration, posting_date, new_flag, warranty_flag, warranty_long, original_flag, auth_flag, view_count, TIME_TO_SEC(TIMEDIFF(listing_duration,NOW())) as diff_time";
            //    $select = "apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size,currency,price,selling_price,status,stock,posting_type,listing_duration, posting_date, view_count";
               $query = doSelect2($select, "ambit_product_add", $condition);
               //$query .= " AND listing_duration >='" . date('Y-m-d') . "' ORDER BY apa_id DESC";
              // $query .= " AND listing_duration >=DATE('".$curdatetime."') AND TIME(posting_date)  >= TIME('".$curdatetime."') ORDER BY apa_id DESC";
            //   $query .= " AND CONCAT(listing_duration, ' ',TIME(posting_date)) >='".$curdatetime."' ORDER BY apa_id DESC";
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
		                           $image = getDetails(doSelect1($select1, "ambit_product_image", array(
		                               "api_apa_id" => $v["apa_id"]
		                           ) , ' LIMIT 0,1'));
		                           foreach ($image as $k1 => $v1)
		                           {
		                               $cart_image = $v1["image"];
		                           ?>	
		                        <img src="vendor/product_photo/<?php echo $v1["image"]; ?>"  alt="<?php echo $v["name"]; ?>" class="img-responsive ex_auction_boder" />
		                        <?php
		                           }
		                           $image = getDetails(doSelect1($select1, "ambit_product_image", array(
		                               "api_apa_id" => $v["apa_id"],
		                               "status" => 1
		                           ) , ' LIMIT 1,1'));
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
		                     <!--countdown box-->
		                     <div class="countdown_box">
		                        <div class="countdown_inner">
		                           <div class="title">This offer ends</div>
		                           <div class="defaultCountdown-<?php echo $v["apa_id"]; ?>"></div>
		                        </div>
		                     </div>
		                     <!--end countdown box-->
		                     <script>
		                        $(function() {
		                        	let d = new Date();
									let timestamp = d.getTime();
									var diffTime = <?php echo $v['diff_time']; ?> ;
									var listing_duration = timestamp + diffTime * 1000;
									var changed_duration = new Date(listing_duration);
																
									$('.defaultCountdown-<?php echo $v["apa_id"]; ?>').countdown(changed_duration, function(event) {
		                        		var $this = $(this).html(event.strftime(''
		                        		   + '<div class="time-item time-day"><div class="num-time">%D</div><div class="name-time">Day </div></div>'
		                        		   + '<div class="time-item time-hour"><div class="num-time">%H</div><div class="name-time">Hour </div></div>'
		                        		   + '<div class="time-item time-min"><div class="num-time">%M</div><div class="name-time">Min </div></div>'
		                        		   + '<div class="time-item time-sec"><div class="num-time">%S</div><div class="name-time">Sec </div></div>'));
		                        	});
		                        
		                        });
		                     </script>
		                     <!--full quick view block-->
		                     <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.php?id=<?php echo $v["apa_id"]; ?>">  <?php echo $lang_263; ?></a>
		                     <!--end full quick view block-->
		                  </div>
		                  <div class="right-block">
		                     <div class="caption" style="height: 135px;">
		                        <h4 style="height:33px"><a href="product.php?id=<?php echo $v["apa_id"]; ?>"><?php echo $v["name"]; ?></a></h4>
		                        <div class="ratings">
			                           <div class="rating-box" style="text-align:center">
			                              <?php
			                                 getRatingStar($v["apa_id"]);
			                                 ?>
			                                 <!-- &nbsp;&nbsp; Number of views: <?php echo $v["view_count"];?> -->
			                           </div>
									   <div style="text-align:center">Number of views: <?php echo $v["view_count"];?></div>
		                        </div>
		                        
									

		                        <?php
		                        	$highest_bid_amount = higest_bid_amount($v["apa_id"]);
									
		                           if ($highest_bid_amount != 0)
		                           {
		                           ?>

		                        <?php
		                        		$query = "SELECT nick_name FROM ambit_customer AS a JOIN ambit_product_bid AS b ON a.ac_id = b.cus_id WHERE bid_amount =".$highest_bid_amount." AND b.apa_id=".$v["apa_id"];
                        			
	                        			$buyer_detail = getDetails(doSelect3($query));
	                        			$nick_name = $buyer_detail[0]["nick_name"];

	                        			echo '<div style="text-align: center;"><button class="label label-percent" style="line-height:16px;border-style:none;margin-top:5px">Last Bid : '.higest_bid($v["apa_id"]).' <br/> Bidder: '.$nick_name.'</button></div>';
              
		                           } ?>
		                     </div>
		                     <?php
		                        $stock = trim($v["stock"]);
		                        ?>
		                     <?php
		                        if ($v["selling_price"] > 0)
		                        {
		                        ?>
		                     <div class="button-group" style=" display: flex; justify-content: space-between;">
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
		                           if ($v["selling_price"] > 0)
		                           {
		                           ?>					
		                        <div class="price" style="display:grid">
		                           <?php
		                              $price_part = explode("||", $v["price"]);
		                              if (trim($price_part[0]) != "")
		                              {
		                              ?>

									<?php
										if($v["posting_type"]==1){
									?>
									<?php 
										$highest_bid_amount = higest_bid_amount($v["apa_id"]);
										if($highest_bid_amount != 0){
									?>
										<span class="price-new"><?php echo higest_bid($v["apa_id"])  ?></span> 
									<?php 
										}else{ ?>
		                           		<span class="price-new"><?php echo currency1($v["currency"], $price_part[0] - $price_part[2]); ?></span> 

									<?php }
									}
									?>

		                           <?php
		                              }
		                              if (trim($price_part[2]) != "" && trim($price_part[2]) != '0')
		                              {
		                              ?>
		                           <span class="price-old" style="text-align: end;"><?php echo currency1($v["currency"], $old = $price_part[0]); ?></span>
		                           <?php
		                              }
		                              ?>

									  
		                        </div>
		                        <?php
		                           }
								?>
							</div>
		                     <?php
		                        }
		                        ?>
		                     <div class="button-group">
		                        <button onclick="product_details('<?php echo $v["apa_id"]; ?>');" style="background-color: #3498db;width:100%;" class="addToCart" type="button" data-toggle="tooltip"  ><i class="fa fa-gavel fa-2x"></i> <span class="">Bid Now</span></button>
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
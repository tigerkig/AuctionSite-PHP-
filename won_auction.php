<?php
   session_start();
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
<!-- Navbar switcher -->
<!-- //end Navbar switcher -->
</header>
<!-- //Header Container  -->
<!-- Main Container  -->
<div class="main-container container">
   <ul class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i></a></li>
      <li><a href="<?php  echo $_SERVER["REQUEST_URI"]; ?>"><?php echo $lang_299; ?></a></li>
   </ul>
   <div class="row" style="min-height:214px">
      <!--Middle Part Start-->
      <div id="content" class="col-md-12 col-sm-12">
         <!-- //Product Tabs -->
         <!-- <?php echo $lang_3; ?> -->
         <div class="products-list row grid">
            <?php
               $won_apa_id=getDetails(doSelect("apa_id,id,cus_id,bid_amount","ambit_product_bid",array("status"=>1,"cus_id"=>$_SESSION["ac_id"],"purchase_status"=>0)));
               //$won_apa_id=getDetails(doSelect("apa_id,id,cus_id,bid_amount", "ambit_product_bid", array("cus_id"=>$_SESSION["ac_id"], "purchase_status"=>0)));
               foreach($won_apa_id as $k5=>$v5){
               $condition=array("apa_id"=>trim($v5["apa_id"]));					
               $select="apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size,currency,price,reserve_price, selling_price,status,stock,posting_type,listing_duration";
               $result=getDetails(doSelect1($select,"ambit_product_add",$condition));
               
               foreach($result as $k=>$v){		
                  $highest_bid=trim(seeMoreDetails('MAX(bid_amount)','ambit_product_bid',array("apa_id"=>$v["apa_id"],"bid_status"=>1)));
                  if($highest_bid > $v1["reserve_price"]){			
            ?>
                  <div class="product-layout col-md-3 col-sm-6 col-xs-12 ">
                     <div class="product-item-container">
                        <div class="left-block">
                           <div class="product-image-container  second_img ">
                              <?php
                                 $select1="api_id,image,status";
                                 // $image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$v["apa_id"],"status"=>1),' LIMIT 0,1'));
                                 $image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$v["apa_id"]),' LIMIT 0,1'));
                                 foreach($image as $k1=>$v1){
                                    $cart_image=$v1["image"];
                                 ?>	
                              <img src="vendor/product_photo/<?php echo $v1["image"]; ?>"  alt="Apple Cinema 30&quot;" class="img-responsive" />
                              <?php
                                 }
                                 $image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$v["apa_id"],"status"=>1),' LIMIT 1,1'));
                                 if(!empty($image)){
                                    foreach($image as $k1=>$v1){
                                    ?>
                              <img src="vendor/product_photo/<?php echo $v1["image"]; ?>"  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" />
                              <?php
                                 }
                                 }
                                 ?>
                           </div>
                           <!--Sale Label-->
                           <span class="label label-sale"><?php echo $lang_348?></span>
                        </div>
                        <div class="right-block">
                           <div class="caption">
                              <div class="galleryTitle"><a href="product.php?id=<?php echo $v["apa_id"]; ?>" class="titleTxt"><?php echo $v["name"]; ?></a></div>

                              <div class="ratings">
                                 <div class="rating-box">
                                    <?php
                                       getRatingStar($v["apa_id"]);
                                       ?>
                                 </div>
                              </div>
                              <div class="currentBID flex1 space_between">
                                 <div>
                                    <?php echo $lang_347?> 											
                                 </div>
                                 <div class="titleTxt">
                                    <?php 
                                       $auction_price = ($highest_bid > $v["reserve_price"]) ? $highest_bid : $v["reserve_price"] ;
                                       $auction_price = round($auction_price * 1.1025, 2);
                                       $currency=trim(seeMoreDetails('currency','ambit_product_bid',array("apa_id"=>$v["apa_id"],"bid_status"=>1)));
                                       $auction_price_str = currency1($currency,$auction_price);
                                       echo $auction_price_str;
                                    ?>									
                                 </div>
                              </div>
                           </div>
                           <?php
                              $stock=trim($v["stock"]);
                              ?>
                           <form action="auction_checkout.php" method="post" id="bid_now_<?php echo $v["apa_id"]; ?>">
                              <input type="hidden" name="apa_id" value="<?php echo $v["apa_id"]; ?>" />
                              <input type="hidden" name="id" value="<?php echo $v5["id"]; ?>" />
                              <input type="hidden" name="cus_id" value="<?php echo $v5["cus_id"]; ?>" />
                              <!--<input type="hidden" name="bid_amount" value="<?php echo $v5["bid_amount"]; ?>" />-->
                              <input type="hidden" name="bid_amount" value="<?php echo $auction_price; ?>" />
                           </form>
                           <div class="button-group">
                              <!--<button onclick="auction_checkout('<?php echo $v["apa_id"]; ?>','<?php echo $v5["id"]; ?>','<?php echo $v5["cus_id"]; ?>','<?php echo $v5["bid_amount"]; ?>');" style="background-color: #3498db;width:100%;" class="addToCart" type="button" data-toggle="tooltip"  ><i class="fa fa-gavel fa-2x"></i> <span class="">Purchase Product</span></button>-->
                              <button onclick="auction_checkout('<?php echo $v["apa_id"]; ?>','<?php echo $v5["id"]; ?>','<?php echo $v5["cus_id"]; ?>','<?php echo $auction_price; ?>');" style="background-color: #3498db;width:100%;border-radius:3px" class="addToCart" type="button" data-toggle="tooltip"  ><i class="fa fa-gavel fa-2x"></i> <span class=""><?php echo $lang_346?></span></button>
                           </div>
                        </div>
                        <!-- right block -->
                     </div>
                  </div>
                  <div class="clearfix visible-xs-block"></div>
            <?php
               }
               }
               }
               if(empty($won_apa_id)){
               echo '<h2>No data found !</h2>';	
               }
            ?>
         </div>
         <!-- end Related  Products-->
      </div>
   </div>
   <!--Middle Part End-->
</div>
<!-- //Main Container -->
<!-- Footer Container -->
<?php
   include("include/footer.php");
   ?>
<script>
   function auction_checkout(apa_id,id,cus_id,bid_amount){
   	
   	var formID = "#bid_now_" + apa_id;
   	$(formID).submit();
   	
   	//window.location='auction_checkout.php';
   }
   
</script>
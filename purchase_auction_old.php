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
      <li><a href="<?php  echo $_SERVER["REQUEST_URI"]; ?>">Purchase auction</a></li>
   </ul>
   <!--<div class="row">-->
   <div class="row" style="min-height:365px;">
      <!--Middle Part Start-->
      <div id="content" class="col-md-12 col-sm-12">
         <!-- //Product Tabs -->
         <!-- <?php echo $lang_3; ?> -->
         <div class="products-list row grid">
            <?php
               // $won_apa_id=getDetails(doSelect("apa_id,id,cus_id,bid_amount","ambit_product_bid",array("status"=>1,"cus_id"=>$_SESSION["ac_id"],"purchase_status"=>1)));
               $won_apa_id=getDetails(doSelect("apa_id,id,cus_id,bid_amount","ambit_product_bid",array("cus_id"=>$_SESSION["ac_id"],"purchase_status"=>1)));
               foreach($won_apa_id as $k5=>$v5){
                  $condition=array("apa_id"=>trim($v5["apa_id"]));					
                  $select="apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size,currency,price,selling_price,status,stock,posting_type,listing_duration";
                  $result=getDetails(doSelect1($select,"ambit_product_add",$condition));
               
               foreach($result as $k=>$v){					
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
                        <span class="label label-sale">You have purchased</span>
                     </div>
                     <div class="right-block">
                        <div class="caption">
                           <h4><a href="product.php?id=<?php echo $v["apa_id"]; ?>"><?php echo $v["name"]; ?></a></h4>
                           <div class="ratings">
                              <div class="rating-box">
                                 <?php
                                    getRatingStar($v["apa_id"]);
                                    ?>
                              </div>
                           </div>
                           <span class="label label-percent">Auction Price : <?php echo higest_bid($v["apa_id"]); ?></span>  
                        </div>
                        <?php
                           $stock=trim($v["stock"]);
                           ?>
                        <form action="auction_checkout.php" method="post" id="bid_now1">
                           <input type="hidden" name="apa_id" value="<?php echo $v["apa_id"]; ?>" />
                           <input type="hidden" name="id" value="<?php echo $v5["id"]; ?>" />
                           <input type="hidden" name="cus_id" value="<?php echo $v5["cus_id"]; ?>" />
                           <input type="hidden" name="bid_amount" value="<?php echo $v5["bid_amount"]; ?>" />
                        </form>
                        <div class="button-group">
                           <a href="auction_transaction_details.php?id=<?php echo $v5["id"]; ?>"  style="background-color: #3498db;width:100%;" class="addToCart" type="button" data-toggle="tooltip"  ><i class="fa fa-gavel fa-2x"></i> <span class="">Details</span></a>
                        </div>
                     </div>
                     <!-- right block -->
                  </div>
               </div>
               <div class="clearfix visible-xs-block"></div>
            <?php
               }  
               }
               if(empty($won_apa_id)){
               echo '<h2>No data found !</h2>';	
               }
               ?>
         </div>
         <!-- end Related  Products-->
         
         <!--direct buy-->
          <div class="products-list row grid">
            <?php
               // $won_apa_id=getDetails(doSelect("apa_id,id,cus_id,bid_amount","ambit_product_bid",array("status"=>1,"cus_id"=>$_SESSION["ac_id"],"purchase_status"=>1)));
               //$won_apa_id=getDetails(doSelect("apa_id,id,cus_id,bid_amount","ambit_product_bid",array("cus_id"=>$_SESSION["ac_id"],"purchase_status"=>1)));
               $won_apa_id=getDetails(doSelect("ass_apa_id, ass_ac_id, price, quantity","ambit_shipment_status",array("ass_ac_id"=>$_SESSION["ac_id"])));
	            foreach($won_apa_id as $k5=>$v5){
	               $condition=array("apa_id"=>trim($v5["ass_apa_id"]));					
	               $select="apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size,currency,price,selling_price,status,stock,posting_type,listing_duration";
	               $result=getDetails(doSelect1($select,"ambit_product_add",$condition));
	               
		               foreach($result as $k=>$v){					
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
		                     <span class="label label-sale">You have purchased</span>
		                  </div>
		                  <div class="right-block">
		                     <div class="caption">
		                        <h4><a href="product.php?id=<?php echo $v["apa_id"]; ?>"><?php echo $v["name"]; ?></a></h4>
		                        <div class="ratings">
		                           <div class="rating-box">
		                              <?php
		                                 getRatingStar($v["apa_id"]);
		                                 ?>
		                           </div>
		                        </div>
		                        <span class="label label-percent">Auction Price : <?php echo higest_bid($v["apa_id"]); ?></span>  
		                     </div>
		                     <?php
		                        $stock=trim($v["stock"]);
		                        ?>
		                  		
		                  </div>
		                  <!-- right block -->
		               </div>
		            </div>
		            <div class="clearfix visible-xs-block"></div>
		            <?php
		               }
	               }
	            if(empty($won_apa_id)){
               		echo '<h2>No data found !</h2>';	
               }
               ?>
         </div>
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
   	$( "#bid_now1" ).submit();
   	//window.location='auction_checkout.php';
   }
</script>
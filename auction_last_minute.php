

<?php
   session_start();
   require_once("function.php");
   include("include/header.php");
   ?>
<style>
   .zoomWindow{
   cursor:zoom-in !important;
   }   	
</style>
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
<div class="main-container container"   style="min-height: 350px;">
   <ul class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i></a></li>
      <li><a href="<?php  echo $_SERVER["REQUEST_URI"]; ?>">Last minute auction</a></li>
   </ul>
   <div class="row">
      <!--Middle Part Start-->
      <div id="content" class="col-md-12 col-sm-12">
         <!-- //Product Tabs -->
         <!-- <?php echo $lang_3; ?> -->
         <div class="related titleLine products-list grid module">
            <h3 class="modtitle">Last minute auction</h3>
           <div class="releate-products">
            <!-- <span>All auctions with time remaining up to 1 hour</span>-->
              
           
            	 <?php
                  //$select="apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size,currency,price,status,stock";
                  //$result=getDetails(doSelect1($select,"ambit_product_add",array("status"=>1, "posting_type"=>'1', "category" => $_GET["category_id"]),' ORDER BY apa_id DESC'));
                  
                  date_default_timezone_set("America/Chicago");
				  $current_date = date("Y-m-d H:i:s");
				  
                  $query = "SELECT apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size,currency,price,status,stock, ";
				  $query .= " TIME_TO_SEC(TIMEDIFF(CONCAT(listing_duration, ' ',listing_start), '".$current_date."')) AS diff_time ";
				//   $query .= " TIME_TO_SEC(TIMEDIFF(CONCAT(listing_duration, ' ',TIME(posting_date)), '".$current_date."')) AS diff_time ";
				  $query .= " FROM ambit_product_add ";
				  $query .= " WHERE `status`=1 AND posting_type = 1 AND listing_duration = DATE('".$current_date."') ";
				  $query .= " ORDER BY apa_id DESC";
                  
                  $result = getDetails(doSelect3($query));
                  
                  foreach($result as $k=>$v){		
                  	if($v['diff_time'] <= 3600){
						
                  ?>	
		               <div class="product-layout">
		                  <div class="product-item-container">
		                     <div class="left-block">
		                        <div class="product-image-container second_img ">
		                           <?php
		                              $select1="api_id,image,status";
		                              $image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$v["apa_id"]),' LIMIT 0,1'));
		                              foreach($image as $k1=>$v1){
		                              	$cart_image=$v1["image"];
		                              ?>	
		                           <img src="vendor/product_photo/<?php echo $v1["image"]; ?>"  alt="Apple Cinema 30&quot;" class="img-responsive" />
		                           <?php
		                              }
		                              $image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$v["apa_id"]),' LIMIT 1,1'));
		                              if(!empty($image)){
		                              foreach($image as $k1=>$v1){
		                              ?>
		                           <img src="vendor/product_photo/<?php echo $v1["image"]; ?>"  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" />
		                           <?php
		                              }
		                              }
		                              ?>
		                        </div>
		                        <!--full quick view block-->
		                        <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.php?id=<?php echo $v["apa_id"]; ?>">  <?php echo $lang_263; ?></a>
		                        <!--end full quick view block-->
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
		                           <div class="price">
		                              <?php
		                                 $price_part=explode("||",$v["price"]);
		                                 if(trim($price_part[0])!=""){
		                                 ?>
		                              <!-- <span class="price-new"><?php echo currency1($v["currency"],$price_part[0]);  ?></span>  -->
		                              <span class="price-new"><?php echo currency1($v["currency"],$price_part[0] - $price_part[2]);  ?></span> 
		                              <?php
		                                 }
		                                 if(trim($price_part[2])!="" && trim($price_part[2])!='0'){
		                                 ?>
		                              <!-- <span class="price-old"><?php echo currency1($v["currency"],$old=$price_part[2]+$price_part[0]);  ?></span> -->
		                              <span class="price-old"><?php echo currency1($v["currency"],$old=$price_part[0]);  ?></span>
		                              <?php
		                                 }
		                                 ?>
		                           </div>
		                        </div>
		                        <?php
		                           $stock=trim($v["stock"]);
		                           ?>
		                        <div class="button-group">
		                           <button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" <?php if($stock > 0){ ?> onclick="cart.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php  $v["name"] = str_replace("'", "@#@#@#@#", $v["name"]); echo $v["name"];?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');"  <?php }else{ ?> onclick="empty_alert();" <?php } ?> ><i class="fa fa-shopping-cart"></i> <span class=""><?php echo $lang_264; ?></span></button>
		                           <?php
		                              if(!isset($_SESSION["ac_id"])){
		                              ?>
		                           <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php echo $v["name"];?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');"><i class="fa fa-heart"></i></button>
		                           <?php
		                              }else{
		                              ?>
		                           <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist3.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php echo $v["name"];?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');"><i class="fa fa-heart"></i></button>
		                           <?php
		                              }
		                              ?>
		                           <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php echo $v["name"];?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');"><i class="fa fa-exchange"></i></button>
		                        </div>
		                     </div>
		                     <!-- right block -->
		                  </div>
		               </div>
               <?php
					}
                  }
                  ?>		
            </div>
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


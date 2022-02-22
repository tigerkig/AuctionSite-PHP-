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
<div class="main-container container">
   <ul class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i></a></li>
      <?php
         $path_detls=getDetails(doSelect1("name,pc_name","ambit_product_add,product_category",array("category"=>"pc_id","apa_id"=>$_GET["id"])));
         ?>
      <li><a href="#"><?php echo $path_detls[0]["pc_name"]; ?></a></li>
      <li><a href="<?php  echo $_SERVER["REQUEST_URI"]; ?>"><?php echo $path_detls[0]["name"]; ?></a></li>
   </ul>
   <div class="row">
      <!--Middle Part Start-->
      <div id="content" class="col-md-12 col-sm-12">
         <?php
            $select="apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size,currency,price,stock,video,status,selling_price,posting_type,listing_duration, new_flag, warranty_flag, warranty_long, original_flag, auth_flag, view_count";
            $result=getDetails(doSelect1($select,"ambit_product_add",array("apa_id"=>$_GET["id"])));
            foreach($result as $k=>$v){
            
            ?>	
         <div class="product-view row">
            <div class="left-content-product col-lg-10 col-xs-12">
               <div class="row">
                  <div class="content-product-left class-honizol col-sm-6 col-xs-12 ">
                     <div class="large-image  ">
                        <?php
                           $select1="api_id,image,status";
                           //$main_image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$_GET["id"],"status"=>1),' LIMIT 0,1'));
                           $main_image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$_GET["id"]),' LIMIT 0,1'));
                           $main_image=$main_image[0]["image"];
                           //$cart_image=$main_image;
                           ?>								
                        <input type="hidden" id="show_p" value="<?php echo $_GET["id"]; ?>" />
                        <input type="hidden" id="view_img" value="" />
                        <img itemprop="image" class="product-image-zoom" src="vendor/product_photo/<?php echo $main_image; ?>" data-zoom-image="vendor/product_photo/<?php echo $main_image; ?>" title="<?php echo $v["name"]; ?>" alt="<?php echo $v["name"]; ?>">
                     </div>
                     <?php
                        if(trim($v["video"]) != ""){
                        ?>
                     <a class="thumb-video pull-left" href="<?php echo $v["video"]; ?>"><i class="fa fa-youtube-play"></i>
                     </a>
                     <?php
                        }
                        ?>
                     <div id="thumb-slider" class="owl-theme owl-loaded owl-drag full_slider">
                        <?php
                           //$image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$_GET["id"],"status"=>1)));
                           $image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$_GET["id"])));
                           $show_image=$image;
                           foreach($image as $k1=>$v1){
                           	$cart_image=$v1["image"];
                           ?>
                        <a data-index="<?php echo $k1; ?>" class="img thumbnail " data-image="vendor/product_photo/<?php echo $v1["image"]; ?>" title="<?php echo $v["name"]; ?>">
                        <img src="vendor/product_photo/<?php echo $v1["image"]; ?>" title="<?php echo $v["name"]; ?>" alt="<?php echo $v["name"]; ?>">
                        </a>
                        <?php
                           }
                           ?>
                     </div>
                  </div>
                  <div class="content-product-right col-sm-6 col-xs-12">
                     <div class="title-product">
                        <h1><?php echo $v["name"]; ?></h1>
                     </div>
                     <!-- Review ---->
                     <div class="box-review form-group">
                        <div class="ratings">
                           <div class="rating-box">
                              <?php
                                 $rate=getDetails(doSelect1("count(*) as count,SUM(rating) as sum","ambit_product_review",array("apr_apa_id"=>$v["apa_id"])));
                                 $a=explode("||",rating($rate));
                                 $half_star=$a[0];
                                 $full_star=$a[1];
                                 $no_star=$a[2];
                                 for($i=1;$i<=$full_star;$i++){
                                 echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>';
                                 }
                                 for($i=1;$i<=$half_star;$i++){
                                 echo '<span class="fa fa-stack"><i class="fa fa-star-half fa-stack-1x"></i></span>';
                                 }
                                 for($i=1;$i<=$no_star;$i++){
                                 echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>';
                                 }
                                 ?>							
                           </div>
                        </div>
                        <?php
                           $review_details=getDetails(doSelect1("apr_id,apr_apa_id,apr_name,comment,rating,date","ambit_product_review",array("apr_apa_id"=>$_GET["id"]),' ORDER BY rand() LIMIT 0,2'));
                           $total_review=getDetails(doSelect1("apr_id,apr_apa_id,apr_name,comment,rating,date","ambit_product_review",array("apr_apa_id"=>$_GET["id"])));
                           ?>
                        <a class="reviews_button" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;"><?php echo count($total_review); ?> <?php echo $lang_88; ?></a>	| 
                        <a class="write_review_button" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;"><?php echo $lang_89; ?></a>
                        <!-- | <a class="reviews_button" href="vendor_details.php?id=<?php echo $v["apa_vr_id"];  ?>" ><?php echo $lang_267;  ?> : <?php echo getVendorName($v["apa_vr_id"]); ?></a> -->
                        &nbsp;|&nbsp; <span style=""><?php echo $lang_305; ?> <?php echo $v["view_count"];?></span>
                     </div>
                     <div class="product-label form-group"> 
                        <div class="diviedDiv">
                           <div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer" style="padding-bottom:10px">
                              <?php
                                 $price_part=explode("||",$v["price"]);
                                 if(trim($price_part[0])!=""){
                                 ?>
                              <span class="price-new"><?php echo currency1($v["currency"],$price_part[0] - $price_part[2]);  ?></span> 
                              <?php
                                 }
                                 if(trim($price_part[2])!="" && trim($price_part[2])!='0'){
                                 ?>
                              <span class="price-old"><?php echo currency1($v["currency"],$old=$price_part[0]);  ?></span>
                              <?php
                                 }
                                 ?>
                           </div>
                           <?php
                              if($v["selling_price"] > 0){
                              ?>
                           <?php
                              }
                              ?>
                           <?php
                              if($v["posting_type"]==1){
                              ?>
                           <?php 
                                 $highest_bid_amount = higest_bid_amount($v["apa_id"]);
                                 if($highest_bid_amount != 0){
                              ?>
                           <?php 
                                    $query = "SELECT nick_name FROM ambit_customer AS a JOIN ambit_product_bid AS b ON a.ac_id = b.cus_id WHERE bid_amount =".$highest_bid_amount." AND b.apa_id=".$v["apa_id"];
                                    
                                    $buyer_detail = getDetails(doSelect3($query));
                                    $nick_name = $buyer_detail[0]["nick_name"];
                                    echo '<div> <button class="label label-percent" id="btnBid">Last Bid &nbsp: '.higest_bid($v["apa_id"]).' <br/> Bidder&nbsp&nbsp&nbsp&nbsp: '.$nick_name.'</button></div>';
                                 }
                              }
                              ?>
                        </div>                    
                        
                        <div class="stock" style="padding-top:10px;"><span><?php echo $lang_50; ?>:</span> 
                           <?php								
                              if(trim($v["stock"]) > 0){
                              	$stock=trim($v["stock"]);
                              ?>
                           <span class="status-stock"><?php echo $lang_90; ?></span>
                           <?php
                              }else{
                              	$stock=trim($v["stock"]);
                              ?>
                           <span class="status-stock" style="color:red"><?php echo $lang_91; ?></span>
                           <?php
                              }
                              ?>
                        </div>
                     </div>
                     <div class="product-box-desc">
                        <div class="inner-box-desc">
                           <div class="brand"><span><?php echo $lang_49; ?>: </span><a href="#"><?php echo seeMoreDetails("ab_name","ambit_brand",array("ab_id"=>$v["brand"]));  ?></a></div>
                           <div></div>
                        </div>
                     </div>
                     <?php
                        if(trim($v["features"])!=""){
                        
                        ?>							
                     <div class="product-box-desc">
                        <div class="inner-box-desc">
                           <?php
                              $feature=explode("||",$v["features"]);
                              foreach($feature as $k3=>$v3){
                              	$feat_desc=explode(":",$v3);
                              ?>									
                           <div class="reward"><span><?php  echo $feat_desc[0]; ?>:</span> <?php  echo $feat_desc[1]; ?></div>
                           <?php
                              }
                              ?>	
                        </div>
                     </div>
                     <?php
                        }
                        ?>
                     <div class="product-box-desc">
                        <div class="inner-box-desc">
                           <div class="reward">
                              <?php echo $v['new_flag']==1 ? '<span class="badge">New</span>':'<span class="badge">Used</span>';  ?>			
                              <?php echo $v['warranty_flag']==1 ? '<span class="badge">Warranty('.$v['warranty_long'].'months)</span>':'';  ?>			
                              <?php echo $v['original_flag']==1 ? '<span class="badge">Original</span>':'<span class="badge">Imitation</span>';  ?>			
                              <?php echo $v['auth_flag']==1 ? '<span class="badge">Authneticity</span>':'';  ?>			
                              <!--<div class="label label-primary col-md-3"><?php echo $v['auth']==1 ? 'Authneticity':'';  ?>		</div>	-->
                           </div>
                        </div>
                     </div>
                     <?php
                        if(trim($v["weight"])!=""){
                        
                        ?>							
                     <div class="product-box-desc">
                        <div class="inner-box-desc">
                           <?php
                              $weights=explode("||",$v["weight"]);
                              foreach($weights as $k3=>$v3){
                              	$weight_desc=explode(":",$v3);
                              ?>									
                           <div class="reward"><span><?php echo $lang_53; ?>:</span> <?php  echo $weight_desc[0].seeMoreDetails("awu_unit","ambit_weight_unit",array("awu_id"=>$weight_desc[1])); ?></div>
                           <?php
                              }
                              ?>	
                        </div>
                     </div>
                     <?php
                        }
                        ?>		
                     <?php
                        if(trim($v["apa_vr_id"])!=""){
                        
                        ?>							
                     <div class="product-box-desc">
                        <div class="inner-box-desc">
                           <div class="reward"><span><?php echo $lang_92; ?>:</span> <?php  echo seeMoreDetails("company","vendor_registration",array("vr_id"=>$v["apa_vr_id"])); ?></div>
                        </div>
                     </div>
                     <?php
                        }
                        ?>							
                     <div class="product-box-desc">
                        <div class="inner-box-desc">
                           <?php
                              if(trim($price_part[1])!=""){
                              ?>
                           <div class="price-tax"><span><?php echo $lang_93; ?>:</span> <?php echo currency1($v["currency"],$price_part[1]);  ?></div>
                           <?php
                              }
                              ?>
                           <?php
                              if(trim($price_part[2])!="" && trim($price_part[2])!="0"){
                              ?>
                           <div class="price-tax"><span><?php echo $lang_39; ?>:</span> <?php echo currency1($v["currency"],$price_part[2]);  ?></div>
                           <?php
                              }
                              ?>
                           <?php
                              if(trim($price_part[3])!=""){
                              ?>
                           <div class="price-tax"><span><?php echo $lang_29; ?>:</span> <?php echo currency1($v["currency"],$price_part[3]);  ?></div>
                           <?php
                              }
                              ?>
                        </div>
                     </div>
                     <div id="product">
                        <h4><?php echo $lang_94; ?></h4>
                        <div class="availableOption">
                           <?php
                              if(trim($v["size"])!=""){
                              ?>									
                           <div class="image_option_type abailableSize form-group required">
                              <label class="control-label"><?php echo $lang_96; ?></label>
                              <ul class="product-options clearfix"id="input-option231">
                                 <?php
                                    $sizes=explode("||",$v["size"]);
                                    foreach($sizes as $k2=>$v2){
                                    $size=explode(":",$v2);
                                    
                                    ?>
                                 <li class="radio">
                                    <label>
                                    <input class="image_radio" type="radio" name="option[231]" value="33"> 
                                    <img src="image/demo/colors/green.jpg" data-original-title="<?php echo $size[0].' '.seeMoreDetails("asu_name","ambit_size_unit",array("asu_id"=>$size[1])); ?>" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
                                    <label> </label>
                                    </label>
                                 </li>
                                 <?php
                                    }
                                    ?>								
                                 <li class="selected-option">
                                 </li>
                              </ul>
                           </div>
                           <?php
                              }
                              ?>									
                           <div class="image_option_type abailableSize form-group required">
                              <label class="control-label"><?php echo $lang_95; ?></label>
                              <ul class="product-options clearfix"id="input-option231">
                                 <?php
                                    $colors=explode("||",$v["color"]);
                                    foreach($colors as $k2=>$v2){
                                    $color=getDetails(doSelect1("apc_name,image","ambit_product_color",array("apc_id"=>$v2)));
                                    
                                    ?>
                                 <li class="radio">
                                    <label>
                                    <input class="image_radio" type="radio" name="option[231]" value="33"> 
                                    <img src="image/demo/colors/<?php echo $color[0]["image"]; ?>" data-original-title="<?php echo $color[0]["apc_name"]; ?>" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
                                    <label> </label>
                                    </label>
                                 </li>
                                 <?php
                                    }
                                    ?>								
                                 <li class="selected-option">
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <?php
                           $yesterday = date("'Y-m-d H:i:s", strtotime( '-1 days' ) );											
                           //if($v["posting_type"]==1 && $stock > 0 && strtotime($v["listing_duration"]) > time() ){
                           if($v["posting_type"]==1 && $stock > 0 && strtotime($v["listing_duration"]) > strtotime($yesterday) ){
                           ?>
                        <div class="cart" id="recnt_cart" >
                           <button onclick="bid_now();" id="bid_now_button" class="addToCart" type="button"  ><i class="fa fa-gavel fa-2x"></i> <span class=""><?php echo $lang_308;?></span></button>
                           <?php
                              if(isset($_SESSION["ac_id"])){
                              	$my_bid=trim(seeMoreDetails('MAX(bid_amount)','ambit_product_bid',array("apa_id"=>trim($_GET["id"]),"cus_id"=>$_SESSION["ac_id"],"bid_status"=>1)));
                              	if($my_bid!=''){
                              ?>
                           <button onclick="bid_retract();" id="bid_retract_button" style="background-color: #3498db;height:46px;" class="addToCart" type="button"  ><i class="fa fa-gavel fa-2x"></i> <span class=""><?php echo $lang_366;?></span></button>
                           <button  id="bid_value_button" style="background-color: #3498db;height:46px;" class="addToCart" type="button"  ><i class="fa fa-gavel fa-2x"></i> <span class=""><?php echo $lang_367;?> <?php echo currency1(unit_currency(),$my_bid);  ?></span></button>
                           <?php
                              }
                              }
                              ?>
                           <input type="text" id="bid_value"  onkeypress="return only_number(event);"   value=""  style="border: 2px solid #c89f11;height:45px;display:none;" >
                           <input type="button" id="bid_submit" onclick="bid_submit_amnt()" style="background-color: #3498db;display:none;" value="Submit"  class="btn btn-mega btn-lg" >
                        </div>
                        <br>
                        <?php
                           }
                           ?>
                        <!--	<div class="box-checkbox form-group required">
                           <label class="control-label">Checkbox</label>
                           <div id="input-option232">
                           	<div class="checkbox">
                           		<label for="checkbox_1"><input type="checkbox" name="option[232][]" value="36" id="checkbox_1"> Checkbox 1 (+$12.00)</label>
                           	</div>
                           	<div class="checkbox">
                           		<label for="checkbox_2"><input type="checkbox" name="option[232][]" value="36" id="checkbox_2"> Checkbox 2 (+$36.00)</label>
                           	</div>
                           	<div class="checkbox">
                           		<label for="checkbox_3"><input type="checkbox" name="option[232][]" value="36" id="checkbox_3"> Checkbox 3 (+$24.00)</label>
                           	</div>
                           	<div class="checkbox">
                           		<label for="checkbox_4"><input type="checkbox" name="option[232][]" value="36" id="checkbox_4"> Checkbox 4 (+$48.00)</label>
                           	</div>
                           </div>
                           </div> -->
                        <div class="form-group box-info-product">
                           <?php
                              if($v["selling_price"] > 0){
                              ?>
		                          <!-- <div class="option quantity">
		                              <div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
		                                 <label><?php echo $lang_97; ?></label>
		                                 <input class="form-control" type="text" name="quantity" id="product_quantitiy"
		                                    value="1">
		                                
		                                 <span class="input-group-addon product_quantity_down" >−</span>
		                                 <span class="input-group-addon product_quantity_up" >+</span>
		                              </div>
		                           </div>-->
                           <?php
                              }
                              ?>
                           <?php
                              $quanty_prdct=1;	
                              ?>
                           <?php
                              if($v["selling_price"] > 0){
                              	$v["name"] = str_replace("'", "@#@#@#@#", $v["name"]);
                              ?>
		                          <!-- <div class="cart" id="recnt_cart">
		                              <input type="button" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" <?php if($stock > 0){ ?> onclick="my_cart('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php echo $v["name"];?>');" <?php }else{ echo 'disabled'; } ?> data-original-title="Add to Cart">
		                           </div>-->
                           <?php
                              }
                              ?>
                           <div class="add-to-links wish_comp">
                              <ul class="blank list-inline">
                                 <?php
                                    if($v["selling_price"] > 0){
                                    ?>
                                 <li class="wishlist">
                                    <?php
                                       if(!isset($_SESSION["ac_id"])){
                                       ?>
                                    <a class="icon" data-toggle="tooltip" title=""
                                       onclick="wishlist.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php echo $v["name"];?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
                                    </a>
                                    <?php
                                       }else{
                                       ?>			
                                    <a class="icon" data-toggle="tooltip" title=""
                                       <?php if($stock > 0){ ?> onclick="wishlist3.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php echo $v["name"];?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');" <?php } ?> data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
                                    </a>
                                    <?php
                                       }
                                       ?>			
                                 </li>
                                 <li class="compare">
                                    <a class="icon" data-toggle="tooltip" title=""
                                       onclick="compare.add('<?php echo $v["apa_id"]; ?>');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i>
                                    </a>
                                 </li>
                                 <?php
                                    }
                                    ?>
                                 <?php
                                    if(empty($_SERVER['REQUEST_URI'])) {
                                        $_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'];
                                    }
                                    $url = preg_replace('/\?.*$/', '', $_SERVER['REQUEST_URI']);
                                    if($url=''){
                                    $url = 'http://'.$_SERVER['HTTP_HOST'].'/'.ltrim(dirname($url), '/').'';
                                    }
                                    if($url==''){
                                    $url = 'http://'.$_SERVER['HTTP_HOST'].'/'.ltrim(dirname($url), '').'';
                                    }
                                    ?>
                                 <li class="share">
                                    <a class="icon" data-toggle="tooltip" title=""
                                       href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url;?>product.php?id=<?php echo $_GET["id"];?>" target="_blank" data-original-title="<?php echo $lang_269;?>"><i class="fa fa-facebook"></i>
                                    </a>
                                 </li>
								  
								  <li class="share">
                                    <a class="icon" data-toggle="tooltip" title=""
                                       href="https://twitter.com/share?url=<?php echo $url;?>product.php?id=<?php echo $_GET["id"];?>" target="_blank" data-original-title="<?php echo $lang_270;?>"><i class="fa fa-twitter"></i>
                                    </a>
                                 </li>
								 
                              </ul>
                           </div>
                        </div>
                     </div>
                     <!-- end box info product -->
                  </div>
               </div>
            </div>
            <section class="col-lg-2 hidden-sm hidden-md hidden-xs slider-products">
               <div class="module col-sm-12 four-block">
                  <div class="modcontent clearfix">
                     <div class="policy-detail">
                        <?php
                           echo seeMoreDetails("features","ambit_features",array("id"=>1));
                           
                           ?>
                     </div>
                  </div>
               </div>
            </section>
         </div>
         <!-- Product Tabs -->
         <div class="producttab ">
            <div class="tabsslider  vertical-tabs col-xs-12">
               <ul class="nav nav-tabs col-lg-2 col-sm-3">
                  <li class="active"><a data-toggle="tab" href="#tab-1"><?php echo $lang_98; ?></a></li>
                  <li class="item_nonactive"><a data-toggle="tab" href="#tab-review"><?php echo $lang_88; ?> (<?php echo count($total_review); ?>)</a></li>
                  <li class="item_nonactive"><a data-toggle="tab" href="#tab-4"><?php echo $lang_99; ?></a></li>
                  <li class="item_nonactive"><a data-toggle="tab" href="#tab-5"><?php echo $lang_100; ?></a></li>
               </ul>
               <div class="tab-content col-lg-10 col-sm-9 col-xs-12">
                  <div id="tab-1" class="tab-pane fade active in">
                     <p><?php echo $v["description"]; ?></p>
                  </div>
                  <div id="tab-review" class="tab-pane fade">
                     <form>
                        <div id="review">
                           <table class="table table-striped table-bordered">
                              <tbody>
                                 <?php
                                    foreach($review_details as $key2=>$val2){
                                    ?>						
                                 <tr>
                                    <td style="width: 50%;"><strong><?php echo $val2["apr_name"]; ?></strong></td>
                                    <td class="text-right"><?php echo get_date_str($val2["date"]); ?></td>
                                 </tr>
                                 <tr>
                                    <td colspan="2">
                                       <p><?php echo $val2["comment"]; ?></p>
                                       <div class="ratings">
                                          <div class="rating-box">
                                             <?php
                                                $full_star=$val2["rating"];
                                                $no_star=5-$full_star;
                                                for($i=1;$i<=$full_star;$i++){
                                                ?>
                                             <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                             <?php
                                                }
                                                for($i=1;$i<=$no_star;$i++){
                                                ?>
                                             <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                             <?php
                                                }
                                                ?>								
                                          </div>
                                       </div>
                                    </td>
                                 </tr>
                                 <?php
                                    }
                                    if(count($total_review) > count($review_details)){
                                    ?>								
                                 <tr>
                                    <td colspan="2">
                                       <a href="review.php?id=<?php echo $_GET["id"]; ?>">
                                          <h3><?php echo $lang_101; ?></h3>
                                       </a>
                                    </td>
                                 </tr>
                                 <?php
                                    }
                                    ?>
                              </tbody>
                           </table>
                           <div class="text-right"></div>
                        </div>
                        <h2 id="review-title"><?php echo $lang_89; ?></h2>
                        <div class="contacts-form">
                           <div class="form-group"> <span class="icon icon-user"></span>
                              <input type="text" name="apr_name" id="apr_name" class="form-control" value="" placeholder="Your Name" > 
                           </div>
                           <div class="form-group"> <span class="icon icon-bubbles-2"></span>
                              <textarea class="form-control" name="comment" id="comment"placeholder="Your Review" ></textarea>
                           </div>
                           <div class="form-group">
                              <b><?php echo $lang_51; ?></b> <span><?php echo $lang_102; ?></span>&nbsp;
                              <input type="radio" name="rating" value="1"> &nbsp;
                              <input type="radio" name="rating"
                                 value="2"> &nbsp;
                              <input type="radio" name="rating"
                                 value="3"> &nbsp;
                              <input type="radio" name="rating"
                                 value="4"> &nbsp;
                              <input type="radio" name="rating"
                                 value="5"> &nbsp;<span><?php echo $lang_103; ?></span>
                           </div>
                           <div class="buttons clearfix"><a id="button-review" class="btn buttonGray" onclick="submit_review('<?php echo $_GET["id"]; ?>');"><?php echo $lang_72; ?></a></div>
                        </div>
                     </form>
                  </div>
                  <div id="tab-4" class="tab-pane fade">
                     <?php
                        $tag_detls=getDetails(doSelect1("name,pc_name,category","ambit_product_add,product_category",array("category"=>"pc_id","apa_id"=>$_GET["id"])));
                        foreach($tag_detls as $k4=>$v4){
                        $tag_details=getDetails(doSelect1("psc_id,psc_name","product_sub_category",array("psc_pc_id"=>$v4["category"])));
                        ?>			
                     <a href="search.php.php?category_id=<?php echo $v4["category"];  ?>"><?php echo $v4["pc_name"];  ?></a>,
                     <?php
                        foreach($tag_details as $k5=>$v5){
                        	if($k5 !=0){
                        		echo ',';
                        	}
                        ?>
                     <a href="search.php.php?category_id=<?php echo $v4["category"];  ?>&sub_category_id=<?php echo $v5["psc_id"];   ?>"><?php echo $v5["psc_name"];  ?></a>
                     <?php
                        }
                        }
                        ?>								
                  </div>
                  <div id="tab-5" class="tab-pane fade">
                     <form>
                        <div id="review">
                           <table class="table table-striped table-bordered">
                              <tbody>
                                 <?php
                                    $qa_details=getDetails(doSelect1("apqa_id,ac_id,question,date,answer","ambit_pro_qustn_ans",array("apa_id"=>trim($_GET["id"]),"ans_status"=>1),' LIMIT 0,2'));
                                    $total_qa=getDetails(doSelect1("apqa_id,ac_id,question,date,answer","ambit_pro_qustn_ans",array("apa_id"=>trim($_GET["id"]),"ans_status"=>1)));
                                    
                                    
                                    
                                    foreach($qa_details as $key2=>$val2){
                                    ?>						
                                 <tr>
                                    <td style="width: 50%;"><strong><?php echo getCustomerName($val2["ac_id"]); ?></strong></td>
                                    <td class="text-right"><?php echo get_date_str($val2["date"]); ?></td>
                                 </tr>
                                 <tr>
                                    <td colspan="2">
                                       <p><b><font color="grey">Question : </font></b><?php echo $val2["question"]; ?></p>
                                       <div class="ratings">
                                          <p><b><font color="grey">Answer : </font></b><?php echo $val2["answer"]; ?></p>
                                       </div>
                                    </td>
                                 </tr>
                                 <?php
                                    }
                                    if(count($total_qa) > count($qa_details)){
                                    ?>								
                                 <tr>
                                    <td colspan="2">
                                       <a href="question_answer.php?id=<?php echo $_GET["id"]; ?>">
                                          <h3><?php echo $lang_272; ?></h3>
                                       </a>
                                    </td>
                                 </tr>
                                 <?php
                                    }
                                    ?>
                              </tbody>
                           </table>
                           <div class="text-right"></div>
                        </div>
                        <h2 id="review-title"><?php echo $lang_270; ?></h2>
                        <div class="contacts-form">
                           <div class="form-group"> <span class="icon icon-bubbles-2"></span>
                              <textarea class="form-control" name="question" id="question" placeholder="<?php echo $lang_271; ?>" ></textarea>
                           </div>
                           <div class="buttons clearfix"><a id="button-review" class="btn buttonGray" onclick="submit_question('<?php echo $_GET["id"]; ?>');"><?php echo $lang_72; ?></a></div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <?php
            }
            
            ?>
         <!-- //Product Tabs -->
         <!-- <?php echo $lang_3; ?> -->
         <?php
            include("product/related_product.php");
            
            ?>				
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


<div class="module tab-slider titleLine">
	<h3 class="modtitle"><?php echo $lang_4; ?></h3>
	<div id="so_listing_tabs_4" class="so-listing-tabs first-load module">
		<div class="loadeding"></div>
		<div class="ltabs-wrap ">
			<div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="http://localhost/ytc_templates/opencart/so_market/" data-type_source="0">
				<!--Begin Tabs-->
				<div class="ltabs-tabs-wrap"> 
			<!--	<span class="ltabs-tab-selected">Jewelry &amp; Watches	</span> <span class="ltabs-tab-arrow">▼</span> -->
					<div class="item-sub-cat">
						<ul class="ltabs-tabs cf">
					<li class="ltabs-tab tab-sel" data-category-id="1" data-active-content=".items-category-1"> <span class="ltabs-tab-label"><?php echo $lang_265; ?></span> </li>
							</ul>
					</div>
				</div>
				<!-- End Tabs-->
			</div>
			<div class="ltabs-items-container">
				<!--Begin Items-->
				
				<div class="ltabs-items  ltabs-items-selected items-category-1 grid" data-total="10">
					<div class="ltabs-items-inner ltabs-slider ">
							<?php
$condition='';
if(isset($_GET["category_id"]) && trim($_GET["category_id"]) != 0){
	if(isset($_GET["sub_category_id"]) && trim($_GET["sub_category_id"]) != 0){
	//$category=array("category"=>trim($_GET["category_id"]),"sub_cat"=>trim($_GET["sub_category_id"]));
	$condition.=' AND category ='.trim($_GET["category_id"]).' AND sub_cat='.trim($_GET["sub_category_id"]);
}else{
	//$category=array("category"=>trim($_GET["category_id"]));
	$condition.=' AND category ='.trim($_GET["category_id"]);
}
}else{
	//$category=array();
}
if(isset($_GET["sub_sub_category_id"]) && trim($_GET["sub_sub_category_id"]) != ""){
	$condition.=' AND sub_sub_cat ='.trim($_GET["sub_sub_category_id"]);
}
if(isset($_COOKIE['vr_id']) && $_COOKIE['vr_id']!= "0"){
	$condition.=' AND apa_vr_id ='.trim($_COOKIE['vr_id']);
}
if(isset($_GET["search"]) && trim($_GET["search"]) != ""){
	$condition.=" AND (name LIKE '%".trim($_GET["search"])."%' OR ab_name LIKE '%".trim($_GET["search"])."%' )";
}
//echo $condition;
/*$select="apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,ab_name,size,price,status,stock";*/
$select="apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,ab_name,size,price,status,stock,currency";
$result=doSelect2($select,"ambit_product_add,ambit_brand",array("brand"=>"ab_id","status"=>1));

//$query=$result.$condition;
$query=$result.$condition." AND (listing_duration='0000-00-00' OR listing_duration >= CURDATE())";

$result=getDetails(doSelect3($query));
if(!empty($result)){
foreach($result as $k=>$v){					
					?>
						<div class="ltabs-item product-layout">
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
									<!-- <span class="label label-sale">Sale</span> -->
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
											<!--<span class="price-new"><?php //echo currency().$price_part[0];  ?></span> -->
											<!--<span class="price-new"><?php echo currency($v["apa_id"]).$price_part[0];  ?></span> -->
											<span class="price-new"><?php echo currency1($v["currency"],$price_part[0] - $price_part[2]);  ?></span> 
									    <?php
										}
										if(trim($price_part[2])!="" && trim($price_part[2])!='0'){
										?>
											<!--<span class="price-old"><?php //echo currency().$old=$price_part[2]+$price_part[0];  ?></span>-->
											<!--<span class="price-old"><?php echo currency($v["apa_id"]).$old=$price_part[2]+$price_part[0];  ?></span>-->
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
								</div><!-- right block -->
							</div>
						</div>
						<?php
                    }
}else{
	echo '<font color="blue"><h1>No Data Found !</h1></font>';
}
						?>
								
							
						
					</div>
					
				</div>
				
				
			</div>
			<!--End Items-->
			
			
		</div>
		
	</div>
</div>
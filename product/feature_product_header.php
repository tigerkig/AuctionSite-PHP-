<div class="module tab-slider titleLine">
	<h3 class="modtitle">
	<?php
	$cat_listing_for_slider=array();
	if(isset($_GET["type"]) && trim($_GET["type"])=="selling"){
		echo $heading=$lang_5;
		// $result=getDetails(doSelect1("apa_id,name,price","ambit_product_add",array()," ORDER BY apa_id DESC"));
		$result=getDetails(doSelect1("apa_id,name,price,currency","ambit_product_add",array("status"=>1, "listing_duration"=>'0000-00-00')," ORDER BY apa_id DESC"));
	#for slider	
	$cat_listing_for_slider[0]["pc_id"]=$result[0]["apa_id"];
	#end for slider
	}
	if(isset($_GET["type"]) && trim($_GET["type"])=="reviewed"){
		echo $heading=$lang_6;
		//$result=getDetails(doSelect1("apr_id,apr_apa_id,SUM(rating) as rating,apa_id,name,price","ambit_product_review,ambit_product_add",array("apr_apa_id"=>"apa_id")," GROUP BY apr_apa_id ORDER BY rating DESC"));					
		// $result=getDetails(doSelect1("apr_id,apr_apa_id,SUM(rating) as rating,apa_id,name,price","ambit_product_review,ambit_product_add",array()," GROUP BY apr_apa_id ORDER BY rating DESC"));					
		$result=getDetails(doSelect1("apr_id,apr_apa_id,SUM(rating) as rating,apa_id,name,price,currency","ambit_product_review,ambit_product_add",array()," GROUP BY apr_apa_id ORDER BY rating DESC"));					
	#for slider	
	$cat_listing_for_slider[0]["pc_id"]=$result[0]["apr_apa_id"];
	#end for slider
	}
	if(isset($_GET["type"]) && trim($_GET["type"])=="latest"){
		echo $heading=$lang_7;
		// $result=getDetails(doSelect1("apa_id,name,price","ambit_product_add",array()," ORDER BY popularity DESC"));					
		$result=getDetails(doSelect1("apa_id,name,price,currency","ambit_product_add",array()," ORDER BY popularity DESC"));					
	#for slider	
	$cat_listing_for_slider[0]["pc_id"]=$result[0]["apa_id"];
	#end for slider
	}
	#for slider	
	//$cat_listing_for_slider[1]["pc_id"]=44444;
	//$cat_listing_for_slider[2]["pc_id"]=9999;
	#end for slider
	?>
	</h3>
	<div id="so_listing_tabs_1" class="so-listing-tabs first-load module">
		<div class="loadeding"></div>
		<div class="ltabs-wrap ">
			<div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="http://localhost/ytc_templates/opencart/so_market/" data-type_source="0">
				<!--Begin Tabs-->
				<div class="ltabs-tabs-wrap"> 
			<!--	<span class="ltabs-tab-selected">Jewelry &amp; Watches	</span> <span class="ltabs-tab-arrow">▼</span> -->
					<div class="item-sub-cat">
						<ul class="ltabs-tabs cf">
					<li class="ltabs-tab tab-sel" data-category-id="<?php echo $cat_listing_for_slider[0]["pc_id"];  ?>" data-active-content=".items-category-<?php echo $cat_listing_for_slider[0]["pc_id"];  ?>"> <span class="ltabs-tab-label"><?php echo $heading;  ?></span> </li>
							</ul>
					</div>
				</div>
				<!-- End Tabs-->
			</div>
			<div class="ltabs-items-container">
				<!--Begin Items-->
				<div class="ltabs-items  ltabs-items-selected items-category-<?php echo $cat_listing_for_slider[0]["pc_id"];  ?> grid" data-total="10">
					<div class="ltabs-items-inner ltabs-slider ">
				    <?php
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
//$image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$v["apa_id"],"status"=>1),' LIMIT 1,1'));
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

									<!--Sale Label-->
									<!-- <span class="label label-sale">Sale</span> -->
									<!--full quick view block-->
									<a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.php?id=<?php echo $v["apa_id"]; ?>">  Quickview</a>
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
											<span class="price-new"><?php //echo currency().$price_part[0];  ?></span> 
											<!-- <span class="price-new"><?php echo currency($v["apa_id"]).$price_part[0];  ?></span>  -->
											<span class="price-new"><?php echo currency1($v["currency"],$price_part[0] - $price_part[2]);  ?></span> 
									    <?php
										}
										if(trim($price_part[2])!="" && trim($price_part[2])!='0'){
										?>
											<span class="price-old"><?php //echo currency().$old=$price_part[2]+$price_part[0];  ?></span>
											<!-- <span class="price-old"><?php echo currency($v["apa_id"]).$old=$price_part[2]+$price_part[0];  ?></span> -->
											<span class="price-old"><?php echo currency1($v["currency"],$old=$price_part[0]);  ?></span>
										<?php
										}
										?>
										</div>
									</div>
									
									  <div class="button-group">
										<button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php  $v["name"] = str_replace("'", "@#@#@#@#", $v["name"]); echo $v["name"];?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');"><i class="fa fa-shopping-cart"></i> <span class="">Add to Cart</span></button>
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
						?>
								
							
						
					</div>
					
				</div>
				
				
			</div>
			<!--End Items-->
			
			
		</div>
		
	</div>
</div>
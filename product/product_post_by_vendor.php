<?php
$select="apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size,price,status";
$result=getDetails(doSelect1($select,"ambit_product_add",array("status"=>1,"apa_vr_id"=>$_GET["id"]),' ORDER BY rand()'));
if(!empty($result)){
?>

<div class="related titleLine products-list grid module ">
	<h3 class="modtitle"><?php echo $lang_269.' <font color="#3498db">'.getVendorName(trim($_GET["id"])).'</font>'; ?>  </h3>
	<div class="releate-products ">
<?php
foreach($result as $k=>$v){					
?>	
		<div class="product-layout">
			<div class="product-item-container">
				<div class="left-block">
					<div class="product-image-container second_img ">
									<?php
$select1="api_id,image,status";
$image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$v["apa_id"],"status"=>1),' LIMIT 0,1'));
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
											<span class="price-new"><?php echo get_currency().$price_part[0];  ?></span> 
									    <?php
										}
										if(trim($price_part[2])!="" && trim($price_part[2])!='0'){
										?>
											<span class="price-old"><?php echo get_currency().$old=$price_part[2]+$price_part[0];  ?></span>
										<?php
										}
										?>
										</div>
									</div>
									
									  <div class="button-group">
										<button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php $v["name"] = str_replace("'", "@#@#@#@#", $v["name"]);  echo $v["name"];?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');"><i class="fa fa-shopping-cart"></i> <span class=""><?php echo $lang_264; ?></span></button>
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
<?php
}
?>
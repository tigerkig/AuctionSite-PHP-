<?php
session_start();
require_once("function.php");
//print_r($_POST);
$category=trim($_POST["category_id"]);
$prepage=$_POST["prepage"];
$sub_cat="";
foreach($_POST["category"] as $k=>$v){
	if($k != 0){
		$sub_cat.=",";
	}
$sub_cat.=$v;
}
$sub_cat=trim($sub_cat);
if(trim($_POST["vendor_id"])!=0){
	$apa_vr_id=trim($_POST["vendor_id"]);
}
$brand="";
foreach($_POST["brand"] as $k=>$v){
	if($k != 0){
		$brand.=",";
	}
$brand.=$v;
}
$brand=trim($brand);
$min_price=trim($_POST["min_price"]);
$max_price=trim($_POST["max_price"]);
$color="";
foreach($_POST["colors"] as $k=>$v){
		if($k != 0){
		$color.=",";
	}
$color.=$v;
}
$color=trim($color);
/* echo $category;
echo '|';
echo $sub_cat;
echo '|';
echo $min_price;
echo '|';
echo $max_price;
echo '|';
echo $color; */
?>
					<!-- Filters -->
					<div class="product-filter filters-panel">
						<div class="row">
							<div class="col-md-2 visible-lg">
								<div class="view-mode">
									<div class="list-view">
										<button class="btn btn-default grid " data-view="grid" data-toggle="tooltip"  data-original-title="Grid"><i class="fa fa-th"></i></button>
										<button class="btn btn-default list active" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
									
									</div>
								</div>
							</div>
							<div class="short-by-show form-inline text-right">
								<div class="form-group short-by">
									<label class="control-label" for="input-sort">Sort By:</label>
									<select id="input-sort" class="form-control"
									onchange="location = this.value;">
										<option value="" selected="selected">Default</option>
										<option value="">Name (A - Z)</option>
										<option value="">Name (Z - A)</option>
										<option value="">Price (Low &gt; High)</option>
										<option value="">Price (High &gt; Low)</option>
										<option value="">Rating (Highest)</option>
										<option value="">Rating (Lowest)</option>
										<option value="">Model (A - Z)</option>
										<option value="">Model (Z - A)</option>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label" for="input-limit">Show:</label>
									<select id="input-limit" class="form-control">
										<option value="8" selected="selected">8</option>
										<option value="16">16</option>
										<option value="32">32</option>
										<option value="64">64</option>
										<option value="100">100</option>
									</select>
								</div>
							</div>
<?php
if(isset($_GET["page"]))
  $page = (int)$_GET["page"];
  else
  $_GET["page"]=1;
  $page = 1;
  $setLimit =$prepage;
  $pageLimit = ($page * $setLimit) - $setLimit;
  $limit=' LIMIT '.$pageLimit.','.$setLimit;
  
$condition='';
if(trim($category)!="" && $category != 0){
	$condition.=" AND category=$category ";
}
if(trim($sub_cat)!=""){
	$condition.=" AND sub_cat IN($sub_cat)";
}
if(trim($min_price)!=""){
	$condition.=" AND selling_price >= $min_price";
}
if(trim($max_price)!=""){
	$condition.=" AND selling_price <= $max_price";
}
if(trim($color)!=""){
	$condition.=" AND color IN($color)";
}
if(isset($apa_vr_id)){
	$condition.=" AND apa_vr_id=".$apa_vr_id;
}
//echo $condition;
$select="apa_id,apa_vr_id,name,category,sub_cat,selling_price,sub_sub_cat,features,description,weight,color,brand,ab_name,size,price,status";
$result=doSelect2($select,"ambit_product_add,ambit_brand",array("brand"=>"ab_id","status"=>1));
date_default_timezone_set("America/Chicago");
$curdatetime = date("Y-m-d H:i:s");
$query=$result.$condition." AND (listing_duration='0000-00-00' OR listing_duration >= '".$curdatetime."' ) ORDER BY time_sort DESC";
$total_result=getDetails(doSelect3($query));
$total_item=count($total_result);
$total_page=ceil(count($total_result)/$setLimit);
$result=getDetails(doSelect3($query.$limit));
$page_item=count($result);
if($total_page > 1){
?>							
							


						<!-- right pagination old section  -->



<?php
}
?>							
							
						</div>
					</div>
					<!-- //end Filters -->
					
					<!--changed listings-->
					<div class="products-list row list">
<?php
if(!empty($result)){
foreach($result as $k=>$v){					
?>	

	<div class="product-layout col-md-3 col-sm-4 col-xs-12 ">
		<div class="product-item-container" id="totalSizesearchedProDiv">
		<!-- <div class="product-item-container" id="totalProductSize"> -->
			<div class="left-block">
<div class="product-image-container lazy second_img " id="searchedProDiv">
<!-- <div class="product-image-container lazy second_img " id="imgSize"> -->
					<?php
$select1="api_id,image,status";
$image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$v["apa_id"]),' LIMIT 0,1'));
foreach($image as $k1=>$v1){
	$cart_image=$v1["image"];
?>	
<img data-src="vendor/product_photo/<?php echo $v1["image"]; ?>" src="vendor/product_photo/<?php echo $v1["image"]; ?>"  alt="Apple Cinema 30&quot;" class="img-responsive" />
					
										<?php
}
$image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$v["apa_id"],"status"=>1),' LIMIT 1,1'));
if(!empty($image)){
foreach($image as $k1=>$v1){
?>
<img data-src="vendor/product_photo/<?php echo $v1["image"]; ?>" src="vendor/product_photo/<?php echo $v1["image"]; ?>"  alt="Apple Cinema 30&quot;" class="img_0 img-responsive" />				
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
									<div class="caption" id="searchedCaption">
									<!-- <div class="caption" id="productCaption"> -->
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
												<span class="price-new">
													<?php
														$highest_bid_amount = higest_bid_amount($v["apa_id"]);
														
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
												</span> 
											<?php
											}
											if(trim($price_part[2])!="" && trim($price_part[2])!='0'){
											?>
												<span class="price-old"><?php echo get_currency().$old=$price_part[2]+$price_part[0];  ?></span>
											<?php
											}
											?>
										</div>
										<div class="description item-desc hidden">
						<p><?php echo $v["description"];  ?> </p>
					</div>
									</div>
									
									  <div class="button-group">
										<button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php $v["name"] = str_replace("'", "@#@#@#@#", $v["name"]); echo $v["name"];?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');"><i class="fa fa-shopping-cart"></i> <span class=""><?php echo $lang_264; ?></span></button>
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
	?>
	<div class="product-layout col-md-3 col-sm-4 col-xs-12 ">
	<?php
	echo '<h3><font color="red">'.$lang_32.'</font></h3>';
}
?>	
</div>
	
	
	
</div>					<!--// End Changed listings-->
					<!-- Filters -->
					<div class="product-filter product-filter-bottom filters-panel" >
						<div class="row">
							<div class="col-md-2 hidden-sm hidden-xs">
								
							</div>
						   <div class="short-by-show text-center col-md-7 col-sm-8 col-xs-12">
								<div class="form-group" style="margin: 7px 10px">Showing <?php echo $aa=$pageLimit+1;  ?> to <?php echo $bb=$aa+$page_item-1;  ?> of <?php echo $total_item;  ?> (<?php echo $total_page;  ?> Pages)</div>
							</div>
							<div class="box-pagination col-md-3 col-sm-4 text-right">
							<ul class="pagination">

                    <?php
                    if(isset($_GET["page"])){
                    $query_string=explode("&",$_SERVER['QUERY_STRING']);
                    unset($query_string[count($query_string)-1]);
                    $query_string=implode("&",$query_string).'&';  
                    }else{
                    $query_string=$_SERVER['QUERY_STRING'].'&';
                    }
                    $url='search.php?'.$query_string;
                    if($page != 1){
                      $prev=$page-1;
                    ?>
                    <li><a href="javascript:void(0);" onclick="ajax_get_pagination('<?php echo $category; ?>','<?php echo $apa_vr_id; ?>','<?php echo $sub_cat; ?>','<?php echo $min_price; ?>','<?php echo $max_price; ?>','<?php echo $color; ?>',1);" title="First"><i class="fa fa-angle-double-left"></i></a></li>
                    <li><a href="javascript:void(0);" onclick="ajax_get_pagination('<?php echo $category; ?>','<?php echo $apa_vr_id; ?>','<?php echo $sub_cat; ?>','<?php echo $min_price; ?>','<?php echo $max_price; ?>','<?php echo $color; ?>','<?php echo $prev; ?>');" ><i class="fa fa-chevron-left"></i></a></li>
                    <?php
                    }
                   ?>
                   <!-- new -->
                   <?php
$l=1;
$s=$page-2;
if($s < 1){
  $s=1;
  }
for($p=$s;$p<$page;$p++){
  if($p!=$page){
?>
<li><a href="javascript:void(0);"   onclick="ajax_get_pagination('<?php echo $category; ?>','<?php echo $apa_vr_id; ?>','<?php echo $sub_cat; ?>','<?php echo $min_price; ?>','<?php echo $max_price; ?>','<?php echo $color; ?>','<?php echo $p; ?>');" ><?php echo $p;  ?></a></li>
<?php
}else{
?>
<li class="active"><a href="javascript:void(0);"><?php echo $p; ?></a></li>
<?php
}
$l++;
if($l==5){
  break;
}
}
if($total_page > 1){
$l=1;
for($p=$page;$p<=$total_page;$p++){
  if($p!=$page){
?>
<li><a href="javascript:void(0);"   onclick="ajax_get_pagination('<?php echo $category; ?>','<?php echo $apa_vr_id; ?>','<?php echo $sub_cat; ?>','<?php echo $min_price; ?>','<?php echo $max_price; ?>','<?php echo $color; ?>','<?php echo $p; ?>');" ><?php echo $p;  ?></a></li>
<?php
}else{
?>
<li class="active"><a href="javascript:void(0);"><?php echo $p; ?></a></li>
<?php
}
$l++;
if($l==4){
  break;
}
}
}

                    if($page < $total_page){
                      $next=$page+1;
                      ?>
                       <li><a href="javascript:void(0);" onclick="ajax_get_pagination('<?php echo $category; ?>','<?php echo $apa_vr_id; ?>','<?php echo $sub_cat; ?>','<?php echo $min_price; ?>','<?php echo $max_price; ?>','<?php echo $color; ?>','<?php echo $next; ?>');"><i class="fa fa-chevron-right"></i></a></li>
                      <li><a href="javascript:void(0);" onclick="ajax_get_pagination('<?php echo $category; ?>','<?php echo $apa_vr_id; ?>','<?php echo $sub_cat; ?>','<?php echo $min_price; ?>','<?php echo $max_price; ?>','<?php echo $color; ?>','<?php echo $total_page; ?>');" title="Last"><i class="fa fa-angle-double-right"></i></a></li>
                      <?php
                      }
                      ?>
                    </ul>	
							</div>
									
						 </div>
					</div>
					<!-- //end Filters -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl-carousel/owl.carousel.js"></script>
	<script type="text/javascript" src="js/themejs/libs.js"></script>
	<script type="text/javascript" src="js/unveil/jquery.unveil.js"></script>
	<script type="text/javascript" src="js/countdown/jquery.countdown.min.js"></script>
	<script type="text/javascript" src="js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
	<script type="text/javascript" src="js/datetimepicker/moment.js"></script>
	<script type="text/javascript" src="js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
	
	
	<!-- Theme files
	============================================ -->
	
	
	<script type="text/javascript" src="js/themejs/so_megamenu.js"></script>
	<script type="text/javascript" src="js/themejs/addtocart.js"></script>
	<script type="text/javascript" src="js/themejs/application.js"></script>
	<script type="text/javascript" src="js/themejs/cpanel.js"></script>	
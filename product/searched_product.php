<?php
session_start();
require_once("function.php");

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
								<div class="form-group short-by" style="display:none">
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
  $page = 1;
  $setLimit = 8;
  $pageLimit = ($page * $setLimit) - $setLimit;
  $limit=' LIMIT '.$pageLimit.','.$setLimit;
  
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
// $select="apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,ab_name,size,price,status,stock";
// $select="apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,ab_name,size,price,status,stock,currency, posting_date";
$select = "apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size,currency,price,selling_price,status,stock,posting_type,listing_duration, posting_date,listing_start, view_count, TIME_TO_SEC(TIMEDIFF(listing_duration,NOW())) as diff_time";
$result=doSelect2($select,"ambit_product_add,ambit_brand",array("brand"=>"ab_id","status"=>1));
//$result = "SELECT ".$select." FROM ambit_product_add,ambit_brand WHERE brand=ab_id AND status=1 AND (listing_duration='0000-00-00' OR listing_duration >=CURDATE())";
 
date_default_timezone_set("America/Chicago");
$curdatetime = date("Y-m-d H:i:s");
			  

//$query=$result.$condition;
//$query=$result.$condition." AND (listing_duration='0000-00-00' OR listing_duration >= CURDATE())"	;
$query=$result.$condition." AND (listing_duration='0000-00-00' OR listing_duration >='".$curdatetime."') ORDER BY apa_id DESC";
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
					<div class="row">
      <!--Middle Part Start-->
      <div id="content" class="col-md-12 col-sm-12">
         <div class="products-list row grid">
            <?php
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
		                   
		                     <!--full quick view block-->
		                     <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="quickview.php?id=<?php echo $v["apa_id"]; ?>">  <?php echo $lang_263; ?></a>
		                     <!--end full quick view block-->
		                  </div>
		                  <div class="right-block">
		                     <div class="caption">
		                        <div class="galleryTitle"><a href="product.php?id=<?php echo $v["apa_id"]; ?>" class="titleTxt"><?php echo $v["name"]; ?></a></div>
		                        <div class="ratings flexRating">
									   <div style="text-align:center">Number of views: <?php echo $v["view_count"];?></div>
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
												echo "CURRENT BID";
											}
											else {
												echo "BUY NOW";
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
										<?php 
											date_default_timezone_set("America/Chicago");
											$curdatetime = strtotime(date("Y-m-d H:i:s"));
											if(strtotime($v["listing_start"]) < $curdatetime ){ ?>
												<div >TIME REMAINING </div>
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
										<?php }else{ ?>   
											<div >THIS LISTING HAS NOT STARTED</div>
										<?php } ?>
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
									<button onclick="product_details('<?php echo $v["apa_id"]; ?>');" style="background-color: #3498db;width:100%;padding-top:4px;padding-bottom:4px;" class="addToCart" type="button" data-toggle="tooltip"  ><i class="fa fa-gavel fa-2x"></i> <span class="">Bid Now</span></button>
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
	
</div>
	
	
					<!--// End Changed listings-->
					
					<!-- Filters -->
					<div class="product-filter product-filter-bottom filters-panel" id="filter-panel">
						<div class="row">
							<div class="col-md-2 hidden-sm hidden-xs">
								
							</div>
						    <div class="short-by-show text-center col-md-8 col-sm-8 col-xs-12">
								<div class="form-group" style="margin: 7px 10px">Showing <?php echo $aa=$pageLimit+1;  ?> to <?php echo $bb=$aa+$page_item-1;  ?> of <?php echo $total_item;  ?> (<?php echo $total_page;  ?> Pages)</div>
							</div>
							<div class="box-pagination col-md-2 col-sm-4 text-right">
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
									<li><a href="javascript:void(0);" onclick="get_pagination('<?php echo $query_string; ?>',1);" title="First"><i class="fa fa-angle-double-left"></i></a></li>
									<li><a href="javascript:void(0);" onclick="get_pagination('<?php echo $query_string; ?>','<?php echo $prev; ?>');" ><i class="fa fa-chevron-left"></i></a></li>
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
									<li><a href="javascript:void(0);"  onclick="get_pagination('<?php echo $query_string; ?>','<?php echo $p; ?>');" ><?php echo $p;  ?></a></li>
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
									<li><a href="javascript:void(0);"  onclick="get_pagination('<?php echo $query_string; ?>','<?php echo $p; ?>');" ><?php echo $p;  ?></a></li>
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
								<li><a href="javascript:void(0);" onclick="get_pagination('<?php echo $query_string; ?>','<?php echo $next; ?>');"><i class="fa fa-chevron-right"></i></a></li>
								<li><a href="javascript:void(0);" onclick="get_pagination('<?php echo $query_string; ?>','<?php echo $total_page; ?>');" title="Last"><i class="fa fa-angle-double-right"></i></a></li>
								<?php
								}
								?>
								</ul>
							</div>
									
						 </div>
					</div>
					<!-- //end Filters -->


<script>
	function pagination(value){
		console.log(value);
		$.ajax({
		        url: "get_value.php",
		   		type: "POST",
		   		data:  value,
		   		contentType: false,
		      	    cache: false,
		   		processData:false,
		   		success: function(data)
		   	    {
		   		//alert(data);
		   		$("#filter-panel").remove();
		   		$("#ajax_filter").html(data);
		   	    },
		   	    error: function() 
		       	{
		       	}	        
		      });
	}
	var current_date = '<?php echo $current_date;?>';
	function product_details(id){
		window.location='product.php?id='+id;
	}
</script>
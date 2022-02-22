<style>
	@media (min-width:1200){
		/*.navbar-compact.type_1 .header-bottom-right, .navbar-compact.type_2 .header-bottom-right {
		    margin: inherit;
		    padding: 0;
		    width: auto;
		}*/
	}
</style>


<div class="megamenu-hori header-bottom-right  col-md-9 col-sm-6 col-xs-12 " style="width:auto !important;margin:0;padding:0 15px;">
				<div class="responsive so-megamenu ">
	<nav class="navbar-default">
		<div class=" container-megamenu  horizontal">
			<div class="navbar-header">
				<button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php echo $lang_257; ?>	

			</div>
			
			<div class="megamenu-wrapper">
				<span id="remove-megamenu" class="fa fa-times"></span>
				<div class="megamenu-pattern">
					<div class="container">
						<ul class="megamenu " data-transition="slide" data-animationtime="250">
							<li class="hidden-md">
								
								<a href="index.php"><?php echo $lang_149; ?></a>
								
							</li>
							<li class="with-sub-menu hover">
								<p class="close-menu"></p>
								<a href="" class="clearfix">
								<!--<a href="product_feature.php?type=selling" class="clearfix">-->
									<strong><?php echo $lang_54; ?></strong>
									<span class="label"></span>
									<b class="caret"></b>
								</a>
								<div class="sub-menu" style="width: 100%; right: auto;">
									<div class="content" >
									<div class="row">
									<div class="col-md-4">
											
												<a href="product_feature.php?type=selling" class="title-submenu"><?php echo $lang_258; ?></a>
												    <?php
													$selling_product=getDetails(doSelect1("apa_id,currency","ambit_product_add",array()," ORDER BY popularity DESC LIMIT 3"));
													
													foreach($selling_product as $k=>$v)
													{
														$select1="api_id,image,status";
														$image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$v["apa_id"],"status"=>1),' LIMIT 0,1'));
													?>
												<div class="col-sm-12 list-product">
													<div class="product-thumb">
														<div class="image">
															<a href="product.php?id=<?php echo $v["apa_id"];  ?>"><img src="vendor/product_photo/<?php echo $image[0]["image"]; ?>"  alt="Canon EOS 5D" title="Canon EOS 5D" class="img-responsive" style="width:100px;height:120px"></a>
														</div>
														<div class="caption">
															<a href="product.php?id=<?php echo $v["apa_id"];  ?>"><?php echo getProductName($v["apa_id"]);  ?></a>
															<div class = "g_rating_price_part"> 
															<div class="rating-box">
															<?php
															getRatingStar($v["apa_id"]);
															?>
															</div>
															<div clsas = "g_price_part">
																<p class="price">
																<?php
																	$price_dtls=seeMoreDetails("price","ambit_product_add",array("apa_id"=>$v["apa_id"]));
																	$price_part=explode("||",$price_dtls);
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
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php
										}
										?>
									</div>

									<div class="col-md-4">
						
										<a href="product_feature.php?type=reviewed" class="title-submenu"><?php echo $lang_259; ?></a>
											    <?php
												//$selling_product=getDetails(doSelect1("apr_id,apr_apa_id,SUM(rating) as rating","ambit_product_review",array()," GROUP BY apr_apa_id ORDER BY rating DESC LIMIT 3"));
												$selling_product=getDetails(doSelect1("apr_id,apr_apa_id,avg(rating) as rating","ambit_product_review",array()," GROUP BY apr_apa_id ORDER BY rating DESC LIMIT 3"));
												foreach($selling_product as $k=>$v)
												{
													$select1="api_id,image,status";
													$image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$v["apr_apa_id"],"status"=>1),' LIMIT 0,1'));
												?>
												<div class="col-sm-12 list-product">
												<!--<div class="row  list-product">-->
													<div class="product-thumb">
														<div class="image">
															<a href="product.php?id=<?php echo $v["apr_apa_id"];  ?>"><img src="vendor/product_photo/<?php echo $image[0]["image"]; ?>"  alt="" title="" class="img-responsive" style="width:100px;height:120px"></a>
														</div>
														<div class="caption">
															<a href="product.php?id=<?php echo $v["apr_apa_id"];  ?>"><?php echo getProductName($v["apr_apa_id"]);?></a>
															<div class = "g_rating_price_part"> 
																<div class="rating-box">
																	<?php
																	getRatingStar($v["apr_apa_id"]);
																	?>
																</div>
																<div clsas = "g_price_part">
																	<p class="price">
																		<?php
																			$price_dtls=seeMoreDetails("price","ambit_product_add",array("apa_id"=>$v["apr_apa_id"]));
																			$price_part=explode("||",$price_dtls);
																			if(trim($price_part[0])!=""){
																			?>
																				<span class="price-new"><?php echo currency1(currency($v["apr_apa_id"]),$price_part[0] - $price_part[2]);  ?></span> 
																		    <?php
																			}
																			if(trim($price_part[2])!="" && trim($price_part[2])!='0'){
																			?>
																				<span class="price-old"><?php echo currency1(currency($v["apr_apa_id"]),$old=$price_part[0]);  ?></span>
																			<?php
																			}
																			?>
																		</p>
																</div>
															</div>
															
															
														</div>
													</div>
												</div>
												<?php
												}
												?>
											</div>
											
											<div class="col-md-4">

				  						<a href="product_feature.php?type=latest" class="title-submenu"><?php echo $lang_1; ?></a>
												  <?php					
												$selling_product=getDetails(doSelect1("apa_id,currency","ambit_product_add",array("listing_duration" => '0000-00-00')," ORDER BY apa_id DESC LIMIT 3"));
												
												foreach($selling_product as $k=>$v)
												{
													$select1="api_id,image,status";
													$image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$v["apa_id"],"status"=>1),' LIMIT 0,1'));
												?>
												<div class="col-sm-12 list-product">
													<div class="product-thumb">
														<div class="image">
															<div class="image_part">
																<a href="product.php?id=<?php echo $v["apa_id"];  ?>"><img src="vendor/product_photo/<?php echo $image[0]["image"]; ?>"  alt="Canon EOS 5D" title="Canon EOS 5D" class="img-responsive" style="width:100px;height:120px"></a>
															</div>
															
														</div>
														<div class="caption">
															<a href="product.php?id=<?php echo $v["apa_id"];  ?>"><?php echo getProductName($v["apa_id"]);  ?></a>
															<div class = "g_rating_price_part"> 
																<div class="rating-box">
																<?php
																getRatingStar($v["apa_id"]);
																?>
																</div>
																<div clsas = "g_price_part">
																	<p class="price">
																	<?php
																		$price_dtls=seeMoreDetails("price","ambit_product_add",array("apa_id"=>$v["apa_id"]));
																		$price_part=explode("||",$price_dtls);
																		if(trim($price_part[0])!=""){
																		?>
																			<span class="price-new"><?php echo currency1(currency($v["apa_id"]),$price_part[0] - $price_part[2]);  ?></span> 
																			
																	    <?php
																		}
																		if(trim($price_part[2])!="" && trim($price_part[2])!='0'){
																		?>
																			
																			<span class="price-old"><?php echo currency1(currency($v["apa_id"]),$old=$price_part[0]);  ?></span>
																		<?php
																		}
																		?>
																	</p>
																</div>
														</div>
														</div>
													</div>
												</div>
												<?php
												}
												?>
											</div>
										</div>	
									</div>
								</div>
							</li>
							<li class="hidden-md">
								<p class="close-menu"></p>
								<a href="about_us.php" class="clearfix">
									<strong><?php echo $lang_8; ?></strong>
								</a>								
							</li>
							<li class="with-sub-menu hover">
								<p class="close-menu"></p>
								<a href="" class="clearfix">
									<strong><?php echo $lang_260; ?></strong>
									<span class="label"></span>
									<b class="caret"></b>
								</a>
								<div class="sub-menu" style="width: 100%; display: none;">
									<div class="content">
										
										<div class="row">
											<?php
											//$cat_listing=getDetails(doSelect1("pc_id,pc_name","product_category",array(),' ORDER BY rand() LIMIT 4'));
											$cat_listing=getDetails(doSelect1("pc_id,pc_name","product_category",array()));

											$nCnt = 0;
											foreach($cat_listing as $k3=>$v3){
												$nCnt ++;
											$subcat_list=getDetails(doSelect1("psc_id,psc_name","product_sub_category",array("psc_pc_id"=>$v3["pc_id"])));	

											//if($nCnt % 4 ==0){												
											if($nCnt % 5 ==0){												
												//echo '<div class="row" style="padding-left:15px;">';
											}
											?>						
											<!--<div class="col-md-2">-->
											<?php
											if($nCnt == 1 || $nCnt == 4)
												echo '<div class="col-md-3">';
											else
												echo '<div class="col-md-2">';
											?>
												<a href="search.php?category_id=<?php echo trim($v3["pc_id"]);  ?>" class="title-submenu"><?php echo $v3["pc_name"]; ?></a>
												<div class="row">
													<div class="col-md-12 hover-menu">
														<div class="menu">
															<ul>
															<?php
															foreach($subcat_list as $k7=>$v7){
															?>
																<li><a href="search.php?category_id=<?php echo trim($v3["pc_id"]);  ?>&sub_category_id=<?php echo trim($v7["psc_id"]);  ?>"  class="main-menu"><?php echo $v7["psc_name"]; ?></a></li>									
															<?php
															}
															?>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<?php
											//if($nCnt % 4 ==0){
											if($nCnt % 5 ==0){

												//echo '</div>';
											}
											?>

											<?php
											}
											?>											
										</div>
									</div>
								</div>
							</li>
							<li class="hidden-md">
								
								<a href="auction_product.php">Auction Sale</a>
								
							</li>
							
							<li class="with-sub-menu hover">
								<p class="close-menu"></p>
								<a href="" class="clearfix">
									<strong><?php echo $lang_261; ?></strong>
									
									<b class="caret"></b>
								</a>
								<div class="sub-menu" style="width: 100%; display: none;">
									<div class="content" style="display: none;">
										<div class="row">
											<div class="col-md-8">
												<div class="row">
													<?php
														//$cat_listing=getDetails(doSelect1("pc_id,pc_name","product_category",array(),' ORDER BY rand() LIMIT 6'));
														$cat_listing=getDetails(doSelect1("pc_id,pc_name","product_category",array()));

														$cnt = 0;
														foreach($cat_listing as $k3=>$v3){
															$cnt ++;
														$subcat_list=getDetails(doSelect1("psc_id,psc_name","product_sub_category",array("psc_pc_id"=>$v3["pc_id"]),' LIMIT 3'));	

														if($cnt % 3 ==0){
															
														?>
														<div class="row" style="padding-left:15px">
														<?php
														}
														?>
											<div class="col-md-4">
												<a href="search.php?category_id=<?php echo trim($v3["pc_id"]);  ?>" class="title-submenu"><?php echo $v3["pc_name"]; ?></a>
												<div class="row">
													<div class="col-md-12 hover-menu">
														<div class="menu">
															<ul>
															<?php
															foreach($subcat_list as $k7=>$v7){
															?>
																<li><a href="search.php?category_id=<?php echo trim($v3["pc_id"]);  ?>&sub_category_id=<?php echo trim($v7["psc_id"]);  ?>"  class="main-menu"><?php echo $v7["psc_name"]; ?></a></li>									
															<?php
															}
															?>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<?php
											if($cnt % 3 ==0){
											?>
											</div>
											<?php
											}
											?>

											<?php
											}
											?>
													
												</div>
											</div>
											<div class="col-md-4">
												<div class="row" style="padding-top:5px;padding-left:15px;">
													<span class="title-submenu"><?php echo $lang_259; ?></span>
												    <?php
													$selling_product=getDetails(doSelect1("apr_id,apr_apa_id,SUM(rating) as rating","ambit_product_review",array()," GROUP BY apr_apa_id ORDER BY rating DESC LIMIT 3"));
													
													foreach($selling_product as $k=>$v)
													{
														$select1="api_id,image,status";
														$image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$v["apr_apa_id"],"status"=>1),' LIMIT 0,1'));
													?>
													<div class="col-sm-12 list-product">
														<div class="product-thumb">
															<div class="image">
																<a href="product.php?id=<?php echo $v["apr_apa_id"];  ?>"><img src="vendor/product_photo/<?php echo $image[0]["image"]; ?>"  alt="Canon EOS 5D" title="Canon EOS 5D" class="img-responsive" style="width:100px;height:120px"></a>
															</div>
															<div class="caption">
																<a href="product.php?id=<?php echo $v["apr_apa_id"];  ?>"><?php echo getProductName($v["apr_apa_id"]);  ?></a>
																<div class = "g_rating_price_part">
																	<div class="rating-box">
																		<?php
																		getRatingStar($v["apr_apa_id"]);
																		?>
																	</div>
																	<div clsas = "g_price_part">
																		<p class="price">
																		<?php
																			$price_dtls=seeMoreDetails("price","ambit_product_add",array("apa_id"=>$v["apr_apa_id"]));
																			$price_part=explode("||",$price_dtls);
																			if(trim($price_part[0])!=""){
																			?>
																				
																				<span class="price-new"><?php echo currency1(currency($v["apr_apa_id"]),$price_part[0] - $price_part[2]); ?></span> 
																		    <?php
																			}
																			if(trim($price_part[2])!="" && trim($price_part[2])!='0'){
																			?>
																				
																				<span class="price-old"><?php echo currency1(currency($v["apr_apa_id"]),$old=$price_part[0]);  ?></span>
																			<?php
																			}
																			?>
																		</p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												
													<?php
													}
													?>	
													</div>										
											</div>											
										</div>
									</div>
								</div>
							</li>
							
							<!--<label id="compare">-->
								<?php
								if(isset($_SESSION["compare"]) && trim($_SESSION["compare"]) != ""){
								?>
								<li class="hidden-md"  id="compare">
									<p class="close-menu"></p>
									<a href="compare.php" class="">
										<strong><?php echo $lang_126; ?></strong>
										<span class="label"></span>
									</a>
								</li>
								<?php
								}
								?>
							<!--</label>-->
							<li class="hidden-md">
								<p class="close-menu"></p>
								<a href="vendor_register.php" class="">
									<strong><?php echo $lang_129; ?></strong>
									<span class="label"><?php echo $lang_262; ?></span>								
								</a>
							</li>
							<!--<li class="hidden-md">
								<div class="select_category filter_type icon-select" style="margin-top: 12px;">
								<?php 
								if(isset($_COOKIE['vr_id'])){
								$vr_id=trim($_COOKIE['vr_id']);
								}else{
								$vr_id=0;
								}	
								?>
									<select class="no-border"  id="vr_id" onchange="set_vendor();">
										<option value="0">Select Vendor</option>
										<?php
										$vendor=getDetails(doSelect("vr_id,fname,lname","vendor_registration",array("status"=>1)));
										foreach ($vendor as $k => $v) {
										?>
										<option value="<?php echo $v["vr_id"]; ?>" <?php if($v["vr_id"]==$vr_id) echo 'selected'; ?>><?php echo $v["fname"].' '.$v["lname"];  ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</li> -->
						</ul>
						
					</div>
				</div>
			</div>
		</div>
	</nav>
</div>
									</div>
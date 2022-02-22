<div class="sidebar-menu col-md-3 col-sm-6 col-xs-12 ">
				<div class="responsive so-megamenu ">
					<div class="so-vertical-menu no-gutter compact-hidden">
						<nav class="navbar-default">	
							
							<div class="container-megamenu vertical">
								<div id="menuHeading">
									<div class="megamenuToogle-wrapper">
										<div class="megamenuToogle-pattern">
											<div class="container">
												<div>
													<span></span>
													<span></span>
													<span></span>
												</div>
												<?php echo $lang_253; ?>							
												<i class="fa pull-right arrow-circle fa-chevron-circle-up"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="navbar-header">
									<button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle fa fa-list-alt">
										
									</button>
									<?php echo $lang_253; ?>		
								</div>
								<div class="vertical-wrapper" >
									<span id="remove-verticalmenu" class="fa fa-times"></span>
									<div class="megamenu-pattern">
										<div class="container">
											<ul class="megamenu">
<?php
$cat_listing=getDetails(doSelect1("pc_id,pc_name,pc_icon","product_category",array()));
foreach($cat_listing as $k3=>$v3){
$subcat_list=getDetails(doSelect1("psc_id,psc_name","product_sub_category",array("psc_pc_id"=>$v3["pc_id"])));												
?>				
												<li class="item-vertical style1 with-sub-menu hover">
													<p class="close-menu"></p>
													<a href="search.php?category_id=<?php echo trim($v3["pc_id"]);  ?>" class="clearfix">
													<!-- <a href="product_search.php?category_id=<?php echo trim($v3["pc_id"]);  ?>" class="clearfix"> -->
													<?php if($v3["pc_icon"]==''){?>
														<i class="fa fa-arrow-circle-o-right fa-xx" aria-hidden="true" style="width:35px;"></i>
													<?php } ?>
													<?php if($v3["pc_icon"]!=''){?>
														<i class="fa <?php echo trim($v3["pc_icon"]);  ?> fa-xx" aria-hidden="true" style="width:35px;"></i>
													<?php } ?>
														<span><?php echo ucwords($v3["pc_name"]);  ?></span>
														<?php
														if(!empty($subcat_list)){
														?>
														<b class="caret"></b>
														<?php
														}
														?>
													</a>
													<?php
													if(!empty($subcat_list)){		
													?>
													
													<div class="sub-menu" data-subwidth="100" >
														<div class="content" >
															<div class="row">
																<div class="col-sm-12">
																	<div class="row">
															<?php		
															//$subcat_list=getDetails(doSelect1("psc_id,psc_name","product_sub_category",array("psc_pc_id"=>$v3["pc_id"])));
															foreach($subcat_list as $k2=>$v2){
																
															?>		
																		<div class="col-md-4 static-menu">
																			<div class="menu">
																				<ul>
																					<li>
																						<!-- <a href="product_search.php?category_id=<?php echo trim($v3["pc_id"]);  ?>&sub_category_id=<?php echo trim($v2["psc_id"]);  ?>"  class="main-menu"><?php  echo ucwords($v2["psc_name"]);   ?></a> -->
																						<a href="search.php?category_id=<?php echo trim($v3["pc_id"]);  ?>&sub_category_id=<?php echo trim($v2["psc_id"]);  ?>"  class="main-menu"><?php  echo ucwords($v2["psc_name"]);   ?></a>
																						<ul>
																						<?php		
															$sub_subcat_list=getDetails(doSelect1("pssc_id,pssc_name","product_sub_sub_cat",array("pssc_psc_id"=>$v2["psc_id"])));
															foreach($sub_subcat_list as $k1=>$v1){
															?>	
																							<!-- <li><a href="product_search.php?category_id=<?php echo trim($v3["pc_id"]);  ?>&sub_category_id=<?php echo trim($v2["psc_id"]);  ?>&sub_sub_category_id=<?php echo trim($v1["pssc_id"]);  ?>" ><?php  echo ucwords($v1["pssc_name"]);   ?></a></li> -->
																							<li><a href="search.php?category_id=<?php echo trim($v3["pc_id"]);  ?>&sub_category_id=<?php echo trim($v2["psc_id"]);  ?>&sub_sub_category_id=<?php echo trim($v1["pssc_id"]);  ?>" ><?php  echo ucwords($v1["pssc_name"]);   ?></a></li>
															<?php
															}
															?>
																						</ul>
																					</li>
																					
																				</ul>
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
													<?php
													}
													?>
													
												</li>
												
												
<?php
}
?>													
													
													
													
													
													
													
													
												</ul>
											</div>
										</div>
									</div>
								</div>
							</nav>
					</div>
				</div>

			</div>
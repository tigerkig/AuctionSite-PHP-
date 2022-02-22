<section class="so-spotlight1 ">
		<div class="container">
			<div class="row">
				<!-- <div id="yt_header_right" class="col-lg-offset-3 col-lg-9 col-md-12"> -->
				<div id="yt_header_right" class="col-md-12">
					<div class="slider-container "> 
							
						<div class="module first-block ex_search_top">
							<div class="modcontent clearfix">
								<div id="custom_popular_search" class="clearfix ex_search_center">
									<div><h5 class="so-searchbox-popular-title pull-left"><?php echo $lang_234; ?>:</h5></div>
									<div class="so-searchbox-keyword">
										<ul class="list-inline" style="padding-left:30px;">
											<li class="ex_li_right"><a href="auction_last_minute.php" style="padding:2px 10px;">Last minutes Auction</a></li>
											<li class="ex_li_right"><a href="" data-toggle="modal" data-target="#best_story1" style="padding:2px 10px;">Best story #1</a></li>
											<li class="ex_li_right"><a href="" data-toggle="modal" data-target="#best_story2" style="padding:2px 10px;">Best story #2</a></li>
											<li class="ex_li_right"><a href="" data-toggle="modal" data-target="#best_story3" style="padding:2px 10px;">Best story #3</a></li>
										
										<?php
										//$result=getDetails(doSelect("ab_id,ab_name,top_search_status","ambit_brand",array("top_search_status"=>1),' LIMIT 10'));
										$result=getDetails(doSelect("ab_id,ab_name,top_search_status","ambit_brand",array("top_search_status"=>1),' LIMIT 5'));
										foreach($result as $k=>$v){
										?>
										<li class="ex_li_right">&nbsp;<a href="search.php?search=<?php echo $v["ab_name"];  ?>" style="padding:2px 10px;"><?php echo $v["ab_name"];  ?></a></li>
										<?php
										}
										?>
										</ul>
									</div>
								</div>
							</div>
						</div>

					</div>
					<!-- Main slider -->
					<div>					
						<div id="so-slideshow" class="col-md-12 two-block ex_main_slider" style="border: 1px solid #eceaea; padding: 2px;">
							<div class="module slideshow no-margin col-md-9" style="padding:0px">
								<?php
									$slider=getDetails(doSelect("aas_id,aas_slider,aas_link","ambit_add_slider",array("status"=>1), ' order by aas_id'));
									foreach($slider as $k=>$v){							
								?>							
									<div class="item">
										<a href="<?php echo $v["aas_link"] ?>"><img src="image/demo/slider/<?php echo $v["aas_slider"] ?>" alt="slider1" class="img-responsive" style="width:1500px"></a>
									</div>
								<?php } ?>
							</div>
							<div class="loadeding"></div>
						</div>
						<!-- End Main slider -->

						<!-- Right new project -->
						<div class="module col-md-4 hidden-md  hidden-sm hidden-xs three-block ">
							<div class="modcontent clearfix">
								<div class="htmlcontent-block">	
									<div id="carousel-pager" class="carousel slide " data-ride="carousel" data-interval="5000">
										<!-- Carousel items -->
										<div class="carousel-inner vertical">
										
											<?php
												$slider=getDetails(doSelect("aab_id,aab_banner,aab_link","ambit_add_banner",array("status"=>1),' LIMIT 3'));
												foreach($slider as $k=>$v){		
													if($k == 0){?>
														<div class="active item ">
															<a href="<?php echo $v["aab_link"] ?>"><img class="img-responsive ex_img_border" style="margin-bottom:20px;width:100%;height:210px" src="image/demo/cms/<?php echo $v["aab_banner"] ?>" data-target="#carousel-main" data-slide-to="<?php echo $k;?>" ></a>
														</div>
											  <?php }else{ ?> 
														<div class="item">
															<a href="<?php echo $v["aab_link"] ?>"><img class="img-responsive ex_img_border" style="margin-bottom:20px;width:100%;height:210px" src="image/demo/cms/<?php echo $v["aab_banner"] ?>" data-target="#carousel-main" data-slide-to="<?php echo $k;?>" ></a>
														</div>
												<?php }	?>										
														
												<?php
												}
											?>	
										</div>
										
										<!-- Controls -->
										<a class="left carousel-control" href="#carousel-pager" role="button" data-slide="prev">
											<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
											<span class="sr-only">Previous</span>
										</a>
										<a class="right carousel-control" href="#carousel-pager" role="button" data-slide="next">
											<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
											<span class="sr-only">Next</span>
										</a>
									</div>
								</div>	
							</div>
						</div>
						<!-- End Right new project -->
						
						<!-- Under main Slider -->
					</div>			
						<div class="module hidden-xs col-sm-12 four-block">
							<div class="modcontent clearfix">
								<div class="policy-detail" style="margin-right:5px">
								<?php
								//echo seeMoreDetails("features","ambit_features",array("id"=>1));
								
								?>
									 <div class="banner-policy">
										<div class="policy policy1"><a href="for_buyers.php"> <span class="ico-policy">&nbsp;</span><p class="ex_p_top"><?php echo $lang_291; ?></p></a></div>
										<div class="policy policy2" style="padding: 0 20px;"><a href="for_sellers.php"> <span class="ico-policy">&nbsp;</span><p class="ex_p_top"><?php echo $lang_292; ?></p></a></div>
										<div class="policy policy3"><a href="how_it_works.php"> <span class="ico-policy">&nbsp;</span><p class="ex_p_top"><?php echo $lang_293; ?> </p></a></div>
										<div class="policy policy4"><a href="#"> <span class="ico-policy">&nbsp;</span><p class="ex_p_top"><?php echo $lang_294; ?> </p> </a></div>
									</div>  
									
								</div>
							</div>
						</div>

						<!-- End Under main Slider -->
				</div>
			</div>
		</div>  
	</section>
	
	
<!-- Modal Best Story #1 -->
<div class="modal fade" id="best_story1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top: 200px !important;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
        <h2 class="modal-title" id="myModalLabel" style = "text-align:center; font-weight: bold; font-size:32px;  color:#bd0000;"><?php echo $lang_295; ?></h2>
      </div>
      <div class="modal-body" style="min-height: 100px; font-family:serif; font-style: italic; font-weight: bold; font-size: 22px; color: green;">
       <?php
    	 $best_story1 = seeMoreDetails("comment", "best_story", array("best_id" => 1));
    	 if(!empty($best_story1))
    	 	echo $best_story1;
    	 else
    	 	echo "There is no registered story.";
       ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $lang_296; ?></button>
       <!-- <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>

<!-- Modal Best Story #2 -->
<div class="modal fade" id="best_story2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top: 200px !important;">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
        <h2 class="modal-title" id="myModalLabel" style = "text-align:center; font-weight: bold; font-size:32px;  color:#bd0000;"><?php echo $lang_297; ?></h2>
      </div>
      <div class="modal-body" style="min-height: 100px; font-family:serif; font-style: italic; font-weight: bold; font-size: 22px; color: green;">
       <?php
    	 $best_story2 = seeMoreDetails("comment", "best_story", array("best_id" => 2));
    	 if(!empty($best_story2))
    	 	echo $best_story2;
    	 else
    	 	echo "There is no registered story.";
       ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $lang_296; ?></button>
       <!-- <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>

<!-- Modal Best Story #3 -->
<div class="modal fade" id="best_story3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top: 200px !important;">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
        <h2 class="modal-title" id="myModalLabel" style = "text-align:center; font-weight: bold; font-size:32px;  color:#bd0000;"><?php echo $lang_298; ?></h2>
      </div>
      <div class="modal-body" style="min-height: 100px; font-family:serif; font-style: italic; font-weight: bold; font-size: 22px; color: green;">
       <?php
    	 $best_story3 = seeMoreDetails("comment", "best_story", array("best_id" => 3));
    	 if(!empty($best_story3))
    	 	echo $best_story3;
    	 else
    	 	echo "There is no registered story.";
       ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $lang_296; ?></button>
       <!-- <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>

<style>

	.carousel-inner.vertical {
	height: 100%; /*Note: set specific height here if not, there will be some issues with IE browser*/
	}
	.carousel-inner.vertical > .item {
	-webkit-transition: .6s ease-in-out top;
	-o-transition: .6s ease-in-out top;
	transition: .6s ease-in-out top;
	}

	@media all and (transform-3d),
	(-webkit-transform-3d) {
	.carousel-inner.vertical > .item {
		-webkit-transition: -webkit-transform .6s ease-in-out;
		-o-transition: -o-transform .6s ease-in-out;
		transition: transform .6s ease-in-out;
		-webkit-backface-visibility: hidden;
		backface-visibility: hidden;
		-webkit-perspective: 1000;
		perspective: 1000;
	}
	.carousel-inner.vertical > .item.next,
	.carousel-inner.vertical > .item.active.right {
		-webkit-transform: translate3d(0, 33.33%, 0);
		transform: translate3d(0, 33.33%, 0);
		top: 0;
	}
	.carousel-inner.vertical > .item.prev,
	.carousel-inner.vertical > .item.active.left {
		-webkit-transform: translate3d(0, -33.33%, 0);
		transform: translate3d(0, -33.33%, 0);
		top: 0;
	}
	.carousel-inner.vertical > .item.next.left,
	.carousel-inner.vertical > .item.prev.right,
	.carousel-inner.vertical > .item.active {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
		top: 0;
	}
	}

	.carousel-inner.vertical > .active {
	top: 0;
	}
	.carousel-inner.vertical > .next,
	.carousel-inner.vertical > .prev {
	top: 0;
	height: 100%;
	width: auto;
	}
	.carousel-inner.vertical > .next {
	left: 0;
	top: 33.33%;
	right:0;
	}
	.carousel-inner.vertical > .prev {
	left: 0;
	top: -33.33%;
	right:0;
	}
	.carousel-inner.vertical > .next.left,
	.carousel-inner.vertical > .prev.right {
	top: 0;
	}
	.carousel-inner.vertical > .active.left {
	left: 0;
	top: -33.33%;
	right:0;
	}
	.carousel-inner.vertical > .active.right {
	left: 0;
	top: 33.33%;
	right:0;
	}

	#carousel-pager .carousel-control.left {
		bottom: initial;
		width: 100%;
	}
	#carousel-pager .carousel-control.right {
		top: initial;
		width: 100%;
	}
</style>


<script>
	$('.carousel .vertical .item').each(function(){
	var next = $(this).next();
	if (!next.length) {
		next = $(this).siblings(':first');
	}
	next.children(':first-child').clone().appendTo($(this));
	
	for (var i=1;i<2;i++) {
		next=next.next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		
		next.children(':first-child').clone().appendTo($(this));
	}
	});
</script>
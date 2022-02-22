<footer class="footer-container">
		<!-- Footer Top Container -->
		<section class="footer-top">
			<div class="container content">
				<div class="row">
					<div class="col-sm-6 col-md-3 box-information">
						<div class="module clearfix">
							<h3 class="modtitle"><?php echo $lang_237; ?></h3>
							<div class="modcontent">
								<ul class="menu">
									<li><a href="about_us.php"><?php echo $lang_8; ?></a></li>
									<li><a href="faq.php"><?php echo $lang_238; ?></a></li>
									<li><a href="contact.php"><?php echo $lang_57; ?></a></li>
									<li><a href="cart.php"><?php echo $lang_25; ?></a></li>

									<li><a href="how_it_works.php"><?php echo $lang_287; ?></a></li>
									<li><a href="for_buyers.php"><?php echo $lang_288; ?></a></li>
									<li><a href="for_sellers.php"><?php echo $lang_289; ?></a></li>
									<li><a href="blog.php"><?php echo $lang_290; ?></a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-3 box-service">
						<div class="module clearfix">
							<h3 class="modtitle"><?php echo $lang_239; ?></h3>
							<div class="modcontent">
								<ul class="menu">
									<li><a href="contact.php"><?php echo $lang_57; ?></a></li>
									<li><a href="index.php"><?php echo $lang_149; ?></a></li>
									<li><a href="vendor_register.php"><?php echo $lang_129; ?></a></li>
									<li><a href="vendor/vendor_login.php"><?php echo $lang_240; ?></a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-3 box-account">
						<div class="module clearfix">
							<h3 class="modtitle"><?php echo $lang_241; ?></h3>
							<div class="modcontent">
								<ul class="menu">
									<li><a href="vendor_register.php"><?php echo $lang_242; ?></a></li>
									<li><a href="register.php"><?php echo $lang_243; ?></a></li>
									<li><a href="login.php"><?php echo $lang_70; ?></a></li>

								</ul>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-3 collapsed-block ">
						<div class="module clearfix">
							<h3 class="modtitle"><?php echo $lang_57; ?>	</h3>
							<div class="modcontent">
								<ul class="contact-address">
									<li style="margin-bottom:8px;"><span class="fa fa-map-marker"></span><?php  echo get_site_settings(28); ?></li>
									<li style="margin-bottom:8px;"><span class="fa fa-envelope-o" style="margin-top:0px!important;"></span> <?php echo $lang_113; ?>: <a href="mailto:<?php  echo get_site_settings(23); ?>"><?php  echo get_site_settings(23); ?></a></li>
									<li style="margin-bottom:8px;"><span class="fa fa-phone" style="margin-top:0px!important;"></span> <?php echo $lang_59; ?> : <?php  echo get_site_settings(22); ?></li>
								</ul>
							</div>
						</div>
					</div>

					
				</div>
			</div>
		</section>
		<!-- /Footer Top Container -->
		
		<!-- Footer Bottom Container -->
		<div class="footer-bottom-block ">
			<div class=" container">
				<div class="row">
					<div class="col-sm-5 copyright-text"> <?php echo get_site_settings(34);  ?> </div>
					<div class="col-sm-7">
						<div class="block-payment text-right"><img src="image/demo/content/payment.png" alt="payment" title="payment" ></div>
					</div>
					<!--Back To Top-->
					<div class="back-to-top"><i class="fa fa-angle-up"></i><span> <?php echo $lang_245; ?> </span></div>

				</div>
			</div>
		</div>
		<!-- /Footer Bottom Container -->
		
		
	</footer>
	<!-- //end Footer Container -->

    </div>
	<!-- Social widgets -->
	<section class="social-widgets visible-lg">
        <ul class="items">
            <li class="item item-01 facebook"> <a href="<?php echo get_site_settings(31);  ?>" class="tab-icon" target="_blank"><span class="fa fa-facebook"></span></a>
            </li>
            <li class="item item-02 twitter"> <a href="<?php echo get_site_settings(32);  ?>" class="tab-icon" target="_blank"><span class="fa fa-twitter"></span></a>
            </li>
            <li class="item item-03 youtube"> <a href="<?php echo get_site_settings(33);  ?>" class="tab-icon" target="_blank"><span class="fa fa-youtube"></span></a>
            </li>
        </ul>
    </section>	<!-- End Social widgets -->
	
<!-- Cpanel Block -->
	


<link rel='stylesheet' property='stylesheet'  href='css/themecss/cpanel.css' type='text/css' media='all' />
	
<!-- Preloading Screen -->
<div id="loader-wrapper">
	<div id="loader"></div>
	<div class="loader-section section-left"></div>
	<div class="loader-section section-right"></div>
 </div>
<!-- End Preloading Screen -->



	
<!-- Include Libs & Plugins
============================================ -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
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
<script type="text/javascript" src="js/themejs/application.js"></script>

<script type="text/javascript">
/* ---------------------------------------------------
	Listing Tabs - Slider
-------------------------------------------------- */
$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_1'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_slider[0]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
		tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

 $(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_1'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_slider[1]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
		tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});


$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_1'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_slider[2]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});


$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_1'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_slider[3]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_1'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_slider[4]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_1'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_slider[5]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_1'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_slider[6]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_1'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_slider[7]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),		
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_1'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_slider[8]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

$(document).ready(function($) {
	(function(element) {
		var $element = $(element),
			$tab = $('.ltabs-tab', $element),
			$tab_label = $('.ltabs-tab-label', $tab),
			$tabs = $('.ltabs-tabs', $element),
			//ajax_url = $tabs.parents('.ltabs-tabs-container').attr('data-ajaxurl'),
			effect = $tabs.parents('.ltabs-tabs-container').attr('data-effect'),
			delay = $tabs.parents('.ltabs-tabs-container').attr('data-delay'),
			duration = $tabs.parents('.ltabs-tabs-container').attr('data-duration'),
			type_source = $tabs.parents('.ltabs-tabs-container').attr('data-type_source'),
			$items_content = $('.ltabs-items', $element),
			$items_inner = $('.ltabs-items-inner', $items_content),
			$items_first_active = $('.ltabs-items-selected', $element),
			$select_box = $('.ltabs-selectbox', $element),
			$tab_label_select = $('.ltabs-tab-selected', $element),
			type_show = 'slider';
			enableSelectBoxes();

		function enableSelectBoxes() {
			$tab_wrap = $('.ltabs-tabs-wrap', $element),
				$tab_label_select.html($('.ltabs-tab', $element).filter('.tab-sel').children('.ltabs-tab-label').html());
			if ($(window).innerWidth() <= 767) {
				$tab_wrap.addClass('ltabs-selectbox');
			} else {
				$tab_wrap.removeClass('ltabs-selectbox');
			}
		}
		$('span.ltabs-tab-selected, span.ltabs-tab-arrow', $element).click(function() {
			if ($('.ltabs-tabs', $element).hasClass('ltabs-open')) {
				$('.ltabs-tabs', $element).removeClass('ltabs-open');
			} else {
				$('.ltabs-tabs', $element).addClass('ltabs-open');
			}
		});
		$(window).resize(function() {
			if ($(window).innerWidth() <= 767) {
				$('.ltabs-tabs-wrap', $element).addClass('ltabs-selectbox');
			} else {
				$('.ltabs-tabs-wrap', $element).removeClass('ltabs-selectbox');
			}
		});
		
		$tab.on('shown.bs.tab', function (e) {
		
			$($(e.target).attr('href'))
				.find('.owl2-carousel')
				.owlCarousel2('invalidate', 'width')
				.owlCarousel2('update')
		})
		
		$tab.on('click.tab', function() {
			var $this = $(this);
			
			if ($this.hasClass('tab-sel')) return false;
			if ($this.parents('.ltabs-tabs').hasClass('ltabs-open')) {
				$this.parents('.ltabs-tabs').removeClass('ltabs-open');
			}
			$tab.removeClass('tab-sel');
			$this.addClass('tab-sel');
			var items_active = $this.attr('data-active-content');
			var _items_active = $(items_active, $element);
			$items_content.removeClass('ltabs-items-selected');
			_items_active.addClass('ltabs-items-selected');
			$tab_label_select.html($tab.filter('.tab-sel').children('.ltabs-tab-label').html());
			var $loading = $('.ltabs-loading', _items_active);
			var loaded = _items_active.hasClass('ltabs-items-loaded');
			if (!loaded && !_items_active.hasClass('ltabs-process')) {
				_items_active.addClass('ltabs-process');
				var category_id = $this.attr('data-category-id');
				$loading.show();
				
			} 
		});

	})('#so_listing_tabs_1');
});


$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_4'),
		parent_active = $('.items-category-1', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
									nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});


$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_2'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_2ndslider[0]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_2'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_2ndslider[1]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
									tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_2'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_2ndslider[2]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});


	
$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_2'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_2ndslider[3]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_2'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_2ndslider[4]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_2'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_2ndslider[5]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_2'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_2ndslider[6]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_2'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_2ndslider[7]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_2'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_2ndslider[8]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
		nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});




$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_5'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_3rdslider[0]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
									nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_5'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_3rdslider[1]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
										nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
									tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});

$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_5'),
		parent_active = $('.items-category-<?php echo $cat_listing_for_3rdslider[2]["pc_id"];  ?>', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
									nb_column0 = 4,
		nb_column1 = 3,
		nb_column2 = 2,
		nb_column3 = 1,
		nb_column4 = 1;
								tab_active.owlCarousel2({
		nav: true,
		dots: false,
		margin: 25,
		loop: false,
		autoplay: false,
		autoplayHoverPause: true,
		autoplayTimeout: 5000,
		autoplaySpeed: 5000,
		navRewind: true,
		navText: ['', ''],
		responsive: {
			0: {
				items: nb_column4,
				nav: total_product <= nb_column4 ? false : ((true) ? true : false),
			},
			480: {
				items: nb_column3,
				nav: total_product <= nb_column3 ? false : ((true) ? true : false),
			},
			768: {
				items: nb_column2,
				nav: total_product <= nb_column2 ? false : ((true) ? true : false),
			},
			992: {
				items: nb_column1,
				nav: total_product <= nb_column1 ? false : ((true) ? true : false),
			},
			1200: {
				items: nb_column0,
				nav: total_product <= nb_column0 ? false : ((true) ? true : false),
			},
		}
	});
});


$(document).ready(function($) {;
	(function(element) {
		var $element = $(element),
			$tab = $('.ltabs-tab', $element),
			$tab_label = $('.ltabs-tab-label', $tab),
			$tabs = $('.ltabs-tabs', $element),
			//ajax_url = $tabs.parents('.ltabs-tabs-container').attr('data-ajaxurl'),
			effect = $tabs.parents('.ltabs-tabs-container').attr('data-effect'),
			delay = $tabs.parents('.ltabs-tabs-container').attr('data-delay'),
			duration = $tabs.parents('.ltabs-tabs-container').attr('data-duration'),
			type_source = $tabs.parents('.ltabs-tabs-container').attr('data-type_source'),
			$items_content = $('.ltabs-items', $element),
			$items_inner = $('.ltabs-items-inner', $items_content),
			$items_first_active = $('.ltabs-items-selected', $element),
			$select_box = $('.ltabs-selectbox', $element),
			$tab_label_select = $('.ltabs-tab-selected', $element),
			type_show = 'slider';
			enableSelectBoxes();

		function enableSelectBoxes() {
			$tab_wrap = $('.ltabs-tabs-wrap', $element),
				$tab_label_select.html($('.ltabs-tab', $element).filter('.tab-sel').children('.ltabs-tab-label').html());
			if ($(window).innerWidth() <= 767) {
				$tab_wrap.addClass('ltabs-selectbox');
			} else {
				$tab_wrap.removeClass('ltabs-selectbox');
			}
		}
		$('span.ltabs-tab-selected, span.ltabs-tab-arrow', $element).click(function() {
			if ($('.ltabs-tabs', $element).hasClass('ltabs-open')) {
				$('.ltabs-tabs', $element).removeClass('ltabs-open');
			} else {
				$('.ltabs-tabs', $element).addClass('ltabs-open');
			}
		});
		$(window).resize(function() {
			if ($(window).innerWidth() <= 767) {
				$('.ltabs-tabs-wrap', $element).addClass('ltabs-selectbox');
			} else {
				$('.ltabs-tabs-wrap', $element).removeClass('ltabs-selectbox');
			}
		});
		
		
		$tab.on('click.tab', function() {
			var $this = $(this);
			console.log('tabs');
			if ($this.hasClass('tab-sel')) return false;
			if ($this.parents('.ltabs-tabs').hasClass('ltabs-open')) {
				$this.parents('.ltabs-tabs').removeClass('ltabs-open');
			}
			$tab.removeClass('tab-sel');
			$this.addClass('tab-sel');
			var items_active = $this.attr('data-active-content');
			var _items_active = $(items_active, $element);
			$items_content.removeClass('ltabs-items-selected');
			_items_active.addClass('ltabs-items-selected');
			$tab_label_select.html($tab.filter('.tab-sel').children('.ltabs-tab-label').html());
			var $loading = $('.ltabs-loading', _items_active);
			var loaded = _items_active.hasClass('ltabs-items-loaded');
			if (!loaded && !_items_active.hasClass('ltabs-process')) {
				_items_active.addClass('ltabs-process');
				var category_id = $this.attr('data-category-id');
				$loading.show();
				
			} 
		});

	})('#so_listing_tabs_2');
	});
	
	
$(document).ready(function() {
	var zoomCollection = '.large-image img';
	$( zoomCollection ).elevateZoom({
		zoomType    : "inner",
		lensSize    :"200",
		easing:true,
		gallery:'thumb-slider',
		cursor: 'pointer',
		galleryActiveClass: "active"
	});
	 $('.large-image').magnificPopup({
		items: [
		
		<?php
		foreach($show_image as $k=>$v){
		?>
			{src: 'vendor/product_photo/<?php echo $v["image"]; ?>' },
		<?php
		}
		?>		
				
			/* {src: 'image/demo/shop/product/J6.jpg' },
			{src: 'image/demo/shop/product/J5.jpg' },
			{src: 'image/demo/shop/product/J4.jpg' }, */
		],
		gallery: { enabled: true, preload: [0,2] },
		type: 'image',
		mainClass: 'mfp-fade',
		callbacks: {
			open: function() {
				
				var activeIndex = parseInt($('#thumb-slider .img.active').attr('data-index'));
				var magnificPopup = $.magnificPopup.instance;
				magnificPopup.goTo(activeIndex);
			}
		}
	});
	$("#thumb-slider .owl2-item").each(function() {
		$(this).find("[data-index='0']").addClass('active');
	});
	
	$('.thumb-video').magnificPopup({
	  type: 'iframe',
	  iframe: {
		patterns: {
		   youtube: {
			  index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
			  id: 'v=', // String that splits URL in a two parts, second part should be %id%
			  src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe. 
				},
			}
		}
	});
	$('.product-options li.radio').click(function(){
		$(this).addClass(function() {
			if($(this).hasClass("active")) return "";
			return "active";
		});
		
		$(this).siblings("li").removeClass("active");
		$(this).parent().find('.selected-option').html('<span class="label label-success">'+ $(this).find('img').data('original-title') +'</span>');
	});
	// Product detial reviews button
	$(".reviews_button,.write_review_button").click(function (){
		var tabTop = $(".producttab").offset().top;
		$("html, body").animate({ scrollTop:tabTop }, 1000);
	});
	
	//Client Say
	$('.slider-clients-say').owlCarousel2({
		pagination: false,
		center: false,
		nav: true,
		loop: false,
		margin: 25,
		navText: [ 'prev', 'next' ],
		slideBy: 1,
		autoplay: false,
		autoplayTimeout: 2500,
		autoplayHoverPause: true,
		autoplaySpeed: 800,
		startPosition: 0, 
		responsive:{
			0:{
				items:1
			},
			480:{
				items:1
			},
			768:{
				items:1
			},
			1200:{
				items:1
			}
		}
	});	 
});

$(function() {
	var austDay = new Date(2018, 02 - 1, 1);
	$('.defaultCountdown-31').countdown(austDay, function(event) {
		var $this = $(this).html(event.strftime(''
		   + '<div class="time-item time-day"><div class="num-time">%D</div><div class="name-time">Day </div></div>'
		   + '<div class="time-item time-hour"><div class="num-time">%H</div><div class="name-time">Hour </div></div>'
		   + '<div class="time-item time-min"><div class="num-time">%M</div><div class="name-time">Min </div></div>'
		   + '<div class="time-item time-sec"><div class="num-time">%S</div><div class="name-time">Sec </div></div>'));
	});

});
	
</script>	



<script type="text/javascript" src="js/themejs/toppanel.js"></script>
<script type="text/javascript" src="js/themejs/so_megamenu.js"></script>
<script type="text/javascript" src="js/themejs/addtocart.js"></script>	
<script type="text/javascript" src="js/themejs/cpanel.js"></script>

<script>
    function bid_now(){
        var target_path='<?php echo $_SERVER["REQUEST_URI"]; ?>';
        $.post(
            'check_login.php',
            {target_path:target_path},
            function(r){
                if(r==1){
                    check_bidder();
                }else{
                    window.location='login.php';
                }
                // if(r==1){
                // 	check_bidder();
                // }else if(r==0){
                // 	window.location='login.php';
                // }else if (r==2){
                // 	window.location='register_detail.php';
                // }
            }
        );

    }

    function check_bidder(){
        $.post(
            'ajax_check_bidder.php',
            {apa_id:<?php echo $_GET["id"]; ?>},
            function(r){
                if(r==404){
					toastr.error("Sorry! you have placed higest bid.");
                    return false;
                    // }else{

                    // 	$("#bid_value").show(500);
                    // 	$("#bid_value").focus();
                    // 	$("#bid_now_button").hide(500);
                    // 	$("#bid_submit").show(500);
                    // }
                }
				else if(r==1){

                    $("#bid_value").show(500);
                    $("#bid_value").focus();
                    $("#bid_now_button").hide(500);
                    $("#bid_submit").show(500);
                }else if(r==2){
                    window.location='register_detail.php';
                }

            }
        );
    }

    function bid_retract(){
        $.post(
            'ajax_bid_retract.php',
            {apa_id:<?php echo $_GET["id"]; ?>},
            function(r){
                toastr.info("Your price is "+r);
				setTimeout(function() { location.reload(); }, 1000);
                
            }
        );
    }

    function only_number(value)
    {
        var charCode = (value.which) ? value.which : value.keyCode;
        if (charCode != 46 && charCode > 31  && (charCode < 48 || charCode > 57)){
            return false;
        }else{
            return true;
        }

    }

    function bid_submit_amnt(){
        var bid_value=$("#bid_value").val().trim();
		if(bid_value > 100000){
			toastr.error("You can't input over than 100000");
		}else{

			$.post(
				'ajax_post_bid.php',
				{bid_amount:bid_value,apa_id:<?php echo $_GET["id"]; ?>},
				function(r){
					//alert(r);
					var r=r.split("||");
					if(r[0]==1){
						location.reload();
					}else if(r[0]==2){
						toastr.error("Sorry! now higest bid is :"+r[1]);
					}else if(r[0]==404){
						toastr.error("Sorry! you have placed higest bid.");
					}else{
						toastr.error("Failed");
					}
				}
			);

		}
        
    }



</script>
</body>
</html>
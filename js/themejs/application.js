/* -------------------------------------------------------------------------------- /
	
	Magentech jQuery
	Created by Magentech
	v1.0 - 20.9.2016
	All rights reserved.

	+----------------------------------------------------+
		TABLE OF CONTENTS
	+----------------------------------------------------+
	
	[1]		Language and Currency Dropdowns
	[2]		Header Top link
	[3]		Resonsive Header Top
	[4]		Accordion to Bonus page
	[5]		Magnific Popup
	[6]		Quick View
	[7]		Quantity minus and plus
	[8]		Owl carousel - Slider
	[9]		Listing Tabs - Slider
	[10]	Other Query
	[11]	Page Quickview
	[12]	Page About Us
	[13]	Page Category
	[14]	Page Detail
	[15]	Page Home2
/ -------------------------------------------------------------------------------- */
$(document).ready(function(){
/* ---------------------------------------------------
	Language and Currency Dropdowns
-------------------------------------------------- */

	$screensize = $(window).width();
	if ($screensize > 991) {
	$('#currency, #bt-language, #my_account').hover(function() {
		$(this).find('ul').stop(true, true).slideDown('fast');
	  },function() {
		$(this).find('ul').stop(true, true).css('display', 'none');
	  });
	}
	
// Hide tooltip when clicking on it
    var hasTooltip = $("[data-toggle='tooltip']").tooltip();
	hasTooltip.on('click', function () {
		    $(this).tooltip('hide')
	});
/* ---------------------------------------------------
	Header Top link
-------------------------------------------------- */
	$(".header-top-right .top-link > li").mouseenter(function(){
		$(".header-top-right .top-link > li.account").addClass('inactive');
	});
	$(".header-top-right .top-link > li").mouseleave(function(){
		$(".header-top-right .top-link > li.account").removeClass('inactive');
	});
	$(".header-top-right .top-link > li.account").mouseenter(function(){
		$(".header-top-right .top-link > li.account").removeClass('inactive');
	});
/* ---------------------------------------------------
	Resonsive Header Top
-------------------------------------------------- */
	$(".collapsed-block .expander").click(function (e) {
        var collapse_content_selector = $(this).attr("href");
        var expander = $(this);
		
        if (!$(collapse_content_selector).hasClass("open")) {
			expander.addClass("open").html("<i class='fa fa-angle-up'></i>") ;
		}
		else expander.removeClass("open").html("<i class='fa fa-angle-down'></i>");
		
		if (!$(collapse_content_selector).hasClass("open")) $(collapse_content_selector).addClass("open").slideDown("normal");
        else $(collapse_content_selector).removeClass("open").slideUp("normal");
        e.preventDefault()
    })

/* ---------------------------------------------------
	Accordion to Bonus page
-------------------------------------------------- */
	$("ul.yt-accordion li").each(function() {
		if($(this).index() > 0) {
			$(this).children(".accordion-inner").css('display', 'none');
		}
		else {
			$(this).find(".accordion-heading").addClass('active');
		}
		
		var ua = navigator.userAgent,
		event = (ua.match(/iPad/i)) ? "touchstart" : "click";
		$(this).children(".accordion-heading").bind(event, function() {
			$(this).addClass(function() {
				if($(this).hasClass("active")) return "";
				return "active";
			});
	
			$(this).siblings(".accordion-inner").slideDown(350);
			$(this).parent().siblings("li").children(".accordion-inner").slideUp(350);
			$(this).parent().siblings("li").find(".active").removeClass("active");
		});
	});
	

	
/* ---------------------------------------------------
	Magnific Popup
-------------------------------------------------- */
    $('.image-popup').magnificPopup({
	  type: 'image',
	  closeOnContentClick: true,
	  image: {
		verticalFit: false
	  }
	});
	$('.blog-listitem').magnificPopup({
	  delegate: '.popup-gallery',
	  type: 'image',
	  tLoading: 'Loading image #%curr%...',
	  mainClass: 'mfp-img-mobile',
	  gallery: {
		enabled: true,
		navigateByImgClick: true,
		preload: [0,1] // Will preload 0 - before current, and 1 after the current image
	  },
	  image: {
		tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
		titleSrc: function(item) {
		  return item.el.attr('title') ;
		}
	  }
	});
	
	
/* ---------------------------------------------------
	Quick View
-------------------------------------------------- */
	
	$('.iframe-link').magnificPopup({
		type:'iframe',
	    fixedContentPos: true,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
		closeOnContentClick: true,
        preloader: true,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in',
		gallery: {  enabled: true },
		
		  callbacks: {
		    markupParse: function(template, values, item) {
		      // optionally apply your own logic - modify "template" element based on data in "values"
		      // console.log('Parsing:', template, values, item);
		    },
		     beforeClose: function() {
		    // Callback available since v0.9.0
		    	window.location.href = target_path;
		  	}
 		 }
    });
	
	

/* ---------------------------------------------------
	Preloading Screen
-------------------------------------------------- */
$(window).load(function() {
	// Animate loader off screen
	$('body').addClass('loaded');
});
$(window).load(function() {
	jQuery(".loader").fadeOut("slow");
})
						
/* ---------------------------------------------------
	Back to Top
-------------------------------------------------- */
$(".back-to-top").addClass("hidden-top");
	$(window).scroll(function () {
	if ($(this).scrollTop() === 0) {
		$(".back-to-top").addClass("hidden-top")
	} else {
		$(".back-to-top").removeClass("hidden-top")
	}
});

$('.back-to-top').click(function () {
	$('body,html').animate({scrollTop:0}, 1200);
	return false;
});	
/* ---------------------------------------------------
	Range slider && Filter  Reset
-------------------------------------------------- */
if($('#slider').length){
	window.startRangeValues = [28.00, 562.00];
	$('#slider').slider({

		range : true,
		min : 10.00,
		max : 580.00,
		values : window.startRangeValues,
		step : 0.01,

		slide : function(event, ui){

			var min = ui.values[0].toFixed(2),
				max = ui.values[1].toFixed(2),
				range = $(this).siblings('.range');


			range.children('.min_value').val(min).next().val(max);

			range.children('.min_val').text('$' + min).next().text('$' + max);

		},

		create : function(event, ui){

			var $this = $(this),
				min = $this.slider("values", 0).toFixed(2),
				max = $this.slider("values", 1).toFixed(2),
				range = $this.siblings('.range');

			range.children('.min_value').val(min).next().val(max);

			range.children('.min_val').text('$' + min).next().text('$' + max);
			
		}

	});

}

	if(!window.startRangeValues) return;
		var startValues = window.startRangeValues,
			min = startValues[0].toFixed(2),
			max = startValues[1].toFixed(2);
		$('.filter_reset').on('click', function(){

			var form = $(this).closest('form'),
				range = form.find('.range');

				console.log(startValues);

			// form.find('#slider').slider('option','values', startValues);

			form.find('#slider').slider('values', 0, min);
			form.find('#slider').slider('values', 1, max);

			form.find('.options_list').children().eq(0).children().trigger('click');

			range.children('.min_value').val(min).next().val(max);

			range.children('.min_val').text('$' + min).next().text('$' + max);

		});

	

});


/* ---------------------------------------------------
	Quantity minus and plus
-------------------------------------------------- */
$(function ($) {
    "use strict";
	

	//Quantity plus minus 
    $.initQuantity = function ($control) {
        $control.each(function () {
            var $this = $(this),
                data = $this.data("inited-control"),
                $plus = $(".input-group-addon:last", $this),
                $minus = $(".input-group-addon:first", $this),
                $value = $(".form-control", $this);
            if (!data) {
                $control.attr("unselectable", "on").css({
                    "-moz-user-select": "none",
                    "-o-user-select": "none",
                    "-khtml-user-select": "none",
                    "-webkit-user-select": "none",
                    "-ms-user-select": "none",
                    "user-select": "none"
                }).bind("selectstart", function () {
                    return false
                });
                $plus.click(function () {
                    var val =
                        parseInt($value.val()) + 1;
                    $value.val(val);
                    return false
                });
                $minus.click(function () {
                    var val = parseInt($value.val()) - 1;
                    $value.val(val > 0 ? val : 1);
                    return false
                });
                $value.blur(function () {
                    var val = parseInt($value.val());
                    $value.val(val > 0 ? val : 1)
                })
            }
        })
    };
    $.initQuantity($(".quantity-control"));
    $.initSelect = function ($select) {
        $select.each(function () {
            var $this = $(this),
                data = $this.data("inited-select"),
                $value = $(".value", $this),
                $hidden = $(".input-hidden", $this),
                $items = $(".dropdown-menu li > a", $this);
            if (!data) {
                $items.click(function (e) {
                    if ($(this).closest(".sort-isotope").length >
                        0) e.preventDefault();
                    var data = $(this).attr("data-value"),
                        dataHTML = $(this).html();
                    $this.trigger("change", {
                        value: data,
                        html: dataHTML
                    });
                    $value.html(dataHTML);
                    if ($hidden.length) $hidden.val(data)
                });
                $this.data("inited-select", true)
            }
        })
    };
    $.initSelect($(".btn-select"));
	
	if(!window.startRangeValues) return;
	var startValues = window.startRangeValues,
		min = startValues[0].toFixed(2),
		max = startValues[1].toFixed(2);

	$('.filter_reset').on('click', function(){

		var form = $(this).closest('form'),
			range = form.find('.range');

			console.log(startValues);

		// form.find('#slider').slider('option','values', startValues);

		form.find('#slider').slider('values', 0, min);
		form.find('#slider').slider('values', 1, max);

		form.find('.options_list').children().eq(0).children().trigger('click');

		range.children('.min_value').val(min).next().val(max);

		range.children('.min_val').text('$' + min).next().text('$' + max);

	});
	
	
});

/* ---------------------------------------------------
	Owl carousel - Slider
-------------------------------------------------- */
$('.slideshow').owlCarousel2({
	loop:true,
	margin:0,
	responsiveClass:true,
	nav: true,
	dots: false,
	autoplay : true,
	responsive:{
		0:{
			items:1,
		},
		600:{
			items:1,
		},
		1000:{
			items:1,
		}
	}
});


	
/* ---------------------------------------------------
	Other Query
-------------------------------------------------- */
$(document).ready(function($) {
	$('.date').datetimepicker({
		pickTime: false
	});
});

/* ---------------------------------------------------
	page Quickview
-------------------------------------------------- */

$(document).ready(function() {
	var $nav = $("#thumb-slider");
	$nav.each(function() {
		$(this).owlCarousel2({
			nav: true,
			dots: false,
			slideBy: 1,
			margin: 10,
			responsive: {
				0: {
					items: 2
				},
				600: {
					items: 3
				},
				1000: {
					items: 3
				}
			}
		});
	})
	
	var zoomCollection = '.large-image img';
	$( zoomCollection ).elevateZoom({
		zoomType    : "inner",
		lensSize    :"200",
		easing:true,
		gallery:'thumb-slider',
		cursor: 'pointer',
		galleryActiveClass: "active"
	});
	$('.product-options li.radio').click(function(){
		$(this).addClass(function() {
			if($(this).hasClass("active")) return "";
			return "active";
		});
		
		$(this).siblings("li").removeClass("active");
		$(this).parent().find('.selected-option').html('<span class="label label-success">'+ $(this).find('img').data('original-title') +'</span>');
	})
});

/* ---------------------------------------------------
	Page About Us
-------------------------------------------------- */
$(document).ready(function() {
	$('#ytcs579bfc965e489183711469840534').each(function() {
		var slider = $(this),
			data = slider.data();
		// Remove unwanted br's
		slider.children(':not(.yt-content-slide)').remove();
		// Apply Owl Carousel
		slider.owlCarousel2({
			mouseDrag: true,
			video: true,
			lazyLoad: (data.lazyload == 'yes') ? true : false,
			autoplay: (data.autoplay == 'yes') ? true : false,
			autoHeight: (data.autoheight == 'yes') ? true : false,
			autoplayTimeout: data.delay * 1000,
			smartSpeed: data.speed * 1000,
			autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
			center: (data.center == 'yes') ? true : false,
			loop: (data.loop == 'yes') ? true : false,
			dots: (data.pagination == 'yes') ? true : false,
			nav: (data.arrows == 'yes') ? true : false,
			margin: data.margin,
			navText: ['next', 'prev'],
			responsive: {
				0: {
					items: data.item_xs
				},
				768: {
					items: data.item_sm
				},
				992: {
					items: data.item_lg
				}
			},
		});

	});
	$('#ytcs579bfc965e78d103041469840534').each(function() {
		var slider = $(this),
			panels = slider.children('div'),
			data = slider.data();

		// Remove unwanted br's
		slider.children(':not(.yt-content-slide)').remove();
		// Apply Owl Carousel
		slider.owlCarousel2({
			
			mouseDrag: true,
			video: true,
			lazyLoad: (data.lazyload == 'yes') ? true : false,
			autoplay: (data.autoplay == 'yes') ? true : false,
			autoHeight: (data.autoheight == 'yes') ? true : false,
			autoplayTimeout: data.delay * 1000,
			smartSpeed: data.speed * 1000,
			autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
			center: (data.center == 'yes') ? true : false,
			loop: (data.loop == 'yes') ? true : false,
			dots: (data.pagination == 'yes') ? true : false,
			nav: (data.arrows == 'yes') ? true : false,
			margin: data.margin,
			navText: ['next', 'prev'],
			responsive: {
				0: {
					items: data.item_xs
				},
				768: {
					items: data.item_sm
				},
				992: {
					items: data.item_lg
				}
			},
		});

	});
	$('#ytcs579c07146430563341469843220').each(function() {
		var slider = $(this),
			panels = slider.children('div'),
			data = slider.data();

		// Remove unwanted br's
		slider.children(':not(.yt-content-slide)').remove();
		// Apply Owl Carousel
		slider.owlCarousel2({

			mouseDrag: true,
			video: true,
			lazyLoad: (data.lazyload == 'yes') ? true : false,
			autoplay: (data.autoplay == 'yes') ? true : false,
			autoHeight: (data.autoheight == 'yes') ? true : false,
			autoplayTimeout: data.delay * 1000,
			smartSpeed: data.speed * 1000,
			autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
			center: (data.center == 'yes') ? true : false,
			loop: (data.loop == 'yes') ? true : false,
			dots: (data.pagination == 'yes') ? true : false,
			nav: (data.arrows == 'yes') ? true : false,
			margin: data.margin,
			navText: ['next', 'prev'],
			responsive: {
				0: {
					items: data.item_xs
				},
				768: {
					items: data.item_sm
				},
				992: {
					items: data.item_lg
				}
			},
		});

	});
	
	$('#ytcs579c07146456674551469843220').each(function() {
		var slider = $(this),
			panels = slider.children('div'),
			data = slider.data();

		// Remove unwanted br's
		slider.children(':not(.yt-content-slide)').remove();
		// Apply Owl Carousel
		slider.owlCarousel2({

			mouseDrag: true,
			video: true,
			lazyLoad: (data.lazyload == 'yes') ? true : false,
			autoplay: (data.autoplay == 'yes') ? true : false,
			autoHeight: (data.autoheight == 'yes') ? true : false,
			autoplayTimeout: data.delay * 1000,
			smartSpeed: data.speed * 1000,
			autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
			center: (data.center == 'yes') ? true : false,
			loop: (data.loop == 'yes') ? true : false,
			dots: (data.pagination == 'yes') ? true : false,
			nav: (data.arrows == 'yes') ? true : false,
			margin: data.margin,
			navText: ['next', 'prev'],
			responsive: {
				0: {
					items: data.item_xs
				},
				768: {
					items: data.item_sm
				},
				992: {
					items: data.item_lg
				}
			},
		});

	});
	$('#ytcs579c0714641b9213691469843220').each(function() {
		var slider = $(this),
			panels = slider.children('div'),
			data = slider.data();

		// Remove unwanted br's
		slider.children(':not(.yt-content-slide)').remove();
		// Apply Owl Carousel
		slider.owlCarousel2({

			mouseDrag: true,
			video: true,
			lazyLoad: (data.lazyload == 'yes') ? true : false,
			autoplay: (data.autoplay == 'yes') ? true : false,
			autoHeight: (data.autoheight == 'yes') ? true : false,
			autoplayTimeout: data.delay * 1000,
			smartSpeed: data.speed * 1000,
			autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
			center: (data.center == 'yes') ? true : false,
			loop: (data.loop == 'yes') ? true : false,
			dots: (data.pagination == 'yes') ? true : false,
			nav: (data.arrows == 'yes') ? true : false,
			margin: data.margin,
			navText: ['next', 'prev'],
			responsive: {
				0: {
					items: data.item_xs
				},
				768: {
					items: data.item_sm
				},
				992: {
					items: data.item_lg
				}
			},
		});

	});
});

/* ---------------------------------------------------
	Page Category
-------------------------------------------------- */

$(document).ready(function(){
	$('#cat_accordion').cutomAccordion ({
		eventType: 'click',
		autoClose: true,
		saveState: true,
		disableLink: true,
		speed: 'slow',
		showCount: false,
		autoExpand: true,
		cookie	: 'dcjq-accordion-1',
		classExpand	 : 'button-view'
	});  
});

$(function() {
	var austDay = new Date(2017, 3 - 1, 28);
	$('.defaultCountdown-30').countdown(austDay, function(event) {
		var $this = $(this).html(event.strftime(''
		   + '<div class="time-item time-day"><div class="num-time">%D</div><div class="name-time">Day </div></div>'
		   + '<div class="time-item time-hour"><div class="num-time">%H</div><div class="name-time">Hour </div></div>'
		   + '<div class="time-item time-min"><div class="num-time">%M</div><div class="name-time">Min </div></div>'
		   + '<div class="time-item time-sec"><div class="num-time">%S</div><div class="name-time">Sec </div></div>'));
	});

});

function display(view) {
		$('.products-list').removeClass('list grid').addClass(view);
		$('.list-view .btn').removeClass('active');
		if(view == 'list') {
			$('.products-list .product-layout').addClass('col-lg-12');
			$('.products-list .product-layout .left-block').addClass('col-md-3');
			$('.products-list .product-layout .right-block').addClass('col-md-8');
			$('.products-list .product-layout .item-desc').removeClass('hidden');
			$('.list-view .' + view).addClass('active');
			$.cookie('display', 'list'); 
		}else{
			$('.products-list .product-layout').removeClass('col-lg-12');
			$('.products-list .product-layout .left-block').removeClass('col-md-3');
			$('.products-list .product-layout .right-block').removeClass('col-md-8');
			$('.products-list .product-layout .item-desc').addClass('hidden');
			$('.list-view .' + view).addClass('active');
			$.cookie('display', 'grid');
		}
	}
	
	$(document).ready(function () {
		// Check if Cookie exists
		if($.cookie('display')){
			view = $.cookie('display');
		}else{
			view = 'grid' ;
		}
		if(view) display(view);
		
		// Click Button
		$('.list-view .btn').each(function() {
			var ua = navigator.userAgent,
			event = (ua.match(/iPad/i)) ? 'touchstart' : 'click';
			$(this).bind(event, function() {
				$(this).addClass(function() {
					if($(this).hasClass('active')) return ''; 
					return 'active';
				});
				$(this).siblings('.btn').removeClass('active');
				$catalog_mode = $(this).data('view');
				display($catalog_mode);
			});
			
		});
	});

/* ---------------------------------------------------
	Page Product Detail
-------------------------------------------------- */
$(document).ready(function($) {
	$('.releate-products').owlCarousel2({
		pagination: false,
		center: false,
		nav: true,
		dots: false,
		loop: true,
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
				items:2
			},
			1024:{
				items:3
			},
			1200:{
				items:4
			}
		}
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


/* ---------------------------------------------------
	Page Home 2
-------------------------------------------------- */
$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_3'),
		parent_active = $('.items-category-20', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
									nb_column0 = 3,
		nb_column1 = 2,
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
	var $tag_id = $('#so_listing_tabs_3'),
		parent_active = $('.items-category-18', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
										nb_column0 = 3,
		nb_column1 = 2,
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
	var $tag_id = $('#so_listing_tabs_3'),
		parent_active = $('.items-category-25', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
									nb_column0 = 3,
		nb_column1 = 2,
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

	})('#so_listing_tabs_3');
});

$(document).ready(function($) {
	var $tag_id = $('#so_listing_tabs_4'),
		parent_active = $('.items-category-1', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
									nb_column0 = 3,
		nb_column1 = 2,
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
	var $tag_id = $('#so_listing_tabs_4'),
		parent_active = $('.items-category-2', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
										nb_column0 = 3,
		nb_column1 = 2,
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
	var $tag_id = $('#so_listing_tabs_4'),
		parent_active = $('.items-category-3', $tag_id),
		total_product = parent_active.data('total'),
		tab_active = $('.ltabs-items-inner', parent_active),
									nb_column0 = 3,
		nb_column1 = 2,
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

	})('#so_listing_tabs_4');
});

// $(document).ready(function($) {
// 	$('#grid_product').show();
// 	$('#grid').click(function (){
// 		$('#grid').addClass("active");
// 		$('#list').removeClass("active");
// 		$('#grid_product').show();
// 		$('#list_product').hide();
// 	});
// 	$('#list').click(function (){
// 		$('#list').addClass("active");
// 		$('#grid').removeClass("active");
// 		$('#list_product').show();
// 		$('#grid_product').hide();
// 	})
// });
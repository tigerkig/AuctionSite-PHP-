$(document).ready(function(){
	// tooltips on hover
	$('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
	
	/* Begin: Show hide cpanel */  
	var ua = navigator.userAgent;
    event = (ua.match(/iPad/i)) ? "touchstart" : "click";
	widthC = $('#sp-cpanel').width()+40; 
	$("#sp-cpanel_btn").bind("click", function() {
		$(this).animate({left:"-50px"},function(){
			$("#sp-cpanel").animate({left:"0px"},300);
		  });
	});
	
	$(".sp-cpanel-close").bind("click", function() {
		$("#sp-cpanel").animate({left:-widthC},300,function(){
			$("#sp-cpanel_btn").animate({left:"0px"},850);
		 });
	});
	
	//This function puts all of the params into a js object
	url = window.location.href;
	params = getParams(url);
	//Check value from the URL parameter?
	if (params) {
		var values = Object.keys(params);
		$.each( values, function( key, value ) {
			addValue = params[value];
			
			switch(value) {
				case 'scheme':
					$.cookie('customColorScheme',addValue);
					changeColor(addValue);
					break;
				case 'layoutbox':
					$.cookie('layoutbox',addValue);
					changeLayoutBox(addValue);
					break;
				case 'pattern':
					$.cookie('bgPattern',addValue);
					changePattern(addValue);
			}
		});
	}
	
	//Color Scheme
	$(".group-schemes").find('> .item_scheme').each(function() {
		$(this).bind("click", function() {
			$("#custom_color_scheme").attr("id", "temp_color_scheme");
			setTimeout(function() {$("#temp_color_scheme").remove();}, 500);
			$.cookie('customColorScheme', $(this).attr('data-scheme'));
			changeColor($(this).attr('data-scheme'));

		});
	});
	customColor = $.cookie('customColorScheme');
	if (customColor){
		changeColor(customColor);
	}
	
	//Layout Box
	layoutbox_class = $.cookie('layoutbox');
	if (layoutbox_class) {
		changeLayoutBox(layoutbox_class);
		selectElement(layoutbox_class,"cp-layoutbox");
	}
	
	//Overlay pattern
	$(".group-pattern").find('>.img-pattern').each(function() {
		$(this).bind("click", function() {
			$.cookie('bgPattern',$(this).attr('data-pattern'));
			changePattern($(this).attr('data-pattern'));
			
		});
	});
	bgPattern = $.cookie('bgPattern');
	if (bgPattern && layoutbox_class !='full'){
		changePattern(bgPattern);
	}
	
});

function getParams(u){
    var theURL = u; 
    var params = {}; 
    var splitURL = theURL.split('?'); 
	
    if (splitURL.length>1 ){ 
        var splitVars = splitURL[1].split('&'); 
        for(var i = 0; i < splitVars.length; i++){ 
            splitPair = splitVars[i].split('='); 
            params[splitPair[0]] = splitPair[1]; }

        return params;
    }
    return false;
}


function changeColor($mode_class){
	
	if ($mode_class != "default") {
		$("#color_scheme").after('<link id="custom_color_scheme" rel="stylesheet" type="text/css" href="css/theme-' + $mode_class  + '.css">');
	}else{
		$("#temp_color_scheme").remove();
	}
	$(".group-schemes").find('> .item_scheme').removeClass('selected');
	$(".group-schemes").find("[data-scheme='" + $mode_class + "']").addClass('selected');
}

function changeLayoutBox($mode_class){
    if($mode_class == 'full') $('body').addClass('no-bgbody');
	else $('body').removeClass('no-bgbody');
	$('#wrapper').stripClass('wrapper-').addClass('wrapper-'+$mode_class);
	$.cookie('layoutbox',$mode_class);
}

function changePattern($mode_class){
	$('body').stripClass('pattern').addClass('pattern-'+ $mode_class);
	$(".group-pattern").find('> .img-pattern').removeClass('selected');
	$(".group-pattern").find("[data-pattern='" + $mode_class + "']").addClass('selected');
}

function headerTypeChange($header){
	var self = this,HEADER = $('#header');
	
	$('#change_header_type').children('.options_list').children(':first').children('a').addClass('active');
	var $this = $(this),
		url,
		type = "";

		
		$this.addClass('active').parent().siblings().children('a').removeClass('active');
		switch($header){

			case "header-home1" :
				url = "header/header1-container.html";
				type = 'type_1';
			break;

			case "header-home2" :
				url = "header/header2-container.html";
				type = 'type_2';
			break;

			case "header-home3" :
				url = "header/header3-container.html";
				type = 'type_3';
			break;

			case "header-home4" :
				url = "header/header4-container.html";
				type = 'type_4';
			

		}

		$('#header').slideUp(function(){
			HEADER.removeClass('type_1 type_2 type_3 type_4').addClass(type);
			
			$(this).load(url, function(data){
				$.getScript('js/themejs/so_megamenu.js', function() {
					//console.log('Load was performed.');
				});
				$(this).slideDown(function(){
					$(this).find('.dropdown').each(function(){
						Core.mainAnimation.prepareDropdown.call($(this));
						
					});

				});
				
				
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
			});

		});

	

}

function ResetAll(){
	$.removeCookie('customColorScheme', null);
	$.removeCookie('layoutbox', null);
	$.removeCookie('bgPattern', null);
	window.location.reload(true);
}

function selectElement(valueToSelect,layoutbox){
    var element = document.getElementById(layoutbox);
    element.value = valueToSelect;
}

$.fn.stripClass = function (partialMatch, endOrBegin) {
	// The way removeClass should have been implemented -- accepts a partialMatch (like "btn-") to search on and remove
	var x = new RegExp((!endOrBegin ? "\\b" : "\\S+") + partialMatch + "\\S*", 'g');
	this.attr('class', function (i, c) {
		if (!c) return;
		return c.replace(x,'').trim();
	});
	return this;
}

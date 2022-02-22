$(window).on("load", function() {
    responsiveLayout();
    $(window).resize(responsiveLayout());
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        // windowWidth = window.innerWidth || document.documentElement.clientWidth;
        // if (windowWidth >= 1200) {
        //     if (scroll >= 160) {
        //         $("header").addClass('navbar-compact');
        //          setTimeout(function() {
        //             $("header").addClass('animate-children');
        //         }, 150);
        //     }
        //     else {
        //         $("header").removeClass('navbar-compact');
        //         setTimeout(function() {
        //             $("header").removeClass('animate-children');
        //         }, 150);
        //     }
        // }
       
    });
});

// responsiveLayout Menu
var responsiveflagMenu = true;
function responsiveLayout(element,eclass){
	var $header = $("header"),
	windowWidth = window.innerWidth || document.documentElement.clientWidth, 
    offset_top = $header.offset().top;

   if (windowWidth >= 1200 && responsiveflagMenu == false){
        processScroll($header, "navbar-compact", offset_top);
        // $(window).scroll(function(){
        //     processScroll($header, "navbar-compact", offset_top);
        // });
        responsiveflagMenu = true;
    }
	
}

// processScroll Menu
function processScroll(element, eclass, offset_top) {
    var scrollTop = $(window).scrollTop();
    if($(element).height()< $(window).height()){
        if (scrollTop > offset_top) {
            //fix secondary navigation
            $(element).addClass(eclass);
            //push the .cd-main-content giving it a top-margin
            //$('.header-bottom').addClass('has-top-margin');

            //on Firefox CSS transition/animation fails when parent element changes position attribute
            //so we to change secondary navigation childrens attributes after having changed its position value
            setTimeout(function() {
                $(element).addClass('animate-children');
            }, 150);
        } else if (scrollTop <= offset_top) {
            $(element).removeClass(eclass);
            //push the .cd-main-content giving it a top-margin
           // $('.header-bottom').removeClass('has-top-margin');

            setTimeout(function() {
                $(element).removeClass('animate-children');
            }, 150);
        }

    }
}



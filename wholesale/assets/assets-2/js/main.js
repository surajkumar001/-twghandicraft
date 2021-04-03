(function($) {
"use strict";

/*------------------------------------------------------------------
[Table of contents]

1. mega navigation menu init
2. back to top
3. twitter api init
4. map popups
5. single banner slider
6. single banner slider version 2
7. single banner slider version 3
8. single banner slider version 4
9. single banner slider version 5
10. single banner slider version 6
11. xs tab slider
12. xs tab slider 6 col
13. xs deal of the day
14. xs product slider 1
15. xs product slider 2
16. xs product slider 3
17. deal of the day
18. product slider 4
19. product slider 5
20. product slider 6
21. product slider 7
22. organic product slider 8
23. organic product slider 9
24. organic product slider 10
25. product slider 11
26. product slider 12
27. product slider 13
28. seven column slider
29. produt block slider
30. xs progress
31. input number increase
32. echo init
33. pulse effect
34. countdown timer
35 .ajax chimp init
36. xs popover
37. number percentage
38. number counter up
39. social tigger add class
40. sync product preview slider
41. sync banner nav slider
42. insta feed
43. jquery slider range
44. contact form init
45. Minicart dropdown remove close on body click
46. Search form open by click
47. Side Offset cart menu open
48. Recent view slider
49. vertical menu dropdown tigger on click overlay active init
50. promo popup open when window is load
51. video popup init
52. Post gallery slider
53. XpeedStudio Maps


-------------------------------------------------------------------*/

// my oel function
$.fn.myOwl = function(options) {

	var settings = $.extend({
		items: 1,
		dots: false,
		loop: true,
		mouseDrag: true,
		touchDrag: true,
		nav: false,
		autoplay: true,
		navText: ['',''],
		margin: 0,
		stagePadding: 0,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		navRewind:false,
		responsive: {}
	}, options);

    return this.owlCarousel( {
		items: settings.items,
		loop: settings.loop,
		mouseDrag: settings.mouseDrag,
		touchDrag: settings.touchDrag,
		nav: settings.nav,
		navText: settings.navText,
		dots: settings.dots,
		margin: settings.margin,
		stagePadding: settings.stagePadding,
		autoplay: settings.autoplay,
		autoplayTimeout: settings.autoplayTimeout,
		autoplayHoverPause: settings.autoplayHoverPause,
		animateOut: settings.animateOut,
		animateIn: settings.animateIn,
		responsive: settings.responsive,
		navRewind: settings.navRewind,
		onTranslate : function(){
			echo.render();
		}
	});
};

// function get height
let getHeight = () => {
	let themeThumb = $('.xs-single-team .team-thumb'),
		thumbH = themeThumb.outerHeight(),
		hiringInfo = $('.xs-single-team.team-hiring-info');
	
	hiringInfo.css('min-height', thumbH);
}

//  email patern 
function email_pattern(email) {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}

// menu vertical open and close when cross break point 
function menuVertical() {
	var window_width = $(window).width(),
		breakPoint = 991,
		dropDonw_tigger = $('.v-menu-is-active .cd-dropdown-trigger'),
		dropdown = $('.v-menu-is-active .cd-dropdown'),
		activeClass = 'dropdown-is-active';

	if (window_width <= breakPoint) {
		if (dropDonw_tigger.hasClass(activeClass)) {
			dropDonw_tigger.removeClass(activeClass);
		}
		if (dropdown.hasClass(activeClass)) {
			dropdown.removeClass(activeClass);
		}
	} else {
		dropDonw_tigger.addClass(activeClass);
		dropdown.addClass(activeClass);
	}
}

// nav cover add remoe
let navCover = () => {
	$(window).width() <= 1023 ? $('.nav-cover').remove() : $('.xs-header').append('<div class="nav-cover"></div>');
};


$(window).on('load', function() {
	// menu vertical open and close when cross break point 
	menuVertical();

	// nav cover init
	navCover();

	// theme thumb equal height
	getHeight();

	/* banner slider verison 5 push bootstrap markup */ 
	$('.xs-banner-slider-5 .owl-dots').wrap('<div class="container container-fullwidth"><div class="row"><div class="col-lg-9 offset-lg-3"></div></div></div>');

}); // END load Function 

$(document).ready(function() {

	// menu vertical open and close when cross break point 
	//menuVertical();

	// theme thumb equal height
	getHeight();

	/*==========================================================
			1. mega navigation menu init
	======================================================================*/
	if ($('.xs-menus').length > 0) {
		$('.xs-menus').xs_nav({
			mobileBreakpoint: 992,
		});
	}

	/*==========================================================
			2. back to top
	======================================================================*/ 
	$(document).on('click', '.xs-back-to-top', function(event) {
		event.preventDefault();
		/* Act on the event */

		$('html, body').animate({
			scrollTop: 0,
		}, 1000);
	});

/*==========================================================
				3. single banner slider version 6
	======================================================================*/
	if ( $( '.xs-banner-slider-6' ).length > 0 ) {
		$( ".xs-banner-slider-6" ).myOwl({
			dots: true
		})
	}
/*==========================================================
			47. Side Offset cart menu open
	======================================================================*/
	if ($('.offset-cart-menu').length > 0) {
		$('.offset-cart-menu').on('click', function (e){
			e.preventDefault();
			$('.xs-sidebar-group').addClass('isActive');
		});
	}
	if ($('.close-side-widget').length > 0) {
		$('.close-side-widget').on('click', function (e){
			e.preventDefault();
			$('.xs-sidebar-group').removeClass('isActive');
		});
	}
	

}); // end ready function

$(window).on('scroll', function() {

}); // END Scroll Function 

$(window).on('resize', function() {

	// menu vertical open and close when cross break point 
	menuVertical();

	// nav cover init
	navCover();

	// theme thumb equal height
	getHeight();
}); // End Resize

/*==========================================================
			53. XpeedStudio Maps
======================================================================*/

// menu vertical open and close when cross break point 
function menuVertical() {
	var window_width = $(window).width(),
		breakPoint = 991,
		dropDonw_tigger = $('.v-menu-is-active .cd-dropdown-trigger'),
		dropdown = $('.v-menu-is-active .cd-dropdown'),
		activeClass = 'dropdown-is-active';

	if (window_width <= breakPoint) {
		if (dropDonw_tigger.hasClass(activeClass)) {
			dropDonw_tigger.removeClass(activeClass);
		}
		if (dropdown.hasClass(activeClass)) {
			dropdown.removeClass(activeClass);
		}
	} else {
		dropDonw_tigger.addClass(activeClass);
		dropdown.addClass(activeClass);
	}
}


})(jQuery);
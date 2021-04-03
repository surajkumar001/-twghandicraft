(function($, window){
	'use strict';

	var arrowWidth = 16;

	$.fn.resizeselect = function(settings) {

		return this.each( function() {

			$(this).change( function(){

				var $this = $(this);

				// create test element
				var text = $this.find("option:selected").text();
				var $test = $("<span>").html(text);

				// add to body, get width, and get out
				$test.appendTo('body');
				var width = $test.width();
				$test.remove();

				// set select width
				$this.width(width + arrowWidth);

				// run on start
			}).change();

		});
	};

})(jQuery, window);

(function($, window){
	'use strict';

	$.fn.navigationResize = function() {
		var $menuContainer = $(this);
		var $navItemMore = $menuContainer.find( 'li.techmarket-flex-more-menu-item' );
		var $overflowItemsContainer = $navItemMore.find( '.overflow-items' );

		$navItemMore.before( $navItemMore.find( '.overflow-items > li' ) );
		$navItemMore.siblings( '.dropdown-submenu' ).removeClass( 'dropdown-submenu' ).addClass( 'dropdown' );

		var $navItems = $navItemMore.parent().children( 'li:not(.techmarket-flex-more-menu-item)' ),
		navItemMoreWidth = $navItemMore.outerWidth(),
		navItemWidth = navItemMoreWidth,
		$menuContainerWidth = $menuContainer.width() - navItemMoreWidth;

		$navItems.each(function() {
			navItemWidth += $(this).outerWidth();
		});

		if( navItemWidth > $menuContainerWidth ) {
			$navItemMore.show();
			while (navItemWidth >= $menuContainerWidth) {
				navItemWidth -= $navItems.last().outerWidth();
				$navItems.last().prependTo( $overflowItemsContainer );
				$navItems.splice(-1,1);
			}

			$overflowItemsContainer.children( 'li.dropdown' ).removeClass( 'dropdown' ).addClass( 'dropdown-submenu' );
		} else {
			$navItemMore.hide();
		}
	}

})(jQuery, window);

(function($) {
	'use strict';

	var is_rtl = $('body,html').hasClass('rtl');

	/*===================================================================================*/
	/*  Block UI Defaults
	/*===================================================================================*/
	// if( typeof $.blockUI !== "undefined" ) {
	// 	$.blockUI.defaults.message                      = null;
	// 	$.blockUI.defaults.overlayCSS.background        = '#fff url(' + techmarket_options.ajax_loader_url + ') no-repeat center';
	// 	$.blockUI.defaults.overlayCSS.backgroundSize    = '16px 16px';
	// 	$.blockUI.defaults.overlayCSS.opacity           = 0.6;
	// }

	/*===================================================================================*/
	/*  Smooth scroll for wc tabs with @href started with '#' only
	/*===================================================================================*/
	$('.wc-tabs-wrapper ul.tm-tabs > li').on('click', 'a[href^="#"]', function(e) {
		// target element id
		var id = $(this).attr('href');

		// target element
		var $id = $(id);
		if ($id.length === 0) {
			return;
		}

		// prevent standard hash navigation (avoid blinking in IE)
		e.preventDefault();

		// top position relative to the document
		var pos = $id.offset().top;

		// animated top scrolling
		$('body, html').animate({scrollTop: pos});
	});

	
	/*===================================================================================*/
	/*  YITH Wishlist
	/*===================================================================================*/

	// $( document ).on( 'added_to_wishlist', function() {
	// 	$( '.images-and-summary' ).unblock();
	// 	$( '.product-inner' ).unblock();
	// 	$( '.product-list-view-inner' ).unblock();
	// 	$( '.product-item-inner' ).unblock();
	// });

	/*===================================================================================*/
	/*  Add to Cart animation
	/*===================================================================================*/

	$( 'body' ).on( 'adding_to_cart', function( e, $btn, data){
		$btn.closest( '.product' ).block();
	});

	$( 'body' ).on( 'added_to_cart', function(){
		$( '.product' ).unblock();
	});

	/*===================================================================================*/
	/*  WC Variation Availability
	/*===================================================================================*/

	$( 'body' ).on( 'woocommerce_variation_has_changed', function( e ) {
		var $singleVariationWrap = $( 'form.variations_form' ).find( '.single_variation_wrap' );
		var $availability = $singleVariationWrap.find( '.woocommerce-variation-availability' ).html();
		if ( typeof $availability !== "undefined" && $availability !== false ) {
			$( '.techmarket-stock-availability' ).html( $availability );
		}
	});

	/*===================================================================================*/
	/*  Deal Countdown timer
	/*===================================================================================*/

 	$( '.deal-countdown-timer' ).each( function() {
		var deal_countdown_text = {
 		    'days_text': 'Days',
 		    'hours_text': 'Hours',
 		    'mins_text': 'Mins',
 		    'secs_text': 'Secs'
		    
 		  };


		// set the date we're counting down to
		var deal_time_diff = $(this).children('.deal-time-diff').text();
		var countdown_output = $(this).children('.deal-countdown');
		var target_date = ( new Date().getTime() ) + ( deal_time_diff * 1000 );

		// variables for time units
		var days, hours, minutes, seconds;

		// update the tag with id "countdown" every 1 second
		setInterval( function () {

			// find the amount of "seconds" between now and target
			var current_date = new Date().getTime();
			var seconds_left = (target_date - current_date) / 1000;

			// do some time calculations
			days = parseInt(seconds_left / 86400);
			seconds_left = seconds_left % 86400;

			hours = parseInt(seconds_left / 3600);
			seconds_left = seconds_left % 3600;

			minutes = parseInt(seconds_left / 60);
			seconds = parseInt(seconds_left % 60);

			// format countdown string + set tag value
			countdown_output.html( '<span data-value="' + days + '" class="days"><span class="value">' + days +  '</span><b>' + deal_countdown_text.days_text + '</b></span><span class="hours"><span class="value">' + hours + '</span><b>' + deal_countdown_text.hours_text + '</b></span><span class="minutes"><span class="value">'
			+ minutes + '</span><b>' + deal_countdown_text.mins_text + '</b></span><span class="seconds"><span class="value">' + seconds + '</span><b>' + deal_countdown_text.secs_text + '</b></span>' );

		}, 1000 );
	});

   
	/*===================================================================================*/
	/*  Product Categories Filter
	/*===================================================================================*/

	$(".section-categories-filter").each(function() {
		var $this = $(this);
		$this.find( '.categories-dropdown' ).change(function() {
			$this.block({ message: null });
			var $selectedKey = $(this).val();
			var $shortcode_atts = $this.find( '.categories-filter-products' ).data('shortcode_atts');
			if( $selectedKey !== '' || $selectedKey !== 0 || $selectedKey !== '0' ) {
				$shortcode_atts['category'] = $selectedKey;
			}
			$.ajax({
				url : techmarket_options.ajax_url,
				type : 'post',
				data : {
					action : 'product_categories_filter',
					shortcode_atts : $shortcode_atts
				},
				success : function( response ) {
					$this.find( '.categories-filter-products' ).html( response );
					$this.find( '.products > div[class*="post-"]' ).addClass( "product" );
					$this.unblock();
				}
			});
			return false;
		});
	});

	$( window ).on( 'resize', function() {
		if( $('[data-nav="flex-menu"]').is(':visible') ) {
			$('[data-nav="flex-menu"]').each( function() {
				$(this).navigationResize();
			});
		}
	});

	$( window ).on( 'load', function() {

		$(".section-categories-filter").each(function() {
			$(this).find( '.categories-dropdown' ).trigger('change');
		});

		/*===================================================================================*/
		/*  Bootstrap multi level dropdown trigger
		/*===================================================================================*/

		$('li.dropdown-submenu > a[data-toggle="dropdown"]').on('click', function(event) {
			event.preventDefault();
			event.stopPropagation();
			if ( $(this).closest('li.dropdown-submenu').hasClass('show') ) {
				$(this).closest('li.dropdown-submenu').removeClass('show');
			} else {
				$(this).closest('li.dropdown-submenu').removeClass('show');
				$(this).closest('li.dropdown-submenu').addClass('show');
			}
		});

	});

	$(document).ready( function() {

		$( 'select.resizeselect' ).resizeselect();

		/*===================================================================================*/
		/*  Flex Menu
		/*===================================================================================*/

		if( $('[data-nav="flex-menu"]').is(':visible') ) {
			$('[data-nav="flex-menu"]').each( function() {
				$(this).navigationResize();
			});
		}

		/*===================================================================================*/
		/*  PRODUCT CATEGORIES TOGGLE
		/*===================================================================================*/

		if( is_rtl ) {
			var $fa_icon_angle_right = '<i class="fa fa-angle-left"></i>';
		} else {
			var $fa_icon_angle_right = '<i class="fa fa-angle-right"></i>';
		}

		$('.product-categories .show-all-cat-dropdown').each(function(){
			if( $(this).siblings('ul').length > 0 ) {
				var $childIndicator = $('<span class="child-indicator">' + $fa_icon_angle_right + '</span>');

				$(this).siblings('ul').hide();
				if($(this).siblings('ul').is(':visible')){
					$childIndicator.addClass( 'open' );
					$childIndicator.html('<i class="fa fa-angle-up"></i>');
				}

				$(this).on( 'click', function(){
					$(this).siblings('ul').toggle( 'fast', function(){
						if($(this).is(':visible')){
							$childIndicator.addClass( 'open' );
							$childIndicator.html('<i class="fa fa-angle-up"></i>');
						}else{
							$childIndicator.removeClass( 'open' );
							$childIndicator.html( $fa_icon_angle_right );
						}
					});
					return false;
				});
				$(this).append($childIndicator);
			}
		});

		// $('.product-categories .cat-item > a').each(function(){
		// 	if( $(this).siblings('ul.children').length > 0 ) {
		// 		var $childIndicator = $('<span class="child-indicator">' + $fa_icon_angle_right + '</span>');

		// 		$(this).siblings('.children').hide();
		// 		$('.current-cat > .children').show();
		// 		$('.current-cat-parent > .children').show();
		// 		if($(this).siblings('.children').is(':visible')){
		// 			$childIndicator.addClass( 'open' );
		// 			$childIndicator.html('<i class="fa fa-angle-up"></i>');
		// 		}

		// 		$childIndicator.on( 'click', function(){
		// 			$(this).parent().siblings('.children').toggle( 'fast', function(){
		// 				if($(this).is(':visible')){
		// 					$childIndicator.addClass( 'open' );
		// 					$childIndicator.html('<i class="fa fa-angle-up"></i>');
		// 				}else{
		// 					$childIndicator.removeClass( 'open' );
		// 					$childIndicator.html( $fa_icon_angle_right );
		// 				}
		// 			});
		// 			return false;
		// 		});
		// 		$(this).prepend($childIndicator);
		// 	} else {
		// 		$(this).prepend('<span class="no-child"></span>');
		// 	}
		// });

		/*===================================================================================*/
		/*  YITH Wishlist
		/*===================================================================================*/

		// $( '.add_to_wishlist' ).on( 'click', function() {
		// 	$( this ).closest( '.images-and-summary' ).block();
		// 	$( this ).closest( '.product-inner' ).block();
		// 	$( this ).closest( '.product-list-view-inner' ).block();
		// 	$( this ).closest( '.product-item-inner' ).block();
		// });

		// $( '.yith-wcwl-wishlistaddedbrowse > .feedback' ).on( 'click', function() {
		// 	var browseWishlistURL = $( this ).next().attr( 'href' );
		// 	window.location.href = browseWishlistURL;
		// });


		/*===================================================================================*/
		/*  Slick Carousel
		/*===================================================================================*/

		$('[data-ride="tm-slick-carousel"]').each( function() {
			var $slick_target = false;
			
			if ( $(this).data( 'slick' ) !== 'undefined' && $(this).find( $(this).data( 'wrap' ) ).length > 0 ) {
				$slick_target = $(this).find( $(this).data( 'wrap' ) );
				$slick_target.data( 'slick', $(this).data( 'slick' ) );
			} else if ( $(this).data( 'slick' ) !== 'undefined' && $(this).is( $(this).data( 'wrap' ) ) ) {
				$slick_target = $(this);
			}

			if( $slick_target ) {
				$slick_target.slick();
			}
		});

		$(".custom-slick-pagination .slider-prev").click(function(e){
			if ( $( this ).data( 'target' ) !== 'undefined' ) {
				e.preventDefault();
				e.stopPropagation();
				var slick_wrap_id = $( this ).data( 'target' );
				$( slick_wrap_id ).slick('slickPrev');
			}
		});

		$(".custom-slick-pagination .slider-next").click(function(e){
			if ( $( this ).data( 'target' ) !== 'undefined' ) {
				e.preventDefault();
				e.stopPropagation();
				var slick_wrap_id = $( this ).data( 'target' );
				$( slick_wrap_id ).slick('slickNext');
			}
		});

		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			var $target = $(e.target).attr("href");
			$($target).find('[data-ride="tm-slick-carousel"]').each( function() {
				var $slick_target = $(this).data('wrap');
				if( $($target).find($slick_target).length > 0 ) {
					$($target).find($slick_target).slick('setPosition');
				}
			});
		});

		$('#section-landscape-product-card-with-gallery .products').on('init', function(event, slick){
			$(slick.$slides[0]).find(".big-image figure:eq(0)").nextAll().hide();
			$(slick.$slides[0]).find(".small-images figure").click(function(e){
			    var index = $(this).index();
			    $(slick.$slides[0]).find(".big-image figure").eq(index).show().siblings().hide();
			});
		});

		$("#section-landscape-product-card-with-gallery .products").slick({
			'infinite'			: false,
			'slidesToShow'		: 1,
			'slidesToScroll'	: 1,
			'dots'				: false,
			'arrows'			: true,
			'prevArrow'			: '<a href="#"><i class="tm tm-arrow-left"></i></a>',
			'nextArrow'			: '<a href="#"><i class="tm tm-arrow-right"></i></a>'
		});

		$("#section-landscape-product-card-with-gallery .products").slick('setPosition');

		$('#section-landscape-product-card-with-gallery .products').on('afterChange', function(event, slick, currentSlide){
		  	var current_element = $(slick.$slides[currentSlide]);
		  	current_element.find(".big-image figure:eq(0)").nextAll().hide();
			current_element.find(".small-images figure").click(function(e){
			    var index = $(this).index();
			    current_element.find(".big-image figure").eq(index).show().siblings().hide();
			});
		});


		// Animate on scroll into view
		// // $( '.animate-in-view' ).each( function() {
		// // 	var $this = $(this), animation = $this.data( 'animation' );
		// // 	var waypoint_animate = new Waypoint({
		// // 		element: $this,
		// // 		handler: function(e) {
		// // 			$this.addClass( $this.data( 'animation' ) + ' animated' );
		// // 		},
		// // 		offset: '90%'
		// // 	});
		// // });

		

		
		/*===================================================================================*/
		/*  Products LIVE Search
		/*===================================================================================*/

		// if( techmarket_options.enable_live_search == '1' ) {

		// 	if ( techmarket_options.ajax_url.indexOf( '?' ) > 1 ) {
		// 		var prefetch_url    = techmarket_options.ajax_url + '&action=products_live_search&fn=get_ajax_search';
		// 		var remote_url      = techmarket_options.ajax_url + '&action=products_live_search&fn=get_ajax_search&terms=%QUERY';
		// 	} else {
		// 		var prefetch_url    = techmarket_options.ajax_url + '?action=products_live_search&fn=get_ajax_search';
		// 		var remote_url      = techmarket_options.ajax_url + '?action=products_live_search&fn=get_ajax_search&terms=%QUERY';
		// 	}

		// 	var searchProducts = new Bloodhound({
		// 		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
		// 		queryTokenizer: Bloodhound.tokenizers.whitespace,
		// 		prefetch: prefetch_url,
		// 		remote: {
		// 			url: remote_url,
		// 			wildcard: '%QUERY',
		// 		},
		// 		identify: function(obj) {
		// 			return obj.id;
		// 		}
		// 	});

		// 	searchProducts.initialize();

		// 	$( '.navbar-search .product-search-field' ).typeahead( techmarket_options.typeahead_options,
		// 		{
		// 			name: 'search',
		// 			source: searchProducts.ttAdapter(),
		// 			displayKey: 'value',
		// 			limit: techmarket_options.live_search_limit,
		// 			templates: {
		// 				empty : [
		// 					'<div class="empty-message">',
		// 					techmarket_options.live_search_empty_msg,
		// 					'</div>'
		// 				].join('\n'),
		// 				suggestion: Handlebars.compile( techmarket_options.live_search_template )
		// 			}
		// 		}
		// 	);
		// }
	});



	
	
		
	


})(jQuery);


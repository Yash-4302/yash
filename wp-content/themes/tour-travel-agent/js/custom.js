jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},
		speed:'fast'
	});
});

function tour_travel_agent_menu_open() {
	jQuery(".side-menu").addClass('open');
}
function tour_travel_agent_menu_close() {
	jQuery(".side-menu").removeClass('open');
}

(function( $ ) {

	$(window).scroll(function(){
		var sticky = $('.sticky-header'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header px-lg-3 px-2');
		else sticky.removeClass('fixed-header px-lg-3 px-2');
	});

	// Back to top
	jQuery(document).ready(function () {
    jQuery(window).scroll(function () {
      if (jQuery(this).scrollTop() > 0) {
      	jQuery('.scrollup').fadeIn();
      } else {
        jQuery('.scrollup').fadeOut();
      }
    });
    jQuery('.scrollup').click(function () {
      jQuery("html, body").animate({
        scrollTop: 0
      }, 600);
      return false;
    });

		// Slider
		var carousel_thumbs = jQuery("#slider .owl-carousel").owlCarousel({
			margin:20,
	    nav: true,
	    autoplay : true,
	    lazyLoad: true,
	    autoplayTimeout: 3000,
	    loop: false,
	    dots:false,
	    navText : ['<i class="fas fa-long-arrow-alt-left"></i>','<i class="fas fa-long-arrow-alt-right"></i>'],
	    responsive: {
	      0: {
	        items: 1
	      },
	      600: {
	        items: 2
	      },
	      1000: {
	        items: 3
	      }
	    },
	    autoplayHoverPause : true,
	    mouseDrag: true
		  
		});
	});

	// Window load function
	window.addEventListener('load', (event) => {
		jQuery(".preloader").delay(2000).fadeOut("slow");
	});

})( jQuery );

( function( window, document ) {
	function tour_travel_agent_keepFocusInMenu() {
		document.addEventListener( 'keydown', function( e ) {
			const tour_travel_agent_nav = document.querySelector( '.side-menu' );

			if ( ! tour_travel_agent_nav || ! tour_travel_agent_nav.classList.contains( 'open' ) ) {
				return;
			}

			const elements = [...tour_travel_agent_nav.querySelectorAll( 'input, a, button' )],
				tour_travel_agent_lastEl = elements[ elements.length - 1 ],
				tour_travel_agent_firstEl = elements[0],
				tour_travel_agent_activeEl = document.activeElement,
				tabKey = e.keyCode === 9,
				shiftKey = e.shiftKey;

			if ( ! shiftKey && tabKey && tour_travel_agent_lastEl === tour_travel_agent_activeEl ) {
				e.preventDefault();
				tour_travel_agent_firstEl.focus();
			}

			if ( shiftKey && tabKey && tour_travel_agent_firstEl === tour_travel_agent_activeEl ) {
				e.preventDefault();
				tour_travel_agent_lastEl.focus();
			}
		} );
	}

	tour_travel_agent_keepFocusInMenu();
} )( window, document );

(function ($) {
	"use strict";

	var owl = $(".homepage-slides");
    jQuery(document).ready(function($){
		
		
		owl.owlCarousel({
		    items: 1,
			//animateIn:"fadeIn",
		    autoplay: 3000,
			loop: true,
			nav: true,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			dots: true,
		    smartSpeed: 800
		});
		owl.on('changed.owl.carousel', function(event) {

			var $currentItem = $('.owl-item', owl).eq(event.item.index);
			var $elemsToanim = $currentItem.find("[data-animation-in]");
			setAnimation ($elemsToanim, 'in');
		});

    	$(".testimonial-section").owlCarousel({
		    items: 1,
		    autoplay: 3000,
		    margin: 60,
			loop: true,
			nav: true,
			navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
		    smartSpeed: 800
		});

    	/*  Blog Carousel  */
		$(".blog-area-slider").owlCarousel({
	    items: 3,
	    autoplay: true,
	    margin: 20,
		loop: true,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
	    smartSpeed: 800,
	    responsive : {
			0 : {
				items: 1,
			},
			768 : {
				items: 2,
			},
			992 : {
				items: 3
			}
		}
	});	

	/*  Featured Carousel  */
	$(".featured-list").owlCarousel({
	    items: 3,
	    autoplay: false,
	    margin: 20,
		loop: true,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
	    smartSpeed: 800,
	    responsive : {
			0 : {
				items: 1,
			},
			768 : {
				items: 2,
			},
			992 : {
				items: 3
			}
		}
	});

	/*  Partnership logo carousel  */
	$(".logo-carousel").owlCarousel({
        items: 7,
        loop: true,
        nav: false,
        dots: false,
		margin: 30,
		autoplay: false,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		smartSpeed: 300,
		responsive : {
			0 : {
				items: 2,
			},
			768 : {
				items: 4,
			},
			992 : {
				items: 7
			}
		}
       });

        /*  Slick Nav Mobile menu  */
	   $('#menuResponsive').slicknav({
		   prependTo: "#mobile-menu-wrap",
		   allowParentLinks : false,
		   label: ''	
	   });


       $(window).bind('scroll', function() {
        var navHeight = $(".header-top-area").height();
        ($(window).scrollTop() > navHeight) ? $('.header-area-wrapper').addClass('goToTop') : $('.header-area-wrapper').removeClass('goToTop');
    	});


		/*  Counter Active  */
		$(".counter-number").counterUp({
			delay: 10,
        	time: 1000
		});

		/*  Image popUp  */
		 $('.image-popup').magnificPopup({
			type: 'image',
			closeOnContentClick: true,
			mainClass: 'mfp-img-mobile',
			image: {
				verticalFit: true
			},
			gallery: {
		      enabled: true
		    },
		});


	new WOW().init();



		$(".slicknav_btn").on('click', function() {
		  if ( $(this).hasClass("slicknav_collapsed")) {
			$(".slicknav_icon").html('<i class="fa fa-bars"></i>');
		  } else {
			$(".slicknav_icon").html('<i class="fa fa-times"></i>');
		  }
		});



    });


	  // Animate.css Function
	  function setAnimation ( _elem, _InOut ) {
		// Store all animationend event name in a string.
		// cf animate.css documentation
		var animationEndEvent = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

		_elem.each ( function () {
			
		  var $elem = $(this);
		  var $animationType = 'animated ' + $elem.data( 'animation-' + _InOut );
		  
		  $elem.addClass($animationType).one(animationEndEvent, function () {
			$elem.removeClass($animationType); // remove animate.css Class at the end of the animations
		  });
		});
	  }
	  
    jQuery(window).load(function(){

        
    });


}(jQuery));	
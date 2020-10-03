(function($) {
	'use strict';
	jQuery(document).on('ready', function(){

		// Mean Menu
		 jQuery('.mean-menu').meanmenu({
			meanScreenWidth: "991"
        });

		// Preloader
		jQuery(window).on('load', function() {
            $('.preloader').fadeOut();
		});

		// Home Slides
		$('.home-slides').owlCarousel({
			loop: true,
			nav: false,
			dots: true,
			autoplayHoverPause: true,
            autoplay: true,
            smartSpeed: 1000,
            animateOut: "slideOutDown",
            animateIn: "slideInDown",
            items: 1,
            navText: [
                "<i class='flaticon-left-chevron'></i>",
                "<i class='flaticon-right-chevron'></i>"
            ]
		});

		// Home Slides Two
		$('.home-slides-four').owlCarousel({
			loop: true,
			nav: true,
			dots: true,
			autoplayHoverPause: true,
            autoplay: true,
            smartSpeed: 1000,
            animateOut: "fadeOut",
            items: 1,
            navText: [
                "<i class='flaticon-left-chevron'></i>",
                "<i class='flaticon-right-chevron'></i>"
            ]
        });
        $(".home-slides").on("translate.owl.carousel", function(){
            $(".main-banner-content span").removeClass("animated fadeInUp").css("opacity", "0");
            $(".main-banner-content p").removeClass("animated fadeInUp").css("opacity", "0");
            $(".main-banner-content h1").removeClass("animated fadeInUp").css("opacity", "0");
            $(".main-banner-content .banner-btn").removeClass("animated fadeInUp").css("opacity", "0");
        });
        $(".home-slides").on("translated.owl.carousel", function(){
            $(".main-banner-content span").addClass("animated fadeInUp").css("opacity", "1");
            $(".main-banner-content p").addClass("animated fadeInUp").css("opacity", "1");
            $(".main-banner-content h1").addClass("animated fadeInUp").css("opacity", "1");
            $(".main-banner-content .banner-btn").addClass("animated fadeInUp").css("opacity", "1");
		});

        $(".home-slides-four").on("translate.owl.carousel", function(){
            $(".main-banner-content span").removeClass("animated fadeInUp").css("opacity", "0");
            $(".main-banner-content p").removeClass("animated fadeInUp").css("opacity", "0");
            $(".main-banner-content h1").removeClass("animated fadeInUp").css("opacity", "0");
            $(".main-banner-content .banner-btn").removeClass("animated fadeInUp").css("opacity", "0");
        });
        $(".home-slides-four").on("translated.owl.carousel", function(){
            $(".main-banner-content span").addClass("animated fadeInUp").css("opacity", "1");
            $(".main-banner-content p").addClass("animated fadeInUp").css("opacity", "1");
            $(".main-banner-content h1").addClass("animated fadeInUp").css("opacity", "1");
            $(".main-banner-content .banner-btn").addClass("animated fadeInUp").css("opacity", "1");
		});

		// Header Sticky
        $(window).on('scroll', function() {
            if ($(this).scrollTop() >150){
                $('.navbar-area').addClass("is-sticky");
            }
            else{
                $('.navbar-area').removeClass("is-sticky");
            }
		});

		// Banner Image Slider
		$('.banner-image-slider').owlCarousel({
			loop: true,
			nav: true,
			dots: false,
			stopOnHover : true,
            autoplay: true,
            smartSpeed: 1000,
            navText: [
                "<i class='flaticon-left'></i>",
                "<i class='flaticon-right'></i>"
            ],
            responsive: {
				0: {
					items: 1
				},
				576: {
					items: 1
				},
				768: {
					items: 1
				},
				1200: {
					items: 1
				}
			}
		});


		// Popup Video
		$('.popup-youtube').magnificPopup({
			disableOn: 320,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false
		});

		// Tabs
		$('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
		$('.tab ul.tabs li a').on('click', function (g) {
			var tab = $(this).closest('.tab'),
			index = $(this).closest('li').index();
			tab.find('ul.tabs > li').removeClass('current');
			$(this).closest('li').addClass('current');
			tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
			tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();
			g.preventDefault();
		});

		// Go to Top
        $(function(){
            // Scroll Event
            $(window).on('scroll', function(){
                var scrolled = $(window).scrollTop();
                if (scrolled > 600) $('.go-top').addClass('active');
                if (scrolled < 600) $('.go-top').removeClass('active');
            });
            // Click Event
            $('.go-top').on('click', function() {
                $("html, body").animate({ scrollTop: "0" },  500);
            });
		});

		// Preloader
		jQuery(window).on('load', function () {
			$('#preloader').fadeOut()
		})



	});

})(jQuery);

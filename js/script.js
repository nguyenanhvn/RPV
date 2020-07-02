jQuery(document).ready(function() {
	if(window.location.href.indexOf('/vi/')){
		var showmore = '<a class="show-more hide-mobile">Hiển thị thêm <i class="fa fa-angle-down"></i></a><a class="show-more show-mobile">Hiển thị thêm <i class="fa fa-angle-down"></i></a>';
		var showless = '<a class="show-less hide-mobile">Hiển thị ít đi <i class="fa fa-angle-up"></i></a><a class="show-less show-mobile">Hiển thị ít đi <i class="fa fa-angle-up"></i></a>';
	} else {
		var showmore = '<a class="show-more hide-mobile">Show More <i class="fa fa-angle-down"></i></a><a class="show-more show-mobile">Show More <i class="fa fa-angle-down"></i></a>';
		var showless = '<a class="show-less hide-mobile">Show Less <i class="fa fa-angle-up"></i></a><a class="show-less show-mobile">Show Less <i class="fa fa-angle-up"></i></a>';
	}
	var width_device = jQuery(window).width();
	jQuery('.dotdotdot').dotdotdot();
	setTimeout(function(){
		jQuery('.dotdotdot').dotdotdot();
	}, 100);

	var wow = new WOW(
	{
		    boxClass:     'wow',      // animated element css class (default is wow)
		    animateClass: 'animated', // animation css class (default is animated)
		    offset:       0,          // distance to the element when triggering the animation (default is 0)
		    mobile:       true,       // trigger animations on mobile devices (default is true)
		    live:         true,       // act on asynchronously loaded content (default is true)
		    callback:     function(box) {
		      // the callback is fired every time an animation is started
		      // the argument that is passed in is the DOM node being animated
		  },
		    scrollContainer: null // optional scroll container selector, otherwise use window
		}
		);
	wow.init();

	// header();
	// jQuery(window).scroll(function(){
	// 	header();
	// });

	if(jQuery('.tab__online__scroll').length > 0){
		jQuery('.tab__online__scroll').mCustomScrollbar();		
	}

	if(jQuery(window).width() > 1030){
		jQuery("#header").sticky({ 
			topSpacing: 0,
			bottomSpacing: jQuery('#footer').height() + 60,
			getWidthFrom: '50'
		});
	}

	if(jQuery(window).width() > 992){	
		jQuery(".content-application .box__right .box__right__sticky").sticky({ 
			topSpacing: 79,
			bottomSpacing: jQuery('#footer').innerHeight() + 130,
			getWidthFrom: '0'
		});
	}

	if(jQuery(window).width() > 767){	
		jQuery(".content__siderbar__sticky").sticky({ 
			topSpacing: 79,
			bottomSpacing: jQuery('#footer').innerHeight() + jQuery('section.news').innerHeight() + jQuery('section.content-next').innerHeight() + 160,
			getWidthFrom: '0'
		});
	}

	jQuery(window).resize(function(event) {
		jQuery("#header").sticky('update');
		jQuery(".content__siderbar__sticky").sticky('update');

		if(jQuery(window).width() > 1030){
			jQuery("#header").sticky({ 
				topSpacing: 0,
				bottomSpacing: jQuery('#footer').height() + 60,
				getWidthFrom: '50'
			});
		} else {
			jQuery("#header").unstick();
		}

		if(jQuery(window).width() > 992){	
			jQuery(".content-application .box__right .box__right__sticky").sticky({ 
				topSpacing: 79,
				bottomSpacing: jQuery('#footer').innerHeight() + 130,
				getWidthFrom: '0'
			});
		} else {	    	
			jQuery(".content-application .box__right .box__right__sticky").unstick();
		}

		if(jQuery(window).width() > 767){	
			jQuery(".content__siderbar__sticky").sticky({ 
				topSpacing: 79,
				bottomSpacing: jQuery('#footer').innerHeight() + jQuery('section.news').innerHeight() + jQuery('section.content-next').innerHeight() + 160,
				getWidthFrom: '0'
			});
		} else {	    	
			jQuery(".content__siderbar__sticky").unstick();
		}
	});	

	// Number Format
	function addCommas(nStr)
	{
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}

	// Number animation
	if(jQuery('section.projects').length > 0){
		var a = 0;
		var oTop = jQuery('section.projects').offset().top - window.innerHeight;

		if (a == 0 && jQuery(window).scrollTop() > (oTop + 120)) {	  
			jQuery({ countNum: jQuery('section.projects .project-top__content ul > li:eq(0) .number span').text()}).animate({
				countNum: jQuery('section.projects .project-top__content ul > li:eq(0)').attr('data-count')
			} , {
				duration: 4000,
				easing:'linear',
				step: function() {
					jQuery('section.projects .project-top__content ul > li:eq(0) .number span').text(Math.floor(this.countNum));
				},
				complete: function() {
					jQuery('section.projects .project-top__content ul > li:eq(0) .number span').text(addCommas(this.countNum));
				}
			});		 
			jQuery({ countNum1: jQuery('section.projects .project-top__content ul > li:eq(1) .number span').text()}).animate({
				countNum1: jQuery('section.projects .project-top__content ul > li:eq(1)').attr('data-count')
			} , {
				duration: 4000,
				easing:'linear',
				step: function() {
					jQuery('section.projects .project-top__content ul > li:eq(1) .number span').text(Math.floor(this.countNum1));
				},
				complete: function() {
					jQuery('section.projects .project-top__content ul > li:eq(1) .number span').text(addCommas(this.countNum1));
				}
			});		 
			jQuery({ countNum2: jQuery('section.projects .project-top__content ul > li:eq(2) .number span').text()}).animate({
				countNum2: jQuery('section.projects .project-top__content ul > li:eq(2)').attr('data-count')
			} , {
				duration: 4000,
				easing:'linear',
				step: function() {
					jQuery('section.projects .project-top__content ul > li:eq(2) .number span').text(Math.floor(this.countNum2));
				},
				complete: function() {
					jQuery('section.projects .project-top__content ul > li:eq(2) .number span').text(addCommas(this.countNum2));
				}
			});		 
			jQuery({ countNum3: jQuery('section.projects .project-top__content ul > li:eq(3) .number span').text()}).animate({
				countNum3: jQuery('section.projects .project-top__content ul > li:eq(3)').attr('data-count')
			} , {
				duration: 4000,
				easing:'linear',
				step: function() {
					jQuery('section.projects .project-top__content ul > li:eq(3) .number span').text(Math.floor(this.countNum3));
				},
				complete: function() {
					jQuery('section.projects .project-top__content ul > li:eq(3) .number span').text(addCommas(this.countNum3));
				}
			});		 
			jQuery({ countNum4: jQuery('section.projects .project-top__content ul > li:eq(4) .number span').text()}).animate({
				countNum4: jQuery('section.projects .project-top__content ul > li:eq(4)').attr('data-count')
			} , {
				duration: 4000,
				easing:'linear',
				step: function() {
					jQuery('section.projects .project-top__content ul > li:eq(4) .number span').text(Math.floor(this.countNum4));
				},
				complete: function() {
					jQuery('section.projects .project-top__content ul > li:eq(4) .number span').text(addCommas(this.countNum4));
				}
			});			  
			a = 1;
		}
		jQuery(window).scroll(function() {
			if (a == 0 && jQuery(window).scrollTop() > (oTop + 120)) {	  			  	
				jQuery({ countNum: jQuery('section.projects .project-top__content ul > li:eq(0) .number span').text()}).animate({
					countNum: jQuery('section.projects .project-top__content ul > li:eq(0)').attr('data-count')
				} , {
					duration: 4000,
					easing:'linear',
					step: function() {
						jQuery('section.projects .project-top__content ul > li:eq(0) .number span').text(Math.floor(this.countNum));
					},
					complete: function() {
						jQuery('section.projects .project-top__content ul > li:eq(0) .number span').text(this.countNum);
					}
				});		 
				jQuery({ countNum1: jQuery('section.projects .project-top__content ul > li:eq(1) .number span').text()}).animate({
					countNum1: jQuery('section.projects .project-top__content ul > li:eq(1)').attr('data-count')
				} , {
					duration: 4000,
					easing:'linear',
					step: function() {
						jQuery('section.projects .project-top__content ul > li:eq(1) .number span').text(Math.floor(this.countNum1));
					},
					complete: function() {
						jQuery('section.projects .project-top__content ul > li:eq(1) .number span').text(this.countNum1);
					}
				});		 
				jQuery({ countNum2: jQuery('section.projects .project-top__content ul > li:eq(2) .number span').text()}).animate({
					countNum2: jQuery('section.projects .project-top__content ul > li:eq(2)').attr('data-count')
				} , {
					duration: 4000,
					easing:'linear',
					step: function() {
						jQuery('section.projects .project-top__content ul > li:eq(2) .number span').text(Math.floor(this.countNum2));
					},
					complete: function() {
						jQuery('section.projects .project-top__content ul > li:eq(2) .number span').text(this.countNum2);
					}
				});		 
				jQuery({ countNum3: jQuery('section.projects .project-top__content ul > li:eq(3) .number span').text()}).animate({
					countNum3: jQuery('section.projects .project-top__content ul > li:eq(3)').attr('data-count')
				} , {
					duration: 4000,
					easing:'linear',
					step: function() {
						jQuery('section.projects .project-top__content ul > li:eq(3) .number span').text(Math.floor(this.countNum3));
					},
					complete: function() {
						jQuery('section.projects .project-top__content ul > li:eq(3) .number span').text(this.countNum3);
					}
				});		 
				jQuery({ countNum4: jQuery('section.projects .project-top__content ul > li:eq(4) .number span').text()}).animate({
					countNum4: jQuery('section.projects .project-top__content ul > li:eq(4)').attr('data-count')
				} , {
					duration: 4000,
					easing:'linear',
					step: function() {
						jQuery('section.projects .project-top__content ul > li:eq(4) .number span').text(Math.floor(this.countNum4));
					},
					complete: function() {
						jQuery('section.projects .project-top__content ul > li:eq(4) .number span').text(this.countNum4);
					}
				});			  
				a = 1;
			}
		});
	}

//SHOW AND HIDE LIGHBOX
jQuery(document).on('click','.md-trigger',function(event){    	
	var value = jQuery(this).attr('data-modal');
	event.preventDefault();
	jQuery('#md-forgot form, #md-login form').trigger("reset");
	jQuery('#md-forgot form .text-warning, #md-login form .text-warning').text("");
	jQuery('#md-forgot form .input-control, #md-login form .input-control').removeClass("error").removeClass("success-value");
	jQuery('.md-modal').removeClass('md-show');
	jQuery(value).addClass('md-show');
        // jQuery('body').addClass('none-scroll');
    });

jQuery(document).on('click','.md-close, .md-overlay, .md-cancel',function(){
	jQuery('.md-modal').removeClass('md-show');
	jQuery('body').removeClass('none-scroll');
	var src = jQuery(this).parent().find('iframe').attr('src');		
	jQuery(this).parent().find('iframe').attr('src', '');
	jQuery(this).parent().find('iframe').attr('src', src);
}); 


jQuery(document).on('click', '.small-breadcrumbs .current-page', function(event) {
	event.preventDefault();
	jQuery(this).closest('.box').toggleClass('open');
});

jQuery('.btn-informa span').click(function(){
	jQuery(this).toggleClass('active');
	jQuery('.sticky .show-sticky').slideToggle('slow');
});

jQuery('#header .box-menu .menu-top').height(jQuery('#header .box-menu').height() - 360);

    /*=================================================
	Custom
	=====================================================*/
	jQuery(window).load(function() {   
		jQuery(".fr-loading").delay(1000).fadeOut("slow");
		jQuery(".current-lang").text(jQuery('.header-middle__language span.current').text());
	});

	// Menu
	jQuery('#dark-shadow, #menu-mobile .toggle-action').click(function(event) {
		jQuery('#header-responsive .bottoms .menu').removeClass('active');
		jQuery('#menu-mobile').removeClass('active');
		jQuery('#dark-shadow').removeClass('active');
		jQuery('body').removeClass('none-scroll');
	});

	jQuery(document).on('click', '#header-responsive .bottoms .menu', function(event) {
		event.preventDefault();
		jQuery(this).addClass('active');
		jQuery(this).parent().find('.box-menu').addClass('active');
		jQuery('#menu-mobile').addClass('active');
		jQuery('#header-responsive .bottoms .book, #header-responsive .bottoms .box-book').removeClass('active');
		jQuery('#dark-shadow').addClass('active');
		jQuery('body').addClass('none-scroll');
	});

	jQuery(document).on('click', '#menu-mobile .fr-menu > .menu-item-has-children', function(event) {
		if(jQuery(this).hasClass('open')){
			jQuery(this).removeClass('open');
			jQuery(this).find('> ul').slideUp(300);
		}else{			
			jQuery(this).addClass('open');
			jQuery(this).find('> ul').slideDown(300);
		}
	});

	jQuery(document).on('click', '.box-menu .list-menu > .menu-item-has-children ul', function(event) {
		event.stopPropagation();
	});

	// Slider
	if(jQuery('.ads__slider').length > 0){
		jQuery('.ads__slider').owlCarousel({
			loop:true,
			margin: 10,
			autoplayTimeout:7000,
			nav: false,
			autoplay: true,
			rewind: true,
			dots: false,
			lazyLoad:true,
			autoplayHoverPause:true,
			autoplaySpeed: 700,
			navSpeed: 700,
			dragEndSpeed: 700,
			items: 1,
		});
	}
	if(jQuery('.partner-slider-1').length > 0){
		jQuery('.partner-slider-1').owlCarousel({
			loop: true,
			dots: false,
			margin: 40,
			items:8,
			nav: true,
			mouseDrag: true,
			touchDrag: true,
			autoplaySpeed: 1500,
			navSpeed: 1500,
			dotsSpeed: 1500,
			dragEndSpeed: 1500,
			navText: ['<div class="tw-prev"></div>','<div class="tw-next"></div>'],
			responsive:{
				0:{
					items: 3,
				},
				450:{
					items: 4,
					margin: 20,
				},
				767:{
					items: 5,
				},
				992:{
					items: 6,
				},
				1200:{
					items: 8,
				}
			},   
		}); 	
	}
	if(jQuery('.partner-slider-2').length > 0){
		jQuery('.partner-slider-2').owlCarousel({
			loop: true,
			dots: false,
			margin: 40,
			items:8,
			nav: true,
			mouseDrag: true,
			touchDrag: true,
			autoplaySpeed: 1500,
			navSpeed: 1500,
			dotsSpeed: 1500,
			dragEndSpeed: 1500,
			navText: ['<div class="tw-prev"></div>','<div class="tw-next"></div>'],	
			responsive:{
				0:{
					items: 3,
				},
				450:{
					items: 4,
					margin: 20,
				},
				767:{
					items: 5,
				},
				992:{
					items: 6,
				},
				1200:{
					items: 8,
				}
			},         
		}); 	
	}
	if(jQuery('.review__slider').length > 0){
		jQuery('.review__slider').owlCarousel({
			loop:true,
			margin: 10,
			autoplayTimeout:7000,
			nav: false,
			autoplay: true,
			rewind: true,
			dots: false,
			lazyLoad:true,
			autoplayHoverPause:true,
			autoplaySpeed: 700,
			navSpeed: 700,
			dragEndSpeed: 700,
			items: 3,
		});
	}
	if(jQuery('.history__slider').length > 0){
		jQuery('.history__slider').owlCarousel({
			loop:true,
			margin: 10,
			autoplayTimeout:7000,
			nav: true,
			autoplay: true,
			rewind: true,
			dots: false,
			lazyLoad:true,
			autoplayHoverPause:true,
			autoplaySpeed: 700,
			navSpeed: 700,
			dragEndSpeed: 700,
			items: 1,
			navText: ['<div class="slider__prev"></div>','<div class="slider__next"></div>'],   
		});
	}
	
	// Exhibiting
	jQuery('.content-banner .box__text').slick({
		arrows: false,
		// asNavFor: '.content-banner .box__pagenavi, .content-banner .box__images',
		fade: true,
		cssEase: 'linear',
		// swipe: false,
		speed: 1000,
		autoplay: true,
		autoplaySpeed: 5000,
		responsive: [
			{
				breakpoint: 1920,
			},
			{
				breakpoint: 1200,
			}
		]
	});
	jQuery('.content-banner .box__images').slick({
		// asNavFor: '.content-banner .box__pagenavi, .content-banner .box__text',
		dots: false,
		focusOnSelect: false,
		slidesToShow: 1,
		touchMove: false,
		fade: true,
		arrows: false,
		cssEase: 'linear',
		swipe: false,
		speed: 1000,
		responsive: [
		{
			breakpoint: 1920,
			settings: {
				dots: false,
				swipe: false,
			}
		},
		{
			breakpoint: 1200,
			settings: {
				swipe: true,
			}
		}
		]
	});

	var $slider = jQuery('.content-banner .box__pagenavi');

	if ($slider.length) {
		var currentSlide;
		var slidesCount;
		var sliderCounter = jQuery('.tw__count');

		var updateSliderCounter = function(slick, currentIndex) {
			currentSlide = slick.slickCurrentSlide() + 1;
			slidesCount = slick.slideCount;
			jQuery(sliderCounter).html('<span>' + currentSlide + '</span> / ' +slidesCount)
		};

		$slider.on('init', function(event, slick) {
			$slider.parent().find('.tw__prev').after(sliderCounter);
			updateSliderCounter(slick);
		});

		$slider.on('afterChange', function(event, slick, currentSlide) {
			updateSliderCounter(slick, currentSlide);
		});

		$slider.slick({
			arrows: true,
			// asNavFor: '.content-banner .box__text, .content-banner .box__images',
			prevArrow: '.tw__prev',
			nextArrow: '.tw__next',
			cssEase: 'linear',
			speed: 1000,
			dots: false,
			loops: true,
			responsive: [
			{
				breakpoint: 1920,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: true,
				}
			},
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 1,
					swipe: true,
				}
			}
			]
		});
	}

	// Reviews
	var sync2 = jQuery('.content-reviews .review__avatar__slider'),
	sync1 = jQuery('.content-reviews .review__info__slider'),
	duration = 300,
	thumbs = 4;

    // Sync nav
    sync1.on('click', '.owl-next', function () {
    	sync2.trigger('next.owl.carousel')
    });
    sync1.on('click', '.owl-prev', function () {
    	sync2.trigger('prev.owl.carousel')
    });

    // Start Carousel
    sync1.owlCarousel({
        // rtl: true,
        // center: true,
        loop: true,
        items: 1,
        margin: 0,
        smartSpeed: 700,
        lazyLoad: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        nav: true,
        mouseDrag: false,
        touchDrag: false,
        navText: ['<div class="slider__prev"></div>','<div class="slider__next"></div>'],
    }).on('dragged.owl.carousel', function (e) {
    	if (e.relatedTarget.state.direction == 'left') {
    		sync2.trigger('next.owl.carousel')
    	} else {
    		sync2.trigger('prev.owl.carousel')
    	}
    });


    sync2.owlCarousel({
        // rtl: true,
        loop: true,
        items: thumbs,
        margin: 85,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        smartSpeed: 700,
        nav: false,
        mouseDrag: false,
        touchDrag: false,
        center: true,
        autoWidth: true,
    }).on('click', '.owl-item', function () {
    	var i = jQuery(this).index() - (thumbs + 1);
    	sync2.trigger('to.owl.carousel', [i, duration, true]);
    	sync1.trigger('to.owl.carousel', [i, duration, true]);
    });

    jQuery(document).on('click', '.nav-mobile .nav-tabs li a', function(event) {
    	event.preventDefault();
    	var value = jQuery(this).text();

    	jQuery(this).closest('.nav-mobile').find('span').text(value);
    });

    jQuery("[data-fancybox]").fancybox({});
});

function header(){
	var x = 0;
	if(jQuery(this).scrollTop() > 100)
	{  	
		jQuery('#header').addClass('active');
		x = jQuery(window).height() - 61;
	}
	else
	{
		jQuery('#header').removeClass('active');
		x = jQuery(window).height() - 91;
	}      
	jQuery('#header .box-menu .menu-top').height(x - 360);
}
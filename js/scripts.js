(function ($, root, undefined) {

	$(function () {

		'use strict';
		// DOM ready, take it away




		$('.mobile .toggle').click(function() {
			$('.mobile .toggle span').toggleClass( "hide" );
			$('header').toggleClass( "open_nav" );
		});




// Food Sliders
		$('.food .slider').slick({
			dots: false,
			nextArrow: '<button type="button" class="slick-next">+</button>',
			// prevArrow: '<button type="button" class="slick-prev">-</button>',
			prevArrow: '',
			speed: 300,
			slidesToShow: 4,
			slidesToScroll: 4,
			// centerMode: true,
			centerPadding: '10px',
			responsive: [
				{
				breakpoint: 1250,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					}
				},
				{
				breakpoint: 900,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
					}
				},
				{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
					}
				}
			]
		});

		// Autoplay videos in slider
		$('a.dish video').each(function(i, obj) {
			$(this).get(0).play();
		});

		// Submenu Delivery/Foodtruck Filter
		$('.menu_filter button').click(function(){
			$(this).toggleClass('selected');

			// Shade options
			if($('.menu_filter button').hasClass('selected')) {
				$('.food .slider').addClass('filtered');
			} else {
				$('.food .slider').removeClass('filtered');
			}

			// Toggle -active
			var att = $(this).attr('id');
			var these = $('.food .slide.'+att);

			if($(these).hasClass(att+'-active')) { 			// Off
				$(these).removeClass(att+'-active');
			} else { 										// On
				$(these).each(function () {
					$(these).addClass(att+'-active');
				});
			}
		});




// Food: Current menu option
		$('.menu_filter ul li:nth-child(1)').addClass('current');

		var stickyTop = $('.mobile.sub_nav');
		if (stickyTop.length) {
			var stickyTopSM = stickyTop.offset().top;
			var footerTop = $('footer').offset().top;
			$(window).on( 'scroll', function(){
				if ($(window).scrollTop() >= stickyTopSM) {
					$('.mobile.sub_nav').addClass('fix');
				// } else if ($(window).scrollTop() <= footerTop) {
				// 	$('.mobile.sub_nav').removeClass('fix');
				// 	console.log('pop');
				} else {
					$('.mobile.sub_nav').removeClass('fix');
				}
			});

		}

		window.addEventListener("hashchange", function () {
			window.scrollTo(window.scrollX, window.scrollY - 100);
		});






// Food: Modals
		var fly = '.food.modal.fly';
		$('.food .slider a.slide').click(function(e){
			e.stopPropagation()
			e.preventDefault();
			var link = jQuery(this).attr('href');
			var pOff = $(this).offset();
			var pW = $(fly).width();
			var wW = $(window).width();
			if(wW/2 < pOff.left) {
				var lft = pOff.left-(pW*.5);
			} else {
				var lft = pOff.left;
			}
			$('body').addClass('open_modal');
			$(fly).fadeIn('slow').css('top', (pOff.top-20)).css('left', (lft+20));
			$(fly).addClass('loading').html('<h1>Ay vengo!</h1>');
			$(fly).load(link+' .food.modal > div', function(){
				$(fly).removeClass('loading');
			});
		});
		$('button.slick-arrow').click(function(){
			$(fly).fadeOut('slow');
		});
		$(window).click(function(){
			$(fly).fadeOut('slow');
		});
		// $('body').click(function(e) {
		// 	if($(this).hasClass('open_modal')) {
		// 		if ($(e.target).closest(fly).length === 0) {
		// 			// $(fly).fadeOut('slow');
		// 			// $('body').removeClass('open_modal');
		// 			console.log('ay!');
		// 		}
		// 	}
		// });



// Prevent autoscroll
		$('.tour, .explore .mapa').click(function(){
			$(this).find('iframe').addClass('clicked');
		}).mouseleave(function(){
			$(this).find('iframe').removeClass('clicked');
		});




// Sucursales: Image tabs
		$('.location.tabs > a').click(function(e) {
			e.preventDefault();
			var thisID = $(this).attr('href');
			// $(thisID).addClass('active');
			$('#content.location .slide').fadeOut('slow');
			$(thisID).fadeIn();

			// var p = ;
			var pos = $(this).position();
			var pwi = $(this).width();
			var newPointerX = pos.left + (pwi/2)-32;
			$('.pointer').css("left", newPointerX);
		});

		if ($('.location.tabs').length){
			var p = $('.location.tabs a:nth-child(1)');
			var pos = p.position();
			var pwi = p.width();
			var initialPointerX = pos.left + pwi/2;
			// $( "p:last" ).text( "left: " + position.left + ", top: " + position.top );
			$('.pointer').css("left", initialPointerX);
		}



// Video
		if ($('.block.video.intro').length){
			$('.block.video').prependTo('body');
			$('.block.video video').get(0).play()
			$('body').addClass('has_video');
			setTimeout(function() {
				// $('img.random').removeClass('hide').prependTo('.block.video');
			}, 0);

		}




// Scroll Magic
		AOS.init({
			duration: 1200
		});




// Sticky menu
		var stickyTop = $('header').offset().top-20;
		var lastScrollTop = 0;

		$(window).on( 'scroll', function(){
			if ($(window).scrollTop() >= stickyTop) {
				$('header, .stripe').addClass('fix');
			} else {
				$('header, .stripe').removeClass('fix');
			}
		});


		$(window).on('scroll', function() {
			var st = $(this).scrollTop();
			if(st < lastScrollTop) {
				$('header').removeClass('compact');
			} else {
				if ($(window).scrollTop() >= stickyTop) {
					$('header').addClass('compact');
				}
			}
			lastScrollTop = st;
		});





	});

})(jQuery, this);

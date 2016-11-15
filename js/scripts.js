(function ($, root, undefined) {

	$(function () {

		'use strict';
		// DOM ready, take it away




		$('.mobile .toggle').click(function() {
			$('.mobile .toggle span').toggleClass( "hide" );
			$('header').toggleClass( "open_nav" );
		});




// Timeshifts related
		var d = new Date();
		var currentHour = d.getHours();
		var status;
		if(currentHour >= 6 && currentHour < 9) {
			status = 'sunrise';
		} else if(currentHour >= 9 && currentHour < 17) {
			status = 'day';
		} else if(currentHour >= 17 && currentHour < 19) {
			status = 'sunset';
		} else {
			status = 'night';
		}
		$('#currentTime').addClass(status);




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
				breakpoint: 1000,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					}
				},
				{
				breakpoint: 800,
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




// Prevent autoscroll
		$('.tour, .explore .mapa').click(function(){
			console.log('One');
			$(this).find('iframe').addClass('clicked');
		}).mouseleave(function(){
			console.log('Due');
			$(this).find('iframe').removeClass('clicked');
		});




// Sucursales: Image tabs
		$('.location.tabs > a').click(function(e) {
			e.preventDefault();
			var thisID = $(this).attr('href');
			console.log(thisID);
			// $(thisID).addClass('active');
			$('#content.location .slide').fadeOut('slow');
			$(thisID).fadeIn();

			// var p = ;
			var pos = $(this).position();
			var pwi = $(this).width();
			var newPointerX = pos.left + (pwi/2)-16;
			$('.pointer').css("left", newPointerX);
		});
		var p = $('.location.tabs > a:first-child');
		var pos = p.position();
		var pwi = p.width();
		var initialPointerX = pos.left + pwi/2;

		// $( "p:last" ).text( "left: " + position.left + ", top: " + position.top );
		$('.pointer').css("left", initialPointerX);






	});

})(jQuery, this);

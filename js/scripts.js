(function ($, root, undefined) {

	$(function () {

		'use strict';
		// DOM ready, take it away


		$('.mobile .toggle').click(function() {
			$('.mobile .toggle span').toggleClass( "hide" );
			$('header').toggleClass( "open_nav" );
		});


	});

})(jQuery, this);

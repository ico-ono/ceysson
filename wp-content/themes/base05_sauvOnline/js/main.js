/* ==========================================================================
   Gestion du menu mobile
   ========================================================================== */
(function($) {
	skel.breakpoints({
		wide: '(max-width: 1680px)',
		normal: '(max-width: 1280px)',
		narrow: '(max-width: 980px)',
		narrower: '(max-width: 840px)',
		mobile: '(max-width: 640px)'
	});

	$(function() {

		var	$window = $(window),
			$body = $('body');

// Off-Canvas Navigation.
			// Navigation Button.
			$(
				'<div id="navButton">' +
					'<a href="#navPanel" class="toggle"></a>' +
				'</div>'
			)
			.appendTo($body);

			// Navigation Panel.
			$(
				'<div id="navPanel">' +
					'<nav>' +
						//$('#navigation').navList() + $('#menu-lang').navList() +
            $('#nav-main').navList() + $('#nav-main2').navList() +
					'</nav>' +
				'</div>'
			)
			.appendTo($body)
			.panel({
				delay: 500,
				hideOnClick: true,
				hideOnSwipe: true,
				resetScroll: true,
				resetForms: true,
				target: $body,
				visibleClass: 'navPanel-visible'
			});

			// Fix: Remove navPanel transitions on WP<10 (poor/buggy performance).
				if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
					$('#navButton, #navPanel, #page-wrapper')
						.css('transition', 'none');


	});


})(jQuery);

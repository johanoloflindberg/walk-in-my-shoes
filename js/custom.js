jQuery(document).ready( function( $ ) {

	var 
		$menuToggles = $('button.js-menu, div.flowtime, nav a'),
		$menuButton = $('button.js-menu');

	var init = function () {
		$menuToggles.click( toggleMenu );
	}

	var toggleMenu = function() {

		if ( $menuButton.hasClass( 'active' ) ) {

			$menuButton.removeClass('active');
			$('body').removeClass('menu-open');

		} else if ( ! $( this ).hasClass('flowtime') ) {

			$menuButton.addClass('active');
			$('body').addClass('menu-open');
			
		}
	};

	init();

} );

jQuery(document).ready( function( $ ) {

	var $menuToggle = $('button.js-menu');

	$menuToggle.add( 'div.flowtime' ).on('click', function() {
		if ( $menuToggle.hasClass( 'active' ) ) {
			$menuToggle.removeClass('active');
			$('body').removeClass('menu-open');
		} else {
			$menuToggle.addClass('active');
			$('body').addClass('menu-open');
		}
	});

} );

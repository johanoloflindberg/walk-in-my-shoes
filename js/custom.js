jQuery(document).ready( function( $ ) {

	var 
		$menuToggles = $('button.js-menu, div.flowtime, nav a'),
		$menuButton = $('button.js-menu');

	var init = function () {

		flowtimeConfig();
		Flowtime.start();

		$menuToggles.click( toggleMenu );

		Flowtime.addEventListener("flowtimenavigation", onNavigation, false);
		onNavigation();
	}

	var flowtimeConfig = function() {

		Flowtime.setScrollNavigation( false );
		Flowtime.showProgress( true );
		// Flowtime.fragmentsOnSide( true );
		// Flowtime.fragmentsOnBack( true );
		// Flowtime.useHistory( false );
		// Flowtime.slideInPx( true );
		// Flowtime.sectionsSlideToTop( true );
		// Flowtime.gridNavigation( false );
		// Flowtime.useOverviewVariant( true );
		Flowtime.parallaxInPx( true );

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


	// Flowtime.onNavigation(onNavigation);
	var onNavigation = function (e) {

		setBodyClass();
		animateFeet();

		console.log('section', e.section, 'sectionIndex', e.sectionIndex);
		console.log('page', e.page, 'pageIndex', e.);
		console.log('pastSectionIndex', e.pastSectionIndex, 'pastPageIndex', e.pastPageIndex);
		console.log('prevSection', e.prevSection);
		console.log('nextSection', e.nextSection);
		console.log('prevPage', e.prevPage);
		console.log('nextPage', e.nextPage);

		console.log( e );
	}

	var setBodyClass = function() {
		var sectionClasses = [ 'amanda', 'dave', 'james', 'intro', 'outro' ];

		sectionClasses.forEach( function( name ){
			if ( -1 !== location.hash.indexOf( name ) ) {
				$('body').addClass( name );
			}else {
				$('body').removeClass( name );
			}
		} ); 
	}

	var animateFeet = function ( e ) {
		$('#feet').addClass('moving');

		setTimeout( function(){
			$('#feet').removeClass('moving');
		}, 2000 );
	}

	init();

} );

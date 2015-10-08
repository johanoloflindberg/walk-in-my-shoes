jQuery(document).ready( function( $ ) {

	var 
		$menuToggles = $('button.js-menu, div.flowtime, nav a'),
		$menuButton = $('button.js-menu');

	var init = function () {
		$menuToggles.click( toggleMenu );

		Flowtime.addEventListener("flowtimenavigation", onNavigation, false);
		onNavigation();
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
		animateFeet();

		// console.log(cacheTitle + ' > ' + document.title.replace("Flowtime.js | ", ""));
		//console.log('section', e.section, 'sectionIndex', e.sectionIndex);
		//console.log('page', e.page, 'pageIndex', e.);
		//console.log('pastSectionIndex', e.pastSectionIndex, 'pastPageIndex', e.pastPageIndex);
		//console.log('prevSection', e.prevSection);
		//console.log('nextSection', e.nextSection);
		//console.log('prevPage', e.prevPage);
		//console.log('nextPage', e.nextPage);
		//console.log('fragment', e.fragment, + 'fragmentIndex', e.fragmentIndex);
		//console.log("isOverview", e.isOverview);
		//console.log('progress:', e.progress, 'total:', e.total);
		// var value = Math.round(e.progress * 100 / e.total);
		// console.log('Completion: ' + value + '%');

		console.log( e );
	}

	var animateFeet = function ( e ) {
		if (
			   -1 !== location.hash.indexOf( 'amanda' )
			|| -1 !== location.hash.indexOf( 'dave' )
			|| -1 !== location.hash.indexOf( 'james' )
		) {
			$('#feet').show();
		}else {
			$('#feet').hide();
		}

		$('#feet').addClass('moving');

		setTimeout( function(){
			$('#feet').removeClass('moving');
		}, 2000 );
	}

	init();

} );

jQuery(document).ready( function( $ ) {

	var 
		$menuToggles = $('header button, div.flowtime, nav a'),
		$menuButton = $('header button'),
		$budgetToggles = $('#footer .budget-toggle'),
		$budgetButton = $('#footer .budget-toggle'),
		budget = {
			balance: 0,
			entries: []
		};

	var init = function () {

		flowtimeConfig();
		Flowtime.start();

		$menuToggles.click( toggleMenu );
		$budgetToggles.click( toggleBudget );

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

	var toggleBudget = function() {
		if ( $budgetButton.hasClass( 'active' ) ) {

			$budgetButton.removeClass('active');
			$('body').removeClass('budget-open');

		} else if ( ! $( this ).hasClass('flowtime') ) {

			$budgetButton.addClass('active');
			$('body').addClass('budget-open');
			
		}
	}


	// Flowtime.onNavigation(onNavigation);
	var onNavigation = function (e) {
		var $page;

		setBodyClass();
		animateFeet();

		if ( undefined === e ) {
			$page = $( 'div.ft-page.actual' );
		}else {
			$page = $( e.page );
		}
		doBudget( $page );
		footerName( $page );

		// console.log( 'section', e.section, 'sectionIndex', e.sectionIndex );
		// console.log( 'page', e.page, 'pageIndex', e.pageIndex );
		// console.log( 'pastSectionIndex', e.pastSectionIndex, 'pastPageIndex', e.pastPageIndex );
		// console.log( 'prevSection', e.prevSection );
		// console.log( 'nextSection', e.nextSection );
		// console.log( 'prevPage', e.prevPage );
		// console.log( 'nextPage', e.nextPage );

		// console.log( e );
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

	var doBudget = function( $item ) {
		var entry = $item.data( 'budget-entry' ),
			$table = $('#budget-table table tbody'),
			$row;

		if ( undefined === entry ) {
			console.log( "No budget change." );
			return;
		}

		budget.entries.push( entry );

		budget.balance = 0;
		$table.html( '' );

		budget.entries.forEach( function( entry ){

			budget.balance = budget.balance + entry.amount;

			$row = $( 
				'<tr>' +
					'<td>' + entry.date + '</td>' +
					'<td>' + entry.description + '</td>' +
					'<td>' + numberWithCommas( entry.amount ) + '</td>' +
					'<td>' + numberWithCommas( budget.balance ) + '</td>' +
				'</tr>' 
			);

			$table.append( $row );

		} );

		console.log( entry );
		console.log( budget.entries );

		$( '#footer .var-balance' ).text( numberWithCommas( budget.balance ) )
	}

	var numberWithCommas = function(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	var footerName = function( $page ) {
		var $section = $page.parents( '.ft-section' );

		if ( $section.data('name') ) {
			$('#footer .var-name').text( $section.data( 'name') );
		}
	}

	init();

} );

jQuery(document).ready( function( $ ) {

	var 
		$menuToggles = $('header button, div.flowtime, nav a'),
		$menuButton = $('header button'),
		$budgetToggles = $('#footer .budget-toggle'),
		$budgetButton = $('#footer .budget-toggle'),
		$budgetTable = $('#budget-table table tbody'),
		budget = {};

	var init = function () {

		flowtimeConfig();
		Flowtime.start();

		$menuToggles.click( toggleMenu );
		$budgetToggles.click( toggleBudget );
		$('#feet').click( animateFeet );

		Flowtime.addEventListener("flowtimenavigation", onNavigation, false);
		resetBudget();
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

		if ( undefined === e ) {
			$page = $( 'div.ft-page.actual' );
		}else {
			$page = $( e.page );
		}

		setBodyClass( $page );
		animateFeet();

		doBudget( $page );
		footerName( $page );

		riskCard( $page );

		// console.log( 'section', e.section, 'sectionIndex', e.sectionIndex );
		// console.log( 'page', e.page, 'pageIndex', e.pageIndex );
		// console.log( 'pastSectionIndex', e.pastSectionIndex, 'pastPageIndex', e.pastPageIndex );
		// console.log( 'prevSection', e.prevSection );
		// console.log( 'nextSection', e.nextSection );
		// console.log( 'prevPage', e.prevPage );
		// console.log( 'nextPage', e.nextPage );

		// console.log( e );
	}

	var setBodyClass = function( $page ) {
		var sectionClasses = [ 'amanda', 'dave', 'james', 'intro', 'outro' ],
			pageClasses = [ 'hide-header', 'hide-footer', 'hide-feet', 'show-footer-logo' ];

		sectionClasses.forEach( function( name ){
			if ( -1 !== location.hash.indexOf( name ) ) {
				$('body').addClass( name );
			}else {
				$('body').removeClass( name );
			}
		} ); 

		pageClasses.forEach( function( name ){
			if ( $page.hasClass( name ) ) {
				$('body').addClass( name );
			}else {
				$('body').removeClass( name );
			}
		} );

		if ( $('body').hasClass( 'intro' ) ) {
			resetBudget();
		}
	}

	var animateFeet = function ( e ) {
		$('#feet').addClass('moving');

		setTimeout( function(){
			$('#feet').removeClass('moving');
		}, 2000 );
	}

	var resetBudget = function() {
		budget = {
			balance: 0,
			entries: []
		};

		setBudgetDisplay();

		$budgetTable.html( '' );

		$budgetButton.removeClass('active');
		$('body').removeClass('budget-open');
	}

	var doBudget = function( $item ) {
		var entry = $item.data( 'budget-entry' ),
			$row;

		if ( undefined === entry ) {
			console.log( "No budget change." );
			return;
		}

		budget.entries.push( entry );

		budget.balance = 0;
		$budgetTable.html( '' );

		budget.entries.forEach( function( entry ){

			budget.balance = budget.balance + entry.amount;

			$row = $( 
				'<tr>' +
					'<td class="date">' + entry.date + '</td>' +
					'<td class="description">' + entry.description + '</td>' +
					'<td class="change">' + numberWithCommas( entry.amount ) + '</td>' +
					'<td class="balance">' + numberWithCommas( budget.balance ) + '</td>' +
				'</tr>' 
			);

			if ( entry.amount > 0 ) {
				$row.find('td.change').addClass('positive');
			}else {
				$row.find('td.change').addClass('negative');
			}

			$budgetTable.append( $row );

		} );

		console.log( entry );
		console.log( budget.entries );

		setBudgetDisplay();
	}

	var setBudgetDisplay = function() {
		$( '.var-balance' ).text( numberWithCommas( budget.balance ) );
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

	var riskCard = function( $page ) {
		var i = 0,
			$cards = $page.find( "ul.risk li" ),
			$activeCard;

		$activeCard = $cards.random();

		$activeCard.show();

		doBudget( $activeCard );

	};

	init();

} );

jQuery.fn.random = function() {
	var randomIndex = Math.floor( Math.random() * this.length );  
	return jQuery( this[ randomIndex ] );
};
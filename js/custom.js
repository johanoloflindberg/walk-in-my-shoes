/*
	iOS miscalculates viewport width for fixed elements.
	See http://stackoverflow.com/questions/29315889/ios-safari-100-width-fixed-position-header-wider-than-viewport
*/
var forceWidthsForFixedElements = function() {
	var $ = jQuery,
		bodyWidth = $(window).width(),
		bodyHeight = $(window).height();

	$("header, #footer, #footer-logo").width( bodyWidth ).css( 'width', bodyWidth );
	$("nav").css('left', bodyWidth - $("nav").width() );

	$("#footer").css('bottom', 'auto').css('top', bodyHeight - $("#footer").height() )
	$("#budget-table").css('bottom', 'auto').css('top', bodyHeight )
	$("#budget-table").css('left', bodyWidth - $("#budget-table").width() );

}

jQuery(document).ready( function( $ ) {

	var 
		$menuToggles = $('header button, div.flowtime, nav a'),
		$menuButton = $('header button'),
		$budgetButtons = $('.james, .amanda, .dave').find('a.button'),
		$budgetToggles = $('#footer .budget-toggle'),
		$budgetButton = $('#footer .budget-toggle'),
		$budgetTable = $('#budget-table table tbody'),
		budget = {};

	var init = function () {

		flowtimeConfig();
		Flowtime.start();

		$menuToggles.click( toggleMenu );
		$budgetToggles.click( toggleBudget );
		$budgetButtons.click( doBudget );
		$('#feet').click( animateFeet );

		Flowtime.addEventListener("flowtimenavigation", onNavigation, false);
		resetBudget();
		onNavigation();

		$(window).resize( function(){ setTimeout( forceWidthsForFixedElements, 100 ) } );
		$(window).load( forceWidthsForFixedElements );
	}

	var flowtimeConfig = function() {

		Flowtime.setScrollNavigation( false );
		Flowtime.showProgress( false );
		// Flowtime.fragmentsOnSide( true );
		// Flowtime.fragmentsOnBack( true );
		// Flowtime.useHistory( false );
		// Flowtime.slideInPx( true );
		// Flowtime.sectionsSlideToTop( true );
		// Flowtime.gridNavigation( false );
		// Flowtime.useOverviewVariant( true );
		Flowtime.parallaxInPx( true );
		Flowtime.nearestPageToTop( false );
		Flowtime.setTouchNavigation( false );

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

		if ( $('body').hasClass('menu-open') ) {
			toggleMenu();
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

	var doBudget = function() {
		var entry, $row,
			$page = $(this).parents('.ft-page').not('.budget-done');

		entry = $page.data( 'budget-entry' ) || $page.find('li.back').data( 'budget-entry' );

		if ( undefined === entry ) {
			console.log( "No budget change." );
			return;
		}

		$page.addClass('budget-done');

		budget.entries.push( entry );

		budget.balance = 0;
		$budgetTable.html( '' );

		budget.entries.forEach( function( entry ){

			budget.balance = budget.balance + entry.amount;

			$row = $( 
				'<tr>' +
					'<td class="date">' + entry.date + '</td>' +
					'<td class="description">' + entry.description + '</td>' +
					'<td class="change">' + dollarFormat( entry.amount ) + '</td>' +
					'<td class="balance">' + dollarFormat( budget.balance ) + '</td>' +
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
		var $balanceDisplays = $('#footer .budget-toggle, h2.balance');

		$( '.var-balance' ).text( dollarFormat( budget.balance ) );

		if ( budget.balance < 0 ) {
			$balanceDisplays.addClass( 'negative' );
		}else {
			$balanceDisplays.removeClass( 'negative' );
		}
	}

	var dollarFormat = function(x) {
		// Commas
		x = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

		// Dollar sign
		if ( "-" == x.substring( 0, 1 ) ) {
			x = "- $" + x.substring( 1, x.length );
		}else {
			x = "$" + x;
		}

		return x;
	}

	var footerName = function( $page ) {
		var $section = $page.parents( '.ft-section' );

		if ( $section.data('name') ) {
			$('#footer .var-name').text( $section.data( 'name') );
		}
	}

	var riskCard = function( $page ) {
		var i = 0,
			$cards = $page.find( "ul.risk li:not(.front)" ),
			$activeCard;

		if ( $cards.filter('.back').length == 0 ) {

			$activeCard = $cards.random().first();

			$activeCard
				.addClass('back')
				.width( $activeCard.parent().width() );

			$activeCard.parent()
				.height( $activeCard.height() );

			$activeCard.parents( '.flip-container' )
				.addClass('flip');

		}
	};

	init();

} );

jQuery.fn.random = function() {
	var randomIndex = Math.floor( Math.random() * this.length );  
	return jQuery( this[ randomIndex ] );
};
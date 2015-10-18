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
		$menuButton = $('header button'),
		$menuToggles = $('header button.js-menu'),
		$introButton = $('.intro .ft-page:first a.button')
		$budgetButtons = $('.james, .amanda, .dave').find('a.button'),
		$budgetToggles = $('#footer .budget-toggle'),
		$budgetButton = $('#footer .budget-toggle'),
		$budgetTable = $('#budget-table table tbody'),
		budget = {};

	var init = function () {

		flowtimeConfig();
		Flowtime.start();

		$budgetToggles.on( 'click', toggleBudget );
		$introButton.on( 'click', doneLoading );
		$('#feet').on( 'click', animateFeet );

		$menuToggles.on( 'click', toggleMenu );
		$('nav a').on( 'click', closeMenu );

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

	var toggleBudget = function() {
		if ( $budgetButton.hasClass( 'active' ) ) {

			$budgetButton.removeClass('active');
			$('body').removeClass('budget-open');

		} else if ( ! $( this ).hasClass('flowtime') ) {

			$budgetButton.addClass('active');
			$('body').addClass('budget-open');
			
		}
	}

	var doneLoading = function(){
		$('body').removeClass('loading');
	}

	var toggleMenu = function() {

		if ( $menuButton.hasClass( 'active' ) ) {

			$menuButton.removeClass('active');
			$('body').removeClass('menu-open');

		} else {

			closeMenu();
			
		}

	};

	var closeMenu = function (){

		$menuButton.addClass('active');
		$('body').addClass('menu-open');

	};

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

		doBudget( $page );

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

		if ( location.hash.length > 0 ) {
			sectionClasses.forEach( function( name ){
				if ( -1 !== location.hash.indexOf( name ) ) {
					$('body').addClass( name );
				}else {
					$('body').removeClass( name );
				}
			} ); 
		}

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

		if ( ! $page.hasClass('first') ) {
			doneLoading();
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

	var doBudget = function( $page ) {
		var entry, $row;
		
		if ( $page.hasClass('budget-done') ) {
			return;
		}

		entry = $page.data( 'budget-entry' ) || $page.find('li.back').data( 'budget-entry' );

		$page.addClass('budget-done');

		budget.balance = 0;

		if ( budget.entries.length > 0 ) {

			$budgetTable.html( '' );

			budget.entries.forEach( function( singleEntry ){

				budget.balance = budget.balance + singleEntry.amount;

				$row = $( 
					'<tr>' +
						'<td class="date">' + singleEntry.date + '</td>' +
						'<td class="description">' + singleEntry.description + '</td>' +
						'<td class="change">' + dollarFormat( singleEntry.amount ) + '</td>' +
						'<td class="balance">' + dollarFormat( budget.balance ) + '</td>' +
					'</tr>' 
				);

				if ( singleEntry.amount > 0 ) {
					$row.find('td.change').addClass('positive');
				}else {
					$row.find('td.change').addClass('negative');
				}

				$budgetTable.append( $row );

			} );
			
		}else {
			
			$budgetTable.html( '<tr><td colspan="4">No budget entries yet.</td></tr>' );

		}

		setBudgetDisplay();

		// Add new budget item after displaying old budget
		// Causes update to not occur until next slide
		if ( undefined === entry ) {
			console.log( "No budget change." );
			return;
		}else {
			budget.entries.push( entry );
		}
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
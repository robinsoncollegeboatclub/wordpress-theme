
jQuery(document).ready(function($) {


	"use strict";


	// Drawer Sidebar
	var sidebar = document.getElementById( 'sidebar' );
	var button = document.getElementById( 'toggle' );
	var body = document.body;

	button.onclick = function() {
		classie.toggle( this, 'active' );
		classie.toggle( body, 'push' );
		classie.toggle( sidebar, 'open' );
		disable( 'toggle' );
	};

	function disable( button ) {
		if ( button !== 'toggle' ) {
			classie.toggle( button, 'disabled' );
		}
	}


	// Shrinking sticky header
	$(function() {
	    $('#header').data('size','big');
	});

	$(window).scroll(function() {
	    if ($(document).scrollTop() > 100) {
	        if ( $('#header').data('size') == 'big') {
	            $('#header').data('size','small');
	            $('#header').stop().animate({
	                padding: '25px 0 0'
	            },500);
	        }
	    }
	    else {
	        if ($('#header').data('size') == 'small') {
	            $('#header').data('size','big');
	            $('#header').stop().animate({
	                padding: '70px 0 50px'
	            },150);
	        }  
	    }
	});


	// Homepage Slider
	$(window).load(function() {
	  $('#portfolio .flexslider').flexslider({
		slideshow: false,
		animation: "slider",
		animationLoop: false,
		direction: "horizontal",
		directionNav: true,
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>',
		controlNav: false,
		controlsContainer: ".slider-nav",
		itemWidth: 640,
		itemMargin: 0,
		minItems: 2,
		maxItems: 2,
		move: 0
	  });
	});


	// Gallery Post Format Slider
	$(window).load(function() {
	  $('.flexslider').flexslider({
		slideshow: false,
		controlNav: false,
	    animation: "slide",
		animationSpeed: 250,
		smoothHeight: true,
		prevText: '<i class="fa fa-angle-left"></i>',
		nextText: '<i class="fa fa-angle-right"></i>'
	  });
	});


	// Mobile Menu
    $('#nav').slicknav({
    	prependTo: 'body',
    	label: '',
    	allowParentLinks: 'true',
		closedSymbol: '<i class="fa fa-caret-down"></i>',
		openedSymbol: '<i class="fa fa-caret-up"></i>'
    });


	// Make Videos Responsive
	$('.entry-image').fitVids();


	// Portfolio Filter Sorting
	$('body.page-template-template-portfolio-sortable-php .portfolio-container').isotope({
		resizable: true,
		layoutMode: 'fitRows'
	});

	$('body.page-template-template-portfolio-sortable-php .portfolio-filter a').click(function(e) {
		if( $('body').hasClass('tax-portfolio-type') ) {
			return;
		}
		// do the filter
		var selector = $(this).attr('data-filter');
		$('body.page-template-template-portfolio-sortable-php .portfolio-container').isotope({ filter: selector });

		// update filter class
		$('body.page-template-template-portfolio-sortable-php .portfolio-filter a').removeClass('active');
		$(this).addClass('active');

		// prevent default click
		e.preventDefault();
		return false;
	});

});

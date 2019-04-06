// IF JS IS ENABLED, REMOVE 'no-js' AND ADD 'js' CLASS
jQuery('html').removeClass('no-js').addClass('js');

jQuery(document).ready(function($) {

	var $browserMSIE = $.browser.msie;
	var $browserVersion = parseInt($.browser.version, 10);

	if ($browserMSIE && $browserVersion === 8 || $browserMSIE && $browserVersion === 9) {
		$(document).on("click", '.ie .sidebar-btn' , function(){
			if ($('#theme-wrapper').hasClass('ie-side-menu')) {
				$('#theme-wrapper').removeClass('ie-side-menu');
			 	$('.hidden-sidebar').css('display','none').css('z-index','-1');
			 	$('.menu-icon').removeClass('close');
			 } else {
			 	$('#theme-wrapper').addClass('ie-side-menu');
			 	$('.hidden-sidebar').css('display','block').css('z-index','99');
			 	$('.menu-icon').addClass('close');
			}
		});
	} else {}

	$(document).on("click", '.ie .close-btn' , function(){
		$('#theme-wrapper').removeClass('ie-side-menu');
		$('.hidden-sidebar').css('display','none').css('z-index','-1');
		$( '#menu-toggle' ).toggleClass( 'toggled' );
	});

	/* Superfish */
	$('#primary-nav > ul').superfish({
		delay: 200,
		animation: {opacity:'show', height:'show'},
		speed: 'fast',
		disableHI: true,
		cssArrows: false,
	});

	/* Sticky navigation */
	$('#primary-nav').waypoint('sticky');

	/* Back to Top */
	jQuery().UItoTop( { text: '' } );

	/* Click events */
	var ua = navigator.userAgent,
    	clickevent = (ua.match(/iPad/i) || ua.match(/iPhone/i) || ua.match(/Android/i)) ? "touchstart" : "click";

	/* Menu button trigger */
	$(document).on(clickevent, 'a.sidebar-btn', function(event){
	event.preventDefault();
		if ($('#theme-wrapper').hasClass('side-menu')) {
		  closeMenu();
		} else {
		  openMenu();
		}
	});

	/* Mobile close */
	$(document).on(clickevent, '.close-btn', function(event){
		event.preventDefault();
		closeMenu();
	});

	/* Open function */
	function openMenu(){
	 	$('.hidden-sidebar').css('display','block');
	 	$('.menu-icon').addClass('close');
	 	$('#toTop').addClass('hide');
	 	$('#theme-wrapper').addClass('side-menu');
	 	$('.safari #theme-wrapper').addClass('no-flick');
	 	$('.safari #header-container').addClass('no-flick');
	 	setTimeout(function(){$('.hidden-sidebar').css('z-index','0');},900);

	 	setTimeout(function(){
	 		$( '#menu-toggle' ).toggleClass( 'toggled' );
	 	},500);
	}

	/* Close function */
	function closeMenu(){
		$('.hidden-sidebar').css('z-index','-1');
		$('.menu-icon').removeClass('close');
		$('#toTop').removeClass('hide');
		$('#theme-wrapper').removeClass('side-menu');
		$('.safari #theme-wrapper').removeClass('no-flick');
		$('.safari #header-container').removeClass('no-flick');
		setTimeout(function(){ $('.hidden-sidebar').css('z-index','-1'); },900);

		setTimeout(function(){
	 		$( '#menu-toggle' ).toggleClass( 'toggled' );
	 	},200);
	}
} );
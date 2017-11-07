
//Menu dropdown animation
jQuery(function($) {
	$('.sub-menu').hide();
	$('.main-navigation .children').hide();
	$('.menu-item').hover( 
		function() {
			$(this).children('.sub-menu').slideDown();
		}, 
		function() {
			$(this).children('.sub-menu').hide();
		}
	);
	$('.main-navigation li').hover( 
		function() {
			$(this).children('.main-navigation .children').slideDown();
		}, 
		function() {
			$(this).children('.main-navigation .children').hide();
		}
	);	
});

//Open social links in a new tab
jQuery(function($) {
     $( '.social-navigation li a' ).attr( 'target','_blank' );
});

//Fit Vids
jQuery(function($) {
    $("body").fitVids();  
});

//Mobile menu
jQuery(function($) {
	$('.main-navigation .menu').slicknav({
		label: '<i class="fa fa-bars"></i>',
		prependTo: '.mobile-nav',
		closedSymbol: '&#43;',
		openedSymbol: '&#45;',
		allowParentLinks: true
	});
	$('.info-close').click(function(){
		$(this).parent().fadeOut();
		return false;
	});
});	

//Parallax
jQuery(function($) {
	$(".parallax").parallax("50%", 0.3);
});

//Header boxes check
jQuery(function($) {
	$('.header-block').each(function () {
		var $main = $(this),
	    	$allChildren = $main.children();
	    	$allEmptyChildren = $allChildren.filter(':empty');
		$main.toggle($allChildren.length !== $allEmptyChildren.length);
	});
});

//Preloader

jQuery(function($) {
	$('.preloader').css('opacity', 0);
	setTimeout(function() {
		$('.preloader').hide();}, 600
	);   
});

//Menu Init
ddsmoothmenu.init({
    mainmenuid: "menu", //menu DIV id
    orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
    classname: 'ddsmoothmenu', //class added to menu's outer DIV
    //customtheme: ["#1c5a80", "#18374a"],
    contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
});
//Flexslider
//<![CDATA[
jQuery.noConflict();
jQuery("document").ready(function() {
    jQuery('.flexslider').flexslider({
        animation: "slide", //String: Select your animation type, "fade" or "slide"
        slideDirection: "horizontal", //String: Select the sliding direction, "horizontal" or "vertical"
        slideshow: true, //Boolean: Animate slider automatically
        slideshowSpeed: 4000, //Integer: Set the speed of the slideshow cycling, in milliseconds
        animationDuration: 600, //Integer: Set the speed of animations, in milliseconds
        smoothHeight: true, //Boolean: Animate the height of the slider smoothly for slides of varying height.
        directionNav: true, //Boolean: Create navigation for previous/next navigation? (true/false)
        controlNav: false, //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        keyboardNav: true, //Boolean: Allow slider navigating via keyboard left/right keys
        mousewheel: false, //Boolean: Allow slider navigating via mousewheel
        prevText: "Previous", //String: Set the text for the "previous" directionNav item
        nextText: "Next", //String: Set the text for the "next" directionNav item
        pausePlay: false, //Boolean: Create pause/play dynamic element
        pauseText: 'Pause', //String: Set the text for the "pause" pausePlay item
        playText: 'Play', //String: Set the text for the "play" pausePlay item
        randomize: false, //Boolean: Randomize slide order
        slideToStart: 0, //Integer: The slide that the slider should start on. Array notation (0 = first slide)
        animationLoop: true, //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
        pauseOnAction: true, //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
        pauseOnHover: true
    });
});
//]]> 
//Home page Carousel
jQuery.noConflict();
//Crousel Init	
jQuery(document).ready(function() {
    jQuery(".carousel-posts").jCarouselLite({//carousel settings
        visible: jQuery('#carousel-full li').length, // visible items
        auto: 5000, // carousel speed
        btnNext: ".next", // next button class
        btnPrev: ".prev"						// previous button class
    });
});
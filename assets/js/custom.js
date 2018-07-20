jQuery(document).ready(function () {
    jQuery(window).load(function () {
        jQuery('.newsslider').flexslider({
            animation: "slide",
            direction: "vertical",
            controlNav: false,
            directionNav: false
        });
    });
});

jQuery(document).ready(function () {
    jQuery(window).load(function () {
        jQuery('.flexslider').flexslider({
            animation: "slide",
            controlNav: false,
            directionNav: true
        });
    });
});

jQuery(document).ready(function () {

    jQuery("#post-carousel").owlCarousel({
        items: 3,
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
        navigation: true,
        pagination: false,
        navigationText: ["<i class='fa fa-angle-left'>", "<i class='fa fa-angle-right'>"],
        slideSpeed: 2000,
        autoPlay: true
    });

});

jQuery(document).ready(function () {

    jQuery("#post-video").owlCarousel({
        items: 4,
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
        navigation: true,
        pagination: false,
        navigationText: ["<i class='fa fa-angle-left'>", "<i class='fa fa-angle-right'>"],
        slideSpeed: 2000,
        autoPlay: true
    });

});

jQuery(document).ready(function () {

    jQuery("#testimonials").owlCarousel({
        singleItem: true,
        items: 1,
        transitionStyle: "godown",
        navigation: false

    });

});

jQuery(document).ready(function () {
  jQuery("button.navbar-toggle").on('click', function(){
   jQuery(".navbar-default .navbar-collapse").toggleClass('menu-active');
});
jQuery("span.nav-close").on('click', function(){
   jQuery(".navbar-default .navbar-collapse").removeClass('menu-active');
});
});

jQuery(document).ready(function () {
 jQuery('#menu-primary-1 li.menu-item-has-children').prepend('<span class="fa fa-angle-down"></span>');
 jQuery('#menu-primary-1 li.menu-item-has-children span.fa-angle-down').on('click', function(){
 jQuery(this).siblings('#menu-primary-1 li.menu-item-has-children ul').slideToggle(500);
});
});

jQuery(document).ready(function () {
//Check to see if the window is top if not then display button
  jQuery(window).scroll(function($){
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.go-to-top').addClass('gotop');
      jQuery('.go-to-top').fadeIn();
    } else {
      jQuery('.go-to-top').fadeOut();
    }
  });

//Click event to scroll to top
jQuery('.go-to-top').click(function($){
  jQuery('html, body').animate({scrollTop : 0},800);
  return false;
});
});

//sticky sidebar
jQuery(document).ready(function ($) {
var at_body = jQuery("body");
var at_window = jQuery(window);

if(at_body.hasClass('ct-sticky-sidebar')){
        if(at_body.hasClass('right-sidebar')){
            jQuery('.page-sidebar-column, .page-content-column').theiaStickySidebar();
        }
        else{
            jQuery('.page-sidebar-column, .page-content-column').theiaStickySidebar();
        }
    }
});
<?php

/**

 * Dynamic css

 *

 * @package Canyon Themes

 * @subpackage Glowmag

 *

 * @param null

 * @return void

 *

 */

if ( !function_exists('glowmag_dynamic_css') ):

    function glowmag_dynamic_css(){
 
   /*====================Basic Color=====================*/

    $glowmag_primary_color     = glowmag_get_option( 'primary_color' );
    $custom_css = '';




/*====================Primary Color =====================*/

$custom_css .= " .site-title a, p.site-description, .main-navigation ul li.current-menu-item a, h1, h2, h3, h4, h5, h6,
                 .navbar-default .navbar-nav>li>a:hover,a

                  {

                      color: " . $glowmag_primary_color . ";

                   }

                  ";

$custom_css .= " .top-bar,.bg1,.page-title:after,.main-title,.navbar-default .navbar-nav>.active>a,.btn-red:hover,.btn-red,.news-carousel .owl-theme .owl-controls .owl-buttons div,.bg3, h2.widget-title,.widget .search-submit:hover,.widget .search-submit,.single-post .nav-previous a, .single-post .nav-next a,.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover,button,input[type='button'],input[type='reset'],input[type='submit']

                  {

                      background: " . $glowmag_primary_color . ";

                   }

                  ";                  


  $custom_css .= " h2.widget-title:after

                  {

                      border-top-color: " . $glowmag_primary_color . ";

                   }

                  ";





    /*------------------------------------------------------------------------------------------------- */


    /*custom css*/



    wp_add_inline_style('glowmag-style', $custom_css);



}

endif;

add_action('wp_enqueue_scripts', 'glowmag_dynamic_css', 99);
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage GlowMag
 */

if (!function_exists('glowmag_top_header')) :

    function glowmag_top_header($post_id)
    {

        $show_top_header            = glowmag_get_option( 'show_top_header' );

        $show_top_header_left_menu  = absint( glowmag_get_option( 'show_top_header_left_menu' ) ) ;

        $show_top_header_right_menu = glowmag_get_option( 'show_top_header_right_menu' );

        if(  $show_top_header == 1 )
        
        {

?>          <section class="top-bar">
                <div class="container">
                    <div class="row">
                    
                    <?php

                    if(  $show_top_header_left_menu == 1 )
                       {


                    ?>
                            <div class="col-sm-8">
                                <ul class="list-inline top-nav">
                                   
                                    <?php
                                        if (has_nav_menu('top-header')) {
                                            wp_nav_menu(array(
                                                    'theme_location' => 'top-header',
                                                    'menu_class'     => 'list-inline top-nav',
                                                    
                                                )
                                            );
                                        }
                                        ?>

                                </ul>
                            </div>
                 <?php } 
                 
                    if(  $show_top_header_right_menu == 1 )
                    
                       {

                  ?>        
                            <div class="col-sm-4 text-right social-links">
                                 <?php
                                        if (has_nav_menu('social-link')) 
                                        {
                                            wp_nav_menu(array(
                                                    'theme_location' => 'social-link',
                                                    'menu_class'     => 'list-inline top-social',
                                                    
                                                )
                                            );
                                        }
                                 ?>
                                
                            </div>
                 <?php } ?>        
                 
                    </div>
                </div>
            </section>
<?php  
        }  
    }
endif;

add_action('glowmag_top_header', 'glowmag_top_header', 10, 1);    

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

if (!function_exists('breadcrumb_type')) :

    function breadcrumb_type($post_id)
    {

        $breadcrumb_type = glowmag_get_option( 'breadcrumb_type' );

        if(  $breadcrumb_type == 'simple' )
        {

?>      

      <!--breadcrumb-->
        <section class="breadcrumb">
            <div class="container">
               <?php  breadcrumb_trail(); ?>
            </div>
        </section>
        <!--end breadcrumb-->    

<?php  
        }  
    }
endif;

add_action('breadcrumb_type', 'breadcrumb_type', 10, 1);    

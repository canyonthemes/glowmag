<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package GlowMag
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function glowmag_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	
	if ( ! is_singular() ) {
		
		$classes[] = 'hfeed';
	}

	// Add class for Sidebar
	$sidebar_position = glowmag_get_option( 'sidebar_position' );
	
		$classes[] = $sidebar_position;

	// Add class for boxed layout.
	$site_layout = glowmag_get_option( 'site_layout' );

	if( $site_layout == 'boxed' )

	{

		$classes[] = 'site-layout-boxed';

	}

	return $classes;
}

add_filter( 'body_class', 'glowmag_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function glowmag_pingback_header() {

	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'glowmag_pingback_header' );

/*
* Remove [...] from default fallback excerpt content
*
*/
function glowmag_excerpt_more( $more ) {
	if(is_admin())
	{
		return $more;
	}
	return '';
}
add_filter( 'excerpt_more', 'glowmag_excerpt_more');


/**
 * Change Excerpt Length.
 */
if( ! function_exists( 'glowmag_excerpt_length' ) ) :

	function glowmag_excerpt_length( $length ) {

		$excerpt_length = 40;

    if(!is_admin())
    {

		$length = glowmag_get_option( 'blog_excerpt_length' );

		if( !empty( $length ) )

		{
			$excerpt_length = $length;
		}
    }
		return $excerpt_length;
	}

	endif;

	add_filter( 'excerpt_length', 'glowmag_excerpt_length', 999 );

/**
 * Go to Top
 * @since GlowMag 1.0.0
 *
 * @param null
 * @return void
*/

if (!function_exists('glowmag_go_to_top' )) :
    function glowmag_go_to_top()
    {

    $go_to_top = glowmag_get_option( 'go_to_top' );
    if( $go_to_top == true ){
            ?>
            <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'glowmag'); ?>">
                    <span><?php echo esc_html_e('', 'glowmag');?> <i class="fa fa-arrow-up"></i></span>
            </a>
        <?php
    }
    }

add_action('glowmag_go_to_top_hook', 'glowmag_go_to_top', 20 );
endif;

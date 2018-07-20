<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package GlowMag
 */

get_header();

	/**
	 * Hook - breadcrumb_type.
	 *
	 * @hooked breadcrumb_type
	 */
	do_action( 'breadcrumb_type' );
?>
   <section class="content item-list">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content-column">
                	<header class="page-header">
					    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'glowmag' ); ?></h1>
				    </header><!-- .page-header -->
				    <div class="page-content">
				
				 	    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'glowmag' ); ?></p>

					</div><!-- .page-content -->

                </div>
                <div class="col-sm-3 col-md-3">	 
              	 <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
     </section>            

<?php get_footer();

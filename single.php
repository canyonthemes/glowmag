<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

  <!--content-->
    <section class="content author-post">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content-column">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'single'  );

					endwhile; // End of the loop.
					?>

				</div><!-- #page-content-column -->
				<div class="col-sm-3 col-md-3 page-sidebar-column">	 
                  
                                     <div class="sidebar-col">
                  
                                       <?php get_sidebar(); ?>
                  
                                      </div>
                                </div>    

		   </div><!-- #row -->

		</div>

	</section>	   

<?php

get_footer();

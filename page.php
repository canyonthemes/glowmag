<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GlowMag
 */

get_header(); 

/**
	 * Hook - breadcrumb_type.
	 *
	 * @hooked breadcrumb_type
	 */
	if(!is_front_page()){
	 do_action( 'breadcrumb_type' );
   } 
?>

 <section class="content item-list">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content-column">

					<?php
					
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						
						endif;

					endwhile; // End of the loop.
					?>

		       </div><!-- #div -->
		       <div class="col-sm-3 col-md-3 page-sidebar-column">	  
              	 
              	 <?php get_sidebar(); ?>
               
                </div>
	        </div><!-- #row -->
	    </div><!-- #row -->    
</section>
<?php
get_footer();

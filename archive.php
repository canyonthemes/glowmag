<?php
/**
 * The template for displaying archive pages
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
	do_action( 'breadcrumb_type' );
?>

<!--content-->
<section class="content item-list">
    <div class="container">
        <div class="row">
            <div class="col-md-9 page-content-column">

				<?php
				if ( have_posts() ) : ?>
				    <?php the_archive_title ( '<h4 class="page-title">', '</h4>' ) ?>

				   	<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
                </div>
			    <div class="col-sm-3 col-md-3 page-sidebar-column">	 
			        <div class="sidebar-col">	
              	        <?php get_sidebar(); ?>
              	    </div>    
                </div>
        </div>
    </div>
</section>
    <!-- content end-->              
<?php

get_footer();

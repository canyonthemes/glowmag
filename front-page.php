<?php
/**
 * The template for displaying all pages
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Canyon Themes
 * @subpackage GlowMag
 */
get_header();

$glowmag_hide_front_page_content = glowmag_get_option( 'hide_front_page' );

/*show widget in front page, now user are not force to use front page*/

if ( !is_home() ) 
{
   
 ?>
	<section class="content">
		    <div class="container">
		        <div class="row">
		            <div class="col-sm-9 col-md-9 ">
		            	<div class="content-col">
								<?php
								// hook to load breaking news
								do_action( 'glowmag_braeking_news' );

								// loading home page widget section
								dynamic_sidebar( 'home-page' );

								?>
						</div>
					</div>
					<div class="col-sm-3 col-md-3 page-sidebar-column">	 
					    <div class="sidebar-col">	

					      <?php get_sidebar(); ?>
					    
					    </div>
					</div>	
				    <?php 
				       if ( is_active_sidebar( 'watch-it' ) )
				       {
				       	
				       	// Loading watch it widget
					    dynamic_sidebar( 'watch-it' );
				    
				       }
					 ?>	
				</div>
			</div>
	</section>

<?php
}

if ('posts' == get_option( 'show_on_front' ) )
 {
   
     include( get_home_template() );
} 
else {

	 
    if ( $glowmag_hide_front_page_content != 1 )
     
     {
        include( get_page_template() );
        
     }
}


get_footer();

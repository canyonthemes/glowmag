<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CanyonNews
 */

 $show_search   = glowmag_get_option( 'show_search' );
 $site_identity = glowmag_get_option( 'site_identity' ); 
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('ct-sticky-sidebar'); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'glowmag' ); ?></a>

	<!--hook to load top header-->
	 <?php do_action('glowmag_top_header'); ?>
    <!--top bar end-->

    <!--header-->
    <section class="header">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-3">
		            <div class="site-branding">
						<?php
	 					
	 					if($site_identity == 'logo-only' )
	 					{

	 						the_custom_logo();

	 					}

	 					elseif( $site_identity == 'logo-desc' )
	 					{
	 						the_custom_logo();

	 						$description = get_bloginfo( 'description', 'display' );

	 						if ( $description || is_customize_preview() ) : ?>

	                            <p class="site-description"><?php echo $description; ?></p>

	                            <?php
	                        endif; 

	 					}

	 					else 
	 						{ ?>

		 						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

		 						<?php
		                           $description = get_bloginfo( 'description', 'display' );

		                         if ( $description || is_customize_preview() ) : ?>

		                            <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>

		                            <?php
		                         endif; 
	                        } ?>
	             
	              	</div><!-- .site-branding -->
              	</div>

	            <div class="col-sm-9 col-md-9 text-right">
	                <?php dynamic_sidebar( 'top-header-ads' ); ?>
	            </div>
	        </div>
	    </div>
	</section>
    <!--end header-->
    
    <!--navigation-->
    <section class="navigation">
	    <div class="container">
	        <!-- Static navbar -->
	        <nav class="navbar navbar-default yamm">
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle"> 
	                	<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'glowmag' ); ?></span> 
	                	<span class="icon-bar"></span> 
	                	<span class="icon-bar"></span> 
	                	<span class="icon-bar"></span> 
	                </button>
	            </div>
	            <div id="navbar" class="navbar-collapse">
                        <span class="nav-close">X</span>
	                <?php

	                	if (has_nav_menu('primary'))
	                	   {
			                    wp_nav_menu(array(
		                            'theme_location' => 'primary',
		                            'depth'          => 4,
		                            'menu_class'     => 'nav navbar-nav',
		                            'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
		                            'walker'         => new WP_Bootstrap_Navwalker()
			                        )
			                    );
			                }

                         if( $show_search == 1 )
			                
			                {
			                ?> 	
				                <ul class="nav navbar-nav navbar-right">
				                    <li>
				                        <form class="nav-search" action="<?php echo home_url( '/' ); ?>" method="get" id="searchform">
				                            <input type="text" name="s" id="s" class="form-control" placeholder=" <?php esc_html_e( 'Search For News', 'glowmag' ); ?>">
				                            <button type="submit" id="searchsubmit"  class="btn-submit"><i class="fa fa-search"></i></button>
				                        </form>
				                       
				                    </li>
				                </ul>
				                
				       <?php } ?>        
	            </div>
	            <!--/.nav-collapse -->
	        </nav>
	    </div>
	</section>
	<!--navigation end-->
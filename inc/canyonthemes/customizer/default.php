<?php
/**
 * Better Health default theme options.
 *
 * @package Canyon Themes
 * @subpackage CanmyonMag
 */

if ( !function_exists('glowmag_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function glowmag_get_default_theme_options()
    {

        $default = array();

       //primary color
    $default['primary_color']                   = '#00AEEF';

    //site identity
    $default['site_identity']                   = 'title-text';

    // general settings.
    $default['site_layout']                     = 'full-width';
    $default['hide_front_page']                 = false;
    
    // Header.
    $default['show_top_header']                 = false;
    $default['show_top_header_left_menu']       = true;
    $default['show_top_header_right_menu']      = true;
    

    // Main Navigation.
    $default['show_search']                                 = true;
    
    // Trending News

    $default['breaking_title']                  = esc_html__( 'Breaking News', 'glowmag' );
    $default['breaking_category_id']            = 0;
    $default['breaking_post_number']            = 5;
 
    // Breadcrumb.
    $default['breadcrumb_type']                 = 'simple';

           
    // Blog
    $default['sidebar_position']       = 'right-sidebar';
    $default['sticky_sidebar']         = true;
    $default['blog_excerpt_length']    = 40;
    $default['blog_show_date']         = true;
    $default['blog_show_author']       = true;
    $default['blog_show_post_time']    = true;
    $default['blog_show_category']     = true;
    $default['blog_show_comments']     = true;
    $default['blog_read_more']         = true;
    $default['blog_read_more_text']    = esc_html__( 'Read More', 'glowmag' );

    // Single 
    $default['show_featured_img']           = true;
    $default['single_show_date']            = true;
    $default['single_show_author']          = true;
    $default['single_show_post_time']       = true;
    $default['single_show_category']        = true;
    $default['single_show_tags']            = true;
    $default['single_show_comments']        = true;
    $default['single_show_author_info']     = true;
    $default['realated_post_txt']           = esc_html__( 'Related Post', 'glowmag' );

    // Footer.
    $default['copyright_text']         = wp_kses_post( '&copy; Copyright 2018. All Right Reserved.', 'glowmag' );
    // Footer.
    $default['go_to_top']                  = true;

        // Pass through filter.
        $default = apply_filters( 'glowmag_get_default_theme_options', $default );
        return $default;
    }
endif;

<?php
/**
 * GlowMag Options.
 *
 * @package GlowMag
 */

 
// Setting site primary color.
$wp_customize->add_setting( 'primary_color',
	array(
		'default'           => $default['primary_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'       => esc_html__( 'Primary Color', 'glowmag' ),
			'description' => esc_html__( 'Applied to main color of site.', 'glowmag' ),
			'section'     => 'colors',	
		)
	)
);

//Logo Options Setting Starts
$wp_customize->add_setting('site_identity',
 array(
	'default' 			=> $default['site_identity'],
	'sanitize_callback' => 'glowmag_sanitize_select'
	));

$wp_customize->add_control('site_identity',
 array(
	'type' 		        => 'radio',
	'label' 	        => esc_html__('Logo Options', 'glowmag'),
	'section' 	        => 'title_tagline',
	'choices' 	        => array(
		'logo-only' 	=> esc_html__('Logo Only', 'glowmag'),
		'title-text' 	=> esc_html__('Title + Tagline', 'glowmag'),
		'logo-desc' 	=> esc_html__('Logo + Tagline', 'glowmag')
		)
));

// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'glowmag' ),
		'priority'   => 100,
	)
);


// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
		'title'      => esc_html__( 'General Settings', 'glowmag' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting global_layout.
$wp_customize->add_setting( 'site_layout',
	array(
		'default'           => $default['site_layout'],
		'sanitize_callback' => 'glowmag_sanitize_select',
	)
);
$wp_customize->add_control( 'site_layout',
	array(
		'label'    => esc_html__( 'Site Layout', 'glowmag' ),
		'section'  => 'section_layout',
		'type'     => 'radio',
		'priority' => 100,
		'choices'  => array(
				'full-width'  => esc_html__( 'Full Width', 'glowmag' ),
				'boxed' => esc_html__( 'Boxed', 'glowmag' ),
			),
	)
);


// Setting Hide/Show page in Home Page.
$wp_customize->add_setting( 'hide_front_page',
	array(
		'default'           => $default['hide_front_page'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'hide_front_page',
	array(
		'label'    			=> esc_html__( 'Hide/Show Front Page', 'glowmag' ),
		'section'  			=> 'section_layout',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);


// Header Section.
$wp_customize->add_section( 'section_header',
	array(
		'title'      => esc_html__( 'Header Options', 'glowmag' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting show_top_header.
$wp_customize->add_setting( 'show_top_header',
	array(
		'default'           => $default['show_top_header'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_top_header',
	array(
		'label'    			=> esc_html__( 'Show Top Header', 'glowmag' ),
		'section'  			=> 'section_header',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);


// Setting show_top_header_left_menu.
$wp_customize->add_setting( 'show_top_header_left_menu',
	array(
		'default'           => $default['show_top_header_left_menu'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_top_header_left_menu',
	array(
		'label'    			=> esc_html__( 'Show Top Header Left Menu', 'glowmag' ),
		'section'  			=> 'section_header',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);


// Setting show_top_header_right_menu.
$wp_customize->add_setting( 'show_top_header_right_menu',
	array(
		'default'           => $default['show_top_header_right_menu'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_top_header_right_menu',
	array(
		'label'    			=> esc_html__( 'Show Top Header Right Social Link', 'glowmag' ),
		'section'  			=> 'section_header',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);



// Navigation Section.
$wp_customize->add_section( 'section_navigation',
	array(
		'title'      => esc_html__( 'Main Navigation Options', 'glowmag' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);


// Setting show search.
$wp_customize->add_setting( 'show_search',
	array(
		'default'           => $default['show_search'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);

$wp_customize->add_control( 'show_search',
	array(
		'label'    			=> esc_html__( 'Show Search Form', 'glowmag' ),
		'section'  			=> 'section_navigation',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);


// Breaking News.
$wp_customize->add_section( 'section_breaking_news',
	array(
		'title'      => esc_html__( 'Breaking News Options', 'glowmag' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);


// Setting breaking_title.
$wp_customize->add_setting( 'breaking_title',
	array(
		'default'           => $default['breaking_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'breaking_title',
	array(
		'label'    			=> esc_html__( 'Title', 'glowmag' ),
		'section'  			=> 'section_breaking_news',
		'type'     			=> 'text',
		'priority' 			=> 100,
	
	)
);

// Setting breaking_category_id.
$wp_customize->add_setting( 'breaking_category_id',
	array(
		'default'           => $default['breaking_category_id'],
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new GlowMag_Customize_Category_Control( $wp_customize, 'breaking_category_id',
		array(
			'label'           => esc_html__( 'Select Category', 'glowmag' ),
			'section'         => 'section_breaking_news',
		    'priority'        => 100,
		
		)
	)
);


// Setting breaking_post_number.
$wp_customize->add_setting( 'breaking_post_number',
	array(
		'default'           => $default['breaking_post_number'],
		'sanitize_callback' => 'glowmag_sanitize_number',
	)
);
$wp_customize->add_control( 'breaking_post_number',
	array(
		'label'           => esc_html__( 'Number of Posts', 'glowmag' ),
		'section'         => 'section_breaking_news',
		'type'            => 'number',
		'priority'        => 100,
		'input_attrs'     => array( 'min' => 1, 'max' => 15,),
	)
);




// Breadcrumb Section.
$wp_customize->add_section( 'section_breadcrumb',
	array(
		'title'      => esc_html__( 'Breadcrumb Options', 'glowmag' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb_type.
$wp_customize->add_setting( 'breadcrumb_type',
	array(
		'default'           => $default['breadcrumb_type'],
		'sanitize_callback' => 'glowmag_sanitize_select',
	)
);
$wp_customize->add_control( 'breadcrumb_type',
	array(
		'label'       => esc_html__( 'Breadcrumb Type', 'glowmag' ),
		'section'     => 'section_breadcrumb',
		'type'        => 'radio',
		'priority'    => 100,
		'choices'     => array(
			'disable' => esc_html__( 'Disable', 'glowmag' ),
			'simple'  => esc_html__( 'Simple', 'glowmag' ),
		),
	)
);




// Blog Section.
$wp_customize->add_section( 'section_blog',
	array(
		'title'      => esc_html__( 'Blog Options', 'glowmag' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting sidebar_position.
$wp_customize->add_setting( 'sidebar_position',
	array(
		'default'           => $default['sidebar_position'],
		'sanitize_callback' => 'glowmag_sanitize_select',
	)
);
$wp_customize->add_control( 'sidebar_position',
	array(
		'label'    => esc_html__( 'Sidebar Position', 'glowmag' ),
		'section'  => 'section_blog',
		'type'     => 'radio',
		'priority' => 100,
		'choices'  => array(
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'glowmag' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'glowmag' ),
			),
	)
);
// Setting sticky Sidebar.
$wp_customize->add_setting( 'sticky_sidebar',
	array(
		'default'           => $default['sticky_sidebar'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'sticky_sidebar',
	array(
		'label'    => esc_html__('Sticky Sidebar', 'glowmag' ),
		'section'  => 'section_blog',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);


// Setting excerpt_length.
$wp_customize->add_setting( 'blog_excerpt_length',
	array(
		'default'           => $default['blog_excerpt_length'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( 'blog_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length', 'glowmag' ),
		'description' => esc_html__( 'in words', 'glowmag' ),
		'section'     => 'section_blog',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 1, 'max' => 200),
	)
);


// Setting blog_show_date.
$wp_customize->add_setting( 'blog_show_date',
	array(
		'default'           => $default['blog_show_date'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'blog_show_date',
	array(
		'label'    			=> esc_html__( 'Show Posted Date', 'glowmag' ),
		'section'  			=> 'section_blog',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting blog_show_author.
$wp_customize->add_setting( 'blog_show_author',
	array(
		'default'           => $default['blog_show_author'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'blog_show_author',
	array(
		'label'    			=> esc_html__( 'Show Post Author', 'glowmag' ),
		'section'  			=> 'section_blog',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting blog_show_post_time.
$wp_customize->add_setting( 'blog_show_post_time',
	array(
		'default'           => $default['blog_show_post_time'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'blog_show_post_time',
	array(
		'label'    			=> esc_html__( 'Show Post Publish Time', 'glowmag' ),
		'section'  			=> 'section_blog',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);


// Setting blog_show_category.
$wp_customize->add_setting( 'blog_show_category',
	array(
		'default'           => $default['blog_show_category'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'blog_show_category',
	array(
		'label'    			=> esc_html__( 'Show Post Categories', 'glowmag' ),
		'section'  			=> 'section_blog',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting blog_show_comments.
$wp_customize->add_setting( 'blog_show_comments',
	array(
		'default'           => $default['blog_show_comments'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'blog_show_comments',
	array(
		'label'    			=> esc_html__( 'Show Comment Count', 'glowmag' ),
		'section'  			=> 'section_blog',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting blog_read_more.
$wp_customize->add_setting( 'blog_read_more',
	array(
		'default'           => $default['blog_read_more'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'blog_read_more',
	array(
		'label'    			=> esc_html__( 'Show Read More Button', 'glowmag' ),
		'section'  			=> 'section_blog',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting blog_read_more_text.
$wp_customize->add_setting( 'blog_read_more_text',
	array(
		'default'           => $default['blog_read_more_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'blog_read_more_text',
	array(
		'label'    => esc_html__( 'Read More Button Text', 'glowmag' ),
		'section'  => 'section_blog',
		'type'     => 'text',
		'priority' => 100,
		
	)
);


// Single Post Section.
$wp_customize->add_section( 'section_single_post',
	array(
		'title'      => esc_html__( 'Single Post Options', 'glowmag' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting show_featured_img.
$wp_customize->add_setting( 'show_featured_img',
	array(
		'default'           => $default['show_featured_img'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_featured_img',
	array(
		'label'    			=> esc_html__( 'Show Featured Image', 'glowmag' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting single_show_date.
$wp_customize->add_setting( 'single_show_date',
	array(
		'default'           => $default['single_show_date'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'single_show_date',
	array(
		'label'    			=> esc_html__( 'Show Posted Date', 'glowmag' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting single_show_author.
$wp_customize->add_setting( 'single_show_author',
	array(
		'default'           => $default['single_show_author'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'single_show_author',
	array(
		'label'    			=> esc_html__( 'Show Post Author', 'glowmag' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);


// Setting single_show_post_time.
$wp_customize->add_setting( 'single_show_post_time',
	array(
		'default'           => $default['single_show_post_time'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'single_show_post_time',
	array(
		'label'    			=> esc_html__( 'Show Post Publish Time', 'glowmag' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);



// Setting single_show_category.
$wp_customize->add_setting( 'single_show_category',
	array(
		'default'           => $default['single_show_category'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'single_show_category',
	array(
		'label'    			=> esc_html__( 'Show Post Categories', 'glowmag' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting single_show_comments.
$wp_customize->add_setting( 'single_show_comments',
	array(
		'default'           => $default['single_show_comments'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'single_show_comments',
	array(
		'label'    			=> esc_html__( 'Show Comment Count', 'glowmag' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting single_show_tags.
$wp_customize->add_setting( 'single_show_tags',
	array(
		'default'           => $default['single_show_tags'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'single_show_tags',
	array(
		'label'    			=> esc_html__( 'Show Post Tags', 'glowmag' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);


// Setting single_show_author_info.
$wp_customize->add_setting( 'single_show_author_info',
	array(
		'default'           => $default['single_show_author_info'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'single_show_author_info',
	array(
		'label'    			=> esc_html__( 'Show Author Information', 'glowmag' ),
		'section'  			=> 'section_single_post',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);


// Setting Related Post text.
$wp_customize->add_setting( 'realated_post_txt',
	array(
		'default'           => $default['realated_post_txt'],
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control( 'realated_post_txt',
	array(
		'label'    => esc_html__( 'Related Post Text', 'glowmag' ),
		'section'  => 'section_single_post',
		'type'     => 'text',
		'priority' => 100,
	)
);


// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
		'title'      => esc_html__( 'Footer Options', 'glowmag' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'copyright_text',
	array(
		'default'           => $default['copyright_text'],
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control( 'copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'glowmag' ),
		'section'  => 'section_footer',
		'type'     => 'text',
		'priority' => 100,
	)
);

// go to top.
$wp_customize->add_setting( 'go_to_top',
	array(
		'default'           => $default['go_to_top'],
		'sanitize_callback' => 'glowmag_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'go_to_top',
	array(
		'label'    => esc_html__( 'Go to top', 'glowmag' ),
		'section'  => 'section_footer',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

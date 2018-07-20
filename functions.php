<?php
/**
 * GlowMag functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GlowMag
 */

if ( ! function_exists( 'glowmag_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function glowmag_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on GlowMag, use a find and replace
		 * to change 'glowmag' to the name of your theme in all the template files.
		 */
		
        load_theme_textdomain( 'glowmag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'home-slider', 819, 409, true );
	    //add_image_size( 'blog-listing', 848, 565, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'glowmag' ),
			'top-header' => esc_html__( 'Top Header', 'glowmag' ),
			'social-link' => esc_html__( 'Social Link', 'glowmag' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'glowmag_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'glowmag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function glowmag_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'glowmag_content_width', 640 );
}
add_action( 'after_setup_theme', 'glowmag_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function glowmag_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'glowmag' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'glowmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Page Widget Section', 'glowmag' ),
		'id'            => 'home-page',
		'description'   => esc_html__( 'Add Advertisement widgets here.', 'glowmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Top header Ads Section', 'glowmag' ),
		'id'            => 'top-header-ads',
		'description'   => esc_html__( 'Add Advertisement widgets here.', 'glowmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'DONT MISS IT Section', 'glowmag' ),
		'id'            => 'watch-it',
		'description'   => esc_html__( 'Add Advertisement widgets here.', 'glowmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	register_sidebar(array(
        'name' => esc_html__( 'Footer 1', 'glowmag' ),
        'id' => 'footer-1',
        'description' => esc_html__( 'Add widgets here.', 'glowmag' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__( 'Footer 2', 'glowmag' ),
        'id' => 'footer-2',
        'description' => esc_html__( 'Add widgets here.', 'glowmag' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__( 'Footer 3', 'glowmag' ),
        'id' => 'footer-3',
        'description' => esc_html__( 'Add widgets here.', 'glowmag' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));


    register_sidebar(array(
        'name' => esc_html__( 'Footer 4', 'glowmag' ),
        'id' => 'footer-4',
        'description' => esc_html__( 'Add widgets here.', 'glowmag' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));


}
add_action( 'widgets_init', 'glowmag_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function glowmag_scripts() {

	/*Bootstrap*/
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/third-party/css/bootstrap.min.css' );

    /*Flexslider*/
    wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/assets/third-party/css/flexslider.css' );

     /*Owl carousel*/
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/third-party/css/owl.carousel.css' );

     /*Animate*/
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/third-party/css/animate.css' );

      /*Owl-theme*/
    wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/assets/third-party/css/owl.theme.css' );

       /*Font-awesome*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/third-party/css/font-awesome.min.css' );
    /*google font  */
     wp_enqueue_style( 'glowmag-googleapis', 'https://fonts.googleapis.com/css?family=Hind', array(), null );

	wp_enqueue_style( 'glowmag-style', get_stylesheet_uri() );

	 /* bootstrap */
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/third-party/js/bootstrap.min.js', array( 'jquery' ), '20151215', true );

	 /* flexslider */
 	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/assets/third-party/js/jquery.flexslider-min.js', array( 'jquery' ), '20151215', true );

 	/* owl-carousel */
 	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/third-party/js/owl.carousel.js', array( 'jquery' ), '20151215', true );

 	/* wow */
 	wp_enqueue_script( 'owl', get_template_directory_uri() . '/assets/third-party/js/wow.min.js', array( 'jquery' ), '20151215', true );

 	/* sticky sidebar */
 	if( true == glowmag_get_option( 'sticky_sidebar' )){ 
 		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/third-party/js/theia-sticky-sidebar.js', array( 'jquery' ), '20151215', true );
 	}

 	/* Custom js*/
 	wp_enqueue_script( 'cusotm', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), time(), true );

	wp_enqueue_script( 'glowmag-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array( 'jquery' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'glowmag_scripts' );


/**
 * Implement the default Function.
 */
require get_template_directory() . '/inc/canyonthemes/customizer/default.php';


/**
 * Core Function
 */
require get_template_directory() . '/inc/canyonthemes/customizer/core-function.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Bootstrap Navwalder class.
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';


/**
 * Loading Top Header section hook file
 */
require get_template_directory() . '/inc/canyonthemes/hooks/section-top-header.php';


/**
 * Loading Breaking news hook file
 */
require get_template_directory() . '/inc/canyonthemes/hooks/section-breaking-news.php';

/**
 * Loading Breadcrumbs hook file
 */
require get_template_directory() . '/inc/canyonthemes/hooks/page-breadcrumbs.php';


/**
	 * Loading Slider Widget
	 */
	require get_template_directory() . '/inc/canyonthemes/widgets/slider-widget.php';


/**
	 * Loading Feature Column Widget
	 */
	require get_template_directory() . '/inc/canyonthemes/widgets/featured-column-news.php';	

/**
	 * Loading Multi Column Widget
	 */
	require get_template_directory() . '/inc/canyonthemes/widgets/multi-column-widget.php';	

/**
	 * Loading Watch it  Widget
	 */
	require get_template_directory() . '/inc/canyonthemes/widgets/watch-it-widget.php';


/**
	 * Loading Recent Post Widget
	 */
	require get_template_directory() . '/inc/canyonthemes/widgets/recent-post-widget.php';	


/**
	 * Loading Recent Post Widget
	 */
	require get_template_directory() . '/inc/canyonthemes/widgets/popular-post-widget.php';	

/**
 * Loading Breadcrumbs
 */
require get_template_directory() . '/inc/library/breadcrumbs/breadcrumbs.php';


/**
 * Dynamic css	 */
require get_template_directory() . '/inc/canyonthemes/hooks/dynamic-css.php';


/**
 * Load about.
 */
if ( is_admin() ) {
   
include get_template_directory() . '/inc/canyonthemes/about/about.php';
include get_template_directory() . '/inc/canyonthemes/about/class-about.php';
}

/**
 * Load tgm for this theme
 */
require get_template_directory() . '/inc/library/tgm/class-tgm-plugin-activation.php';

/**
 * Plugin recommendation using TGM
*/
require get_template_directory() . '/inc/canyonthemes/hooks/tgm.php';
/**
 * Dummy File Load 
*/
require get_template_directory() . '/inc/canyonthemes/dummy-data/dummy-file.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
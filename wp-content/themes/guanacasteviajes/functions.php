<?php
require_once 'mix.php';
/**
 * guanacasteviajes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package guanacasteviajes
 */

if ( ! function_exists( 'guanacasteviajes_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function guanacasteviajes_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on guanacasteviajes, use a find and replace
		 * to change 'guanacasteviajes' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'guanacasteviajes', get_template_directory() . '/languages' );

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

		add_image_size( 'tour-gallery', 1920, 1080, true );
		//add_image_size( 'tour-slider-gallery', 256, 150, true );
		add_image_size( 'tour-slider-gallery', 512, 300, true );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header' => esc_html__( 'Header', 'guanacasteviajes' ),
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
		add_theme_support( 'custom-background', apply_filters( 'guanacasteviajes_custom_background_args', array(
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
add_action( 'after_setup_theme', 'guanacasteviajes_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function guanacasteviajes_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'guanacasteviajes_content_width', 640 );
}
add_action( 'after_setup_theme', 'guanacasteviajes_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function guanacasteviajes_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'guanacasteviajes' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'guanacasteviajes' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'guanacasteviajes_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function guanacasteviajes_scripts() {
	// wp_enqueue_style( 'guanacasteviajes-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'guanacasteviajes-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'guanacasteviajes-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script('guanacasteviajes-fas', get_template_directory_uri() . '/fonts/js/solid.min.js', array(), '20180804', true);
	wp_enqueue_script('guanacasteviajes-fab', get_template_directory_uri() . '/fonts/js/brands.min.js', array(), '20180804', true);
	wp_enqueue_script('guanacasteviajes-fa', get_template_directory_uri() . '/fonts/js/fontawesome.min.js', array(), '20180804', true);
	wp_enqueue_style( 'guanacasteviajes-style', mix( 'style.css') );
	wp_enqueue_script('guanacasteviajes-bundle', mix( '/js/app.js' ), array(), false, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'guanacasteviajes_scripts' );


add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

function add_taxonomy_controller($controllers) {
  $controllers[] = 'Taxonomy';
  return $controllers;
}
add_filter('json_api_controllers', 'add_taxonomy_controller');

function set_taxonomy_controller_path() {
  return get_stylesheet_directory() . '/json-api-taxonomy-index.php';
}
add_filter('json_api_taxonomy_controller_path', 'set_taxonomy_controller_path');

function word_count($string, $limit) {
 
	$words = explode(' ', $string);
 
	return implode(' ', array_slice($words, 0, $limit)). '...';
 
}

function add_query_vars_filter($vars)
{
	$vars[] = "q";
	$vars[] = "dateStart";
	$vars[] = "dateEnd";
	return $vars;
}

function add_specific_menu_location_atts( $atts, $item, $args ) {
    // check if the item is in the primary menu
    // if( $args->theme_location == 'primary' ) {
      // add the desired attributes:
      $atts['class'] = 'no-underline text-black block py-2 px-3 sm:px-2 lg:px-4'; // anchor
   // }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );

add_filter('query_vars', 'add_query_vars_filter');

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Implement the Woocommerce.
 */
require get_template_directory() . '/inc/wc.php';


/**
 * Implement the CPT.
 */
 require get_template_directory() . '/inc/cpt.php';


<?php
/**
 * EPS Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eps_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

//Set up Custom Fields specific to theme
require_once dirname( __FILE__ ) . '/inc/custom-content/post-types.php';
require_once dirname( __FILE__ ) . '/inc/custom-content/custom-fields.php';

// Allow SVG
function upload_svg_files( $allowed ) {
    if ( !current_user_can( 'manage_options' ) )
        return $allowed;
    $allowed['svg'] = 'image/svg+xml';
    return $allowed;
}
add_filter( 'upload_mimes', 'upload_svg_files');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eps_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on EPS Theme, use a find and replace
		* to change 'eps_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'eps_theme', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'eps_theme' ),
			'side-menu' => esc_html__( 'Side Menu', 'eps_theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'eps_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'eps_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eps_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eps_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'eps_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eps_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'eps_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'eps_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'eps_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function eps_theme_scripts() {
	//Main Theme Styles.CSS
	wp_enqueue_style( 'theme_styles', get_stylesheet_directory_uri() . '/css/style.css', array(), date('H:i') ); 
	wp_style_add_data( 'theme_styles', 'rtl', 'replace' );

	//Animate Library
	wp_enqueue_style('animate-library', get_stylesheet_directory_uri() .'/css/animate.min.css', false); 

	//WOW Animation local JS file
	wp_enqueue_script( 'wow-scripts', get_stylesheet_directory_uri() . '/js/wow.min.js', array('jquery') );

	// fonts from Folder
	wp_enqueue_style('custom-site-fonts', get_stylesheet_directory_uri() .'/assets/fonts/fonts.css', false);

	//Swiper (slider) CSS file
	wp_enqueue_style( 'swiper-style', get_stylesheet_directory_uri() . '/css/swiper-bundle.min.css', array() );

	//Swiper local JS file
	wp_enqueue_script( 'swiper-scripts', get_stylesheet_directory_uri() . '/js/swiper-bundle.min.js', array('jquery') );

	//Bootstrap local JS file
	wp_enqueue_script( 'bootstrap-scripts', get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery') );

	//Counter Script
	wp_enqueue_script('counter-script', get_template_directory_uri() . '/js/counter.js', array('jquery'), null, true);

	//Masonry local JS file
	// wp_enqueue_script( 'masonry-scripts', get_stylesheet_directory_uri() . '/js/masonry-layout.min.js', array('jquery') ); 

	//GSAP CDN
	// wp_enqueue_script( 'gsap-scripts', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array('jquery') );
	
	//Text Plugin CDN
	// wp_enqueue_script( 'text-plugin-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/TextPlugin.min.js', array('jquery') );
	
	//Main JS
	wp_enqueue_script( 'EPS_Theme-mainjs', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), _S_VERSION, true );

	//Navigation JS
	wp_enqueue_script( 'eps_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eps_theme_scripts' );

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

//Adding ACF Display Titles
add_filter('acf/fields/flexible_content/layout_title', 'custom_flexible_content_layout_title', 10, 4);

function custom_flexible_content_layout_title($title, $field, $layout, $i) {
    // Get the value of a sub-field within the layout
    $section_title = get_sub_field('section_title'); // Change this to match your field name

    // If the field has a value, modify the title
    if ($section_title) {
        return $section_title; // Replaces the default title with the field value
    }

    return $title; // Default fallback if no value is set
}
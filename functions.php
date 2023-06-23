<?php
/**
 * intuito-renovation functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package intuito-renovation
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function intuito_renovation_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on intuito-renovation, use a find and replace
		* to change 'intuito-renovation' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'intuito-renovation', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'intuito-renovation' ),
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
			'intuito_renovation_custom_background_args',
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
add_action( 'after_setup_theme', 'intuito_renovation_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function intuito_renovation_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'intuito_renovation_content_width', 640 );
}
add_action( 'after_setup_theme', 'intuito_renovation_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function intuito_renovation_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'intuito-renovation' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'intuito-renovation' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'intuito_renovation_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
// function intuito_renovation_scripts() {
// 	wp_enqueue_style( 'intuito-renovation-style', get_stylesheet_uri(), array(), _S_VERSION );
// 	wp_style_add_data( 'intuito-renovation-style', 'rtl', 'replace' );

// 	wp_enqueue_script( 'intuito-renovation-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

// 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 		wp_enqueue_script( 'comment-reply' );
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'intuito_renovation_scripts' );

function intuito_renovation_styles() {
    // Подключение стилей  темы
    wp_enqueue_style( 'intuito_renovation-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.1', 'all' );
	wp_enqueue_style( 'intuito_renovation-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(),  '1.0.1', 'all');
	wp_enqueue_style( 'intuito_renovation-jquery.fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.css', array(),  '1.0.1', 'all' );
	wp_enqueue_style( 'intuito_renovation-animate', get_template_directory_uri() . '/assets/css/animate.css', array(),  '1.0.1', 'all' );
	wp_enqueue_style( 'intuito_renovation-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(),  '1.0.1', 'all' );
	wp_enqueue_style( 'intuito_renovation-bootstrap.min', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0.1', 'all' );
}
add_action( 'wp_enqueue_scripts', 'intuito_renovation_styles' );

  // Подключение вашего скрипта
function intuito_renovation_scripts() {
	wp_enqueue_script( 'intuito-renovation-jquery.min', get_template_directory_uri() . '/assets/js/jquery.min.js',  array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'intuito-renovation-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js',  array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'intuito-renovation-bootstrap.min', get_template_directory_uri() . '/assets/js/bootstrap.min.js',  array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'intuito-renovation-classie', get_template_directory_uri() . '/assets/js/classie.js',  array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'intuito-renovation-jquery.easing.1.3', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js',  array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'intuito-renovation-jquery.fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.js',  array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'intuito-renovation-jquery.form', get_template_directory_uri() . '/assets/js/jquery.form.js',  array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'intuito-renovation-jquery.validate.pack', get_template_directory_uri() . '/assets/js/jquery.validate.pack.js',  array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'intuito-renovation-modernizr.custom', get_template_directory_uri() . '/assets/js/modernizr.custom.js',  array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'intuito-renovation-npm', get_template_directory_uri() . '/assets/js/npm.js',  array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'intuito-renovation-readmore', get_template_directory_uri() . '/assets/js/readmore.js',  array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'intuito-renovation-ressite', get_template_directory_uri() . '/assets/js/ressite.js',  array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'intuito-renovation-scrollorama', get_template_directory_uri() . '/assets/js/scrollorama.js',  array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'intuito-renovation-slick', get_template_directory_uri() . '/assets/js/slick.js',  array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'intuito-renovation-wow', get_template_directory_uri() . '/assets/js/wow.js',  array( 'jquery' ), '1.0', true );


}
add_action( 'wp_enqueue_scripts', 'intuito_renovation_scripts' );



function intuito_renovation_register_post_type_services() {
    $labels = array(
        'name'              => esc_html_x( 'Services', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => esc_html_x( 'Services', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => esc_html__( 'Search services', 'textdomain' ),
        'all_items'         => esc_html__( 'All services', 'textdomain' ),
        'parent_item'       => esc_html__( 'Parent services', 'textdomain' ),
        'parent_item_colon' => esc_html__( 'Parent services:', 'textdomain' ),
        'edit_item'         => esc_html__( 'Edit services', 'textdomain' ),
        'update_item'       => esc_html__( 'Update services', 'textdomain' ),
        'add_new_item'      => esc_html__( 'Add New services', 'textdomain' ),
        'new_item_name'     => esc_html__( 'New Model services', 'textdomain' ),
        'menu_name'         => esc_html__( 'Services', 'textdomain' ),
    );
 
    $args = [
        'label' => esc_html__('Services', 'services'),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-buddicons-topics',
        'supports' => [
            'title',
            'editor',
            'thumbnail',
           
			
        ],
            'rewrite' => array( 'slug' => 'services'),
    ];

    register_post_type('Services', $args);
}
add_action('init', 'intuito_renovation_register_post_type_services');

unset($args);

function intuito_renovation_register_post_type_portfolio() {
    $labels = array(
        'name'              => esc_html_x( 'Portfolio', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => esc_html_x( 'Portfolio', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => esc_html__( 'Search Portfolio', 'textdomain' ),
        'all_items'         => esc_html__( 'All Portfolio', 'textdomain' ),
        'parent_item'       => esc_html__( 'Parent Portfolio', 'textdomain' ),
        'parent_item_colon' => esc_html__( 'Parent Portfolio:', 'textdomain' ),
        'edit_item'         => esc_html__( 'Edit Portfolio', 'textdomain' ),
        'update_item'       => esc_html__( 'Update Portfolio', 'textdomain' ),
        'add_new_item'      => esc_html__( 'Add New Portfolio', 'textdomain' ),
        'new_item_name'     => esc_html__( 'New Model Portfolio', 'textdomain' ),
        'menu_name'         => esc_html__( 'Portfolio', 'textdomain' ),
    );

    $args = array(
        'label' => esc_html__('Portfolio', 'textdomain'),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-images-alt',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
        ),
        'rewrite' => array( 'slug' => 'portfolio' ),
    );

    register_post_type('portfolio', $args);
}
add_action('init', 'intuito_renovation_register_post_type_portfolio');

unset($args);

function intuito_renovation_register_post_type_news() {
    $labels = array(
        'name'              => esc_html_x( 'NEWS', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => esc_html_x( 'NEWS', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => esc_html__( 'Search news', 'textdomain' ),
        'all_items'         => esc_html__( 'All news', 'textdomain' ),
        'parent_item'       => esc_html__( 'Parent news', 'textdomain' ),
        'parent_item_colon' => esc_html__( 'Parent news:', 'textdomain' ),
        'edit_item'         => esc_html__( 'Edit news', 'textdomain' ),
        'update_item'       => esc_html__( 'Update news', 'textdomain' ),
        'add_new_item'      => esc_html__( 'Add New news', 'textdomain' ),
        'new_item_name'     => esc_html__( 'New Model news', 'textdomain' ),
        'menu_name'         => esc_html__( 'NEWS', 'textdomain' ),
    );

    $args = array(
        'label' => esc_html__('News', 'textdomain'),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-page',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
        ),
        'rewrite' => array( 'slug' => 'news' ),
    );

    register_post_type('news', $args);
}
add_action('init', 'intuito_renovation_register_post_type_news');




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


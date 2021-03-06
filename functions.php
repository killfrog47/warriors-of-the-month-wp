<?php
/**
 * Warriors of the month functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Warriors_of_the_month
 */

if ( ! function_exists( 'warriors_of_the_month_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function warriors_of_the_month_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Warriors of the month, use a find and replace
	 * to change 'warriors-of-the-month' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'warriors-of-the-month', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'warriors-of-the-month' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'warriors_of_the_month_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );
}
endif;
add_action( 'after_setup_theme', 'warriors_of_the_month_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function warriors_of_the_month_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'warriors_of_the_month_content_width', 640 );
}
add_action( 'after_setup_theme', 'warriors_of_the_month_content_width', 0 );

function clean_custom_menus() {
	$menu_name = 'primary'; // specify custom menu slug
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		$menu_list = '<nav>' ."\n";
		$menu_list .= '<ul class="desktop">' ."\n";
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= '<a href="'. $url .'"><li>'. $title .'</li></a>' ."\n";
		}
		$menu_list .= '</ul>' ."\n";
		$menu_list .= "<div class='mobileNav'><div class='mobile-hamburger'><span></span></div>";
		$menu_list .= '<ul class="mobile">' ."\n";
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= '<a href="'. $url .'"><li>'. $title .'</li></a>' ."\n";
		}
		$menu_list .= '</ul></div>' ."\n";
		$menu_list .= '</nav>' ."\n";
	} else {
		$menu_list = '<!-- no list defined -->';
	}
	echo $menu_list;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function warriors_of_the_month_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'warriors-of-the-month' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action('get_header', 'my_filter_head');

function my_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action( 'widgets_init', 'warriors_of_the_month_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function warriors_of_the_month_scripts() {
	wp_enqueue_style( 'warriors-of-the-month-style', get_stylesheet_uri() );

	wp_enqueue_style( 'warriors-of-the-month-custom-style', get_template_directory_uri() . '/assets/css/masterstyle.css' );

	wp_enqueue_style( 'warriors-of-the-month-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' );

	wp_enqueue_style( 'warriors-of-the-month-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );

	wp_enqueue_script( 'warriors-of-the-month-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js' );

	wp_enqueue_script( 'warriors-of-the-month-main-js', get_template_directory_uri() . '/js/main.js' );

	wp_enqueue_script( 'warriors-of-the-month-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'warriors-of-the-month-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'warriors_of_the_month_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

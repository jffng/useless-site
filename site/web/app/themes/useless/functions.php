<?php
/**
 * useless functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package useless
 */

if ( ! function_exists( 'useless_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function useless_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on useless, use a find and replace
	 * to change 'useless' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'useless', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'useless' ),
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
	add_theme_support( 'custom-background', apply_filters( 'useless_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // useless_setup
add_action( 'after_setup_theme', 'useless_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function useless_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'useless_content_width', 640 );
}
add_action( 'after_setup_theme', 'useless_content_width', 0 );


/**
 * Add custom post types
 *
 */

function my_custom_post_thing() {
  $labels = array(
    'name'               => _x( 'Things', 'post type general name' ),
    'singular_name'      => _x( 'Thing', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'thing' ),
    'add_new_item'       => __( 'Add New Thing' ),
    'edit_item'          => __( 'Edit Thing' ),
    'new_item'           => __( 'New Thing' ),
    'all_items'          => __( 'All Things' ),
    'view_item'          => __( 'View Things' ),
    'search_items'       => __( 'Search Things' ),
    'not_found'          => __( 'No things found' ),
    'not_found_in_trash' => __( 'No things found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Things'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'All the things',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'things', $args ); 
}
add_action( 'init', 'my_custom_post_thing' );

/** make the homepage the "things" page **/
function wpsites_home_page_cpt_filter($query) {
  if ( !is_admin() && $query->is_main_query() && is_home() ) {
    $query->set('post_type', array( 'things' ) );
  }
}

add_action('pre_get_posts','wpsites_home_page_cpt_filter');
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function useless_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'useless' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'useless_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function useless_scripts() {
	wp_enqueue_style( 'useless-style', get_stylesheet_uri() );

	wp_enqueue_script( 'useless-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'useless-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'useless_scripts' );

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

add_filter( 'rwmb_meta_boxes', 'useless_register_meta_boxes'  );

function useless_register_meta_boxes( $meta_boxes  ) {
  $meta_boxes[] = array(
    'title'      => __( 'Details', 'textdomain'  ),
    'post_types' => array('post','things'),
    'fields'     => array(
                      array(
                        'id'   => 'thing_author',
                        'name' => __( 'Who Made This Thing', 'textdomain'  ),
                        'type' => 'text',
                      ),
                      array(
                      'id'   => 'link',
                      'name' => __( 'Link to the Thing', 'textdomain'  ),
                      'type' => 'text',
                      ),
                      array(
                      'id'   => 'tagline',
                      'name' => __( 'Tagline', 'textdomain'  ),
                      'type' => 'text',
                      ),
                    ),
    );
    return $meta_boxes;
}

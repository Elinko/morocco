<?php
/**
 * morocco functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package morocco
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
function morocco_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on morocco, use a find and replace
		* to change 'morocco' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'morocco', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'morocco' ),
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
			'morocco_custom_background_args',
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
add_action( 'after_setup_theme', 'morocco_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function morocco_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'morocco_content_width', 640 );
}
add_action( 'after_setup_theme', 'morocco_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function morocco_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'morocco' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'morocco' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'morocco_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function morocco_scripts() {
	wp_enqueue_style( 'morocco-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'morocco-style', 'rtl', 'replace' );

	wp_enqueue_script( 'morocco-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'morocco_scripts' );

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
 * Vycistenie headeru
 */
function roots_head_cleanup() {
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
  
	// REMOVE WP EMOJI
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
  
	// filter to remove TinyMCE emojis
	add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce' );
  
	add_filter( 'emoji_svg_url', '__return_false' );                        // remove dns-prefetch s.w.org
  
	remove_action( 'wp_head', 'feed_links_extra', 3 );                      // Category Feeds
	remove_action( 'wp_head', 'feed_links', 2 );                            // Post and Comment Feeds
	remove_action( 'wp_head', 'rsd_link' );                                 // EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' );                         // Windows Live Writer
	remove_action( 'wp_head', 'index_rel_link' );                           // index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );              // previous link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );               // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );   // Links for Adjacent Posts
	remove_action( 'wp_head', 'wp_generator' );                             // WP version
	// remove_action('wp_head', 'rel_canonical');
	remove_action('wp_head', 'wp_resource_hints', 2 );
  
  
	// Remove the REST API lines from the HTML Header
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
  
	// Remove the REST API endpoint.
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
  
	// Turn off oEmbed auto discovery.
	add_filter( 'embed_oembed_discover', '__return_false' );
  
	// Don't filter oEmbed results.
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
  
	// Remove oEmbed discovery links.
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
  
	// Remove oEmbed-specific JavaScript from the front-end and back-end.
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
  
	// Remove all embeds rewrite rules.
	// toto sposobuje chybu v admine - trvale odkazy
	//add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
  
	if (!is_admin()) {
		//wp_deregister_script('jquery');                   // De-Register jQuery
		//wp_register_script('jquery', '', '', '', true);   // Register as 'empty', because we manually insert our script in header.php
	}
  
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  
	add_filter('use_default_gallery_style', '__return_null');
  
  
  
  }
  add_action('init', 'roots_head_cleanup');

  add_theme_support( 'automatic-feed-links' );

  add_theme_support( 'post-thumbnails' );

  // Remove WP JS Embed script
function deregister_wp_scripts(){
	wp_deregister_script('wp-embed');
  }
  add_action('wp_footer', 'deregister_wp_scripts');


function create_posttypinspiration() {

	register_post_type('inspiracie',
	// CPT Options
	  array(
		'labels' => array(
		  'name' => __( 'Inšpirácie'),
		  'singular_name' => __( 'Inšpirácie'),
		  'menu_name' => __( 'Inšpirácie', 'morocco' ),
		  'parent_item_colon'   => __( 'Parent Inšpirácie', 'morocco' ),
		  'all_items'           => __( 'Všetky Inšpirácie', 'morocco' ),
		  'view_item'           => __( 'Otvor Inšpirácie', 'morocco' ),
		  'add_new_item'        => __( 'Pridať Inšpirácie', 'morocco' ),
		  'add_new'             => __( 'Pridať novú', 'morocco' ),
		  'edit_item'           => __( 'Edit news', 'morocco' ),
		  'update_item'         => __( 'Update news', 'morocco' ),
		  'search_items'        => __( 'Search news', 'morocco' ),
		  'not_found'           => __( 'Not Found', 'morocco' ),
		  'not_found_in_trash'  => __( 'Not found in Trash', 'morocco' ),
		),
		'public' => true,
		'rewrite' => array('slug' => 'inspiracie'),
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'hierarchical'        => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 21,
		'can__xport'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
	  	)
	);
 
  
  }
  // Hooking up our function to theme setup
  add_action( 'init', 'create_posttypinspiration' );


  function my_taxonomies_Inspiration() {
	$labels = array(
	  'name'              => _x( 'Kategorie', 'taxonomy general name' ),
	  'singular_name'     => _x( 'Kategorie', 'taxonomy singular name' ),
	  'search_items'      => __( 'Search Inspiration Categories' ),
	  'all_items'         => __( 'All Inspiration Categories' ),
	  'parent_item'       => __( 'Parent Inspiration Category' ),
	  'parent_item_colon' => __( 'Parent Inspiration Category:' ),
	  'edit_item'         => __( 'Edit Inspiration Category' ), 
	  'update_item'       => __( 'Update Inspiration Category' ),
	  'add_new_item'      => __( 'Add New Inspiration Category' ),
	  'new_item_name'     => __( 'New Inspiration Category' ),
	  'menu_name'         => __( 'Kategorie' ),
	);
	$args = array(
	  'labels' => $labels,
	  'hierarchical' => true,
	);
	register_taxonomy( 'Inspiration_category', 'inspiracie', $args );
  }
  add_action( 'init', 'my_taxonomies_Inspiration', 0 );


  function create_posttypezajazd() {
 

	  register_post_type('zajazdy',
	  // CPT Options
		array(
		  'labels' => array(
			'name' => __( 'Zájazdy'),
			'singular_name' => __( 'Zájazdy'),
			'menu_name' => __( 'Zájazdy', 'morocco' ),
			'parent_item_colon'   => __( 'Parent Zájazdy', 'morocco' ),
			'all_items'           => __( 'Všetky Zájazdy', 'morocco' ),
			'view_item'           => __( 'Otvor Zájazdy', 'morocco' ),
			'add_new_item'        => __( 'Pridať  zájazd', 'morocco' ),
			'add_new'             => __( 'Pridať nový', 'morocco' ),
			'edit_item'           => __( 'Edit news', 'morocco' ),
			'update_item'         => __( 'Update news', 'morocco' ),
			'search_items'        => __( 'Search news', 'morocco' ),
			'not_found'           => __( 'Not Found', 'morocco' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'morocco' ),
		  ),
		  'public' => true,
		  'rewrite' => array('slug' => 'zajazdy'),
		  'supports' => array( 'title', 'editor','thumbnail'),
		  'hierarchical'        => false,
		  'show_ui'             => true,
		  'show_in_menu'        => true,
		  'show_in_nav_menus'   => true,
		  'show_in_admin_bar'   => false,
		  'menu_position'       => 21,
		  'can__xport'          => true,
		  'has_archive'         => false,
		  'exclude_from_search' => false,
		  'publicly_queryable'  => true, 
		)
	);
  
  }
  // Hooking up our function to theme setup
  add_action( 'init', 'create_posttypezajazd' );

  function my_taxonomies_zajazdy() {
	$labels = array(
	  'name'              => _x( 'Kategorie', 'taxonomy general name' ),
	  'singular_name'     => _x( 'Kategorie', 'taxonomy singular name' ),
	  'search_items'      => __( 'Search Zájazdy Categories' ),
	  'all_items'         => __( 'All Zájazdy Categories' ),
	  'parent_item'       => __( 'Parent Zájazdy Category' ),
	  'parent_item_colon' => __( 'Parent Zájazdy Category:' ),
	  'edit_item'         => __( 'Edit Zájazdy Category' ), 
	  'update_item'       => __( 'Update Zájazdy Category' ),
	  'add_new_item'      => __( 'Add New Zájazdy Category' ),
	  'new_item_name'     => __( 'New Zájazdy Category' ),
	  'menu_name'         => __( 'Kategorie' ),
	);
	$args = array(
	  'labels' => $labels,
	  'hierarchical' => true,
	);
	register_taxonomy( 'zajazdy_category', 'zajazdy', $args );
  }
  add_action( 'init', 'my_taxonomies_zajazdy', 0 );



// Walker na zobrazovanie menu ... toto nemenit, spravene tak aby sa menu zobrazovali podla bootstrapu
class own_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
		$object = $item->object;
		$type = $item->type;
		$title = $item->title;
		$permalink = $item->url;
		$curent =$item->curent;
		$class_names = $value = '';
	
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	
		$classes[] = 'menu-item-' . $item->ID;
	
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		if (strpos($class_names, 'current') !== false){
			$class_names ='active';
		} else {
			$class_names =' ';
		}
	
  
	  /* if ($curent = 1) {
		  $liclass = ' nav-item active ';
	  } else {
		  $liclass = ' nav-item ';
	  }*/
  
	  $output .= "<li class='nav-item ".esc_attr($class_names)." ' >";
  
	  $output .= '<a href="' . $permalink . '" class="nav-link">';
  
	  $output .= $title;
  
	  $output .= '</a>';
	}
  }
   
  include('inc/languages.php') ;
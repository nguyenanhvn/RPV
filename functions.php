<?php
/**
 * default functions and definitions
 *
 * @package 3conn
 * @subpackage default
 * @since 1.0.0
 */
define( 'THEME_URL',get_template_directory() );
define( 'CORE', THEME_URL . "/core");

require_once( CORE . "/init.php" );
require_once( CORE . "/custom-post-type.php" );
require_once( CORE . "/metabox.php" );
require_once( CORE . "/custom-dashboard.php" );
include_once( CORE . '/polylang-template.php' );
include_once( CORE . '/breadcrumbs.php' );
include_once( CORE . '/shortcode.php' );
include_once( CORE . '/pagination.php' );
/**
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function searchRequestFilter( $query_vars ) {
	if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
		$query_vars['s'] = " ";
	}
	return $query_vars;
}

add_filter( 'request', 'searchRequestFilter' );

function default_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
	);

	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( '685x480', 685, 480, array('center','center') );
	add_image_size( '570x290', 570, 290, array('center','center'), true );
	add_image_size( '485x530', 485, 530, array('center','center') );
	add_image_size( '270x350', 270, 350, array('center','center') );
	add_image_size( '270x180', 270, 180, array('center','center') );
	add_image_size( '100x100', 100, 100, array('center','center') );
	add_image_size( '100x80', 100, 80, array('center','center') );

	// Custom logo.
	$logo_width  = 315;
	$logo_height = 80;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

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
			'script',
			'style',
		)
	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Twenty, use a find and replace
	 * to change 'default' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'default' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	/*
	 * Adds starter content to highlight the theme on fresh sites.
	 * This is done conditionally to avoid loading the starter content on every
	 * page load, as it is a one-off operation only needed once in the customizer.
	 */

	/*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme.
	 */
	$loader = new default_Script_Loader();
	add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );

}

add_action( 'after_setup_theme', 'default_theme_support' );

/**
 * REQUIRED FILES
 * Include required files.
 */

// Custom page walker.
// require get_template_directory() . '/classes/class-default-walker-page.php';

// Custom script loader class.
require get_template_directory() . '/classes/class-default-script-loader.php';

// Non-latin language handling.
require get_template_directory() . '/classes/class-default-non-latin-languages.php';

/**
 * Register and Enqueue Styles.
 */
function default_register_styles() {
	wp_enqueue_style( 'default-style', get_template_directory_uri() . '/style.css' );

	$theme_version = wp_get_theme()->get( 'Version' );
	if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
		wpcf7_enqueue_scripts();
	}
	
}

add_action( 'wp_enqueue_scripts', 'default_register_styles' );


/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function default_menus() {

	$locations = array(
		'primary'  => __( 'Main Menu', 'default' ),
		'mobile'  => __( 'Mobile Menu', 'default' ),
		'smallmenu'   => __( 'Small Menu', 'default' ),
		'footer'   => __( 'Footer Menu', 'default' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'default_menus' );

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function default_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'default' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'default' ),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #2', 'default' ),
				'id'          => 'sidebar-2',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'default' ),
			)
		)
	);

}

add_action( 'widgets_init', 'default_sidebar_registration' );

/**
 * Show Polylang Languages with Custom Markup
 * @param  string $class Add custom class to the languages container
 * @return string        
 */

if ( ! function_exists( 'default_list_categories' ) ) {
	function default_list_categories() {
		$categories = get_categories( array(
			'hide_empty' => 0
		) );

		$return = array();
		foreach ( $categories as $cat ) {
			$return[$cat->cat_name] = $cat->term_id;
		}

		return $return;
	}
}

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}	
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}
function excerptWithPostID($limit, $postID) {
	$excerpt = explode(' ', get_the_excerpt($postID), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}	
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}
// disable figure width style inline
add_filter('img_caption_shortcode_width', '__return_false');
// Check if current category is subcategory
function category_has_parent($catid){
	$category = get_category($catid);
	if ($category->category_parent > 0){
		return true;
	}
	return false;
}

// Related post
function get_related_posts( $post_id, $related_count, $args = array() ) {
	$terms = get_the_terms( $post_id, 'category' );
	
	if ( empty( $terms ) ) $terms = array();
	
	$term_list = wp_list_pluck( $terms, 'slug' );
	
	$related_args = array(
		'post_type' => 'post',
		'posts_per_page' => $related_count,
		'post_status' => 'publish',
		'post__not_in' => array( $post_id ),
		'orderby' => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => $term_list
			)
		)
	);

	return new WP_Query( $related_args );
}
// ADD BROCHURE LIST TO CF7
add_action( 'wpcf7_init', 'custom_add_form_tag_ebrochurelist' );
function custom_add_form_tag_ebrochurelist() {
	wpcf7_add_form_tag( array( 'ebrochurelist', 'ebrochurelist*' ), 
		'eBrochure_tag_handler', true );
}

function eBrochure_tag_handler( $tag ) {

	$tag = new WPCF7_FormTag( $tag );

	$ebrochurelist = '<div class="selectbox__radio">';
	$args = array(
		'post_type' => 'e-brochures',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'orderby'       => 'title',
		'order'         => 'ASC',
	);

	$query = new WP_Query($args);

	while ($query->have_posts()) {
		$query->the_post();
		$post_title = get_the_title();
		$post_ID = get_the_ID();
		$ebrochurelist .= '<div class="radio-box">';
		$ebrochurelist .= '<input type="radio" id="radio-'. $post_ID .'" name="ebrochurelist" value="'. $post_title .'">';
		$ebrochurelist .= '<label for="radio-'. $post_ID .'">'. $post_title .'</label>';
		$ebrochurelist .= '</div>';
	}

	wp_reset_query();
	$ebrochurelist .= '</div>';
	return $ebrochurelist;
}
// ADD BOOK A STAND LIST TO CF7
add_action( 'wpcf7_init', 'custom_add_form_tag_bookastandlist' );
function custom_add_form_tag_bookastandlist() {
	wpcf7_add_form_tag( array( 'bookastandlist', 'bookastandlist*' ), 
		'bookastand_tag_handler', true );
}

function bookastand_tag_handler( $tag ) {

	$tag = new WPCF7_FormTag( $tag );

	$bookastandlist = '<div class="selectbox__radio">';
	$args = array(
		'post_type' => 'bookastand',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'orderby'       => 'title',
		'order'         => 'ASC',
	);

	$query = new WP_Query($args);

	while ($query->have_posts()) {
		$query->the_post();
		$post_title = get_the_title();
		$post_ID = get_the_ID();
		$bookastandlist .= '<div class="radio-box">';
		$bookastandlist .= '<input type="radio" id="radio-'. $post_ID .'" name="bookastandlist" value="'. $post_title .'">';
		$bookastandlist .= '<label for="radio-'. $post_ID .'">'. $post_title .'</label>';
		$bookastandlist .= '</div>';
	}

	wp_reset_query();
	$bookastandlist .= '</div>';
	return $bookastandlist;
}

// GET POST WITH MOST TAG COUNT
function the_dramatist_order_posts_by_tag_count( $args = '' ) {
	global $wpdb;
	$param = empty($args) ? 'post_tag' : $args;
	$sql = $wpdb->prepare("SELECT posts.*, terms.name AS tag, count 
		FROM {$wpdb->posts} AS posts
		LEFT JOIN {$wpdb->term_relationships} AS t_rel
		ON (t_rel.object_id = posts.ID)
		LEFT JOIN {$wpdb->term_taxonomy} AS t_tax
		ON (t_rel.term_taxonomy_id = t_tax.term_taxonomy_id)
		LEFT JOIN {$wpdb->terms} AS terms
		ON (terms.term_id = t_tax.term_id)
		WHERE taxonomy LIKE '%s'
		ORDER BY t_tax.count DESC, terms.name",
		array( $param )
	);

	return $wpdb->get_results($sql);
}

// GET LIST OF YEAR WHEN POSTS HAVE BEEN PUBLISHED
function get_posts_years_array() {
	global $wpdb;
	$result = array();
	$years = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT YEAR(post_date) FROM {$wpdb->posts} WHERE post_status = %s AND post_type = %s GROUP BY YEAR(post_date) DESC",
			'publish',
			'post',
		),
		ARRAY_N
	);
	if ( is_array( $years ) && count( $years ) > 0 ) {
		foreach ( $years as $year ) {
			$result[] = $year[0];
		}
	}
	return $result;
}
// Change Language
function changeLang($text1, $text2){
	$text  = (pll_current_language() == 'en') ? $text1 : $text2;
	return $text;
}
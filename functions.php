<?php
/**
 * Beautiful Company functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Beautiful_Company
 * @since 1.0
 */


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function beautifulcompany_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'beautiful-company' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( '1920x900', 1920, 900, true );
	add_image_size( '340x160', 340, 160, true );
	add_image_size( '160x160', 160, 160, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main'		=> __( 'Main Menu', 'beautiful-company' ),
		'footer'	=> __( 'Footer Menu', 'beautiful-company' ),
	) );

}
add_action( 'after_setup_theme', 'beautifulcompany_setup' );


/**
 * Enqueue scripts and styles.
 */
function beautifulcompany_scripts() {

	// css script
	wp_enqueue_style( 'bxslider', get_theme_file_uri( '/assets/css/jquery.bxslider.min.css' ), array(), false );
	wp_enqueue_style( 'main', get_theme_file_uri( '/assets/css/main.css' ), array(), false );
	
	// js script
	wp_enqueue_script( 'bxslider', get_theme_file_uri( '/assets/js/jquery.bxslider.min.js' ), array('jquery'), false, true );
	wp_enqueue_script( 'picturefill', get_theme_file_uri( '/assets/js/picturefill.min.js' ), array('jquery'), false, true );

    wp_enqueue_script( 'resizesensor', get_theme_file_uri( '/assets/js/resize-sensor.js' ), array('jquery'), false, true );
    wp_enqueue_script( 'stickysidebar', get_theme_file_uri( '/assets/js/jquery.sticky-sidebar.min.js' ), array('jquery'), false, true );
	wp_enqueue_script( 'main', get_theme_file_uri( '/assets/js/main.js' ), array('jquery'), false, true );
}
add_action( 'wp_enqueue_scripts', 'beautifulcompany_scripts' );


/**
 * Custom filter to remove default image sizes from WordPress.
 */
function remove_default_image_sizes( $sizes ) {
	unset( $sizes['thumbnail'] );
	unset( $sizes['medium'] );
	unset( $sizes['medium'] );
	unset( $sizes['medium_large'] );
	unset( $sizes['large'] );
	return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'remove_default_image_sizes' );


/**
 * Return thumbnail alt text
 */
function thumbnail_alt_text( $args = array() ) {
	/*$args = array( 'post_id' => int, 'thumbnail_id' => int, 'echo' => bool );*/

	$echo = true;

	if ( isset( $args['echo'] ) ) { $echo = $args['echo']; }

	if ( isset( $args['post_id'] ) && !empty( $args['post_id'] ) ) {
		$thumbnailID = get_post_thumbnail_id( $args['post_id'] );
	}

	if ( isset( $args['thumbnail_id'] ) && !empty( $args['thumbnail_id'] ) ) {
		$thumbnailID = $args['thumbnail_id'];
	}

	if ( !empty( $thumbnailID ) ) {
		// alt text
		$text = get_post_meta( $thumbnailID, '_wp_attachment_image_alt', true );

		// title text
		if ( empty( $text ) ) { $text = get_the_title( $thumbnailID ); }

		if ( $echo ) { echo $text; }
		else { return $text; }
	}

	return false;
}


/**
 * Option Page
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title'	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings'
	));
}


/**
 * Archive custom style
 */
function pt_year_wise_monthly_archive() {
	global $wpdb;
	$year_prev    = '';
	$year_current = '';
	$where = apply_filters( 'getarchives_where', "WHERE post_type = 'post' AND post_status = 'publish' AND post_date <= now()" );
	$join = apply_filters( 'getarchives_join', '' );
	$months = $wpdb->get_results( "SELECT YEAR(post_date) AS year, MONTH(post_date) AS numMonth, DATE_FORMAT(post_date, '%M') AS month, count(ID) as post_count FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC" );
	$html = '<div class="sidebar-inner archive-toggle-sidebar">';
	$html .= '<a href="#" class="toggle-sidebar">Archive</a>';
	$html .= '<ul class="no-style">';
	foreach($months as $month) :
		$year_current = $month->year;
		if ($year_current != $year_prev) {
			if ($year_prev != null) {}
			$html .= '<li class="year">' . $month->year . '</li>';
		}
		$html .= '<li>';
			$html .= '<a href="'.get_bloginfo('url').'/'.$month->year.'/'.date("m", strtotime($month->month)).'">'.$month->month.'</a>';
		$html .= '</li>';
	$year_prev = $year_current;
	endforeach;
	$html .= '</ul>';
	$html .= '</div>';
	echo $html;
}


/**
 * Default post type change slug
 */
function default_post_type_args( $args, $post_type ) {
	if ( $post_type == 'post' ) {
		$args['rewrite'] = array( 'slug' => 'blog' );
	}

	return $args;
}
add_filter( 'register_post_type_args', 'default_post_type_args', 20, 2 );


/**
 * add curent class in page menu item by cpt single page
 */
function add_current_nav_class($classes, $item) {
	global $post;

	$current_post_type = get_post_type_object( get_post_type( $post->ID ) );
	$current_post_type_slug = $current_post_type->rewrite['slug'];

	$menu_slug = strtolower( trim( $item->url ) );
	
	if ( strpos( $menu_slug, $current_post_type_slug ) !== false || strpos( $menu_slug, 'join-us' ) !== false && $current_post_type_slug == 'jobs' ) {
		$classes[] = 'current-menu-ancestor';
	}
	return $classes;
}
add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );


/**
 * Excerpt more style
 */
function wpdocs_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


/**
 * CPT Team
 */
function team()
{
	$labels = array(
		'name'               => _x( 'Team', 'post type general name' ),
		'singular_name'      => _x( 'Team', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Team' ),
		'add_new_item'       => __( 'Add New Team' ),
		'edit_item'          => __( 'Edit Team' ),
		'new_item'           => __( 'New Team' ),
		'all_items'          => __( 'All Team' ),
		'view_item'          => __( 'View Team' ),
		'search_items'       => __( 'Search Team' ),
		'not_found'          => __( 'No Team found' ),
		'not_found_in_trash' => __( 'No Team found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Team'
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Team',
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 32,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'query_var' => true,
		'can_export' => true,
		'public' => true,
		'has_archive' => 'teams',
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'team', 'with_front'=>false),
	);
	register_post_type( 'team', $args );
}
add_action( 'init', 'team' );


/**
 * CPT Jobs
 */
function jobs()
{
	$labels = array(
		'name'               => _x( 'Jobs', 'post type general name' ),
		'singular_name'      => _x( 'Jobs', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Jobs' ),
		'add_new_item'       => __( 'Add New Jobs' ),
		'edit_item'          => __( 'Edit Jobs' ),
		'new_item'           => __( 'New Jobs' ),
		'all_items'          => __( 'All Jobs' ),
		'view_item'          => __( 'View Jobs' ),
		'search_items'       => __( 'Search Jobs' ),
		'not_found'          => __( 'No Jobs found' ),
		'not_found_in_trash' => __( 'No Jobs found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Jobs'
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Jobs',
		'supports' => array( 'title', 'editor', 'excerpt' ),
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 32,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'query_var' => true,
		'can_export' => true,
		'public' => true,
		'has_archive' => 'jobs',
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'jobs', 'with_front'=>false),
	);
	register_post_type( 'jobs', $args );
}
add_action( 'init', 'jobs' );

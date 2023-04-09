<?php
/**
 * Blossom Spa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blossom_Spa
 */

//define theme version
$blossom_spa_theme_data = wp_get_theme();
if( ! defined( 'BLOSSOM_SPA_THEME_VERSION' ) ) define( 'BLOSSOM_SPA_THEME_VERSION', $blossom_spa_theme_data->get( 'Version' ) );
if( ! defined( 'BLOSSOM_SPA_THEME_NAME' ) ) define( 'BLOSSOM_SPA_THEME_NAME', $blossom_spa_theme_data->get( 'Name' ) );
if( ! defined( 'BLOSSOM_SPA_THEME_TEXTDOMAIN' ) ) define( 'BLOSSOM_SPA_THEME_TEXTDOMAIN', $blossom_spa_theme_data->get( 'TextDomain' ) ); 

/**
 * Custom Functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Standalone Functions.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Template Functions.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom functions for selective refresh.
 */
require get_template_directory() . '/inc/partials.php';

/**
 * Fontawesome
 */
require get_template_directory() . '/inc/fontawesome.php';

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Dynamic Styles
 */
require get_template_directory() . '/css/style.php';

/**
 * Typography Functions
 */
require get_template_directory() . '/inc/typography.php';

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Add theme compatibility function for woocommerce if active
*/
if( blossom_spa_is_woocommerce_activated() ){
    require get_template_directory() . '/inc/woocommerce-functions.php';    
}

/**
 * Toolkit Filters
*/
if( blossom_spa_is_bttk_activated() ) {
	require get_template_directory() . '/inc/toolkit-functions.php';
}

/**
 * Getting Started
*/
require get_template_directory() . '/inc/getting-started/getting-started.php';

/**
 * Implement Local Font Method functions.
 */
require get_template_directory() . '/inc/class-webfont-loader.php';



/**
 * Enqueue styles.
 *
 * @since add_customize_style
 *
 * @return void
 */
function add_customize_style() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get('Version');
		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_enqueue_style('bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
		wp_enqueue_style('normalize-style', get_template_directory_uri() . '/css/normalize.css',array(),$version_string);
		wp_enqueue_style('customize-style', get_template_directory_uri() . '/css/customize.css', array());
		wp_enqueue_script('script', get_template_directory_uri() . '/js/main-script.js', array('jquery'));
}

add_action( 'wp_enqueue_scripts', 'add_customize_style' );


// Register Custom Post Type
function custom_cham_soc_da() {

	$labels = array(
		'name'                  => _x( 'Chăm sóc da', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Chăm sóc da', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Chăm sóc da', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Tất cả bài viết', 'text_domain' ),
		'add_new_item'          => __( 'Thêm bài viết mới', 'text_domain' ),
		'add_new'               => __( 'Thêm bài viết', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Chỉnh sửa bài viết', 'text_domain' ),
		'update_item'           => __( 'Update bài viết', 'text_domain' ),
		'view_item'             => __( 'Xem bài viết', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Chăm sóc da', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 8,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'cham-soc-da', $args );

}
add_action( 'init', 'custom_cham_soc_da', 0 );

function custom_dieu_tri_da() {

	$labels = array(
		'name'                  => _x( 'Điều trị da', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Điều trị da', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Điều trị da', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Tất cả bài viết', 'text_domain' ),
		'add_new_item'          => __( 'Thêm bài viết mới', 'text_domain' ),
		'add_new'               => __( 'Thêm bài viết', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Chỉnh sửa bài viết', 'text_domain' ),
		'update_item'           => __( 'Update bài viết', 'text_domain' ),
		'view_item'             => __( 'Xem bài viết', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Điều trị da', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 9,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'dieu-tri-da', $args );

}
add_action( 'init', 'custom_dieu_tri_da', 0 );


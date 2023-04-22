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
		'featured_image'        => __( 'Ảnh đại diện của bài viết', 'text_domain' ),
		'set_featured_image'    => __( 'Đặt ảnh đại diện', 'text_domain' ),
		'remove_featured_image' => __( 'Xoá ảnh đại diện', 'text_domain' ),
		'use_featured_image'    => __( 'Dùng làm ảnh đại diện', 'text_domain' ),
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
		'featured_image'        => __( 'Ảnh đại diện của bài viết', 'text_domain' ),
		'set_featured_image'    => __( 'Đặt ảnh đại diện', 'text_domain' ),
		'remove_featured_image' => __( 'Xoá ảnh đại diện', 'text_domain' ),
		'use_featured_image'    => __( 'Dùng làm ảnh đại diện', 'text_domain' ),
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
		'menu_position'         => 8,
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

function custom_lam_dep_cong_nghe_cao() {

	$labels = array(
		'name'                  => _x( 'Làm đẹp công nghệ cao', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Làm đẹp công nghệ cao', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Làm đẹp công nghệ cao', 'text_domain' ),
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
		'featured_image'        => __( 'Ảnh đại diện của bài viết', 'text_domain' ),
		'set_featured_image'    => __( 'Đặt ảnh đại diện', 'text_domain' ),
		'remove_featured_image' => __( 'Xoá ảnh đại diện', 'text_domain' ),
		'use_featured_image'    => __( 'Dùng làm ảnh đại diện', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Làm đẹp công nghệ cao', 'text_domain' ),
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
	register_post_type( 'lam-dep-cong-nghe-cao', $args );

}
add_action( 'init', 'custom_lam_dep_cong_nghe_cao', 0 );

function custom_tham_my() {

	$labels = array(
		'name'                  => _x( 'Thẩm mỹ', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Thẩm mỹ', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Thẩm mỹ', 'text_domain' ),
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
		'featured_image'        => __( 'Ảnh đại diện của bài viết', 'text_domain' ),
		'set_featured_image'    => __( 'Đặt ảnh đại diện', 'text_domain' ),
		'remove_featured_image' => __( 'Xoá ảnh đại diện', 'text_domain' ),
		'use_featured_image'    => __( 'Dùng làm ảnh đại diện', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Thẩm mỹ', 'text_domain' ),
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
	register_post_type( 'tham-my', $args );

}
add_action( 'init', 'custom_tham_my', 0 );

function custom_san_pham() {

	$labels = array(
		'name'                  => _x( 'Dược mỹ phẩm - Store', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Dược mỹ phẩm - Store', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Dược mỹ phẩm - Store', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Tất cả sản phẩm', 'text_domain' ),
		'add_new_item'          => __( 'Thêm sản phẩm mới', 'text_domain' ),
		'add_new'               => __( 'Thêm sản phẩm', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Chỉnh sửa sản phẩm', 'text_domain' ),
		'update_item'           => __( 'Update sản phẩm', 'text_domain' ),
		'view_item'             => __( 'Xem sản phẩm', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Ảnh đại diện của sản phẩm', 'text_domain' ),
		'set_featured_image'    => __( 'Đặt ảnh đại diện', 'text_domain' ),
		'remove_featured_image' => __( 'Xoá ảnh đại diện', 'text_domain' ),
		'use_featured_image'    => __( 'Dùng làm ảnh đại diện', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Dược mỹ phẩm - Store', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'loai-san-pham'),
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
	register_post_type( 'san-pham', $args );

}
add_action( 'init', 'custom_san_pham', 0 );

function custom_tips_lam_dep() {

	$labels = array(
		'name'                  => _x( 'Tips làm đẹp', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Tips làm đẹp', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Tips làm đẹp', 'text_domain' ),
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
		'featured_image'        => __( 'Ảnh đại diện của bài viết', 'text_domain' ),
		'set_featured_image'    => __( 'Đặt ảnh đại diện', 'text_domain' ),
		'remove_featured_image' => __( 'Xoá ảnh đại diện', 'text_domain' ),
		'use_featured_image'    => __( 'Dùng làm ảnh đại diện', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Tips làm đẹp', 'text_domain' ),
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
	register_post_type( 'lam-dep', $args );

}
add_action( 'init', 'custom_tips_lam_dep', 0 );

function custom_tin_tuc() {

	$labels = array(
		'name'                  => _x( 'Tin tức', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Tin tức', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Tin tức', 'text_domain' ),
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
		'featured_image'        => __( 'Ảnh đại diện của bài viết', 'text_domain' ),
		'set_featured_image'    => __( 'Đặt ảnh đại diện', 'text_domain' ),
		'remove_featured_image' => __( 'Xoá ảnh đại diện', 'text_domain' ),
		'use_featured_image'    => __( 'Dùng làm ảnh đại diện', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Tin tức', 'text_domain' ),
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
	register_post_type( 'custom_tin_tuc', $args );

}
add_action( 'init', 'custom_tin_tuc', 0 );

// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Phân loại sản phẩm', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Phân loại sản phẩm', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Phân loại sản phẩm', 'text_domain' ),
		'all_items'                  => __( 'Tất cả các loại', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'Loại sản phẩm mới', 'text_domain' ),
		'add_new_item'               => __( 'Thêm loại sản phẩm mới', 'text_domain' ),
		'edit_item'                  => __( 'Chỉnh sửa', 'text_domain' ),
		'update_item'                => __( 'Update loại sản phẩm', 'text_domain' ),
		'view_item'                  => __( 'Xem loại sản phẩm', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Tìm kiếm loại sản phẩm', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'loai-san-pham', array( 'san-pham' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );


<?php
/**
 * My Library
 *
 * @package 	Ocean_Extra
 * @category 	Core
 * @author 		OceanWP
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
class Ocean_Extra_My_Library {

	/**
	 * Start things up
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'library_post_type' ) );

		if ( is_admin() ) {
			add_action( 'admin_menu', array( $this, 'add_page' ), 1 );
			add_filter( 'ocean_main_metaboxes_post_types', array( $this, 'add_metabox' ), 20 );
		}

		add_action( 'template_redirect', array( $this, 'block_template_frontend' ) );
	}

	/**
	 * Add sub menu page
	 *
	 * @since 1.2.10
	 */
	public function add_page() {
		add_submenu_page(
			'oceanwp-panel',
			esc_html__( 'My Library', 'ocean-extra' ),
			esc_html__( 'My Library', 'ocean-extra' ),
			'edit_pages',
			'edit.php?post_type=oceanwp_library'
		);
	}

	/**
	 * Register library post type
	 *
	 * @since 1.2.10
	 */
	public static function library_post_type() {

		// Register the post type
		register_post_type( 'oceanwp_library', apply_filters( 'ocean_library_args', array(
			'labels' => array(
				'name' 					=> esc_html__( 'My Library', 'ocean-extra' ),
				'singular_name' 		=> esc_html__( 'Template', 'ocean-extra' ),
				'add_new' 				=> esc_html__( 'Add New', 'ocean-extra' ),
				'add_new_item' 			=> esc_html__( 'Add New Template', 'ocean-extra' ),
				'edit_item' 			=> esc_html__( 'Edit Template', 'ocean-extra' ),
				'new_item' 				=> esc_html__( 'Add New Template', 'ocean-extra' ),
				'view_item' 			=> esc_html__( 'View Template', 'ocean-extra' ),
				'search_items' 			=> esc_html__( 'Search Template', 'ocean-extra' ),
				'not_found' 			=> esc_html__( 'No Templates Found', 'ocean-extra' ),
				'not_found_in_trash' 	=> esc_html__( 'No Templates Found In Trash', 'ocean-extra' ),
				'menu_name' 			=> esc_html__( 'My Library', 'ocean-extra' ),
			),
			'public' 					=> true,
			'hierarchical'          	=> false,
			'show_ui'               	=> true,
			'show_in_menu' 				=> false,
			'show_in_nav_menus'     	=> false,
			'can_export'            	=> true,
			'exclude_from_search'   	=> true,
			'capability_type' 			=> 'post',
			'rewrite' 					=> false,
			'supports' 					=> array( 'title', 'editor', 'thumbnail', 'author', 'elementor' ),
		) ) );

	}

	/**
	 * Add the OceanWP Settings metabox into the custom post type
	 *
	 * @since 1.2.10
	 */
	public static function add_metabox( $types ) {
		$types[] = 'oceanwp_library';
		return $types;
	}

	/**
	 * Make the post type inaccessible
	 *
	 * @since 1.2.10
	 */
	public static function block_template_frontend() {
		if ( is_singular( 'oceanwp_library' ) && ! self::is_current_user_can_edit() ) {
			wp_redirect( site_url(), 301 );
			die;
		}
	}

	/**
	 * If the current user can edit
	 *
	 * @since 1.2.10
	 */
	public static function is_current_user_can_edit( $post_id = 0 ) {
		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		if ( 'trash' === get_post_status( $post_id ) ) {
			return false;
		}

		$post_type_object = get_post_type_object( get_post_type( $post_id ) );
		if ( empty( $post_type_object ) ) {
			return false;
		}

		if ( ! isset( $post_type_object->cap->edit_post ) ) {
			return false;
		}

		$edit_cap = $post_type_object->cap->edit_post;
		if ( ! current_user_can( $edit_cap, $post_id ) ) {
			return false;
		}

		if ( get_option( 'page_for_posts' ) === $post_id ) {
			return false;
		}

		return true;
	}

}
new Ocean_Extra_My_Library();
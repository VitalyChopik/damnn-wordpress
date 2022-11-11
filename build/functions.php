<?php

function damnn_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

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
	add_theme_support(
		'custom-background',
		apply_filters(
			'damnn_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support(
		'custom-logo',
		array(
			'width'       => 340,
            'height'=> 88,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'damnn_setup' );


add_action( 'after_setup_theme', function(){
	register_nav_menus( [
		'header_menu' => 'Меню в шапке',
	] );
} );


add_action( 'wp_enqueue_scripts', 'add_my_scripts' );    // Фронт
function add_my_scripts(){
     wp_enqueue_style( 'main', get_stylesheet_uri() );
	 wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css');
	 wp_enqueue_style( 'style.min', get_template_directory_uri() . '/css/style.min.css');	
	 wp_enqueue_style( 'wow', get_template_directory_uri() . '/css/animate.css');
	  wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', array(), false, false);
	wp_enqueue_script('jquery');
	
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), false, false);

	// wp_deregister_script( 'jquery-migrate');

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), false, true);
	wp_enqueue_script('main-min', get_stylesheet_directory_uri() . '/js/main.min.js', array('jquery'), false, true);
	wp_enqueue_script('lottie', 'https://unpkg.com/@lottiefiles/lottie-player@1.5.7/dist/lottie-player.js', array('jquery'), false, true);
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'option',
		'menu_title'	=> 'Option',
	));

}


function cptui_register_my_cpts_team() {

	/**
	 * Post Type: Team.
	 */

	$labels = [
		"name" => esc_html__( "Team", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Team", "custom-post-type-ui" ),
		"menu_name" => esc_html__( "My Team", "custom-post-type-ui" ),
		"all_items" => esc_html__( "All Team", "custom-post-type-ui" ),
		"add_new" => esc_html__( "Add new", "custom-post-type-ui" ),
		"add_new_item" => esc_html__( "Add new Team", "custom-post-type-ui" ),
		"edit_item" => esc_html__( "Edit Team", "custom-post-type-ui" ),
		"new_item" => esc_html__( "New Team", "custom-post-type-ui" ),
		"view_item" => esc_html__( "View Team", "custom-post-type-ui" ),
		"view_items" => esc_html__( "View Team", "custom-post-type-ui" ),
		"search_items" => esc_html__( "Search Team", "custom-post-type-ui" ),
		"not_found" => esc_html__( "No Team found", "custom-post-type-ui" ),
		"not_found_in_trash" => esc_html__( "No Team found in trash", "custom-post-type-ui" ),
		"parent" => esc_html__( "Parent Team:", "custom-post-type-ui" ),
		"featured_image" => esc_html__( "Featured image for this Team", "custom-post-type-ui" ),
		"set_featured_image" => esc_html__( "Set featured image for this Team", "custom-post-type-ui" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this Team", "custom-post-type-ui" ),
		"use_featured_image" => esc_html__( "Use as featured image for this Team", "custom-post-type-ui" ),
		"archives" => esc_html__( "Team archives", "custom-post-type-ui" ),
		"insert_into_item" => esc_html__( "Insert into Team", "custom-post-type-ui" ),
		"uploaded_to_this_item" => esc_html__( "Upload to this Team", "custom-post-type-ui" ),
		"filter_items_list" => esc_html__( "Filter Team list", "custom-post-type-ui" ),
		"items_list_navigation" => esc_html__( "Team list navigation", "custom-post-type-ui" ),
		"items_list" => esc_html__( "Team list", "custom-post-type-ui" ),
		"attributes" => esc_html__( "Team attributes", "custom-post-type-ui" ),
		"name_admin_bar" => esc_html__( "Team", "custom-post-type-ui" ),
		"item_published" => esc_html__( "Team published", "custom-post-type-ui" ),
		"item_published_privately" => esc_html__( "Team published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => esc_html__( "Team reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => esc_html__( "Team scheduled", "custom-post-type-ui" ),
		"item_updated" => esc_html__( "Team updated.", "custom-post-type-ui" ),
		"parent_item_colon" => esc_html__( "Parent Team:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "Team", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "team", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-businessman",
		"supports" => [ "title", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "team", $args );
}

add_action( 'init', 'cptui_register_my_cpts_team' );
function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Position.
	 */

	$labels = [
		"name" => esc_html__( "Position", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Position", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => esc_html__( "Position", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'position', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "position",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "position", [ "team" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
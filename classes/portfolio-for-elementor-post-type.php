<?php
function portfolio_for_elementor_portfolio_register() {

	/**
	 * Post Type: Portfolio.
	 */

	$labels = [
		"name"                  => esc_html__( "Portfolio", "hello-elementor" ),
		"singular_name"         => esc_html__( "Portfolio", "hello-elementor" ),
		"featured_image"        => esc_html__( "Portfolio Image", "hello-elementor" ),
		"set_featured_image"    => esc_html__( "Set Portfolio Image", "hello-elementor" ),
		"remove_featured_image" => esc_html__( "Remove Portfolio Image", "hello-elementor" ),
		"use_featured_image"    => esc_html__( "Use Portfolio Image", "hello-elementor" ),
	];

	$args = [
		"label"                 => esc_html__( "Portfolio", "hello-elementor" ),
		"labels"                => $labels,
		"description"           => "",
		"public"                => true,
		"publicly_queryable"    => true,
		"show_ui"               => true,
		"show_in_rest"          => true,
		"rest_base"             => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace"        => "wp/v2",
		"has_archive"           => false,
		"show_in_menu"          => true,
		"show_in_nav_menus"     => true,
		"delete_with_user"      => false,
		"exclude_from_search"   => false,
		"capability_type"       => "post",
		"map_meta_cap"          => true,
		"hierarchical"          => false,
		"can_export"            => false,
		"rewrite"               => [ "slug" => "pfe_portfolio", "with_front" => true ],
		"query_var"             => true,
		"menu_icon"             => "dashicons-portfolio",
		"supports"              => [ "title", "editor", "thumbnail" ],
		"show_in_graphql"       => false,
	];

	register_post_type( "pfe_portfolio", $args );

	/**
	 * Taxonomy: Portfolio Categories.
	 */

	$labels = [
		"name"          => esc_html__( "Portfolio Categories", "hello-elementor" ),
		"singular_name" => esc_html__( "Portfolio Category", "hello-elementor" ),
	];


	$args = [
		"label"                 => esc_html__( "Portfolio Categories", "hello-elementor" ),
		"labels"                => $labels,
		"public"                => true,
		"publicly_queryable"    => false,
		"hierarchical"          => true,
		"show_ui"               => true,
		"show_in_menu"          => true,
		"show_in_nav_menus"     => true,
		"query_var"             => true,
		"rewrite"               => [ 'slug' => 'pfe_portfolio_category', 'with_front' => true, ],
		"show_admin_column"     => false,
		"show_in_rest"          => true,
		"show_tagcloud"         => false,
		"rest_base"             => "pfe_portfolio_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace"        => "wp/v2",
		"show_in_quick_edit"    => false,
		"sort"                  => false,
		"show_in_graphql"       => false,
	];
	register_taxonomy( "pfe_portfolio_category", [ "pfe_portfolio" ], $args );
}

add_action( 'init', 'portfolio_for_elementor_portfolio_register' );

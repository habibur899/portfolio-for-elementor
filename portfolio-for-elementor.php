<?php
/**
 * Plugin Name: Portfolio for Elementor
 * Description: You can make portfolio section use this plugin completely free.
 * Plugin URI:  https://github.com/habibur899/portfolio-for-elementor
 * Version:     1.0.0
 * Author:      Habibur Rahaman
 * Author URI:  https://github.com/habibur899
 * Text Domain: portfolio-for-elementor
 *
 * Elementor tested up to: 3.8.0
 * Elementor Pro tested up to: 3.8.0
 */

use Portfolio_For_Elementor_Addon\Portfolio_For_Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function portfolio_for_elementor_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );
	require_once( __DIR__ . '/classes/portfolio-for-elementor-post-type.php' );

	// Run the plugin
	Portfolio_For_Elementor::instance();

}

add_action( 'plugins_loaded', 'portfolio_for_elementor_addon' );

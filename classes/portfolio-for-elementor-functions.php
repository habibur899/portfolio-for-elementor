<?php
add_action( 'init', 'portfolio_for_elementor_grid_image_size' );
function portfolio_for_elementor_grid_image_size() {
	add_image_size( 'portfolio_grid', 600, 600, true );
}
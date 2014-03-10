<?php
/**
 * Add styles generated by brunch
*/
function bfamfaphd_assets() {
	wp_enqueue_style( 'bfamfaphd-style', get_template_directory_uri() . '/css/app.css');
	wp_enqueue_script( 'bfamfaphd-vendor-script', get_template_directory_uri() . '/js/vendor.js');
	wp_enqueue_script( 'bfamfaphd-script', get_template_directory_uri() . '/js/app.js');
}


add_action( 'wp_enqueue_scripts', 'bfamfaphd_assets' );

// Hide Admin Bar
add_filter('show_admin_bar', '__return_false');

// Create the_slug()
function the_slug() {
	    $post_data = get_post($post->ID, ARRAY_A);
	    $slug = $post_data['post_name'];
	    echo $slug; 
}

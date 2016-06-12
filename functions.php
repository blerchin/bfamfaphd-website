<?php
require_once('includes/supply_chain_post_type.php');
require_once('includes/card_post_type.php');
require_once('includes/wp_bootstrap_navwalker.php');

function get_posts_json($post_type){
	$posts = get_posts(array(
			'post_type' => $post_type,
			'posts_per_page' =>'100'
	));
	foreach( $posts as $key => $post){
		$posts[$key]->meta_color = get_post_meta( $post->ID, 'color', true);
		$thumb_id = get_post_thumbnail_id($post->ID);
		$posts[$key]->post_thumbnail_uri = wp_get_attachment_url( $thumb_id);
		$posts[$key]->permalink = get_permalink($post->ID);
	}
	$postsJson = json_encode($posts);
	return $postsJson;
}


function register_menus() {
	register_nav_menu('page-menu', __( 'Page Menu' ));
	register_nav_menu('supply-chains-menu', __( 'Supply Chains Menu' ));
}
add_action('init', 'register_menus');

function setup_features() {
	add_theme_support('post-thumbnails');
}
add_action('init', 'setup_features');


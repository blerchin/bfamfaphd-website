<?php
require_once('includes/supply_chain_post_type.php');
require_once('includes/card_post_type.php');
require_once('includes/wp_bootstrap_navwalker.php');


function register_menus() {
	register_nav_menu('page-menu', __( 'Page Menu' ));
	register_nav_menu('supply-chains-menu', __( 'Supply Chains Menu' ));
}
add_action('init', 'register_menus');

function setup_features() {
	add_theme_support('post-thumbnails');
}
add_action('init', 'setup_features');


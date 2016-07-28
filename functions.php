<?php

require_once('includes/supply_chain_post_type.php');
require_once('includes/card_post_type.php');
require_once('includes/project_post_type.php');
require_once('includes/topic_post_type.php');
require_once('includes/wp_bootstrap_navwalker.php');
require_once('includes/mailchimp_form.php');
require_once('includes/projects-list.php');
require_once('includes/of_supply_chains_interstitial.php');

function get_posts_json($post_type){
	$posts = get_posts(array(
			'post_type' => $post_type,
			'posts_per_page' =>'100'
	));
	foreach( $posts as $key => $post){
		$posts[$key]->meta_color = get_post_meta( $post->ID, 'color', true);
		$thumb_id = get_post_thumbnail_id($post->ID);
		$posts[$key]->post_thumbnail_uri = wp_get_attachment_url( $thumb_id);
		$cats = get_the_category($post->ID);
		if(count($cats) > 0){
			$cat = $cats[0]->cat_name;
		}
		$posts[$key]->post_category = $cat;
		$posts[$key]->permalink = get_permalink($post->ID);
	}
	$postsJson = json_encode($posts);
	return $postsJson;
}

function hex2rgb( $colour ) {
        if ( $colour[0] == '#' ) {
                $colour = substr( $colour, 1 );
        }
        if ( strlen( $colour ) == 6 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
                return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

function register_menus() {
	register_nav_menu('page-menu', __( 'Page Menu' ));
	register_nav_menu('supply-chains-page-menu', __( 'Supply Chains Page Menu' ));
	register_nav_menu('supply-chains-menu', __( 'Supply Chains Menu' ));
	register_nav_menu('interstitial-menu', __( 'Interstitial Menu' ));
}
add_action('init', 'register_menus');

function setup_features() {
	add_theme_support('post-thumbnails');
}
add_action('init', 'setup_features');

function setup_options() {
  global $SHOW_CIRCLE;
  global $SITE_SECTION;
  global $SHOW_NAVBAR;
  global $SCROLL_LOCKED;
	$SHOW_CIRCLE = true;
	$SHOW_NAVBAR = true;
  $SITE_SECTION = 'bfamfaphd';
	$SCROLL_LOCKED = false;
}

function get_bfamfaphd_section_name(){
  global $SITE_SECTION;
  $NAMES = array(
    'supply-chains' => 'Supply Chains',
    'bfamfaphd' => 'BFAMFAPhD'
  );
  return $NAMES[$SITE_SECTION];
};

function get_bfamfaphd_section_slug(){
  global $SITE_SECTION;
  return $SITE_SECTION;
};

add_action('init', 'setup_options');

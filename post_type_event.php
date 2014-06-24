<?php
add_action( 'init', 'create_post_type_event' );
function create_post_type_event() {
  register_post_type( 'bfamfaphd_event',
    array(
      'labels' => array(
        'name' => __( 'Events' ),
        'singular_name' => __( 'Event' )
      ),
    'public' => true,
    'has_archive' => true,
    'rewrite' => array(
      'slug' => 'projects'
    ),
    'supports' => array(
      'title',
      'editor',
      'custom-fields',
    ),
    ) 
  );
}
?>

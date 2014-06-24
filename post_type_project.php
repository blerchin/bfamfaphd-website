<?php
add_action( 'init', 'create_post_type_project' );
function create_post_type_project() {
  register_post_type( 'bfamfaphd_project',
    array(
      'labels' => array(
        'name' => __( 'Projects' ),
        'singular_name' => __( 'Project' )
      ),
    'public' => true,
    'has_archive' => true,
    'rewrite' => array(
      'slug' => 'projects'
    ),
    'supports' => array(
      'title',
      'editor',
      'author',
      'thumbnail',
      'revisions',
      'custom-fields',
    ),
    ) 
  );
}
?>

<?php function bfamfaphd_projects_list(){
  global $post;
  $projects = new WP_Query(array(
    'post_type' => 'project',
    'orderby' => 'year',
    'order' => 'DESC'
  ));

  $out  = '<div class="projects">';
  if($projects->have_posts()):
    $out .= '<div class="projects-list item-list">';
    while($projects->have_posts()):
      $projects->the_post();
      $out .= '<article class="item item-third">';
        $out .= '<a href="' . get_the_permalink() . '">';
          $out .= '<div class="item-thumb" ';
          $out .= 'style="background-image:url(';
            $out .= get_the_post_thumbnail_url($post->ID, 'large');
            $out .= ')">';
          $out .= '</div>';
          $out .= '<h5 class="project-title">';
          $out .= get_the_title();
          $out .= '</h5>';
          $out .= '<h5 class="author">';
            $out .= get_post_meta($post->ID, 'author', true);
          $out .= '</h5>';
          $out .= '<h5 class="year">';
            $out .= get_post_meta($post->ID, 'year', true);
          $out .= '</h5>';
        $out .= '</a>';
      $out .= '</article>';
    endwhile;
    $out .= '</div>';
  else:
    $out.= '<p>Sorry, no projects currently available.</p>';
  endif;
  $out .= '</div>';
  return $out;
}

add_shortcode('bfamfaphd_projects_list', 'bfamfaphd_projects_list');

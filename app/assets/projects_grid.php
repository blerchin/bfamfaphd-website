<?php
add_shortcode( 'bfamfaphd_projects_grid', 'bfamfaphd_projects_grid_shortcode');
    
function bfamfaphd_projects_grid_shortcode($attr){ 
    $out = "";

    $args = array(
        'post_type' => 'bfamfaphd_project',
        'orderby' => 'menu_order date',
        'order' => 'DESC'
      );
    $query = new WP_Query( $args );
    
    if( $query->have_posts()) {
      $out.= "<div class='projects-grid'>";

      while( $query->have_posts()) {
        $query->the_post();
        $custom = get_post_custom(get_the_ID());
        $out.="<div class='project project-" . get_the_ID() . "'>";
          $out.="<a href='" . get_the_permalink() . "'>";
            $out.= get_the_post_thumbnail( get_the_ID(), "thumbnail", true);
          $out.="</a>";
          $out.="<div class='credit'>";
            $out.="<h4>" . get_the_title() . "</h4>";
            $out.="<small>". $custom['author'][0] . ", ";
            $out.= $custom['date'][0] . "</small>";
          $out.="</div>";
        $out.="</div>";
      }
      $out.="</div>"; //.projects-grid

    }

    return $out;

}

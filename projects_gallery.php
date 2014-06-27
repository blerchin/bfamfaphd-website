<?php
add_shortcode( 'bfamfaphd_projects_gallery', 'bfamfaphd_projects_gallery_shortcode');
    
function bfamfaphd_projects_gallery_shortcode($attr){ 
    $out = "";

    $args = array(
        'post_type' => 'bfamfaphd_project',
        'orderby' => 'menu_order date',
        'order' => 'DESC'
      );
    $query = new WP_Query( $args );
    
    if( $query->have_posts()) {
      $out.= "<div class='projectSlideshow' 
      data-cycle-fx='fade'
      data-cycle-next='#next'
      data-cycle-pause-on-hover='true'
      data-cycle-prev='#prev'
      data-cycle-slides='&gt; div'
      data-cycle-speed='600'
      data-cycle-timout='1000'>";

      while( $query->have_posts()) {
        $query->the_post();
        $custom = get_post_custom(get_the_ID());
        $out.="<div class='projectSlide projectSlide-" . get_the_ID() . "'>";
          $out.="<a href='" . get_permalink() . "'>";
            $out.= get_the_post_thumbnail( get_the_ID(), "large", true);
          $out.="</a>";
          $out.="<div class='credit'>";
            $out.="<p>";
            $out.= $custom['author'][0] . ", ";
            $out.= get_the_title() . ", ";
            $out.= $custom['date'][0];
            $out.= "</p>";
          $out.="</div>";
        $out.="</div>";
      }
      $out.="</div>"; //.projectSlideshow

      $out.="<div class='controls'>";
          $out.="<a href='#' id='prev'>Prev</a>";
          $out.="<a href='#' id='next'>Next</a>";
      $out.="</div>";

    }

    return $out;

}

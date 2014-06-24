<?php
add_shortcode( 'bfamfaphd_events_list', 'bfamfaphd_events_list_shortcode');
    
function bfamfaphd_events_list_shortcode($attr){ 
    $out = "";

    $args = array(
        'post_type' => 'bfamfaphd_event',
        'orderby' => 'menu_order',
        'order' => 'ASC'
      );
    $query = new WP_Query( $args );
    
    if( $query->have_posts()) {
      $out.= "<div class='eventList'>";

      while( $query->have_posts()) {
        $query->the_post();
        $custom = get_post_custom(get_the_ID());
        $past = strlen($custom['past'][0]) > 0;
        $out.="<div class='event";
        if($past){
            $out.=" past";
        }
        $out.="'>";
            $out.="<div class='date'>";
            $out.="<p>";
            $out.=$custom['date'][0];
            $out.="</p>";
            $out.="</div>";
            $out.="<div class='title'><h4>";
            $out.= get_the_title();
            $out.="</h4></div>";
            $out.="<div class='details'>";
            $out.= get_the_content();
            $out.="</div>";
        $out.="</div>";
    }
    $out.="</div>";
  }

  return $out;
}

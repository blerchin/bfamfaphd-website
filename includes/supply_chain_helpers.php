<?php
function supply_chain_section($atts, $content){
  $out = '';
  $out .= '<div class="supply-chain-section-wrap">';
    $out .= '<div class="supply-chain-section">';
      $out .= do_shortcode($content);
    $out .= '</div>';
  $out .= '</div>';
  return $out;
};

add_shortcode('supply_chain_section', 'supply_chain_section');

function supply_chain_collapse($atts, $content){
  global $post;
  $post_color = get_post_meta($post->ID, 'color', true);
  if($post_color) {
    $post_color = lighten($post_color);
  } else {
    $post_color = '#f5f5f5';

  }

  $a = shortcode_atts( array(
    'title' => 'Please add title= to the shortcode',
    'height' => '100'
  ), $atts);
  $out = '';
  $out .= '<div class="supply-chain-collapse-wrap">';
    $out .= '<header data-toggle="supply-chain">';
      $out .= '<h4>' . $a['title'] . '</h4>';
    $out .= '</header>';
    $out .= '<div class="body-content supply-chain-collapse"';
      $out .= 'style="max-height:' . $a['height'] .'px;">';

      $out .= '<div class="collapse-gradient" style="';
        $out .= 'background: linear-gradient( ';
        $out .= 'to bottom, rgba(255,255,255,0) 30%, ' . $post_color . ');';
        $out .= '">';
        $out .= '</div>';
    $out .= $content;
    $out .= '</div>';
  $out .= '</div>';
  return $out;

}

add_shortcode('supply_chain_collapse', 'supply_chain_collapse');

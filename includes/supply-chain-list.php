<?php function supply_chain_list(){
	global $post;
	$chains = new WP_Query(array(
		'post_type' => 'supply_chain',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => '20'
	));
	$out = '<div class="supply-chain-list">';
	if($chains->have_posts()){
		while($chains->have_posts()): $chains->the_post();
			$post_color = get_post_meta($post->ID, 'color', true);
			$lead_image = get_field('lead_image');
			if(!empty($lead_image)){
				$lead_image = $lead_image['sizes']['large'];
			}
			$out .= '<article class="' . join(' ', get_post_class("item item-half")) . '">';
				$out .= '<header class="article-header">';
				$out .= '<h4><a href="' . get_the_permalink() .'">';
					$out .= get_the_title();
					$out .= '</a></h4>';
				$out .= '</header>';
				$out .= '<div class="article-body-wrapper">';
					$out .= '<div class="article-body">';
						$out .= '<div class="feature-wrapper">';
							$out .= '<a href="/supply-chains-list/#' . $post->post_name . '">';
								$out .= '<div class="feature" style="background-image: url(';
									$out .= $lead_image . ');">';
								$out .= '</div>';
							$out .= '</a>';
						$out .= '</div>';
						$out .='<div class="article-summary">';
						$out .= '<p>' . get_the_excerpt();
							$out .='<a class="more-link" href="/supply-chains-list/#'. $post->post_name . '"';
							$out .='style="color:' . $post_color . ';">';
								$out .= ' Read More →';
							$out .= '</a>';
						$out .= '</p>';
						$out .= '</div>';
					$out .='</div>';
				$out .='</div>';
			$out .= '</article>';
	endwhile;
	} else {
		$out .= '<h3>No Supply Chains Yet...</h3>';
	}
	$out .= '</div>';
	return $out;
};
add_shortcode('bfamfaphd_supply_chain_list', 'supply_chain_list');

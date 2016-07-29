<?php function supply_chain_list(){
	$chains = new WP_Query(array(
		'post_type' => 'supply_chain',
		'posts_per_page' => '20'
	));
	$out = '';
	if($chains->have_posts()){
		while($chains->have_posts()): $chains->the_post();
			$out .= '<article class="' . join(' ', get_post_class("item item-half")) . '">';
				$out .= '<header class="article-header">';
				$out .= '<h2><a href="' . get_the_permalink() .'">';
					$out .= get_the_title();
					$out .= '</a></h2>';
				$out .= '</header>';
				$out .= '<div class="article-body-wrapper">';
					$out .= '<div class="article-body">';
						$out .= '<div class="feature-wrapper">';
							$out .= '<div class="feature">';
								$out .= get_the_post_thumbnail('large');
							$out .= '</div>';
						$out .= '</div>';
						$out .='<div class="article-summary">';
						$out .= '<p>' . get_the_excerpt();
							$out .='<a class="more-link" href="'.get_the_permalink() . '">';
								$out .= 'Read More →';
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
	return $out;
};
add_shortcode('bfamfaphd_supply_chain_list', 'supply_chain_list');

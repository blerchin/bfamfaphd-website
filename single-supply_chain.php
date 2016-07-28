<?php
global $SITE_SECTION;
$SITE_SECTION = "supply-chains";
global $SHOW_CIRCLE;
$SHOW_CIRCLE = true;
?>
	<?php get_header(); ?>
	<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php
			$post_color = get_post_meta($post->ID, 'color');
			if($post_color){
				$post_color = $post_color[0];
				$rgb = hex2rgb($post_color);
				$post_color = 'rgba('.$rgb['red'].','.$rgb['green'].','.$rgb['blue'].',.1)';
			}

			$lead_image = get_field('lead_image');
			if(!empty($lead_image)){
				$lead_image = $lead_image['sizes']['large'];
			}

			$card_image = get_field('card_image');
			if(!empty($card_image)){
				$card_image = $card_image['sizes']['large'];
			}

		?>
		<article 	<?php post_class('item item-full') ?>>
			<header class="article-header">
				<h2><?php the_title() ?></h2>
			</header>
			<div 	class="article-body-wrapper"
						style="background-color: <?php echo $post_color;?>">
				<div class="article-body">
					<div class="feature-wrapper">
						<div class="feature">
							<img src="<?php echo $lead_image; ?>"/>
						</div>
					</div>
					<div class="article-summary">
						<?php the_excerpt() ?>
					</div>
					<div class="article-media">
						<div class="article-card">
							<img src="<?php echo $card_image; ?>" />
						</div>
						<div class="article-secondary-image-wrapper">
							<div class="article-secondary-image">
								<?php the_post_thumbnail('large')?>
							</div>
						</div>
					</div>
					<div class="article-content">
						<?php the_content() ?>
					</div>
				</div>
			</div>
			<footer class="article-footer">
			</footer>
		</article>
	<?php endwhile; else : ?>
		<p><?php _e('Sorry, nothing found at this address.'); ?></p>
	<?php endif; ?>
	<?php get_footer(); ?>

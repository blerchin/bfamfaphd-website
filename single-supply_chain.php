<?php
global $SITE_SECTION;
$SITE_SECTION = "supply-chains";
global $SHOW_CIRCLE;
$SHOW_CIRCLE = true;
?>
	<?php get_header(); ?>
	<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php
			$post_color = get_post_meta($post->ID, 'color', true);
			$post_color = lighten($post_color);

			$lead_image = get_field('lead_image');
			if(!empty($lead_image)){
				$lead_image = $lead_image['sizes']['large'];
			}

			$card_image = get_field('card_image');
			if(!empty($card_image)){
				$card_image = $card_image['sizes']['large'];
			}

			$thumbnail_id = get_post_thumbnail_id($post->ID);
			$thumbnail_caption = '';
			if(isset($thumbnail_id)){
				$thumbnail_caption = get_post($thumbnail_id)->post_excerpt;
			}

			$workshop_guide_url = get_field('workshop_guide');
			$workshop_presentation_url = get_field('workshop_presentation');
			$syllabus_url = get_field('syllabus');
			$reading_url = get_field('reading');

		?>
		<article 	<?php post_class('item item-full') ?>>
			<div 	class="article-body-wrapper"
						style="background-color: <?php echo $post_color;?>">
				<div class="article-body">
					<div class="feature-wrapper">
						<div class="feature">
							<img src="<?php echo $lead_image; ?>"/>
						</div>
					</div>
					<header class="article-header">
						<h3><?php the_title() ?></h3>
					</header>
					<div class="article-summary">
						<?php the_excerpt() ?>
					</div>
					<div class="article-media">
						<div class="article-card">
							<img src="<?php echo $card_image; ?>" />
						</div>
						<div class="article-secondary-image-wrapper">
							<div class="article-secondary-image"
								style="background-image: url('<?php echo get_the_post_thumbnail_url($post, 'large'); ?>');">
							</div>
							<div class="article-secondary-image-caption">
								<?php echo $thumbnail_caption; ?>
							</div>
						</div>
					</div>
					<div class="article-content">
						<?php the_content() ?>
						<div class="article-attachments">
							<ul>
								<?php
									if(isset($workshop_guide_url)){
										echo '<li> <a href="' . $workshop_guide_url . '">';
										echo 'Download Workshop Guide</a></li>';
									}
									if(isset($workshop_presentation_url)){
										echo '<li> <a href="' . $workshop_presentation_url . '">';
										echo 'Download Workshop Presentation</a></li>';
									}
									if(isset($syllabus_url)){
										echo '<li> <a href="' . $syllabus_url . '">';
										echo 'Download 15 Week Syllabus</a></li>';
									}
									if(isset($reading_url)){
										echo '<li> <a href="' . $reading_url . '">';
										echo 'Download Reading</a></li>';
									}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<footer class="article-footer">
			</footer>
		</article>
		<?php echo do_shortcode('[bfamfaphd_mailchimp_form]'); ?>
	<?php endwhile; else : ?>
		<p><?php _e('Sorry, nothing found at this address.'); ?></p>
	<?php endif; ?>
	<?php get_footer(); ?>

<?php $chains = new WP_Query(array(
	'post_type' => 'supply_chain',
	'posts_per_page' => '20'
));

	if($chains->have_posts()): while($chains->have_posts()): $chains->the_post();
?>
	<article <?php post_class("item item-half") ?>>
			<header class="article-header">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</header>
			<div class="article-body-wrapper">
				<div class="article-body">
					<div class="feature-wrapper">
						<div class="feature">
							<?php the_post_thumbnail('large') ?>
						</div>
					</div>
					<div class="article-summary">
					<p><?php echo get_the_excerpt() ?>
						<a class="more-link" href="<?php the_permalink(); ?>">
							Read More →
						</a>
					</p>
					</div>
				</div>
			</div>
			<footer class="article-footer">
			</footer>
		</article>
<?php endwhile; ?>
<?php else: ?>
	<h3>No Supply Chains Yet...</h3>
<?php endif;?>

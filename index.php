	<?php get_header(); ?>
	<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article <?php post_class('item item-half') ?>>
			<h2><?php the_title() ?></h2>
		</article>
	<?php endwhile; else : ?>
		<p><?php _e('Sorry, nothing found at this address.'); ?></p>
	<?php endif; ?>
	<?php get_footer(); ?>

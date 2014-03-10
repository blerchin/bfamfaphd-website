
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="slide slide-<?php the_ID()?> <?php the_slug()?>"
				id="<?php the_slug() ?>">
	<h2><?php the_title() ?></h2>
	<div class="entry-content">
		<?php the_content() ?>
	</div>
</div>
		
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	
	<?php endif; ?>

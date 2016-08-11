<article id="tribe-events-content" class="tribe-events-single vevent hentry event">


	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
				<h3>
					<span class="title">
						<?php the_title() ?>
					</span>
					<span class="event-date">
						<?php echo sp_get_start_date() ?>
					</span>
					<?php if ( tribe_get_cost() ) : ?>
						<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
					<?php endif; ?>
				</h3>

				<!-- Event content -->
				<div class="hentry-body tribe-events-single-event-description tribe-events-content entry-content description">
					<?php the_content(); ?>
				</div>

		</div> <!-- #post-x -->
	<?php endwhile; ?>
</article>

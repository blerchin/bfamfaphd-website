<?php
global $SITE_SECTION;
$SITE_SECTION = "supply-chains";
global $SHOW_CIRCLE;
$SHOW_CIRCLE = true;
?>
<?php get_header(); ?>
<?php get_template_part('game/cards'); ?>
<div id="page-supply-chains" class="page">
	<div class="about">
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<div class="about-content">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>

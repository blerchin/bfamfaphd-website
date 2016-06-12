<?php get_header(); ?>
<?php if(is_front_page()){
	get_template_part('game/cards'); 
}?>
<div id="page-home" class="page">
	<div class="about">
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<div class="about-content">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<div class="articles">
		<?php get_template_part('articles/supply-chain-list'); ?>
	</div>
</div>
<?php get_footer(); ?>

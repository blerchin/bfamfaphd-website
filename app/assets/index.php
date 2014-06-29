<?php require('header.php'); ?>
<?php require('navbar.php'); ?>
  <div id="wrapper">
    <div id="container" >
						

				<!--POSTS -->
	<?php $count = 1; ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php $even = $count % 2; ?>
		<?php $count++; ?>

<div class="section section-<?php the_ID()?> <?php the_slug()?> 
        <?php if($even){ echo 'invert'; } else { echo 'default'; }  ?>" 
        id="<?php the_slug() ?>">
		<div class="content">
      <?php if(get_the_slug() != "home"): ?>
        <h2><?php the_title() ?></h2>
      <?php endif; ?>
      <?php the_content() ?>
		</div>
</div>
		
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	
	<?php endif; ?>
</div> <!-- .container -->
</div> <!-- #wrapper-->


<?php require('footer.php') ?>

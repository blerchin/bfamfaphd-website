<?php require('header.php'); ?>
<?php require('navbar.php'); ?>

  <div id="wrapper">
    <div id="container" >

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="section section-<?php the_ID()?> <?php the_slug()?> default"
          id="<?php the_slug() ?>">
    <div class="content">
      <h2><?php the_title() ?></h2>
      <div class="entry-content">
      
        <?php the_post_thumbnail('large');?>
        <?php the_content() ?>
      </div>
    </div>
  </div>


	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no projects matched your criteria.'); ?></p>
	
	<?php endif; ?>

</div> <!-- .container -->
</div> <!-- #wrapper-->

<?php require('footer.php') ?>

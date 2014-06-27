<?php require('header.php'); ?>
<?php require('navbar.php'); ?>

  <div id="wrapper">
    <div id="container" >

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php $custom = get_post_custom(get_the_ID()); ?>
  <div class="section section-<?php the_ID()?> <?php the_slug()?> invert home single-project"
          id="<?php the_slug() ?>">
    <div class="content">
        <p class="logo-top">
            <img src="<?php echo get_template_directory_uri() ?>/images/logo-top.png" 
            alt="logo-top" width="198" height="198" 
            class="wp-image-99" />
        </p>
        <h2><?php the_title() ?></h2>
        <div class="credit subhead">
            <span class="author"><?php echo $custom['author'][0] ?></span>
            <span class="date"><?php echo $custom['date'][0] ?></span>
        </div>
        <p class="description subhead">
            <?php echo get_the_content() ?>
        </p>
    </div>
</div>
<div class="section section-<?php the_ID()?> <?php the_slug()?> invert gallery single-project">
    <?php $attachments = get_children(array('post_parent' => get_the_ID() ));
        $attachment_count = count($attachments);
if ($attachment_count > 1 ):?>
      <div class="controls">
          <a href="#" id="prev">Prev</a>
          <a href="#" id="next">Next</a>
      </div>
<?php endif; ?>
      <div class="projectSlideshow"
          data-cycle-fx='fade'
          data-cycle-next='#next'
          data-cycle-pause-on-hover='true'
          data-cycle-prev='#prev'
          data-cycle-slides='.gallery-icon'
          data-cycle-speed='600'
          data-cycle-timout='1000'>
          <?php echo do_shortcode('[gallery size="original" link="none"]'); ?>
      </div>
</div>


	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no projects matched your criteria.'); ?></p>
	
	<?php endif; ?>

</div> <!-- .container -->
</div> <!-- #wrapper-->

<?php require('footer.php') ?>

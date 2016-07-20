<?php get_header(); ?>
<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <article 	<?php post_class('item item-full') ?>>
    <div class="article-body-wrapper">
      <div class="article-body">
        <div class="feature-wrapper">
          <div class="feature">
            <?php the_post_thumbnail('large'); ?>
          </div>
        </div>
        <header class="article-header">
          <h4><?php the_title() ?></h4>
          <h5 class="author">
            <?php echo get_post_meta($post->ID, 'author', true); ?>
          </h5>
          <h5 class="year">
            <?php echo get_post_meta($post->ID, 'year', true); ?>
          </h5>
        </header>
        <div class="article-content">
          <?php the_content()?>
        </div>
      </div>
    </div>
  </article>
  <article <?php post_class('item item-full') ?> id="topic-form">
    <div class="article-body-wrapper">
      <div class="article-body">
        <?php echo bfamfaphd_mailchimp_form(); ?>
      </div>
    </div>
  </article>
<?php endwhile; else : ?>
  <p><?php _e('Sorry, nothing found at this address!.'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>

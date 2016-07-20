<?php get_header(); ?>
<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <article <?php post_class('item item-full') ?> id="topic-home">
    <div class="article-body-wrapper">
      <div class="article-body">
        <div class="feature-wrapper">
          <div class="feature">
            <?php the_post_thumbnail('large') ?>
          </div>
        </div>
        <div class="article-content">
          <?php the_content() ?>
        </div>
      </div>
    </div>
    <footer class="article-footer">
    </footer>
  </article>
  <?php get_template_part('articles/topics-list')?>
  <?php get_template_part('articles/of-supply-chains-interstitial')?>
  <article <?php post_class('item item-full') ?> id="topic-form">
    <div class="article-body-wrapper">
      <div class="article-body">
        <?php echo bfamfaphd_mailchimp_form(); ?>
      </div>
    </div>
  </article>
  <?php get_template_part('articles/projects-list')?>
<?php endwhile; else : ?>
  <p><?php _e('Sorry, nothing found at this address.'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>

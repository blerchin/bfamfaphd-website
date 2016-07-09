<?php get_header(); ?>
<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <article <?php post_class('item item-full') ?>>
    <div class="article-body-wrapper">
      <header class="article-header">
        <h2><?php the_title() ?></h2>
      </header>
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
<?php endwhile; else : ?>
  <p><?php _e('Sorry, nothing found at this address.'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>

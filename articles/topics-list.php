<?php
$topics = new WP_Query(array(
  'post_type'=> 'topic',
  'orderby' => 'menu_order',
  'order' => 'ASC'

));
?>
<div class="topics">
  <?php if($topics->have_posts()): ?>
    <?php while($topics->have_posts()): $topics->the_post(); ?>
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
    <?php endwhile; ?>
  <?php else: ?>
    <p><?php _e('Sorry, no topics currently available.'); ?></p>
  <?php endif;?>
</div>

<?php 
$projects = new WP_Query(array(
  'post_type' => 'project',
  'orderby' => 'year',
  'order' => 'DESC'
));
?>
<div class="projects">
  <?php if($projects->have_posts()): ?>
    <div class="projects-list item-list">
    <?php while($projects->have_posts()): $projects->the_post(); ?>
      <article class="item item-third">
        <a href="<?php the_permalink()?>">
          <div class="item-thumb">
            <?php the_post_thumbnail('large') ?>
          </div>
          <h4><?php the_title() ?></h4>
          <h5 class="author">
            <?php echo get_post_meta($post->ID, 'author', true); ?>
          </h5>
          <h5 class="year">
            <?php echo get_post_meta($post->ID, 'year', true); ?>
          </h5>
        </a>
      </article>
    <?php endwhile; ?>
    </div>
  <?php else: ?>
    <p><?php _e('Sorry, no projects currently available.'); ?></p>
  <?php endif;?>
</div>

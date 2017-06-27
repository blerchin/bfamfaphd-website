<?php get_header(); ?>
<?php $projects = new WP_Query(array(
  'post_type' => 'project',
  'orderby' => 'rand',
  'posts_per_page' => 3
)); ?>
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
          <h4 class="project-title"><?php the_title() ?></h4>
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
        <div class="article-footer">
          <div class="more-projects">
            <h3>See More</h3>
            <?php while($projects->have_posts()): $projects->the_post(); ?>
              <div class="project-item">
                <a href="<?php the_permalink() ?>">
                  <div class="thumb"
                       style="background-image: url(<?php echo get_the_post_thumbnail_url(null, 'medium');?>)">
                  </div>
                  <h4 class="project-title">
                    <?php the_title() ?>
                  </h4>
                </a>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </article>
  <article <?php post_class('item item-full') ?> id="topic-form">
    <div class="article-body-wrapper">
      <div class="article-body">
        <?php
         if(get_post_meta($post->ID, 'formtype', true) == 'tenleaps') {
           echo bfamfaphd_tenleaps_form();
         } else {
           echo bfamfaphd_mailchimp_form();
         }
        ?>
      </div>
    </div>
  </article>
<?php endwhile; else : ?>
  <p><?php _e('Sorry, nothing found at this address!.'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>

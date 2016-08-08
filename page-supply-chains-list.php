<?php
global $SITE_SECTION;
$SITE_SECTION = "supply-chains";
global $SHOW_CIRCLE;
$SHOW_CIRCLE = false;
?>
<?php get_header(); ?>
<?php $chains = new WP_Query(array(
  'post_type' => 'supply_chain',
  'orderby' => 'menu_order',
  'order' => 'ASC',
  'posts_per_page' => '12'
));?>
<?php if ($chains->have_posts() ) : while ( $chains->have_posts() ) : $chains->the_post(); ?>
  <?php get_template_part('articles/article', 'supply_chain'); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php echo do_shortcode('[bfamfaphd_mailchimp_form]'); ?>
<?php get_footer(); ?>

<?php
$args = array(
  'cat' => 1,
);
$navbar = new WP_Query($args); 
$url_base = "";
if(!is_front_page()){
  $url_base = get_bloginfo('url');
}
?>
  <div class="header">
    <div class="content">
        <h1><a href="<?php bloginfo('url')?>">BFAMFAPhD</a></h1>
      <ul class="navigation">
        <?php while( $navbar->have_posts() ): $navbar->the_post() ?>
          <li><a href="<?php echo $url_base ?>#<?php the_slug() ?>">
                <?php the_title() ?>
              </a></li>
        <?php endwhile; ?>
      </ul>
    </div>
  </div>

<nav class="navbar navbar-fixed-top navbar-bfamfaphd ?>">
	<div class="container-fluid">
		<div class="navbar-header col-md-2 col-lg-push-5">
			<div class="navbar-title-wrap">
	      <a 	class="navbar-title" href="#topic-home">
	        BFAMFAPhD
	      </a>
			 </div>
       <button type="button" class="navbar-toggle collapsed" data-toggle="slide" data-target="#bfa-nav-main-menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
		</div>
    <div class="navbar-menu col-md-6 col-lg-pull-2"
         id="bfa-nav-main-menu">
			<?php $nav = new WP_Query('post_type=fp_topic&order=ASC'); ?>
			<div class="nav navbar-nav">
				<?php while( $nav->have_posts() ): $nav->the_post() ?>
					<?php global $post; $slug = $post->post_name; ?>
					<li class="menu-item"><a href="#topic-<?php echo $slug; ?>"><?php the_title() ?></a></li>
				<?php endwhile; ?>
			</div>
      <?php wp_nav_menu( array(
        'theme-location' 	=> 'interstitial-menu',
        'menu'						=> 'interstitial-menu',
        'menu_id'					=> '',
        'menu_class' 			=> 'nav navbar-nav visible-xs',
        'container' 			=> '',
        'fallback_cb'			=> 'wp_bootstrap_navwalker::fallback',
        'walker'					=> new wp_bootstrap_navwalker()
      ))?>
    </div>
    <div class="navbar-interstitial col-md-4 hidden-xs">
      <?php wp_nav_menu( array(
        'theme-location' 	=> 'interstitial-menu',
        'menu'						=> 'interstitial-menu',
        'menu_id'					=> '',
        'menu_class' 			=> 'nav navbar-nav',
        'container' 			=> '',
        'fallback_cb'			=> 'wp_bootstrap_navwalker::fallback',
        'walker'					=> new wp_bootstrap_navwalker()
      ))?>
    </div>
  </div>
</nav>

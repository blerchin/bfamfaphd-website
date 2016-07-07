<nav class="navbar navbar-fixed-top navbar-bfamfaphd ?>">
	<div class="container">
		<div class="navbar-header col-sm-4 col-sm-push-4">
      <a 	class="navbar-title"
          data-toggle="slide"
          data-target="#bfa-nav-main-menu">
        <?php echo get_bfamfaphd_section_name(); ?>
      </a>
		</div>
    <div class="navbar-menu navbar-collapse collapse col-sm-4 col-sm-pull-4"
         id="bfa-nav-main-menu">
      <?php wp_nav_menu( array(
        'theme-location' 	=> 'page-menu',
        'menu'						=> 'page-menu',
        'menu_id'					=> '',
        'menu_class' 			=> 'nav navbar-nav',
        'container' 			=> '',
        'fallback_cb'			=> 'wp_bootstrap_navwalker::fallback',
        'walker'					=> new wp_bootstrap_navwalker()
      ))?>
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
    <div class="navbar-interstitial col-sm-4 hidden-xs">
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

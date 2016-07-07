<nav class="navbar navbar-fixed-top navbar-supply-chains">
	<div class="container">
		<div class="navbar-header col-sm-4 col-sm-push-4">
      <a 	class="navbar-title"
          data-toggle="slide"
          data-target="#bfa-nav-main-menu">
        <?php echo get_bfamfaphd_section_name(); ?>
      </a>
		</div>
    <div class="navbar-menu navbar-collapse collapse col-sm-4 col-sm-pull-4" id="bfa-nav-main-menu">
      <?php wp_nav_menu( array(
        'theme-location' 	=> 'supply-chains-page-menu',
        'menu'						=> 'supply-chains-page-menu',
        'menu_id'					=> '',
        'menu_class' 			=> 'nav navbar-nav',
        'container' 			=> '',
        'fallback_cb'			=> 'wp_bootstrap_navwalker::fallback',
        'walker'					=> new wp_bootstrap_navwalker()
      ))?>
      <?php wp_nav_menu( array(
        'theme-location' 	=> 'supply-chains-menu',
        'menu'						=> 'supply-chains-menu',
        'menu_id'					=> '',
        'menu_class' 			=> 'nav navbar-nav visible-xs',
        'container' 			=> '',
        'fallback_cb'			=> 'wp_bootstrap_navwalker::fallback',
        'walker'					=> new wp_bootstrap_navwalker()
      ))?>
    </div>
    <a class="navbar-logo col-sm-1">
      <span class="dots-logo"></span>
    </a>
  </div>
  <div class="container">
    <div  class="navbar-supply-chains hidden-xs" 
          id="bfa-nav-main-menu">
      <?php wp_nav_menu( array(
        'theme-location' 	=> 'supply-chains-menu',
        'menu'						=> 'supply-chains-menu',
        'menu_id'					=> '',
        'menu_class' 			=> 'nav navbar-nav',
        'container' 			=> '',
        'fallback_cb'			=> 'wp_bootstrap_navwalker::fallback',
        'walker'					=> new wp_bootstrap_navwalker()
      ))?>
    </div>
  </div>
</nav>

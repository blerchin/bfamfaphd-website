<?php global $SUPPLY_MENU; ?>
<nav class="navbar navbar-fixed-top">
	<div class="container">
		<div class="navbar-header col-sm-4 col-sm-push-4">
					<a 	class="navbar-title"
							data-toggle="slide"
							data-target="#bfa-nav-main-menu">
						BFAMFAPhD
					</a>
		</div>
		<div class="collapse navbar-collapse col-sm-4 col-sm-pull-4" id="bfa-nav-main-menu">
			<?php wp_nav_menu( array(
				'theme-location' 	=> 'page-menu',
				'menu'						=> 'page-menu',
				'menu_id'					=> '',
				'menu_class' 			=> 'nav navbar-nav',
				'container' 			=> '',
				'fallback_cb'			=> 'wp_bootstrap_navwalker::fallback',
				'walker'					=> new wp_bootstrap_navwalker()
			))?>
		</div>
		<?php if($SUPPLY_MENU):?>
      <a class="navbar-logo col-sm-1">
            <span class="dots-logo"></span>
      </a>
			<div class="slide lg-in" 
								id="bfa-nav-supply-menu">
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
		<?php endif; ?>
	</div>
</nav>

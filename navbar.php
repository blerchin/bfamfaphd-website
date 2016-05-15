<?php 
$supply_expanded = (get_query_var('post_type') == "supply_chain");
?>
<nav class="navbar navbar-fixed-top">
	<div class="container">
		<div class="navbar-header col-sm-4 col-sm-push-4">
					<a 	class="navbar-title"
							data-toggle="slide"
							data-target="#bfa-nav-supply-menu">
						Of Supply Chains
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
		<a class="navbar-logo col-sm-1"
								href="#"
								data-toggle="collapse"
								data-target="#bfa-nav-main-menu"
								>
					<span class="dots-logo">
		</a>
		<div class="slide <?php echo $supply_expanded ? 'in' : ''?>" 
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
	</div>
</nav>

<?php
function supply_chains_menu($ul_class){
	global $post;
	?>
	<?php $supplyChains = new WP_Query('post_type=supply_chain'); ?>
	<?php if($supplyChains->have_posts()): ?>
		<ul id="menu-supply-chains-menu" class="<?php echo $ul_class; ?>">
		<?php while($supplyChains->have_posts()): $supplyChains->the_post(); ?>
			<?php $post_color = get_post_meta($post->ID, 'color', true); ?>
			<li <?php post_class('menu-item')?>>
				<a href="<?php the_permalink() ?>"
					style="color: <?php echo $post_color; ?>; border-color: <?php echo $post_color; ?>;">
					<?php the_title(); ?>
				</a>
			</li>
		<?php endwhile; ?>
		</ul>
	<?php endif; ?>
<?php
}
?>

<nav class="navbar navbar-fixed-top navbar-supply-chains">
	<div class="container">
		<div class="navbar-header col-sm-4 col-sm-push-4"G>
			<div class="navbar-title-wrap">
	      <a 	class="navbar-title"
						href="/#page-supply-chains">
	        Of Supply Chains
	      </a>
			</div>
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
      <?php
				supply_chains_menu('nav navbar-nav visible-xs');
			/*wp_nav_menu( array(
        'theme-location' 	=> 'supply-chains-menu',
        'menu'						=> 'supply-chains-menu',
        'menu_id'					=> '',
        'menu_class' 			=> 'nav navbar-nav visible-xs',
        'container' 			=> '',
        'fallback_cb'			=> 'wp_bootstrap_navwalker::fallback',
        'walker'					=> new wp_bootstrap_navwalker()
      ))*/?>
    </div>
    <a class="navbar-logo col-sm-1">
      <span class="dots-logo visible-xs"
          data-toggle="slide"
          data-target="#bfa-nav-main-menu"
					>
			</span>
      <span class="dots-logo hidden-xs"
          data-toggle="slide"
          data-target="#bfa-nav-chain-menu"
					>
			</span>
    </a>
  </div>
  <div class="container">
    <div  class="navbar-supply-chains hidden-xs collapse"
          id="bfa-nav-chain-menu">
			<?php
				supply_chains_menu('nav navbar-nav');
				/*
      wp_nav_menu( array(
        'theme-location' 	=> 'supply-chains-menu',
        'menu'						=> 'supply-chains-menu',
        'menu_id'					=> '',
        'menu_class' 			=> 'nav navbar-nav',
        'container' 			=> '',
        'fallback_cb'			=> 'wp_bootstrap_navwalker::fallback',
        'walker'					=> new wp_bootstrap_navwalker()
      ))
			*/
			?>
    </div>
  </div>
</nav>

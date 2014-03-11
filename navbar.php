
<?php
	$args = array(
		'cat' => 1,
	);
	$navbar = new WP_Query($args); 
?>
	<header class="main header bar top">
		<nav class="navbar">
			<ul class="nav navbar">
			<?php if ( is_front_page() ): ?>
				<?php while( $navbar->have_posts() ): $navbar->the_post() ?>
					<li><a href="#<?php the_slug() ?>">
								<?php the_title() ?>
							</a></li>
				<?php endwhile; ?>
			<?php else: ?>
				<li><a href="<?php bloginfo('url')?>">BFA MFA PhD</a>
			<?php endif; ?>
			</ul>
		</nav>
	</header>


<?php
	$args = array(
		'cat' => 1,
	);
	$navbar = new WP_Query($args); 
?>
	<header class="main header bar top">
		<nav class="navbar">
			<ul class="nav navbar">
			<?php while( $navbar->have_posts() ): $navbar->the_post() ?>
				<li><a href="#<?php the_slug() ?>">
							<?php the_title() ?>
						</a></li>
			<?php endwhile; ?>
			</ul>
		</nav>
	</header>

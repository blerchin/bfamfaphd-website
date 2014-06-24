<?php
	$args = array(
		'cat' => 1,
	);
	$navbar = new WP_Query($args); 
?>
	<div class="header">
    <div class="content">
				<h1><a href="<?php bloginfo('url')?>">BFAMFAPhD</a></h1>
			<ul class="navigation">
				<?php while( $navbar->have_posts() ): $navbar->the_post() ?>
					<li><a id="<?php the_slug() ?>" href="#<?php the_slug() ?>">
								<?php the_title() ?>
							</a></li>
				<?php endwhile; ?>
			</ul>
    </div>
	</div>

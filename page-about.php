<?php
global $SHOW_NAVBAR;
//$SHOW_NAVBAR = false;
global $SHOW_CIRCLE;
$SHOW_CIRCLE = false;
?>

<?php get_header() ?>
<div id="page-about" class="page">
	<div class="content">
		<h2>New website coming soon...</h2>
		<div class="row-landing">
			<div class="landing-image-wrapper">
				<div class="supply-chains landing-image">
					<a href="/cards"></a>
				</div>
				<a href="/cards">Launch 2016 <i>Of Supply Chains</i> Card Game</a>
			</div>
			<div class="landing-image-wrapper">
				<div class="artists-report landing-image">
					<a href="http://goo.gl/N2AYyx"></a>
				</div>
				<a href="http://goo.gl/N2AYyx">Download 2014 <i>Artists Report Back</i></a>
				
			</div>
		</div>

		<?php if(have_posts()):?>
		<?php while(have_posts()): ?>
		<?php the_post()?>
		<?php the_content() ?>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>


<?php get_footer() ?>


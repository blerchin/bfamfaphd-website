		</div>
		<?php wp_footer() ?>

<?php $supplyChains = get_posts(array(
		'post_type' =>'supply_chain',
		'posts_per_page' =>'100'
	));
		foreach( $supplyChains as $key => $post){
			$supplyChains[$key]->meta_color = get_post_meta( $post->ID, 'color', true);
			$thumb_id = get_post_thumbnail_id($post->ID);
			$supplyChains[$key]->post_thumbnail_uri = wp_get_attachment_url( $thumb_id);
			$supplyChains[$key]->permalink = get_permalink($post->ID);
		}
		$supplyChainsJson = json_encode($supplyChains);
?>

		<script type="text/javascript">
			window.g = {};
			window.g.supplyChains = <?php echo $supplyChainsJson; ?>
			
		</script>

		<?php $dev = false ?>
		<?php if($dev): ?>
			<script type="text/javascript" src="http://localhost:3000/bundle.js"></script>
		<?php else: ?>
			<script type="text/javascript" 
			src="<?php echo get_stylesheet_directory_uri() . "/dist/bundle.js" ?>">
			</script>
		<?php endif; ?>
  </body>
</html>

		<?php $dev = preg_match('/local$/', $_SERVER['HTTP_HOST']) ?>

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

		<?php if($dev): ?>
			<script type="text/javascript" src="//localhost:3000/index.js"></script>
			<link rel="stylesheet" type="text/css" href="//localhost:3000/index.css"></link>
		<?php else: ?>
			<script type="text/javascript" 
			src="<?php echo get_stylesheet_directory_uri() . "/dist/index.js" ?>"></script>
			<link rel="stylesheet" type="text/css" href="/index.css"></link>
		<?php endif; ?>

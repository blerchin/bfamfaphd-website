		<?php $dev = preg_match('/local$/', $_SERVER['HTTP_HOST']) ?>

		<?php
			$cardsJson = get_posts_json('card');
			$supplyChainsJson = get_posts_json('supply_chain');
		?>

		<script type="text/javascript">
			window.g = {};
			window.g.supplyChains = <?php echo $supplyChainsJson; ?>;
			window.g.cards 				= <?php echo $cardsJson; ?>;

		</script>

		<?php if($dev): ?>
			<script type="text/javascript" src="//localhost:3000/index.js"></script>
			<link rel="stylesheet" type="text/css" href="//localhost:3000/index.css"></link>
		<?php else: ?>
			<script type="text/javascript"
			src="<?php echo get_stylesheet_directory_uri() . "/dist/index.js" ?>"></script>
			<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . "/dist/index.css" ?>"></link>
		<?php endif; ?>

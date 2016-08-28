<?php
function supply_chain_render_cards($category){
	$cards = get_posts(array(
		'post_type' => 'card',
		'category_name' => $category,
		'order' => 'rand',
    'posts_per_page' => 12
	));
  ?>
  <div class="article-cards">
  <?php foreach ($cards as $card) {?>
    <?php
      $card_photo = get_field('card_photo', $card->ID);
      if(!empty($card_photo)){
        $card_caption = $card_photo['caption'];
        $card_photo = $card_photo['sizes']['large'];
      }
    ?>

  	<div class="article-media row">
  		<div class="article-card">
				<img src="<?php echo get_the_post_thumbnail_url($card->ID, 'medium'); ?>" />
  		</div>
  		<div class="article-card-image-wrapper">
  			<div class="article-card-image"
  				style="background-image: url('<?php echo $card_photo; ?>');">
  			</div>
  			<div class="article-card-image-caption">
  				<?php echo $card_caption; ?>
  			</div>
  		</div>
  	</div>
  <?php }; ?>
</div>
  <?php
}

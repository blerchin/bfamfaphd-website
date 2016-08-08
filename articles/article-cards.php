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
      $card_image = get_field('card_image', $card->ID);
      $card_caption = $card_image['caption'];
      if(!empty($card_image)){
        $card_image = $card_image['sizes']['large'];
      }
    ?>

  	<div class="article-media">
  		<div class="article-card">
  			<img src="<?php echo get_the_post_thumbnail_url($card->ID, 'medium'); ?>" />
  		</div>
  		<div class="article-secondary-image-wrapper">
  			<div class="article-secondary-image"
  				style="background-image: url('<?php echo $card_image; ?>');">
  			</div>
  			<div class="article-secondary-image-caption">
  				<?php echo $card_caption; ?>
  			</div>
  		</div>
  	</div>
  <?php }; ?>
</div>
  <?php
}

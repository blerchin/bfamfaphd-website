<?php global $SHOW_CIRCLE; ?>
<div id="game">
		<div id="cards">
			<?php if(is_front_page()): ?>
				<button id="drawCardsToggle" data-target="#drawCardsContainer" data-toggle="slide">
					<span class="arrow">↓</span>
					<span class="text">Project Ideas</span>
					<span class="arrow">↓</span>
				</button>
			<?php endif; ?>
			<div id="drawCardsContainer" class="slide 
				<?php echo (is_front_page() ? '' : 'in') ?>
				">
				<div class="cardsWrapper">
					<div class="cards">
						<div class="card card-1">
							<div class="img"></div>
						</div>
						<div class="card card-2">
							<div class="img"></div>
						</div>
						<div class="card card-3">
							<div class="img"></div>
						</div>
					</div>
				</div>
				<div class="story">
				</div>
				<div id="refreshButton">
				</div>
				<div id="instructionsButton">
					<a href="<?php echo get_template_directory_uri()?>/assets/documents/Protocol.pdf"></a>
				</div>
			</div>
			<?php if($SHOW_CIRCLE == true): ?>
				<div id="circle"></div>
			<?php endif;?>
		</div>
</div>

<?php global $SHOW_CIRCLE;
$cards_in = $SHOW_CIRCLE ? '' : 'in';
?>
<div id="game-wrap">
	<div id="game">
			<div id="cards">
				<?php if($SHOW_CIRCLE): ?>
		      <button id="drawCardsToggle" data-target="#drawCardsContainer" data-toggle="slide">
		        <span class="arrow">↓</span>
		        <span class="text">Project Ideas</span>
		        <span class="arrow">↓</span>
		      </button>
				<?php endif; ?>
				<div id="drawCardsContainer" class="slide <?php echo $cards_in; ?>">
					<div class="cardsWrapper">
						<div class="cards">
							<div class="card card-1">
								<div class="img">
									<img />
								</div>
								<div class="back">
									<img />
								</div>
							</div>
							<div class="card card-2">
								<div class="img">
									<img />
								</div>
								<div class="back">
									<img />
								</div>
							</div>
							<div class="card card-3">
								<div class="img">
									<img />
								</div>
								<div class="back">
									<img />
								</div>
							</div>
							<div class="deck">
								<div class="img">
									<img src="/wp-content/uploads/2016/06/Cards-V.4-Backs-41.png" />
								</div>
								<div class="back">
									<img src="/wp-content/uploads/2016/06/Cards-V.4-Backs-41.png" />
								</div>
							</div>
						</div>
						<div class="story">
							<p>Click the deck to generate project ideas.</p>
						</div>
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
	<div id="notice">
		<p>Notice: what might have to change individually, interpersonally, and
			institutionally to make this practice possible on a daily basis?
			Locate these generative contradictions.
		</p>
	</div>
</div>

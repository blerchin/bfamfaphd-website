<div id="game">
	<?php if(is_front_page()): ?>
		<div id="cards">
			<button id="drawCardsToggle" data-target="#drawCardsMock" data-toggle="slide">
				<span class="arrow">↓</span>
				<span class="text">Draw Three Cards</span>
				<span class="arrow">↓</span>
			</button>
			<div id="drawCardsMock" class="slide">
				<div class="mockup">
				</div>
			</div>
			<div id="circle"></div>
		</div>
	<?php endif; ?>
</div>

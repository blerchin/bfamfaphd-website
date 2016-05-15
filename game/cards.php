<div id="game">
	<?php if(is_front_page()): ?>
		<div id="cards">
			<button id="drawCardsToggle" data-target="#drawCardsMock" data-toggle="collapse">Draw Three Cards</button>
			<div id="drawCardsMock" class="collapse">
				<div class="mockup">
				</div>
			</div>
			<div id="circle"></div>
		</div>
	<?php endif; ?>
</div>

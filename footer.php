		</div>

		<?php $dev = true ?>
		<?php if($dev): ?>
			<script type="text/javascript" src="http://localhost:3000/bundle.js"></script>
		<?php else: ?>
			<script type="text/javascript" src="dist/bundle.js"></script>
		<?php endif; ?>
  </body>
</html>

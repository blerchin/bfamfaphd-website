$(document).ready(function() {
		$.stellar({
				responsive: true,
				horizontalScrolling: false,
				verticalOffset: 10
			});
		$('nav').scrollspy().localScroll({
			offset: {top:-70},
			hash: true
		});

	});

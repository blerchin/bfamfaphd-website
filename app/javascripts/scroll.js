$(document).ready(function() {
		$('nav').localScroll({
			offset: {top: -70},
			hash: true
		});
		$('body').scrollspy({
			offset: 70,
			target: 'nav'
		});

	});

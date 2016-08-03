$(document).ready(function(){
	var slide = document.querySelectorAll('[data-toggle=slide]');
	for(var i=0; i<slide.length; i++){
		slide[i].addEventListener('click', function(evt){
			var id = this.getAttribute('data-target');
			var $button = $(`[data-target='${id}']`);
			var target = document.querySelector(id);
			var $target = $(target);
			if($target.hasClass('in')){
				$target.removeClass('in');
				$button.attr('aria-expanded', 'false');
				$target.trigger('collapse:out');
			} else {
				$target.addClass('in');
				$button.attr('aria-expanded', 'true');
				$target.trigger('collapse:in');
			}
		});
	}
	var slide = document.querySelectorAll('[data-toggle=supply-chain]');
	for(var i=0; i<slide.length; i++){
		slide[i].addEventListener('click', function(evt){
			var $button = $(this);
			var target = this.parentNode.querySelector('.supply-chain-collapse')
			var $target = $(target);
			if($target.hasClass('in')){
				$target.removeClass('in');
				$button.attr('aria-expanded', 'false');
				$target.trigger('collapse:out');
			} else {
				$target.addClass('in');
				$button.attr('aria-expanded', 'true');
				$target.trigger('collapse:in');
			}
		});
	}
});

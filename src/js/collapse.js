$(document).ready(function(){
	var slide = document.querySelectorAll('[data-toggle=slide]');
	for(var i=0; i<slide.length; i++){
		slide[i].addEventListener('click', function(evt){
			console.log(this);
			var $button = $(this);
			var target = document.querySelector(this.getAttribute('data-target'));
			var $target = $(target);
			if($target.hasClass('in')){
				$target.removeClass('in');
				$button.attr('aria-expanded', 'false');
			} else {
				$target.addClass('in');
				$button.attr('aria-expanded', 'true');
			}
		});
	}
});

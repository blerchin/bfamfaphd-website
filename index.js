require('./scss/fonts.scss');
require('./scss/index.scss');
require('bootstrap-webpack')

require('./src/js/collapse');

const Circle = require('./src/js/circle');

var circleContainer = document.getElementById('circle');
var supplyChains = window.g.supplyChains.map(function(chain){
	return {
		key: chain.post_name,
		name: chain.post_title,
		color: chain.meta_color,
		path: chain.permalink,
		imageSrc: chain.post_thumbnail_uri
	};
})
console.log(supplyChains);
var circle = new Circle({
	el: circleContainer,
	items: supplyChains

});


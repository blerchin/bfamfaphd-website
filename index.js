require('./scss/fonts.scss');
require('./scss/index.scss');
require('bootstrap-webpack')

const Circle = require('./src/js/circle');

var circleContainer = document.getElementById('circle');
var circle = new Circle({
	el: circleContainer
});


require('bootstrap-sass/assets/javascripts/bootstrap.js');
require('./scss/fonts.scss');
require('./scss/index.scss');

const Circle = require('./src/js/circle');

var circleContainer = document.getElementById('circle');
var circle = new Circle({
	el: circleContainer
});

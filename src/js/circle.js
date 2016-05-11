const SVG_NS = "http://www.w3.org/2000/svg";
const XLINK_NS = "http://www.w3.org/1999/xlink";
const FADE_TIME = 500;
const PI = Math.PI;

const DEFAULT_ITEMS = [
	{
		key: 'source',
		name: 'Source',
		color: 'rgb(255,94,60)',
		imageSrc: require('../../assets/images/cards/placeholder.jpg')
	},
	{
		key: 'labor',
		name: 'Labor',
		color: 'rgb(46,111,215)',
		imageSrc: require('../../assets/images/cards/placeholder-alt.jpg')
	},
	{
		key: 'tool',
		name: 'Tool',
		color: 'rgb(255,226,83)',
		imageSrc: require('../../assets/images/cards/placeholder.jpg')
	},
	{
		key: 'transfer',
		name: 'Transfer',
		color: 'rgb(156,127,209)',
		imageSrc: require('../../assets/images/cards/placeholder-alt.jpg')
	},
	{
		key: 'copyright',
		name: 'Copyright',
		color: 'rgb(233,160,180)',
		imageSrc: require('../../assets/images/cards/placeholder.jpg')
	}, 
	{
		key: 'narrate',
		name: 'Narrate',
		color: 'rgb(253,131, 0)',
		imageSrc: require('../../assets/images/cards/placeholder-alt.jpg')
	},
	{
		key: 'encounter',
		name: 'Encounter',
		color: 'rgb(130,217,247)',
		imageSrc: require('../../assets/images/cards/placeholder.jpg')
	},
	{
		key: 'acquire',
		name: 'Acquire',
		color: 'rgb(254,207,215)',
		imageSrc: require('../../assets/images/cards/placeholder-alt.jpg')
	},
	{
		key: 'support',
		name: '$upport',
		color: 'rgb(165,238,211)',
		imageSrc: require('../../assets/images/cards/placeholder.jpg')
	},
	{
		key: 'depart',
		name: 'Depart',
		color: 'rgb(142,194,208)',
		imageSrc: require('../../assets/images/cards/placeholder-alt.jpg')
	}
];

const Circle = function(attr){
	this.el = attr.el;
	this.padding = attr.padding || 100;
	this.items = attr.items || DEFAULT_ITEMS;
	this.currentItem = this.items[0];
	this.setup();
	this.draw();
	window.addEventListener('resize', this.onResize.bind(this));
};

Circle.prototype.onResize = function(){
	this.setup();
	this.draw();
};

Circle.prototype.setup = function(){
	this.radius = (this.el.offsetWidth - 2 * this.padding) / 2;
};


Circle.prototype.draw = function(){
	while(this.el.children.length){
		this.el.children[0].remove();
	}
	this.svg = document.createElementNS(SVG_NS, 'svg');
	this.el.appendChild(this.svg);
	this.svg.setAttribute('height', 2 * this.radius + 2 * this.padding);
	this.svg.setAttribute('width', 2 * this.radius + 2 * this.padding);
	this.svg.setAttribute('xmlns',SVG_NS);
	this.svg.setAttribute('xmlns:xlink', XLINK_NS);
	this.drawContent();
	this.drawCircle();
	this.drawLabels();
};

Circle.prototype.drawContent = function(){
	this.content = document.createElementNS(SVG_NS, 'g');
	this.content.style.transition = `opacity ease-in-out ${FADE_TIME}ms`;
	this.svg.appendChild(this.content);
	this.updateContent();
};

Circle.prototype.updateContent = function(){
	while(this.content.children.length){
		this.content.children[0].remove();
	}
	let item = this.currentItem;
	if(item && item.imageSrc){
		let img = document.createElementNS(SVG_NS, 'image');
		img.setAttributeNS(XLINK_NS, 'xlink:href', item.imageSrc)
		img.setAttribute('y', this.padding);
		img.setAttribute('x', this.padding);
		img.setAttribute('preserveAspectRatio', 'xMidYMid slice');
		img.setAttribute('width', 2 * this.radius);
		img.setAttribute('height', 2 * this.radius);

		this.content.appendChild(img);
	}
};

Circle.prototype.drawCircle = function(){
	var overlay = document.createElementNS(SVG_NS, 'rect');
	overlay.setAttribute('id', 'circleOverlay');
	overlay.setAttribute('width', 2 * this.radius + 2 * this.padding);
	overlay.setAttribute('height', 2 * this.radius + 2 * this.padding);
	overlay.setAttribute('mask', 'url(#circleMask)')

	this.defs = document.createElementNS(SVG_NS, 'defs');

	var mask = document.createElementNS(SVG_NS, 'mask');
	mask.setAttribute('id', 'circleMask');
	this.defs.appendChild(mask);

	var circle = document.createElementNS(SVG_NS, 'circle')
	circle.setAttribute('r', this.radius);
	circle.setAttribute('fill', 'black');
	circle.setAttribute('transform', `translate(${this.radius + this.padding} ${this.radius + this.padding})`)

	var rect = document.createElementNS(SVG_NS, 'rect')
	rect.setAttribute('width', 2 * this.radius + 2 * this.padding);
	rect.setAttribute('height', 2 * this.radius + 2 * this.padding);
	rect.setAttribute('fill', 'white');

	mask.appendChild(rect);
	mask.appendChild(circle);

	this.svg.appendChild(this.defs);
	this.svg.appendChild(overlay);
};

Circle.prototype.drawLabels = function(){
	let inc = (2 * PI) / this.items.length;
	this.items.forEach(function(item, i){
		this.drawLabel(i * inc - PI/2, item);
	}.bind(this));
};

Circle.prototype.drawLabel = function(theta, item){
	let g = document.createElementNS(SVG_NS, 'g');
	g.setAttribute('id', `label-${item.key}`);
	g.setAttribute('class', 'label');

	let r = this.radius + (this.padding / 2);
	let y = this.padding/2 + r * Math.sin(theta) + r;
	let x = this.padding/2 + r * Math.cos(theta) + r;
	let theta1 = (theta + PI/2) / PI * 180;
	g.setAttribute('transform', `translate(${x} ${y}), rotate(${theta1})`)

	let textPathId = `label-${item.key}-path`;
	let textPath = document.createElementNS(SVG_NS, 'path')
	textPath.setAttribute('id',textPathId)
	textPath.setAttribute('d', `M${-1 * r},${r}`
												+ `C${-1 * r},${.33 * r} ${-.4 * r},0 0,0`
											  + `C${.4 * r},0 ${r},${.33 * r} ${r},${r}`);
	this.defs.appendChild(textPath);
	
	let text = document.createElementNS(SVG_NS, 'text');
	let textPathEl = document.createElementNS(SVG_NS, 'textPath')
	textPathEl.setAttributeNS(XLINK_NS, 'xlink:href',`#${textPathId}` )
	textPathEl.textContent = item.name;
	textPathEl.setAttribute('startOffset', '50%');
	text.appendChild(textPathEl);
	text.setAttribute('text-anchor', 'middle');
	text.setAttribute('fill', item.color);
	g.appendChild(text);

	let arrow = document.createElementNS(SVG_NS, 'text');
	arrow.textContent = "↓";
	arrow.setAttribute('class', 'arrow');
	arrow.setAttribute('y', 25);
	arrow.setAttribute('fill', item.color);
	arrow.setAttribute('text-anchor', 'middle');
	g.appendChild(arrow);

	g.addEventListener('click', (e)=>{
		this.onLabelClicked(item, e);
	});
	this.svg.appendChild(g);
};

Circle.prototype.setCurrentItem = function(item){
	this.content.style.opacity = 0;
	this.contentAnimating = true;
	setTimeout( ()=>{
		this.currentItem = item;
		this.updateContent();
		this.content.style.opacity = 1;
		this.contentAnimating = false;

	}, FADE_TIME)
};

Circle.prototype.onLabelClicked = function(item, evt){
	this.setCurrentItem(item);
};

module.exports = Circle;

const SVG_NS = "http://www.w3.org/2000/svg";
const XLINK_NS = "http://www.w3.org/1999/xlink";
const FADE_TIME = 500;
const PI = Math.PI;


const Circle = function(attr){
	this.el = attr.el;
	this.padding = attr.padding || 100;
	this.items = attr.items;
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
	let maxWidth = this.el.offsetWidth;
	let winHeight = window.innerHeight - 100; 
	let outerDiameter = maxWidth > winHeight ? winHeight : maxWidth;
	this.radius = outerDiameter/2 - this.padding;
};


Circle.prototype.draw = function(){
	while(this.el.children.length){
		this.el.children[0].remove();
	}
	this.svg = document.createElementNS(SVG_NS, 'svg');
	this.el.appendChild(this.svg);
	this.svg.setAttribute('height', 2 * this.radius + 2 * this.padding);
	this.svg.setAttribute('width', 2 * this.radius + 2 * this.padding);
	this.svg.setAttribute('xmlns', SVG_NS);
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

Circle.prototype.onContentClicked = function(){
	location.replace(this.currentItem.path);
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

	var clickable = document.createElementNS(SVG_NS, 'circle');
	clickable.setAttribute('r', this.radius);
	clickable.setAttribute('id', 'contentClickable');
	clickable.setAttribute('fill', 'transparent');
	clickable.setAttribute('transform', `translate(${this.radius + this.padding} ${this.radius + this.padding})`)
	clickable.addEventListener('click', this.onContentClicked.bind(this))
	this.svg.appendChild(clickable);

};

Circle.prototype.drawLabels = function(){
	let inc = (2 * PI) / this.items.length;
	this.labels = document.createElementNS(SVG_NS, 'g');
	this.labels.setAttribute('id', 'labelContainer');
	this.svg.appendChild(this.labels);
	this.items.forEach(function(item, i){
		this.drawLabel(i * inc - PI/2, item);
	}.bind(this));
};

Circle.prototype.rotateToCurrent = function(){
	let i = this.items.indexOf(this.currentItem);
	let len = this.items.length;
	let rot = -1 * (360 * (i/len));
	let r = this.radius + this.padding;
	this.labels.style.transform = `rotate(${rot}deg)`;
};

Circle.prototype.getLabelId = function(item){
	return `label-${item.key}`;
};

Circle.prototype.drawLabel = function(theta, item){
	let g = document.createElementNS(SVG_NS, 'g');
	g.setAttribute('id', this.getLabelId(item));
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
	this.labels.appendChild(g);
};

Circle.prototype.setActiveLabel = function(item){
	for(let i = 0; i < this.labels.children.length; i++){
		this.labels.children[i].setAttribute('class', 'label');
	}
	let active = document.getElementById(this.getLabelId(item))
	active.setAttribute('class','label active');
};

Circle.prototype.setCurrentItemKey = function(key){
	for(let i=0; i<this.items.length; i++){
		if(item.key === key){
			this.setCurrentItem(item);
			return true;
		}
	}
	return false;
};

Circle.prototype.setCurrentItem = function(item){
	this.content.style.opacity = 0;
	this.contentAnimating = true;
	this.setActiveLabel(item);
	setTimeout( ()=>{
		this.currentItem = item;
		this.updateContent();
		this.rotateToCurrent();
		this.content.style.opacity = 1;
		this.contentAnimating = false;

	}, FADE_TIME)
};

Circle.prototype.onLabelClicked = function(item, evt){
	this.setCurrentItem(item);
};

module.exports = Circle;

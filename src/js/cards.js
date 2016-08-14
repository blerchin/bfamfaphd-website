const _ = require('lodash');
const Cards = function(attr){
	this.el = attr.el;
	this.$el = $(this.el);
	this.cards = attr.cards;
	this.order = attr.order;
	this.drawSize = this.$el.find('.card').length;
	this.$el.on('collapse:in', this.draw.bind(this));
	this.$el.find('#refreshButton').click(this.draw.bind(this));
	this.draw();
	$(window).on('resize', this.draw.bind(this));
};

Cards.prototype.draw = function(){
	let cards = this.getCards();
	let cardEls = this.$el.find('.card');
	let cardFronts = this.$el.find('.card .img');
	let cardBacks = this.$el.find('.card .back');
	cardEls.removeClass('flipped');
	for(let i=0; i<cards.length; i++){
		let card = cards[i];
		let $cardEl = $(cardEls[i]);
		let $front = $(cardFronts[i]);
		$front.css('background-image', `url(${card.imageSrc})`);
		let $back = $(cardBacks[i]);
		$back.css('background-image', `url(${card.backImageSrc})`);
		setTimeout(function(){
			$cardEl.addClass('flipped')
		}, (i+1) * 1000);
	}
	this.drawStory(cards);
	this.$el.find('.cardsWrapper').scrollLeft(0);
};

Cards.prototype.getCards = function(){
	return this.sortByCategory(
		this.dedupe(this.getRandomCards)()
	);
};

Cards.prototype.drawStory = function(cards){
	var p = this.$el.find('.story')
				.empty()
				.append('<p>'+this.getStory(cards)+'</p>');
	this.sizeCards(p.height());
};

Cards.prototype.sizeCards = function(storyHeight){
	var h = this.$el.height() - storyHeight;
	var $cards = this.$el.find('.cards');
	$cards.outerHeight(h);
};

Cards.prototype.getStory = function(cards){
	return `Make a project by ${cards[0].excerpt}, ` +
				 `${cards[1].excerpt}, and ${cards[2].excerpt}.`
};

Cards.prototype.compare = function(card1, card2){
	return card1.category === card2.category;

};

Cards.prototype.hasDupes = function(arr){
		for(let i=0; i<arr.length; i++){
			for(let j=0; j<arr.length; j++){
				if(i !== j && this.compare(arr[i], arr[j])){
					return true;
				}
			}
		}
		return false;
};

Cards.prototype.sortByCategory = function(arr){
	return _.sortBy(arr, (item)=>{
		return this.order.indexOf(item.category);
	});
};

Cards.prototype.dedupe = function(generator){
	return ()=>{
		let results = generator.apply(this);
		let tries = 0;
		while(this.hasDupes(results)){
			if(++tries > 100){
				break;
			}
			results = generator.apply(this);
		}
		return results;
	};
};

Cards.prototype.getRandomCards = function(){
	return this.getRandomIndices().map((i)=>{
		return this.cards[i];
	});
};

Cards.prototype.getRandomIndices = function(){
	let indices = Array.apply(null, Array(this.drawSize));
	return indices.map(()=> this.getRandomIndex());
};

Cards.prototype.getRandomIndex = function(){
	return Math.floor(Math.random() * this.cards.length);
};

module.exports = Cards;

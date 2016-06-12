const Cards = function(attr){
	this.el = attr.el;
	this.$el = $(this.el);
	this.cards = attr.cards;
	this.drawSize = this.$el.find('.card').length;
	this.$el.on('collapse:in', this.draw.bind(this));
	this.$el.find('#refreshButton').click(this.draw.bind(this));
	this.draw();
};

Cards.prototype.draw = function(){
	let cards = this.getCards();
	let cardEls = this.$el.find('.card'); 
	for(let i=0; i<cards.length; i++){
		let card = cards[i];
		let $el = $(cardEls[i]);
		console.log($el);
		$el.empty();
		$el.append(`<img src="${card.imageSrc}"/>`);
	}
	this.drawStory(cards);
};

Cards.prototype.getCards = function(){
	return this.dedupe(this.getRandomIndices)().map((i)=>{
		return this.cards[i];
	})
};

Cards.prototype.drawStory = function(cards){
	var p = this.$el.find('.story')
				.empty()
				.append('<p>'+this.getStory(cards)+'</p>');
};

Cards.prototype.getStory = function(cards){
	return `Make a project by ${cards[0].excerpt}, ` +
				 `${cards[1].excerpt}, and ${cards[2].excerpt}.`
};

Cards.prototype.dedupe = function(generator){
	return ()=>{
		let results = generator.apply(this);
		function hasDupes(arr){
			for(let i=0; i<arr.length; i++){
				for(let j=0; j<arr.length; j++){
					if(i !== j && arr[i] === arr[j]){
						return true;
					}
				}
			}
			return false;
		};
		let tries = 0;
		while(hasDupes(results)){
			if(++tries > 100){
				break;
			}
			results = generator.apply(this);
		}
		return results;
	};
};

Cards.prototype.getRandomIndices = function(){
	let indices = Array.apply(null, Array(this.drawSize));
	return indices.map(()=> this.getRandomIndex());
};

Cards.prototype.getRandomIndex = function(){
	return Math.floor(Math.random() * this.cards.length);
};

module.exports = Cards;

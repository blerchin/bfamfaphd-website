require('./scss/fonts.scss');
require('./scss/index.scss');
require('bootstrap-webpack');
//require('./src/js/jquery.form-n-validate');
//require('./src/js/mailchimp');

require('./src/js/collapse');

const Flickity = require('flickity');

const Circle = require('./src/js/circle');
const Cards = require('./src/js/cards');

$(document).ready(function(){

	var circleContainer = document.getElementById('circle');
	if(circleContainer){
		var supplyChains = window.g.supplyChains.map(function(chain){
			return {
				key: chain.post_name,
				name: chain.post_title,
				color: chain.meta_color,
				path: chain.permalink,
				imageSrc: chain.post_thumbnail_uri
			};
		})
		var circle = new Circle({
			el: circleContainer,
			items: supplyChains
		});
	}
	var cardsContainer = document.getElementById('drawCardsContainer');
  if(cardsContainer && window.g.cards){
    var cards = window.g.cards.map(function(card){
      return {
        key: card.post_name,
        name: card.post_title,
        imageSrc: card.post_thumbnail_uri,
        excerpt: card.post_excerpt,
        category: card.post_category
      };
    })
    var cards = new Cards({
      el: cardsContainer,
      cards: cards,
      order: window.g.supplyChains.map((c)=> c.post_title)
    })
  }
	$(window).resize(resizeIframe)
	resizeIframe()
	cardsCarousel()

});

function resizeIframe(){
	var iframes = document.getElementsByTagName('iframe');
	for (let i=0; i<iframes.length; i++) {
		let o = iframes[i]
	  if(/vimeo/.test(o.getAttribute('src'))){
			let ratio = o.getAttribute('width') / o.getAttribute('height')
			o.setAttribute('width', o.parentNode.offsetWidth)
			o.setAttribute('height', o.parentNode.offsetWidth / ratio)
		}
	}
}

function cardsCarousel(){
	const cards = document.getElementsByClassName('article-cards');
	if(cards.length){
		const flk = new Flickity(cards[0], {
			adaptiveHeight: true,
			pageDots: false
		})
	}
	/*
	if(cards.length){
		for(let i=0; i<cards.length; i++){
			let width = 0;
			for(let j=0; j<cards[i].children.length; j++){
				width += cards[i].children[j].offsetWidth;
			}
			cards[i].style.width = width + 'px';
		}
	}
	*/

}

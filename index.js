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
				backImageSrc: card.card_back_image_uri,
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
  $(window).resize(function(){
    resizeIframe()
    resizeFeature();
  })
	resizeIframe()
  resizeFeature();
	cardsCarousel()

});

function resizeFeature(){
  const featureImgs = document.getElementsByClassName('feature-image');
  const ratio = 4/3;
  console.log(featureImgs)
  let img, w;
	for (let i=0; i<featureImgs.length; i++) {
    img = $(featureImgs[i]);
    w = img.closest('.feature-wrapper').width();
    img.css('width', w + 'px');
    img.css('height', (w / ratio) + 'px');
  }
}

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
  for(let i=0; i<cards.length; i++){
		const flk = new Flickity(cards[i], {
			adaptiveHeight: true,
			pageDots: false
		})
  }
}

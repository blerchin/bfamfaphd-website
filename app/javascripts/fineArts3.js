$(function() {

d3.json("fineArts.json", function(error, data) {

console.log("hello");
// console.log(data[0].BFA);


var graphView = d3.select("#arts").append("svg")
 .attr({
 	"width":"100%",
 	"height":"100%"
 })

// .attr("viewBox", "0 0" + width + " " + height)
// .attr("viewBox","preserveAspectRatio","xMinYMin");

var maxTotal = 30550;
var margin = 100;
var width = $('#arts').width();
var height = $('#arts').height();
var maStroke = 10;
var baStroke = 10;

var alongWidth = d3.scale.linear()
	.domain([0, 25])
	.range([margin, width-margin]);

var alltheway = d3.scale.linear()
	.domain([0, 25])
	.range([width-margin, margin]);

var rectScale = d3.scale.linear()
	.domain([0, maxTotal])
	.range([0, height-margin]);

var rectBFA = graphView.selectAll("rect")
.data(function(d){
	return data;
})
.enter().append("rect")
.attr("class", "rectBA")
.attr("x", function(d,i){
	return alongWidth(i);
})
.attr("y", function(d){
	return height-rectScale(d.BFA);
})
.attr("width", function(d,i){
	return alltheway(i);
})
.attr("height", function(d,i){
	return rectScale(d.BFA);
})
.attr("stroke", "white")
.attr("stroke-width", 1)
.attr("fill", "blue")
.attr("opacity",".1");
    // .on('click', function(d,i){
    // 	console.log("mouseoverBA")
      // d3.select(this)
      // .transition()
      // .attr("stroke","black")
      // .attr("stroke-width",4)
	// fanBA(this.Year, this.x, this.y);
    // });

  $('toggle').hoverIntent({
    over: function(){
	    console.log("hovering")
	fanBA(1995,8);
    },
    out: function(){
    }
  })

// function fanBA(thisyear,i){
// var rectFAN = graphView.selectAll("rectBFA rect").select("rect")
// .data(function(d){
// 	return data;
// 	console.log(data)
// })
// .enter().append("rect")
// .attr("x", function(d,i){
// 	if(d.Year==thisyear){
// 	return alongWidth(i);
// 	}
// 	else {
// 		return -10;
// 	}
// })
// .attr("y", function(d){
// 	// if(d.Year==thisyear){
// 	// return thisy;
// 	// }
// 	return 20;
// })
// .attr("width", maStroke)
// .attr("height", function(d,i){
// 	return rectScale(d.baWomen);
// })
// .attr("stroke", "white")
// .attr("stroke-width", 1)
// .attr("fill", "gray")
// .attr("opacity",".4")
// }










var rectMA = graphView.selectAll("rectBFA rect").select("rect ma")
.data(function(d){
	return data;
})
.enter().append("rect")
.attr("x", function(d,i){
	return alongWidth(i);
})
.attr("y", function(d){
	return height-rectScale(d.MA);
})
.attr("width", function(d,i){
	return alltheway(i);
})
.attr("height", function(d,i){
	return rectScale(d.MA);
})
.attr("stroke", "white")
.attr("fill", "red")
.attr("stroke-width", "2")
// .attr("stroke-width",baStroke)
.attr("opacity",".05");








var rectPD = graphView.selectAll("rectBFA rect").select("rect pd")
.data(function(d){
	return data;
})
.enter().append("rect")
.attr("x", function(d,i){
	return alongWidth(i);
})
.attr("y", function(d){
	return height-rectScale(d.PhD);
})
.attr("width", function(d,i){
	return alltheway(i);
})
.attr("height", function(d,i){
	return rectScale(d.PhD);
})
// .attr("stroke", "white")
// .attr("stroke-width", "1")
.attr("fill", "green")
// .attr("stroke-width",baStroke)
.attr("opacity","1");




var rectAll = graphView.selectAll("rectBFA rect").select("rect")
.data(function(d){
	return data;
})
.enter().append("rect")
.attr("x", function(d,i){
	return alongWidth(i);
})
.attr("y", function(d){
	return 0;
})
.attr("width", function(d,i){
	 return alltheway(i);
})
.attr("height", function(d,i){
	return height;
})
.attr("stroke", "black")
.attr("stroke-width", "1")
.attr("fill", "white")
// .attr("stroke-width",baStroke)
.attr("opacity",".01");



  $('rect').tipsy({ 
        gravity: 'nw', 
        html: true, 
        //fade: true,
        title: function() {
          var d = this.__data__;
          // var intit = parseInt(d.BFA);
          return d.BFA+" BA Degrees / "+d.MA+" MA degrees / "+d.PhD+" PhD degrees";
        }
      });






// var rectBA = graphView.selectAll("rect")
// .data(function(d){
// 	return data;
// })
// .enter().append("rect")
// .attr("x", function(d,i){
// 	return alongWidth(i);
// })
// .attr("y", function(d){
// 	return height/2-rectScale(d.BFA);
// })
// .attr("width", 10)
// .attr("height", function(d,i){
// 	// console.log(d.BFA);
// 	return rectScale(d.BFA);	
// })
// .attr("fill", function(d){
// 	if(d.BFA){
// 		return "blue";
// 	}
// 	if(d.MA){
// 		return "pink";
// 	}
// })
// .attr("opacity",".6");



var xaxisy = d3.scale.ordinal()
    .domain([1987,
1988,
1989,
1990,
1991,
1992,
1993,
1994,
1995,
1996,
1997,
1998,
1999,
2000,
2001,
2002,
2003,
2004,
2005,
2006,
2007,
2008,
2009,
2010,
2011,
2012])
    .rangePoints([0, width-margin]);

var xAxis = d3.svg.axis()
	.scale(xaxisy)
	.orient("bottom");

var svg = d3.select("#arts").append("svg")
	.attr("width", width+margin*2)
	.attr("height", height/2)
	.append("g")
	.attr("transform", "translate(" + margin +","+0+")");

svg.append("g")
	.attr("class", "x axis")
	.call(xAxis);

var myAxis = d3.svg.axis()
  .scale(myScale)
  .tickValues(ticks);

})
})

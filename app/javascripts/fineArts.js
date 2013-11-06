$(function() {

d3.json("fineArts.json", function(error, data) {

console.log("hello");
// console.log(data[0].BA);

var maxTotal = 91222;
var margin = 100;
var width = $('#arts').width();
var height = 550;
var maStroke = 10;
var baStroke = 10;
var blue = "#000099";
var gold = "#A89358";
var lmargin = 80;
var axisHeight = 30;
// var lastOne;

var graphView = d3.select("#arts").append("svg")
// var graphView = d3.select("#bars").append("svg")
// .attr("width", width)
// .attr("height", height)
  // .attr({
  //   "width": "100%",
  //   "height": "100%"
  // });
  // .attr("viewBox", "0 0 " + width + " " + height )
  // .attr("preserveAspectRatio", "xMinYMin");
 //.attr("pointer-events", "all")
 .attr("class","graph")
.attr("width", width)
.attr("height", height);

var alongWidth = d3.scale.linear()
	.domain([0, 25])
	.range([lmargin, width-lmargin]);

var alltheway = d3.scale.linear()
	.domain([0, 25])
	.range([width+margin/2, margin]);

var alongHeight = d3.scale.linear()
	.domain([0, 25])
	.range([height, margin/5]);

var mapOpacity = d3.scale.linear()
	.domain([0, 25])
	.range([.1, .1]);

var rectScale = d3.scale.linear()
	.domain([0, maxTotal])
	.range([10, height-margin]);



var rectBA = graphView.selectAll("rect")
.data(function(d){
	return data;
})
.enter().append("rect")
.attr("class", "rectBA")
.attr("x", function(d,i){
	return alongWidth(i);
})
.attr("y", function(d,i){
	var dnow = rectScale(d.BA);
	var firstOne = rectScale(data[0].BA)
	if (i==0){
		return height-dnow;
	}
	if (i>0){
	var diff = dnow-rectScale(data[i-1].BA);
	var lastOne = rectScale(data[i-1].BA);
		if (diff>0){
			return height-lastOne-diff;	
		}
		if (diff<0){
			var yIs = height-lastOne+(diff*-1);
			return yIs;
		}
	}
})
.attr("width", function(d,i){
	// return alltheway(i);
	return (width-lmargin*2)/25;
})
.attr("height", function(d,i){
	var dnow = rectScale(d.BA);
	var firstOne = rectScale(data[0].BA);
	if (i==0){
		return 3;
	}
	if (i>0){
	var diff = dnow-rectScale(data[i-1].BA);
		if (diff>0){
			return diff;
				// return (diff);	
		}
		if (diff<0){
			return (diff)*-1;
		}
		if (diff==0){
			return 3;
		}
	}
})
.attr("fill", blue)
.attr("opacity", function(d,i){
	// return mapOpacity(i);
	return 1;
});







var lineBeforeBA = graphView.selectAll("line")
.data(function(d){
	return data;
})
.enter().append("line")
.attr("class", "lineall")
.attr("x1", function(d,i){
	return alongWidth(i);
})
.attr("y1", function(d,i){
	dnow = rectScale(d.BA);
	return height;
})
.attr("x2", function(d,i){
	return alongWidth(i);
})
.attr("y2", function(d,i){
	var dnow = rectScale(d.BA);
	if (i<26){
	return height-dnow;		
	}
	else {
		return height-rectScale(data[25].BA);
	}
})
.attr("fill", "none")
.attr("stroke", "gray")
.attr("stroke-weight", .001)
.attr("stroke-dasharray", "1,10")
.attr("stroke-opacity", function(d,i){
	// return mapOpacity(i);
	.01;
});






var rectMA = graphView.selectAll("rectBA rect").select("rect ma")
.data(function(d){
	return data;
})
.enter().append("rect")
.attr("class", "masters")
.attr("x", function(d,i){
	return alongWidth(i);
})
.attr("y", function(d,i){
	var dnow = rectScale(d.MA);
	var firstOne = rectScale(data[0].MA)
	if (i==0){
		return height-dnow;
	}
	if (i>0){
	var lastOne = Math.round(rectScale(data[i-1].MA));
	var diff = Math.round(dnow-lastOne);
			// return height-lastOne-diff;	
		if (diff>0){
			var yIs = height-lastOne-diff;
				return yIs;
			// return height-lastOne-diff;	
		}
		if (diff<0) {
			var yIs = height-lastOne+(diff*-1);
				return yIs;
			// return height-lastOne+(diff*-1);
		}

		if (diff==0){
			var yIs = height-dnow;
				return yIs;
			}
	}
})
.attr("width", (width-lmargin*2)/25)
.attr("height", function(d,i){
	var dnow = rectScale(d.MA);
	var firstOne = rectScale(data[0].MA);
	if (i==0){
		return 3;
	}
	if (i>0){
	var diff = dnow-rectScale(data[i-1].MA);
		if (diff>1 && d.Year!=1999){
			return diff;
		}
		if (diff>1 && d.Year==1999){
			return diff;
		}
		if (diff<0 && d.Year!=1999){
			return (diff)*-1+1;
		}
		if (diff<0 && d.Year==1999){
			return (1);
		}
		if (diff>0 && diff<1){
			return 1;
		}
		if (diff==0){
			return 3;
		}
	}
})
.attr("fill", "gray")
.attr("opacity", function(d,i){
	// return mapOpacity(i)
	return 1;
});










var rectPD = graphView.selectAll("rectBA rect").select("rect pd")
.data(function(d){
	return data;
})
.enter().append("rect")
.attr("class", "doctors")
.attr("x", function(d,i){
	return alongWidth(i);
})
.attr("y", function(d,i){
	var dnow = rectScale(d.PhD);
	var firstOne = rectScale(data[0].PhD)
	if (i==0){
		return height-dnow;
	}
	if (i>0){
	var diff = Math.round(dnow-rectScale(data[i-1].PhD));
	// console.log(diff)
	var lastOne = rectScale(data[i-1].PhD);

		if (diff>0){
			return height-lastOne-diff;	
		}
		if (diff<0) {
			var yIs = height-lastOne+(diff*-1);
			return yIs;
			// return height-lastOne-diff;	
		}
		if (diff==0){
			return height-dnow;
		}
	}
})
	// return height-rectScale(d.PhD);
.attr("width", function(d,i){
	// return width-lmargin*2/26lmargin*2/26;
	return (width-lmargin*2)/25;
})
.attr("height", function(d,i){
	// return rectScale(d.PhD);
	dnow = rectScale(d.PhD);
	var firstOne = rectScale(data[0].PhD);
	if (i==0){
		return 3;
	}
	if (i>0){
    	var diff = dnow-rectScale(data[i-1].PhD);
		if (diff>1){
			return diff;
		}
		if (diff<0){
			return (diff)*-1+1;
		}
		if (diff>0 && diff<1){
			return 1;
		}
		if (diff==0){
			return 3;
		}
	}
})
// .attr("stroke", "white")
// .attr("stroke-width", "1")
.attr("fill", "orange")

// .attr("stroke-width",baStroke)
.attr("opacity", function(d,i){
	// return mapOpacity(i);
	return 1;
});








  $('.masters').tipsy({ 
        gravity: 'nw', 
        // gravity: $.fn.tipsy.autoNS,
        html: true, 
        //fade: true,
        title: function() {
          var d = this.__data__;
		var newNum = Math.round((d.cumuMA) / 1000);
		var niceNum = numberWithCommas(newNum)+" k";
      	return d.Year+": "+numberWithCommas(d.MA)+" MAs"+", Since 1987: "+niceNum;         
        }
      });
// Math.round((d.BA) / 1000)

  $('.doctors').tipsy({ 
        gravity: 'nw', 
        // gravity: $.fn.tipsy.autoNS,
        html: true, 
        //fade: true,
        title: function() {
          var d = this.__data__;
       		var newNum = Math.round((d.cumuPhD) / 1000);
			var niceNum = numberWithCommas(newNum)+" k";
			          return d.Year+": "+numberWithCommas(d.PhD)+" PhDs"+", Since 1987: "+niceNum;         
        }
      });


  $('.rectBA').tipsy({ 
        gravity: 'nw', 
        // gravity: $.fn.tipsy.autoNS,
        html: true, 
        //fade: true,
        title: function() {
          var d = this.__data__;
       		var newNum = Math.round((d.cumuBA) / 1000);
			var niceNum = numberWithCommas(newNum)+" k";
          return d.Year+": "+numberWithCommas(d.BA)+" BFAs"+", Since 1987: "+niceNum;         
      }
      });


















var text = graphView.selectAll("text")
.data(function(d){
	return data;
})
.enter().append("text")
.attr("class", "textBA")
.attr("x", function(d,i){
	if (d.Year == 1992 || d.Year == 1987 || d.Year == 2002 ||d.Year == 2012 ){
	return alongWidth(i)+2;
}
// 	if (d.Year == 2012){
// 	return alongWidth(i)-5;
// }
})
.attr("y", function(d,i){
	if (d.Year == 1992 || d.Year == 1987 || d.Year == 2002 || d.Year == 2012){
	return height-rectScale(d.BA)-1;
	}
	else {
		return -height;
	}
})
.text(function(d){
	if (d.Year == 1992 || d.Year == 1987 || d.Year == 2002 || d.Year == 2012){
		var newNum = Math.round((d.BA) / 1000);
	return numberWithCommas(newNum)+"k";
}
})


var textMA = graphView.selectAll("textBA text").select("text ma")
.data(function(d){
	return data;
})
.enter().append("text")
.attr("class", "yAxis")
.attr("x", function(d,i){
	if (d.Year == 1992 || d.Year == 1987 || d.Year == 2002 || d.Year == 2012){
	return alongWidth(i)+2;
}
// 	if (d.Year == 2012){
// 	return alongWidth(i)-5;
// }
})
.attr("y", function(d,i){
	if (d.Year == 1992 || d.Year == 1987 || d.Year == 2002 || d.Year == 2012){
	return height-rectScale(d.MA)-1;
	}
	// if (d.Year == 2012){
	// return height-rectScale(d.MA)-10;
	// }
	else {
		return -height;
	}
})
.text(function(d){
	if (d.Year == 1987 || d.Year == 2012){
		var newNum = Math.round((d.MA) / 1000);
	return numberWithCommas(newNum)+" k";
}
})




var textPD = graphView.selectAll("textBA text").select("text pd")
.data(function(d){
	return data;
})
.enter().append("text")
.attr("class", "labels")
.attr("x", function(d,i){
	if (d.Year == 1987 || d.Year == 2012){
	return alongWidth(i)+2;
	}
})
.attr("y", function(d,i){
	if (d.Year == 1987 || d.Year == 2012){
	return height-rectScale(d.PhD);
	}
	// else {
	// 	return -height;
	// }
})
.text(function(d){
	if (d.Year == 1987 || d.Year==2012){
		var newNum = Math.round((d.PhD)/1000);
	return numberWithCommas(newNum)+" k";
}
})

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}


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
2012, "..."])
    .rangePoints([lmargin, width-30]);

var xAxis = d3.svg.axis()
	.scale(xaxisy)
	.orient("bottom");

var svg = d3.select("#arts").append("svg")
  // .attr({
  //   "width": "100%",
  //   "height": "100%"
  // })
  // .attr("viewBox", "0 0 " + width + " " + height )
  // .attr("preserveAspectRatio", "xMinYMin")


	.attr("width", width) 
	.attr("height", axisHeight) //axis bottom
	.attr("class", "ind-axis")
	.append("g")
	.attr("transform", "translate(" + 0 +","+0+")");

svg.append("g")
	.attr("class", "x axis")
	.call(xAxis);


})
})

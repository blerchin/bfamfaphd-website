$(function() {

var container = '#bfamfaphd_degrees_per_year';
if($(container).length === 0 ){
    return false
}
d3.json(window.globals.TEMPLATE_URL + "/fineArts.json", function(error, data) {

// console.log(data[0].BA);

var maxTotal = 91222;
var margin = 100;
var width = $(container).width();
var height = 550;
var maStroke = 10;
var baStroke = 10;
var blue = "#000099";
var gold = "#A89358";
var lmargin = 80;
var axisHeight = 30;
// var lastOne;

var graphView = d3.select(container).append("svg")
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
		var niceNum = numberWithCommas(newNum)+"k";
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
			var niceNum = numberWithCommas(newNum)+"k";
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

          if (newNum>1000){
              var newMil = Math.round((d.cumuBA) / 1000000);
              if (newMil==1){
                      var niceMil = numberWithCommas(newMil)+"M";
                      return d.Year+": "+numberWithCommas(d.BA)+" BFAs"+", Since 1987: "+niceMil;
              }
              if (newMil>1){
            var niceMil = "1.5M";
                      return d.Year+": "+numberWithCommas(d.BA)+" BFAs"+", Since 1987: "+niceMil;
              }

          }
          if (newNum<1000){
            var niceNum = numberWithCommas(newNum)+"k";
          return d.Year+": "+numberWithCommas(d.BA)+" BFAs"+", Since 1987: "+niceNum;
          }

      }
      });
















//Start paste

var text = graphView.selectAll("text")
.data(function(d){
	return data;
})
.enter().append("text")
.attr("class", "textBA")
.attr("x", function(d,i){
	if (d.Year == 1992 || d.Year == 1987 || d.Year == 2002 ||d.Year == 2012 || d.Year == 2004){
	return alongWidth(i)+2;
}
// 	if (d.Year == 2012){
// 	return alongWidth(i)-5;
// }
})
.attr("y", function(d,i){
	if (d.Year == 1992 || d.Year == 1987 || d.Year == 2002 || d.Year == 2012 || d.Year == 2004){
	return height-rectScale(d.BA)-1;
	}
	else {
		return -height;
	}
})
.text(function(d){
	if (d.Year == 1992 || d.Year == 1987 || d.Year == 2002 || d.Year == 2012 || d.Year == 2004){
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
	return numberWithCommas(newNum)+"k";
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
	return numberWithCommas(newNum)+"k";
}
});

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

var svg = d3.select(container).append("svg")
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

;/*
var fnames = new Array();var ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[3]='MMERGE3';ftypes[3]='text';fnames[1]='MMERGE1';ftypes[1]='zip';
try {
    var jqueryLoaded=jQuery;
    jqueryLoaded=true;
} catch(err) {
    var jqueryLoaded=false;
}
var head= document.getElementsByTagName('head')[0];
if (!jqueryLoaded) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js';
    head.appendChild(script);
    if (script.readyState && script.onload!==null){
        script.onreadystatechange= function () {
              if (this.readyState == 'complete') mce_preload_check();
        }    
    }
}

var err_style = '';
try{
    err_style = mc_custom_error_style;
} catch(e){
    err_style = '#mc_embed_signup input.mce_inline_error{border-color:#6B0505;} #mc_embed_signup div.mce_inline_error{margin: 0 0 1em 0; padding: 5px 10px; background-color:#6B0505; font-weight: bold; z-index: 1; color:#fff;}';
}
var head= document.getElementsByTagName('head')[0];
var style= document.createElement('style');
style.type= 'text/css';
if (style.styleSheet) {
  style.styleSheet.cssText = err_style;
} else {
  style.appendChild(document.createTextNode(err_style));
}
head.appendChild(style);
setTimeout('mce_preload_check();', 250);

var mce_preload_checks = 0;
function mce_preload_check(){
    if (mce_preload_checks>40) return;
    mce_preload_checks++;
    try {
        var jqueryLoaded=jQuery;
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'http://downloads.mailchimp.com/js/jquery.form-n-validate.js';
    head.appendChild(script);
    try {
        var validatorLoaded=jQuery("#fake-form").validate({});
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    mce_init_form();
}
function mce_init_form(){
    jQuery(document).ready( function($) {
      var options = { errorClass: 'alert alert-warning', errorElement: 'div', onkeyup: function(){}, onfocusout:function(){}, onblur:function(){}  };
      var mce_validator = $("#mc-embedded-subscribe-form").validate(options);
      $("#mc-embedded-subscribe-form").unbind('submit');//remove the validator so we can get into beforeSubmit on the ajaxform, which then calls the validator
      options = { url: 'http://bfamfaphd.us8.list-manage.com/subscribe/post-json?u=86adc32179584ba8d5862e0de&id=a65c9b0ed6&c=?', type: 'GET', dataType: 'json', contentType: "application/json; charset=utf-8",
                    beforeSubmit: function(){
                        $('#mce_tmp_error_msg').remove();
                        $('.datefield','#mc_embed_signup').each(
                            function(){
                                var txt = 'filled';
                                var fields = new Array();
                                var i = 0;
                                $(':text', this).each(
                                    function(){
                                        fields[i] = this;
                                        i++;
                                    });
                                $(':hidden', this).each(
                                    function(){
                                        var bday = false;
                                        if (fields.length == 2){
                                            bday = true;
                                            fields[2] = {'value':1970};//trick birthdays into having years
                                        }
                                        if ( fields[0].value=='MM' && fields[1].value=='DD' && (fields[2].value=='YYYY' || (bday && fields[2].value==1970) ) ){
                                            this.value = '';
                                        } else if ( fields[0].value=='' && fields[1].value=='' && (fields[2].value=='' || (bday && fields[2].value==1970) ) ){
                                            this.value = '';
                                        } else {
                                            if (/\[day\]/.test(fields[0].name)){
                                                this.value = fields[1].value+'/'+fields[0].value+'/'+fields[2].value;                                           
                                            } else {
                                                this.value = fields[0].value+'/'+fields[1].value+'/'+fields[2].value;
                                            }
                                        }
                                    });
                            });
                        $('.phonefield-us','#mc_embed_signup').each(
                            function(){
                                var fields = new Array();
                                var i = 0;
                                $(':text', this).each(
                                    function(){
                                        fields[i] = this;
                                        i++;
                                    });
                                $(':hidden', this).each(
                                    function(){
                                        if ( fields[0].value.length != 3 || fields[1].value.length!=3 || fields[2].value.length!=4 ){
                                            this.value = '';
                                        } else {
                                            this.value = 'filled';
                                        }
                                    });
                            });
                        return mce_validator.form();
                    }, 
                    success: mce_success_cb
                };
      $('#mc-embedded-subscribe-form').ajaxForm(options);
      
      
    });
}
function mce_success_cb(resp){
    $('#mce-success-response').hide();
    $('#mce-error-response').hide();
    if (resp.result=="success"){
        $('#mce-'+resp.result+'-response').show();
        $('#mce-'+resp.result+'-response').html(resp.msg);
        $('#mc-embedded-subscribe-form').each(function(){
            this.reset();
        });
    } else {
        var index = -1;
        var msg;
        try {
            var parts = resp.msg.split(' - ',2);
            if (parts[1]==undefined){
                msg = resp.msg;
            } else {
                i = parseInt(parts[0]);
                if (i.toString() == parts[0]){
                    index = parts[0];
                    msg = parts[1];
                } else {
                    index = -1;
                    msg = resp.msg;
                }
            }
        } catch(e){
            index = -1;
            msg = resp.msg;
        }
        try{
            if (index== -1){
                $('#mce-'+resp.result+'-response').show();
                $('#mce-'+resp.result+'-response').html(msg);            
            } else {
                err_id = 'mce_tmp_error_msg';
                html = '<div id="'+err_id+'" style="'+err_style+'"> '+msg+'</div>';
                
                var input_id = '#mc_embed_signup';
                var f = $(input_id);
                if (ftypes[index]=='address'){
                    input_id = '#mce-'+fnames[index]+'-addr1';
                    f = $(input_id).parent().parent().get(0);
                } else if (ftypes[index]=='date'){
                    input_id = '#mce-'+fnames[index]+'-month';
                    f = $(input_id).parent().parent().get(0);
                } else {
                    input_id = '#mce-'+fnames[index];
                    f = $().parent(input_id).get(0);
                }
                if (f){
                    $(f).append(html);
                    $(input_id).focus();
                } else {
                    $('#mce-'+resp.result+'-response').show();
                    $('#mce-'+resp.result+'-response').html(msg);
                }
            }
        } catch(e){
            $('#mce-'+resp.result+'-response').show();
            $('#mce-'+resp.result+'-response').html(msg);
        }
    }
}
*/

;$(document).ready(function() {

    $('.header ul.navigation').localScroll({
        offset: {top: -30},
        hash: true
    });

});

;
//# sourceMappingURL=app.js.map
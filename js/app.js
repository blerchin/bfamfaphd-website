function mce_preload_check(){if(!(mce_preload_checks>40)){mce_preload_checks++;try{}catch(t){return setTimeout("mce_preload_check();",250),void 0}var n=document.createElement("script");n.type="text/javascript",n.src="http://downloads.mailchimp.com/js/jquery.form-n-validate.js",head.appendChild(n);try{jQuery("#fake-form").validate({})}catch(t){return setTimeout("mce_preload_check();",250),void 0}mce_init_form()}}function mce_init_form(){jQuery(document).ready(function(t){var n={errorClass:"alert alert-warning",errorElement:"div",onkeyup:function(){},onfocusout:function(){},onblur:function(){}},e=t("#mc-embedded-subscribe-form").validate(n);t("#mc-embedded-subscribe-form").unbind("submit"),n={url:"http://bfamfaphd.us8.list-manage.com/subscribe/post-json?u=86adc32179584ba8d5862e0de&id=a65c9b0ed6&c=?",type:"GET",dataType:"json",contentType:"application/json; charset=utf-8",beforeSubmit:function(){return t("#mce_tmp_error_msg").remove(),t(".datefield","#mc_embed_signup").each(function(){var n=new Array,e=0;t(":text",this).each(function(){n[e]=this,e++}),t(":hidden",this).each(function(){var t=!1;2==n.length&&(t=!0,n[2]={value:1970}),this.value="MM"==n[0].value&&"DD"==n[1].value&&("YYYY"==n[2].value||t&&1970==n[2].value)?"":""==n[0].value&&""==n[1].value&&(""==n[2].value||t&&1970==n[2].value)?"":/\[day\]/.test(n[0].name)?n[1].value+"/"+n[0].value+"/"+n[2].value:n[0].value+"/"+n[1].value+"/"+n[2].value})}),t(".phonefield-us","#mc_embed_signup").each(function(){var n=new Array,e=0;t(":text",this).each(function(){n[e]=this,e++}),t(":hidden",this).each(function(){this.value=3!=n[0].value.length||3!=n[1].value.length||4!=n[2].value.length?"":"filled"})}),e.form()},success:mce_success_cb},t("#mc-embedded-subscribe-form").ajaxForm(n)})}function mce_success_cb(t){if($("#mce-success-response").hide(),$("#mce-error-response").hide(),"success"==t.result)$("#mce-"+t.result+"-response").show(),$("#mce-"+t.result+"-response").html(t.msg),$("#mc-embedded-subscribe-form").each(function(){this.reset()});else{var n,e=-1;try{var r=t.msg.split(" - ",2);void 0==r[1]?n=t.msg:(i=parseInt(r[0]),i.toString()==r[0]?(e=r[0],n=r[1]):(e=-1,n=t.msg))}catch(a){e=-1,n=t.msg}try{if(-1==e)$("#mce-"+t.result+"-response").show(),$("#mce-"+t.result+"-response").html(n);else{err_id="mce_tmp_error_msg",html='<div id="'+err_id+'" style="'+err_style+'"> '+n+"</div>";var o="#mc_embed_signup",u=$(o);"address"==ftypes[e]?(o="#mce-"+fnames[e]+"-addr1",u=$(o).parent().parent().get(0)):"date"==ftypes[e]?(o="#mce-"+fnames[e]+"-month",u=$(o).parent().parent().get(0)):(o="#mce-"+fnames[e],u=$().parent(o).get(0)),u?($(u).append(html),$(o).focus()):($("#mce-"+t.result+"-response").show(),$("#mce-"+t.result+"-response").html(n))}}catch(a){$("#mce-"+t.result+"-response").show(),$("#mce-"+t.result+"-response").html(n)}}}var fnames=new Array,ftypes=new Array;fnames[0]="EMAIL",ftypes[0]="email",fnames[3]="MMERGE3",ftypes[3]="text",fnames[1]="MMERGE1",ftypes[1]="zip";try{var jqueryLoaded=jQuery;jqueryLoaded=!0}catch(err){var jqueryLoaded=!1}var head=document.getElementsByTagName("head")[0];if(!jqueryLoaded){var script=document.createElement("script");script.type="text/javascript",script.src="//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js",head.appendChild(script),script.readyState&&null!==script.onload&&(script.onreadystatechange=function(){"complete"==this.readyState&&mce_preload_check()})}var err_style="";try{err_style=mc_custom_error_style}catch(e){err_style="#mc_embed_signup input.mce_inline_error{border-color:#6B0505;} #mc_embed_signup div.mce_inline_error{margin: 0 0 1em 0; padding: 5px 10px; background-color:#6B0505; font-weight: bold; z-index: 1; color:#fff;}"}var head=document.getElementsByTagName("head")[0],style=document.createElement("style");style.type="text/css",style.styleSheet?style.styleSheet.cssText=err_style:style.appendChild(document.createTextNode(err_style)),head.appendChild(style),setTimeout("mce_preload_check();",250);var mce_preload_checks=0;$(document).ready(function(){window.g.front_page&&$(".header ul.navigation").localScroll({offset:{top:-30},hash:!0})});
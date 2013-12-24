// CONTENTS
// 1. Test Alert
// 2. Header Links Focus
// 3. Lettering JS [disabled]
// 4. Show/Hide Search
// 5. Module 01 Slider
// 6. Top Ten Middle Slider

$(document).ready(function(){// closed on last line
  
// 01. Test Alert
//alert("Main JS ready");

// 02. Header Links Focus
$(function(){
  $('.header-link').hover(
    function(){
      $(this).removeClass('link-unfocus');
      $(this).addClass('link-focus');
    },
    function(){
      $(this).removeClass('link-focus');
      $(this).addClass('link-unfocus');
    }
  );
});

// 03. Lettering JS
/*
$(".lettering").lettering();
*/

// 4. Show/Hide Search
var openButton = $('.show-search-button');
var closeButton = $('.hide-search-button');
var fullForm = $('.searchform');
var box = $('.search-wrapper');

function toggleSearch(){
    box.toggleClass('open');
    fullForm.toggle();
    openButton.toggle();
}

openButton.click(function(){
  toggleSearch();
});
closeButton.click(function(){
  toggleSearch();
});

// 5. Module 01
// Slide Selector
$(function(){
  var selector = $('.slider-selector');
  selector.click(
    function(){
      $(selector).removeClass('active');
      $(this).addClass('active');
    }
  );
});
// Sider
$(function(){
  $('.selector-one').click(
    function(){
      $('.slider-inner').css({"left" : "0"});
    }
  );
  $('.selector-two').click(
    function(){
      $('.slider-inner').css({"left" : "-100%"});
    }
  );
  $('.selector-three').click(
    function(){
      $('.slider-inner').css({"left" : "-200%"});
    }
  );
});

// 6. Top Ten Middle Slider
//Slide Selector
$(function(){
  var selector = $('.tt-selector');
  selector.click(
    function(){
      $(selector).removeClass('active');
      $(this).addClass('active');
    }
  );
});
// Sider
$(function(){
  $('.tt-selector.albums').click(
    function(){
      $('.tt-inner').css({"top" : "0"});
    }
  );
  $('.tt-selector.songs').click(
    function(){
      $('.tt-inner').css({"top" : "-100%"});
    }
  );
});

// 7. Mailchip Form
var fnames = new Array();var ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';
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
      var options = { errorClass: 'mce_inline_error', errorElement: 'div', onkeyup: function(){}, onfocusout:function(){}, onblur:function(){}  };
      var mce_validator = $("#mc-embedded-subscribe-form").validate(options);
      $("#mc-embedded-subscribe-form").unbind('submit');//remove the validator so we can get into beforeSubmit on the ajaxform, which then calls the validator
      options = { url: 'http://eatenbymonsters.us2.list-manage1.com/subscribe/post-json?u=1a730ad6957b6c1ecca3b4bd6&id=c09d976dcc&c=?', type: 'GET', dataType: 'json', contentType: "application/json; charset=utf-8",
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

/*
//Archive Slider: Ales
$(function(){
  $('.archive-slider').hover(
    function(){
      $(this).find('.ale-meta').stop().animate({bottom:0}, 500 );
    },
    function(){
      $(this).find('.ale-meta').stop().animate({bottom: ($(this).height()* -1)}, 500 )
    }
  );
});
// Archive Slider: Info
$(function(){
  $('.info-slider').hover(
    function(){
      $(this).find('.info-meta-slide').stop().animate({bottom:0}, 500 );
    },
    function(){
      $(this).find('.info-meta-slide').stop().animate({bottom: ($(this).height()* -1)}, 500 )
    }
  );
});
*/

/*
//Backstretch
jQuery("#big-header").backstretch([
	"http://www.atlanticbrewery.com/newsite/wp-content/themes/atlantic-theme/img/dry-hops-02.jpg",
	"http://www.atlanticbrewery.com/newsite/wp-content/themes/atlantic-theme/img/hops-01.jpg",
	"http://www.atlanticbrewery.com/newsite/wp-content/themes/atlantic-theme/img/solar.jpg",
	"http://www.atlanticbrewery.com/newsite/wp-content/themes/atlantic-theme/img/red-glass-02.jpg"
	],
	{duration: 6000, fade: 2000, centeredX: true, centeredY: true}
);
*/

/*
//Sticky Nav
//The Main Nav
$(document).ready(function() {  
	var stickyNavTop = $('.big-head-nav').offset().top;  
	var stickyNav = function(){  
		var scrollTop = $(window).scrollTop();  
       
		if (scrollTop > stickyNavTop) {   
    		$('.big-head-nav').addClass('sticky-nav');  
		} else {  
    		$('.big-head-nav').removeClass('sticky-nav');   
		}  
	};  
	stickyNav();  
		$(window).scroll(function() {  
    		stickyNav();  
		});  
});
//The small logo
$(document).ready(function() {  
	var stickyLogoTop = $('.small-logo-box').offset().top;  
	var stickyLogo = function(){  
		var scrollTop = $(window).scrollTop();  
       
		if (scrollTop > stickyLogoTop) {   
    	$('.small-logo-box').addClass('sticky-logo');
			$('.big-head-nav').addClass('sticky-bottom');
		} else {  
    	$('.small-logo-box').removeClass('sticky-logo');
 			$('.big-head-nav').removeClass('sticky-bottom');
		}  
	};  
	stickyLogo();  
		$(window).scroll(function() {  
    		stickyLogo();  
		});  
});
*/

/*
// Homepage Ales Opacity
$(function(){
  $('.header-link').hover(
    function(){
      $(this).addClass('link-focus');
      $(this).find('.home-ale-meta-wrapper').stop().animate({width: ($(this).width()* 2)}, 500);
    },
    function(){
      $(this).removeClass('ale-focus');
      $(this).find('.home-ale-meta-wrapper').stop().animate({width: ($(this).width())}, 500);
    }
  );
});
*/

/*
//DropNav
$(document).ready(function(){
	$('.big-head-nav #menu-main-nav .dropmenu').css('display','block');
	$('.big-head-nav #menu-main-nav > ul').dropmenu({
		effect : 'slide',
		speed: 250,
		timeout : 0,
		nbsp : false
	});
});
*/

/*
// Foot Menu dividers
$(function() {
    var lastElement = false;
        $("ul > li").each(function() {
            if (lastElement && lastElement.offset().top != $(this).offset().top) {
                lastElement.addClass("noborder");
            }
            lastElement = $(this);
        }).last().addClass("noborder");
});
*/
});//Close document.ready
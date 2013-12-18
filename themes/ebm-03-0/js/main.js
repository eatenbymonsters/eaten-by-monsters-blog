// CONTENTS
// 1. Test Alert
// 2. Header Links Focus
// 3. Lettering JS [disabled]
// 4. Show/Hide Search
// 5. Module 01 Slide Selector

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
$(function(){
  var selector = $('.slider-selector');
  selector.click(
    function(){
      // Slide Selector
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
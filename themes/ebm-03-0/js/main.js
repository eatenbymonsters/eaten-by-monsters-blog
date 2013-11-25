// Test Alert
//$(document).ready(function(){alert("Main JS ready");});


//Archive Slider: Ales
$(function(){
  $('.archive-slider').hover(
    function(){
      $(this).find('.ale-meta').stop().animate({bottom:0}, 500 /*, 'easeOutCubic'*/);
    },
    function(){
      $(this).find('.ale-meta').stop().animate({bottom: ($(this).height()* -1)}, 500 /*, 'easeOutCubic'*/)
    }
  );
});
// Archive Slider: Info
$(function(){
  $('.info-slider').hover(
    function(){
      $(this).find('.info-meta-slide').stop().animate({bottom:0}, 500 /*, 'easeOutCubic'*/);
    },
    function(){
      $(this).find('.info-meta-slide').stop().animate({bottom: ($(this).height()* -1)}, 500 /*, 'easeOutCubic'*/)
    }
  );
});

// Homepage Ale Opacity
$(function(){
  $('.home-ale-box').hover(
    function(){
      $(this).addClass('ale-focus');
      $(this).find('.home-ale-meta-wrapper').stop().animate({width: ($(this).width()* 2)}, 500);
    },
    function(){
      $(this).removeClass('ale-focus');
      $(this).find('.home-ale-meta-wrapper').stop().animate({width: ($(this).width())}, 500);
    }
  );
});

//Backstretch
jQuery("#big-header").backstretch([
	"http://www.atlanticbrewery.com/newsite/wp-content/themes/atlantic-theme/img/dry-hops-02.jpg",
	"http://www.atlanticbrewery.com/newsite/wp-content/themes/atlantic-theme/img/hops-01.jpg",
	"http://www.atlanticbrewery.com/newsite/wp-content/themes/atlantic-theme/img/solar.jpg",
	"http://www.atlanticbrewery.com/newsite/wp-content/themes/atlantic-theme/img/red-glass-02.jpg"
	],
	{duration: 6000, fade: 2000, centeredX: true, centeredY: true}
);

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

//Lettering
$(document).ready(function() {
    $(".lettering").lettering();
  });

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

//Nav BG height
//var navHeight = 0;
//$(document).ready(function(){
	//window.navHeight = $('.menu-main-nav-container').height();
	//$('.nav-bg').css('height','100px');
	//$('.big-head-nav').css('height','100px');
//});
// Test Alert
/*$(document).ready(function(){
	alert("Plugins JS ready");
});*/

// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

//////////////////
// Smoothscroll //
//////////////////

$(document).ready(function() {
  function filterPath(string) {
  return string
    .replace(/^\//,'')
    .replace(/(index|default).[a-zA-Z]{3,4}$/,'')
    .replace(/\/$/,'');
  }
  var locationPath = filterPath(location.pathname);
  var scrollElem = scrollableElement('html', 'body');
 
  $('a[href*=#]').each(function() {
    var thisPath = filterPath(this.pathname) || locationPath;
    if (  locationPath == thisPath
    && (location.hostname == this.hostname || !this.hostname)
    && this.hash.replace(/#/,'') ) {
      var $target = $(this.hash), target = this.hash;
      if (target) {
        var targetOffset = $target.offset().top;
        $(this).click(function(event) {
          event.preventDefault();
          $(scrollElem).animate({scrollTop: targetOffset}, 400, function() {
            location.hash = target;
          });
        });
      }
    }
  });
 
  // use the first element that is "scrollable"
  function scrollableElement(els) {
    for (var i = 0, argLength = arguments.length; i <argLength; i++) {
      var el = arguments[i],
          $scrollElement = $(el);
      if ($scrollElement.scrollTop()> 0) {
        return el;
      } else {
        $scrollElement.scrollTop(1);
        var isScrollable = $scrollElement.scrollTop()> 0;
        $scrollElement.scrollTop(0);
        if (isScrollable) {
          return el;
        }
      }
    }
    return [];
  }
 
});


/////////////////
// Backstretch //
/////////////////

/*! Backstretch - v2.0.3 - 2012-11-30
* http://srobbin.com/jquery-plugins/backstretch/
* Copyright (c) 2012 Scott Robbin; Licensed MIT */

;(function ($, window, undefined) {
  'use strict';

  /* PLUGIN DEFINITION
   * ========================= */

  $.fn.backstretch = function (images, options) {
    // We need at least one image
    if (images === undefined || images.length === 0) {
      $.error("No images were supplied for Backstretch");
    }

    /*
     * Scroll the page one pixel to get the right window height on iOS
     * Pretty harmless for everyone else
    */
    if ($(window).scrollTop() === 0 ) {
      window.scrollTo(0, 0);
    }

    return this.each(function () {
      var $this = $(this)
        , obj = $this.data('backstretch');

      // If we've already attached Backstretch to this element, remove the old instance.
      if (obj) {
        // Merge the old options with the new
        options = $.extend(obj.options, options);

        // Remove the old instance
        obj.destroy(true);
      }

      obj = new Backstretch(this, images, options);
      $this.data('backstretch', obj);
    });
  };

  // If no element is supplied, we'll attach to body
  $.backstretch = function (images, options) {
    // Return the instance
    return $('body')
            .backstretch(images, options)
            .data('backstretch');
  };

  // Custom selector
  $.expr[':'].backstretch = function(elem) {
    return $(elem).data('backstretch') !== undefined;
  };

  /* DEFAULTS
   * ========================= */

  $.fn.backstretch.defaults = {
      centeredX: true   // Should we center the image on the X axis?
    , centeredY: true   // Should we center the image on the Y axis?
    , duration: 5000    // Amount of time in between slides (if slideshow)
    , fade: 0           // Speed of fade transition between slides
  };

  /* STYLES
   * 
   * Baked-in styles that we'll apply to our elements.
   * In an effort to keep the plugin simple, these are not exposed as options.
   * That said, anyone can override these in their own stylesheet.
   * ========================= */
  var styles = {
      wrap: {
          left: 0
        , top: 0
        , overflow: 'hidden'
        , margin: 0
        , padding: 0
        , height: '100%'
        , width: '100%'
        , zIndex: -999999
      }
    , img: {
          position: 'absolute'
        , display: 'none'
        , margin: 0
        , padding: 0
        , border: 'none'
        , width: 'auto'
        , height: 'auto'
        , maxWidth: 'none'
        , zIndex: -999999
      }
  };

  /* CLASS DEFINITION
   * ========================= */
  var Backstretch = function (container, images, options) {
    this.options = $.extend({}, $.fn.backstretch.defaults, options || {});

    /* In its simplest form, we allow Backstretch to be called on an image path.
     * e.g. $.backstretch('/path/to/image.jpg')
     * So, we need to turn this back into an array.
     */
    this.images = $.isArray(images) ? images : [images];

    // Preload images
    $.each(this.images, function () {
      $('<img />')[0].src = this;
    });    

    // Convenience reference to know if the container is body.
    this.isBody = container === document.body;

    /* We're keeping track of a few different elements
     *
     * Container: the element that Backstretch was called on.
     * Wrap: a DIV that we place the image into, so we can hide the overflow.
     * Root: Convenience reference to help calculate the correct height.
     */
    this.$container = $(container);
    this.$wrap = $('<div class="backstretch"></div>').css(styles.wrap).appendTo(this.$container);
    this.$root = this.isBody ? supportsFixedPosition ? $(window) : $(document) : this.$container;

    // Non-body elements need some style adjustments
    if (!this.isBody) {
      // If the container is statically positioned, we need to make it relative,
      // and if no zIndex is defined, we should set it to zero.
      var position = this.$container.css('position')
        , zIndex = this.$container.css('zIndex');

      this.$container.css({
          position: position === 'static' ? 'relative' : position
        , zIndex: zIndex === 'auto' ? 0 : zIndex
        , background: 'none'
      });
      
      // Needs a higher //z-index
      this.$wrap.css({zIndex: -999998});
    }

    // Fixed or absolute positioning?
    this.$wrap.css({
      position: this.isBody && supportsFixedPosition ? 'fixed' : 'absolute'
    });

    // Set the first image
    this.index = 0;
    this.show(this.index);

    // Listen for resize
    $(window).on('resize.backstretch', $.proxy(this.resize, this))
             .on('orientationchange.backstretch', $.proxy(function () {
                // Need to do this in order to get the right window height
                if (this.isBody && window.pageYOffset === 0) {
                  window.scrollTo(0, 1);
                  this.resize();
                }
             }, this));
  };

  /* PUBLIC METHODS
   * ========================= */
  Backstretch.prototype = {
      resize: function () {
        try {
          var bgCSS = {left: 0, top: 0}
            , rootWidth = this.isBody ? this.$root.width() : this.$root.innerWidth()
            , bgWidth = rootWidth
            , rootHeight = this.isBody ? ( window.innerHeight ? window.innerHeight : this.$root.height() ) : this.$root.innerHeight()
            , bgHeight = bgWidth / this.$img.data('ratio')
            , bgOffset;

            // Make adjustments based on image ratio
            if (bgHeight >= rootHeight) {
                bgOffset = (bgHeight - rootHeight) / 2;
                if(this.options.centeredY) {
                  bgCSS.top = '-' + bgOffset + 'px';
                }
            } else {
                bgHeight = rootHeight;
                bgWidth = bgHeight * this.$img.data('ratio');
                bgOffset = (bgWidth - rootWidth) / 2;
                if(this.options.centeredX) {
                  bgCSS.left = '-' + bgOffset + 'px';
                }
            }

            this.$wrap.css({width: rootWidth, height: rootHeight})
                      .find('img:not(.deleteable)').css({width: bgWidth, height: bgHeight}).css(bgCSS);
        } catch(err) {
            // IE7 seems to trigger resize before the image is loaded.
            // This try/catch block is a hack to let it fail gracefully.
        }

        return this;
      }

      // Show the slide at a certain position
    , show: function (index) {
        // Validate index
        if (Math.abs(index) > this.images.length - 1) {
          return;
        } else {
          this.index = index;
        }

        // Vars
        var self = this
          , oldImage = self.$wrap.find('img').addClass('deleteable')
          , evt = $.Event('backstretch.show', {
              relatedTarget: self.$container[0]
            });

        // Pause the slideshow
        clearInterval(self.interval);

        // New image
        self.$img = $('<img />')
                      .css(styles.img)
                      .bind('load', function (e) {
                        var imgWidth = this.width || $(e.target).width()
                          , imgHeight = this.height || $(e.target).height();
                        
                        // Save the ratio
                        $(this).data('ratio', imgWidth / imgHeight);

                        // Show the image, then delete the old one
                        // "speed" option has been deprecated, but we want backwards compatibilty
                        $(this).fadeIn(self.options.speed || self.options.fade, function () {
                          oldImage.remove();

                          // Resume the slideshow
                          if (!self.paused) {
                            self.cycle();
                          }

                          // Trigger the event
                          self.$container.trigger(evt, self);
                        });

                        // Resize
                        self.resize();
                      })
                      .appendTo(self.$wrap);

        // Hack for IE img onload event
        self.$img.attr('src', self.images[index]);
        return self;
      }

    , next: function () {
        // Next slide
        return this.show(this.index < this.images.length - 1 ? this.index + 1 : 0);
      }

    , prev: function () {
        // Previous slide
        return this.show(this.index === 0 ? this.images.length - 1 : this.index - 1);
      }

    , pause: function () {
        // Pause the slideshow
        this.paused = true;
        return this;
      }

    , resume: function () {
        // Resume the slideshow
        this.paused = false;
        this.next();
        return this;
      }

    , cycle: function () {
        // Start/resume the slideshow
        if(this.images.length > 1) {
          // Clear the interval, just in case
          clearInterval(this.interval);

          this.interval = setInterval($.proxy(function () {
            // Check for paused slideshow
            if (!this.paused) {
              this.next();
            }
          }, this), this.options.duration);
        }
        return this;
      }

    , destroy: function (preserveBackground) {
        // Stop the resize events
        $(window).off('resize.backstretch orientationchange.backstretch');

        // Clear the interval
        clearInterval(this.interval);

        // Remove Backstretch
        if(!preserveBackground) {
          this.$wrap.remove();          
        }
        this.$container.removeData('backstretch');
      }
  };

  /* SUPPORTS FIXED POSITION?
   *
   * Based on code from jQuery Mobile 1.1.0
   * http://jquerymobile.com/
   *
   * In a nutshell, we need to figure out if fixed positioning is supported.
   * Unfortunately, this is very difficult to do on iOS, and usually involves
   * injecting content, scrolling the page, etc.. It's ugly.
   * jQuery Mobile uses this workaround. It's not ideal, but works.
   *
   * Modified to detect IE6
   * ========================= */

  var supportsFixedPosition = (function () {
    var ua = navigator.userAgent
      , platform = navigator.platform
        // Rendering engine is Webkit, and capture major version
      , wkmatch = ua.match( /AppleWebKit\/([0-9]+)/ )
      , wkversion = !!wkmatch && wkmatch[ 1 ]
      , ffmatch = ua.match( /Fennec\/([0-9]+)/ )
      , ffversion = !!ffmatch && ffmatch[ 1 ]
      , operammobilematch = ua.match( /Opera Mobi\/([0-9]+)/ )
      , omversion = !!operammobilematch && operammobilematch[ 1 ]
      , iematch = ua.match( /MSIE ([0-9]+)/ )
      , ieversion = !!iematch && iematch[ 1 ];

    return !(
      // iOS 4.3 and older : Platform is iPhone/Pad/Touch and Webkit version is less than 534 (ios5)
      ((platform.indexOf( "iPhone" ) > -1 || platform.indexOf( "iPad" ) > -1  || platform.indexOf( "iPod" ) > -1 ) && wkversion && wkversion < 534) ||
      
      // Opera Mini
      (window.operamini && ({}).toString.call( window.operamini ) === "[object OperaMini]") ||
      (operammobilematch && omversion < 7458) ||
      
      //Android lte 2.1: Platform is Android and Webkit version is less than 533 (Android 2.2)
      (ua.indexOf( "Android" ) > -1 && wkversion && wkversion < 533) ||
      
      // Firefox Mobile before 6.0 -
      (ffversion && ffversion < 6) ||
      
      // WebOS less than 3
      ("palmGetResource" in window && wkversion && wkversion < 534) ||
      
      // MeeGo
      (ua.indexOf( "MeeGo" ) > -1 && ua.indexOf( "NokiaBrowser/8.5.0" ) > -1) ||
      
      // IE6
      (ieversion && ieversion <= 6)
    );
  }());

}(jQuery, window));

/////////////
// DropNav //
/////////////

/*	
 *	jQuery dropmenu 1.1.4
 *	www.frebsite.nl
 *	Copyright (c) 2010 Fred Heusschen
 *	Licensed under the MIT license.
 *	http://www.opensource.org/licenses/mit-license.php
 */
 
 
(function($) {
	$.fn.dropmenu = function(options) {
		var isIE 	= $.browser.msie,
			isIE6	= isIE && $.browser.version <= 7,
			isIE7	= isIE && $.browser.version == 7,
			isIE8	= isIE && $.browser.version == 8;


		return this.each(function() {

			var opts  = $.extend({}, $.fn.dropmenu.defaults, options),
				$menu = $(this),
				$topl = $menu.find('> li'),
				menuX = $menu.offset().left;

			if (opts.maxWidth == 0) {
				opts.maxWidth = $('body').width() - menuX;
			}

			//	UL itself and all LI's
			$menu
				.css({
					display: 'block',
					listStyle: 'none'
				})
				.find("li")
				.css({
					display: 'block',
					listStyle: 'none',
					position: 'relative',
					margin: 0,
					padding: 0
				});
			
			
			var css = {
				display: 'block',
				outline: 'none'
			};
			if (opts.nbsp) css['whiteSpace'] = 'nowrap';
			
			//	all A's and SPANs
			$menu
				.find('li > a, li > span')
				.css(css);


			//	top-level LI's and top level A's and SPANs
			$topl
				.css({
					float: 'left'
				})
				.find('> a, > span')
				.addClass('toplevel')
				.css({
					float: 'left'
				});		

			//	all sub-ULs
			$menu
				.find('ul')
				.css({
					display: 'none',
					position: 'absolute',
					margin: 0,
					padding: 0
				});
			
			//	first sub-UL and second, third, etc. sub-ULs
			$topl
				.find('> ul')
				.css({
					left: 0,
					top: $topl.outerHeight()
				})
				.find('li > a, li > span')
				.addClass('sublevel')
				.parent()
				.find('ul')
				.css({
					top: 0
				}).data('subsub', true);
			
			$topl
				


			//	IE fixes
			if (isIE6) {
				$menu.find('ul').css({
					lineHeight: 0
				});
			}
			if (isIE6 || isIE7 || isIE8) {
				$menu.find('ul a, ul span').css({
					zoom: 1
				});
			}


			$menu.find('a').click(function() {
				$('ul', $menu).hide();
				$('a, span', $menu).removeClass('hover');
			});

			$menu.find('li').hover(
				
				//	showing submenu
				function() {
					var listit = this,
						subnav = $.fn.dropmenu.getSubnav(listit),
						subcss = { zIndex: $.fn.dropmenu.zIndex++ };

					$(listit).find('> a, > span').addClass('hover');

					if (!subnav) return;
					if ($(subnav).is(":animated")) return;

					if ($.data(subnav, 'subsub')) {
						var distance  = $(listit).outerWidth(),
							itemWidth = $(listit).offset().left + distance - menuX,
							position  = (opts.maxWidth < itemWidth) ? "right" : "left";
						
						subcss[position] = distance;						
					}
					$(subnav).css(subcss);
					$.data(subnav, 'stayOpen', true);
					
					switch (opts.effect) {
						case 'slide':
							$(subnav).slideDown(opts.speed);
							break;
						
						case 'fade':
							$(subnav).fadeIn(opts.speed);
							break;
							
						default:
							$(subnav).show();
							break;
					}

				//	hiding submenu
				}, function() {
					var listit = this,
						subnav = $.fn.dropmenu.getSubnav(listit);

					if (!subnav) {
						$(listit).find('> a, > span').removeClass('hover');
						return;
					}

					$.data(subnav, 'stayOpen', false);
					setTimeout(function() {
						if ($.data(subnav, 'stayOpen')) return;
						$(listit).find('> a, > span').removeClass('hover');

						$('ul', subnav).hide();
						switch (opts.effect) {
							case 'slide':
								$(subnav).slideUp(opts.speed);
								break;
							
							case 'fade':
								$(subnav).fadeOut(opts.speed);
								break;
								
							default:
								$(subnav).hide();
								break;
						}
						
					}, opts.timeout);
				}
			);
		});
	};
	
	$.fn.dropmenu.getSubnav = function(ele) {
		if (ele.nodeName.toLowerCase() == 'li') {
			var subnav = $('> ul', ele);
			return subnav.length ? subnav[0] : null;
		} else {
			return ele;
		}
	}
	
	$.fn.dropmenu.zIndex 	= 500;
	$.fn.dropmenu.defaults 	= {
		effect			: 'none',		//	'slide', 'fade', or 'none'
		speed			: 'normal',		//	'normal', 'fast', 'slow', 100, 1000, etc
		timeout			: 250,
		nbsp			: false,
		maxWidth		: 0
	};
})(jQuery);


//////////////////////////
// Tabbed Panels Slider //
//////////////////////////

var panelHeight = 0;
var startPanel = 1;

// autoplay vars
var currentPanel = 1;
var totalPanels = 0;
var autoPlay = true;
var timePassed = 0;
var timeToChange = 3;
var windowFocus = true;

// use the clock [setInterval \/ \/ \/ ] to powers the advancing panels
function autoAdvance(){
	if ( window.timePassed == window.timeToChange){
		window.timePassed = 0;
		if ( window.currentPanel == window.totalPanels ){
			window.currentPanel = 0;
		}
		if ( autoPlay === true && window.windowFocus === true){
			// Click the button: move forward one panel
			$('.top-module .tabs span:nth-child('+(window.currentPanel+1)+')').trigger('click');
		}
	}else{
		window.timePassed += 1;
	}
	/* debug */ $('.timePassed').html('timePassed = '+window.timePassed);
	/* debug */ $('.autoPlay').html('autoPlay = '+window.autoPlay);
}

$(document).ready(function(){
	
	// stop the autoplay if the browser window is not selected
	window.onfocus = function(){windowFocus = true;};
	window.onblur = function(){windowFocus = false;};
	
	//autoplay debug
	/* debug */ $('.autoPlay').html('autoPlay = '+window.autoPlay);
	/* debug */ $('.timePassed').html('timePassed = '+window.timePassed);
	/* debug */ $('.timeToChange').html('timeToChange = '+window.timeToChange);
	/* debug */ $('.currentPanel').html('currentPanel = '+window.currentPanel);
	
	// The clock
	setInterval(autoAdvance, 1000);
	
	// change state when hovering over panel container
	$('.top-module').hover(
		// roll in
		function(){
			window.autoPlay = false;
			$(this).removeClass('autoplay');
		},
		// roll off
		function(){
			window.autoPlay = true;
			window.timePassed = 0;
			$(this).addClass('autoplay');
		}
	);
	
	$('.top-module .tabs').css('display','block');
	$('.top-module .panel-container').css({'height':'240px', 'overflow':'hidden'});
	$('.top-module .panel-container .panels').css({'position':'absolute', 'top':'0'});
	$('.top-module .panel-container .panels .panel .panel-content').css('position','absolute');
		
	window.panelHeight = $('.panel-container').height();
	
	$('.panel-container .panel').each(function(index){
		$(this).css({'height':window.panelHeight+'px','top':(index*window.panelHeight)+'px'});
		
		$('.top-module .panels').css('height',(index+1)*window.panelHeight+'px');
		
		//autoplay totalpanels index generator
		window.totalPanels = index + 1;
		/* debug */ $('.totalPanels').html('totalPanels = '+window.totalPanels);
		
	});
	
	$('.top-module .tabs span').each(function(){
		$(this).on('click', function(){
			changePanels( $(this).index() );
		});
	});
	
	$('.top-module .tabs span:nth-child('+window.startPanel+')').trigger('click');
	
	// needs imgpreload js file:
	//$('.panel img').imgpreload(function(){
	//  initializeMarquee();
	//});
	
	initializeMarquee();
	
});

function changePanels(newIndex){
	var newPanelPosition = (window.panelHeight*newIndex)*-1;
	
	$('.top-module .panels').animate({top:newPanelPosition},1000);
	
	$('.top-module .tabs span').removeClass('selected');
	$('.top-module .tabs span:nth-child('+(newIndex+1)+')').addClass('selected');
	
	//autoplay current panel detection
	window.currentPanel = newIndex + 1;
	/* debug */ $('.currentPanel').html('currentPanel = '+window.currentPanel);
}

// fade in to start
function initializeMarquee(){
	$('.top-module').fadeIn(1000);
}

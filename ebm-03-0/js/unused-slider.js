$(document).ready(function(){
	alert("Panel Slider JS ready");
});

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
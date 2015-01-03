// Namespace: bl = band list
var bl_wrapper = $('.bl_output');
var bl_searchInput = $('#bl_searchInput')
var bandList = 'empty';
var bl_loader = $('.loadingImage');

// Get the Band List data initially
function bl_getStartList(){
	$.getJSON('http://eatenbymonsters/wp-json/taxonomies/band/terms', function(data){
		bl_makeArray(data);
		bl_layout(bl_items,"");
	})
	.always(function(){
		// Hide the loading image when complete
		bl_loader.addClass('hidden');
	});
}

// Get the Band List data when there is a Search Term
function bl_getResults(term){
	// Show the loading image when AJAX starts
	bl_loader.removeClass('hidden');
	var initialLoad = $.getJSON('http://eatenbymonsters/wp-json/taxonomies/band/terms', function(data){
		bl_makeArray(data);
		bl_layout(bl_items,term);
	})
	.always(function(){
		// Hide the loading image when complete
		bl_loader.addClass('hidden');
	});
}

// Strip out the relevant JSON data into an array
function bl_makeArray(data){
	window.bl_items = [];
	$.each(data, function(key,val){
		bl_items.push([val.name,val.count,val.link]);
	});
}

// Parse the data array into HTML and inject it into the DOM
function bl_layout(array,term){
	bl_length = array.length;
	output = '<ul class="bl_results">';
	for (var i = 0; i < bl_length; i++) {
		bl_name = array[i][0];
		// bl_link = encodeURIComponent(array[i][2]);
		if (bl_name.search(term) != -1) {
			output += '<li>';
			output += '<a class="bl_entry" href="'+array[i][2]+'">';
			output += '<h4>'+bl_name+'</h4>';
			output += ' <span class="bl_count">'+array[i][1]+'</span>';
			output += '<div class="bl_linksWrapper closed"></div>';
			output += '</a>';
			output += '</li>';
		}
	}
	output += '</ul>';
	bl_wrapper.html(output);
}


// If there is a "band list" element on the page...
if (bl_wrapper.length){
	
	// Load the un-filtered AJAX results
	bl_getStartList();
	
	// When a key is released in the search box...
	bl_searchInput.keyup(function(){
		// Get the search term
		var bl_term = bl_searchInput.val();
		// Parse that through a regex to make in case-insensitive
		window.bl_termExp = new RegExp(bl_term, "i");
		// Feed the search term into the AJAX function
		bl_getResults(bl_termExp);
	});

	// Get the sub-menu info
	bl_wrapper.on('click','.bl_entry',function(e){
		e.preventDefault();
		console.log('clicked');
		bl_subTarget = $(this).attr('href');
		console.log(bl_subTarget);
		var bl_linksWrapper = $(this).find('.bl_linksWrapper');
		bl_linksWrapper.toggleClass('closed');
		bl_linksWrapper.load(bl_subTarget);
	});

}
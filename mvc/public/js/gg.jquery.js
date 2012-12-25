var colCount = 0;
var colWidth = 0;
var margin = 15;
var windowWidth = 0;
var blocks = [];

$(function() {
	$(window).resize(setupBlocks);
});

function setupBlocks() {
    windowWidth = $('#wrapper').width();
	colWidth = $('.pin').outerWidth();
	blocks = [];
	console.log(blocks);
	colCount = Math.floor(windowWidth/(colWidth+margin));
	for(var i=0;i<colCount;i++) {
		blocks.push(margin);
	}
	positionBlocks();
}

function positionBlocks() {
    $('.pin').each(function(){
		var min = Array.min(blocks);
		var index = $.inArray(min, blocks);
		var leftPos = margin+(index*(colWidth+margin));
		$(this).css({
			'left':leftPos+'px',
			'top':min+'px'
		});
		blocks[index] = min+$(this).outerHeight()+margin;
	});
}

// Function to get the Min value in Array
Array.min = function(array) {
	return Math.min.apply(Math, array);
};

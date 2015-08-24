
/**************************************************************************

Writtn by Steven Jackson
21 August 2015

**************************************************************************/ 

// Doc Ready
$(function(){


/**************************************************************************

I took a lil shortcut.
Ssssssshhhh... Don't tell anyone.
It will be our little Secret (^^_)

PRETTYPHOTO AND SMOOTHSCROLL INITIALIZATION

**************************************************************************/ 

$("a[rel^='prettyPhoto']").prettyPhoto();
$('a').smoothScroll();

/**************************************************************************

END PRETTYPHOTO AND SMOOTHSCROLL INITIALIZATION

**************************************************************************/ 



/**************************************************************************

DYNAMIC DOM UPDATE 

**************************************************************************/ 

var panelObj = $('a[rel].panel-img');

// Object Loop
jQuery.each(panelObj, function(index, val) {

// Retrieving image path
var imgPath = $(this).children().attr('src');

// Assigning image path to anchor tag of relevant elements
$(this).attr('href', imgPath);
$(this).parent().next().children().filter($('.fullscreen-img')).attr('href', imgPath);

});


/**************************************************************************

END DYNAMIC DOM UPDATE

**************************************************************************/ 



/**************************************************************************

EVENT LISTENER - SCREENSHOT PORTFOLIO

**************************************************************************/ 


$('.container.image-links').on("click", ".panel-body", function(){
$('.intro-text').hide();
	var trigger = $(this).data("trigger");
	screenshotTrigger(trigger);

});


// Screenshot Loader Function
function screenshotTrigger(triggerDataAttribute) {

	switch(triggerDataAttribute) {
		case "latest":
		resetScreenshotSection ()
		$("section.container.websites-latest").addClass('active').fadeIn('slow', function() {});
		break;
		case "newsletters":
		resetScreenshotSection ()
		$("section.container.newsletters").addClass('active').fadeIn('slow', function() {});
		break;
		case "previous":
		resetScreenshotSection ()
		$("section.container.websites").addClass('active').fadeIn('slow', function() {});
		break;
		case "other":
		resetScreenshotSection ()
		$("section.container.other").addClass('active').fadeIn('slow', function() {});
		break;
	}
}

// Reset Screenshot section
function resetScreenshotSection () {

	$('#portfolio-content').find(".active").hide().removeClass('active');

}



/**************************************************************************

END EVENT LISTENER - SCREENSHOT PORTFOLIO

**************************************************************************/ 

});
// End Doc Ready
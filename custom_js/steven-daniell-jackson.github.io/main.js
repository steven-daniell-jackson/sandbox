/**************************************************************************

Custom JS by Steven Jackson

**************************************************************************/ 

$(function(){

/**************************************************************************

EVENT LISTENER - ABOUT ME 

**************************************************************************/ 

// Add event listener "More about me" 
$('a[data-about-me="more"]').on("click", function(){

	// Change Background color of arrow before Event
	$('div.container.arrow-about').css("background-color", "#292929");

	// Animate div down
	$('.more-about-me').slideDown('400', function() {
		$('a[data-about-me="more"]').css("opacity", "0");


	}); 
}); //End "More about me" Trigger


// Add event listener "Less about me" 
$('a[data-about-me="less"]').on("click", function(){

// Animate div up
$('.more-about-me').slideUp('400', function() {

	// Change Background color of arrow during Event
	$('div.container.arrow-about').css("background-color", "#fff");
	$('a[data-about-me="more"]').css("opacity", "1");
	

}); 
}); //End "Less about me" Trigger


/**************************************************************************

END EVENT LISTENER - ABOUT ME 

**************************************************************************/ 



/**************************************************************************

EVENT LISTENER - SKILLS MATRIX

**************************************************************************/ 


$('li').on('click', function(event) {

// Variable Declaration and assignment
var parentElementID = $(this).parent().attr("id");
var elementDataValue = $(this).data("trigger");

// Strip # from ID
parentElementID = parentElementID.replace("#","");


// Remove Active Class Function
removeActiveClass()

// Add Active Class to Trigger Element
$(this).addClass('active');

// Pass Trigger Values to transition function
experienceImageTransition(parentElementID, elementDataValue)

});

// Remove Active Class Function
function removeActiveClass(){
	
// Find and Remove previous Active class from elements
$('.experience-sidebar .experience-wrapper').find('li.active').removeClass('active')
$('.skills-image-block').find('div.active').removeClass('active').hide();
}


// Trigger function
function experienceImageTransition(parentID, elementDataValue) {

// Element targeted based on the Trigger data- atrribute and Parent Elements ID
$('.'+ parentID + "-" + elementDataValue +'').fadeIn('300', function() {}).addClass('active');


}

/**************************************************************************

END EVENT LISTENER - SKILLS MATRIX

**************************************************************************/ 


/**************************************************************************

EVENT LISTENER - PROFILE LINKS

**************************************************************************/ 

$('section.container.profile-links .panel .panel-body').on('click', function(event) {

// Variable Declaration and assignment
var elementDataValue = $(this).data("trigger");


var linkedin = 'My <a href="https://za.linkedin.com/pub/steven-jackson/b3/978/199" target="_blank">Linkedin</a> Profile';
var github = 'My <a href="https://github.com/steven-daniell-jackson/" target="_blank">Github</a> Profile';
var googleDocs = 'Google Drive Document containing Work Done, Portfolio of Websites worked on, Skills Matrix and Responsibilies. <br>';
var googleDocsLink = '<a href="https://docs.google.com/spreadsheets/d/1s7Or_0nZ1YYS3KibGAVgGdPnjmqB6iYWQPnXvEVpUmw/edit?usp=sharing" target="_blank">View Google Drive Document</a>'
var portfolioContent = 'Due to the amount of Screenshots. <br> This has been moved<br> <a href="http://steven-daniell-jackson.github.io/screenshot_portfolio/" target="_blank">View Screenshot Portfolio</a>';

$('div.profile-link-information').css("opacity","1");


switch(elementDataValue) {
	case "porfolio":
	$('div.profile-link-information').html(portfolioContent).fadeIn('slow', function() {});
	break;
	case "linkedin":
	$('div.profile-link-information').html(linkedin).fadeIn('slow', function() {});
	break;
	case "google-docs":
	$('div.profile-link-information').html(googleDocs + googleDocsLink).fadeIn('slow', function() {});
	break;
	case "github":
	$('div.profile-link-information').html(github).fadeIn('slow', function() {});
	break;
}

});

/**************************************************************************

END EVENT LISTENER - PROFILE LINKS

**************************************************************************/ 


/**************************************************************************

EVENT LISTENER - EMPLOYMENT ARROW

**************************************************************************/ 

$('div.container.arrow-employment-history span').on('click', function(event) {
	var findActive = '';
	var findActive = $('.employment').find('.active');
	console.log(findActive);


	if (findActive.length) {

		
		resetEmployment(); 

		$(this).css({
			"margin-left": '12px',
			"-moz-transform": 'rotate(360deg)',
			"-webkit-transform": 'rotate(360deg)',
			"transform": 'rotate(360deg)',
			"left":"46%"
		});
		
	} else {
		animateEmployment();
		console.log(1);
		$(this).css({
			"margin-left": '10px',
			"-moz-transform": 'rotate(-450deg)',
			"-webkit-transform": 'rotate(-450deg)',
			"transform": 'rotate(-450deg)',
			"left":"18%"
		});
	}

});


// Animate Function
function animateEmployment() {

	$('.currentJob').slideUp("slow");
	$('#employmentContent').html('<span class="help">HELP!</span> <br><br>Click the arrow again to return it to normal');
	$('div.row.current').removeClass('text-center').removeClass('col-md-12').addClass('col-md-offset-1').addClass('col-md-6').addClass('active');
	$('div.row.history').fadeIn('slow', function() {});

}

// Reset Animation
function resetEmployment() {

	$('.currentJob').slideDown("slow");
	$('#employmentContent').html('Click the arrow to find out!');
	$('div.row.current').addClass('text-center').addClass('col-md-12').removeClass('col-md-offset-1').removeClass('col-md-6').removeClass('active');
	$('div.row.history').hide();

}


/**************************************************************************

END EVENT LISTENER - EMPLOYMENT ARROW

**************************************************************************/ 


}); //Document Ready

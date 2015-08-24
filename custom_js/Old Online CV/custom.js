$(document).ready(function(){


// Global Variables

// Set interval counter
var j = 0;

//My attributes array
var attributes = ["Passionate", "Skilled", "Logical", "Responsible"
, "Honest ", "Reliable", "Attentive", "Adaptive", "Persistent"
, "a Quick Learner", "Serene", "Patient", "Happy"
];

var education = "<h4>Varsity College</h4>Diploma — 2007/2008 <br> 2 year Diploma in IT programming (Java)<br><br><h4>ABBOTT’S COLLEGE:</h4>Annual award for Computer Studies Higher Grade<br><br>";
var education2 = "<h4>BOSMANSDAM HIGH SCHOOL:</h4>Student Monitor <br>Grade 9 and 10 top achievers award in Mathematics <br>Member of the debate society <br>Member of chess society<br><br>";
var education3 = "<h4>BOSMANSDAM PRIMARY SCHOOL: </h4>Monitor – Duty was to lead the computer monitor group Responsible for upgrading of schools computers for student’s use";

var contactInfo = " <h4>Email:</h4> Stevenjackson.sanguine@gmail.com </br></br>  <h4>Contact number:</h4> 0769975180</br></br> <h4>Skype: </h4>Steven.jackson..";



// Global Variables End 



// Side bar
$("#menu-close").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
});

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
    });// Side bar end



// Animate scroll
$(function() {
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 600);
                return false;
            }
        }
    });
    });// Animate scroll end



function textScroll(i) {  //Start textScroll()
    document.getElementById("rotate").innerHTML = attributes[i];

} //End textScroll()


function setInterval (){ // Start setInterval ()
window.setInterval(function() {   // Interval



if (j == attributes.length) {// If counter is equal to array length
j = 0;// Reset counter
}

else if (j < attributes.length) {// If counter is less than array length. Run textScroll() and change innerHTML
    textScroll(j);// Increment Global counter
    j= j+1;
}

else { // Conditional to throw error
    alert("There was a error running this script");
}


}, 1000);// End Interval 


}// End setInterval ()


setInterval ();
// Run function
// End Scrolling text


// Experience with

// Page scroll with Jquery events
$(window).scroll(function(event) {
 var y = $(this).scrollTop();

if(y >=400 && y <=700) {
$('#about-me').css( "opacity", "1" ).addClass(' animated bounceInLeft');
$('#hobbies').css( "opacity", "1" ).addClass(' animated bounceInRight');
$('#objective').css( "opacity", "1" ).addClass(' animated rubberBand');
$('.lead').css( "opacity", "1" ).addClass(' animated fadeInDown');

} else if (y >=800 && y <=900) { // Scroll position

window.setTimeout(function() { //Timeout set for animate scroll
 
//Jquery box

$('.box#jq').animate({
    opacity: "1",
    left: "0px"},
    1000, function() {

    });

//CSS box
$('.box#css').animate({
    opacity: "1",
    top: "0px"},
    1000, function() {
        /* stuff to do after animation is complete */
    });

//Javascript box
$('.box#js').animate({
    opacity: "1",
    bottom: "0px"},
    1000, function() {
        /* stuff to do after animation is complete */
    });


//PHP box
$('.box#php').animate({
    opacity: "1",
    right: "0px"},
    1000, function() {

    });

$('#mysql').css( "opacity", "1" ).addClass(' animated bounceInLeft');
$('#bootstrap').addClass(' animated lightSpeedIn');
$('#wordpress').addClass(' animated rollIn');
$('#more').css( "opacity", "1" ).addClass(' animated slideInRight');



}, 1000); //End Timeout
} //End if



});
// End Page scroll with Jquery events 
 
// Additional information

// Remove animated class
function removeClass (){
    setTimeout(function () { 
    $('.content').removeClass('animated bounceInLeft');
    $('.content').removeClass('animated slideInRight');
}, 800);

}


//On Education click add animated class and information
$('#education-toggle').click(function(){

$('.content').html(education + education2 + education3);
$('.content').addClass('animated bounceInLeft', removeClass());

removeClass();

});


//On contact click add animated class and information
$('#contact-toggle').click(function(){
$('.content').html(contactInfo);
$('.content').addClass('animated bounceInRight');

removeClass();

});




}); // End Document ready
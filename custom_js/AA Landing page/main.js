/*

Written by Steven Jackson
18 August 2015

*/

$( document ).ready(function() {
	
	// Custom Google Analytics click event
    document.getElementById("submit-competition").click(function() {
    	ga('send', 'event', { eventCategory: 'Blue train campaign', eventAction: 'Click', eventLabel: 'Join now'});
    });
});

// Validate Radio buttons {Bottom of page}
function validate() {
    if (document.getElementById('date').checked) {
        document.getElementById("terms").disabled = false;
    }
    if (document.getElementById('terms').checked) {
       document.getElementById("submit-competition").disabled = false;
       document.querySelector("#submit-competition").addEventListener("click", function(){
        window.location("http://www.aa.co.za/products/aa-membership/apply-now/&pc=BLUETRAIN");
    });

   }
}

// Jquery Radio button trigger
function membershipRadioButtonValidation () {
    var radioInputValue = $('input[name="membership-check"]:checked').val() ;

    if (radioInputValue == "no") {
        $('input#top-form').prop("disabled", false);
        $('.membership-no').slideUp('slow/200/fast', function() { });
        $('.membership-yes').slideDown('slow/400/fast', function() { });
        $('input[value="member-join"]').prop("checked", true);
        

    } else {
        $('input#top-form').prop("disabled", false);
        $('.membership-yes').slideUp('slow/200/fast', function() { });
        $('.membership-no').slideDown('slow/400/fast', function() { });
        $('input[value="member-upgrade"]').prop("checked", true);

    } 

}

// Jquery Radio Trigger - Display .membership-details-update
function membershipDetailUpdate () {
    $('input#top-form').prop("disabled", true);
$('label.membership-details-update').slideDown('slow/400/fast', function() { });
}

// Reset Radio buttons
function resetRadio () {
$('input#top-form').prop("disabled", false);
$('label.membership-details-update').slideUp('slow/400/fast', function() { });
}
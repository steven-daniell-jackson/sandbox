jQuery(document).ready(function(){ 
    jQuery('#characterLeft').text('140 characters left');
    jQuery('#message').keydown(function () {
        var max = 140;
        var len = jQuery(this).val().length;
        if (len >= max) {
            jQuery('#characterLeft').text('You have reached the limit');
            jQuery('#characterLeft').addClass('red');
            jQuery('#btnSubmit').addClass('disabled');            
        } 
        else {
            var ch = max - len;
            jQuery('#characterLeft').text(ch + ' characters left');
            jQuery('#btnSubmit').removeClass('disabled');
            jQuery('#characterLeft').removeClass('red');            
        }
    });    
});

// Page scroll with Jquery events
jQuery(window).scroll(function(event) {
 var y = jQuery(this).scrollTop();

if( y <=1400) {
jQuery('.share').css( "opacity", "1" ).addClass('animated bounceInRight');
}else if( y > 1400) {

    setTimeout(function() {

         setTimeout(function() {
    jQuery('.share').removeClass('animated bounceInRight');
    jQuery('.share').addClass('animated2 bounce2');

}, 30000);

}, 30000);

}






}); // End Document ready

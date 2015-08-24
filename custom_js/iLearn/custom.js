// JavaScript Document

jQuery(document).ready(function () {

// ==================================
// === ADDS FADE TO PRODUCT ICONS ===
// ==================================
    
jQuery('div.hidden-icon').fadeIn(2000).removeClass('hidden-icon');

// ===============================================
// === EXPANDER DESCRIPTION - STEVEN'S VERSION ===
// ===============================================


//Written by Steven Jackson
function expanderDescription() {

jQuery('.show-more').click(function() {
    if(jQuery('.show-more-snippet').css('height') != '75px'){
        jQuery('.show-more-snippet').stop().animate({height: '75px'}, 200);
        jQuery(this).text('Read More...');
    }
    else{
        jQuery('.show-more-snippet').css({height:'100%'});
        var xx = jQuery('.show-more-snippet').height();
        jQuery('.show-more-snippet').css({height:'75px'});
        jQuery('.show-more-snippet').stop().animate({height: xx}, 400);
        // ^^ The above is beacuse you can't animate css to 100%.  So I change it to 100%, get the value, change it back, then animate it to the value. If you don't want animation, you can ditch all of it and just leave: jQuery('.show-more-snippet').css({height:'100%'});^^ //
        jQuery(this).text('Read Less...');
    }});

}

// === FUNCTION CALL ===

expanderDescription();


// =========================
// === CONTENT REPLACING ===
// =========================

function contentReplace() {

    document.querySelector('.addquotelistbutton_prodpage').innerHTML = "Add to Enquiry";

    document.querySelectorAll('.quotelist-added-icon')[0].innerHTML = "Product Added to Enquiry";
    document.querySelectorAll('.quotelist-remove-icon')[0].innerHTML = "Remove from Enquiry";
    document.querySelectorAll('.removefromprodpage')[0].innerHTML = "Remove from Enquiry";

    document.querySelectorAll('.quotelist-added-icon')[1].innerHTML = "Product Added to Enquiry";
    document.querySelectorAll('.quotelist-remove-icon')[1].innerHTML = "Remove from Enquiry";
    document.querySelectorAll('.removefromprodpage')[1].innerHTML = "Remove from Enquiry";

}

contentReplace();

});

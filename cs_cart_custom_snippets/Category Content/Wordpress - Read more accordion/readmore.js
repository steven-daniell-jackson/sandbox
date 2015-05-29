// Read more Accordion

jQuery('.show-more').click(function() {
    if(jQuery('.show-more-snippet').css('height') != '112px'){
        jQuery('.show-more-snippet').stop().animate({height: '112px'}, 200);
        jQuery(this).text('Read More...');
    }
    else{
        jQuery('.show-more-snippet').css({height:'100%'});
        var xx = jQuery('.show-more-snippet').height();
        jQuery('.show-more-snippet').css({height:'112px'});
        jQuery('.show-more-snippet').stop().animate({height: xx}, 400);
        // ^^ The above is beacuse you can't animate css to 100%.  So I change it to 100%, get the value, change it back, then animate it to the value. If you don't want animation, you can ditch all of it and just leave: jQuery('.show-more-snippet').css({height:'100%'});^^ //
        jQuery(this).text('Read Less...');
    }});
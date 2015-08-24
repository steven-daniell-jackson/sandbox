
// Written by Steven Jackson

console.log("loaded");
$('.show-more').click(function() {
    if($('.show-more-snippet').css('height') != '35px'){
        $('.show-more-snippet').stop().animate({height: '35px'}, 200);
        $(this).text('Read More...');
    }else{
        $('.show-more-snippet').css({height:'100%'});
        var xx = $('.show-more-snippet').height();
        $('.show-more-snippet').css({height:'35px'});
        $('.show-more-snippet').stop().animate({height: xx}, 400);
        // ^^ The above is beacuse you can't animate css to 100%.  So I change it to 100%, get the value, change it back, then animate it to the value. If you don't want animation, you can ditch all of it and just leave: $('.show-more-snippet').css({height:'100%'});^^ //
        $(this).text('Read Less...');
    }

});


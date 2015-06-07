
$(function() {
  // View the selected photo at full size
  $(".photo-image").click(function(){
    $(this).addClass("photo-selected");
    $(this).parent().addClass("photo-x");
    $("#overlay").show();
  });
  
  // Close the full size view when #overlay is clicked
  $("#overlay").click(function(){
    $(".photo-image").removeClass("photo-selected");
    $(".photo-x").removeClass("photo-x");
    $("#overlay").hide();
  });
});

// Close full size view if "esc"
$(document).keyup(function(e) {
  if (e.keyCode == 27) {
    $(".photo-image").removeClass("photo-selected");
    $("#overlay").hide();
  }
});
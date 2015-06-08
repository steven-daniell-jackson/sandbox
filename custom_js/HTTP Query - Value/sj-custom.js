/*
Steven Jackson

Force field value from HTTP Variable on load
URL:http://borrowonline.co.za/?utm_term=borrow%20online&gclid=CK3zg4zX8MUCFWbKtAodvkgAIA

DEPRECATED - Moved to session value
*/

$( document ).ready(function(){


// Strip Values
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,    
    function(m,key,value) {
      vars[key] = value;
    });
    return vars;
  }

// Get the value of HTTP Variable
var fType = getUrlVars()["utm_term"];

$('#input_1_10').val(fType);

});


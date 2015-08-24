jQuery(function(){

/* 
Steven Jackson - 20 August 2015 
Usage: Homepage Calculator
Setting <Select><Option> based on the HTTP variable value
*/

/* 

Variable Declaration and assignment 
Assign getQueryData the value of the passed HTTP Variable name
*/
var getQueryData = getQueryVariable("months");


// Modify DOM Element on page load
jQuery("option[value=" + getQueryData + "]").attr("selected","selected");


// Strip Query string function and return values
function getQueryVariable(variable)
{
	var httpQueryString = window.location.search.substring(1);
	var httpVariable = httpQueryString.split("&");

	for (var i=0; i<httpVariable.length ;i++) {
		var httpVariablePair = httpVariable[i].split("=");

		if(httpVariablePair[0] == variable){
			return httpVariablePair[1];
		}

	}
	return(false);
}


/* 
End Homepage Calculator
*/







});


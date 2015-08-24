/**************************************** 

Written by Steven Jackson 
20 May 2015
For School and Leisure

Issue: 
Sorting out elements on page without a unique indentifier and moving to separate element.

Resolution: 
Target content via CSS psuedo :contains

Downside:
Hard-coded Array's and not dynamic.

Upside: 
Loop is scalable and elements are sorted via the Array position

*****************************************/

// Document.ready()
$(function() {
	


// Loop through array index of school names
var location = new Array ( );

// Boksburg
location[0] = new Array (
// location index of location[0][0] is ID
"boksburg", 
"Ashton Int",
"Kruinsig",
"Parkrand Primary",
"St.Dunstan's College",
"Sunward Park High"

);
// Cresta
location[1] = new Array ( 
// location index of location[1][0] is ID
"cresta", 
"Charterhouse",
"Laerskool Jan Celliers",
"Spark Schools",
"St Catherine's"

);

// Rondebosch
location[2] = new Array ( 
// location index of location[2][0] is ID
"rondebosch"
);

// Willowbridge
location[3] = new Array ( 
// location index of location[3][0] is ID
"willowbridge", 
"Brackenfell High",
"Chesterhouse",
"Fairmont High",
"Fanie Theron",
"Monument Park"

);

// Wynberg
location[4] = new Array ( 
// location index of location[4][0] is ID
"wynberg"

);


// Declaration of While loop variable which is used as #id identifier
var y = 0;


// //WHILE LOOP START: Locations index
while (y <= location.length - 1 ){


//FOR LOOP START: Loop through nested array's index
for (var i = 1 ; i < location[y].length + 1;  i++) {



// Assigning value of parent's class's value
var sj_class = $('li > a:contains("'+ location[y][i] +'")').parent().attr('class');


/*
Conditional: If the parent class NOT equal to the submenu class.
Then move the element to the assigned div otherwise skip
*/
if (sj_class == "ty-subcategories__item"){

//  Finding the specific element which contains the value in the indexed array and appending parent element to relative div > ul
$('li > a:contains("'+ location[y][i] +'")').parent().appendTo('#' + location[y][0] +' .online ul');

}

//Conditional to resolve sub menu items being caught
else {
var sj_submenu_eliminator = $('li > a:contains("'+ location[y][i] +'")').parent();
$(sj_submenu_eliminator[2]).appendTo('#' + location[y][0] +' .online  ul');

}

// End if




}; 
// End For loop
// // Increment while loop value
y++;
 };
// End While



});
// End Document.ready
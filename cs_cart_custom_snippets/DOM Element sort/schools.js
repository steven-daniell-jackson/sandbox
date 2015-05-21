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
"Arbor primary",
"Benoni High",
"Boksburg High",
"Farrarmere Primary",
"Freeway Park Primary",
"Germiston Primary",
"Hans Moore High",
"Hoerskool Dr E G Jansen",
"Hoerskool Oosterlig",
"Hoerskool Voortrekker",
"Laerskool Baanbreker",
"Laerskool Concordia",
"Laerskool Rynfield",
"Laerskool Witfield",
"Laerskool Goudrand",
"Martin Primary",
"Parkdene Primary",
"Rynfield Primary",
"St Columba's",
"St Dominic's",
"St Dunstan's Preparatory",
"Summerfields Primary",
"St Michaels Primary",
"Tom Newby School",
"Wit Deep Primary"
);
// Cresta
location[1] = new Array ( 
// location index of location[1][0] is ID
"cresta", 
"Allen Glen High",
"Blairgowrie Primary",
"Cliffview Primary",
"Crossroads School",
"De La Salle Holy Cross College",
"Delta Park School",
"Fairland Laerskool",
"FDR Primary",
"Greenside High",
"Greenside Primary",
"Hoerskool Randburg",
"Hoerskool Linden",
"I.R Griffith Primary School",
"King David High School",
"Laerskool Fairland",
"Laerskool Fontainebleau",
"Laerskool Unika",
"Louw Geldenhuys Laerskool",
"Northcliff High",
"Northcliff Primary",
"Northwest Christian School",
"Panorama Primary",
"Rand Park High",
"Rand Park Primary",
"Risidale Primary",
"Robin Hills Primary",
"Welridge Academy",
"Weltevreden Park"

);

// Rondebosch
location[2] = new Array ( 
// location index of location[2][0] is ID
"rondebosch", 
"Claremont Primary",
"Good Hope Seminary",
"Groote Schuur Schools",
"Grove Primary",
"Herschel Girls' Jnr & Snr",
"Rhodes High School",
"Rosebank Junior",
"SACS Jnr & Snr",
"Sans Souci Girls' High",
"St Georges Grammar Schools",
"St Joseph's Schools",
"Westerford High"
);

// Willowbridge
location[3] = new Array ( 
// location index of location[3][0] is ID
"willowbridge", 
"Aristea Primary",
"Bellpark Primary",
"Bellville Primary",
"Boston Primary",
"Destinatus School",
"Eben Donges High",
"Excelsior Primary",
"Gene Louw Primary",
"Goodwood Park Primary",
"Hoerskool Belville",
"Hoerskool DF Malan",
"Hoerskool Parow",
"Hoerskool Tygerberg",
"Holy Cross",
"HTS Bellville",
"Kasselsvlei High",
"Labiance Primary",
"Marian RC High",
"Northpine Primary",
"Northpine THS",
"Stellenberg High",
"The Settlers High School",
"Totius Primary",
"Vredelust Primary",
"Welgemoed Primary"
);

// Wynberg
location[4] = new Array ( 
// location index of location[4][0] is ID
"wynberg", 
"Bergvliet High",
"Cape Town High",
"Claremont High",
"Grassy Park",
"Golden Grove",
"Greenfield Girls",
"Gardens Commercial",
"Heathfield High",
"Immaculata Girls High",
"Kirstenhof Primary",
"Kommetjie Primary",
"Muizenberg Junior",
"Norman Henshilwood High",
"Oakley House",
"Ottery Road Methodist Primary",
"Plumstead High",
"Rondebosch East Primary",
"St Anthony's R.C. Primary",
"Star of the Sea Primary",
"St Augustine's Primary",
"South Peninsula High",
"Springfield Convent",
"St Anne's Primary Convent",
"Sunlands Primary",
"Sweet Valley Primary",
"Thomas Wildschutt Schools",
"Voortrekker High",
"Windsor High",
"Wittebome High",
"Wynberg Boys Jnr & Snr",
"Wynberg Girls' Jnr & Snr",
"Wynberg Senior Secondary",
"York Road Primary"

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
$('li > a:contains("'+ location[y][i] +'")').parent().appendTo('#' + location[y][0] +' ul');

}

//Conditional to resolve sub menu items being caught
else {
var sj_submenu_eliminator =$('li > a:contains("'+ location[y][i] +'")').parent();
$(sj_submenu_eliminator[2]).appendTo('#' + location[y][0] +' ul');

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
<?php 


/* 
*****************************************************************
Product field validator function
*****************************************************************
*/

function product_field_checker ($field_names, $product_validation_fields) {
// Looping through each product array element
	foreach ($field_names as $field_name) {



// Conditional - Remove Case formatting from SEO field
		if ($field_name == 'SEO name'){
			$textFormat = $field_name;
			echo $textFormat . "<br>";
		} else {

// Converting all fields to First character uppper case 
			$textFormat = ucfirst(strtolower($field_name));
			echo $textFormat . "<br>";
		}



//Validator to compare field names to the current available CS Cart list
		if (!in_array($textFormat, $product_validation_fields)) {

			echo "$field_name is not a valid field in CS Cart. Please consult the available fields list";
























}  //End if search function
} //End ForEach loop
} // End product_field_checker function









?>
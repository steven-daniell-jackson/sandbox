<?php 


/* 
*****************************************************************
Product field validator function
*****************************************************************
*/

function product_field_checker ($field_names, $product_validation_fields) {

// Array count value
	$arrayCount = count($field_names);


// Looping through each product array element
	foreach ($field_names as $field_name) {

		if ($arrayCount > 0) {



// Conditional - Remove Case formatting from SEO fields
			if ($field_name == 'SEO name'){
				$textFormat = $field_name;
				// echo $textFormat . "<br>";

				$arrayCount -= 1;
			} else {

// Converting all fields to First character uppper case 
				$textFormat = ucfirst(strtolower($field_name));
				// echo $textFormat . "<br>";

				$arrayCount -= 1;
			}



//Validator to compare field names to the current available CS Cart list
			if (!in_array($textFormat, $product_validation_fields)) {

	// If an error is found. Return  Error message
				$errorMessage =  "
				<span style=\"color:red;\">
				ERROR: \"$field_name\" is not a valid field in CS Cart. Please consult the available fields list<br>
				Or that there are no blank fields within your CSV
				</span>
				";
				return  $errorMessage;





/* 
*****************************************************************
******************************************************************
******************************************************************
******************************************************************
******************************************************************
*****************************************************************
TODO: Validation for Required fields (Product code)
*****************************************************************
******************************************************************
******************************************************************
******************************************************************
******************************************************************
******************************************************************
******************************************************************
*/





		}  //End if search function

	} else { //Start else search function

	// If no error is found. Return success message
		return "<span style=\"color:green;\">SUCCESS: All fields are valid</span>";

		
	} //End else search function

// Error reporting



	






} //End ForEach loop






} // End product_field_checker function









?>
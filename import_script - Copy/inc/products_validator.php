<?php 


/* 
*****************************************************************
Product field validator function
*****************************************************************
*/

function product_field_checker ($field_names, $product_validation_fields) {

// Array count value
	$arrayCount = count($field_names);

//Case sensitivity checker
$caseSensitivityErrorChecker = false;

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

if ($textFormat != $field_name) {
	$caseSensitivityErrorChecker = true;
}

				$arrayCount -= 1;
			}



			//Validator to compare field names to the current available CS Cart list
			if (!in_array($textFormat, $product_validation_fields)) {

				// Error reporting
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

	
	} //End else search function




} //End ForEach loop

if ($caseSensitivityErrorChecker == false) {
	// If no error is found. Return success message
		$errorMessage = "<span style=\"color:green;\">SUCCESS: All fields are valid</span>";
} else {

	$warning = "<br><span style=\"color:orange;\">Warning: Case sensitivity issues</span><br>";
	$success = "<span style=\"color:green;\">SUCCESS: All fields are valid</span>";
	$errorMessage =  $warning . $success;
}



return $errorMessage;





} // End product_field_checker function









?>
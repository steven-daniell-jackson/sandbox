
<?php 


/* 
*****************************************************************
Global Variables
*****************************************************************
*/

// Global variables
$GLOBALS['product_validation_directory'] = "validator_csv/";
$GLOBALS['product_validation_file_exists'] = "cscart_product_fields.csv";
$GLOBALS['error_message'] = '';
$GLOBALS['filePath']  = '';
$GLOBALS['fileName'] = '';


// Retrieve filepath if successful
$GLOBALS['filePath'] =  fileValidation ();

// Get returned field values from validation functions using Uploaded file with timestamp
$field_names = get_upload_file_field_data($GLOBALS['filePath']);

// Get returned field values from all available CS Cart fields
$product_validation_fields = product_validation_file_exists ();


// Passing verified values to product validator and retrieving result message (success/fail)
product_field_checker($field_names, $product_validation_fields);

 
/* 
*****************************************************************
Uploaded file validation function
*****************************************************************
*/

function fileValidation (){

// Set upload directory
	$GLOBALS['uploadDirectory'] = "csv_uploads/";

// Create date/time stamp
	$timestamp = date('d:m:Y:H:i:s');
	$timestamp = str_replace(':', '', $timestamp);

// Get filename
	$filename = basename($_FILES ["file"]["name"]);
	$GLOBALS['fileName'] = $filename;

// File extension
	$extension =  substr($filename, strpos($filename, '.') );
	$beforeExtension = $extension .  $timestamp;
	$pureFilename = substr($filename, 0, strpos($filename, '.') );

// Compiled name with timestamp
	$compiledFilename = $pureFilename . "_" . $timestamp . $extension;

// Completed directory path and Filename
	$tar =  $GLOBALS['uploadDirectory'] . $compiledFilename;

// Conditional check: File extenstion
	if (isset($_POST["submit"]) && $extension == ".csv" ) {

//Upload File file with 
		if (move_uploaded_file($_FILES["file"]["tmp_name"] , $tar)) {

	// Notification
			echo "<div class=\"col-md-12 text-center\">Your file \"<strong>". basename( $_FILES["file"]["name"]) . "\"</strong> has been uploaded successfully.</div>";

        //Return File path and Filename
			return "./". $tar;
		} 

	}else {

	// Load template part conditional "file_error" and kill page if file format is incorrect

		$template_part = "file_error";
		die(include ('template_part.php'));

	}
} //End fileValidation Function




/* 
*****************************************************************
Populate array from uploaded File
*****************************************************************
*/

function get_upload_file_field_data($file){

//If file exists then retrieve data
	if (file_exists($file) ) {

	$fileHandle = fopen("$file","r"); //  Open uploaded file
	$field_names = fgetcsv($fileHandle); //Writing values to array
	fclose($fileHandle); //  Close file after accessing data

//Return field names from Uploaded CSV
	return $field_names ;

// Endif of File extension validation
}

} //End upload_file_checker function



/* 
*****************************************************************
GET Product Validation/Comparison file data function
*****************************************************************
*/

function product_validation_file_exists (){

	$product_validation_full_path = $GLOBALS['product_validation_directory'] . $GLOBALS['product_validation_file_exists'];

//CS CArt available fields
	if (file_exists($product_validation_full_path)) {

// CS Cart product fields
$product_validation_file_handle = fopen($product_validation_full_path,"r");  //  Open file containing available field names
$product_validation_fields = fgetcsv($product_validation_file_handle); // Storing array of values
fclose($product_validation_file_handle); //  Close validation file after accessing data

return $product_validation_fields;

} else {

$GLOBALS['error_message'] = '"'. $GLOBALS['product_validation_directory'] . $GLOBALS['product_validation_file_exists'] . '" does not exist.';


// Load template part conditional "case_sensitivity" if everything is successful
	$template_part = "validation_file_missing";
	die(include ('template_part.php'));

}


} //End product_validation_file_exists function



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


//If first field name is empty do nothing
	if (empty($field_names[0])){

	//If file exists then Delete file.
		if (file_exists($GLOBALS['filePath'])) {
			unlink($GLOBALS['filePath']);
		}		

		// Load template part conditional "file_empty" and kill page if file is empty
		$template_part = "file_empty";
		die(include ('template_part.php'));

	}

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

				if ($textFormat != $field_name) {
					$caseSensitivityErrorChecker = true;

					 // $GLOBALS['error_message'] = $field_name;
					$GLOBALS['error_message'] = $GLOBALS['error_message'] . '&nbsp;"' . $field_name. '" => '. $textFormat . '<br/>';
				}

				$arrayCount -= 1;
			}



			//Validator to compare field names to the current available CS Cart list
			if (!in_array($textFormat, $product_validation_fields)) {

				// Error reporting
				// If an error is found. Return  Error message
				
				echo "ERROR: \"$field_name\" is not a valid field in CS Cart.";

				$GLOBALS['error_message'] = $warning;

				$template_part = "invalid_field";
				include ('template_part.php');




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


	// Load template part conditional "success" if everything is successful
	$template_part = "success";
	include ('template_part.php');

} else {

	// Load template part conditional "case_sensitivity" if everything is successful
	$template_part = "case_sensitivity";
	include ('template_part.php');
}



} // End product_field_checker function




?>
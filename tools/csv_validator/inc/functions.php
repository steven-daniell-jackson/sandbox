
<?php 

/* 
*****************************************************************
Custom Usage
*****************************************************************

Upload your CSV to the /validator_csv/ directory or change the below global to the path you wish to use.
Change the Global file name from "/validator_csv/csv_validation_file.csv" to your /YOuR_directory/YOUR_filename.csv


To modify the upload directory. 
Change the "upload_Directory" Global to the directory that you wish to use

Note: 
Don't worry. If the directory does not exist.
It will be created.

*/

$GLOBALS['product_validation_directory'] = "validator_csv/";
$GLOBALS['product_validation_file_exists'] = "csv_validation_file.csv";


$GLOBALS['upload_Directory'] = "csv_uploads/";



// Required field array


// Replace below $Global with $GLOBALS['product_code_array'] = array ();
// If there are no required field/s

$GLOBALS['product_code_array'] = array();


/* 
*****************************************************************
Global Variables
*****************************************************************
*/

$GLOBALS['error_message'] = '';
$GLOBALS['filePath']  = '';
$GLOBALS['fileName'] = '';


// Retrieve filepath if successful
$GLOBALS['filePath'] =  fileValidation ();

// Get returned field values from validation functions using Uploaded file with timestamp
$field_names = get_upload_file_field_data($GLOBALS['filePath']);

// Get returned field values from all available fields
$product_validation_fields = product_validation_file_exists ();


// Passing verified values to product validator and retrieving result message (success/fail)
product_field_checker($field_names, $product_validation_fields);


/* 
*****************************************************************
Uploaded file validation function
*****************************************************************
*/

function fileValidation (){


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
	$tar = './' . $GLOBALS['upload_Directory'] . $compiledFilename;

	if (!file_exists($GLOBALS['upload_Directory'])) {

	//If directory does not exist. Create it
		$create_new_directory = './' . $GLOBALS['upload_Directory'];
		mkdir($create_new_directory, 0777, true);
	} 


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


	}// Endif of File extension validation

} //End upload_file_checker function



/* 
*****************************************************************
GET Product Validation/Comparison file data function
*****************************************************************
*/

function product_validation_file_exists (){

	$product_validation_full_path = $GLOBALS['product_validation_directory'] . $GLOBALS['product_validation_file_exists'];

	//Available fields
	if (file_exists($product_validation_full_path)) {

// Product fields
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



//Checks current array if the required fields are in it or throws an error

	// Looping through each required product array element
	foreach ($GLOBALS['product_code_array'] as $requiredField) {

		//Finds the element location
		$found = array_search($requiredField, $field_names, true);

		//Capitalizes the field
		$textFormat = ucfirst(strtolower($field_names[$found]));

		if (!empty($GLOBALS['product_code_array'])){


		// Compares the values and displays different errors depending on the issue
			if ($textFormat != $field_names[$found] ) {



				if ($textFormat != $requiredField){

				//If the required Field does not exist in the array. Display error 
					$GLOBALS['error_message'] = "ERROR: \"". $requiredField ."\" is a required field. Please add it";


				//If file exists then Delete file.
					if (file_exists($GLOBALS['filePath'])) {
						unlink($GLOBALS['filePath']);

					}		

				// Load invalid field template part
					$template_part = "invalid_field";
					die(include ('template_part.php'));

				} else {


				//If the required Field does exist in the array but case sensitivity is incorrect. Display error 
					$GLOBALS['error_message'] = "ERROR: \"". $field_names[$found] ."\" Has the incorrect case structure<br>It should be \"" . $requiredField ."\"<br>
					Please correct  this and upload your csv again";

				//If file exists then Delete file.
					if (file_exists($GLOBALS['filePath'])) {
						unlink($GLOBALS['filePath']);

					}		

				// Load invalid field template part
					$template_part = "invalid_field";
					die(include ('template_part.php'));

				}

			}

		}

	}



	// Looping through each product array element
	foreach ($field_names as $field_name) {

		// Converting all fields to First character uppper case 
		$textFormat = ucfirst(strtolower($field_name));





		//Validator to compare field names to the current available CSV validation list
		if (!in_array($textFormat, $product_validation_fields)) {

			
				// Error reporting
				// If an error is found. Return  Error message	on all instances of the error occuring
			foreach ($field_names as $field_name) {

				if (!in_array($field_name, $product_validation_fields)) {
					
					//  Used for fields with all Capitals in the field name
					// if ($field_name === 'SEO name'){
					// 	$textFormat = $field_name;


					// }  else {

					$warning = "ERROR: \"$field_name\" is not a valid field. <br>";

					$GLOBALS['error_message'] = $GLOBALS['error_message'] . $warning;


					//Delete file
					if (file_exists($GLOBALS['filePath'])) {
						unlink($GLOBALS['filePath']);

					}	

					// }
					
				}

			}

			//Load invalid field template part and kill page
			$template_part = "invalid_field";
			die(include ('template_part.php'));	


		} else {


		// Conditional - Remove Case formatting from any Capital fields
			// Case Sensitivy checker. Concatanates error message and reports all issues.
			if ($textFormat != $field_name) {


				// Case sensitivity flag
				$caseSensitivityErrorChecker = true;

				// $GLOBALS['error_message'] = $field_name;
				$GLOBALS['error_message'] = $GLOBALS['error_message'] . '<span style="color:orange">Case Sensitivy Issue Detected: ' . '&nbsp;"' . $field_name. '" should be "'. $textFormat . '"</span><br/>';

			} 

		}

		

} //End ForEach loop




// if the case Sensitivy flag is false. Display the success page
if ($caseSensitivityErrorChecker == false) {


	// Load template part conditional "success" if everything is successful
	$template_part = "success";
	include ('template_part.php');

} else {


			//Delete file
	if (file_exists($GLOBALS['filePath'])) {
		unlink($GLOBALS['filePath']);

	}	

	// Load template part conditional "case_sensitivity" if everything is successful
	$template_part = "case_sensitivity";
	include ('template_part.php');
}


} // End product_field_checker function




?>
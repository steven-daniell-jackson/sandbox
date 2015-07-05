<?php

/* 
*****************************************************************
Global Variables
*****************************************************************
*/

// Validator path
$GLOBALS['product_validation_drectory'] = "validator_csv/";
$GLOBALS['product_validation_file_exists'] = "cscart_product_fields.csv";


/* 
*****************************************************************
Product Validation/Comparison file function
*****************************************************************
*/

function product_validation_file_exists (){

	$product_validation_full_path = $GLOBALS['product_validation_drectory'] . $GLOBALS['product_validation_file_exists'];

//CS CArt available fields
	if (file_exists($product_validation_full_path)) {

// CS Cart product fields
$product_validation_file_handle = fopen($product_validation_full_path,"r");  //  Open file containing available field names
$product_validation_fields = fgetcsv($product_validation_file_handle); // Storing array of values
fclose($product_validation_file_handle); //  Close validation file after accessing data

return $product_validation_fields;

} else {

	echo "$product_validation_file does not exist within the /$product_validation_drectory drectory";
}


} //End product_validation_file_exists function




/* 
*****************************************************************
Populate array from uploaded File
*****************************************************************
*/

function get_upload_file_field_data($file){

//If file exists then retrieve data
	if (file_exists($file)) {

	$fileHandle = fopen("$file","r"); //  Open uploaded file
	$field_names = fgetcsv($fileHandle); //Writing values to array
	fclose($fileHandle); //  Close file after accessing data

//Return field names from Uploaded CSV
return $field_names ;

// Endif of File extension validation
}

} //End upload_file_checker function

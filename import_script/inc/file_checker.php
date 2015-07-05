<?php



function product_validation_file_exists (){

	$product_validation_drectory = "validator_csv/";
	$product_validation_file = "cscart_product_fields.csv";
	$product_validation_full_path = $product_validation_drectory . $product_validation_file;

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





function upload_file_checker(){

// Uploaded File name
	$file = $_GET['file'];


// File extension and exists error handling
	$extension =  substr($file, strpos($file, '.') + 1);

	if (file_exists($file) && $extension == 'csv') {

	$fileHandle = fopen("$file","r"); //  Open uploaded file
	$field_names = fgetcsv($fileHandle); //Writing values to array
	fclose($fileHandle); //  Close file after accessing data

// Displaying Field/Table names

echo "<br><br>";//  Display purposes

return $field_names;

// Endif of File extension validation
}
else { 

	echo "<br>Incorrect file format uploaded. <br>Only .csv extensions allowed";
	die ();
}


} //End upload_file_checker function


<?php 

/* 
*****************************************************************
Main functional file
*****************************************************************
*/



// File Includes
include_once("inc/upload.php");
include_once("inc/file_checker.php");
include_once("inc/products_validator.php");

// Retrieve filename if successful
$fileName = fileValidation ();

// Get returned field values from validation functions using Uploaded file with timestamp
$field_names = get_upload_file_field_data($fileName);

// Get returned field values from all available CS Cart fields
$product_validation_fields = product_validation_file_exists ();


// Passing verified values to product validator and retrieving result message (success/fail)
$result = product_field_checker($field_names, $product_validation_fields);

?>


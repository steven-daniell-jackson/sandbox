
<?php 

/* 
*****************************************************************
Main functional file
*****************************************************************
*/



// File Includes
include_once("inc/file_checker.php");
include_once("inc/products_validator.php");


// Getting returned arrays from validation functions
$field_names = upload_file_checker();
$product_validation_fields = product_validation_file_exists ();


// Passing verified values to product validator and retrieving result message (success/fail)
$result = product_field_checker($field_names, $product_validation_fields);

?>



<?php 
// Variables
// $_FILES['file']['name'];



// File Includes
include_once("inc/file_checker.php");
include_once("inc/products_validator.php");



// Getting returned arrays from validation functions
$product_validation_fields = product_validation_file_exists ();
$field_names = upload_file_checker();


// Passing verified values to product validator
product_field_checker($field_names, $product_validation_fields);

?>


<!-- 

CS Cart CSV Import script 
Steven Jackson
Started 7 July 2015

Manipulation of CSV files


-->

<!DOCTYPE html>
<html>
<head>
	<title>CSV Import Script - Steven Jacskson</title>
</head>
<body>



<form action="index.php">
	
<input type="file" name="csv" value="CSV">
<input type="submit" name="submit" value="Submit">

</form>



<?php 

$product_validation_file = "cscart_product_fields.csv";


// CS Cart product fields
$product_validation_file_handle = fopen("$product_validation_file","r");  //  Open file containing available field names
$product_validation_fields = fgetcsv($product_validation_file_handle); // Storing array of values
fclose($product_validation_file_handle); //  Close validation file after accessing data



// Uploaded File values
$file = $_GET["csv"];
$extension =  substr($file, strpos($file, '.') + 1);


// File extension and exists error handling
if (file_exists($file) && $extension == 'csv') {
	


$file = fopen("$file","r");
$field_names = fgetcsv($file);
fclose($file); //  Close file after accessing data



// Displaying Field/Table names

echo "<br><br>";//  Display purposes

// Looping through each product array element
foreach ($field_names as $field_name) {

//Validator to compare field names to the current available CS Cart list
if (in_array($field_name, $product_validation_fields)) {

	// Conditional - Remove Case formatting from SEO field
if ($field_name == 'SEO name'){

	echo $field_name . " , ";
}else {

	$textCaptital = ucfirst(strtolower($field_name));

	echo $textCaptital . " , ";
}

} else { //End if search function

echo "$field_name is not valid field in CS Cart. Please consult the available fields list";

} //End else search function

 
} //End For Each
























/* Displaying 10 Products
$product_count = 0;

while(! feof($file)&& $product_count < 10)
  {
  print_r(fgetcsv($file));


echo $product_count;
  $product_count += 1;
  }

*/

// Printing data as an Array
// print_r($field_names);










// Endif of File extension validation
}
else { 

	echo "<br>Incorrect file format uploaded. <br>Only .csv extensions allowed";
}







?>









</body>
</html>
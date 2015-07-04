

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

// File values
$file = $_GET["csv"];
$extension =  substr($file, strpos($file, '.') + 1);


// File extension and exists error handling
if (file_exists($file) && $extension == 'csv') {
	


$file = fopen("$file","r");
$field_names = fgetcsv($file);




// Displaying Field/Table names
 

echo "<br><br>";//  Display purposes

// Looping through each array element
foreach ($field_names as $field_name) {
	echo $field_name . " , ";
}
























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


fclose($file); //  Close file after accessing data








}
else {

	echo "<br>Incorrect file format uploaded. <br>Only .csv extensions allowed";
}







?>









</body>
</html>
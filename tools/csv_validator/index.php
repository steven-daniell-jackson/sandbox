<!-- 

CS Cart CSV Import script 
Steven Jackson
Started 8 July 2015

Description:
CSV Validator
Based off my original CS Cart Product field validator


-->


<?php 
// Include inc/header.php
include ("inc/header.php"); ?>




	<form action="index.php" method="POST" enctype="multipart/form-data">

<label>Upload a .csv file for verification of product fields</label><br/>
		<input type="file" name="file">
		<input type="submit" name="submit" value="Submit">

	</form>
</div>	

<?php 

//If form has been submitted. Run the functions.php file
if (isset($_POST["submit"])) {

require_once("inc/functions.php");

} else {

// Else display nothing
	$template_part = "homepage";
	include ('template_part.php');
}


?>





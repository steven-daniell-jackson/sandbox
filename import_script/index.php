<!-- 

CS Cart CSV Import script 
Steven Jackson
Started 7 July 2015

Description:
Manipulation of CSV files
For use with CS Cart to vaiidate CSV Product fields.


Note: 
Written from scrach
Customize as you like.
-->


<?php 
// Include inc/header.php
include ("inc/header.php"); ?>

	<form action="index.php" method="POST" enctype="multipart/form-data">

<label>Upload a .csv file for verification of CS Cart product fields</label><br/>
		<input type="file" name="file">
		<input type="submit" name="submit" value="Submit">

	</form>
</div>	



<?php 

//If form has been submitted to itself. Run the functions.php file
if (isset($_POST["submit"])) {

require_once("inc/functions.php");

} else {

// Else display Homepage
	$template_part = "homepage";
	include ('template_part.php');
}



// Include inc/footer.php
require_once ("inc/footer.php");


?>
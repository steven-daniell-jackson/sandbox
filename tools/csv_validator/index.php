<!-- 

CS Cart CSV Import script 
Steven Jackson
Started 8 July 2015

Description:
CSV Validator
Based off my original CS Cart Product field validator


-->



<!DOCTYPE html>
<html>
<head>
	<title>CSV Import Script - Steven Jacskson</title>


<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">


</head>
<body>


<div class="container">

<header id="header" class="col-md-12 text-center">
	<h1>CSV Field Verification</h1>
</header><!-- /header -->


<div class="clearfix"></div>

<hr>

<div class="col-md-12">


	<form action="index.php" method="POST" enctype="multipart/form-data">

<label>Upload a .csv file for verification of CS Cart product fields</label><br/>
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





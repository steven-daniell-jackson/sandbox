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
	<h1>CS Cart CSV Product Field Verification</h1>
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

<div class="col-md-12 text-center">
	<span style="color:red;">
		ERROR: Incorrect file format uploaded. <br>Only .csv extensions allowed
	</span>
	</div>

<div class="clearfix"></div>

<footer>
<hr>
<div class="col-md-6">Written and maintained by <a href="https://github.com/steven-daniell-jackson">Steven Jackson</a></div>
<div class="col-md-6">Free for commercial and non-commercial use</div>
	
	
</footer>

</div>


</body>
</html>
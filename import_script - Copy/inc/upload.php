<?php 


/* 
*****************************************************************
Uploaded file validation function
*****************************************************************
*/

function fileValidation (){

// Set upload directory
$uploadDirectory = "csv_uploads/";

// Create date/time stamp
$timestamp = date('d:m:Y:H:i:s');
$timestamp = str_replace(':', '', $timestamp);

// Get filename
$filename = basename($_FILES ["file"]["name"]);

// File extension
$extension =  substr($filename, strpos($filename, '.') );
$beforeExtension = $extension .  $timestamp;
$pureFilename = substr($filename, 0, strpos($filename, '.') );

// Compiled name with timestamp
$compiledFilename = $pureFilename . "_" . $timestamp . $extension;

// Completed directory path and Filename
$tar =  $uploadDirectory . $compiledFilename;

// Conditional check: File extenstion
if (isset($_POST["submit"]) && $extension == ".csv") {

//Upload File file with 
if (move_uploaded_file($_FILES["file"]["tmp_name"] , $tar)) {

	// Notification
        echo "<div class=\"col-md-12 text-center\">Your file \"<strong>". basename( $_FILES["file"]["name"]) . "\"</strong> has been uploaded.</div>";

        //Return File path and Filename
		return "./". $tar;
    } 

}else {
       
	// Load error.php if file format is incorrect
	header ("Location: error.php");

    }
} //End fileValidation Function


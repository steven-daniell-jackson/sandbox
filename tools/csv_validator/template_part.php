<?php 


/* 
*****************************************************************
Template Part: Homepage
*****************************************************************
*/
?>


<?php if ($template_part == "homepage"): ?>

	<div class="col-md-12 text-center">
		<span style="color:orange;">
			
		</span>
	</div>


require_once ("inc/footer.php");


<?php 

require_once ("inc/footer.php");

endif ?>

<?php
/*****************************************************************
END TEMPLATE PART: Homepage
 *****************************************************************/
?>



<?php/* 
*****************************************************************
Template Part: ALL VALID
*****************************************************************
*/
?>


<?php if ($template_part == "success"): ?>

	<div class="col-md-12 text-center">
		<span style=\"color:green;\">SUCCESS: All fields are valid</span>
		<span style=\"color:green;\">Your Field values have been verified and can be uploaded without error</span>
	</div>

<?php 

require_once ("inc/footer.php");

endif ?>

<?php
/*****************************************************************
END TEMPLATE PART: ALL VALID
 *****************************************************************/
?>




<?php/* 
*****************************************************************
Template Part: INCORRECT CASE SENSITIVITY
*****************************************************************
*/
?>

<?php if ($template_part == "case_sensitivity"): ?>

	<div class="col-md-12 text-center">
		<span style="color:orange;">
			ERROR: <br>
			The following field/s have the incorrect casing.<br>
			Please adjust and reupload your csv.<br><br>
			<?php echo  $GLOBALS['error_message']; ?>
		</span>
	</div>


<?php 

require_once ("inc/footer.php");

endif ?>

<?php
/*****************************************************************
END TEMPLATE PART: ALL VALID
 *****************************************************************/
?>


<?php 
/* 
*****************************************************************
Template Part: INVALID FIELD NAME
*****************************************************************
*/
?>

<?php if ($template_part == "invalid_field"): ?>

	<div class="col-md-12 text-center">
		<span style="color:red;">
			<?php echo $GLOBALS['error_message']; ?>
		</span>
	</div>

<?php 

require_once ("inc/footer.php");

endif ?>
<?php
/*****************************************************************
END TEMPLATE PART: INVALID FIELD NAME
*****************************************************************/
?>



<?php 
/* 
*****************************************************************
Template Part: Required fields
*****************************************************************
*/
?>

<?php if ($template_part == "required_field"): ?>

	<div class="col-md-12 text-center">
		<span style="color:red;">
			<?php echo $GLOBALS['error_message']; ?>
		</span>
	</div>


<?php 

require_once ("inc/footer.php");

endif ?>
<?php
/*****************************************************************
END TEMPLATE PART: FILE ERROR
 *****************************************************************/
?>


<?php 
/* 
*****************************************************************
Template Part: FILE ERROR
*****************************************************************
*/
?>

<?php if ($template_part == "file_error"): ?>

	<div class="col-md-12 text-center">
		<span style="color:red;">
			ERROR: Incorrect file format uploaded. <br>Only .csv extensions allowed
		</span>
	</div>


<?php 

require_once ("inc/footer.php");

endif ?>
<?php
/*****************************************************************
END TEMPLATE PART: FILE ERROR
 *****************************************************************/
?>


<?php 
/* 
*****************************************************************
Template Part: FILE EMPTY
*****************************************************************
*/
?>


<?php if ($template_part == "file_empty"): ?>

	<div class="col-md-12 text-center">
		<span style="color:red;">
			<?php echo $GLOBALS['error_message'] ?>
			ERROR: FILE is empty <br>
			"<?php echo $GLOBALS['fileName'] ?>"" has been DELETED!
		</span>
	</div>

<?php 

require_once ("inc/footer.php");

endif ?>
<?php
/*****************************************************************
END TEMPLATE PART: FILE EMPTY
 *****************************************************************/
?>

<?php 
/* 
*****************************************************************
Template Part: CS Cart Validation File Missing
*****************************************************************
*/
?>


<?php if ($template_part == "validation_file_missing"): ?>

	<div class="col-md-12 text-center">
		<span style="color:red;">
			<?php echo $GLOBALS['error_message'] ?>
			Please confirm that the file is there and try again
		</span>
	</div>


<?php 

require_once ("inc/footer.php");

endif ?>
<?php
/*****************************************************************
END TEMPLATE PART: CS Cart Validation File Missing
 *****************************************************************/
?>

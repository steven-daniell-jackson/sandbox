<?php if ($template_part == "success"): ?>

	<div class="col-md-12 text-center">
		<span style=\"color:green;\">SUCCESS: All fields are valid</span>
		<span style=\"color:green;\">Your Field values have been verified and can be uploaded without error</span>
	</div>

<?php endif ?>


<?php if ($template_part == "case_sensitivity"): ?>

	<div class="col-md-12 text-center">
		<span style="color:orange;">
		ERROR: <br>
		The following field/s have the incorrect casing.<br>
		Please adjust and reupload your csv.<br><br>
			<?php echo  $GLOBALS['error_message']; ?>
		</span>
	</div>


<?php endif ?>





<?php if ($template_part == "invalid_field"): ?>

	<div class="col-md-12 text-center">
		<span style="color:red;">
			<?php echo $GLOBALS['error_message']; ?>
		</span>
	</div>


<?php endif ?>




<?php if ($template_part == "file_empty"): ?>

	<div class="col-md-12 text-center">
		<span style="color:red;">
		<?php echo $GLOBALS['error_message'] ?>
			ERROR: FILE is empty
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
<?php endif ?>




<?php if ($template_part == "file_error"): ?>

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



<?php endif ?>
<?php 

/*

Example of Fizzbuzz test in JS and PHP
Steven Jackson
Roughly  10 mins to write
*/

?>

<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">

<script type="text/javascript" src="js/fizzbuzz.js"></script>

</head>
<body>

<h2>JS Fizzbuzz can be seen within the developer console or within the Fizzbuzz.js file</h2>

<h3>PHP Fizzbuzz</h3>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->


            <?php 


            for ($i=1; $i < 101; $i++) { 
	
            	if ($i%3 == 0 and $i%5 == 0 ) {
            		echo "Fizz Buzz <br/>";
            	}

            	elseif ($i % 3 == 0 or $i %5 == 0 ) {


            		if ($i % 3 == 0) {
            			echo "Fizz <br/>";
            		} else {
            			echo "Buzz <br/>";
            		}


            	}

            	else {
            		echo $i . '<br/>';

            	}

            }

?>

 
         
</body>
</html>


<!-- 
Steven Jackson
Enabling Sessions variables in Wordpress
Used on borrowonline.co.za

Reason: Wordpress is stateless and does not enable sessions by default

URL: borrowonline.co.za/?utm_term=borrow online&gclid=CK3zg4zX8MUCFWbKtAodvkgAIA
-->



<?php 

// Add to the top of functions file
if ( !session_id() )
	add_action( 'init', 'session_start' );



// Get HTTP Request value

if (is_page(6)) { //Only assign the session value on page with ID of 6
	if (isset($_GET['utm_term'])) {
		session_start();
		$_SESSION["http_query"] = $_GET["utm_term"];
	};
}




// Gravity form hook
add_filter('gform_field_value_search_terms', 'my_custom_population_function');
function my_custom_population_function($value){
	return $_SESSION['http_query'];
}


// Unset the _SESSIONS Variable in the wp_includes/load.php
$no_unset = array( '_SESSIONS','GLOBALS', '_GET', '_POST', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES', 'table_prefix' );



?>
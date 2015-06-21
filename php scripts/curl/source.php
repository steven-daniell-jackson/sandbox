<?php

set_time_limit(0);
//header("Access-Control-Allow-Orgin: *");
//header("Access-Control-Allow-Methods: *");
//header("Content-Type: application/json; charset=utf-8");
function GenRandString($length = 16) {
	$characters =
	'0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomString;
}
// simulate a client->server FTG API call:
$APIBaseURI = "http://api.ftgsys.co.za";
$APIVersion = "v1";
// private key must not be transmitted as arg else API access will be disabled – dummy data, replace // with supplied value:
$APIPrivateKey = '2DKzHh2NJMtouBLhbBiWLbTd+OMk2RiL4n+CHqdliR4=';
// client has to have a public and user key – dummy data, replace with supplied value:
$APIPublicKey = 'q9w5HAivhgCXsj4f';
$APIUserKey = 1876; // dummy data, replace with supplied value:
$APIResource = "product-categories";


// for($i=0; $i<10; $i++){
 // create security nonce:
	$ClientData = array(
 "p1" => $APIPublicKey, // public key(ftg client instance key)
 "p2" => $APIUserKey, // test client key (used to retrieve private key against ftg users list)
 "p3" => time(), // unix timestamp, pure int
 "p4" => $APIResource, // resource being request read/updated
 "p5" => GenRandString(16), // random number, 16 digits, alpha numeric only
 "p6" => GenRandString(24), // random number, 24 digits, alpha numeric only
 "p7" => GenRandString(32), // random number, 32 digits, alpha numeric only

);
	$QueryString = http_build_query($ClientData);
	$NonceHash = urlencode(base64_encode(mhash(MHASH_SHA256, $QueryString,
		$APIPrivateKey)));
	$API_Call =
	"{$APIBaseURI}/{$APIVersion}/{$APIResource}/?h={$NonceHash}&{$QueryString}";
	// echo $API_Call."\n\n";
	$curl = curl_init($API_Call);
	curl_setopt($curl, CURLOPT_FAILONERROR, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	$cresult = curl_exec($curl);
	if(curl_error($curl)){
		//echo curl_error($curl);
	} else {
	//	echo $cresult;
 // or for debug:
 // var_dump($cresult);
 // or
 // print_r($cresult);

$productArray = json_decode($cresult, true);
// print_r ($myArray); // Fetches the first ID
	}
	// echo PHP_EOL . PHP_EOL;
	// sleep(0.1);
// }

print_r($productArray);

$product_categories = $productArray['response']['product-categories']['set-1']['nodelist']['10']['children'];
curl_close($curl);

?>

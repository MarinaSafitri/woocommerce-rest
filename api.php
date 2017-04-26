<?php 
require_once( 'lib/woocommerce-api.php' );

$options = array(
	'ssl_verify' => false,
);

try {

	header( 'Content-Type: Application/json' );
	$url = 'http://localhost/wordpress/';
	$consumer_key = 'ck_6f02d7e8ae2dad32619c9cf2eb2a13e019555781';
	$consumer_secret = 'cs_302ff4b250bbdd4432a49b81162299736bec71c3';
	// $consumer_key = 'ck_23ede9377f475e69b343eb4a33455c5ee6f70438';
	// $consumer_secret = 'cs_be343b8fdd9d29f89ffeeaa954c25c0a8a08cb95';
	$client = new WC_API_Client( $url, $consumer_key, $consumer_secret, $options );
	$tes = $client->orders->get();
	var_dump($tes);
	//$arr = array();
	// header('Content-Type: application/json'); 
	// var_dump($decode);
	// echo json_encode($tes);


} catch ( WC_API_Client_Exception $e ) {

	echo $e->getMessage() . PHP_EOL;
	echo $e->getCode() . PHP_EOL;

	if ( $e instanceof WC_API_Client_HTTP_Exception ) {

		print_r( $e->get_request() );
		print_r( $e->get_response() );
	}
}

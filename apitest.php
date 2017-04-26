<?php 
require_once( 'lib/woocommerce-api.php' );

$options = array(
	'ssl_verify' => false,
);

try {

	header( 'Content-Type: Application/json' );
	$url = 'http://localhost/wordpress/';
	$consumer_key = 'ck_23ede9377f475e69b343eb4a33455c5ee6f70438';
	$consumer_secret = 'cs_be343b8fdd9d29f89ffeeaa954c25c0a8a08cb95';
	$client = new WC_API_Client( $url, $consumer_key, $consumer_secret, $options );
	$tes = $client->orders->get();
	$arr = array();
	$decode = json_encode($tes);
	// var_dump($decode);
	echo $decode;


} catch ( WC_API_Client_Exception $e ) {

	echo $e->getMessage() . PHP_EOL;
	echo $e->getCode() . PHP_EOL;

	if ( $e instanceof WC_API_Client_HTTP_Exception ) {

		print_r( $e->get_request() );
		print_r( $e->get_response() );
	}
}

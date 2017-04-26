<?php
require_once( 'lib/woocommerce-api.php' );

$options = array(
	'debug'           => true,
	'return_as_array' => false,
	'validate_url'    => false,
	'timeout'         => 30,
	'ssl_verify'      => false,
);


try {

	$url = 'http://localhost/wordpress/';
	$consumer_key = 'ck_23ede9377f475e69b343eb4a33455c5ee6f70438';
	$consumer_secret = 'cs_be343b8fdd9d29f89ffeeaa954c25c0a8a08cb95';
	$client = new WC_API_Client( $url, $consumer_key, $consumer_secret, $options );
	print_r( $client->products->get() );

} catch ( WC_API_Client_Exception $e ) {

	echo $e->getMessage() . PHP_EOL;
	echo $e->getCode() . PHP_EOL;

	if ( $e instanceof WC_API_Client_HTTP_Exception ) {

		print_r( $e->get_request() );
		print_r( $e->get_response() );
	}
}
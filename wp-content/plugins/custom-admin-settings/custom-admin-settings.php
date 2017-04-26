<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the
 * plugin admin area. This file also defines a function that starts the plugin.
 *
 * @link              http://code.tutsplus.com/tutorials/creating-custom-admin-pages-in-wordpress-1
 * @since             1.0.0
 * @package           Custom_Admin_Settings
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Admin Settings
 * Plugin URI:        http://code.tutsplus.com/tutorials/creating-custom-admin-pages-in-wordpress-1
 * Description:       Demonstrates how to write custom administration pages in WordPress.
 * Version:           1.0.0
 * Author:            Tom McFarlin
 * Author URI:        https://tommcfarlin.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	 die;
}

// Include the dependencies needed to instantiate the plugin.
foreach ( glob( plugin_dir_path( __FILE__ ) . 'admin/*.php' ) as $file ) {
	include_once $file;
}

add_action( 'plugins_loaded', 'tutsplus_custom_admin_settings' );

/**
 * Starts the plugin.
 *
 * @since 1.0.0
 */
function tutsplus_custom_admin_settings() {

	$plugin = new Submenu( new Submenu_Page() );
	$plugin->init();
	

}

add_action('woocommerce_checkout_process', 'create_vip_order');

function create_vip_order() {

  global $woocommerce, $wpdb;

  $address = array(
      'first_name' => '111Joe',
      'last_name'  => 'Conlin',
      'company'    => 'Speed Society',
      'email'      => 'joe@testing.com',
      'phone'      => '760-555-1212',
      'address_1'  => '123 Main st.',
      'address_2'  => '104',
      'city'       => 'San Diego',
      'state'      => 'Ca',
      'postcode'   => '92121',
      'country'    => 'US'
  );

// Now we create the order

// The add_product() function below is located in /plugins/woocommerce/includes/abstracts/abstract_wc_order.php
$listorder = $wpdb->get_results( "SELECT * FROM wp_listorder WHERE status='no' LIMIT 1000" );
foreach ( $listorder as $r ) {
	$order = wc_create_order();	
	$product = $wpdb->get_row( $wpdb->prepare( "SELECT id FROM wp_posts WHERE post_title LIKE %s", $r->product_name ) );
	$user = $wpdb->get_row( $wpdb->prepare( "SELECT id FROM wp_users WHERE user_login LIKE %s", $r->username ) );
	$order->add_product( get_product( $product->id ), 1); // This is an existing SIMPLE product
	$order->set_customer_id( $user->id );
	$order->calculate_totals();
	$order->update_status("Completed", 'Imported order', TRUE);  
	echo $r->product_name . ' ' . $user->id . '<br>';
}

// $order->set_address( $address, 'billing' );

echo 'hi';
// $i = WC_API_Customers::get_customer( 10 );
// var_dump( $i );
// var_dump($myrows);
}
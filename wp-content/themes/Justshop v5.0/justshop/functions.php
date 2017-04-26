<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* Start templatation Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// WooFramework init
require_once ( get_template_directory() . '/functions/admin-init.php' );

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 			// Options panel settings and custom settings
				'includes/theme-functions.php', 		// Custom theme functions
				'includes/theme-actions.php', 			// Theme actions & user defined hooks
				'includes/theme-comments.php', 			// Custom comments/pingback loop
				'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
				'includes/sidebar-init.php', 			// Initialize widgetized areas
				'includes/theme-widgets.php'			// Theme widgets
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );

foreach ( $includes as $i ) {
	locate_template( $i, true );
}

require_once( 'includes/testimonials/templatation-testimonials.php' );
require_once( 'includes/retail-menu-cards/retail-menu-cards.php' );
require_once( 'includes/tt-plugins/tt-plugins.php' );
if (function_exists('tt_init_import')) tt_init_import();


if ( is_woocommerce_activated() ) {
	if ( !defined('YITH_WCMG') ) { require_once( 'includes/wc-zm/init.php' ); }
	if ( !defined('YITH_WCAN') ) { require_once( 'includes/wc-ajax-nav/init.php' ); }
	locate_template( 'includes/theme-woocommerce.php', true );
}

/*-----------------------------------------------------------------------------------*/
/* Visual Composer Stuff */
/*-----------------------------------------------------------------------------------*/
define('ULTIMATE_USE_BUILTIN', 'true');
add_action( 'init', 'tt_vcSetAsTheme' );
function tt_vcSetAsTheme() {
	if (function_exists('vc_set_as_theme')) vc_set_as_theme(true);
}
function templatation_vc_row_and_vc_column($class_string, $tag) { return $class_string; }

// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'templatation_vc_row_and_vc_column', 10, 2);

// Ext VC
if (class_exists('WPBakeryVisualComposerAbstract')) {
	require_once locate_template('/includes/tt-vc-extend/tt-vc-extend.php');
}


/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below. */
/*-----------------------------------------------------------------------------------*/








/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here. */
/*-----------------------------------------------------------------------------------*/
?>
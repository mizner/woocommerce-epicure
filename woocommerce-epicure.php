<?php
/**
 * Plugin Name: WooCommerce Epicure
 * Plugin URI: http://mizner.io
 * Description: Creates a online ordering interface for restaurant menu items
 * Version: 0.1
 * Author: Michael Mizner
 * Author URI: http://mizner.io
 * License:
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'WEP', 'woocommerce-epicure' );
define( 'WEP_PATH', plugin_dir_path( __FILE__ ) );
define( 'WEP_URI', plugin_dir_url( __FILE__ ) );

register_activation_hook( __FILE__, function () {

	require_once 'includes/create-page.php';

} );

require_once 'includes/woocommerce-override-template.php';

require_once 'includes/enqueues.php';

require_once 'includes/customizer-options.php';

require_once 'includes/page-template-override.php';

add_shortcode( 'wep-online-ordering', function () {
	ob_start();
	include_once WEP_PATH . 'templates/components/main.php';

	return ob_get_clean();
} );




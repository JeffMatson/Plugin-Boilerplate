<?php

/**
 * Initializes the plugin boilerplate.
 *
 * @link              https://jeffmatson.net
 * @since             1.0.0
 * @package           Jeff_Matson\Plugin_Boilerplate
 *
 * @wordpress-plugin
 * Plugin Name:       Jeff Matson's WordPress Plugin Boilerplate
 * Plugin URI:        https://jeffmatson.net
 * Description:       WordPress plugin boilerplate by Jeff Matson.
 * Version:           1.0.0
 * Author:            Jeff Matson
 * Author URI:        https://jeffmatson.net
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       plugin-boilerplate
 * Domain Path:       /languages
 */

namespace Jeff_Matson\Plugin_Boilerplate;
define( 'ASSETS_PATH', trailingslashit( plugin_dir_path( __FILE__ ) . 'assets' ) );
define( 'ASSETS_URL', trailingslashit( plugin_dir_url( __FILE__ ) . 'assets' ) );

$loader = require_once( plugin_dir_path( __FILE__ ) . 'vendor/autoload.php' );
$loader->addPSR4( 'Jeff_Matson\\Plugin_Boilerplate\\Includes\\', plugin_dir_path( __FILE__ ) . 'includes' );
$loader->addPSR4( 'Jeff_Matson\\Plugin_Boilerplate\\Admin\\', plugin_dir_path( __FILE__ ) . 'admin' );
$loader->addPSR4( 'Jeff_Matson\\Plugin_Boilerplate\\Frontend\\', plugin_dir_path( __FILE__ ) . 'frontend' );

if ( is_admin() ) {
	Admin\Init::get_instance();
} else {
	Frontend\Init::get_instance();
}

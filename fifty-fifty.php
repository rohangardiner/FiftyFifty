<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ncoa.com.au
 * @since             1.0.0
 * @package           Fifty_Fifty
 *
 * @wordpress-plugin
 * Plugin Name:       FiftyFifty
 * Plugin URI:        https://ncoa.com.au
 * Description:       Simple A/B Testing Plugin for WordPress
 * Version:           1.0.0
 * Author:            Rohan
 * Author URI:        https://ncoa.com.au/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fifty-fifty
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'FIFTY_FIFTY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-fifty-fifty-activator.php
 */
function activate_fifty_fifty() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fifty-fifty-activator.php';
	Fifty_Fifty_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-fifty-fifty-deactivator.php
 */
function deactivate_fifty_fifty() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fifty-fifty-deactivator.php';
	Fifty_Fifty_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_fifty_fifty' );
register_deactivation_hook( __FILE__, 'deactivate_fifty_fifty' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-fifty-fifty.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_fifty_fifty() {

	$plugin = new Fifty_Fifty();
	$plugin->run();

}
run_fifty_fifty();

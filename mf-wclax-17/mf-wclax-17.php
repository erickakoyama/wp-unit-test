<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           mf-wclax-17
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Plugin for Saving Metaboxes
 * Description:       This is a demo plugin to demonstrate unit testing with PHPUNIT
 * Version:           1.0.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The class responsible for orchestrating the actions and filters of the
 * core plugin.
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'mf-wclax-17/includes/class-mf-wclax-17-loader.php';

/**
 * The class responsible for defining all actions that occur in the admin area.
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'mf-wclax-17/includes/class-mf-wclax-17-admin.php';

/**
 * The core plugin class that is used to define admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mf-wclax-17.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mf_wclax_17() {
	$plugin_name = 'mf-wclax-17';
	$plugin_version = '1.0.0';
	$admin = new Mf_Wclax_17_Admin($plugin_name, $plugin_version);
	$loader = new Mf_Wclax_17_Loader();
	$plugin = new Mf_Wclax_17( $plugin_name, $plugin_version, $admin, $loader );
	$plugin->run();

}
run_mf_wclax_17();

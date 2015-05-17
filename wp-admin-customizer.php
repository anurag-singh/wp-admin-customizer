<?php

/**
 * @link              http://www.anuragsingh.me/
 * @since             1.0.0
 * @package           WP_Admin_Customizer
 *
 * @wordpress-plugin
 * Plugin Name:       WP Admin Customizer
 * Plugin URI:        http://www.anuragsingh.me/wp-plugins/wp-admin-customizer
 * Description:       Customize the <strong>wordpress admin login area</strong>.
 * Version:           1.0.0
 * Author:            Anurag Singh
 * Author URI:        http://www.anuragsingh.me/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-admin-customizer
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-admin-customizer-activator.php
 */
function activate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-admin-customizer-activator.php';
	WP_Admin_Customizer_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-admin-customizer-deactivator.php
 */
function deactivate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-admin-customizer-deactivator.php';
	WP_Admin_Customizer_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_name' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_name' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-admin-customizer.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_name() {

	$plugin = new WP_Admin_Customizer();
	$plugin->run();

}
run_plugin_name();

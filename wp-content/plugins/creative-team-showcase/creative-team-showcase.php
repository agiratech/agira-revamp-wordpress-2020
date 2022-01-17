<?php

/**
 * Creative Team Showcase.
 *
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Creative Team Showcase
 * Plugin URI:        http://www.creativeteamshowcase.com/
 * Description:       The plugin provides you with very creative templates for your team.
 * Version:           2.7.0
 * Author:            Infinue
 * Author URI:        https://codecanyon.net/user/infinue
 * Text Domain:       ctshowcase
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/*
 * Currently plugin version.
 * Start at version 1.0.0
 */
define( 'CTSHOWCASE_VERSION', '2.7.0' );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-creative-team-showcase-activator.php.
 */
function activate_Creative_Team_ShowCase() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-creative-team-showcase-activator.php';
	Creative_Team_ShowCase_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-creative-team-showcase-deactivator.php.
 */
function deactivate_Creative_Team_ShowCase() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-creative-team-showcase-deactivator.php';
	Creative_Team_ShowCase_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_Creative_Team_ShowCase' );
register_deactivation_hook( __FILE__, 'deactivate_Creative_Team_ShowCase' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-creative-team-showcase.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_Creative_Team_ShowCase() {
	 $plugin = new Creative_Team_ShowCase();
	$plugin->run();
}
run_Creative_Team_ShowCase();
add_image_size( 'ctshowcase_custom_image', 600, 600, true );

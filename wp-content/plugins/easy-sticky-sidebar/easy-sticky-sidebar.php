<?php

/**
 * Plugin Name: WP CTA
 * Description: WordPress Call To Action plugin that helps promote content, increase sales and generate leads. It's easy to use and comes with 3 customizable templates.
 * Version: 1.6.5
 * Author: WP CTA PRO
 * Text Domain: easy-sticky-sidebar
 * Author URI: https://wpctapro.com/
 * Requires at least: 4.0
 * Tested up to: 6.6.1
 * Requires PHP: 5.3
 *
 * @package easy-sticky-sidebar
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

define('EASY_STICKY_SIDEBAR_VERSION', '1.6.5');
define('EASY_STICKY_SIDEBAR_PLUGIN_DIR', untrailingslashit(plugin_dir_path(__FILE__)));
define('EASY_STICKY_SIDEBAR_PLUGIN_URL', untrailingslashit(plugin_dir_url(__FILE__)));
define('EASY_STICKY_SIDEBAR_PLUGIN_FILE', __FILE__);
define('EASY_STICKY_SIDEBAR_PLUGIN_BASENAME', plugin_basename(__FILE__));

// Include the main UltimatePageBuilder class.
if (!class_exists('SSuprydpClassStickySidebar')) {
	include_once EASY_STICKY_SIDEBAR_PLUGIN_DIR . '/inc/ClassStickySidebar.php';
}

/**
 * Main instance of SSuprydpStickySidebar.
 *
 * Returns the main instance of SSuprydpStickySidebar.
 *
 * @since  1.2.0
 * @return ClassStickySidebar
 */
function SSuprydpStickySidebar()
{
	return SSuprydpStickySidebar::instance();
}

// Global for backwards compatibility.
$GLOBALS['SSuprydp_shortcodes'] = SSuprydpStickySidebar();


/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function easy_sticky_sidebar_appsero_init_tracker()
{

	if (!class_exists('Appsero\Client')) {
		require_once __DIR__ . '/appsero/src/Client.php';
	}

	$client = new Appsero\Client('e9661fae-2fcb-4985-b7ad-eca7a17e9d75', 'WP CTA', __FILE__);

	// Active insights
	$client->insights()->init();

	// Active automatic updater
	$client->updater();
}
add_action('init', 'easy_sticky_sidebar_appsero_init_tracker');



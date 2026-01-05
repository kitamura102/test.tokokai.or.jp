<?php

/**
 * Plugin Name: WP CTA - sticky CTA builder, generate leads, promote sales
 * Description: WordPress Call To Action plugin that helps promote content, increase sales and generate leads. It's easy to use and comes with 3 customizable templates.
 * Version: 1.7.4
 * Author: WP CTA PRO
 * Text Domain: easy-sticky-sidebar
 * Author URI: https://wpctapro.com/
 * Requires at least: 4.0
 * Tested up to: 6.8
 * Requires PHP: 7.4
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Network: false
 *
 * @package easy-sticky-sidebar
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

define('EASY_STICKY_SIDEBAR_VERSION', '1.7.3');
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



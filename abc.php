<?php 
/*
Plugin Name: ABC Pricing Table for Elementor
Plugin URI: https://github.com/devatiq/abc-pricing-table-for-elementor
Description: This is a required plugin for Abcbiz Theme Elementor Version.
Version: 1.0
Author: SupreoX Limited
Author URI: https://supreox.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: ABCPTE
Domain Path: /languages
Elementor tested up to: 3.16.0
Elementor Pro tested up to: 3.16.1
*/


if (!defined('ABSPATH')) exit; // Exit if accessed directly


// Define ABCPTE_PLUGIN_FILE.
if (!defined('ABCPTE_PLUGIN_FILE')) {
    define('ABCPTE_PLUGIN_FILE', __FILE__);
}
// Define ABCPTE_PLUGIN_DIR.
if (!defined('ABCPTE_PLUGIN_DIR')) {
    define('ABCPTE_PLUGIN_DIR', plugin_dir_path(ABCPTE_PLUGIN_FILE));
}
// Define ABCPTE_PLUGIN_URL.
if (!defined('ABCPTE_PLUGIN_URL')) {
    define('ABCPTE_PLUGIN_URL', plugins_url('', ABCPTE_PLUGIN_FILE));
}


// Define ABCPTE_TEXT_DOMAIN.
if (!defined('ABCPTE_TEXTDOMAIN')) {
    define('ABCPTE_TEXTDOMAIN', 'ABCPTE');
}


// require addtional files
require_once ABCPTE_PLUGIN_DIR . 'inc/functions.php';
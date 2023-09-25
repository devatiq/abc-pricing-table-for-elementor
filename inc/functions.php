<?php 
// don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;


//register textdomain
function abcpte_textdomain()
{
    load_plugin_textdomain('ABCPTE', false, dirname(plugin_basename(__FILE__)).'/inc/languages/');
}

// ABCPTE plugin general init
function abcpte_plugin_general_init()
{

        // Load Main plugin class
        require_once 'Base/Main.php';
        /**
         * Initiate the plugin class
         */
        \ABCPTE\ABCPricingTableForElementor::instance();

}

add_action('plugins_loaded', 'abcpte_plugin_general_init');
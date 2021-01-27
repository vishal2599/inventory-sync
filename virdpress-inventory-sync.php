<?php

/**
 * @package VirdpressInventorySync
 *
 */
/*
Plugin Name: Virdpress Inventory Sync
Description: This plugin fetches products and Shop Data from an external API. Note - **This plugin requires WooCommerce to store products**
Version: 1.0.0
Author: Virdpress
License: GPLv2 or later
Text Domain: virdpress-inventory-sync
 */

// If this file is called directly, Abort!!
defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

// Require Once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// Method that runs on Plugin Activation
function activate_virdpress_inventory_sync()
{
    Virdpress\Base\Activate::activate();
}
register_activation_hook( __FILE__ , 'activate_virdpress_inventory_sync' );


// Method that runs on Plugin Deactivation
function deactivate_virdpress_inventory_sync()
{
    Virdpress\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__ , 'deactivate_virdpress_inventory_sync' );


if( class_exists( "Virdpress\\Init" ) ){
    Virdpress\Init::register_services();
}
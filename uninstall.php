<?php

/**
 * 
 * Trigger this file on Plugin Uninstall
 * 
 * @package VirdpressInventorySync
 * 
 */

 if( !defined( 'WP_UNINSTALL_PLUGIN' ) ){
     die;
 }

 // Clear data stored in database
delete_option('virdpress_inventory_id');
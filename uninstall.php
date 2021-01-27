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
 
 $books = get_posts([
     'post_type' => 'book',
     'numberposts' => -1
     ]);

foreach( $books as $book ){
    wp_delete_post( $book->ID, true);
}
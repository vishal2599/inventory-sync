<?php

/**
 * @package VirdpressInventorySync
 *
 */

 namespace Virdpress\Base;

 class Deactivate
 {
     public static function deactivate()
     {
         flush_rewrite_rules();
     }
 }

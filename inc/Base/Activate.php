<?php

/**
 * @package VirdpressInventorySync
 *
 */

 namespace Virdpress\Base;

class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();
    }
}

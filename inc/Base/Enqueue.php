<?php

/**
 * @package VirdpressInventorySync
 *
 */

namespace Virdpress\Base;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    public function enqueue()
    {
        wp_enqueue_style('virdpress-inventory-style', $this->plugin_url . 'assets/admin/admin.css');
        wp_enqueue_style('font-awesome-css','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

        wp_enqueue_script('virdpress-inventory-script', $this->plugin_url . 'assets/admin/admin.js');
    }
}

<?php

/**
 * @package VirdpressInventorySync
 *
 */

namespace Virdpress\Pages;

use \Virdpress\Base\BaseController;

class Admin extends BaseController
{
    public function register()
    {
        add_action('admin_menu', [ $this, 'add_admin_pages' ]);
    }
    public function add_admin_pages()
    {
        add_menu_page('Virdpress Inventory', 'Inventory', 'manage_options', 'virdpress_inventory_sync', [$this, 'admin_index'], 'dashicons-store', 110);
    }

    public function admin_index()
    {
        require_once $this->plugin_path . 'templates/admin.php';
    }
}

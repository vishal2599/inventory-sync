<?php

/**
 * @package VirdpressInventorySync
 *
 */

namespace Virdpress\Base;

class Publish extends BaseController
{
    public $biz_id, $shop_data = [];
    public function register()
    {
        add_action('admin_post_virdpress_update_business_id', [$this, 'updateBizId']);
    }

    public function updateBizId()
    {
        if (isset($_POST['virdpress_inventory_nonce']) && wp_verify_nonce($_POST['virdpress_inventory_nonce'], 'virdpress_inventory')) {
            update_option('virdpress_inventory_id', $_POST['virdpress_business_id']);
            $this->biz_id = $_POST['virdpress_business_id'];

            $this->getShopData();
            wp_redirect('/wp-admin/admin.php?page=virdpress_inventory_sync');
        }
    }

    public function getShopData()
    {
        $url = "https://3.96.239.95/api/v1/business/menu/BIZ:".$this->biz_id;
        
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "x-authorization: iBXFyJYGO1cigHvzKxFYcjxiLcQpv0DZT4vxX3mWR40ncoddNaGRKRiLgvDv2b1D",
            'Content-Type: application/json'
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($resp);
        update_option('virdpress_inventory_hours', $response->hours);
        update_option('virdpress_inventory_reviews', $response->reviews);
    }
}

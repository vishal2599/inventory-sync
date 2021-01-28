<h1>Virdpress Inventory Sync</h1>

<form class="virdpress-inventory" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" name="virdpress_inventory">
    <?php
    $biz_id = get_option('virdpress_inventory_id');
    ?>
    <input name="virdpress_business_id" type="text" placeholder=" Enter Business Id" style="width: 400px;" <?php echo (isset($biz_id)) ? ' value="' . $biz_id . '"' : ''; ?>>

    <?php $virdpress_inventory = wp_create_nonce('virdpress_inventory');  ?>
    <input type="hidden" name="virdpress_inventory_nonce" value="<?php echo $virdpress_inventory; ?>" />
    <input type="hidden" name="action" value="virdpress_update_business_id" />

    <input type="submit" value="Submit" class="button-primary" style="margin-top: 20px;">
</form>


<?php $hours = get_option('virdpress_inventory_hours'); ?>
<?php $reviews = get_option('virdpress_inventory_reviews'); ?>

<?php if (isset($hours)) : ?>
    <div class="virdpress_inventory_details">
        <h2 class="title">Shop Timings</h2>
        <div class="hours">
            <?php foreach ($hours as $time) : ?>
                <?php if ($time->ophIsOpen == 1) : ?>
                    <div class="day">
                        <h2><?php echo jddayofweek($time->ophDayOfWeek, 2); ?></h2>
                        <h4>Open <span class="open"><?php echo $time->ophOpenTime; ?></span> - <span class="close"><?php echo $time->ophCloseTime; ?></span></h4>
                    </div>
            <?php endif;
            endforeach; ?>
        </div>
        <h2 class="title">Customer Reviews</h2>
        <div class="reviews">
            <?php foreach ($reviews as $item) : ?>
                <div class="review-item">
                    <div class="stars">
                        <?php $remain = 5 - $item->rvwScore; ?>
                        <?php for ($i = 0; $i < $item->rvwScore; $i++) : ?>
                            <span class="fa fa-star checked"></span>
                        <?php endfor; ?>
                        <?php for ($j = 0; $i < $remain; $j++) : ?>
                            <span class="fa fa-star"></span>
                        <?php endfor; ?>
                    </div>
                    <h3><?php echo $item->rvwComment; ?></h3>
                    <p>Date: <?php echo date('d M, Y', strtotime($item->rvwCreationDate)) . ' at ' . date('H:i', strtotime($item->rvwCreationDate)); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
<?php endif; ?>
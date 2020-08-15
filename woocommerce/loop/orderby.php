<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="row product-btn justify-content-between mb-40">
    <div class="select-this">
        <form class="woocommerce-ordering" method="get">
            <select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
                <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
                    <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="paged" value="1" />
            <?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
        </form>
    </div>

    <!-- Grid and List view -->
    <div class="grid-list-view">
    </div>
    <!-- Select items -->
    <div class="select-this">
        <form method="get">
            <div class="select-itms">
	            <?php $shop_url = get_permalink( wc_get_page_id( 'shop' ) );?>
                <ul>
                    <li><a href="<?php echo esc_url($shop_url); ?>?pp3">3</a></li>
                    <li><a href="<?php echo esc_url($shop_url); ?>?pp6">6</a></li>
                    <li><a href="<?php echo esc_url($shop_url); ?>?pp9">9</a></li>
                    <li><?php _e('Shop Per Page', 'timezone'); ?></li>
                </ul>
            </div>
        </form>
    </div>
</div>


<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="col-xl-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?> col-lg-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?> col-md-6 col-sm-6">
    <div class="single-popular-items mb-50 text-center">
        <div class="popular-img">
			<?php echo woocommerce_get_product_thumbnail('timezone_360x379'); ?>
            <div class="img-cap">
                <span><?php woocommerce_template_loop_add_to_cart(); ?></span>
            </div>
            <div class="favorit-items">
                <span class="flaticon-heart"></span>
            </div>
        </div>
        <div class="popular-caption">
            <a href="<?php echo esc_url($link); ?>"><?php woocommerce_template_loop_product_title(); ?></a>
			<?php woocommerce_template_loop_price(); ?>
        </div>
    </div>
</div>

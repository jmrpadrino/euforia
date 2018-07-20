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
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$prefix = 'euforia_';

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<li <?php wc_product_class(); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item' );
    ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 product-placeholder">
            <?php
                $ribbon = get_post_meta($product->get_id(), $prefix . 'product_ribbon', true );
                if($ribbon){
            ?>
            <div class="euforia-ribbon">
                <img src="<?= wp_get_attachment_url( $ribbon ) ?>">
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-5 product-image-placeholder">
                    <?php
                        /**
                         * Hook: woocommerce_before_shop_loop_item_title.
                         *
                         * @hooked woocommerce_show_product_loop_sale_flash - 10
                         * @hooked woocommerce_template_loop_product_thumbnail - 10
                         */
                        //do_action( 'woocommerce_before_shop_loop_item_title' );
                        $imagen_destacada = get_post_thumbnail_id( $product->get_id() );
                        $imagen_destacada = wp_get_attachment_url( $imagen_destacada );
                        
                        ?>
                    <img src="<?= $imagen_destacada ?>" class="img-responsive loop-producto-post-thumbnail">
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php
                                    /**
                                     * Hook: woocommerce_shop_loop_item_title.
                                     *
                                     * @hooked woocommerce_template_loop_product_title - 10
                                     */
                                    do_action( 'woocommerce_shop_loop_item_title' );

                                    /**
                                     * Hook: woocommerce_after_shop_loop_item_title.
                                     *
                                     * @hooked woocommerce_template_loop_rating - 5
                                     * @hooked woocommerce_template_loop_price - 10
                                     */
                                    do_action( 'woocommerce_after_shop_loop_item_title' );
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <input type="number" id="quantity_5b4be5ef46667" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Cantidad" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
                                    <span class="special-product-type">PACKS</span>
                                <?php
                                /**
                                 * Hook: woocommerce_after_shop_loop_item.
                                 *
                                 * @hooked woocommerce_template_loop_product_link_close - 5
                                 * @hooked woocommerce_template_loop_add_to_cart - 10
                                 */
                                do_action( 'woocommerce_after_shop_loop_item' );
                                ?>    
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 text-right euforia-product-description">
                            <span><?= $product->get_short_description(); ?> </span>
                        </div>
                        <div class="col-xs-12">
                            <?php 
                            $attachment_ids = $product->get_gallery_image_ids();

                            if ( $attachment_ids && has_post_thumbnail() ) {
                                echo '<ol class="flex-control-nav flex-control-thumbs">';
                            ?>
                                <div data-thumb="<?= $imagen_destacada ?>" class="woocommerce-product-gallery__image">
                                    <a href="<?= $imagen_destacada ?>">
                                        <img width="600" height="1067" src="<?= $imagen_destacada ?>" class="" alt="<?= $product->get_name() ?>" title="<?= $product->get_name() ?>" data-caption="<?= $product->get_name() ?>" data-src="<?= $imagen_destacada ?>">
                                    </a>
                                </div>
                            <?php
                                foreach ( $attachment_ids as $attachment_id ) {
                                    echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id  ), $attachment_id );
                                }
                                echo '</ol>';
                            }
                            ?>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
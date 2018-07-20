<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author         WooThemes
 * @package     WooCommerce/Templates
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="woocommerce-order">

    <?php if ( $order ) : ?>

    <?php if ( $order->has_status( 'failed' ) ) : ?>

    <div class="woocommerce-custom-checkout custom-error">
        <div class="checkout-custom-container">
            <h3>
                <?php _e('Transacción Fallida', 'vitahealth'); ?>
            </h3>
            <p>
                <?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?>
            </p>
            <div class="big-icon">
                <i class="fa fa-close"></i>
            </div>
        </div>
    </div>

    <?php else : ?>

    <div class="woocommerce-custom-checkout custom-pass">
        <div class="checkout-custom-container">
            <div class="big-icon">
                <img src="<?= get_template_directory_uri() ?>/images/vendido.png" alt="transaccion exitosa">
            </div>
            <h3>
                <?php _e('Transacción Exitosa', 'vitahealth'); ?>
            </h3>
            <p>
                <?php _e( 'Nuestro personal se contactará contigo para ejecutar tu compra.', 'woocommerce' ); ?>
            </p>
        </div>
    </div>

    <?php endif; ?>


    <?php else : ?>

    <div class="woocommerce-custom-checkout custom-pass">
        <div class="checkout-custom-container">
           <div class="big-icon">
                <img src="<?= get_template_directory_uri() ?>/images/vendido.png" alt="transaccion exitosa">
            </div>
            <h3>
                <?php _e('Transacción Exitosa', 'vitahealth'); ?>
            </h3>
            <p>
                <?php _e( 'Nuestro personal se contactará contigo para ejecutar tu compra.', 'woocommerce' ); ?>
            </p>
        </div>
    </div>

    <?php endif; ?>

</div>

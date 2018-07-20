<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
    echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
    return;
}

?>
<div class="row">
    <div class="col-md-6 col-md-offset-1">
        <div class="logo-placeholder" style="width: 540px;">
            <!--img width="100px" class="ribon-new" src="http://localhost/euforia/wp-content/themes/euforia/images/euforia-ribon.png"-->
            <img width="540px" class="brand-name" src="<?= get_template_directory_uri() ?>/images/euforia-logo.png">
        </div>
    </div>
</div>
<div class="woocommerce-custom-checkout-container">
    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <div class="background-round">
                    <?php if ( $checkout->get_checkout_fields() ) : ?>

                    <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                    <div class="col2-seta" id="customer_details">
                        <div class="col-1a">
                            <?php do_action( 'woocommerce_checkout_billing' ); ?>
                        </div>

                        <!--div class="col-2">
                            <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                        </div-->
                    </div>

                    <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                    <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="background-round">
                    <h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>

                    <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                    </div>
                    <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
                    </div>
                    <div class="slogan-content-placeholder">
                        <img class="product-slogan" src="<?= get_template_directory_uri() ?>/images/euforia-slogan.png">
                        <img class="slogan-badge" src="<?= get_template_directory_uri() ?>/images/euforia-badge.png">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

<?php get_header(); the_post(); ?>
            <div class="container">
                <?= get_template_part('templates/logo-placeholder') ?>
                <div class="row">
                    <div class="col-xs-12 home-product-container">
                        <img class="product-home-image" src="<?= get_template_directory_uri() ?>/images/euforia--reflejo.png">
                        <div class="flex-row-centered-elements product-bkg-placeholder">
                            <img width="600px" class="product-bkg" src="<?= get_template_directory_uri() ?>/images/euforia-wolf-eyes.jpg">
                        </div>
                        <?= get_template_part('templates/slogan-placeholder') ?>
                    </div>
                </div>
            </div>
<?php if ( !empty ( get_the_content() ) ){ ?>
            <div class="home-more-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <?= the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
<?php } ?>
<?php get_footer(); ?>
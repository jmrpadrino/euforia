<?php 
/*
Template Name: Euforia Side Product ALT
*/
?>
<?php get_header(); the_post(); ?>
            <div class="container alter-template">
                <?= get_template_part('templates/logo-placeholder') ?>
                <div class="row">
                    <div class="col-sm-4">
                        <img class="euforia-product-aside" src="<?= get_template_directory_uri() ?>/images/euforia--reflejo.png" alt="Euforia - Despierta La Bestia">
                    </div>
                    <div class="col-sm-8 col-md-6 product-aside">
                        <div class="page-content-container">
                            <?php the_content(); ?>
                        </div>                        
                        <img class="wolf-strike" src="<?= get_template_directory_uri() ?>/images/euforia-wolf-strike.png" alt="Euforia - Despierta La Bestia">
                        <?= get_template_part('templates/slogan-placeholder') ?>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12" style="background: gray;">
                        
                    </div>
                </div>
            </div>
<?php get_footer(); ?>
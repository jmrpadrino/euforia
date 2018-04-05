<?php 
/*
Template Name: Euforia Side Product
*/
?>
<?php get_header(); the_post(); ?>
            <div class="container">
                <?= get_template_part('templates/logo-placeholder') ?>
                <div class="row">
                    <div class="col-sm-8">
                        <?php the_content(); ?>
                    </div>
                    <div class="col-sm-4 product-aside">  
                        <div class="stickThis">                      
                            <img class="wolf-strike" src="<?= get_template_directory_uri() ?>/images/euforia-wolf-strike.png" alt="Euforia - Despierta La Bestia">
                            <img class="euforia-product-aside" src="<?= get_template_directory_uri() ?>/images/euforia--reflejo.png" alt="Euforia - Despierta La Bestia">
                            <?= get_template_part('templates/slogan-placeholder') ?>
                        </div>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>
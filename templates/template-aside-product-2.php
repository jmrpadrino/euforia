<?php 
/*
Template Name: Euforia Side Product Slogan Content
*/
?>
<?php get_header(); the_post(); ?>
            <style>
                .slogan-content-placeholder{
                    padding-left: 40px;
					margin-bottom: 50px;
                }
                .slogan-content-placeholder .slogan-placeholder{
                    bottom: 0;
                    right: auto;
                }
                .slogan-content-placeholder .slogan-badge{
                    margin-top: 120px;
                    transform: translateX(-50px);
                }
                .slogan-content-container .euforia-product-aside, .slogan-content-container .product-aside{
                    margin-bottom: 0px;
                }
            </style>
            <div class="container slogan-content-container">
                <?= get_template_part('templates/logo-placeholder') ?>
                <div class="row">
                    <div class="col-sm-7 col-md-7 col-md-offset-1">
                        <div class="slogan-content-content">                            
                            <?php the_content(); ?>
                        </div>
                        <div class="slogan-content-placeholder">
                            <img class="product-slogan" src="<?= get_template_directory_uri() ?>/images/euforia-slogan.png">
                            <img class="slogan-badge" src="<?= get_template_directory_uri() ?>/images/euforia-badge.png">
                        </div>
                    </div>
                    <div class="col-sm-5 col-md-3 product-aside">  
                        <div class="stickThis">                      
                            <!--
                            <img class="wolf-strike" src="<?= get_template_directory_uri() ?>/images/euforia-wolf-strike.png" alt="Euforia - Despierta La Bestia">
                            -->
                            <img class="euforia-product-aside" src="<?= get_template_directory_uri() ?>/images/euforia--reflejo.png" alt="Euforia - Despierta La Bestia">
                        </div>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>
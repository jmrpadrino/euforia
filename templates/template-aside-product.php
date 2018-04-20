<?php 
/*
Template Name: Euforia Side Product
*/
?>
<?php get_header(); the_post(); ?>
<style>
    @media screen and (max-width: 1500px) and (min-width: 1024px){
        .slogan-placeholder{
            right: 0;
        }
        .product-slogan{
            width: 90%;
        }
        .slogan-badge{
            width: 70px;
            margin-left: -20px;
        }
        .euforia-form{
            margin-top: 40px;
        }
        .euforia-form input, .euforia-form textarea{
            padding: 7px;
            font-size: 14px;
            margin-bottom: 14px;
        }
    }
</style>
            <div class="container">
                <?= get_template_part('templates/logo-placeholder') ?>
                <div class="row">
                    <div class="col-sm-7 col-md-7 col-md-offset-1">
                        <?php the_content(); ?>
                    </div>
                    <div class="col-sm-5 col-md-3 product-aside">  
                        <div class="stickThis">                      
                            <!--
                            <img class="wolf-strike" src="<?= get_template_directory_uri() ?>/images/euforia-wolf-strike.png" alt="Euforia - Despierta La Bestia">
                            -->
                            <img class="euforia-product-aside" src="<?= get_template_directory_uri() ?>/images/euforia--reflejo.png" alt="Euforia - Despierta La Bestia">
                            <?= get_template_part('templates/slogan-placeholder') ?>
                        </div>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>
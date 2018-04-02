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
                            <img class="wolf-strike" src="<?= get_template_directory_uri() ?>/images/euforia-wolf-strike.png" alt="Euforia - Despierta La Bestia">
                            <?= get_template_part('templates/slogan-placeholder') ?>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="container-fluid more-products-section">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="container">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-1">
                                        <h3>CONÓCE MÁS DE<br />NUESTROS PRODUCTOS:</h3>
                                        <hr />
                                        <img class="vita-health-logo" src="<?= get_template_directory_uri() ?>/images/vita-health-logo.png" alt="VitaHealth">
                                        <a class="vita-link" href="http://www.vitahealth.la/" target="_blank">www.vitahealth.la</a>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img width="120px" src="<?= get_template_directory_uri() ?>/images/slim_sola.png" alt="Vita Health - Slim Shot">
                                            </div>
                                            <div class="col-md-4">
                                                <img width="120px" src="<?= get_template_directory_uri() ?>/images/relax_shot.png" alt="Vita Health - Relax &amp; Sleep Shot">
                                            </div>
                                            <div class="col-md-4">
                                                <img width="120px" src="<?= get_template_directory_uri() ?>/images/vitahealth_colageno.png" alt="Vita Health - Colageno">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>
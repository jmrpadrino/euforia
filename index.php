<?php get_header(); ?>
<style>
    .archive-carousel{
        position: relative;
        min-height: 800px;
    }
    .wolf-slogan-box{
        position: absolute;
        right: 0;
        bottom: 100px;
    }
    .wolf-slogan-box .wolf-strike{
        bottom: 0px;
        width: 350px;
        left: auto;
        right: -50px;
        position: relative;
        z-index: -1;
    }
    .carousel-control{
        font-size: 14px;
        top: 260px!important;
        height: 30px!important;
        z-index: 999999999999999;
    }
    .carousel-control span{
        border-radius: 100%;
        background: rgba(0, 0, 0, 0.7);
    }
    .carousel-control.left,.carousel-control.right{
        background: transparent!important;   
    }
    .carousel-control .glyphicon-chevron-left, .carousel-control .glyphicon-chevron-right, .carousel-control .icon-next, .carousel-control .icon-prev{
        padding-top: 5px;
        margin-top: -10px;
        font-size: 20px;
    }
    .archive-carousel-title-placeholder,.archive-carousel-hr,.archive-carousel-post-thumbnail{
        width: 80%;
        margin: 0 auto;
    }
    .archive-carousel-post-thumbnail{
        margin: 18px auto;
        min-height: 350px;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
    .archive-carousel-post-link, .archive-carousel-post-link:hover, .archive-carousel-post-link:visited, .archive-carousel-post-link:active, .archive-carousel-post-link:link{
        display: inline-block;
        margin: 18px 0;
        padding: 8px 17px;
        color: white;
        text-decoration: none;
        border: 1px solid white;
        text-transform: uppercase;
        margin-left: 10%;
    }
</style>
<div class="container">
    <?= get_template_part('templates/logo-placeholder') ?>
    <div class="row">
        <div class="col-md-6 col-md-push-3 archive-carousel">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">                
                <div class="carousel-inner" role="listbox">
                    <?php
                        $contador = 0;
                        while ( have_posts() ){ the_post();
                            $image_url = 'http://placehold.it/800x600?text=Euforia';
                            if (has_post_thumbnail()){
                                $imagen_url = get_the_post_thumbnail_url( get_the_ID(), 'full');
                            }
                    ?>
                    <div class="item <?= $contador == 0 ? 'active' : '' ?>">
                        <div class="archive-carousel-title-placeholder">
                            <h2 class="archive-carousel-post-title"><?= the_title() ?></h2>
                        </div>
                        <hr class="archive-carousel-hr" />
                        <div class="archive-carousel-post-thumbnail" style="background-image: url(<?= $imagen_url ?>)"></div>
                        <a class="archive-carousel-post-link gthin" href="<?= get_permalink( get_the_ID() ) ?>">Leer art&iacute;culo <i class="fas fa-caret-right"></i></a>
                    </div>
                    <?php $contador++; } ?>
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <div class="wolf-slogan-box">
                <img class="wolf-strike" src="<?= get_template_directory_uri() ?>/images/euforia-wolf-strike.png" alt="Euforia - Despierta La Bestia">
                <?= get_template_part('templates/slogan-placeholder') ?>
            </div>
        </div>
        <div class="col-md-2 col-md-offset-3 col-md-pull-8">
            <h2 class="gthin">Archivo /</h2>
            <?php
                $year_prev = null;
                $months = $wpdb->get_results(	"SELECT DISTINCT MONTH( post_date ) AS month ,
                                                                    YEAR( post_date ) AS year,
                                                                    COUNT( id ) as post_count FROM $wpdb->posts
                                                                    WHERE post_status = 'publish'
                                                                    and post_type = 'post'
                                                                    GROUP BY month , year
                                                                    ORDER BY post_date ASC");

                foreach($months as $month) :
                $year_current = $month->year;
                if ($year_current != $year_prev){
                    if ($year_prev != null){
            ?>
            </ul>
        <?php } ?>
        <h3><?php echo $month->year; ?></h3>
        <ul class="archive-list pull-right">
            <?php } ?>
            <li>
                <a class="archive-month-link" href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>">
                    <span class="archive-month"><?php echo _e(ucfirst(date("F", mktime(0, 0, 0, $month->month, 1, $month->year)))) ?></span>
                    <!--span class="archive-count"><?php echo $month->post_count; ?></span-->
                </a>
            </li>
            <?php $year_prev = $year_current;
            endforeach; ?>
        </ul>
    </div>
</div>
</div>
<?php get_footer(); ?>
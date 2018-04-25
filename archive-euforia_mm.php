<?php get_header(); $prefix = 'euforia_'; ?>
<style>
    .main-container{
        margin-top: 60px;
    }
    .logo-placeholder{
        max-width: 550px;
        margin: 0 auto;
        float: none;
    }
    .grid-placeholder{
        margin-top: 20px;
        padding: 0px;
    }
    .archive-alter-grid{
        display: flex;

        flex-wrap: wrap;
    }
    .multimedia-item-container{
        min-height: 250px;
        max-height: 250px;
        content:" ";
        background: rgba(255, 0, 69, 0.21);
        *border: 1px solid rgba(105, 105, 105, 0.2);
        display: inline-block;
        overflow: hidden;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
    .multimedia-mask-placeholder{
        position: relative;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 255, 0.47);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all ease-in .2s;
        filter: hue-rotate(0) brightness(100%);
        -webkit-filter: hue-rotate(0) brightness(100%);
    }
    .multimedia-item-container:hover:not(.multimedia-last-one){
        transition: filter ease-in .2s;
        -webkit-filter: hue-rotate(90deg) brightness(70%);
        filter: hue-rotate(90deg) brightness(70%);
    }
    .multimedia-item-container:hover .multimedia-mask-placeholder{
        opacity: 1;
        transition: opacity ease-in .2s;
    }
    .multimedia-mask-link, 
    .multimedia-mask-link:hover, 
    .multimedia-mask-link:visited, 
    .multimedia-mask-link:active, 
    .multimedia-mask-link:link{
        display: inline-block;
        padding: 7px 17px;
        color: white;
        text-decoration: none;
        border: 1px solid white;
        text-transform: uppercase;
        font-size: 14px;
    }
    .multimedia-last-one{
        position: relative;
    }
    .flex-col-1{
        flex: 1 0 20%;
    }
    .flex-col-2{
        flex: 1 0 30%;
    }
    .modal {
        text-align: center;
        padding: 0!important;
    }

    .modal:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -4px;
    }

    .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
    }
    .modal-backdrop{
        opacity: 0.8 !important;
    }
    .button-close{
        position: relative;
        color: white;
        z-index: 9999999;
        opacity: .8;
        margin-top: 36px;
    }
    .play-btn{
        display: block;
        margin: 0 auto;
        margin-bottom: 18px;
    }
    .slogan-placeholder{
        margin: auto;
    }
    .slogan-placeholder .product-slogan{
        max-width: 200px;
    }
    .slogan-placeholder .slogan-badge{
        max-width: 60px;
    }
    @media screen and (min-width: 1400px){
        .multimedia-item-container{
            min-height: 320px;
            max-height: 320px;
        }
        .main-container {
            margin-top: 80px;
        }
    }
    @media screen and (max-width: 767px){
        .flex-col-1, .flex-col-2{
            flex: 1 0 100%;
        }
    }

</style>
<div class="container">
    <?= get_template_part('templates/logo-placeholder') ?>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 grid-placeholder">
            <div class="archive-alter-grid">
               
                <?php 
                    while ( have_posts() ){ 
                        the_post();
                        $horizontal = get_post_meta(get_the_ID(), $prefix . 'horizontal', true);
                        if ( has_post_thumbnail() ){
                            $imagen_fondo = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                        }
                ?>
                
                <div class="multimedia-item-container flex-col-<?= $horizontal == 1 ? '2' : '1' ?>" style="background-image: url(<?= $imagen_fondo ?>)">
                    <div class="multimedia-mask-placeholder">
                       <?php if ( get_post_format() == 'gallery') { ?>
                        <a class="multimedia-mask-link gthin" href="#" data-toggle="modal" data-target="#<?= sanitize_title(get_the_title()) ?>">Ver Contenido <i class="fas fa-caret-right"></i></a>
                        <?php } ?>
                        <?php if ( get_post_format() == 'video') { ?>
                        <a class="play-btn" href="#" data-toggle="modal" data-target="#<?= sanitize_title(get_the_title()) ?>"><img src="<?= get_template_directory_uri() ?>/images/boton-play.png" alt="Euforia - Play Video"></a>
                        <a class="multimedia-mask-link gthin" href="#" data-toggle="modal" data-target="#<?= sanitize_title(get_the_title()) ?>">Reproducir</a>
                        <?php } ?>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="<?= sanitize_title(get_the_title()) ?>" tabindex="-1" role="dialog" aria-labelledby="<?= sanitize_title(get_the_title()) ?>">
                    <div class="modal-dialog modal-lg" role="document">
                        <button type="button" class="close button-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title gthin"><?= the_title() ?></h2>
                        <?php if ( get_post_format() == 'gallery') { ?>
                        <img class="img-responsive" src="<?= $imagen_fondo ?>" alt="<?= get_the_title() ?>">
                        <?php } ?>
                        <?php if ( get_post_format() == 'video') { $video_id = get_post_meta( get_the_ID(), $prefix . 'video', true); ?>
                        <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $video_id ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        <?php } ?>
                        <div class="image-excerpt">
                            <?= get_the_excerpt() ?>
                        </div>
                    </div>
                </div>
                
                <?php } ?>
                <div class="multimedia-item-container multimedia-last-one flex-col-2" style="background-image: url(<?= get_template_directory_uri() ?>/images/euforia-multimedia-divbkg.jpg)">
                    <?php get_template_part('templates/slogan-placeholder'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>
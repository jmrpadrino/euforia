<?php get_header(); the_post(); ?>
<style>
    .single-post-placeholder{
        background:rgba(0, 0, 0, 0.4); 
        padding: 55px 100px;
        margin-bottom: 120px;
    }
    @media screen and (max-width: 768px){
        .single-post-placeholder{
            padding: 50px 0;
            margin-bottom: 0px;
        }
    }
    .single-content-placeholder a{
        color: white;        
    }
    .single-content-placeholder a:hover{
        text-decoration: underline;
    }
    .single-post-placeholder .wolf-strike{
        position: absolute;
        z-index: -1;
        bottom: -80px;
        right: 280px;
        left: auto;
    }
    .single-image-placeholder{
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .post-thumbnail{
        margin: 0 auto;
        display: block;
    }
    .archive-carousel-post-link, 
    .archive-carousel-post-link:hover, 
    .archive-carousel-post-link:visited, 
    .archive-carousel-post-link:active, 
    .archive-carousel-post-link:link{
        display: inline-block;
        margin: 18px 0;
        margin-bottom: 0px;
        padding: 7px 17px;
        color: white;
        text-decoration: none;
        border: 1px solid white;
        text-transform: uppercase;
        font-size: 14px;
    }
    .post-image-thumbnail{
        margin: 0 auto;
    }
    @media screen and (max-width: 500px){
        .post-image-thumbnail{
            margin-top: 60px;
        }
    }
</style>
<div class="container">
    <?= get_template_part('templates/logo-placeholder') ?>
    <div class="row">
        <div class="col-xs-12 single-post-placeholder">
            <div class="row">
                <div class="col-sm-7 col-sm-push-5">
                    <div class="single-content-placeholder halfs">
                        <?= the_title('<h1 class="single-title">', '</h1>') ?>
                        <hr />
                        <?php the_content(); ?>
                        <a class="archive-carousel-post-link gthin" href="<?= home_url('blog') ?>/">M&aacute;s art&iacute;culos <i class="fas fa-caret-left"></i></a>
                    </div>
                </div>
                <div class="col-sm-5 col-sm-pull-7 text-center">
                    <img src="<?= the_post_thumbnail_url( 'medium' ) ?>" class="img-responsive post-image-thumbnail">
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
<?php get_header(); the_post(); ?>
<style>
    .single-post-placeholder{
        background:rgba(0, 0, 0, 0.4); 
        padding: 55px 100px;
        position: relative;
        margin-bottom: 120px;
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
    .flex-single-container{
        display: flex;
        align-content: center;
        justify-content: space-between;
        align-items: flex-start;
        width: 100%;
    }
    .flex-single-container .halfs{
        flex: 0 1 35%;
        height: 100%;
    }
    .flex-single-container .halfs + .halfs{
        flex: 0 1 65%;
    }
    .single-content-placeholder{
        padding: 0 36px;
    }
    .single-image-placeholder{
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .archive-carousel-post-link, .archive-carousel-post-link:hover, .archive-carousel-post-link:visited, .archive-carousel-post-link:active, .archive-carousel-post-link:link{
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
</style>
<div class="container">
    <?= get_template_part('templates/logo-placeholder') ?>
    <div class="row">
        <div class="col-xs-12 single-post-placeholder">
            <div class="row">
                <div class="col-xs-12">
                    <div class="flex-single-container">
                        <div class="single-image-placeholder halfs" style="background-image: url(<?= $imagen = get_the_post_thumbnail_url( $post->ID ); ?>)"></div>
                        <div class="single-content-placeholder halfs">
                            <?= the_title('<h1 class="single-title">', '</h1>') ?>
                            <hr />
                            <?php the_content(); ?>
                            <a class="archive-carousel-post-link gthin" href="<?= home_url('blog') ?>/">M&aacute;s art&iacute;culos <i class="fas fa-caret-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--
            <img class="wolf-strike" src="<?= get_template_directory_uri() ?>/images/euforia-wolf-strike.png" alt="Euforia - Despierta La Bestia">
            -->
        </div>
    </div>
</div>
<?php get_footer(); ?>
<script>
    $(document).ready( function(){
        var altura_sibling = $('.single-content-placeholder').height();
        $('.single-image-placeholder').height( altura_sibling - 80 );
    })
</script>
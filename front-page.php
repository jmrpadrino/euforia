<?php get_header(); the_post(); ?>
            <style>
                .benefits-placeholder{
                    position: absolute;
                    z-index: 999;
                    bottom: 20px;
                    left: calc(50% - 420px);
                    font-size: 16px;
                    line-height: 18px;
                    opacity: 0;
                    transition: all ease-in .6s;
                    color: #EC0B43;
                    font-family: 'GothamMedium', sans-serif;
                    padding: 18px;
                    border-bottom: 1px solid #EC0B43;
                    text-align: right;
                    padding-left: 50px;
                }
                @media screen and (min-width: 1500px){
                    .benefits-placeholder{
                        bottom: 100px;
                    }
                }
                .benefits-placeholder:before{
                    content: '';
                    display: inline-block;
                    position: absolute;
                    bottom: -4px;
                    left: 0;
                    width: 8px;
                    height: 8px;
                    border-radius: 100%;
                    background: #EC0B43;
                }
                
                .benefits-placeholder.active{
                    left: calc(50% - 460px);
                    opacity: 1;
                    transition: all ease-in .3s;
                }
                /*
                .benefit-1,
                .benefit-2,
                .benefit-3{
                    opacity: 0;
                    transition: opacity ease-in .2s;
                }
                */
                .benefit-1:after,
                .benefit-2:after,
                .benefit-3:after{
                    content: '';
                    display: inline-block;
                    width: 6px;
                    height: 6px;
                    border-radius: 100%;
                    transform: translateY(-2px) translateX(10px);
                    background: #EC0B43;
                }
                /*
                .benefits-placeholder.active .benefit-1{
                    opacity: 1;
                    transition: opacity .4s ease-in .0s;
                }
                .benefits-placeholder.active .benefit-2{
                    opacity: 1;
                    transition: opacity .4s ease-in 1s;
                }
                .benefits-placeholder.active .benefit-3{
                    opacity: 1;
                    transition: opacity .4s ease-in 1.8s;
                }
                */
                @-moz-keyframes blink {
                    0% {
                        opacity:1;
                    }
                    25%{
                        opacity: .8;
                    }
                    50% {
                        opacity:.4;
                    }
                    75%{
                        opacity: 1;
                    }
                    100% {
                        opacity:.7;
                    }
                } 

                @-webkit-keyframes blink {
                    0% {
                        opacity:1;
                    }
                    25%{
                        opacity: .8;
                    }
                    50% {
                        opacity:.4;
                    }
                    75%{
                        opacity: 1;
                    }
                    100% {
                        opacity:.7;
                    }
                }
                /* IE */
                @-ms-keyframes blink {
                    0% {
                        opacity:1;
                    }
                    25%{
                        opacity: .8;
                    }
                    50% {
                        opacity:.4;
                    }
                    75%{
                        opacity: 1;
                    }
                    100% {
                        opacity:.7;
                    }
                } 
                /* Opera and prob css3 final iteration */
                @keyframes blink {
                    0% {
                        opacity:1;
                    }
                    25%{
                        opacity: .8;
                    }
                    50% {
                        opacity.4;
                    }
                    75%{
                        opacity: 1;
                    }
                    100% {
                        opacity:.7;
                    }
                }
                .product-bkg-placeholder{
                    opacity: .4;
                }
                .home-product-container:hover .product-bkg-placeholder{
                    -moz-animation: blink normal 1s infinite ease-in-out; /* Firefox */
                    -webkit-animation: blink normal 1s infinite ease-in-out; /* Webkit */
                    -ms-animation: blink normal 1s infinite ease-in-out; /* IE */
                    animation: blink normal 1s infinite ease-in-out; /* Opera and prob css3 final iteration */
                }
            </style>
            <div class="benefits-placeholder hidden-xs">
               <div class="benefit-1">Mejora el rendimiento</div>
               <div class="benefit-2">Mejora la sensibilidad al est&iacute;mulo</div>
               <div class="benefit-3">Mejora la circulaci&oacute;n sangu&iacute;nea</div>
            </div>
            <div class="container">
                <?= get_template_part('templates/logo-placeholder') ?>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 home-product-container">
                        <img class="product-home-image" src="<?= get_template_directory_uri() ?>/images/euforia--reflejo-home.png">
                        <div class="flex-row-centered-elements product-bkg-placeholder">
                            <img class="product-bkg" src="<?= get_template_directory_uri() ?>/images/euforia-wolf-eyes.jpg">
                        </div>
                        <?= get_template_part('templates/slogan-placeholder') ?>
                    </div>
                </div>
            </div>
<?php if ( !empty ( get_the_content() ) ){ ?>
            <div class="home-more-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <?= the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
<?php } ?>
<?php get_footer(); ?>
<script>
    $(document).ready( function(){
        $('.product-home-image').mouseenter( function(){
            $('.benefits-placeholder').toggleClass('active');
        });
        $('.product-home-image').mouseout( function(){
            setTimeout( function(){
                $('.benefits-placeholder').toggleClass('active');
            },1000);
        })
    })
</script>
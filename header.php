<?php 
$prefix = 'euforia_';
$contacto = get_page_by_path('contacto');
$contacto_ID = $contacto->ID;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="<?= bloginfo('description') ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= bloginfo('name') ?></title>
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= get_template_directory_uri() ?>/images/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= get_template_directory_uri() ?>/images/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= get_template_directory_uri() ?>/images/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= get_template_directory_uri() ?>/images/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= get_template_directory_uri() ?>/images/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= get_template_directory_uri() ?>/images/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= get_template_directory_uri() ?>/images/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= get_template_directory_uri() ?>/images/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="<?= get_template_directory_uri() ?>/images/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="<?= get_template_directory_uri() ?>/images/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="<?= get_template_directory_uri() ?>/images/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?= get_template_directory_uri() ?>/images/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="<?= get_template_directory_uri() ?>/images/favicon-128.png" sizes="128x128" />
        <meta name="application-name" content="Euforia - Despierta la bestia"/>
        <meta name="msapplication-TileColor" content="#EC0B43" />
        <meta name="msapplication-TileImage" content="<?= get_template_directory_uri() ?>/images/mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="<?= get_template_directory_uri() ?>/images/mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="<?= get_template_directory_uri() ?>/images/mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="<?= get_template_directory_uri() ?>/images/mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="<?= get_template_directory_uri() ?>/images/mstile-310x310.png" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(isset($class) ? $class : ''); ?>>
        <header>
            <div class="container-fluid header-placeholder">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="container">
                            <div class="row hidden-md hidden-lg">
                                <div class="col-xs-5">
                                    <a href="<?= home_url() ?>"><h1 class="euforia-brand-responsive"><?= bloginfo('name') ?><br /><small><?= bloginfo('description') ?></small></h1></a>
                                </div>
                                <div class="col-xs-7">
                                    <ul class="list-inline header-menu social-menu pull-right">
                                        <?php if ( $facebook = get_post_meta( $contacto_ID, $prefix . 'facebook', true) ){ ?>
                                        <li class="menu-item"><a href="<?= $facebook ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <?php } ?>
                                        <?php if ( $instagram = get_post_meta( $contacto_ID, $prefix . 'instagram', true) ){ ?>
                                        <li class="menu-item"><a href="<?= $instagram ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <?php } ?>
                                        <?php if ( $youtube = get_post_meta( $contacto_ID, $prefix . 'youtube', true) ){ ?>
                                        <li class="menu-item"><a href="<?= $youtube ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                        <?php } ?>
                                        <li id="responsive-nav-btn" class="menu-item"><a href="#"><i class="fas fa-bars"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row hidden-sm hidden-xs">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <nav id="main-nav">
                                                <?php 
                                                //wp_nav_menu( array('menu' => 'Main', 'menu_class' => 'nav navbar-nav navbar-right pull-right orangine-menu-items', 'depth'=> 4, 'container'=> false, 'walker'=> new Bootstrap_Walker_Nav_Menu));
                                                wp_nav_menu( array(
                                                    'theme_location'    => 'main-nav',
                                                    'depth'             => 1,
                                                    'container'         => 'ul',
                                                    'container_class'   => 'list-inline header-menu',
                                                    'container_id'      => 'header-menu',
                                                    'menu_class'        => 'list-inline header-menu',
                                                ) );
                                                ?>
                                            </nav>                                        
                                            <ul class="list-inline header-menu social-menu pull-right">
                                                <?php if ( $facebook = get_post_meta( $contacto_ID, $prefix . 'facebook', true) ){ ?>
                                                <li class="menu-item"><a href="<?= $facebook ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <?php } ?>
                                                <?php if ( $instagram = get_post_meta( $contacto_ID, $prefix . 'instagram', true) ){ ?>
                                                <li class="menu-item"><a href="<?= $instagram ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                <?php } ?>
                                                <?php if ( $youtube = get_post_meta( $contacto_ID, $prefix . 'youtube', true) ){ ?>
                                                <li class="menu-item"><a href="<?= $youtube ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="main-container">
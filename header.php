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
                                <div class="col-xs-6">
                                    <h1 class="euforia-brand-responsive"><?= bloginfo('name') ?><br /><small><?= bloginfo('description') ?></small></h1>
                                </div>
                                <div class="col-xs-6">
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
                            <div class="row hidden-sm hidden-xs">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-xs-10">
                                            <nav>
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
                                        </div>
                                        <div class="col-xs-2">
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
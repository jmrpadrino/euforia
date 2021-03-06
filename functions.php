<?php

/* Auxiliar scripts */
require_once('includes/euforia-custom-post-type.php');
require_once('includes/euforia-custom-metaboxes.php');

function euforia_setup(){

    /* Theme translation */

    load_theme_textdomain( 'euforia', get_template_directory() . '/languages' );

    /* Theme components */

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'post-formats', array( 'video', 'gallery' ) );

    /* Enqueuing Styles and Sripts */

    function add_theme_scripts() {

        if (!is_admin())   
        {  
            wp_deregister_script('jquery');  

            // Load a copy of jQuery from the Google API CDN  
            // The last parameter set to TRUE states that it should be loaded  
            // in the footer.  
            wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', FALSE, '1.11.0', TRUE);  

            wp_enqueue_script('jquery');  
        }
        // Including Bootstrap, Owlcarousel and PrettyPhoto files
        wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.3.7', 'all' );
        wp_enqueue_style( 'bootstrap_theme', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css', array(), '3.3.7', 'all' );
        wp_enqueue_style( 'euforia', get_template_directory_uri() . '/css/euforia.css', array(), '1.1', 'all');
        wp_enqueue_style( 'euforia-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,400i,700,900', array(), '', 'all');
        wp_enqueue_style( 'euforia-style', get_stylesheet_uri() );
        /*
        wp_enqueue_style( 'owlslider', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '2.2.0', null );
        wp_enqueue_style( 'owltheme', get_template_directory_uri() . '/css/owl.theme.min.css', array(), '2.2.0', null );
        wp_enqueue_style( 'owltransition', get_template_directory_uri() . '/css/owl.transitions.css', array(), '2.2.0', null );
        */
        wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array ( 'jquery' ), '3.3.7', true);
        //wp_enqueue_script( 'owlsliderjs', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), null, true );

        // Including theme styles
        wp_register_script( "euforia", get_template_directory_uri() .'/js/euforia.js', array('jquery') );
        wp_localize_script( 'euforia', 'euforiaAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        

        wp_enqueue_script( 'euforia-scroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array ( 'jquery' ), '1.1', true);
        wp_enqueue_script( 'euforia-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array ( 'jquery' ), '1.1', true);
        wp_enqueue_script( 'euforia-icons','https://use.fontawesome.com/releases/v5.0.9/js/all.js', array ( 'jquery' ), '1.1', true);
        wp_enqueue_script( 'euforia', get_template_directory_uri() . '/js/euforia.js', array ( 'jquery' ), '1.1', true);


        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
    add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

    /* Theme Navigation */

    if (function_exists('register_nav_menus')) {
        register_nav_menus( array(
            'main-nav' => __( 'Main Navigation', 'euforia' ),
            'footer-nav' => __( 'Footer Navigation', 'euforia' ),
        ) );
    };

    /* Create menu items */
    function add_items_to_menu($oldname, $oldtheme = false) {
        /* Create header and footer menus */
        $menus = array(
            'Main Navigation'  => array(
                'home' => 'Home',
                'about-us'  => 'About Us',
                'products' => 'Products',
                'services'  => 'Services', 
                'contact' => 'Contact'
            ), 
            'Footer Navigation' => array(
                'home' => 'Home',
                'about-us'  => 'About Us',
                'products' => 'Products',
                'services'  => 'Services',                    
                'contact' => 'Contact'
            ),
            'Bottom Navigaton' => array(
                'sitemap' => 'Sitemap', 
                'legal-notice' => 'Legal Notice', 
                'terms-conditions' => 'Terms & Conditions'
            )
        );
        foreach($menus as $menuname => $menuitems) {
            $menu_exists = wp_get_nav_menu_object($menuname);
            // If it doesn't exist, let's create it.
            if ( !$menu_exists) {
                $menu_id = wp_create_nav_menu($menuname);
                foreach($menuitems as $slug => $item) {
                    wp_update_nav_menu_item(
                        $menu_id, 0, array(
                            'menu-item-title'  => $item,
                            'menu-item-object'  => 'page',
                            'menu-item-object-id'  => get_page_by_path($slug)->ID,
                            'menu-item-type' => 'post_type',
                            'menu-item-status'  => 'publish'
                        )
                    );
                }
            }
        }
    }
    add_action('after_switch_theme', 'add_items_to_menu', 10 ,  2);

    /* Theme Sidebar(s) */

    register_sidebar( array(
        'name'          => __( 'Subscripcion del Footer', 'escape' ),
        'id'            => 'subscribe',
        'description'   => __( 'Aparece en la sección del footer del sitio.', 'escape' ),
        'before_widget' => '<aside id="%1$s" class="widget suscribe %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );


    // euforia Color Scheme
    wp_admin_css_color(
        'euforia', __( 'Euforia', 'admin_schemes' ),
        get_template_directory_uri()."/style.css",
        array( '#ec0b43', '#ac0931', '#484848', '#2d2d2d' ),
        array( 
            'base' => '#ec0b43', 
            'focus' => '#ac0931', 
            'current' => '#efefef' 
        )
    );
    add_filter('get_user_option_admin_color', 'change_admin_color');
    function change_admin_color($result) {
        return 'euforia';
    }

}
add_action( 'after_setup_theme', 'euforia_setup' );

// ORDENAR MULTIMEDIA POR FECHA ASCENDENTE 
/*function ordenarMultimedia(){
    if ( is_archive() ){
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'ordenarMultimedia'); */



/* Pagination Support */

function numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /**	Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /**	Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    /**	Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('<i class="zmdi zmdi-chevron-left"></i>') );

    /**	Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /**	Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /**	Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /**	Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('<i class="zmdi zmdi-chevron-right"></i>') );

    echo '</ul></div>' . "\n";

}

function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }

    return $urls;
}

// WOOCOMMERCE
/* WOOCOMMERCE - DECLARE THEME SUPPORT - BEGIN */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<div id="main" class="container-fluid p-0"><div class="row no-gutters"><div class="woocustom-main-container col-12">';
}

function my_theme_wrapper_end() {
    echo '</div></div></div>';
}


remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

add_action('woocommerce_custom_related_product', 'woocommerce_output_related_products', 10);


// removes Order Notes Title - Additional Information
add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

//remove Order Notes Field
add_filter( 'woocommerce_checkout_fields' , 'remove_order_notes' );

function remove_order_notes( $fields ) {
    unset($fields['order']['order_comments']);
    return $fields;
}

?>
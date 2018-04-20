<?php 
// Register Custom Post Type
function euforia_multimedia() {

    $labels = array(
        'name'                  => _x( 'Euforia Multimedia', 'Post Type General Name', 'euforia' ),
        'singular_name'         => _x( 'Euforia Multimedia', 'Post Type Singular Name', 'euforia' ),
        'menu_name'             => __( 'Euforia Multimedia', 'euforia' ),
        'name_admin_bar'        => __( 'Euforia Multimedia', 'euforia' ),
        'archives'              => __( 'Euforia Multimedia historico', 'euforia' ),
        'attributes'            => __( 'Euforia Multimedia atributos', 'euforia' ),
        'parent_item_colon'     => __( 'Euforia Multimedia padre:', 'euforia' ),
        'all_items'             => __( 'Euforia Multimedia todos', 'euforia' ),
        'add_new_item'          => __( 'agregar Nuevo Euforia Multimedia', 'euforia' ),
        'add_new'               => __( 'Agregar Euforia Multimedia', 'euforia' ),
        'new_item'              => __( 'Nuevo Euforia Multimedia', 'euforia' ),
        'edit_item'             => __( 'Editar Euforia Multimedia', 'euforia' ),
        'update_item'           => __( 'Actualizar Euforia Multimedia', 'euforia' ),
        'view_item'             => __( 'Ver Euforia Multimedia', 'euforia' ),
        'view_items'            => __( 'Ver todos Euforia Multimedia', 'euforia' ),
        'search_items'          => __( 'Buscar Euforia Multimedia', 'euforia' ),
        'not_found'             => __( 'No se encuentra', 'euforia' ),
        'not_found_in_trash'    => __( 'No se encuentra en papelera', 'euforia' ),
        'featured_image'        => __( 'Imagen destacada', 'euforia' ),
        'set_featured_image'    => __( 'Colocar imagen destacada', 'euforia' ),
        'remove_featured_image' => __( 'Remover imagen destacada', 'euforia' ),
        'use_featured_image'    => __( 'Use como imagen destacada', 'euforia' ),
        'insert_into_item'      => __( 'Insertar en Euforia Multimedia', 'euforia' ),
        'uploaded_to_this_item' => __( 'Subido a Euforia Multimedia', 'euforia' ),
        'items_list'            => __( 'Euforia Multimedia Listado', 'euforia' ),
        'items_list_navigation' => __( 'Euforia Multimedia listado navegacion', 'euforia' ),
        'filter_items_list'     => __( 'Filtro Euforia Multimedia lista', 'euforia' ),
    );
    $rewrite = array(
        'slug'                  => 'euforia-multimedia',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Euforia Multimedia', 'euforia' ),
        'description'           => __( 'Sección multimedia del sitio para Euforia', 'euforia' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'excerpt', 'thumbnail', 'post-formats' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => get_template_directory_uri() . '/images/favicon-16x16.png',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'query_var'             => 'multimedia',
        'rewrite'               => $rewrite,
        'capability_type'       => 'post',
    );
    register_post_type( 'euforia_mm', $args );

}
add_action( 'init', 'euforia_multimedia', 0 );
?>
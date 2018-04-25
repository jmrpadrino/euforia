<?php
/*
 * Este archivo contiene los codigo para generar los metaboxes para cada CPT
 */
global $post;
add_filter( 'rwmb_meta_boxes', 'euforia_register_meta_boxes' );
function euforia_register_meta_boxes( $meta_boxes ) {
    //verificar si es la página de fechas de salida
    $prefix = 'euforia_';
    $post_ID = !empty($_POST['post_ID']) ? $_POST['post_ID'] : (!empty($_GET['post']) ? $_GET['post'] : FALSE);
    
    if (!$post_ID)
        return $meta_boxes; // Para que no emita mensaje de error
    
    $current_post = get_post($post_ID);
    
    $current_post_type = $current_post->post_type;
    if ($current_post->post_name == 'contacto'){
        // META BOXES para las páginas de presentacion de Itinerarios
        $meta_boxes[] = array(
            'id'         => 'page_features',
            'title'      => '<span style="color: #EC0B43;"><i class="dashicons dashicons-share"></i> ' . __( 'Redes Sociles ', 'euforia' ).'</span>',
            'post_types' => array('page'),
            'fields' => array(
                array(
                    'name' => 'Facebook',
                    'id' => $prefix . 'facebook',
                    'type' => 'url',
                    'desc' => __('<span style="color: red; font-weight: bold;">Indique la url para que aparezca en la pagina publicado.</span>','euforia'),
                ),
                array(
                    'name' => 'Instagram',
                    'id' => $prefix . 'instagram',
                    'type' => 'url',
                    'desc' => __('<span style="color: red; font-weight: bold;">Indique la url para que aparezca en la pagina publicado.</span>','euforia'),
                ),
                array(
                    'name' => 'Youtube',
                    'id' => $prefix . 'youtube',
                    'type' => 'url',
                    'desc' => __('<span style="color: red; font-weight: bold;">Indique la url para que aparezca en la pagina publicado.</span>','euforia'),
                ),
            )
        );
    }
    
    $formato = get_post_format( $post_ID );
    
    if ( $formato == 'video' ) {
        $campo_meta = array(
            'name' => 'Youtube Video ID',
            'id' => $prefix . 'video',
            'type' => 'text',
            'desc' => 'Ejem.: https://www.youtube.com/watch?v=<strong style="color: #EC0B43;">Z6ih1aKeETk</strong>'
        );
        $horizontal = array(
            'name' => 'Horizontal en grilla?',
            'id'   => $prefix . 'horizontal',
            'type' => 'hidden',
            'std'  => 0, // 0 or 1
        );
    }else if( $formato == 'gallery'){
        $campo_meta = array(
            'name' => 'Imagen',
            'id' => $prefix . 'img',
            'type' => 'image_advanced',
        );
        $horizontal = array(
            'name' => 'Horizontal en grilla?',
            'id'   => $prefix . 'horizontal',
            'type' => 'checkbox',
            'std'  => 0, // 0 or 1
        );
    } else {
        $campo_meta = array(
            'name' => 'NO DEFINIDO',
            'id' => $prefix . 'NADA',
            'type' => 'text',
            'desc' => 'Para publicar multimedia defina el <strong>formato</strong> de la publicación en la caja a su derecha.'
        );
    }
        
    $meta_boxes[] = array(
        'id'         => 'page_features',
        'title'      => '<span style="color: #EC0B43;"><i class="dashicons dashicons-share"></i> ' . __( 'Galeria Multimedia ', 'euforia' ).'</span>',
        'post_types' => array('euforia_mm'),
        'fields' => array( 
            $campo_meta,
            $horizontal
        ),
        'priority' => 'low',
    );
    
    return $meta_boxes;

}
?>
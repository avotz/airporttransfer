<?php 
add_filter( 'rwmb_meta_boxes', 'guanacasteviajes_register_meta_boxes' );

function guanacasteviajes_register_meta_boxes( $meta_boxes ) {
    $prefix = 'rw_';
    // 1st meta box
    $meta_boxes[] = array(
        'id'         => 'additional',
        'title'      => __( 'Additional Information', 'textdomain' ),
        'post_types' => array( 'booking-hotel'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => 'Gallery',
                'desc'  => 'Format: Image File',
                'id'    => $prefix . 'gallery_thumb',
                'type'  => 'image_advanced',
                'std'   => '',
                'class' => 'custom-class'
                
            ),
            array(
                'name' => 'Price From',
                'desc' => '',
                'id' => $prefix . 'price_from',
                'type' => 'text',
                

            ),
            
           
        )
    );

    $meta_boxes[] = array(
        'id'         => 'additional',
        'title'      => __( 'Additional Information', 'textdomain' ),
        'post_types' => array( 'hotel'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => 'Gallery',
                'desc'  => 'Format: Image File',
                'id'    => $prefix . 'gallery_thumb',
                'type'  => 'image_advanced',
                'std'   => '',
                'class' => 'custom-class'
                
            ),
            
           
        )
    );

    // 2nd meta box
    $meta_boxes[] = array(
        'title'      => __('Additional Information', 'textdomain' ),
        'post_types' => 'product',
        'fields'     => array(
            array(
                'name' => 'Includes',
                'desc' => 'Includes',
                'id' => $prefix . 'includes',
                'type' => 'WYSIWYG',
                'options' => array('textarea_rows' => 5),
                'std' => '',
                'class' => 'custom-class'

            ),
            array(
                'name' => 'Map tour',
                'desc' => 'Map tour',
                'id' => $prefix . 'map_tour',
                'type' => 'WYSIWYG',
                'options' => array('textarea_rows' => 5),
                'std' => '',
                'class' => 'custom-class'

            ),
        )
    );

    $meta_boxes[] = array(
        'title'      => __('Additional Information', 'textdomain' ),
        'post_types' => 'testimonial',
        'fields'     => array(
            array(
                'name' => 'Date',
                'desc' => '',
                'id' => $prefix . 'testimonial_date',
                'type' => 'date',
                

            ),
            
        )
    );
    return $meta_boxes;
}
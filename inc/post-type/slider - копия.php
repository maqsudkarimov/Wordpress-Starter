<?php

/* ---------------------------------------------------------------------------
 * Custom Post Type
 * --------------------------------------------------------------------------- */

$slide = new CPT( array(
        'post_type_name' => 'slide',
        'singular'       => __( 'Slide', 'qwerty' ),
        'plural'         => __( 'Slides', 'qwerty' ),
        'slug'           => 'slide-slug',
    ),
    array( 'supports' => array( 'title', 'thumbnail' ) )
);

$slide->columns( array(
    'cb'             => '<input type="checkbox" />',
    'title'          => __( 'Title' ),
    'icon'           => __( 'Image' ),
    'slide-category' => __( 'Categories' ),
    'menu_order'     => __( 'Order' ),
    )
);

$slide->populate_column( 'menu_order', function( $column, $post ) {
    echo rwmb_meta( $column );
});

$slide->sortable( array(
    'menu_order' => array( 'menu_order', true ),
));

$slide->register_taxonomy(  'slide-category', array(), true );

$slide->add_taxonomy_field( array( 
    array(
        'name'        => 'CategoryImage',
        'label'       => 'Category Image',
        'description' => ' ',
        'type'        => 'file'
    ),
));

$slide->menu_icon( 'dashicons-images-alt' );


/* ---------------------------------------------------------------------------
 * Custom Post Type Meta-boxes
 * --------------------------------------------------------------------------- */

if( ! function_exists( 'slide_meta_boxes' ) )
{
    function slide_meta_boxes( $meta_boxes )
    {
        $meta_boxes[] = array(
            'id'         => 'slide',
            'title'      => __( 'Options', 'qwerty' ),
            'post_types' => array( 'slide' ),
            'context'    => 'normal',
            'priority'   => 'high',
            'autosave'   => true,
            'fields'     => array(
                array(
                    'name' => __( 'URL', 'qwerty' ),
                    'id'   => 'url',
                    'type' => 'text',
                ),
                array(
                    'name' => __( 'Description' ),
                    'id'   => 'description',
                    'type' => 'textarea',
                ),
                array(
                    'name' => __( 'Order' ),
                    'id'   => 'menu_order',
                    'type' => 'number',
                ),
            ),
        );

        return $meta_boxes;
    }
}
add_filter( 'rwmb_meta_boxes', 'slide_meta_boxes' );

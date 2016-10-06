<?php

/* ---------------------------------------------------------------------------
 * Custom Post Type
 * --------------------------------------------------------------------------- */

$sponsors = new CPT( array(
        'post_type_name' => 'sponsors',
        'singular'       => __( 'Sponsor', 'qwerty' ),
        'plural'         => __( 'Sponsors', 'qwerty' ),
        'slug'           => 'sponsors-slug',
    ),
    array( 'supports' => array( 'title', 'thumbnail' ) )
);

$sponsors->columns( array(
    'cb'                => '<input type="checkbox" />',
    'title'             => __( 'Title' ),
    'icon'              => __( 'Image' ),
    'sponsors-category' => __( 'Categories' ),
    'menu_order'        => __( 'Order' ),
    )
);

$sponsors->populate_column( 'menu_order', function( $column, $post ) {
    echo rwmb_meta( $column );
});

$sponsors->sortable( array(
    'menu_order' => array( 'menu_order', true ),
));

$sponsors->register_taxonomy( 'sponsors-category' );

$sponsors->menu_icon( 'dashicons-images-alt' );


/* ---------------------------------------------------------------------------
 * Custom Post Type Meta-boxes
 * --------------------------------------------------------------------------- */

if( ! function_exists( 'sponsors_meta_boxes' ) )
{
    function sponsors_meta_boxes( $meta_boxes )
    {
        $meta_boxes[] = array(
            'id'         => 'sponsors_pt',
            'title'      => __( 'Options', 'qwerty' ),
            'post_types' => array( 'sponsors' ),
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
                    'name' => __( 'Description', 'qwerty' ),
                    'id'   => 'description',
                    'type' => 'textarea',
                ),
                array(
                    'name' => __( 'Order', 'qwerty' ),
                    'id'   => 'menu_order',
                    'type' => 'number',
                ),
            ),
        );

        return $meta_boxes;
    }
}
add_filter( 'rwmb_meta_boxes', 'sponsors_meta_boxes' );

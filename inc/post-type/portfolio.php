<?php

/* ---------------------------------------------------------------------------
 * Custom Post Type
 * --------------------------------------------------------------------------- */

$portfolio = new CPT( array(
	    'post_type_name' => 'portfolio',
	    'singular' 		 => __( 'Portfolio', 'qwerty' ),
	    'plural' 		 => __( 'Portfolio', 'qwerty' ),
	    'slug' 			 => 'portfolio-slug'
	),
	array( 
		'supports' => array( 'title', 'thumbnail' ) 
	)
);

$portfolio->columns( array(
    'cb' 	               => '<input type="checkbox" />',
    'title'                => __( 'Title' ),
    'icon'                 => __( 'Image' ),
    'portfolio-category'   => __( 'Categories' ),
    'menu_order'           => __( 'Order' ),
));

$portfolio->populate_column( 'menu_order', function( $column, $post ) {
    echo rwmb_meta( $column );
});

$portfolio->sortable( array(
    'menu_order'         => array( 'menu_order', true ),
    'portfolio-category' => array( 'portfolio-category', true ),
));

$portfolio->register_taxonomy( 'portfolio-category' );

$portfolio->menu_icon( 'dashicons-images-alt' );


/* ---------------------------------------------------------------------------
 * Custom Post Type Meta-boxes
 * --------------------------------------------------------------------------- */

if( ! function_exists( 'portfolio' ) )
{
    function portfolio_meta_boxes( $meta_boxes )
    {
        $meta_boxes[] = array(
            'id'         => 'portfolio',
            'title'      => __( 'Options', 'qwerty' ),
            'post_types' => array( 'portfolio' ),
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
add_filter( 'rwmb_meta_boxes', 'portfolio_meta_boxes' );
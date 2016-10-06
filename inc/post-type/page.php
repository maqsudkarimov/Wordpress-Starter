<?php

/* ---------------------------------------------------------------------------
 * Creating Custom Post Type
 * --------------------------------------------------------------------------- */

$page = new CPT( 'page' );

$page->columns( array(
    'cb' 	          => '<input type="checkbox" />',
    'title'           => __( 'Title' ),
    //'author'          => __( 'Author' ),
    //'date' 	          => __( 'Date' ),
    'post_page-views' => __( 'Views', 'qwerty' )
));

$page->populate_column( 'post_page-views', function( $column, $post ) {
    echo rwmb_meta( $column ); 
});

$page->sortable( array(
    'post_page-views' => array( 'post_page-views', true ),
));


/* ---------------------------------------------------------------------------
 * Custom Post Type Meta-boxes
 * --------------------------------------------------------------------------- */

if( ! function_exists( 'page_meta_boxes' ) )
{
    function page_meta_boxes( $meta_boxes )
    {
        $meta_boxes[] = array(
            'id'         => 'page',
            'title'      => __( 'SEO', 'qwerty' ),
            'post_types' => array( 'page' ),
            'context'    => 'normal',
            'priority'   => 'high',
            'autosave'   => true,
            'fields'     => array(
                array(
                    'name' => __( 'Title', 'qwerty' ),
                    'id'   => 'title',
                    'type' => 'text',
                ),
                array(
                    'name' => __( 'Description', 'qwerty' ),
                    'id'   => 'description',
                    'type' => 'textarea',
                ),
                array(
                    'name' => __( 'Keywords', 'qwerty' ),
                    'id'   => 'keywords',
                    'type' => 'textarea',
                ),
            ),
        );

        return $meta_boxes;
    }
}
add_filter( 'rwmb_meta_boxes', 'page_meta_boxes' );
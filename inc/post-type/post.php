<?php

/* ---------------------------------------------------------------------------
 * Creating Custom Post Type
 * --------------------------------------------------------------------------- */

$post = new CPT( 'post' );

$post->columns( array(
    'cb' 	            => '<input type="checkbox" />',
    'title'             => __( 'Title' ),
    //'author'            => __( 'Author' ),
    'category'          => __( 'Categories' ),
    //'tags' 	            => __( 'Tags' ),
    'date' 	            => __( 'Date' ),
    'post_page-views'   => __( 'Views', 'qwerty'  )
));

$post->populate_column( 'post_page-views', function( $column, $post ) {
    echo rwmb_meta( $column ); 
});

$post->sortable( array(
    'post_page-views' => array( 'post_page-views', true ),
));
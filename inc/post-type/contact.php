<?php

/* ---------------------------------------------------------------------------
 * Creating Custom Post Type
 * --------------------------------------------------------------------------- */

$contact = new CPT( array(
	    'post_type_name' => 'contact',
	    'singular' 	 	 => __( 'Contact', 'qwerty' ),
		'plural'  		 => __( 'Contacts', 'qwerty' ),
	    'slug' 			 => false,
        'create_posts'   => false,
	),
	array( 
		'supports' => array( 'title', 'thumbnail' ) 
	)
);

$contact->columns( array(
    'cb' 	  => '<input type="checkbox" />',
    'title'   => __( 'Name' ),
    'email'   => __( 'Email' ),
    'message' => __( 'Message' ),
    'ip'      => __( 'IP' ),
    'date' 	  => __( 'Submitted on' )
));

$contact->populate_column( 'email', function( $column, $post ) {
    echo rwmb_meta( $column ); 
});

$contact->populate_column( 'message', function( $column, $post ) {
    echo rwmb_meta( $column );
});

$contact->populate_column( 'ip', function( $column, $post ) {
    echo rwmb_meta( $column );
});

$contact->menu_icon( 'dashicons-email' );

function wpb_change_title_text( $title ){
     $screen = get_current_screen();
 
     if  ( 'contact' == $screen->post_type ) {
          $title = __( 'Name', 'qwerty' );
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'wpb_change_title_text' );

/* ---------------------------------------------------------------------------
 * Custom Post Type Meta-boxes
 * --------------------------------------------------------------------------- */

if( ! function_exists( 'contact_meta_boxes' ) )
{
	function contact_meta_boxes( $meta_boxes ) 
	{
		$meta_boxes[] = array(
			'id'         => 'Contact',
			'title'      => __( 'Options', 'qwerty' ),
			'post_types' => array( 'contact' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'fields'     => array(
				array(
					'name'     => __( 'Name', 'qwerty' ),
					'id'       => 'name',
					'type'     => 'text',
					'readonly' => true
				),
				array(
					'name'     => __( 'Email', 'qwerty' ),
					'id'       => 'email',
					'type'     => 'text',
					'readonly' => true
				),
				array(
					'name'     => __( 'Message', 'qwerty' ),
					'id'       => 'message',
					'type'     => 'textarea',
					'readonly' => true
				),
				array(
					'name'     => __( 'IP', 'qwerty' ),
					'id'       => 'ip',
					'type'     => 'text',
					'readonly' => true
				),
				array(
					'name'     => __( 'File', 'qwerty' ),
					'id'       => 'file',
					'type'     => 'textarea',
					'readonly' => true
				),
			),
		);
		return $meta_boxes;
	}
}
add_filter( 'rwmb_meta_boxes', 'contact_meta_boxes' );
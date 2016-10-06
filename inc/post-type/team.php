<?php

/* ---------------------------------------------------------------------------
 * Creating Custom Post Type
 * --------------------------------------------------------------------------- */

$team = new CPT( array(
	    'post_type_name' => 'team',
	    'singular' 		 => __( 'Team', 'qwerty' ),
	    'plural' 		 => __( 'Team', 'qwerty' ),
	    'slug' 			 => 'team-slug',
	),
	array( 'supports' => array( 'title', 'thumbnail' ) )
);

$team->columns( array(
    'cb' 	=> '<input type="checkbox" />',
    'title' => __( 'Title' ),
    'icon'  => __( 'Image' ),
));

$team->menu_icon( 'dashicons-admin-users' );


/* ---------------------------------------------------------------------------
 * Custom Post Type Meta-boxes
 * --------------------------------------------------------------------------- */

if( ! function_exists( 'team_meta_boxes' ) )
{
	function team_meta_boxes( $meta_boxes ) 
	{
		$meta_boxes[] = array(
			'id'         => 'Team',
			'title'      => __( 'Options', 'qwerty' ),
			'post_types' => array( 'team' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'fields'     => array(
				array(
					'name'  => 'Position',
					'id'    => 'position',
					'type'  => 'text',
				),
				array(
					'name'  => 'Facebook',
					'id'    => 'facebook',
					'type'  => 'text',
				),
				array(
					'name'  => 'Google+',
					'id'    => 'googleplus',
					'type'  => 'text',
				),
				array(
					'name'  => 'Twitter',
					'id'    => 'twitter',
					'type'  => 'text',
				),
				array(
					'name'  => 'Dribble',
					'id'    => 'dribble',
					'type'  => 'text',
				),
				array(
					'name'  => 'Github',
					'id'    => 'github',
					'type'  => 'text',
				),
			),
		);
		return $meta_boxes;
	}
}
add_filter( 'rwmb_meta_boxes', 'team_meta_boxes' );
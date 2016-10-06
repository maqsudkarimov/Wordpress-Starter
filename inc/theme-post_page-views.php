<?php

/* ---------------------------------------------------------------------------
 * 
 * --------------------------------------------------------------------------- */
if( defined( 'DOING_AJAX' ) && DOING_AJAX ){

	if( ! function_exists( 'qwerty_increment_views' ) )
	{
		function qwerty_increment_views() {

		    if( empty( $_POST['post_id'] ) )
		        return;

		    $post_id = intval( $_POST['post_id'] );

		    if( $post_id > 0 ) {

		        $post_views = get_post_custom( $post_id );
		        $post_views = intval( $post_views['post_page-views'][0] );
		        
		        update_post_meta( $post_id, 'post_page-views', ( $post_views + 1 ) );

		        exit;

		    }
		}
	}

	add_action( 'wp_ajax_qwerty_increment_views', 'qwerty_increment_views' );
	add_action( 'wp_ajax_nopriv_qwerty_increment_views', 'qwerty_increment_views' );

}
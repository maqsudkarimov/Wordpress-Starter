<?php


/* ---------------------------------------------------------------------------
 * TITLE
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'qwerty_wp_title' ) )
{
	function qwerty_wp_title( $title, $sep ) {
		global $paged, $page;

		$sep = '-';

		$bloginfo_name = get_bloginfo( 'name', 'display' );

		$title_meta = get_post_meta( get_the_ID(), 'title', true );

		$site_description = get_bloginfo( 'description', 'display' );
		
		if ( is_home() || is_front_page() )
			$title = $bloginfo_name;
		else {
			if( $title_meta != '' )
				$title = $title_meta;
			else
				$title = $title . ' ' . $sep . ' ' . $bloginfo_name;
		}

		if ( ( $paged >= 2 || $page >= 2 ) && !is_404() )

			if( $title_meta != '' )
				$title = $title_meta . ' ' . $sep . ' ' . sprintf( __( 'Page %s', 'qwerty' ), max( $paged, $page ) );
			else
				$title = "$title $sep " . sprintf( __( 'Page %s', 'qwerty' ), max( $paged, $page ) );

		return $title;
	}
}
add_filter( 'wp_title', 'qwerty_wp_title', 10, 2 );


/* ---------------------------------------------------------------------------
 * SCRIPT LOADER TAG
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'qwerty_script_loader_tag' ) )
{
    function qwerty_script_loader_tag( $tag, $handle, $src ) {

        return "\t" . '<script src="' . $src . '"></script>' . "\n";
    } 
}
add_filter( 'script_loader_tag', 'qwerty_script_loader_tag', 10, 3 );


/* ---------------------------------------------------------------------------
 * STYLE LOADER TAG
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'qwerty_style_loader_tag' ) )
{
    function qwerty_style_loader_tag( $handle, $href, $media  ) {

        return "\t" . '<link href="' . $media .'" rel="stylesheet">' . "\n";
    } 
}
add_filter( 'style_loader_tag', 'qwerty_style_loader_tag', 10, 3 );


/* ---------------------------------------------------------------------------
 * WP ENQUEUE SCRIPTS
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'qwerty_wp_enqueue_scripts' ) )
{
	function qwerty_wp_enqueue_scripts() 
	{
		global $post;

		/* ---------------------------------------------------------------------------
		 * Styles
		 * --------------------------------------------------------------------------- */

		wp_enqueue_style( 'bootstrap',   THEME_URI .'/libs/Bootstrap/css/bootstrap.min.css',    false, null, 'all' );

		wp_enqueue_style( 'Everslider',  THEME_URI .'/libs/Everslider/css/everslider.css',      false, null, 'all' );

		wp_enqueue_style( 'Owl',         THEME_URI .'/libs/Owl/owl.carousel.css',               false, null, 'all' );

		//wp_enqueue_style( 'Animsition',   THEME_URI .'/libs/Animsition/css/animsition.min.css', false, null, 'all' );
		
		wp_enqueue_style( 'style',	     get_stylesheet_uri(),                				    false, null, 'all' );  


		/* ---------------------------------------------------------------------------
		 * Scripts
		 * --------------------------------------------------------------------------- */

		wp_deregister_script( 'jquery' );
			
		wp_register_script( 'jquery',      THEME_URI . '/libs/JQuery/jquery.min.js',     		false, null, true );
			
		wp_enqueue_script( 'jquery' );
			
		wp_enqueue_script( 'bootstrap',    THEME_URI . '/libs/Bootstrap/js/bootstrap.min.js',   false, null, true );
			
		wp_enqueue_script( 'Everslider',THEME_URI . '/libs/Everslider/js/jquery.everslider.min.js', false, null, true );
			
		wp_enqueue_script( 'Owl',          THEME_URI . '/libs/Owl/owl.carousel.min.js',         false, null, true );
			
		//wp_enqueue_script( 'Animsition',   THEME_URI . '/libs/Animsition/js/animsition.min.js', false, null, true );
			
		wp_enqueue_script( 'Validate',     THEME_URI . '/libs/Validate/jquery.validate.min.js', false, null, true );
			
		wp_enqueue_script( 'contact-form', THEME_URI . '/js/contact-form.js', 	 				false, null, true );
			
		wp_enqueue_script( 'member',       THEME_URI . '/js/member.js', 	 				    false, null, true );
			
		wp_enqueue_script( 'MixItUp',      THEME_URI . '/libs/MixItUp/jquery.mixitup.min.js',   false, null, true );
			
		//wp_enqueue_script( 'pjax',         THEME_URI . '/libs/pjax/jquery.pjax.js',             false, null, true );
			
		//wp_enqueue_script( 'Lightcase',    THEME_URI . '/libs/Lightcase/lightcase.min.js',      false, null, true );

		//wp_enqueue_script( 'page-accelerator', THEME_URI . '/js/page-accelerator.min.js',     false, null, true );
		
		wp_enqueue_script( 'post-view',    THEME_URI . '/js/post-view.js',           			false, null, true );

		wp_enqueue_script( 'main',         THEME_URI . '/js/main.js',           				false, null, true );
		
		/*wp_localize_script( 'main', 'Variables', array(
			'TimerTime' => qwerty_get_option( 'TimerTime', 'Countdown' ),
		));*/

		wp_localize_script( 'contact-form', 'Ajax', 
			array(
				'nonce'     => wp_create_nonce( 'AjaxNonce' ),
				'post_id'   => intval( $post->ID )
			)
		);
	}
}
add_action('wp_enqueue_scripts', 'qwerty_wp_enqueue_scripts');

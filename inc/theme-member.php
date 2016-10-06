<?php

/* ---------------------------------------------------------------------------
 * Global Variables
 * --------------------------------------------------------------------------- */
$xmlhttprequest = isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && !empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest';


/* ---------------------------------------------------------------------------
 * AUTHENTICATE WITH USERNAME
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'authenticate_username_password' ) )
{
	function authenticate_username_password( $user, $username, $password ) {
		if ( is_a( $user, 'WP_User' ) )
			return $user;

	    if ( ! empty( $username ) )
	        $user = get_user_by( 'email', $username );

	    if ( isset( $user->user_login, $user ) )
	        $username = $user->user_login;

	    return wp_authenticate_username_password( NULL, $username, $password );
	}
}
remove_filter( 'authenticate', 'wp_authenticate_username_password', 20, 3 );
add_filter( 'authenticate', 'authenticate_username_password', 20, 3 );


/* ---------------------------------------------------------------------------
 * ADMIN PANEL ACCESS
 * --------------------------------------------------------------------------- */
/*if( ! function_exists( 'qwerty_admin_panel_access' ) )
{
    function qwerty_admin_panel_access()
    {
		global $xmlhttprequest;
		
        //$redirect = isset( $_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : home_url( '/' );

        if( !current_user_can('administrator') && !$xmlhttprequest )
        {
            wp_redirect( home_url( '/404/' ) );
            exit;
        }
    }
}
add_action( 'admin_init', 'qwerty_admin_panel_access' );


/* ---------------------------------------------------------------------------
 * LOGIN PANEL ACCESS
 * --------------------------------------------------------------------------- */
/*if( ! function_exists( 'qwerty_login_panel_access' ) )
{
    function qwerty_login_panel_access()
    {
		global $xmlhttprequest;
		
        if( !current_user_can('administrator') && !$xmlhttprequest )
        {
            wp_redirect( home_url( '/404/' ) );
            exit;
        }
    }
}
add_action( 'login_init', 'qwerty_login_panel_access' );


/* ---------------------------------------------------------------------------
 * LOGIN REDIRECT
 * --------------------------------------------------------------------------- */
/*if( ! function_exists( 'qwerty_login_redirect' ) )
{
	function qwerty_login_redirect($redirect_to, $url, $user) 
	{
	    if ( !isset($user->errors) ) 
	    {
	        return $redirect_to;
	    }

	    wp_redirect( home_url('/login/') . '?action=login');

	    exit;
	}
}
add_filter('login_redirect', 'qwerty_login_redirect', 10, 3);


/* ---------------------------------------------------------------------------
 * LOGOUT URL
 * --------------------------------------------------------------------------- */
/*if( ! function_exists( 'qwerty_logout_url' ) )
{
	function qwerty_logout_url( $logout_url, $redirect ) 
	{
	    $args = array( 'action' => 'logout' );

	    if ( !empty( $redirect ) ) 
	    {
	        $args['redirect_to'] = urlencode( $redirect );
	    }

	    $logout_url = add_query_arg( $args, '/login/' );
	    $logout_url = wp_nonce_url( $logout_url, 'log-out' );

	    return $logout_url;
	}
}
add_filter( 'logout_url', 'qwerty_logout_url', 10, 2 );


/* ---------------------------------------------------------------------------
 * TEMPLATE REDIRECT
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'qwerty_template_redirect' ) )
{
	function qwerty_template_redirect()
	{
		global $xmlhttprequest;

	    $request = isset( $_REQUEST['action'] ) ? sanitize_key( $_REQUEST['action'] ) : '';

	    switch( $request )
	    {
	        case 'logout' :

	        	if( is_user_logged_in() )
	        	{
		            check_admin_referer( 'log-out' );

		            $user = wp_get_current_user();

		            wp_logout();

		            if ( ! empty( $_REQUEST['redirect_to'] ) ) 
		            {
		                $redirect_to = $requested_redirect_to = $_REQUEST['redirect_to'];

		            } else {

		                $redirect_to = site_url( 'wp-login.php?loggedout=true' );
		                $requested_redirect_to = '';
		                
		            }

		            $redirect_to = apply_filters( 'logout_redirect', $redirect_to, $requested_redirect_to, $user );
		            wp_safe_redirect( $redirect_to );

		        } else {

					wp_send_json_success();

					exit;

				}

	        break;

	        case 'register' :

	        	if( $xmlhttprequest )
	        	{
		        	if( !is_user_logged_in() )
		        	{
						if ( isset( $_POST['reg-data'] ) && isset( $_POST['nonce'] ) && wp_verify_nonce( $_POST['nonce'], 'AjaxNonce' ) ) 
						{
				            $data  = $_POST['reg-data'];
				            parse_str( $data, $data );

				        	$user_login		= $data['user_login'];	
							$user_email		= sanitize_email( $data['user_email'] );
							//$user_first 	= sanitize_text_field( $data['user_first'] );
							//$user_last	 	= sanitize_text_field( $data['user_last'] );
							$user_pass		= sanitize_text_field( $data['user_pass'] );
							//$pass_confirm 	= sanitize_text_field( $data['user_pass_confirm'] );

							if( !username_exists( $user_login ) && !email_exists( $user_email ) && is_email( $user_email ) ) {

								$new_user_id = wp_insert_user(array(
										'user_login'		=> $user_login,
										'user_email'		=> $user_email,
										//'first_name'		=> $user_first,
										//'last_name'			=> $user_last,
										'user_pass'	 		=> $user_pass,
										'role'				=> 'subscriber'
									)
								);

								if( $new_user_id ) {

									wp_new_user_notification( $new_user_id );
					 
									wp_setcookie( $user_login, $user_pass, true);
									wp_set_current_user( $new_user_id, $user_login );	
									do_action( 'wp_login', $user_login );
					 
									wp_redirect( home_url() ); 

									exit;
								}
								
							}

						}
					} else {

						wp_send_json_success();

						exit;

					}
				}

	        break;

	        case 'login' :
	        default:

	        	if( $xmlhttprequest )
	        	{
		        	if( !is_user_logged_in() )
		        	{
				        if ( isset( $_POST['login-data'] ) && wp_verify_nonce( $_POST['nonce'], 'AjaxNonce' ) ) 
						{
				            $data  = $_POST['login-data'];
				            parse_str( $data, $data );

				            if( isset( $data['user_email'] ) ) 
				            {
				                $Email    = sanitize_user( $data['user_email'] );
				                $Password = sanitize_text_field( $data['user_pass'] );

				                $user = get_user_by( 'email', $Email );

				                if ( $user && wp_check_password( $Password, $user->user_pass, $user->ID ) ) {

				                    wp_setcookie( $user->user_login, $Password, true );
				                    wp_set_current_user( $user->ID, $user->user_login );    
				                    do_action( 'wp_login', $user->user_login );

									wp_send_json_success();

				                    wp_redirect( $data['redirect_to'] );

				                    exit;

				                } else {

									wp_send_json_error();

				                    exit;

				                }
				                    
				            }
				        }
				    } else {

						wp_send_json_success();

						exit;

					}

				}

	        break;
	    }
	}
}
add_action('template_redirect', 'qwerty_template_redirect');
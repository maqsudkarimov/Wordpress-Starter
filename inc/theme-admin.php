<?php

/* ---------------------------------------------------------------------------
 * LOGIN HEAD
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'qwerty_login_head' ) )
{
    function qwerty_login_head()
    {
        echo '<style>.login h1 a{background-image: url(' . qwerty_get_option( 'CompanyLogo', 'Main' ) . ');}</style>';
    }
}
add_action( 'login_head', 'qwerty_login_head' );


/* ---------------------------------------------------------------------------
 * LOGIN HEADER TITLE
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'qwerty_login_header_title' ) )
{
    function qwerty_login_header_title(){
        return THEME_NAME . ' ' . THEME_VERSION;
    }
}
add_action( 'login_headertitle', 'qwerty_login_header_title' );


/* ---------------------------------------------------------------------------
 * LOGIN HEADER URL
 * --------------------------------------------------------------------------- */
add_action( 'login_headerurl', '__return_empty_string' );

/* ---------------------------------------------------------------------------
 * SHOW ADMIN BAR
 * --------------------------------------------------------------------------- */
show_admin_bar( false );

if ( is_admin() ){

    /* ---------------------------------------------------------------------------
     * ADMIN FOOTER
     * --------------------------------------------------------------------------- */
    if( ! function_exists( 'qwerty_admin_footer' ) )
    {
        function qwerty_admin_footer(){
            echo THEME_NAME . ' ' . THEME_VERSION;
        }
    }
    add_filter( 'admin_footer_text', 'qwerty_admin_footer' );


    /* ---------------------------------------------------------------------------
     * DASHBOARD META
     * --------------------------------------------------------------------------- */
    if( ! function_exists( 'qwerty_remove_dashboard_meta' ) )
    {
        function qwerty_remove_dashboard_meta(){
            remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_quick_press', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );

            remove_meta_box( 'submitdiv', array( 'contact' ), 'normal' );
            remove_meta_box( 'slugdiv',   array( 'contact' ), 'normal' );
        }
    }
    add_action( 'admin_init', 'qwerty_remove_dashboard_meta' );


    /* ---------------------------------------------------------------------------
     * WELCOME PANEL
     * --------------------------------------------------------------------------- */
    if( ! function_exists( 'qwerty_welcome_panel' ) )
    {
        function qwerty_welcome_panel(){
            echo '<div class="welcome-panel-content">
            		<h2>' . __( 'Welcome to WordPress!' ) . '</h2>
            		<p class="about-description"> ' . THEME_NAME . ' ' . THEME_VERSION . '</p>
            		<br>
            	 </div>';
        }
    }
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
    add_action( 'welcome_panel', 'qwerty_welcome_panel' );
    

    /*function add_dashboard_widgets(){
        wp_add_dashboard_widget( 'qwerty_dashboard_welcome', 'Welcome', 'add_welcome_widget' );
    }

    function add_welcome_widget(){
        echo 'Hello';
    }

    add_action( 'wp_dashboard_setup', 'add_dashboard_widgets' );*/

}
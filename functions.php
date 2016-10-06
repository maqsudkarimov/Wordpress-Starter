<?php
/**
 * qwerty functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package qwerty
 */

define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );

define( 'THEME_NAME', 'qwerty' );
define( 'THEME_VERSION', '1.0.0' );

define( 'LIBS_DIR', THEME_DIR . '/inc' );
define( 'LIBS_URI', THEME_URI . '/inc' );
define( 'LANG_DIR', THEME_DIR . '/languages' );

add_filter( 'widget_text', 'do_shortcode' );


/* ---------------------------------------------------------------------------
 * Loads Theme Textdomain
 * --------------------------------------------------------------------------- */
load_theme_textdomain( THEME_NAME,  LANG_DIR );

/* ---------------------------------------------------------------------------
 * Loads Theme Default Settings
 * --------------------------------------------------------------------------- */
require_once( LIBS_DIR . '/config.php' );

/* ---------------------------------------------------------------------------
 * Loads the Settings API
 * --------------------------------------------------------------------------- */
require_once( LIBS_DIR . '/theme-settings.php' );

/* ---------------------------------------------------------------------------
 * Loads Classes
 * --------------------------------------------------------------------------- */
require_once( LIBS_DIR . '/classes/class-bootstrap-navwalker.php' );

require_once( LIBS_DIR . '/classes/class-cpt.php' );

require_once( LIBS_DIR . '/classes/meta-box/meta-box.php' );

if( qwerty_get_option( 'html_minify', 'Section-HTML-minify' ) == 'on' )
	require_once( LIBS_DIR . '/classes/class-html-minify.php' );

/* ---------------------------------------------------------------------------
 * Loads Custom Post Types
 * --------------------------------------------------------------------------- */

//require_once( LIBS_DIR . '/post-type-example.php' );

require_once( LIBS_DIR . '/post-type/page.php' );

require_once( LIBS_DIR . '/post-type/post.php' );

require_once( LIBS_DIR . '/post-type/contact.php' );

require_once( LIBS_DIR . '/post-type/slider.php' );

require_once( LIBS_DIR . '/post-type/portfolio.php' );

require_once( LIBS_DIR . '/post-type/sponsors.php' );


/* ---------------------------------------------------------------------------
 * Loads Theme Contact
 * --------------------------------------------------------------------------- */
require_once( LIBS_DIR . '/theme-contact.php' );

/* ---------------------------------------------------------------------------
 * Loads Theme Functions
 * --------------------------------------------------------------------------- */
require_once( LIBS_DIR . '/theme-post_page-views.php' );

require_once( LIBS_DIR . '/theme-functions.php' );

require_once( LIBS_DIR . '/theme-admin.php' );

require_once( LIBS_DIR . '/theme-head.php' );

require_once( LIBS_DIR . '/theme-menu.php' );

require_once( LIBS_DIR . '/theme-widgets.php' );

require_once( LIBS_DIR . '/theme-member.php' );

require_once( LIBS_DIR . '/theme-demo.php' );

<?php

/* ---------------------------------------------------------------------------
 * THEME SETUP
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'qwerty_setup' ) )
{
    function qwerty_setup()
    {
        /*if( qwerty_get_option( 'can_change_options', 'Main' ) == 'off' )
        {
            update_option( 'blogname', 'WebPro' );
            update_option( 'blogdescription', 'Just another WordPress sitew' );

            update_option( 'default_comment_status ', 'closed' );
            update_option( 'default_ping_status', 'closed' );
            update_option( 'default_pingback_flag', 0 );
            update_option( 'moderation_notify', 0 );

            update_option( 'show_avatars', 0 );

            update_option( 'gmt_offset', +5 );
            update_option( 'date_format', __('d/m/Y') );
            update_option( 'time_format', __('H:i') );

            update_option( 'thumbnail_size_w', 150 );
            update_option( 'thumbnail_size_h', 150 );

            update_option( 'medium_size_w', 500 );
            //update_option( 'medium_size_h', 0 );

            update_option( 'large_size_w', 0 );
            update_option( 'large_size_h', 0 );

            update_option( 'medium_large_size_w', 0 );
            update_option( 'medium_large_size_h', 0 );

            update_option( 'uploads_use_yearmonth_folders', 0 );

            update_option( 'permalink_structure', '/%postname%/' );

            update_option( 'ping_sites', '' );

            update_option( 'use_smilies', 0 );

            update_option( 'WPLANG', 'ru_RU' );
        }*/

        //add_theme_support( 'woocommerce' );

        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        remove_action( 'wp_head', 'rsd_link' );

        remove_action( 'wp_head', 'wp_generator' );

        remove_action( 'wp_head', 'rel_canonical' );

        remove_action( 'wp_head', 'feed_links', 2 );

        remove_action( 'wp_head', 'index_rel_link' );

        remove_theme_support( 'automatic-feed-links' );

        remove_action( 'wp_head', 'wlwmanifest_link' );

        remove_action( 'wp_head', 'feed_links_extra', 3 );

        remove_action( 'wp_head', 'wp_resource_hints', 2 );

        remove_action( 'wp_head', 'wp_oembed_add_host_js' );

        remove_action( 'wp_print_styles', 'print_emoji_styles' );

        remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

        remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

        remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

        remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

        remove_action( 'admin_print_styles', 'print_emoji_styles' );

        remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

        remove_action( 'rest_api_init', 'wp_oembed_register_route' );

        remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );

        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

        remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

        remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

        remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        
        add_filter( 'nav_menu_css_class', '__return_empty_array', 100, 1 );

        add_filter( 'nav_menu_item_id', '__return_empty_array', 100, 1 );

        add_filter( 'page_css_class', '__return_empty_array', 100, 1 );
    }
}
add_action( 'after_setup_theme', 'qwerty_setup' );



if( !function_exists( 'qwerty_keywords' ) )
{
    function qwerty_keywords()
    {
        $keywords_meta = get_post_meta( get_the_ID(), 'keywords', true );
            
        if( $keywords_meta )
            $keywords = $keywords_meta;
        else
            $keywords = qwerty_get_option( 'Keywords', 'Main' );

        return $keywords;
    }
}


if( !function_exists( 'qwerty_description' ) )
{
    function qwerty_description()
    {
        $site_description = get_bloginfo( 'description', 'display' );
        $description_meta = get_post_meta( get_the_ID(), 'description', true );

        if( $description_meta )
            $description = $description_meta;
        else
            $description = $site_description;

        return $description;

    }
}

/* ---------------------------------------------------------------------------
 * THEME INIT
 * --------------------------------------------------------------------------- */
if( !function_exists( 'init' ) )
{
    function init() 
    {
        
    }
}
add_filter( 'init', 'init' );


/* ---------------------------------------------------------------------------
 * CREATE DEMO PAGE
 * --------------------------------------------------------------------------- */
if( !function_exists( 'create_page' ) )
{
    function create_page( $pages, $post_type = 'page' )
    {
        if ( isset($_GET['activated']) && is_admin() )
        {
            foreach( $pages as $page_name => $page_title)
            {
                global $wpdb;

                $page_title_check = get_page_by_title( $page_title );

                $page = array(
                    'post_type'      => $post_type,
                    'post_title'     => $page_title,
                    'post_name'      => $page_name,
                    'post_status'    => 'publish',
                    'post_author'    => 1,

                    /*
                      'ID'             => [ <post id> ] // Вы обновляете существующий пост?
                      'menu_order'     => [ <order> ] // Если запись "постоянная страница", установите её порядок в меню.
                      'comment_status' => [ 'closed' | 'open' ] // 'closed' означает, что комментарии закрыты.
                      'ping_status'    => [ 'closed' | 'open' ] // 'closed' означает, что пинги и уведомления выключены.
                      'pinged'         => [ ? ] //?
                      'post_author'    => [ <user ID> ] // ID автора записи
                      'post_category'  => [ array(<category id>, <...>) ] // Категория к которой относится пост.
                      'post_content'   => [ <the text of the post> ] // Полный текст записи.
                      'post_date'      => [ Y-m-d H:i:s ] // Время, когда запись была создана.
                      'post_date_gmt'  => [ Y-m-d H:i:s ] // Время, когда запись была создана в GMT.
                      'post_excerpt'   => [ <an excerpt> ] // Цитата (пояснительный текст) записи.
                      'post_name'      => [ <the name> ] // Альтернативное название записи (slug) будет использовано в УРЛе.
                      'post_parent'    => [ <post ID> ] // ID родительской записи, если нужно.
                      'post_password'  => [ ? ] // Пароль для просмотра записи.
                      'post_status'    => [ 'draft' | 'publish' | 'pending'| 'future' | 'private' ] // Статус создаваемой записи.
                      'post_title'     => [ <the title> ] // Заголовок (название) записи.
                      'post_type'      => [ 'post' | 'page' | 'link' | 'nav_menu_item' | custom post type ] // Тип записи.
                      'tags_input'     => [ '<tag>, <tag>, <...>' ] // Метки поста (указываем ярлыки).
                      'tax_input'      => [ array( 'taxonomy_name' => array( 'term', 'term2', 'term3' ) ) ] // поддержка для произвольных таксономий.
                      'to_ping'        => [ ? ] //?
                      'meta_input'     => [ array( 'meta_key'=>'meta_value' ) ] // добавит указанные мета поля. По умолчанию: ''. с версии 4.4.*/
                );

                if( $wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $page_name . "' AND post_type = '" . $post_type . "'", 'ARRAY_A') ) {
                    $the_slug_exists = true;
                } else {
                    $the_slug_exists = false;
                }

                if( !isset( $page_title_check->ID ) && !$the_slug_exists )
                {
                    $page_id = wp_insert_post( $page );

                    if( $post_type == 'page' )
                    {
                        $template_name = 'page-templates/template-' . $page_name . '.php';
                        update_post_meta( $page_id, '_wp_page_template',  $template_name );
                    }
                }
            }
                
        }
    }
}


/* ---------------------------------------------------------------------------
 * CREATE DEMO MENU
 * --------------------------------------------------------------------------- */
if( !function_exists( 'create_menu' ) )
{
    function create_menu( $menu_name, $menu_location, $menu_items  )
    {
        if ( isset($_GET['activated']) && is_admin() )
        {
            $menu_exists = wp_get_nav_menu_object( $menu_name );

            if( !$menu_exists ){
                $menu_id = wp_create_nav_menu( $menu_name );

                foreach( $menu_items as $menu_url => $menu_title)
                {
                    wp_update_nav_menu_item($menu_id, 0, array(
                        //'menu-item-object-id'   => 0,
                        //'menu-item-object'      => '',
                        //'menu-item-parent-id'   => 0,
                        //'menu-item-position'    => 0,
                        //'menu-item-type'        => 'custom',
                        'menu-item-title'       => $menu_title,
                        'menu-item-url'         => home_url( '/' . $menu_url . '/' ),
                        //'menu-item-description' => '',
                        'menu-item-attr-title'  => $menu_url,
                        //'menu-item-target'      => '',
                        //'menu-item-classes'     => '',
                        //'menu-item-xfn'         => '',
                        'menu-item-status'      => 'publish',
                    ));
                }

                if( !has_nav_menu( $menu_location ) ){
                    $locations = get_theme_mod( 'nav_menu_locations' );
                    $locations[ $menu_location ] = $menu_id;
                    set_theme_mod( 'nav_menu_locations', $locations );
                }
            }

        }
    }
}


/* ---------------------------------------------------------------------------
 * CREATE DEMO IMAGES
 * --------------------------------------------------------------------------- */
if( !function_exists( 'create_images' ) )
{
    function create_images( $urls )
    {
        if ( isset($_GET['activated']) && is_admin() )
        {
            global $wpdb;

            require_once( ABSPATH . 'wp-admin/includes/file.php' );

            foreach( $urls as $url )
            {
                $FILE = array();
                $FILE['tmp_name'] = download_url( $url );
                $FILE['name'] = basename( $url );

                if( $wpdb->get_row("SELECT ID FROM wp_posts WHERE post_title = '" . preg_replace( '/\.[^.]+$/', '', basename( $FILE['name'] ) ) . "' AND post_type = 'attachment'", 'ARRAY_A') ) {
                    $file_exists = true;
                } else {
                    $file_exists = false;
                }

                if ( !is_wp_error( $FILE['tmp_name'] ) && !$file_exists ) {

                    $upload = wp_upload_bits( $FILE['name'], null, file_get_contents( $FILE['tmp_name'] ) );

                    $wp_filetype = wp_check_filetype( basename( $upload['file'] ) );

                    $wp_upload_dir = wp_upload_dir();

                    $file_url = $wp_upload_dir['baseurl'] . '/' . _wp_relative_upload_path( $upload['file'] );

                    $attachments = array(
                        'guid'           => $file_url,
                        'post_mime_type' => $wp_filetype['type'],
                        'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $upload['file'] ) ),
                        'post_content'   => '',
                        'post_status'    => 'inherit'
                    );

                    $attach_id = wp_insert_attachment( $attachments, $upload['file'] );

                    require_once( ABSPATH . 'wp-admin/includes/image.php' );

                    $attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
                    wp_update_attachment_metadata( $attach_id, $attach_data );
                }

                @unlink( $FILE['tmp_name'] );
            }
        }
    }
}
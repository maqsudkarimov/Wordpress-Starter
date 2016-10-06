<?php

require ( LIBS_DIR .'/classes/class-settings-api.php' );

if ( !class_exists('qwerty_Theme_Settings' ) )
{
	class qwerty_Theme_Settings 
	{
		private $settings_api;
		
		function __construct() 
		{
			$this->settings_api = new WeDevs_Settings_API;
			add_action( 'admin_init', array($this, 'admin_init') );
			add_action( 'admin_menu', array($this, 'admin_menu') );
		}
		
		function admin_init() 
		{
			$this->settings_api->set_sections( $this->get_settings_sections() );
			$this->settings_api->set_fields( $this->get_settings_fields() );
			$this->settings_api->admin_init();
		}
		
		function admin_menu() 
		{
			add_submenu_page( 'themes.php', __( 'Theme Settings', 'qwerty' ), __( 'Theme Settings', 'qwerty' ), 'manage_options', 'theme_settings', array( $this, 'theme_settings' ) );
		}
		
		function get_settings_sections() 
		{
			$sections = array(
				array(
					'id'    => 'Main',
					'title' => __( 'Main', 'qwerty' ),
				),
				array(
					'id'    => 'SectionsView',
					'title' => __( 'Sections View', 'qwerty' ),
				),
				array(
					'id'    => 'Section-Header',
					'title' => __( 'Main Section', 'qwerty' ),
				),
				array(
					'id'    => 'Section-Contact',
					'title' => __( 'Contacts Section', 'qwerty' ),
				),
				array(
					'id'    => 'Section-HTML-minify',
					'title' => __( 'HTML Minify', 'qwerty' ),
				),
			);
			return $sections;
		}
		
		function get_settings_fields() 
		{
			global $config;

			$settings_fields = array(
				'Main' => array(
					array(
						'name'    => 'CompanyName',
						'label'   => __( 'Company Name', 'qwerty' ),
						'type'    => 'text',
						'default' => $config['CompanyName'],
					),
					array(
						'name'    => 'CompanyLogo',
						'label'   => __( 'Company Logo', 'qwerty' ),
						'desc'    => '',
						'type'    => 'file',
						'default' => $config['CompanyLogo'],
					),
					array(
						'name'    => 'Email',
						'label'   => __( 'Email Address', 'qwerty' ),
						'type'    => 'text',
						'default' => $config['Email'],
					),
					array(
						'name'    => 'PhoneNumber',
						'label'   => __( 'Phone Number', 'qwerty' ),
						'type'    => 'text',
						'default' => $config['PhoneNumber'],
					),
					array(
						'name'    => 'Address',
						'label'   => __( 'Address', 'qwerty' ),
						'type'    => 'textarea',
						'default' => $config['Address'],  
					),
					array(
						'name'    => 'Keywords',
						'label'   => __( 'Keywords', 'qwerty' ),
						'type'    => 'textarea',
						'default' => $config['Keywords']
					),
					array(
						'name'    => 'Copyright',
						'label'   => __( 'Copyright', 'qwerty' ),
						'type'    => 'textarea',
						'default' => $config['Copyright']
					),
					array(
						'name'    => 'Favicon',
						'label'   => __( 'Favicon', 'qwerty' ),
						'type'    => 'file',
						'default' => $config['Favicon'],
					),
					array(
						'name'    => 'AppleTouchIcon',
						'label'   => __( 'Apple Touch Icon', 'qwerty' ),
						'type'    => 'file',
						'default' => $config['AppleTouchIcon'],
					),
					array(
						'name'    => 'AppleTouchIcon72',
						'label'   => __( 'Apple Touch Icon 72x72', 'qwerty' ),
						'type'    => 'file',
						'default' => $config['AppleTouchIcon72'],
					),
					array(
						'name'    => 'AppleTouchIcon144',
						'label'   => __( 'Apple Touch Icon 144x144', 'qwerty' ),
						'type'    => 'file',
						'default' => $config['AppleTouchIcon144'],
					),
					array(
						'name'    => 'Preloader',
						'label'   => __( 'Turn on Preloader', 'qwerty' ),
						'type'    => 'checkbox',
						'default' => $config['Preloader']
					),
					array(
						'name'    => 'HeaderLogin',
						'label'   => __( 'Header Login', 'qwerty' ),
						'type'    => 'select',
						'default' => $config['HeaderLogin'],
						'options' => array(
	                        'login' => 'Login',
	                        'email'  => 'Email'
	                    )
					),
					array(
						'name'    => 'Can_change_options',
						'label'   => __( 'Can change options', 'qwerty' ),
						'type'    => 'checkbox',
						'default' => $config['can_change_options']
					),
				),

				'SectionsView' => array(
					array(
						'name'    => 'Section-Header',
						'label'   => __( 'Main Section', 'qwerty' ),
						'type'    => 'checkbox',
						'default' => $config['Section-Header']
					),
					array(
						'name'    => 'Section-Contact',
						'label'   => __( 'Contacts Section', 'qwerty' ),
						'type'    => 'checkbox',
						'default' => $config['Section-Contact']
					),
				),

				'Section-Header' => array(
					array(
						'name'    => 'Header-Hero',
						'label'   => __( 'Header Logo', 'qwerty' ),
						'desc'    => '',
						'type'    => 'file',
						'default' => $config['Header-Hero']
					),
					array(
						'name'    => 'Header-Title',
						'label'   => __( 'Header Title', 'qwerty' ),
						'type'    => 'text',
						'default' => $config['Header-Title'],
					),
					array(
						'name'    => 'Header-SubTitle',
						'label'   => __( 'Header SubTitle', 'qwerty' ),
						'type'    => 'text',
						'default' => $config['Header-SubTitle'],
					),
				),

				'Section-Contact' => array(
				),

				'Section-HTML-minify' => array(
					array(
						'name'    => 'html_minify',
						'label'   => __( 'HTML Minify', 'qwerty' ),
						'type'    => 'checkbox',
						'default' => $config['html_minify'],
					),
					array(
						'name'    => 'ignore_css',
						'label'   => __( 'Ignore CSS', 'qwerty' ),
						'type'    => 'checkbox',
						'default' => $config['ignore_css'],
					),
					array(
						'name'    => 'ignore_comments',
						'label'   => __( 'Ignore Comments', 'qwerty' ),
						'type'    => 'checkbox',
						'default' => $config['ignore_comments'],
					),
					array(
						'name'    => 'exclude_info',
						'label'   => __( 'Exclude Info', 'qwerty' ),
						'type'    => 'checkbox',
						'default' => $config['exclude_info'],
					),
				),
				
			);
			return $settings_fields;
		}
		
		function theme_settings() 
		{
			echo '<div class="wrap">';
			
			echo '<h1>' . __( 'Theme Settings', 'qwerty' ) .'</h1>';

			$this->settings_api->show_navigation();
			$this->settings_api->show_forms();
			
			echo '</div>';
		}
	}
}

$settings = new qwerty_Theme_Settings;

function qwerty_get_option( $option, $section, $default = '' ) 
{
	global $config;
    $options = get_option( $section );
 
    if ( isset( $options[$option] ) ) 
	{
        return $options[$option];
    }

    return $config[$option];
}

?>
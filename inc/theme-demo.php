<?php

if( isset($_GET['activated']) && is_admin() )
{
	create_page( array(
	    'blog'      => 'Блог',
	    'login'     => 'Логин',
	    'register'  => 'Регистрация',
	    'contact'   => 'Контакт',
	    'Profile'   => 'Профиль',
	    'slider'    => 'Слайдер',
	    'sponsors'  => 'Спонсоры',
	    'portfolio' => 'Портфолио',
	));

	create_page( array(
	    '1' => '1',
	    '2' => '2',
	), 'sponsors' );

	create_menu( __('Primary Menu', 'qwerty'), 'primary-menu',  
	    array(
	        'blog'      => 'Блог',
	        'contact'   => 'Контакт',
	        'slider'    => 'Слайдер',
	        'sponsors'  => 'Спонсоры',
	        'portfolio' => 'Портфолио',
	    )
	);

	/*create_menu( __('Main Menu', 'qwerty'), 'main-menu',  
	    array(
	        'register'  => 'Регистрация',
	        'login'     => 'Логин',
	        'profile'   => 'Профиль',
	        'logout'    => 'Выйти'
	    )
	);*/

	create_images( array(
		THEME_URI . '/images/portfolio/1.jpg',
		THEME_URI . '/images/portfolio/2.jpg',
		THEME_URI . '/images/portfolio/3.jpg',
		THEME_URI . '/images/portfolio/4.jpg',
		THEME_URI . '/images/portfolio/5.jpg',
		THEME_URI . '/images/portfolio/6.jpg',
		THEME_URI . '/images/portfolio/7.jpg',
		THEME_URI . '/images/portfolio/8.jpg',
	));
}
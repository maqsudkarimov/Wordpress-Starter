<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qwerty
 */
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<title><?php wp_title( '', true ); ?></title>
	<meta name="description" content="<?php echo qwerty_description(); ?>">
	<meta name="keywords" content="<?php echo qwerty_keywords(); ?>">
	    
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta property="og:image" content="<?php echo qwerty_get_option( 'AppleTouchIcon144', 'Main' ); ?>">

	<link rel="shortcut icon" href="<?php echo qwerty_get_option( 'Favicon', 'Main' ); ?>" type="image/x-icon">
	<link rel="apple-touch-icon" href="<?php echo qwerty_get_option( 'AppleTouchIcon', 'Main' ); ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo qwerty_get_option( 'AppleTouchIcon72', 'Main' ); ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo qwerty_get_option( 'AppleTouchIcon144', 'Main' ); ?>">

<?php wp_head();?>

</head>

<body>

	<div id="wrapper">

		<nav id="nav" role="navigation" class="navbar navbar-default navbar-fixed-top">

		    <div class="container">

		        <div class="navbar-header">
		            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		            <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
		                <?php bloginfo('name'); ?>
		            </a>
		        </div>

		        <div class="collapse navbar-collapse" id="navbar">
		        
					<nav>
			            <?php
			                wp_nav_menu( array(
				                    'menu'            => '', 
				                    'container'       => '', 
				                    'container_class' => '', 
				                    'container_id'    => '', 
				                    'menu_class'      => 'nav navbar-nav navbar-left',
				                    'menu_id'         => '',
				           			'echo'            => true, 
				                    'fallback_cb'     => '',
				                    'before'          => '', 
				                    'after'           => '', 
				                    'link_before'     => '', 
				                    'link_after'      => '', 
				                    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
				                    'depth'           => 2,
				                    'walker'          => new wp_bootstrap_navwalker(),
				                    'theme_location'  => 'primary-menu'
			                    )
			                );
			            ?>

			            <?php
			                wp_nav_menu( array(
				                    'menu'            => '', 
				                    'container'       => '', 
				                    'container_class' => '', 
				                    'container_id'    => '', 
				                    'menu_class'      => 'nav navbar-nav navbar-right',
				                    'menu_id'         => '',
				           			'echo'            => true, 
				                    'fallback_cb'     => '',
				                    'before'          => '', 
				                    'after'           => '', 
				                    'link_before'     => '', 
				                    'link_after'      => '', 
				                    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
				                    'depth'           => 2,
				                    'walker'          => new wp_bootstrap_navwalker(),
				                    'theme_location'  => 'main-menu'
			                    )
			                );
			            ?>

		            </nav>

		        </div>

		    </div>

		</nav>

		<div class="pjax-container">

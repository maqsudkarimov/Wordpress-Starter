<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package qwerty
 */ 
?>
<?php get_header(); ?>

	<div class="container">

	    <div class="row">

	        <div class="col-sm-12">

	            <div id="content" role="main">

	                <?php get_template_part('loop-templates/content', 'page'); ?>

	            </div>

	        </div>

	    </div>

	</div>

<?php get_footer(); ?>

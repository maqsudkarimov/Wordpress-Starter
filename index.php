<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package qwerty
 */ ?>
<?php get_header(); ?>

	<div class="container">

	    <div class="row">

	        <div class="col-sm-12">

	            <div id="content" role="main">

	                <?php get_template_part('loop-templates/content'); ?>

	            </div>

	        </div>

	    </div>

	</div>

<?php get_footer() ?>
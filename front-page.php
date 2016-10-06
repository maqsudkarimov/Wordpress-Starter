<?php
/**
 * The template for displaying front page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package qwerty
 */
?>
<?php get_header(); ?>

<?php get_template_part( 'template-parts/template', 'slider' ); ?>

<?php get_template_part( 'template-parts/template', 'contact' ); ?>

<?php get_template_part( 'template-parts/template', 'blog' ); ?>

<?php get_template_part( 'template-parts/template', 'login' ); ?>

<?php get_template_part( 'template-parts/template', 'register' ); ?>

<?php get_template_part( 'template-parts/template', 'profile' ); ?>

<?php get_template_part( 'template-parts/template', 'sponsors' ); ?>

<?php get_footer(); ?>



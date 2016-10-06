<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package qwerty
 */
?>
<?php

if ( have_posts() ) :
   while ( have_posts() ) : the_post();
  		   the_title();
         the_category();
         the_author();
         the_excerpt();
         the_ID();
         the_meta();
         the_shortlink();
         the_tags();
         the_content();
         the_permalink();
         the_time( 'F jS, Y' ); 
         the_author_posts_link();

   endwhile;
endif;
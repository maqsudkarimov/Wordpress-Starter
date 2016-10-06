<?php
/**
 * Template Name: Blog
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package qwerty
 *
 */
?>
<?php get_header(); ?>

		<div class="container-fluid">
            <div class="row">
            	<div class="col-md-12">
                <?php
                    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                    
                    $args = array(
                        'posts_per_page' => 1,
                        'paged' => $paged,
                        //'post_type' => 'portfolio'
                    );
                        
                    $the_query = null;
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ){
                        while ( $the_query->have_posts() ) : $the_query->the_post();?>
                            <h2><?php the_title() ?></h2>
                  <?php endwhile;

                        $range = 2;
                        $showitems = ( $range * 2 ) + 1;

                        if(empty($paged)) $paged = 1;
                            $pages = $the_query->max_num_pages;
                            if( !$pages )
                                $pages = 1;

                        if( 1 != $pages ){
                            echo '<nav><ul class="pagination">';
                            if($paged > 2 && $paged > $range+1 && $showitems < $pages)
                                echo '<li><a href="'.get_pagenum_link(1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>';
                            if($paged > 1 && $showitems < $pages)
                                echo '<li><a href="'.get_pagenum_link($paged - 1).'" aria-label="Next"><span aria-hidden="true">&lsaquo;</span></a>';

                            for ($i=1; $i <= $pages; $i++){
                                if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                                    echo ($paged == $i) ? '<li class="active"><a>' . $i . ' <span class="sr-only">(current)</span></li>':'<li><a href="'.get_pagenum_link($i).'">' . $i . '</a></li>';
                                }
                            }

                            if ($paged < $pages && $showitems < $pages)
                                echo '<li><a href="' . get_pagenum_link($paged + 1) . '">&rsaquo;</a></li>';
                            if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages)
                                echo '<li><a href="' . get_pagenum_link($pages) . '">&raquo;</a></li>';
                            echo "</nav>";
                        }
                        wp_reset_postdata();
                    } ?>


            	</div>
            </div>
        </div>

<?php get_footer(); ?>

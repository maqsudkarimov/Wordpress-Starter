<?php
/**
 * Template Name: Slider
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
            	<div id="image_slider" class="everslider image-slider">
					<ul class="es-slides">
                        <?php
						    $args = array(
						        //'slide-category' => 'HomePage',
						        'post_type'      => 'slide',
						        'post_status'    => 'publish',
						        'orderby'        => 'menu_order',
						        'order' 	     => 'ASC',
						        'posts_per_page' => 10,
						    );

						    $query = null;

						    $query = new WP_Query( $args );

						    if( $query->have_posts() ) :
						        while ( $query->have_posts() ) : $query->the_post();

									$url = get_post_meta( $post->ID, 'url', true );
									$description = get_post_meta( $post->ID, 'description', true );

									$img = '<img src="' . get_the_post_thumbnail_url() . '" alt="' . $description . '">';

			                        if( $url ) :
			                        	$img = '<a href="' . $url . '">' . $img . '</a>';
			                        endif;
									
									if( $description ) :
										$caption = '<div class="image-caption"><span>' . $description . '</span></div>';
									endif;

			                        echo '<li>' . $img . $caption . '</li>';

						        endwhile;
						    endif;

						    wp_reset_postdata();
						?>
					</ul>
				</div>
            </div>
        </div>

<?php get_footer(); ?>

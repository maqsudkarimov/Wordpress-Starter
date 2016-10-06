<?php
/**
 * Template Name: Portfolio
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package qwerty
 *
 */
?>
<?php get_header(); ?>
	<style>
	    #Portfolio .mix {
	        display: none;
	    }
		#Portfolio img {
			margin-bottom: 10px;
		}
	</style>

	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="btn btn-default filter" data-filter="all">Show All</div>

				<?php
				$args = array(
					'type'         => 'portfolio',
					'taxonomy'     => 'portfolio-category',
                    'posts_per_page' => -1,
					/*'child_of'     => 0,
					'parent'       => '',
					'orderby'      => 'name',
					'order'        => 'ASC',
					'hide_empty'   => 1,
					'hierarchical' => 1,
					'exclude'      => '',
					'include'      => '',
					'number'       => 0,
					'pad_counts'   => false,*/
				);
				
				$categories = get_categories( $args );
				
				foreach ( $categories as $category ) { ?>
					<div class="btn btn-default filter" data-filter=".<?php echo $category->name; ?>"><?php echo $category->name; ?></div>
				<?php } ?>
				
				<br><br>
				
				<div id="Portfolio" data-mixItUp="true">
					<?php
					
                        $args = array(
							'post_type'   => 'portfolio',
							'post_status' => 'publish',
							'orderby'     => 'menu_order',
							'order' 	  => 'ASC',
                        	'posts_per_page' => -1,
                        );
						
                        $query = null;
                        $query = new WP_Query( $args );
						
                        if( $query->have_posts() ) {
							while ( $query->have_posts() ) : $query->the_post(); 
							
								$terms = get_the_terms( $post->ID, 'portfolio-category' ); 
								if( $terms ) 
								{
									foreach( $terms as $term ){
										$cats .= ' ' . $term->name;
									}
								}
								
								/*the_post_thumbnail_url();                  // without parameter -> 'post-thumbnail'
 
								the_post_thumbnail_url( 'thumbnail' );       // Thumbnail (default 150px x 150px max)
								the_post_thumbnail_url( 'medium' );          // Medium resolution (default 300px x 300px max)
								the_post_thumbnail_url( 'large' );           // Large resolution (default 640px x 640px max)
								the_post_thumbnail_url( 'full' );            // Full resolution (original size uploaded)
								 
								the_post_thumbnail_url( array(100, 100) );*/
									
								$url = get_post_meta( $post->ID, 'url', true );
									
								$description = get_post_meta( $post->ID, 'description', true );

								$img = '<img class="center-block img-responsive" src="' . get_the_post_thumbnail_url() . '" alt="' . $description . '">';

			                    if( $url ) :
			                     	$img = '<a href="' . $url . '" target="_blank">' . $img . '</a>';
			                    endif;

			                    echo '<div class="col-md-2 col-xs-12 mix' . $cats . '">' . $img . '</div>';

								$cats = null;
								
							endwhile;
                        }
						
                        wp_reset_postdata();
								/*<div class="mix<?php _e( $cats ); ?>">
									<img class="img-responsive" src="<?php the_post_thumbnail_url( 'portfolio-medium' ); ?>"  alt="">
								</div> */
					?>
				</div>
			</div>
		</div>
    </div>

<?php get_footer(); ?>

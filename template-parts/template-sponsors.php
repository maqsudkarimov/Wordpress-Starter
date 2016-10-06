		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="slider">

					<?php
	                    
	                $args = array(
						'post_type'   => 'sponsors',
						'post_status' => 'publish',
						'orderby'     => 'menu_order',
						'order' 	  => 'ASC',
	                    'posts_per_page' => -1,
	                );
							
	                $query = null;
	                $query = new WP_Query( $args );
							
	                if( $query->have_posts() ) {
						while ( $query->have_posts() ) : $query->the_post(); 
													
							$url = get_post_meta( $post->ID, 'url', true );
													
							$description = get_post_meta( $post->ID, 'description', true );
			                
			                $img = '<img class="owl-lazy" data-src="' . get_the_post_thumbnail_url() . '" alt="' . $description . '">';

				            if( $url ) :
				                $img = '<a href="' . $url . '" target="_blank">' . $img . '</a>';
				            endif;

				            echo '<div>' . $img . '</div>';
						
						endwhile;
	                }
							
	                wp_reset_query();
	                    
					?>
					</div>
				</div>
			</div>
	    </div>
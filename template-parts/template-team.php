	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="slider">
				<?php
					
                    $args = array(
						'post_type'   => 'team',
						'post_status' => 'publish',
						'orderby'     => 'menu_order',
						'order' 	  => 'ASC',
                    );
						
                    $query = null;
                    $query = new WP_Query( $args );
						
                    if( $query->have_posts() ) {
						while ( $query->have_posts() ) : $query->the_post(); 
												
							$url = get_post_meta( $post->ID, 'url', true );
												
							$description = get_post_meta( $post->ID, 'description', true );

							?>


		                    <div>
		                        <img class="owl-lazy" data-src="<?php get_the_post_thumbnail_url() ?>" alt="" class="normal" />
		                    </div>

						<?php

							endwhile;
                    }
						
                    wp_reset_postdata();
                    
					?>
				</div>
			</div>
		</div>
    </div>
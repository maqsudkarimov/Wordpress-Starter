<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package qwerty
 */

class comment_walker extends Walker_Comment {
 
		function __construct() { ?>

			<section class="comments-list">

		<?php }

		// start_lvl – wrapper for child comments list
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>
			
			<section class="child-comments comments-list">

		<?php }
	
		// end_lvl – closing wrapper for child comments list
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>

			</section>

		<?php }

		// start_el – HTML for comment template
		function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
			$depth++;
			$GLOBALS['comment_depth'] = $depth;
			$GLOBALS['comment'] = $comment;
			$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>

			<li class="comment_item" id="comment-<?php comment_ID() ?>">

				<div class="comment-meta post-meta" role="complementary">

					<h2 class="comment-author">
						<?php comment_author(); ?>
					</h2>

					<time class="comment-meta-item"><?php comment_date('d/m/Y') ?>, <?php comment_time() ?></time>

				</div>

				<div class="comment-content post-content">
					<?php comment_text() ?>
				</div>

		<?php }

		function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

			</li>

		<?php }

		function __destruct() { ?>

			</section>
		
		<?php }

	}
?>
<?php get_header(); ?>

	<div class="container">

	    <div class="row">

	        <div class="col-sm-12">

	            <div id="content" role="main">

				<?php

					if ( have_posts() ) :

						while ( have_posts() ) : the_post();

					  		echo get_the_title()         . '<br>';
					        echo get_the_author()        . '<br>';
					        echo get_the_excerpt()       . '<br>';
					        echo get_the_ID()            . '<br>';
					        the_shortlink()              . '<br>';
					        echo get_the_tags()          . '<br>';
					        echo get_the_content()       . '<br>';
					        echo get_the_permalink()     . '<br>';
					        echo get_the_time( 'd/m/Y' ) . '<br>'; 

					   	endwhile;

					endif; ?>


					<ul class="comments-list">
						<?php
						$args = array(
							'walker'            => new comment_walker(),
							'page'              => 0,
							'per_page'          => 10,
							'echo'              => true,  
						);

						wp_list_comments( $args );
						//comment_form();
						?>
					</ul>
				</div>
			</div>

		</div>

	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-body">

						<form id="CommentForm" class="comment-form form-horizontal">

							<div class="form-group">
								<label class="col-sm-4 control-label" for="comment">Комментарий</label>
								<div class="col-sm-5">
									<textarea class="form-control" id="comment" name="comment" rows="3" maxlength="65525" placeholder=""  aria-required="true" required="required"></textarea>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-4">
									<input name="submit" type="submit" id="submit" class="btn btn-primary" value="Отправить комментарий" />
									<input type='hidden' name='comment_post_ID' value='1' id='comment_post_ID' />
									<input type='hidden' name='redirect_to' value='<?php echo $_SERVER["REQUEST_URI"]; ?>' id='redirect_to' />
									<input type='hidden' name='comment_parent' id='comment_parent' value='0' />
								</div>
							</div>			
							
						</form>

					</div>
				</div>

            </div>

        </div>

    </div>

<?php get_footer(); ?>
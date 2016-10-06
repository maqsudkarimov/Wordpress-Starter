<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package qwerty
 */
?>
<?php get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<article>
					<section>
						<p>
							<?php _e("Page not found", "qwerty"); ?>
						</p>
					</section>
				</article>
			</div>
		</div>
	</div>

<?php get_footer(); ?>

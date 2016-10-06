<?php
/**
 * Template Name: Login
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package qwerty
 *
 */
?>
<?php get_header(); ?>

		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<br>
					<div class="panel panel-default">
						<div class="panel-body">
							<?
							if ( is_user_logged_in() ) {
								echo 'Вы авторизованы на сайте!<br />';
							} else {
								echo 'Вы всего лишь пользователь!';
							?>

							<form id="LoginForm" name="LoginForm" method="POST" class="form-horizontal">

								<div class="form-group">
									<label class="col-sm-4 control-label" for="user_email">Email</label>
									<div class="col-sm-5">
										<input type="email" name="user_email" class="form-control" size="20" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="user_pass">Password</label>
									<div class="col-sm-5">
										<input type="password" name="user_pass" class="form-control" size="20" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="rememberme">Remember me</label>
									<div class="col-sm-5">
										<input name="rememberme" type="checkbox" id="rememberme" value="forever" />
									</div>
								</div>
								
								<input type="hidden" id="redirect_to" name="redirect_to" value="<?php echo wp_get_referer(); ?>" />

								<div class="form-group">
									<div class="col-sm-9 col-sm-offset-4">
										<button type="submit" class="btn btn-primary" id="login-submit">Войти</button>
									</div>
								</div>
							</form>

							<?php		
							}
						?>
						</div>	
					</div>
				</div>
			</div>
		</div>
    </div>

<?php get_footer(); ?>

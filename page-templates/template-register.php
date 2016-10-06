<?php
/**
 * Template Name: Register
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
								?>
							<form id="RegisterForm" method="POST" class="form-horizontal">

								<div class="form-group">
									<label class="col-sm-4 control-label" for="user_login">Username</label>
									<div class="col-sm-5">
										<input type="text" name="user_login" class="form-control" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="user_email">Email</label>
									<div class="col-sm-5">
										<input type="email" name="user_email" class="form-control" />
									</div>
								</div>

								<!-- <div class="form-group">
									<label class="col-sm-4 control-label" for="user_first">First Name</label>
									<div class="col-sm-5">
										<input type="text" name="user_first" class="form-control" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="user_last">Last Name</label>
									<div class="col-sm-5">
										<input type="text" name="user_last" class="form-control" />
									</div>
								</div> -->

								<div class="form-group">
									<label class="col-sm-4 control-label" for="user_pass">Password</label>
									<div class="col-sm-5">
										<input type="password" name="user_pass" class="form-control" value="" size="20" />
									</div>
								</div>

								<!-- <div class="form-group">
									<label class="col-sm-4 control-label" for="pwd">Password Confirm</label>
									<div class="col-sm-5">
										<input type="password" name="user_pass_confirm" class="form-control" value="" size="20" />
									</div>
								</div> -->

								<input type="hidden" id="redirect_to" name="redirect_to" value="<?php echo esc_url( home_url() ); ?>" />

								<div class="form-group">
									<div class="col-sm-9 col-sm-offset-4">
										<input type="submit" id="reg-submit" class="btn btn-primary" value="Регистрация" />
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

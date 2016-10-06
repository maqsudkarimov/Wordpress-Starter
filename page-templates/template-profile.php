<?php
/**
 * Template Name: Profile
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
								//echo 'Вы авторизованы на сайте!<br />';

								$current_user = wp_get_current_user();

								/*echo 'Username: ' . $current_user->user_login . '<br />';
								echo 'email: ' . $current_user->user_email . '<br />';
								echo 'User level: ' . $current_user->user_level . "<br>";
								echo 'first name: ' . $current_user->user_firstname . '<br />';
								echo 'last name: ' . $current_user->user_lastname . '<br />';
								echo 'ID: ' . $current_user->ID . '<br />';

								echo '<a href="' . wp_logout_url( get_permalink() ) . '">Logout</a>';*/

								?>

							<form id="ProfileForm" name="ProfileForm" method="POST" class="form-horizontal">

								<div class="form-group">
									<label class="col-sm-4 control-label" for="user_login">User Name</label>
									<div class="col-sm-5">
										<input type="text" name="user_login" id="user_login" class="form-control" size="20" value="<?php echo $current_user->user_login; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="user_email">Email</label>
									<div class="col-sm-5">
										<input type="email" name="user_email" id="user_email" class="form-control" size="20" value="<?php echo $current_user->user_email; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="user_first">First Name</label>
									<div class="col-sm-5">
										<input type="text" name="user_first" id="user_first" class="form-control" size="20" value="<?php echo $current_user->user_first; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="user_last">Last Name</label>
									<div class="col-sm-5">
										<input type="text" name="user_last" id="user_last" class="form-control" size="20" value="<?php echo $current_user->user_last; ?>" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="user_pass">Password</label>
									<div class="col-sm-5">
										<input type="password" name="user_pass" id="user_pass" class="form-control" size="20" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="user_newpass">New Password</label>
									<div class="col-sm-5">
										<input type="password" name="user_newpass" id="user_newpass" class="form-control" size="20" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="user_confirm_newpass">Confirm New Password</label>
									<div class="col-sm-5">
										<input type="password" name="user_confirm_newpass" id="user_confirm_newpass" class="form-control" size="20" />
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-9 col-sm-offset-4">
										<button type="submit" class="btn btn-primary" id="profile-submit">Update</button>
									</div>
								</div>
							</form>

							<?php
							} else {
								echo 'Вы всего лишь пользователь!';	
							}
						?>
						</div>	
					</div>
				</div>
			</div>
		</div>
    </div>

<?php get_footer(); ?>

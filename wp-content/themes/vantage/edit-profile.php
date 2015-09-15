<?php
/*
 * Template Name: Edit Profile
 *
 * This template must be assigned to a page
 * in order for it to work correctly
 *
 */

$current_user = wp_get_current_user(); // grabs the user info and puts into vars

$show_password_fields = apply_filters( 'show_password_fields', true );
?>

<div id="main">

<?php do_action( 'appthemes_notices' ); ?>

	<div class="section-head">
		<h1><?php _e( 'Update Your Profile', APP_TD ); ?></h1>
	</div>

	<form name="profile" id="login-form" action="" method="post" enctype="multipart/form-data">
	<?php wp_nonce_field( 'app-edit-profile' ); ?>

	<input type="hidden" name="from" value="profile" />
	<input type="hidden" name="checkuser_id" value="<?php echo $user_ID; ?>" />

	<fieldset>
		<div class="form-field">
			<label>
				<?php _e( 'Username:', APP_TD ); ?>
				<input type="text" name="user_login" class="text regular-text" id="user_login" value="<?php echo $current_user->user_login; ?>" maxlength="100" disabled />
			</label>
		</div>
		<div class="form-field">
			<label>
				<?php _e( 'Display Name:', APP_TD ); ?>
				<input type="text" name="display_name" class="text regular-text" id="display_name" value="<?php echo $current_user->display_name; ?>" maxlength="100" />
			</label>
		</div>
		<div class="form-field">
			<label>
				<?php _e( 'Email:', APP_TD ); ?>
				<input type="text" name="email" class="text regular-text" id="email" value="<?php echo $current_user->user_email; ?>" maxlength="100" />
			</label>
			<label><?php _e( 'Make Public?:', APP_TD ); ?><input type="checkbox" <?php checked( $current_user->email_public ); ?> name="email_public" /></label>
		</div>

<?php foreach ( _wp_get_user_contactmethods( $current_user ) as $name => $desc ) : ?>
		<div class="form-field">
			<label for="<?php echo $name; ?>"><?php echo apply_filters( 'user_'.$name.'_label', $desc ); ?>:</label>
			<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo esc_attr( $current_user->$name ); ?>" class="regular-text" />
		</div>
<?php endforeach; ?>

		<div class="form-field">
			<label>
				<?php _e( 'Website:', APP_TD ); ?>
				<input type="text" name="url" class="text regular-text" id="url" value="<?php echo $current_user->user_url; ?>" maxlength="100" />
			</label>
		</div>
		<div class="form-field">
			<label>
				<?php _e( 'About Me:', APP_TD ); ?>
				<textarea name="description" class="text regular-text" id="description" rows="10" cols="50"><?php echo $current_user->description; ?></textarea>
			</label>
		</div>

			<?php if ( $show_password_fields ) : ?>

		<div class="form-field">
			<label for="pass1">
				<?php _e( 'New Password:', APP_TD ); ?> <span class="description"><?php _e( 'Leave this field blank unless you would like to change your password.', APP_TD ); ?></span>
					<input type="password" name="pass1" class="text regular-text" id="pass1" maxlength="50" value="" />
			</label>
		</div>
		<div class="form-field">
			<label for="pass2">
				<?php _e( 'Password Again:', APP_TD ); ?> <span class="description"><?php _e( 'Type your new password again.', APP_TD ); ?></span>
					<input type="password" name="pass2" class="text regular-text" id="pass2" maxlength="50" value="" />
			</label>
		</div>
		<div class="form-field">
			<label>
				<span class="description"><?php _e( 'Your password should be at least seven characters long.', APP_TD ); ?></span>
				<div id="pass-strength-result"><?php _e( 'Strength indicator', APP_TD ); ?></div>
			</label>
		</div>

			<?php endif; ?>
		<?php do_action( 'show_user_profile', $current_user ); ?>
		<div class="form-field">
			<input type="submit" value="<?php _e( 'Update Profile', APP_TD ); ?>">
		</div>

	</fieldset>

	<input type="hidden" name="action" value="app-edit-profile" />
	<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_ID; ?>" />
</form>

</div><!-- /#main -->

<div id="sidebar">
	<?php get_sidebar( app_template_base() ); ?>
</div>

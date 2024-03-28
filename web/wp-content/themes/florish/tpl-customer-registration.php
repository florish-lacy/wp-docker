<?php /* Template Name: Customer Registration */ ?>
<?php
$current_user = wp_get_current_user();
if (is_user_logged_in()) {
	wp_safe_redirect(home_url());
}
?>
<?php get_header(); ?>


<!-- Inner Banner -->
<div class="inn-bann">
	<?php if (get_field('banner_image')) { ?>
		<img src="<?php the_field('banner_image'); ?>" alt="" />
	<?php } else { ?>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog.png" alt="" />
	<?php } ?>
	<div class="desc">
		<div class="container">
			<h1 class="text-3xl font-bold underline">
				<?php the_field('banner_title'); ?>
			</h1>
		</div>
	</div>
</div>

<div class="customer-wrap cmn-gap">
	<div class="container">
		<?php if (!is_user_logged_in()) { ?>
			<div class="customer-registration">
				<span class="response_essage"></span>
				<form action="" id="UserRegForm" method="post" enctype="multipart/form-data" novalidate="novalidate">
					<?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-12">
							<div class="input-fld">
								<label class="up-lbl">First Name</label>
								<input type="text" placeholder="" name="first_name" class="form-control" required="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-12">
							<div class="input-fld">
								<label class="up-lbl">Last Name</label>
								<input type="text" placeholder="" name="last_name" class="form-control" required="">
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-12">
							<div class="input-fld">
								<label class="up-lbl">Email</label>
								<input type="email" value="" name="email" class="form-control" required="">
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-12">
							<div class="input-fld">
								<label class="up-lbl">User Type</label>
								<select name="user_role" id="select_user_role" class="form-control" required="">
									<option value="customer">Customer</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-12" id="location_div">
							<div class="input-fld">
								<label class="up-lbl">Your Location</label>
								<input type="text" name="user_location" id="user_location" class="form-control">
								<input type="hidden" placeholder="" name="user_location_lat" id="user_location_lat"
									class="form-control">
								<input type="hidden" placeholder="" name="user_location_long" id="user_location_long"
									class="form-control">
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-12">
							<div class="input-fld">
								<label class="up-lbl">Password</label>
								<input type="password" name="password" id="password" value="" class="form-control password"
									required="" class="form-control">
								<i class="fas fa-eye-slash" id="eye2"></i>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-12">
							<div class="input-fld">
								<label class="up-lbl">Confirm Password</label>
								<input type="password" name="confirm_password" id="confirm_password" value="" class="form-control"
									required="" class="form-control">
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-12">
							<div class="btn-fld">
								<button id="reg_btn">submit</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		<?php } ?>
	</div>
</div>

<?php get_footer(); ?>

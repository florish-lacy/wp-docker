<?php /* Template Name: User Signup */ ?>
<?php

global $current_user;
wp_get_current_user();

?>
<?php get_header(); ?>

<?php
// If user is logged in, show a message
if (is_user_logged_in()) { ?>
	<div class="container my-5">
		<div class="position-relative p-20 text-center text-muted bg-body border border-dashed rounded-5">
			<h1 class="text-body-emphasis text-2xl my-5">You are already signed in.</h1>

			<div class="d-flex gap-3 justify-content-center lead fw-normal">
				<a class="icon-link" href="<?php echo home_url(); ?>">
					Continue to your dashboard
				</a>

				<a class="icon-link" href="<?php echo wp_logout_url(home_url()); ?>">
					Log out
				</a>
			</div>
		</div>
	</div>
<?php } else { ?>

	<div class="container col-xl-10 col-xxl-8 px-4 py-5">
		<div class="row align-items-center g-lg-5 py-5">
			<div class="col-lg-7 text-center text-lg-start">
				<h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Create a Florish account</h1>
				<p class="col-lg-10 fs-4">Sign up to use Florish</p>
			</div>
			<div class="col-md-10 mx-auto col-lg-5">

				<div class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
					<?php echo do_shortcode('[gravityform id="10" title="false" description="false" ajax="true"]'); ?>
				</div>

				<form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="<?php echo $_SERVER['REQUEST_URI'] ?>"
					method="post">

					<div class="form-floating mb-3">
						<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
						<label for="floatingInput">Email address</label>
					</div>
					<div class="form-floating mb-3">
						<input type="password" class="form-control" id="floatingPassword" placeholder="Password">
						<label for="floatingPassword">Password</label>
					</div>
					<button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
					<hr class="my-4">
					<small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>
				</form>
			</div>
		</div>
	</div>
<?php } ?>

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
								<label class="up-lbl">Full Name</label>
								<input type="text" placeholder="" name="name" class="form-control" required="" />
							</div>
						</div>

						<div class="col-lg-12 col-md-12 col-12">
							<div class="input-fld">
								<label class="up-lbl">Email</label>
								<input type="email" value="" name="email" class="form-control" required="" />
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
								<input type="text" name="user_location" id="user_location" class="form-control" />
								<input type="hidden" placeholder="" name="user_location_lat" id="user_location_lat"
									class="form-control" />
								<input type="hidden" placeholder="" name="user_location_long" id="user_location_long"
									class="form-control" />
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-12">
							<div class="input-fld">
								<label class="up-lbl">Password</label>
								<input type="password" name="password" id="password" value="" class="form-control password"
									required="" />
								<i class="fas fa-eye-slash" id="eye2"></i>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-12">
							<div class="input-fld">
								<label class="up-lbl">Confirm Password</label>
								<input type="password" name="confirm_password" id="confirm_password" value=""
									class="form-control" required="" />
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
<div id="login-popup" class="white-popup mfp-hide">
	<div class="row">
		<div class="col-lg-5 col-md-5 col-sm-12">
			<div class="lt-wrap">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/login-lt.png" alt="" />
			</div>
		</div>
		<div class="col-lg-7 col-md-7 col-sm-12">
			<div class="rt-wrap">
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Login</button>
						<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Sign Up</button>
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<span class="response_messages"></span>
						<form method="post" action="" id="loginForm" novalidate="novalidate">
							<?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
							<div class="row">

								<div class="col-lg-12 col-md-12 col-12">
									<div class="input-fld">
										<label class="up-lbl">Email</label>
										<input type="email" value="" name="user_email" class="form-control" required="">
									</div>
								</div>

								<div class="col-lg-12 col-md-12 col-12">
									<div class="input-fld">
										<label class="up-lbl">Password</label>
										<input type="password" name="user_password" class="form-control password" required="">
										<i class="fas fa-eye-slash" id="eye1"></i>
									</div>
								</div>

								<div class="col-lg-12 col-md-12 col-12">
									<div class="btn-fld">
										<button type="submit">Login</button>
									</div>
								</div>
							</div>
						</form>

					</div>

					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						<a href="<?php echo esc_url(get_page_link(225)); ?>" class="nursery-reg">Customer Registration </a>
						<a href="<?php echo esc_url(get_page_link(1400)); ?>" class="nursery-reg">Vendor Registration </a>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

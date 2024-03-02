<div id="login-popup" class="modal modal-lg fade p-4 py-md-5" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content rounded-3 shadow overflow-hidden bg-body-tertiary">
			<div class="row">
				<div class="d-none d-md-block col-lg-5 col-md-5">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/login-lt.png" alt="" />
				</div>
				<div class="col-lg-7 col-md-7">
					<div class="p-4 ps-md-0">
						<nav>
							<div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
								<button class="border border-end-0 rounded-0 rounded-start nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Login</button>
								<button class="border border-start-0 rounded-0 rounded-end nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Sign Up</button>
							</div>
						</nav>
						<div class="tab-content p-2" id="nav-tabContent">
							<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


								<div class="mt-4 d-flex flex-column gap-2">
									<span class="response_messages"></span>
									<form method="post" action="" id="loginForm" novalidate="novalidate" class="d-flex flex-column">
										<?php wp_nonce_field('ajax-login-nonce', 'security'); ?>


										<div class="input-fld">
											<label class="up-lbl">Email</label>
											<input type="email" value="" name="user_email" class="form-control form-control-lg form-control-fl" required="">
										</div>

										<div class="input-fld">
											<label class="up-lbl">Password</label>
											<input type="password" name="user_password" class="form-control form-control-lg form-control-fl password" required="" aria-label="password field">
											<i class="fas fa-eye-slash" id="eye1"></i>
										</div>


										<button class="btn btn-fl" type="submit">Login</button>

									</form>
								</div>

							</div>

							<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
								<div class="mt-4 d-flex flex-column gap-2">
									<h3>I am a...</h3>
									<a href="<?php echo esc_url(get_page_link(225)); ?>" class="btn btn-fl">Customer</a>
									<a href="<?php echo esc_url(get_page_link(1400)); ?>" class="btn btn-fl">Vendor</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>



			<button type="button" class="btn-close position-absolute top-0 end-0 p-2 m-2" data-bs-dismiss="modal" aria-label="Close"></button>

		</div>
	</div>
</div>

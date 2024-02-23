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

<!-- Nursery Details-->
<div id="view-nursery-popup" class="white-popup mfp-hide">
	<h2>Vendor Details</h2>
	<div class="nursery-full-content">

	</div>
</div>

<!-- Zipcode Details-->
<div id="view-zipcode-popup" class="white-popup mfp-hide">
	<h2>Why do we ask for location?</h2>
	<p>It helps us recommend trees and plants that are well-suited to the local climate, based on your USDA Growing Zone.</p>
	<h3>What&rsquo;s your ZIP code?</h3>
	<div class="zipcode-full-content">
		<form method="post" action="" id="zipcodeForm" novalidate="novalidate">
			<?php
			if (!empty($_COOKIE['customer_usd_zipcode'])) {
				$customer_usd_zipcode = $_COOKIE['customer_usd_zipcode'];
			} else {
				if (!is_user_logged_in()) {
					$customer_usd_zipcode = "";
				} else {
					$customer_usd_zipcode = get_user_meta(get_current_user_id(), '_customer_usd_zipcode', true);
					if (empty($customer_usd_zipcode)) {
						$customer_usd_zipcode = "";
					}
				}
			}
			if (!empty($_COOKIE['customer_usda_zip'])) {
				$cookieValue = $_COOKIE['customer_usda_zip'];
				$decoded_json = json_decode(stripslashes($_COOKIE['customer_usda_zip']), true);
				$customer_usda_zip = $decoded_json['zone'];
				//print_r($decoded_json);
			} else {
				if (!is_user_logged_in()) {
					$customer_usda_zip = "#";
				} else {
					$customer_usda_zip_array = unserialize(get_user_meta(get_current_user_id(), '_customer_usda_zip', true));
					if (!empty($customer_usda_zip_array)) {
						$customer_usda_zip = $customer_usda_zip_array['zone'];
					} else {
						$customer_usda_zip = "#";
					}
				}
			}
			?>
			<div class="frm-inr">
				<div class="input-fld">
					<label for="zip">ZIP Code</label>
					<input type="text" size="5" class="form-control" value="<?php echo $customer_usd_zipcode; ?>" id="zip" maxlength="5" pattern="[0-9]{5}" />
					<span class="error zip-code-error"></span>
				</div>
				<div class="input-fld">
					<label for="usda_zone">USDA Zone:</label>
					<span id="usda_zone"><?php echo strtoupper($customer_usda_zip); ?></span>
				</div>
				<div class="submit-fld">
					<button type="button" id="zipcode_submit">Save My Location</button>
				</div>
			</div>

	</div>
	</form>
</div>

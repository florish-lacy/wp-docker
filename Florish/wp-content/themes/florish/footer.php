<!-- Footer Start -->
<div class="footer">
	<div class="container">
		<div class="top-pnl">
			<h3><?php the_field('newsletters_title', 'option'); ?></h3>
			<h6><?php the_field('newsletters_sub_title', 'option'); ?></h6>
			<div class="newsletter-frm">
				<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
			</div>
		</div>
		<div class="btm-pnl">
			<div class="top">
				<div class="logo">
					<a href="<?php echo get_site_url(); ?>">
						<?php if (get_field('footer_logo', 'option')) { ?>
							<img src="<?php the_field('footer_logo', 'option'); ?>" alt="" />
						<?php } else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="" />
						<?php } ?>
					</a>
				</div>
				<div class="fot-nav">
					<?php
					wp_nav_menu(array(
						'menu'  => 'Footer Menu',
					));
					?>
				</div>
			</div>
			<div class="copyright">
				<p><?php the_field('copyright_text', 'option'); ?></p>
			</div>
		</div>
	</div>

	<div class="container">
		<footer class="py-5">
			<div class="row">
				<div class="col-6 col-md-2 mb-3">
					<h5>Section</h5>
					<ul class="nav flex-column">
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
					</ul>
				</div>

				<div class="col-6 col-md-2 mb-3">
					<h5>Section</h5>
					<ul class="nav flex-column">
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
					</ul>
				</div>

				<div class="col-6 col-md-2 mb-3">
					<h5>Section</h5>
					<ul class="nav flex-column">
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
					</ul>
				</div>

				<div class="col-md-5 offset-md-1 mb-3">
					<form>
						<h5>Subscribe to our newsletter</h5>
						<p>Monthly digest of what's new and exciting from us.</p>
						<div class="d-flex flex-column flex-sm-row w-100 gap-2">
							<label for="newsletter1" class="visually-hidden">Email address</label>
							<input id="newsletter1" type="text" class="form-control" placeholder="Email address">
							<button class="btn btn-primary" type="button">Subscribe</button>
						</div>
					</form>
				</div>
			</div>

			<div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
				<p>© 2023 Company, Inc. All rights reserved.</p>
				<ul class="list-unstyled d-flex">
					<li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
								<use xlink:href="#twitter"></use>
							</svg></a></li>
					<li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
								<use xlink:href="#instagram"></use>
							</svg></a></li>
					<li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
								<use xlink:href="#facebook"></use>
							</svg></a></li>
				</ul>
			</div>
		</footer>
	</div>
</div>

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
</div>

<!-- Nursery Inventory List-->
<div id="view-nursery-inventory-popup" class="white-popup mfp-hide">
	<div class="inv-popup">
		<h3>Select Your Inventory</h3>
		<div class="search-bar">
			<input type="text" placeholder="Search..." id="search_plants" class="form-control search-plants" />
		</div>
		<form method="post" action="" id="AddInventory" novalidate="novalidate">
			<div class="master-plant">

			</div>
			<div class="row">
				<div class="col-lg-4 col-md-12 col-sm-12"></div>
				<div class="col-lg-8 col-md-12 col-sm-12">
					<ul class="pl_btns">
						<li><button>+ Add A New Plant</button></li>
						<li><button name="all_done" onclick="return confirm('Are you sure to select plants is confirm going to live?')">All done!</button></li>
					</ul>
				</div>
			</div>
		</form>

	</div>
</div>

<!-- market edit-->
<div id="edit-market-popup" class="white-popup mfp-hide">
	<div class="market-wrap">
		<h3>Update market</h3>

		<form method="post" action="" id="updateMarkets" novalidate="novalidate">

			<input type="hidden" id="market_id1" name="market_id" />
			<input type="hidden" id="latitude1" name="latitude1" />
			<input type="hidden" id="longitude1" name="longitude1" />
			<input type="hidden" id="fulladdress1" name="fulladdress1" />
			<input type="hidden" id="zipcode1" name="zipcode1" />
			<div class="input-fld">
				<label>Market name:</label>
				<div class="input-control">
					<input type="text" name="market_name1" id="market_name1" class="form-control" required />
					<span class="name-field-error" id="field-error"></span>
				</div>
			</div>
			<div class="input-fld">
				<label>Radius (miles):</label>
				<div class="input-control">
					<input type="number" name="radious_miles1" id="radious_miles1" class="form-control" value="10" />
					<span class="name-field-error" id="miles-field-error"></span>
				</div>
			</div>
			<div class="input-fld">
				<label>Take Rate (%):</label>
				<div class="input-control">
					<input type="number" name="take_rate1" id="take_rate1" class="form-control" value="" />
					<span class="name-field-error" id="rate-field-error"></span>
				</div>
			</div>
			<div class="input-fld" id="pac-card">
				<label>Set center pin:</label>
				<div id="input-control" class="input-control">
					<input id="pac-input1" class="controls form-control full-address" type="text" readonly placeholder="Enter a location">
					<div id="location-error" class="name-field-error"></div>
				</div>
			</div>
			<!-- <div class="input-fld">
            <input type="range" class="field"  id="radius1" name="radius" min="0" max="100" value="10" onchange="updateRadius()">
         </div> -->
			<div class="submit-fld">
				<button name="update_market" id="update_markets" type="hidden"></button>
				<a href="JavaScript:void(0)" id="update_market">Update</a>
			</div>
		</form>

	</div>
</div>

<?php wp_footer(); ?>

</body>

</html>

<!-- Growing Zone Zipcode Details-->
<div id="view-zipcode-popup" class="modal fade p-4 py-md-5" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content rounded-3 shadow overflow-hidden bg-body-tertiary">

			<div class="modal-header border-bottom-0 align-items-start ps-5">
				<h2 class="modal-title fs-3">Why do we ask for location?</h2>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-5 pt-0">
				<p>It helps us recommend trees and plants that are well-suited to the local climate, based on your USDA Growing Zone.</p>
				<h3 class="fs-5">What&rsquo;s your ZIP code?</h3>
				<form method="post" action="" id="zipcodeForm" novalidate="novalidate" class="d-flex flex-column gap-3 p-2">
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
					<div class="input-fld">
						<label for="zip">ZIP Code</label>
						<input type="text" size="5" class="form-control form-control-fl" value="<?php echo $customer_usd_zipcode; ?>" id="zip" maxlength="5" pattern="[0-9]{5}" />
						<span class="error zip-code-error"></span>
					</div>
					<div class="input-fld">
						<label for="usda_zone">USDA Zone:</label>
						<span id="usda_zone" class="text-uppercase"><?php echo strtoupper($customer_usda_zip); ?></span>
					</div>

					<button class="btn btn-fl mt-2" type="button" id="zipcode_submit">Save My Location</button>

				</form>
			</div>
		</div>
	</div>
</div>

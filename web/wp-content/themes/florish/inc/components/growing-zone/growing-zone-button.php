<!-- Growing Zone -->
<?php

$customer_usd_zipcode = !empty($_COOKIE['customer_usd_zipcode']) ? $_COOKIE['customer_usd_zipcode'] : '';
if (is_user_logged_in()) {
	$customer_usd_zipcode = get_user_meta(get_current_user_id(), '_customer_usd_zipcode', true) ?: '';
}

$customer_usda_zip = '#';
if (!empty($_COOKIE['customer_usda_zip'])) {
	$cookieValue = $_COOKIE['customer_usda_zip'];
	$decoded_json = json_decode(stripslashes($_COOKIE['customer_usda_zip']), true);
	$customer_usda_zip = $decoded_json['zone'];
} elseif (is_user_logged_in()) {
	$customer_usda_zip_array = unserialize(get_user_meta(get_current_user_id(), '_customer_usda_zip', true));
	$customer_usda_zip = !empty($customer_usda_zip_array) ? $customer_usda_zip_array['zone'] : '#';
}
?>

<div class="growing-btn">
	<button data-bs-toggle="modal" data-bs-target="#view-zipcode-popup" class="form-control rounded-pill">
		<div class="d-flex flex-column">
			<span>USDA Zone: <?php echo strtoupper($customer_usda_zip); ?></span>
			<span>Planting in <strong><?php echo $customer_usd_zipcode; ?></strong></span>
		</div>
	</button>
</div>
<!-- /Growing Zone -->

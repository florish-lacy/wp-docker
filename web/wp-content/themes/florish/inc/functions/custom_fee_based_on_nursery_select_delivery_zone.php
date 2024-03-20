<?php

function custom_fee_based_on_nursery_select_delivery_zone($cart)
{

	//if ( is_admin() && ! defined( 'DOING_AJAX' ) ) return;

	if (!empty($_COOKIE['customer_usda_zip'])) {
		//$customer_usda_zip_array = $_COOKIE['customer_usda_zip'];
		$customer_usda_zip_array = json_decode(stripslashes($_COOKIE['customer_usda_zip']), true);
		$location_lat2 = $customer_usda_zip_array['coordinates']['lat'];
		$location_long2 = $customer_usda_zip_array['coordinates']['lon'];

	} else {
		$customer_usda_zip_array = unserialize(get_user_meta(get_current_user_id(), '_customer_usda_zip', true));
		if (!empty($customer_usda_zip_array)) {
			$location_lat2 = $customer_usda_zip_array['coordinates']['lat'];
			$location_long2 = $customer_usda_zip_array['coordinates']['lon'];
		} else {
			$location_lat2 = '34.09';
			$location_long2 = '-118.406';
		}
	}
	$args = array(
		'role' => 'nursery',
		'orderby' => 'user_nicename',
		'order' => 'ASC'
	);
	$users = get_users($args);

	$delivery_fee = 0;
	foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {

		$plant_id = $cart_item['product_id'];


		foreach ($users as $user) {
			$user_id = $user->ID;
			$location_lat1 = get_user_meta($user_id, 'user_location_lat', true);
			$location_long1 = get_user_meta($user_id, 'user_location_long', true);
			$user_avaliable_plant = get_user_meta($user_id, '_avaliable_plant', true);
			if (in_array($plant_id, unserialize($user_avaliable_plant))) {

				$customer_delivery_zone = get_distances_miles($location_lat1, $location_long1, $location_lat2, $location_long2, "M");

				// $select_delivery_zone = get_user_meta( $user_id, '_select_delivery_zone' , true );
				//$customer_delivery_zone = 10;
				if ($customer_delivery_zone >= 6 && $customer_delivery_zone <= 10.99) {
					$delivery_fee = 15;
					break;
				} else if ($customer_delivery_zone >= 11 && $customer_delivery_zone <= 15) {
					$delivery_fee = 30;
					break;
				} else {
					$delivery_fee = 0;
				}

			} else {

				$delivery_fee = 0;
			}
		}


		$cart_item_price = $cart_item['data']->price + $delivery_fee;
		$cart_item['data']->set_price($cart_item_price);
	}

	//$fee = 15;
	if ($delivery_fee == 0) {
		$delivery_fee = "Free Delivery";
	}

	if ($delivery_fee != 0) {
		$cart->add_fee(__("Delivery fee", "woocommerce"), $delivery_fee, false);
	}
}


<?php

function get_market_details_edit()
{

	$market_id = $_POST['market_id'];
	global $wpdb;
	$tablename = $wpdb->prefix . "nurser_market_table";
	$market_table = $wpdb->get_results("SELECT * FROM $tablename WHERE id = $market_id", ARRAY_A);
	if (count($market_table) > 0) {
		foreach ($market_table as $market_list) {
			$market_name = $market_list['market_name'];
			$market_id = $market_list['id'];
			$location_lat2 = $market_list['latitude'];
			$location_long2 = $market_list['longitude'];
			$miles = $market_list['miles'];
			$nurser_count = $market_list['nurser_count'];
			$full_address = $market_list['full_address'];
			$take_rate = $market_list['take_rate'];

			echo $market_name . '!' . $location_lat2 . '!' . $location_long2 . '!' . $miles . '!' . $full_address . '!' . $take_rate;
		}
	}

	die();
}

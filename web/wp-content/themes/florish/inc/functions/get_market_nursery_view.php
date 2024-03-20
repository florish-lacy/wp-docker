<?php

function get_market_nursery_view()
{

	global $wpdb;
	$tablename = $wpdb->prefix . "nurser_market_table";


	$location_lat2 = $_POST['lat'];
	$location_long2 = $_POST['long'];
	$miles = $_POST['miles'];
	$market_id = $_POST['market_id'];
	$market_name = $_POST['market_name'];
	$take_rate = $_POST['take_rate'];
	if (empty ($take_rate)) {
		$take_rate = 5;
	}
	?>
	<h3>
		<?php echo $market_name; ?>
	</h3>
	<ul class="accordion-content">
		<?php
		$args = array(
			'role' => 'nursery',
			'orderby' => 'user_nicename',
			'order' => 'ASC'
		);
		$users = get_users($args);

		$market_list_nurser_count = 0;

		$wpdb->update($tablename, array('nurser_count' => $market_list_nurser_count), array('id' => $market_id));
		if ($market_list_nurser_count == 0) {
			?>
			<li class="nursery-nm-no">There are no nurseries within this market</li>
		<?php } ?>
	</ul>
	<?

	die();
}

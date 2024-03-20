<?php

function nursery_inventory_active_inactive()
{
	$vaiation_id = $_POST['varible_id'];
	$status = $_POST['status'];
	$field_status = '_nursery_product_plant_variation_status_' . get_current_user_id();
	update_post_meta($vaiation_id, $field_status, $status);
	if ($status == 'Yes') {
		echo "Your plants is Activated";
	} else {
		echo "Your plants is Deactivated";
	}

	die();
}

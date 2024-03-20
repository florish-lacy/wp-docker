<?php

function hybrid_event_save_extra_user_fields($user_id)
{
	if (current_user_can('administrator')) {
		if (current_user_can('edit_user', $user_id)) {
			update_user_meta($user_id, '_member_status', $_POST['st_member_status']);
		}
	}
	return true;
}

<?php

function hybrid_event_extra_user_profile_fields($user)
{
	$mamber_status = get_user_meta($user->ID, '_member_status');
	if (current_user_can('administrator')) { ?>
		<h3>
			<?php _e("Member Status", "blank"); ?>
		</h3>
		<table class="form-table">
			<tr>
				<th><label for="st_member_status">
						<?php _e("User Status"); ?>
					</label></th>
				<td><select name="st_member_status">
						<option value="">Select Status</option>
						<option value="active" <?php if ($mamber_status[0] == 'active') {
							echo "selected";
						} ?>>Active</option>
						<option value="inactive" <?php if ($mamber_status[0] == 'inactive') {
							echo "selected";
						} ?>>Inactive
						</option>
					</select>
					<br />
					<span class="description">
						<?php _e("Please Select Member Status."); ?>
					</span>
				</td>
			</tr>
		</table>
	<?php }
}

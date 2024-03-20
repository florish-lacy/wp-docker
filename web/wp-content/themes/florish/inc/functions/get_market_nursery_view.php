<?php
// TODO: Organize this

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
	if (empty($take_rate)) {
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
		foreach ($users as $user) {
			$user_id = $user->ID;
			$user_avaliable_plant = get_user_meta($user_id, '_avaliable_plant', true);
			$location_lat1 = get_user_meta($user_id, 'user_location_lat', true);
			$location_long1 = get_user_meta($user_id, 'user_location_long', true);
			$nursery_name = get_user_meta($user_id, 'nursery_name', true);
			//if(in_array($plant_id, unserialize($user_avaliable_plant))){

			$customer_delivery_zone = get_distances_miles($location_lat1, $location_long1, $location_lat2, $location_long2, "M");
			if ($customer_delivery_zone <= $miles) {
				$market_list_nurser_count = $market_list_nurser_count + 1;
				?>
				<li class="nursery-nm"><a href="#" class="accordion-toggle "><button><i
								class="fa-solid fa-chevron-down"></i></button><span>
							<?php echo $nursery_name; ?>
						</span></a>
					<div class="accordion-content">
						<div class="table-responsive">
							<table class="table">
								<tr>
									<th>Plant</th>
									<th>Size</th>
									<th>Nursery Price</th>
									<th>MSRP Price</th>
									<th>Take Rate(
										<?php echo $take_rate; ?>%)
									</th>
									<th>Gross Profit</th>
								</tr>
								<?php $args = array(
									'posts_per_page' => -1,
									'post_type' => 'product',
									'orderby' => 'title',
									'order' => 'ASC',
									's' => $search_plant,
									'meta_query' => array(
										array(
											'key' => 'product_acquirable',
											'value' => 'For Sale',
											'compare' => '=',
										)
									),
								);
								$products = new WP_Query($args);
								if ($products->have_posts()):
									while ($products->have_posts()):
										$products->the_post();
										$user_avaliable_plant = get_user_meta($user_id, '_avaliable_plant', true);
										// print_r(unserialize($user_avaliable_plant));
										$plant_id = get_the_ID();
										$attributes = wc_get_product_terms(get_the_ID(), 'pa_nursery-pot-size');
										$select_product_pot_size = get_post_meta(get_the_ID(), '_nursery_product_plant_list' . $user_id, true);
										$product = wc_get_product($plant_id);

										if ($product->is_type('variable')) {
											if (!empty($attributes)) {
												$available_variations = $product->get_available_variations();

												foreach ($available_variations as $available_variation) {
													$pot_size_slug = $available_variation['attributes']['attribute_pa_nursery-pot-size'];
													$varible_id = $available_variation['variation_id'];
													$display_price = $available_variation['display_price'];
													$pa_pot_size_ = 'pa_nursery-pot-size';
													$pa_pot_size_meta = get_post_meta($available_variation['variation_id'], 'attribute_' . $pa_pot_size_, true);
													$pa_pot_size_term = get_term_by('slug', $pa_pot_size_meta, $pa_pot_size_);
													$pa_pot_size_term_name = $pa_pot_size_term->name;
													$pa_pot_size_term_id = $pa_pot_size_term->term_id;
													$field_add = '_nursery_product_plant_variation_add_' . $user_id;
													$field_price = '_nursery_product_plant_variation_retail_price_' . $user_id;
													$field_status = '_nursery_product_plant_variation_status_' . $user_id;
													$select_product_pot_size_price = get_post_meta($varible_id, $field_price, true);
													if (!empty($select_product_pot_size_price)) {
														$vendor_price = $select_product_pot_size_price;
													}


													//update_post_meta( $varible_id, $field_status , '' );
													$select_product_pot_status = get_post_meta($varible_id, $field_status, true);
													$select_product_pot_add = get_post_meta($varible_id, $field_add, true);
													$select_product_pot_size_price = get_post_meta($varible_id, $field_price, true);
													if ($select_product_pot_add == 'Yes') {
														//echo the_title().'  '.$pa_pot_size_term_name."<br>";
														$currency_symbol = get_woocommerce_currency_symbol();
														?>
														<tr>
															<td>
																<?php the_title(); ?>
															</td>
															<td>
																<?php echo $pa_pot_size_term_name; ?>
															</td>
															<td>
																<?php echo $currency_symbol . $vendor_price; ?>
															</td>
															<td>
																<?php echo $currency_symbol . $display_price; ?>
															</td>
															<td>
																<?php echo $currency_symbol . ($vendor_price * $take_rate) / 100; ?>
															</td>
															<td>
																<?php echo $currency_symbol;
																$commission = ($vendor_price * $take_rate) / 100;
																echo ($display_price - ($vendor_price - $commission));
																?>
															</td>
														</tr>
														<?php
													}
												}
											}
										}
									endwhile;
								endif;

								wp_reset_postdata();
								?>
							</table>
						</div>
					</div>
				</li>
			<?php }
		}
		$wpdb->update($tablename, array('nurser_count' => $market_list_nurser_count), array('id' => $market_id));
		if ($market_list_nurser_count == 0) {
			?>
			<li class="nursery-nm-no">There are no nurseries within this market</li>
		<?php } ?>
	</ul>
	<?

	die();
}

<?php /* Template Name: Add Inventory Nursery */ ?>
<?php
// $current_user = wp_get_current_user();
// if ( !wc_user_has_role( $current_user, 'nursery' )){
//   wp_safe_redirect(home_url());
// }
$user_id = get_current_user_id();
$status = get_user_meta($user_id, '_member_status', true);
$inventory_sumbit_status = get_user_meta($user_id, '_inventory_sumbit_status', true);
$stage_status = get_user_meta($user_id, '_stage_status', true);

// Add body class to the header: Makes the header float above the content
// use .fl-nav__offset to give the header a top margin
Florish\add_body_class('fl-nav--floating fl-nav--light fl-footer--sm fl-footer--img');

?>
<?php get_header(); ?>

<div class="nursery-onboarding-landing">

	<!-- HERO -->
	<div class="p-5 text-center bg-primary fl-bg-pattern-2 text-white text-center fl-nav__offset">
		<div class="container py-5 ps-lg-10 mt-5">
			<h1 class="">Congratulations!</h1>
			<p class="col-lg-8 mx-auto lead">
				Your application has been approved to become a Florish Nursery Partner. Complete the following setup steps
				to connect your inventory with florish
			</p>
		</div>
	</div>

	<!-- STEPS -->
	<div class="container my-5">
		<div class="row">
			<div class="list-group gap-2 col-lg-8 mx-auto">
				<div class="row">
					<p class="col">If you have questions or would like to make changes,
						<a class="link-underline" href="/contact">
							contact support.
						</a>
					</p>
				</div>


				<div class="fl-step fl-step--done row">
					<div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
						<div
							class="fl-aspect-square w-100 p-2 rounded-circle bg-dark text-white d-flex justify-content-center align-items-center">
							<i class="fa-solid fa-check"></i></div>
					</div>
					<div class="col">
						<div class="disabled list-group-item list-group-item-action gap-3 py-3 rounded-1">
							<div class="d-flex gap-2 w-100 justify-content-between">
								<div>
									<h6 class="mb-0">Business information</h6>
									<p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
								</div>
								<small class="opacity-50 text-nowrap">&rsaquo;</small>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
						<div
							class="fl-aspect-square w-100 p-2 rounded-circle bg-primary text-white d-flex justify-content-center align-items-center">
							<i class="fa-solid fa-van-shuttle"></i></div>
					</div>
					<div class="col">
						<div class="active list-group-item list-group-item-action gap-3 py-3 rounded-1">
							<div class="d-flex gap-2 w-100 justify-content-between">
								<div>
									<h6 class="mb-0">Delivery details</h6>
									<p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
								</div>
								<small class="opacity-50 text-nowrap">&rsaquo;</small>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
						<div
							class="fl-aspect-square w-100 p-2 rounded-circle border border-primary text-primary d-flex justify-content-center align-items-center">
							<i class="fa-solid fa-credit-card"></i></div>
					</div>
					<div class="col">
						<div class="list-group-item list-group-item-action gap-3 py-3 rounded-1">
							<div class="d-flex gap-2 w-100 justify-content-between">
								<div>
									<h6 class="mb-0">Payment</h6>
									<p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
								</div>
								<small class="opacity-50 text-nowrap">&rsaquo;</small>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
						<div
							class="fl-aspect-square w-100 p-2 rounded-circle border border-primary text-primary d-flex justify-content-center align-items-center">
							<i class="fa-solid fa-file-invoice"></i></div>
					</div>
					<div class="col">
						<div class="list-group-item list-group-item-action gap-3 py-3 rounded-1">
							<div class="d-flex gap-2 w-100 justify-content-between">
								<div>
									<h6 class="mb-0">Insurance and agreements</h6>
									<p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
								</div>
								<small class="opacity-50 text-nowrap">&rsaquo;</small>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-2 col-lg-1 d-flex justify-content-center align-items-center">
						<div
							class="fl-aspect-square w-100 p-2 rounded-circle border border-primary text-primary d-flex justify-content-center align-items-center">
							<i class="fa-solid fa-seedling"></i></div>
					</div>
					<div class="col">
						<div class="list-group-item list-group-item-action gap-3 py-3 rounded-1">
							<div class="d-flex gap-2 w-100 justify-content-between">
								<div>
									<h6 class="mb-0">Select your inventory</h6>
									<p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
								</div>
								<small class="opacity-50 text-nowrap">&rsaquo;</small>
							</div>
						</div>
					</div>
				</div>


			</div><!-- END .list-group -->
		</div>
	</div>

</div>
<div class="flo-step-pnl">
	<div class="container">
		<div class="inn">
			<div class="top">
				<?php if ($status == 'active' && $stage_status >= 1) { ?>
					<h2>Congratulations you have been approved <span>to become a Florish Nursery Partner.</span></h2>
					<p>Congratulations you have been approved to become a Florish Nursery Partner. Please Compleate your
						business information select your inventory from the list below ,Connect your bank account and sign
						the nursery partner Agreement.
					</p>
				<?php } else { ?>
					<h2>Thank you for applying to become <span>a part of our marketplace</span></h2>
					<p>Here’s what you can expect next...</p>
				<?php } ?>
			</div>
			<div class="btm">
				<ul class="step-ul">
					<li class="active"><span>1</span>Submit Application</li>
					<li <?php if ($status == 'active' && $stage_status >= 1) { ?> class="active" <?php } ?>>
						<span>2</span>Florish Initial Review
					</li>
					<li <?php if ($status == 'active' && $inventory_sumbit_status == 1 && $stage_status == 2) { ?> class="active"
						<?php } ?>><span>3</span>Confirm Inventory + Delivery</li>
					<li <?php if ($status == 'active' && $inventory_sumbit_status == 1 && $stage_status == 2) { ?> class="active"
						<?php } ?>><span>4</span>Sign Agreements</li>
					<li <?php if ($status == 'active' && $inventory_sumbit_status == 1 && $stage_status == 2) { ?> class="active"
						<?php } ?>><span>5</span>Go Live!</li>
				</ul>
				<?php if (is_user_logged_in() && $status == 'active' && $inventory_sumbit_status == '' && $stage_status == 1) { ?>
					<form action="" id="NurseryInventoryForm" method="post" enctype="multipart/form-data"
						novalidate="novalidate">
						<div class="tab-content">
							<div class="fl-box">
								<div class="form-wrap">
									<div class="controls">
										<div class="card_bxfl">
											<a href="#" class="accordion-toggle">
												<h3>Business Information:</h3>
											</a>
											<div class="accordion-content">
												<p>indicates required fields
													<span class="gfield_required gfield_required_asterisk">*</span>
												</p>
												<div class="row">
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label for="account_owner_name">Account Owner Name *</label>
															<input id="account_owner_name" type="text" name="account_owner_name"
																class="form-control" placeholder="Account Owner Name *" required>
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<?php
														$owner_email = get_user_meta(get_current_user_id(), '_account_owner_email', true);
														if (empty($owner_email)) {
															$current_user = wp_get_current_user();
															$owner_email = $current_user->user_email;
														}
														?>
														<div class="form-group">
															<label for="account_owner_email">Email Address *</label>
															<input id="account_owner_email" type="email" name="account_owner_email"
																class="form-control" placeholder="Account Owner email *"
																value="<?php echo $owner_email; ?>" required>
														</div>
													</div>
													<!-- <div class="col-md-4 col-sm-12">
													<div class="form-group">
														<label for="account_owner_phone">Phone *</label>
														<input id="account_owner_phone" type="text" name="account_owner_phone"
															class="form-control" placeholder="Account Owner phone number *"
															required>
													</div>
												</div> -->
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label for="corporate_entity_name">Legal Business Name / Entity Name *</label>
															<input id="corporate_entity_name" type="text" name="corporate_entity_name"
																class="form-control" placeholder="Corporate Entity Name *" required>
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label for="ein_name">EIN</label>
															<input id="ein_name" type="text" name="ein_name" class="form-control"
																placeholder="EIN">
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label for="formphone">Corporate Mailing Address *</label>
															<input id="corporate_mailing_address" type="text"
																name="corporate_mailing_address" class="form-control"
																placeholder="Corporate Mailing Address *" required>
														</div>
													</div>
													<h3>Add Nursery Location:</h3>
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label for="manager_location_name">Location Name *</label>
															<input id="manager_location_name" type="text" name="manager_location_name"
																class="form-control" placeholder="Location Name *" required>
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label for="manager_location_1">Location Address *</label>
															<?php
															$user_location = get_user_meta(get_current_user_id(), 'user_location', true);
															$user_location_lat = get_user_meta(get_current_user_id(), 'user_location_lat', true);
															$user_location_long = get_user_meta(get_current_user_id(), 'user_location_long', true);
															?>
															<input id="manager_location_1" type="text" name="manager_location_1"
																value="<?php echo $user_location; ?>" class="form-control"
																placeholder="Location Address *" required>
															<input type="hidden" id="manager_location_lat_1" name="manager_location_lat_1"
																value="<?php echo $user_location_lat; ?>">
															<input type="hidden" id="manager_location_long_1"
																name="manager_location_long_1" value="<?php echo $user_location_long; ?>">
														</div>
													</div>
													<!-- <div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label for="manager_delivery_radius_1">Location Delivery Radius
														*</label>
														<select id="manager_delivery_radius_1" name="manager_delivery_radius_1"
															class="form-control" placeholder="Location Delivery Radius *"
															required>
															<option value="" selected="selected">Location Delivery Radius
															</option>
															<option value="15">Upto 15 Miles</option>
															<option value="10">Upto 10 Miles</option>
															<option value="5">Upto 5 Miles</option>
														</select>
													</div>
												</div> -->
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label for="manager_email">Nursery Email Address *</label>
															<input id="manager_email" type="email" name="manager_email_1"
																class="form-control" placeholder="Nursery Email Address *" required>
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label for="manager_full_name">Nursery Manager Full Name *</label>
															<input id="manager_full_name" type="text" name="manager_full_name_1"
																class="form-control" placeholder="Nursery Manager Full Name *" required>
														</div>
													</div>

													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<label for="manager_phone_number_1">Nursery Manager Direct Number?</label>
															<input id="manager_phone_number_1" type="text" name="manager_phone_number_1"
																class="form-control" placeholder="Nursery Manager Direct Number *"
																required>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="card_bxfl">
											<a href="#" class="accordion-toggle">
												<h3>Delivery Details:</h3>
											</a>
											<div class="accordion-content">
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<div class="form-group delivery-miles-distance">
															<label for="manager_delivery_radius_1"><strong>Delivery Distance</strong>
															</label>
															<p>Select delivery distance for this location and accept prices</p>
															<div class="select_miles"><strong><span class="miles-number">5</span>
																	Miles</strong></div>
															<div class="input-range">
																<span>0</span><input id="manager_delivery_radius_1" type="range"
																	name="manager_delivery_radius_1" min="0" max="15" value="5"
																	class="change-delivery-radious" placeholder="Delivery Distance"
																	required><span>15</span>
															</div>
															<ul>
																<li>0-5 miles = Florish Pays $15</li>
																<li>5-10 miles = Florish Pays $25</li>
																<li>10-15 miles = Florish Pays $45</li>
															</ul>
														</div>
													</div>
													<div class="col-md-12 col-sm-12">
														<div class="form-group dd-date-time">
															<label for="manager_delivery_days_1">Delivery Days and Times</label>
															<p>Select delivery days and time for this location</p>
															<div class="gfield_checkbox" id="input_9_18">
																<div class="gchoice gchoice_9_18_1">
																	<input class="form-control require-one" name="input_delivery_days_1[]"
																		type="checkbox" value="Sunday" id="choice_9_18_1" required>
																	<label for="choice_9_18_1" id="label_9_18_1"
																		class="gform-field-label gform-field-label--type-inline">Sunday</label>
																</div>
																<div class="gchoice gchoice_9_18_2">
																	<input class="form-control require-one" name="input_delivery_days_1[]"
																		type="checkbox" value="Monday" id="choice_9_18_2" required>
																	<label for="choice_9_18_2" id="label_9_18_2"
																		class="gform-field-label gform-field-label--type-inline">Monday</label>
																</div>
																<div class="gchoice gchoice_9_18_3">
																	<input class="form-control require-one" name="input_delivery_days_1[]"
																		type="checkbox" value="Tuesday" id="choice_9_18_3" required>
																	<label for="choice_9_18_3" id="label_9_18_3"
																		class="gform-field-label gform-field-label--type-inline">Tuesday</label>
																</div>
																<div class="gchoice gchoice_9_18_4">
																	<input class="form-control require-one" name="input_delivery_days_1[]"
																		type="checkbox" value="Wednesday" id="choice_9_18_4" required>
																	<label for="choice_9_18_4" id="label_9_18_4"
																		class="gform-field-label gform-field-label--type-inline">Wednesday</label>
																</div>
																<div class="gchoice gchoice_9_18_5">
																	<input class="form-control require-one" name="input_delivery_days_1[]"
																		type="checkbox" value="Thursday" id="choice_9_18_5" required>
																	<label for="choice_9_18_5" id="label_9_18_5"
																		class="gform-field-label gform-field-label--type-inline">Thursday</label>
																</div>
																<div class="gchoice gchoice_9_18_6">
																	<input class="form-control require-one" name="input_delivery_days_1[]"
																		type="checkbox" value="Friday" id="choice_9_18_6" required>
																	<label for="choice_9_18_6" id="label_9_18_6"
																		class="gform-field-label gform-field-label--type-inline">Friday</label>
																</div>
																<div class="gchoice gchoice_9_18_7">
																	<input class="form-control require-one" name="input_delivery_days_1[]"
																		type="checkbox" value="Saturday" id="choice_9_18_7" required>
																	<label for="choice_9_18_7" id="label_9_18_7"
																		class="gform-field-label gform-field-label--type-inline">Saturday</label>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12 col-sm-12">
														<div class="weekely-time">
															<div class="days sunday-div">
																<a href="#" class="accordion-toggle">
																	<h4>Sunday</h4>
																</a>
																<div class="accordion-content">
																	<ul class="select-days">
																		<li>
																			<input class="" name="delivery_days_sunday_morning"
																				id="delivery_days_sunday_morning" type="checkbox"
																				value="Morning" required>
																			<label for="delivery_days_sunday_morning">Morning</label>

																		</li>
																		<li>
																			<input class="" name="delivery_days_sunday_afternoon"
																				id="delivery_days_sunday_afternoon" type="checkbox"
																				value="Afternoon" required>
																			<label for="delivery_days_sunday_afternoon">Afternoon</label>

																		</li>
																		<li>
																			<input class="" name="delivery_days_sunday_evening"
																				id="delivery_days_sunday_evening" type="checkbox"
																				value="Evening" required>
																			<label for="delivery_days_sunday_evening">Evening</label>

																		</li>
																	</ul>

																</div>
															</div>
															<div class="days monday-div">
																<a href="#" class="accordion-toggle">
																	<h4>Monday</h4>
																</a>
																<div class="accordion-content">
																	<ul class="select-days">
																		<li class="select-days">
																			<input class="" name="delivery_days_monday_morning"
																				id="delivery_days_monday_morning" type="checkbox"
																				value="Morning" required>
																			<label for="delivery_days_monday_morning">Morning</label>

																		</li>
																		<li>
																			<input class="" name="delivery_days_monday_afternoon"
																				id="delivery_days_monday_afternoon" type="checkbox"
																				value="Afternoon" required>
																			<label for="delivery_days_monday_afternoon">Afternoon</label>

																		</li>
																		<li>
																			<input class="" name="delivery_days_monday_evening"
																				id="delivery_days_monday_evening" type="checkbox"
																				value="Evening" required>
																			<label for="delivery_days_monday_evening">Evening</label>

																		</li>
																	</ul>
																</div>
															</div>
															<div class="days tuesday-div">
																<a href="#" class="accordion-toggle">
																	<h4>Tuesday</h4>
																</a>
																<div class="accordion-content">
																	<ul class="select-days">
																		<li>
																			<input class="" name="delivery_days_tuesday_morning"
																				id="delivery_days_tuesday_morning" type="checkbox"
																				value="Morning" required>
																			<label for="delivery_days_tuesday_morning">Morning</label>

																		</li>
																		<li>
																			<input class="" name="delivery_days_tuesday_afternoon"
																				id="delivery_days_tuesday_afternoon" type="checkbox"
																				value="Afternoon" required>
																			<label for="delivery_days_tuesday_afternoon">Afternoon</label>

																		</li>
																		<li>
																			<input class="" name="delivery_days_tuesday_evening"
																				id="delivery_days_tuesday_evening" type="checkbox"
																				value="Evening" required>
																			<label for="delivery_days_tuesday_evening">Evening</label>

																		</li>
																	</ul>
																</div>
															</div>
															<div class="days wednesday-div">
																<a href="#" class="accordion-toggle">
																	<h4>Wednesday</h4>
																</a>
																<div class="accordion-content">
																	<ul class="select-days">
																		<li>
																			<input class="" name="delivery_days_wednesday_morning"
																				type="checkbox" value="Morning"
																				id="delivery_days_wednesday_morning" required>
																			<label for="delivery_days_wednesday_morning">Morning</label>

																		</li>
																		<li>
																			<input class="" name="delivery_days_wednesday_afternoon"
																				id="delivery_days_wednesday_afternoon" type="checkbox"
																				value="Afternoon" required>
																			<label for="delivery_days_wednesday_afternoon">Afternoon</label>

																		</li>
																		<li>
																			<input class="" name="delivery_days_wednesday_evening"
																				id="delivery_days_wednesday_evening" type="checkbox"
																				value="Evening" required>
																			<label for="delivery_days_wednesday_evening">Evening</label>

																		</li>
																	</ul>
																</div>
															</div>
															<div class="days thursday-div">
																<a href="#" class="accordion-toggle">
																	<h4>Thursday</h4>
																</a>
																<div class="accordion-content">
																	<ul class="select-days">
																		<li>
																			<input class="" name="delivery_days_thursday_morning"
																				id="delivery_days_thursday_morning" type="checkbox"
																				value="Morning" required>
																			<label for="delivery_days_thursday_morning">Morning</label>

																		</li>
																		<li>
																			<input class="" name="delivery_days_thursday_afternoon"
																				id="delivery_days_thursday_afternoon" type="checkbox"
																				value="Afternoon" required>
																			<label for="delivery_days_thursday_afternoon">Afternoon</label>

																		</li>
																		<li>
																			<input class="" name="delivery_days_thursday_evening"
																				id="delivery_days_thursday_evening" type="checkbox"
																				value="Evening" required>
																			<label for="delivery_days_thursday_evening">Evening</label>

																		</li>
																	</ul>
																</div>
															</div>
															<div class="days friday-div">
																<a href="#" class="accordion-toggle">
																	<h4>Friday</h4>
																</a>
																<div class="accordion-content">
																	<ul class="select-days">
																		<li>
																			<input class="" name="delivery_days_friday_morning"
																				id="delivery_days_friday_morning" type="checkbox"
																				value="Morning" required>
																			<label for="delivery_days_friday_morning">Morning</label>

																		</li>
																		<li>
																			<input class="" name="delivery_days_friday_afternoon"
																				id="delivery_days_friday_afternoon" type="checkbox"
																				value="Afternoon" required>
																			<label for="delivery_days_friday_afternoon">Afternoon</label>

																		</li>
																		<li>
																			<input class="" name="delivery_days_friday_evening"
																				id="delivery_days_friday_evening" type="checkbox"
																				value="Evening" required>
																			<label for="delivery_days_friday_evening">Evening</label>

																		</li>
																	</ul>
																</div>
															</div>
															<div class="days saturday-div">
																<a href="#" class="accordion-toggle">
																	<h4>Saturday</h4>
																</a>
																<div class="accordion-content">
																	<ul class="select-days">
																		<li>
																			<label for="delivery_days_saturday_morning">Morning</label>
																			<input class="" name="delivery_days_saturday_morning"
																				id="delivery_days_saturday_morning" type="checkbox"
																				value="Morning" required>
																		</li>
																		<li>
																			<label for="delivery_days_saturday_afternoon">Afternoon</label>
																			<input class="" name="delivery_days_saturday_afternoon"
																				id="delivery_days_saturday_afternoon" type="checkbox"
																				value="Afternoon" required>
																		</li>
																		<li>
																			<label for="delivery_days_saturday_evening">Evening</label>
																			<input class="" name="delivery_days_saturday_evening"
																				id="delivery_days_saturday_evening" type="checkbox"
																				value="Evening" required>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="card_bxfl">
											<a href="#" class="accordion-toggle">
												<h3>Insurance and agreements:</h3>
											</a>
											<div class="accordion-content">
												<p><strong>Confirm Insurance (proof to be uploaded within 30 days)</strong></p>
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<div class="form-group upload-insurance">
															<input class="box__file form-control" type="file" name="files" id="file"
																data-multiple-caption="{count} files selected" />
															<label for="file"><i
																	class="fa-solid fa-arrow-up-from-bracket"></i><strong>Click to
																	upload</strong><span class="box__dragndrop"> or drag and
																	drop</span>.</label>
														</div>
													</div>
													<div class="col-md-12 col-sm-12">
														<ul class="acflch_box">
															<li>

																<input class="" name="insurance_file_caption" id="insurance_file_caption"
																	type="checkbox" value="Yes">
																<label for="insurance_file_caption">Caption here</label>
															</li>
														</ul>
													</div>
													<div class="col-md-12 col-sm-12">
														<label><strong>Sign Vendor Agreement</strong></label>
														<ul class="acflch_box">
															<li> <label for="insurance_file_caption"><a
																		href="<?php echo esc_url(get_page_link(1576)); ?>"
																		target="_blank"><u>Vendor Agreement</u></a> - read and sign</label>
															</li>
															<li><label for="insurance_file_caption"><a
																		href="<?php echo esc_url(get_page_link(3)); ?>"
																		target="_blank"><u>Privacy Policy</u></a> - read and sign</label>
															</li>
														</ul>
														<ul class="acflch_box">
															<li><input class="" name="" id="" type="checkbox" value="Yes" /> I agree to
																update inventory as soon as it sells out</li>
															<li><input class="" name="" id="" type="checkbox" value="Yes" /> I agree to
																claim orders by the end of the business day they are received</li>
															<li><input class="" name="" id="" type="checkbox" value="Yes" /> I agree to
																deliver within 5 days of claiming order</li>
														</ul>
														<label><strong>Accept Florish Service Fee</strong></label>
														<ul class="acflch_box">
															<li><input class="" name="" id="" type="checkbox" value="Yes" /> Florish
																charges a nursery service fee of X% in your market</li>
															<li><input class="" name="" id="" type="checkbox" value="Yes" /> I accept
																checkbox</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<div class="card_bxfl">
											<a href="#" class="accordion-toggle">
												<h3>Your Inventory:</h3>
											</a>
											<div class="add_new_plants accordion-content">
												<div class="row">
													<?php
													$args = array(
														'posts_per_page' => -1,
														'post_type' => 'product',
														'orderby' => 'title',
														'order' => 'ASC',
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
															$user_avaliable_plant = get_user_meta(get_current_user_id(), '_avaliable_plant', true);
															$plant_id = get_the_ID();
															$product = wc_get_product($plant_id);
															$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
															$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
															if ($product->is_type('variable')) {
																$available_variations = $product->get_available_variations();
																//echo "<pre>"; print_r($available_variations);
																foreach ($available_variations as $available_variation) {
																	$pot_size_slug = $available_variation['attributes']['attribute_pa_nursery-pot-size'];
																	$varible_id = $available_variation['variation_id'];
																	$display_price = $available_variation['display_price'];
																	$pa_pot_size_ = 'pa_nursery-pot-size';
																	$pa_pot_size_meta = get_post_meta($available_variation['variation_id'], 'attribute_' . $pa_pot_size_, true);
																	$pa_pot_size_term = get_term_by('slug', $pa_pot_size_meta, $pa_pot_size_);
																	$pa_pot_size_term_name = $pa_pot_size_term->name;
																	//echo $pa_pot_size_term_name = $pa_pot_size_term->term_id;
																	$field_add = '_nursery_product_plant_variation_add_' . get_current_user_id();
																	$field_price = '_nursery_product_plant_variation_retail_price_' . get_current_user_id();
																	$field_status = '_nursery_product_plant_variation_status_' . get_current_user_id();

																	//update_post_meta( $varible_id, $field_status , '' );
																	$select_product_pot_status = get_post_meta($varible_id, $field_status, true);
																	$select_product_pot_add = get_post_meta($varible_id, $field_add, true);
																	$select_product_pot_size_price = get_post_meta($varible_id, $field_price, true);
																	if ($select_product_pot_add == 'Yes') {
																		//echo the_title().'  '.$pa_pot_size_term_name."<br>";
																		$currency_symbol = get_woocommerce_currency_symbol();
																		?>
																		<div class="col-lg-3 col-md-6 col-sm-12">
																			<div class="box">
																				<div class="img-block">
																					<?php if (has_post_thumbnail($plant_id)) { ?>
																						<img src="<?php echo $featured_img_url; ?>" alt="" />
																					<?php } else { ?>
																						<img
																							src="https://florishstaging.ideatosteer.com/wp-content/uploads/2023/09/SilversnakeProduct2-1.jpg"
																							alt="" />
																					<?php } ?>
																				</div>
																				<a class="title" href="<?php get_permalink($plant_id); ?>" terget="_blank">
																					<?php echo the_title() . '  ' . $pa_pot_size_term_name . ' (' . $currency_symbol . $select_product_pot_size_price . ')'; ?>
																				</a>
																				<div class="tog-btn">
																					<input type="checkbox" <?php if ($select_product_pot_status == 'Yes') { ?>checked<?php } ?> data-varible_id="<?php echo $varible_id; ?>"
																						class="variation-status" data-toggle="toggle" data-size="sm">
																				</div>
																				<a class="size add-more-size" data-id="<?php echo $plant_id; ?>"
																					href="javascript:void(0)">Add More Sizes</a>
																			</div>
																		</div>
																		<?php
																	}

																}
															}

														endwhile;
													endif;
													wp_reset_postdata();
													?>
													<div class="col-md-12 col-sm-12">
														<div class="form-group">
															<!-- <a href="#view-nursery-inventory-popup"  class="open-popup-link btn btn-primary">Add Plants +</a> -->
															<a href="javascript:void(0)" class="btn btn-primary add-nursery-plants">Add
																Plants +</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<!-- <div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label for="manager_delivery_radius_1">Sign Agreements: *</label>
												<div class="flex-pnl">
													 <div>
														  <input name="sign_agrements_1" id="sign_agrements_1" type="checkbox" value=""  required>
														  <label class="" for="sign_agrements_1">Click to sign Vendor Agreement 1</label>
													 </div>
													 <div>
														  <input name="sign_agrements_2" id="sign_agrements_2" type="checkbox" value="" required >
														  <label class="" for="sign_agrements_2">Click to sign Vendor Agreement 2</label>
													 </div>
													 <div>
														  <input name="sign_agrements_3" id="sign_agrements_3" type="checkbox" value=""  required>
														  <label class="" for="sign_agrements_3">Click to sign Vendor Agreement 3</label>
													 </div>
												</div>

											</div>
											</div> -->
											<div class="col-md-2 col-sm-6">
												<button type="submit" name="submit" class="sub-field sub-info-btn">Submit</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
				</form>
			<?php } ?>
			<?php if ($inventory_sumbit_status == 1 && $stage_status == 1) { ?>
				<h4>Your information is being reviewed, Please closely monitor your email address on file for new
					orders!
				</h4>
			<?php } ?>
			<?php if ($inventory_sumbit_status == 1 && $stage_status == 2) { ?>
				<!-- <h4>Congratulations, you are now live on Florish!  Here is the link to your Florish Dashboard where you will manage your orders, view payment statuses, adjust inventory, and more!</h4> -->
				<h4><u>Welcome to the Florish Nursery Dashboard. Control your inventory below:</u></h4>
				<div class="add_new_plants">
					<div class="row">
						<?php
						$args = array(
							'posts_per_page' => -1,
							'post_type' => 'product',
							'orderby' => 'title',
							'order' => 'ASC',
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
								$user_avaliable_plant = get_user_meta(get_current_user_id(), '_avaliable_plant', true);
								$plant_id = get_the_ID();
								$product = wc_get_product($plant_id);
								$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
								$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
								if ($product->is_type('variable')) {
									$available_variations = $product->get_available_variations();
									//echo "<pre>"; print_r($available_variations);
									foreach ($available_variations as $available_variation) {
										$pot_size_slug = $available_variation['attributes']['attribute_pa_nursery-pot-size'];
										$varible_id = $available_variation['variation_id'];
										$display_price = $available_variation['display_price'];
										$pa_pot_size_ = 'pa_nursery-pot-size';
										$pa_pot_size_meta = get_post_meta($available_variation['variation_id'], 'attribute_' . $pa_pot_size_, true);
										$pa_pot_size_term = get_term_by('slug', $pa_pot_size_meta, $pa_pot_size_);
										$pa_pot_size_term_name = $pa_pot_size_term->name;
										//echo $pa_pot_size_term_name = $pa_pot_size_term->term_id;
										$field_status = '_nursery_product_plant_variation_status_' . get_current_user_id();
										$field_price = '_nursery_product_plant_variation_retail_price_' . get_current_user_id();

										//update_post_meta( $varible_id, $field_status , '' );
										$select_product_pot_size = get_post_meta($varible_id, $field_status, true);
										$select_product_pot_size_price = get_post_meta($varible_id, $field_price, true);
										if ($select_product_pot_size == 'Yes') {
											//echo the_title().'  '.$pa_pot_size_term_name."<br>";
											$currency_symbol = get_woocommerce_currency_symbol();
											?>
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="box">
													<div class="img-block">
														<?php if (has_post_thumbnail($plant_id)) { ?>
															<img src="<?php echo $featured_img_url; ?>" alt="" />
														<?php } else { ?>
															<img
																src="https://florishstaging.ideatosteer.com/wp-content/uploads/2023/09/SilversnakeProduct2-1.jpg"
																alt="" />
														<?php } ?>
													</div>
													<a class="title" href="<?php get_permalink($plant_id); ?>" terget="_blank">
														<?php echo the_title() . '  ' . $pa_pot_size_term_name . ' (' . $currency_symbol . $select_product_pot_size_price . ')'; ?>
													</a>
													<div class="tog-btn">
														<input type="checkbox" checked data-toggle="toggle" data-size="sm">
													</div>
													<a class="size add-more-size" data-id="<?php echo $plant_id; ?>" href="javascript:void(0)">Add More
														Sizes</a>
												</div>
											</div>
											<?php
										}

									}
								}

							endwhile;
						endif;
						wp_reset_postdata();
						?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
</div>

<?php get_template_part('components/sections/faq') ?>

<?php get_footer(); ?>
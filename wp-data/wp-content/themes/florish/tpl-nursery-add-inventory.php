<?php /* Template Name: Add Inventory Nursery */ ?>
<?php
   // $current_user = wp_get_current_user();
   // if ( !wc_user_has_role( $current_user, 'nursery' )){
   //   wp_safe_redirect(home_url());
   // }
   $user_id = get_current_user_id();
   $status = get_user_meta( $user_id, '_member_status', true );
   $inventory_sumbit_status = get_user_meta( $user_id, '_inventory_sumbit_status', true );
   $stage_status = get_user_meta( $user_id, '_stage_status', true );
   
   ?>
<?php get_header(); ?>
<div class="flo-step-pnl">
   <div class="container">
      <div class="inn">
         <div class="top">
            <?php if($status == 'active' && $stage_status >= 1){?>
            <h2>Congratulations you have been approved <span>to become a Florish Nursery Partner.</span></h2>
            <p>Congratulations you have been approved to become a Florish Nursery Partner. Please Compleate your
               business information select your inventory from the list below ,Connect your bank account and sign
               the nursery partner Agreement.
            </p>
            <?php }else{ ?>
            <h2>Thank you for applying to become <span>a part of our marketplace</span></h2>
            <p>Here’s what you can expect next...</p>
            <?php } ?>
         </div>
         <div class="btm">
            <ul class="step-ul">
               <li class="active"><span>1</span>Submit Application</li>
               <li <?php if($status == 'active' && $stage_status >= 1){?> class="active" <?php } ?>>
                  <span>2</span>Florish Initial Review
               </li>
               <li <?php if($status == 'active' && $inventory_sumbit_status == 1 && $stage_status == 2){?>
                  class="active" <?php } ?>><span>3</span>Confirm Inventory + Delivery</li>
               <li <?php if($status == 'active' && $inventory_sumbit_status == 1 && $stage_status == 2){?>
                  class="active" <?php } ?>><span>4</span>Sign Agreements</li>
               <li <?php if($status == 'active' && $inventory_sumbit_status == 1 && $stage_status == 2){?>
                  class="active" <?php } ?>><span>5</span>Go Live!</li>
            </ul>
            <?php if ( is_user_logged_in() &&  $status == 'active' &&  $inventory_sumbit_status == '' && $stage_status == 1) { ?>
            <form action="" id="NurseryInventoryForm" method="post" enctype="multipart/form-data"
               novalidate="novalidate">
               <div class="tab-content">
                  <div class="fl-box">
                     <div class="form-wrap">
                        <div class="controls">
                           <div class="card_bxfl">
                              <a href="#" class="accordion-toggle">
                                 <h3>Your Information:</h3>
                              </a>
                              <div class="accordion-content">
                                 <p>indicates required fields
                                    <span class="gfield_required gfield_required_asterisk">*</span>
                                 </p>
                                 <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                       <div class="form-group">
                                          <label for="account_owner_name">Account Owner Name *</label>
                                          <input id="account_owner_name" type="text" name="account_owner_name"
                                             class="form-control" placeholder="Account Owner Name *" required>
                                       </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                       <?php
                                          $owner_email = get_user_meta( get_current_user_id(), '_account_owner_email', true ); 
                                          if(empty($owner_email)){
                                           $current_user = wp_get_current_user();
                                           $owner_email = $current_user->user_email;
                                          }
                                          ?>
                                       <div class="form-group">
                                          <label for="account_owner_email">Email *</label>
                                          <input id="account_owner_email" type="email" name="account_owner_email"
                                             class="form-control" placeholder="Account Owner email *"
                                             value="<?php echo $owner_email; ?>" required>
                                       </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                       <div class="form-group">
                                          <label for="account_owner_phone">Phone *</label>
                                          <input id="account_owner_phone" type="text" name="account_owner_phone"
                                             class="form-control" placeholder="Account Owner phone number *"
                                             required>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <label for="corporate_entity_name">Corporate Entity Name *</label>
                                          <input id="corporate_entity_name" type="text"
                                             name="corporate_entity_name" class="form-control"
                                             placeholder="Corporate Entity Name *" required>
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
                                 </div>
                              </div>
                           </div>
                           <div class="card_bxfl">
                              <a href="#" class="accordion-toggle">
                                 <h3>Location Manager Contact Info:</h3>
                              </a>
                              <div class="accordion-content">
                                 <p>indicates required fields
                                    <span class="gfield_required gfield_required_asterisk">*</span>
                                 </p>
                                 <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                       <div class="form-group">
                                          <label for="manager_full_name">Full Name *</label>
                                          <input id="manager_full_name" type="text" name="manager_full_name_1"
                                             class="form-control" placeholder="Full Name *" required>
                                       </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                       <div class="form-group">
                                          <label for="manager_email">Email Address *</label>
                                          <input id="manager_email" type="email" name="manager_email_1"
                                             class="form-control" placeholder="Email Address *" required>
                                       </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                       <div class="form-group">
                                          <label for="manager_phone_number_1">Phone Number *</label>
                                          <input id="manager_phone_number_1" type="text"
                                             name="manager_phone_number_1" class="form-control"
                                             placeholder="Phone Number *" required>
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <label for="manager_location_1">Location Address *</label>
                                          <?php
                                             $user_location = get_user_meta( get_current_user_id(), 'user_location', true ); 
                                             $user_location_lat = get_user_meta( get_current_user_id(), 'user_location_lat', true ); 
                                             $user_location_long = get_user_meta( get_current_user_id(), 'user_location_long', true ); 
                                             ?>
                                          <input id="manager_location_1" type="text" name="manager_location_1"
                                             value="<?php echo $user_location; ?>" class="form-control"
                                             placeholder="Location Address *" required>
                                          <input type="hidden" id="manager_location_lat_1"
                                             name="manager_location_lat_1"
                                             value="<?php echo $user_location_lat; ?>">
                                          <input type="hidden" id="manager_location_long_1"
                                             name="manager_location_long_1"
                                             value="<?php echo $user_location_long; ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
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
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card_bxfl">
                              <a href="#" class="accordion-toggle">
                                 <h3>Select Delivery Days:</h3>
                              </a>
                              <div class="accordion-content">
                                 <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                       <div class="form-group">
                                          <!-- <label for="manager_delivery_days_1">Select Delivery Days *</label> -->
                                          <div class="gfield_checkbox" id="input_9_18">
                                             <div class="gchoice gchoice_9_18_1">
                                                <input class="form-control require-one"
                                                   name="input_delivery_days_1[]" type="checkbox"
                                                   value="Sunday" id="choice_9_18_1" required>
                                                <label for="choice_9_18_1" id="label_9_18_1"
                                                   class="gform-field-label gform-field-label--type-inline">Sunday</label>
                                             </div>
                                             <div class="gchoice gchoice_9_18_2">
                                                <input class="form-control require-one"
                                                   name="input_delivery_days_1[]" type="checkbox"
                                                   value="Monday" id="choice_9_18_2" required>
                                                <label for="choice_9_18_2" id="label_9_18_2"
                                                   class="gform-field-label gform-field-label--type-inline">Monday</label>
                                             </div>
                                             <div class="gchoice gchoice_9_18_3">
                                                <input class="form-control require-one"
                                                   name="input_delivery_days_1[]" type="checkbox"
                                                   value="Tuesday" id="choice_9_18_3" required>
                                                <label for="choice_9_18_3" id="label_9_18_3"
                                                   class="gform-field-label gform-field-label--type-inline">Tuesday</label>
                                             </div>
                                             <div class="gchoice gchoice_9_18_4">
                                                <input class="form-control require-one"
                                                   name="input_delivery_days_1[]" type="checkbox"
                                                   value="Wednesday" id="choice_9_18_4" required>
                                                <label for="choice_9_18_4" id="label_9_18_4"
                                                   class="gform-field-label gform-field-label--type-inline">Wednesday</label>
                                             </div>
                                             <div class="gchoice gchoice_9_18_5">
                                                <input class="form-control require-one"
                                                   name="input_delivery_days_1[]" type="checkbox"
                                                   value="Thursday" id="choice_9_18_5" required>
                                                <label for="choice_9_18_5" id="label_9_18_5"
                                                   class="gform-field-label gform-field-label--type-inline">Thursday</label>
                                             </div>
                                             <div class="gchoice gchoice_9_18_6">
                                                <input class="form-control require-one"
                                                   name="input_delivery_days_1[]" type="checkbox"
                                                   value="Friday" id="choice_9_18_6" required>
                                                <label for="choice_9_18_6" id="label_9_18_6"
                                                   class="gform-field-label gform-field-label--type-inline">Friday</label>
                                             </div>
                                             <div class="gchoice gchoice_9_18_7">
                                                <input class="form-control require-one"
                                                   name="input_delivery_days_1[]" type="checkbox"
                                                   value="Saturday" id="choice_9_18_7" required>
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
                                                <div class="row align-items-center">
                                                   <div class="col-md-6 col-sm-12">
                                                      <div class="form-group">
                                                         <label for="choice_sun">Start Time</label>
                                                         <input class="form-control"
                                                            name="delivery_days_sunday_start_time" type="time"
                                                            value="08:00" required>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6 col-sm-12">
                                                      <div class="form-group">
                                                         <label for="choice_sun">End Time</label>
                                                         <input class="form-control"
                                                            name="delivery_days_sunday_end_time" type="time"
                                                            value="17:00" required>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="days monday-div">
                                             <a href="#" class="accordion-toggle">
                                                <h4>Monday</h4>
                                             </a>
                                             <div class="accordion-content">
                                                <div class="row align-items-center">
                                                   <div class="col-md-6 col-sm-12">
                                                      <div class="form-group">
                                                         <label for="choice_sun">Start Time</label>
                                                         <input class="form-control"
                                                            name="delivery_days_monday_start_time" type="time"
                                                            value="08:00" required>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6 col-sm-12">
                                                      <div class="form-group">
                                                         <label for="choice_sun">End Time</label>
                                                         <input class="form-control"
                                                            name="delivery_days_monday_end_time" type="time"
                                                            value="17:00" required>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="days tuesday-div">
                                             <a href="#" class="accordion-toggle">
                                                <h4>Tuesday</h4>
                                             </a>
                                             <div class="accordion-content">
                                                <div class="row align-items-center">
                                                   <div class="col-md-6 col-sm-12">
                                                      <div class="form-group">
                                                         <label for="choice_sun">Start Time</label>
                                                         <input class="form-control"
                                                            name="delivery_days_tuesday_start_time" type="time"
                                                            value="08:00" required>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6 col-sm-12">
                                                      <div class="form-group">
                                                         <label for="choice_sun">End Time</label>
                                                         <input class="form-control"
                                                            name="delivery_days_tuesday_end_time" type="time"
                                                            value="17:00" required>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="days wednesday-div">
                                             <a href="#" class="accordion-toggle">
                                                <h4>Wednesday</h4>
                                             </a>
                                             <div class="accordion-content">
                                                <div class="row align-items-center">
                                                   <div class="col-md-6 col-sm-12">
                                                      <div class="form-group">
                                                         <label for="choice_sun">Start Time</label>
                                                         <input class="form-control"
                                                            name="delivery_days_wednesday_start_time"
                                                            type="time" value="08:00" required>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6 col-sm-12">
                                                      <div class="form-group">
                                                         <label for="choice_sun">End Time</label>
                                                         <input class="form-control"
                                                            name="delivery_days_wednesday_end_time" type="time"
                                                            value="17:00" required>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="days thursday-div">
                                             <a href="#" class="accordion-toggle">
                                                <h4>Thursday</h4>
                                             </a>
                                             <div class="accordion-content">
                                                <div class="row align-items-center">
                                                   <div class="col-md-6 col-sm-12">
                                                      <div class="form-group">
                                                         <label for="choice_sun">Start Time</label>
                                                         <input class="form-control"
                                                            name="delivery_days_thursday_start_time" type="time"
                                                            value="08:00" required>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6 col-sm-12">
                                                      <div class="form-group">
                                                         <label for="choice_sun">End Time</label>
                                                         <input class="form-control"
                                                            name="delivery_days_thursday_end_time" type="time"
                                                            value="17:00" required>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="days friday-div">
                                             <a href="#" class="accordion-toggle">
                                                <h4>Friday</h4>
                                             </a>
                                             <div class="accordion-content">
                                                <div class="row align-items-center">
                                                   <div class="col-md-6 col-sm-12">
                                                      <div class="form-group">
                                                         <label for="choice_sun">Start Time</label>
                                                         <input class="form-control"
                                                            name="delivery_days_friday_start_time" type="time"
                                                            value="08:00" required>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6 col-sm-12">
                                                      <div class="form-group">
                                                         <label for="choice_sun">End Time</label>
                                                         <input class="form-control"
                                                            name="delivery_days_friday_end_time" type="time"
                                                            value="17:00" required>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="days saturday-div">
                                             <a href="#" class="accordion-toggle">
                                                <h4>Saturday</h4>
                                             </a>
                                             <div class="accordion-content">
                                                <div class="row align-items-center">
                                                   <div class="col-md-6 col-sm-12">
                                                      <div class="form-group">
                                                         <label for="choice_sun">Start Time</label>
                                                         <input class="form-control"
                                                            name="delivery_days_saturday_start_time" type="time"
                                                            value="08:00" required>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6 col-sm-12">
                                                      <div class="form-group">
                                                         <label for="choice_sun">End Time</label>
                                                         <input class="form-control"
                                                            name="delivery_days_saturday_end_time" type="time"
                                                            value="17:00" required>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
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
                                           $products = new WP_Query( $args );
                                           if($products->have_posts()) : 
                                           while ( $products->have_posts() ) : $products->the_post();
                                           $user_avaliable_plant = get_user_meta( get_current_user_id(), '_avaliable_plant', true );
                                           $plant_id = get_the_ID();
                                           $product = wc_get_product($plant_id);
                                           $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                                           $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID() ), 'single-post-thumbnail' );
                                           if ( $product->is_type( 'variable' ) ) {
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
                                               $field_add = '_nursery_product_plant_variation_add_'.get_current_user_id();
                                               $field_price = '_nursery_product_plant_variation_retail_price_'.get_current_user_id();
                                               $field_status = '_nursery_product_plant_variation_status_'.get_current_user_id();
                                       
                                               //update_post_meta( $varible_id, $field_status , '' );
                                               $select_product_pot_status = get_post_meta( $varible_id, $field_status, true );
                                               $select_product_pot_add = get_post_meta( $varible_id, $field_add, true );
                                               $select_product_pot_size_price = get_post_meta( $varible_id, $field_price, true );
                                               if($select_product_pot_add == 'Yes'){
                                                   //echo the_title().'  '.$pa_pot_size_term_name."<br>";
                                                   $currency_symbol =  get_woocommerce_currency_symbol();
                                           ?>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                       <div class="box">
                                          <div class="img-block">
                                             <?php if (has_post_thumbnail($plant_id ) ){ ?>
                                             <img src="<?php echo $featured_img_url; ?>" alt="" />
                                             <?php }else{ ?>
                                             <img src="https://florishstaging.ideatosteer.com/wp-content/uploads/2023/09/SilversnakeProduct2-1.jpg"
                                                alt="" />
                                             <?php } ?>
                                          </div>
                                          <a class="title" href="<?php get_permalink( $plant_id );?>"
                                             terget="_blank"><?php echo the_title().'  '.$pa_pot_size_term_name.' ('.$currency_symbol.$select_product_pot_size_price.')'; ?></a>
                                          <div class="tog-btn">
                                             <input type="checkbox"
                                                <?php if($select_product_pot_status == 'Yes'){ ?>checked<?php } ?>
                                                data-varible_id="<?php echo $varible_id;?>"
                                                class="variation-status" data-toggle="toggle"
                                                data-size="sm">
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
                                          <a href="javascript:void(0)"
                                             class="btn btn-primary add-nursery-plants">Add Plants +</a>
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
                                 <button type="submit" name="submit"
                                    class="sub-field sub-info-btn">Submit</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
         </form>
         <?php } ?>
         <?php if($inventory_sumbit_status == 1 && $stage_status == 1){ ?>
         <h4>Your information is being reviewed, Please closely monitor your email address on file for new
            orders!
         </h4>
         <?php } ?>
         <?php if($inventory_sumbit_status == 1 && $stage_status == 2){ ?>
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
                    $products = new WP_Query( $args );
                    if($products->have_posts()) : 
                    while ( $products->have_posts() ) : $products->the_post();
                    $user_avaliable_plant = get_user_meta( get_current_user_id(), '_avaliable_plant', true );
                    $plant_id = get_the_ID();
                    $product = wc_get_product($plant_id);
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID() ), 'single-post-thumbnail' );
                    if ( $product->is_type( 'variable' ) ) {
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
                        $field_status = '_nursery_product_plant_variation_status_'.get_current_user_id();
                        $field_price = '_nursery_product_plant_variation_retail_price_'.get_current_user_id();
                  
                        //update_post_meta( $varible_id, $field_status , '' );
                        $select_product_pot_size = get_post_meta( $varible_id, $field_status, true );
                        $select_product_pot_size_price = get_post_meta( $varible_id, $field_price, true );
                        if($select_product_pot_size == 'Yes'){
                            //echo the_title().'  '.$pa_pot_size_term_name."<br>";
                            $currency_symbol =  get_woocommerce_currency_symbol();
                    ?>
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="box">
                     <div class="img-block">
                        <?php if (has_post_thumbnail($plant_id ) ){ ?>
                        <img src="<?php echo $featured_img_url; ?>" alt="" />
                        <?php }else{ ?>
                        <img src="https://florishstaging.ideatosteer.com/wp-content/uploads/2023/09/SilversnakeProduct2-1.jpg"
                           alt="" />
                        <?php } ?>
                     </div>
                     <a class="title" href="<?php get_permalink( $plant_id );?>"
                        terget="_blank"><?php echo the_title().'  '.$pa_pot_size_term_name.' ('.$currency_symbol.$select_product_pot_size_price.')'; ?></a>
                     <div class="tog-btn">
                        <input type="checkbox" checked data-toggle="toggle" data-size="sm">
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
            </div>
         </div>
         <?php } ?>
      </div>
   </div>
</div>
</div>
<div class="faq">
   <div class="container">
      <h3>Frequently asked questions</h3>
      <div class="accordion" id="accordionExample">
         <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
               <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
               What is the process to become a Florish Nursery Partner?
               </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
               data-bs-parent="#accordionExample">
               <div class="accordion-body">
                  <ul>
                     <li>
                        <p>Complete initial application on Florish.co/NurseryPartner</p>
                     </li>
                     <li>
                        <p>Florish will approve or deny your application.</p>
                     </li>
                     <li>
                        <p>Review our curated list of plants; select which plants and sizes you wish to offer on
                           the Florish Marketplace
                           Complete your profile.
                        </p>
                     </li>
                     <li>
                        <p>Florish will make one final approval step and set your nursery to be live on the
                           Florish Marketplace!
                        </p>
                     </li>
                  </ul>
                  <p><strong>Note:</strong> you will have the opportunity to schedule a call with our team at
                     every step in this process.
                  </p>
               </div>
            </div>
         </div>
         <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
               How do delivery fees work?
               </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
               data-bs-parent="#accordionExample">
               <div class="accordion-body">
                  <p>Florish maintains different delivery tiers, depending on geographical location and regional
                     density. We measure between your location and the customer's delivery address which go into
                     3 tiers; tier 1 (0-4.99 miles), tier 2 (0-9.99 miles) and tier 3 (0-15). Upon onboarding,
                     you can review the specific rates for your region, which are paid through to Nursery
                     Partners.
                  </p>
               </div>
            </div>
         </div>
         <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
               We only want to do deliveries inside of 5 miles, is that possible?
               </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
               data-bs-parent="#accordionExample">
               <div class="accordion-body">
                  <p> Yes, you select the delivery radius you're comfortable with.</p>
               </div>
            </div>
         </div>
         <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
               Are there any fees to be a nursery partner? Do we have to manage our inventory?
               </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
               data-bs-parent="#accordionExample">
               <div class="accordion-body">
                  <p> There are no fees to have an account, it’s free. Florish has set pricing we pay through to
                     you for each item/size you fulfill, which you will see and confirm during on-boarding. We do
                     need your assistance during the onboarding process, which is usually a 30-minute process --
                     after that you only need to confirm and deliver orders in the Florish vendor portal. If you
                     wish to discontinue an item or ran out of stock, you will be able to reflect that in your
                     vendor portal (immediate action must be taken unless you will replenish inside your delivery
                     window).
                  </p>
               </div>
            </div>
         </div>
         <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
               Can you walk through an example of a typical order process?
               </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
               data-bs-parent="#accordionExample">
               <div class="accordion-body">
                  <p> A customer comes to the Florish Marketplace. They are located within your delivery radius.
                     They are then paired to your nursery and can shop from all the plants you've elected to
                     fulfill through Florish. They purchase a variety of plants and sizes. We notify you of the
                     order (via email and through our vendor portal) - you claim the order (on same business day)
                     by setting the delivery date (delivery within 5 days). You prepare and deliver the order,
                     mark as "delivered", and the funds are deposited to your bank account on file.
                  </p>
               </div>
            </div>
         </div>
         <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
               Can Florish run sales or promotions? How does that impact the revenue our nursery receives?
               </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
               data-bs-parent="#accordionExample">
               <div class="accordion-body">
                  <p> Yes, Florish can run sales or promotions. No, that will not impact what you receive. If you
                     agree to fulfill a particular item for $90, you will receive $90 for every one you deliver,
                     regardless of it's Florish Retail Price.
                  </p>
               </div>
            </div>
         </div>
      </div>
      <div class="schedule-call">
         <a href="#">Sehedule a call</a>
      </div>
   </div>
</div>
<?php get_footer(); ?>

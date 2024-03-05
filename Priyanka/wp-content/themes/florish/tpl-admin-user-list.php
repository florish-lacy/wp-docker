<?php /* Template Name: Admin User List */ ?>

<?php get_header(); ?>

<div class="nursery-dash cmn-gap">
    <div class="container-fluid">
        <?php if (  current_user_can( 'manage_options' ) && is_user_logged_in() ) { ?>
            <div class="admin-vendor-title">
            <h3><?php the_field('banner_title'); ?></h3>
            </div>
            <span class="response_messages"></span>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#vendor" type="button" role="tab" aria-controls="vendor" aria-selected="true">Vendors</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false">Orders</button>
            </li>
            
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#markets" type="button" role="tab" aria-controls="markets" aria-selected="false">Manage Markets</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#create-markets" type="button" role="tab" aria-controls="create-markets" aria-selected="false">Create Markets</button>
            </li>
            <!-- <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#others" type="button" role="tab" aria-controls="others" aria-selected="false">Finance</button>
            </li> -->
            </ul>



            <div class="tab-content">
                <div class="tab-pane fade show active" id="vendor" role="tabpanel" aria-labelledby="vendor-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <!-- <th>Status</th> -->
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $users = get_users(  
                            array( 'orderby' => 'ID', 'order'   => 'DESC','role__in' => array(  'nursery' ) ) 
                            );
                            
                            foreach ( $users as $user )
                            {
                                $user_id = $user->ID;
                                $status = get_user_meta( $user_id, '_member_status', true );
                                $code = get_user_meta( $user_id, 'code_to_be_activated', true );
                                $stage_status = get_user_meta( $user_id, '_stage_status', true );

                            ?>
                                <tr>
                                    <td><?php echo esc_html( $user->first_name ); ?>
                                    <?php if($status == 'active'){ ?>
                                    <span class="text-success">Active</span>
                                    <?php } else { ?>
                                    <span class="text-danger">Inactive</span>
                                    <?php } ?>
                                </td>
                                    <td><?php echo esc_html( $user->user_email ); ?></td>
                                    <td><?php echo esc_html( $user->billing_phone ); ?> </td>
                                    <td>
                                    <select  name="reg_stage_status" class="form-control reg_stage_status" >
                                            <option value="" data-userid="<?php echo $user_id; ?>" >Select Status</option>
											<option value="1" data-userid="<?php echo $user_id; ?>" <?php if($status == 'active' && $stage_status == 1 ){ ?>Selected<?php } ?>>Approve Stage 1</option>
                                            <option value="2"  data-userid="<?php echo $user_id; ?>" <?php if($status == 'active' && $stage_status == 2 ){ ?>Selected<?php } ?> >Approve Stage 2</option>
                                            <option value="11"  data-userid="<?php echo $user_id; ?>" <?php if($status == 'active' && $stage_status == 11 ){ ?>Selected<?php } ?> >Decline Stage 1</option>
                                            <option value="22"  data-userid="<?php echo $user_id; ?>" <?php if($status == 'active' && $stage_status == 22 ){ ?>Selected<?php } ?>>Decline Stage 2</option>
                                            <option value="inactive" data-userid="<?php echo $user_id; ?>" <?php if($status == 'inactive' ){ ?>Selected<?php } ?> >Deactivate Vendor</option>
				                    </select>
                                    </td>
                                    <!-- <td>
                                        <?php if( empty($code) && $status == ''){ ?>
                                        <a href="<?php echo site_url();?>?userid=<?php echo $user_id; ?>&in_status=accept"
                                            class="btn btn-warning">Accept</a>
                                    <a href="<?php echo site_url();?>?userid=<?php echo $user_id; ?>&in_status=decline"
                                            class="btn btn-info">Decline</a>
                                        <?php } else {  ?>
                                            <?php if($status == 'inactive'){ ?>
                                            <a href="<?php echo site_url();?>?userid=<?php echo $user_id; ?>&in_status=active"
                                            class="btn btn-warning">Approved</a>
                                            <?php } ?>
                                            <?php if($status == 'active'){ ?>
                                            <a href="<?php echo site_url();?>?userid=<?php echo $user_id; ?>&in_status=inactive"
                                            class="btn btn-danger">Decline</a>
                                            <?php } ?>
                                        <?php } ?>
                                    </td> -->
                                    <td><a  data-userid="<?php echo $user_id; ?>" class="open-popup-link btn btn-primary view_nur_id">View</a></td>
                                </tr>
                                <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    <?php //echo do_shortcode('[my_orders order_counts="-1"]'); ?>
                    <div class="table-responsive">
                     <table class="table">
                        <thead>
                           <tr>
                              <th>Order ID</th>
                              <th>Status</th>
                              <th>Customer name</th>
                              <th>Date</th>
                              <th>Address</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                          <?php  
                           $orders = wc_get_orders( array(
                              'numberposts' => -1,
                              //'status' => 'completed',
                            //   'meta_key'     => '_assign_order',
                            //   'meta_compare' => '=',
                            //   'meta_value'   => get_current_user_id(),
                              ) );
                           //echo "<pre>"; print_r($orders);
                           foreach( $orders as $order ){ 
                              $order_status = $order->get_status();
                              $order_id = $order->get_id();
                           ?>
                           <tr>
                              <td>#<?php echo $order->get_id(); ?></td>
                              <td>
                              <?php if($order_status == 'on-hold'){ ?>
                              <a href="javascript:void(0)" >On-Hold</a>
                              <?php } ?>
                              <?php if($order_status == 'processing'){ ?>
                              <a href="javascript:void(0)"  >Processing</a>
                              <?php } ?>
                              <?php if($order_status == 'completed'){ ?>
                              <a href="javascript:void(0)" >Completed</a>
                              <?php } ?>
                              <?php if($order_status == 'cancelled'){ ?>
                              <a href="javascript:void(0)"  >Cancelled</a>
                              <?php } ?>
                              </td>
                              <td><?php echo $order->get_billing_first_name()." ".$order->get_billing_last_name(); ?></td>
                              <td><?php echo date('F j, Y',strtotime($order->get_date_created())); //, g:i:s A T ?></td>
                              <td><?php echo get_post_meta( $order_id, 'billing_customer_location', true ); ?></td>
                              <td><button type="button" class="btn btn-primary view_nur_qty" data-orderid="<?php echo $order->get_id(); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal1">View</button></td>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
                </div>

                <div class="tab-pane fade" id="markets" role="tabpanel" aria-labelledby="markets-tab">
                    <div class="manage-mrkt-wrap">
                        <h3>All Markets</h3>


                        <div class="row nflmrkt_bx">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="inn">
                                 <?php
                                    global $wpdb;
                                    $tablename = $wpdb->prefix."nurser_market_table";
                                    $market_table = $wpdb->get_results("SELECT * FROM $tablename ORDER BY id DESC", ARRAY_A);
                                    if(count($market_table) > 0){
                                        foreach($market_table as $market_list){
                                            $market_name = $market_list['market_name'];
                                            $market_id = $market_list['id'];
                                            $location_lat2 = $market_list['latitude'];
                                            $location_long2 = $market_list['longitude'];
                                            $miles = $market_list['miles'];
                                            $nurser_count = $market_list['nurser_count'];
                                            $full_address = $market_list['full_address'];
                                            $take_rate = $market_list['take_rate'];
                                    ?>
                                    <div class="box get-market-nursery-list" data-lat="<?php echo $location_lat2; ?>" data-long="<?php echo $location_long2; ?>" data-miles="<?php echo $miles; ?>"data-takerate="<?php echo $take_rate; ?>" data-marketid="<?php echo $market_id; ?>" data-name="<?php echo $market_name; ?>">
                                        <h3><?php echo $market_list['market_name']; ?></h3>
                                        <h4><i class="fa-solid fa-tree"></i>  <?php echo $nurser_count; ?> Nurseries</h4>
                                        <h4><i class="fa-solid fa-location-dot"></i> <?php echo $full_address; ?></h4>
                                        <a class="edit-btn market-edit"  href="JavaScript:void(0)" data-id="<?php echo $market_id; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </div>
                                    <?php } } ?>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                              <div class="accordion-info" id="market_nursery">
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="create-markets" role="tabpanel" aria-labelledby="create-markets-tab">
                    <div class="market-box">
                        <div class="right-wrap">
                            <div id="map"></div>
                            <div id="infowindow-content">
                            <img src="" width="16" height="16" id="place-icon">
                            <span id="place-name"  class="title"></span><br>
                            <span id="place-address"></span>
                            </div>
                            <div class="left-wrap">
                            <h2>+ Create New Market</h2>
                            <form method="post" action="" id="AddMarkets" novalidate="novalidate">
                                <input type="hidden"  id="latitude" name="latitude" />
                                <input type="hidden"  id="longitude" name="longitude" />
                                <input type="hidden"  id="fulladdress" name="fulladdress" />
                                <input type="hidden"  id="zipcode" name="zipcode" />
                                <div class="input-fld">
                                    <label>Market name:</label>
                                    <div class="input-control">
                                    <input type="text" name="market_name" id="market_name" class="form-control" required />
                                    <span class="name-field-error" id="field-error"></span>
                                    </div>
                                </div>
                                <div class="input-fld">
                                    <label>Radius (miles):</label>
                                    <div class="input-control">
                                    <input type="number" name="radious_miles" id="radious_miles" class="form-control" value="10" />
                                    <span  class="name-field-error" id="miles-field-error"></span>
                                    </div>
                                </div>
                                <div class="input-fld">
                                    <label>Take Rate (%):</label>
                                    <div class="input-control">
                                    <input type="number" name="take_rate" id="take_rate" class="form-control" value="5" />
                                    <span  class="name-field-error" id="rate-field-error"></span>
                                    </div>
                                </div>

                                <div class="input-fld" id="pac-card">
                                    <label>Set center pin:</label>
                                    <div id="input-control" class="input-control">
                                        <input id="pac-input" class="controls form-control" type="text" placeholder="Enter a location">
                                        <div id="location-error" class="name-field-error"></div>
                                    </div>
                                </div>
                                <div class="input-fld">
                                    <input type="range" class="field"  id="radius" name="radius" min="0" max="100" value="10" onchange="updateRadius()">
                                </div>
                                <div class="submit-fld">
                                    <button name="added_market" id="added_market" type="hidden" ></button>
                                    <a href="JavaScript:void(0)" id="save_market">Save</a>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                
            </div>





        <?php }else{ ?>
         <?php echo '<div style="text-align: center">Please login your admin panels view users list.</div>'; ?>
        <?php } ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="mdl-cus-content">
           
         </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>

<?php get_footer(); ?>
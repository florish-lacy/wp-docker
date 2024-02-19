<?php /* Template Name: Nursery Dashboard */ ?>
<?php
$current_user = wp_get_current_user();
if ( !wc_user_has_role( $current_user, 'nursery' )){
  wp_safe_redirect(home_url());
}
?>
<?php get_header(); ?>

<div class="nursery-dash cmn-gap">
   <div class="container">
      <div class="inn">
         <div class="lt-side">
            <div class="author">
               <div class="user">
                  <?php 
                  $get_author_id = get_the_author_meta('ID');
                  //$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 450));
                  $get_author_gravatar = get_avatar_url($current_user->ID);
                  ?>
                  <?php if($get_author_gravatar){ ?>
                  <img src="<?php echo $get_author_gravatar; ?>" alt="" />
                  <?php }else{ ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.png" alt="" />
                  <?php } ?>
                 
               </div>
               <h5><?php echo $current_user->user_firstname; ?> </h5>
               <a class="user-email" href="mailto:<?php echo $current_user->user_email; ?>"><?php echo $current_user->user_email; ?></a>
               <a class="logout" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
            </div>
            <a class="edit-profile" href="<?php echo esc_url( get_page_link( 219 ) ); ?>"><i class="fa-solid fa-pen"></i></a>
            <div class="side-menu">
               <ul class="tabs">
                  <li><a href="#tabs1" class="cl_tab active"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/dash-icn1.svg" alt="" /> Add Plant</a></li>
                  <li><a href="#tabs2" class="cl_tab"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/dash-icn2.svg" alt="" /> Order List</a></li>
               </ul>
            </div>
         </div>
         <div class="rt-side">
            <div class="order">
               <div class="box">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pending-img.png" alt="" />
                  <div class="text">
                     <h6>Orders pending</h6>
                     <div class="btns">
                        <ul>
                           <li>
                              <?php 
                              $orders_hold = wc_get_orders(array(
                                 'limit'=>-1,
                                 'type'=> 'shop_order',
                                 'status'=> array( 'wc-on-hold','wc-pending'  ),
                                 'meta_key'      => '_assign_order', // Postmeta key field
                                 'meta_value'    => get_current_user_id(), // Postmeta value field
                                 'meta_compare'  => '=', // Possible 
                                 )
                             );
                             echo count($orders_hold);
                             ?>
                           </li>
                           <li><a href="#tabs2">View More -</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="box">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/processing-img.png" alt="" />
                  <div class="text">
                     <h6>Orders processing</h6>
                     <div class="btns">
                        <ul>
                           <li><?php 
                              $orders_processing = wc_get_orders(array(
                                 'limit'=>-1,
                                 'type'=> 'shop_order',
                                 'status'=> array( 'wc-processing' ),
                                 'meta_key'      => '_assign_order', // Postmeta key field
                                 'meta_value'    => get_current_user_id(), // Postmeta value field
                                 'meta_compare'  => '=', // Possible 
                                 )
                             );
                             echo count($orders_processing);
                             ?></li>
                           <li><a href="#">View More -</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="box">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/complete-img.png" alt="" />
                  <div class="text">
                     <h6>Orders complete</h6>
                     <div class="btns">
                        <ul>
                           <li><?php 
                              $orders_complete = wc_get_orders(array(
                                 'limit'=>-1,
                                 'type'=> 'shop_order',
                                 'status'=> array( 'wc-completed'),
                                 'meta_key'      => '_assign_order', // Postmeta key field
                                 'meta_value'    => get_current_user_id(), // Postmeta value field
                                 'meta_compare'  => '=', // Possible 
                                
                                 )
                             );
                             echo count($orders_complete);
                             ?></li>
                           <li><a href="#">View More -</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab_content">
               <div class="plant-list active" id="tabs1">
                  <h6>Please Select Your Available Plant:</h6>
                  <div class="list_ul">
                     <form action="" method="POST" >
                     <?php wp_nonce_field( 'submit_nursery_plant', 'cform_generate_nonce' ); ?>
                     <ul class="plant-name">
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
                           // print_r(unserialize($user_avaliable_plant)); 
                           $plant_id = get_the_ID();
                     
                           //$term_name = wc_get_product_terms( get_the_ID(), 'pa_nursery-pot-size', array( 'fields' => 'names' ) );
                           //$term_id = array_shift( wc_get_product_terms( get_the_ID(), 'pa_mature-height', array( 'fields' => 'names' ) ) );
                           // print_r($term_name);
                           // echo $term->name;
                           ?>
                        <li>
                           <input name="select_product_name[]" type="checkbox" <?php if(in_array($plant_id, unserialize($user_avaliable_plant))){ echo "checked"; } ?> value="<?php echo get_the_ID(); ?>" class="plant-name" id="product<?php echo get_the_ID(); ?>">
                           <label for="product<?php echo get_the_ID(); ?>" id="product<?php echo get_the_ID(); ?>"><?php the_title(); ?></label>
                           <?php $attributes = wc_get_product_terms( get_the_ID(), 'pa_nursery-pot-size', array( 'fields' => 'names' ) );
                            $select_product_pot_size = get_post_meta( get_the_ID(), '_nursery_product_plant_list', true ); 
                           // print_r($select_product_pot_size);
                           ?>
                           <ul class="sub-size">
                              <?php foreach ( $attributes as $term_name ) { ?>
                              <li class="attributes">
                                 <input name="select_product_pot_size_<?php echo get_the_ID(); ?>[]" type="checkbox" <?php if(in_array($term_name, unserialize($select_product_pot_size))){ echo "checked"; } ?> value="<?php echo $term_name; ?>" id="product_attr<?php echo $term_name; ?>" class="product_attr_<?php echo get_the_ID(); ?>">
                                 <label for="product_attr<?php echo $term_name; ?>" id="product_attr<?php echo $term_name; ?>"><?php echo $term_name; ?></label>
                              </li>
                              <?php } ?>
                           </ul>
                        </li>
                        <?php
                           endwhile; 
                           endif;
                           wp_reset_postdata();
                        ?>
                     </ul>
                     <div class="input-flud">
                        <label for="">Select Delivery Zone</label>
                        <?php $select_delivery_zone = get_user_meta( get_current_user_id(), '_select_delivery_zone' , true ); ?>
                        <select name="select_delivery_zone" class="form-control" id="select_delivery_zone">
                           <option <?php if($select_delivery_zone == '15'){ echo 'selected'; } ?> value="15">Upto 15 Miles</option>
                           <option <?php if($select_delivery_zone == '10'){ echo 'selected'; } ?> value="10">Upto 10 Miles</option>
                           <option <?php if($select_delivery_zone == '5'){ echo 'selected'; } ?> value="5">Upto 5 Miles</option>
                        </select>
                     </div>
                     <div class="save-btn">
                        <button class="cmn-btn" name="save_plant">Save</button>
                     </div>
                     </form>
                  </div>
               </div>
               <div class="plant-list" id="tabs2">
                  <h6>Order List</h6>
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
                              'meta_key'     => '_assign_order',
                              'meta_compare' => '=',
                              'meta_value'   => get_current_user_id(),
                              ) );
                           //echo "<pre>"; print_r($orders);
                           foreach( $orders as $order ){ 
                              $order_status = $order->get_status();
                           ?>
                           <tr>
                              <td>#<?php echo $order->get_id(); ?></td>
                              <td>
                              <?php if($order_status == 'on-hold'){ ?>
                              <a href="<?php echo site_url() ?>?oid=<?php echo $order->get_id(); ?>&status=<?php echo $order_status; ?>" class="btn btn-warning" >Accept</a>
                              <?php } ?>
                              <?php if($order_status == 'processing'){ ?>
                              <a href="javascript:void(0)" class="btn btn-success" >Processing</a>
                              <?php } ?>
                              <?php if($order_status == 'completed'){ ?>
                              <a href="javascript:void(0)" class="btn btn-primary" >Completed</a>
                              <?php } ?>
                              <?php if($order_status == 'cancelled'){ ?>
                              <a href="javascript:void(0)" class="btn btn-danger" >Cancelled</a>
                              <?php } ?>
                              </td>
                              <td><?php echo $order->get_billing_first_name()." ".$order->get_billing_last_name(); ?></td>
                              <td><?php echo date('F j, Y',strtotime($order->get_date_created())); //, g:i:s A T ?></td>
                              <td><?php echo $order->get_formatted_billing_address() ; ?></td>
                              <td><button type="button" class="btn btn-primary view_nur_qty" data-orderid="<?php echo $order->get_id(); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal1">View</button></td>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
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

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
                  $get_author_gravatar = get_avatar_url($get_author_id);
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
                     <ul>
                       <?php
                           $args = array(
                                 'posts_per_page' => -1,
                                 'post_type' => 'product',
                                 'orderby' => 'title'
                           );
                           $products = new WP_Query( $args );
                           if($products->have_posts()) : 
                           while ( $products->have_posts() ) : $products->the_post();
                           $user_avaliable_plant = get_user_meta( get_current_user_id(), '_avaliable_plant', true );
                           // print_r(unserialize($user_avaliable_plant)); 
                           $plant_id = get_the_ID();
                           
                           ?>
                        <li>
                           <input name="select_product_name[]" type="checkbox" <?php if(in_array($plant_id, unserialize($user_avaliable_plant))){ echo "checked"; } ?> value="<?php echo get_the_ID(); ?>" id="product<?php echo get_the_ID(); ?>">
                           <label for="product<?php echo get_the_ID(); ?>" id="product<?php echo get_the_ID(); ?>"><?php the_title(); ?></label>
                        </li>
                        <?php
                           endwhile; 
                           endif;
                           wp_reset_postdata();
                        ?>
                     </ul>
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

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'name' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Header Section -->
<nav class="navbar navbar-expand-lg">
   <div class="container">
    <div class="inn">
        <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );                
            if(!empty($image)){
                echo '<a class="navbar-brand" href="'.get_site_url().'"><img src="'.$image[0].'" alt="" /></a>';  
            } else {
                echo '<a class="navbar-brand" href="'.get_site_url().'"><img src="'.get_template_directory_uri().'/assets/images/logo.png" alt="" /></a>';
            }
        ?>
      <button class="navbar-toggler navbar-toggler-main" type="button" data-bs-toggle="collapse"
         data-bs-target="#navbarNav" aria-controls="navbarNav"
         aria-expanded="false" aria-label="Toggle navigation">
         <span class="stick"></span>
      </button>
      <div class="rt-side">
        <div class="collapse navbar-collapse" id="navbarNav">
            <button class="navbar-toggler navbar-toggler-main" type="button" data-bs-toggle="collapse"
               data-bs-target="#navbarNav" aria-controls="navbarNav"
               aria-expanded="false" aria-label="Toggle navigation">
               <span class="stick"></span>
            </button>
            <?php
   					wp_nav_menu(array(
   						'menu'  => 'Main Menu', 
   						'menu_class'=> 'navbar-nav', 
   					));
   				?>
        </div>
        <?php 
         if (!empty($_COOKIE['customer_usd_zipcode'])) {
            $customer_usd_zipcode = $_COOKIE['customer_usd_zipcode'];
         }else{
            if ( !is_user_logged_in() ) {
               $customer_usd_zipcode = "";
            }else{
               $customer_usd_zipcode = get_user_meta( get_current_user_id(), '_customer_usd_zipcode', true );
               if(empty($customer_usd_zipcode)){
                $customer_usd_zipcode = "";
               }
            }
         }

         if (!empty($_COOKIE['customer_usda_zip'])) {
            $cookieValue = $_COOKIE['customer_usda_zip'];
            $decoded_json = json_decode(stripslashes($_COOKIE['customer_usda_zip']),true);
            $customer_usda_zip = $decoded_json['zone'];
            //print_r($decoded_json);
         } else{
            if ( !is_user_logged_in() ) {
               $customer_usda_zip = "#";
            }else{
               $customer_usda_zip_array = unserialize(get_user_meta( get_current_user_id(), '_customer_usda_zip', true ));
               if(!empty($customer_usda_zip_array)){
               $customer_usda_zip = $customer_usda_zip_array['zone'];
               }else{
                $customer_usda_zip = "#";
               }
            }
         }
         ?>
        <div class="growing-btn">
          <a href="#view-zipcode-popup" class="open-popup-link">
            <span>USDA Zone: <?php echo strtoupper($customer_usda_zip); ?></span>
            <span>Planting in <strong><?php echo $customer_usd_zipcode; ?></strong></span>
          </a>
        </div>
        <div class="login">
          <?php if (! is_user_logged_in() ) { ?>
           <a href="#login-popup" class="open-popup-link"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/login.svg" alt="" /> LogIn</a>
           <?php }else{ ?>
            <?php $current_user = wp_get_current_user(); ?>
            <?php if ( wc_user_has_role( $current_user, 'administrator' )){ ?>
              <a href="<?php echo esc_url( get_page_link( 205 ) ); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/assets/images/account.svg" alt="" /> My Account</a>
            <?php } else if ( wc_user_has_role( $current_user, 'nursery' )){ ?>
              <a href="<?php echo esc_url( get_page_link( 1529 ) ); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/assets/images/account.svg" alt="" /> My Account</a>
              <?php }else{ ?>
            <a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/assets/images/account.svg" alt="" /> My Account</a>
            <?php } ?>
            <span class="log-out"><a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a></span>
            <?php } ?>
        </div>
        
        
        <?php if ( !wc_user_has_role( $current_user, 'nursery' )){ ?>
        <div class="cart">
          <?php $items_count = WC()->cart->get_cart_contents_count(); ?> 
           <a href="<?php echo wc_get_cart_url() ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cart.svg" alt="" /> <span class="num_count" id="mini-cart-count" ><?php echo $items_count ? $items_count : '0'; ?></span></a>
        </div>
        <?php } ?>
      </div>
    </div>
   </div>
</nav>
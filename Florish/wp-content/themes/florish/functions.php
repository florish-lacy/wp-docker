<?php
/**
 * Florish functions and definitions  
 *
 */
if ( ! function_exists( 'florish_theme_setup' ) ) : 
function florish_theme_setup() {
    
    //Woocokomerce
	add_theme_support( 'woocommerce' );

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	 
	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'florish' ),
		'secondary'  => __( 'Secondary Menu', 'florish' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );


	/**
	 * Add support for core custom logo.
	 *
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 75,
			'width'       => 372,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
endif;
add_action( 'after_setup_theme', 'florish_theme_setup' );



/**
 * Register widget area.
 */
function florish_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'florish' ),
		'id'            => 'shop-sidebar',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'florish' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	

}
add_action( 'widgets_init', 'florish_widgets_init' );




/**
 * Enqueue scripts and styles.
 */
function florish_scripts() {
     //bootstrap css include
	 wp_enqueue_style( 'florish-bootstrap-min', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array() );

    //bootstrap toggle css include
	 //wp_enqueue_style( 'florish-bootstrap-toggle-style', 'https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css', array() );
	 wp_enqueue_style( 'florish-bootstrap-toggle-style', 'https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.0.4/css/bootstrap5-toggle.min.css', array() );
	 
	 //fontawesome include
	 wp_enqueue_style( 'florish-fontawesome-all-css', get_template_directory_uri() . '/assets/fontawesome/css/all.css', array() );

	 //magnific style
	 wp_enqueue_style( 'florish-magnific-popup-css', get_template_directory_uri() . '/assets/css/magnific-popup.css', array() );
	 
	 //slick include
	 wp_enqueue_style( 'florish-slick-style', get_template_directory_uri() . '/assets/css/slick.css', array() );
     wp_enqueue_style( 'florish-slick-theme-style', get_template_directory_uri() . '/assets/css/slick-theme.css', array() );

	 //aos include
	 wp_enqueue_style( 'florish-aos-theme-style', get_template_directory_uri() . '/assets/css/aos.css', array() );

     //Theme main custom style
     wp_enqueue_style( 'florish-main-style', get_template_directory_uri() . '/assets/css/style.css', array() );

	// Load our main stylesheet.
	wp_enqueue_style( 'florish-style', get_stylesheet_uri() );


    //bootstrap min js
	wp_enqueue_script( 'florish-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '20151811', true );
	
	//bootstrap bootstrap-toggle
	//wp_enqueue_script( 'florish-bootstrap-toggle-script',  'https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js', array( 'jquery' ), '20151811', true );
	wp_enqueue_script( 'florish-bootstrap-toggle-script',  'https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.0.4/js/bootstrap5-toggle.jquery.min.js', array( 'jquery' ), '20151811', true );

	//bootstrap popper min js
	wp_enqueue_script( 'florish-slick-script', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), '20151811', true );

	//theme aos js
	wp_enqueue_script( 'florish-aos-script', get_template_directory_uri() . '/assets/js/aos.js', array( 'jquery' ), '20151811', true );
    
	///magnific popup js
	wp_enqueue_script( 'florish-magnific-popup-js', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', array( 'jquery' ), '20151811', true );
    
	///validate js
	wp_enqueue_script( 'florish-jquery-validate', 'https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js', array( 'jquery' ), '20151811', true );
	wp_enqueue_script( 'florish-jquery-validate-aditional', 'https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js', array( 'jquery' ), '20151811', true );

	wp_enqueue_script( 'florish-mask-phone-number', 'https://unpkg.com/jquery-input-mask-phone-number@1.0.14/dist/jquery-input-mask-phone-number.js', array( 'jquery' ), '20151811', true );
	///google location
	wp_enqueue_script( 'florish-google-place-location-front', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBqxHeRDjgzm72wXzGKE1oxS4lgyT3K6uM&libraries=places', array( 'jquery' ), '20135344611', true );

    ///masonry pkgd js
	wp_enqueue_script( 'florish-masonry-pkgd-js', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array( 'jquery' ), '20151811', true );

   ///jquery cookie js
   wp_enqueue_script( 'florish-jquery-cookie-js', get_template_directory_uri() . '/assets/js/jquery.cookie.js', array( 'jquery' ), '204641811', true );

  
   ///map js
  wp_enqueue_script( 'florish-map-place-js', get_template_directory_uri() . '/assets/js/map.js', array( 'jquery' ), '20468768711', true );

     global $wp;
    // Theme main Function js
    wp_enqueue_script( 'florish-main-script', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), '20151811', true );
	wp_localize_script( 'florish-main-script', 'ajax_florish_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ),'home_url'=>site_url(),'vendor_url'=> get_page_link( 1529 ), 'current_url'=>home_url( $wp->request )));

}
add_action( 'wp_enqueue_scripts', 'florish_scripts' );




/////////////CUSTOMIZER REGISTER START////////////////
function sorciere_social_share_customize_register($wp_customize){
     
    $wp_customize->add_section('sorciere_social_share', array(
        'title'    => __('Social Links', 'sorciere'),  
        'description' => '',
        'priority' => 120,
    ));


  
    ////////////Facebook///////////////
    $wp_customize->add_setting('sorciere_facebook_links', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
  
    ));
  
    $wp_customize->add_control('sorciere_facebook_links', array(
        'label'      => __('Facebook', 'sorciere'),
        'section'    => 'sorciere_social_share',
        'settings'   => 'sorciere_facebook_links',
    ));

    ////////////Instagram///////////////
    $wp_customize->add_setting('sorciere_instagram_links', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('sorciere_instagram_links', array(
        'label'      => __('Instagram', 'sorciere'),
        'section'    => 'sorciere_social_share',
        'settings'   => 'sorciere_instagram_links',
    ));


    ////////////Twitter///////////////
    $wp_customize->add_setting('sorciere_twitter_links', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('sorciere_twitter_links', array(
        'label'      => __('Twitter', 'sorciere'),
        'section'    => 'sorciere_social_share',
        'settings'   => 'sorciere_twitter_links',
    ));


	////////////Youtube///////////////
	$wp_customize->add_setting('sorciere_youtube_links', array(
	    'default'        => '',
	    'capability'     => 'edit_theme_options',
	    'type'           => 'theme_mod',

	));

	$wp_customize->add_control('sorciere_youtube_links', array(
	    'label'      => __('Youtube', 'sorciere'),
	    'section'    => 'sorciere_social_share',
	    'settings'   => 'sorciere_youtube_links',
	));

}
  
add_action('customize_register', 'sorciere_social_share_customize_register');


// Footer Option Page create...........
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Header & Footer Option Block',
		'menu_title'	=> 'Header & Footer Option',
		'menu_slug' 	=> 'footer-option-block',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

////Add user Role Nursery
// add_role('nursery', 'Nursery', array(
// 	'read' => true,
// 	'create_posts' => true,
// 	'edit_posts' => true,
// 	'edit_others_posts' => true,
// 	'publish_posts' => true,
// 	'manage_categories' => true,
// 	));
function change_role_name() {
    global $wp_roles;

    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();

    //You can replace "administrator" with any other role "editor", "author", "contributor" or "subscriber"...
    $wp_roles->roles['nursery']['name'] = 'Vendor';
    $wp_roles->role_names['nursery'] = 'Vendor';           
}
add_action('init', 'change_role_name');

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
  
}
/////////////CUSTOMIZER REGISTER END////////////////

//////////////////////////////////////////LOGIN & REGISTER START//////////////////////////////////////////////////

/////////////USER REGISTRATION ACCOUT ACTIVATION////////////////
function email_activation_msg_nocache() {
	$code = filter_input( INPUT_GET, 'keys'); 
	if($code){ 

		$act_users = get_users( array(
			"meta_key" => "code_to_be_activated",
			"meta_value" => $code,
			"fields" => "ID"
		) );

		$user_id = $act_users[0];

		if($user_id){
			$status = get_user_meta( $user_id, '_member_status', true );
			$code = get_user_meta( $user_id, 'code_to_be_activated', true );
			if($code && $status == 'inactive'){
				update_user_meta( $user_id, '_member_status', 'active' );	
				delete_user_meta( $user_id, 'code_to_be_activated' ); 
			}
			echo '<div class="alert alert-success" role="alert">Your account is now activated.</div>';
			
		}else{
			echo '<div class="alert alert-danger" role="alert">Invalid activation code / your account has been activated.</div>';
		}
	} 
}
add_action('wp_head', 'email_activation_msg_nocache');

/////////////USER REGISTRATION START////////////////
add_action( 'wp_ajax_nopriv_user_ajax_register', 'user_ajax_register' );
function user_ajax_register(){

    // First check the nonce, if it fails the function will break
    //check_ajax_referer( 'ajax-register-nonce', 'security' );

    //Step 1 
	$user_role  = $_POST['user_role'];
	$first_name  =  $_POST['first_name'];
	
	 $last_name  = $_POST['last_name'];

	 $email  = $_POST['email'];
	 $phone_number  = $_POST['mobile'];

	 $password  = $_POST['password'];
	 $user_location  = $_POST['user_location'];
	 $user_location_lat  = $_POST['user_location_lat'];
	 $user_location_long  = $_POST['user_location_long'];

    // Nonce is checked, get the POST data and sign user on
    $info = array();
  	$info['user_nicename'] = $info['nickname'] = $info['display_name'] = $info['first_name']= sanitize_user($first_name) ;
    $info['last_name'] = sanitize_user($last_name) ;
    $info['user_login'] = sanitize_user($email) ;
    $info['user_pass'] = sanitize_text_field( $password );
	$info['user_email'] = sanitize_email( $email );
	$info['role'] = $user_role;
	
	// Register the user
    $user_register = wp_insert_user( $info );
 	if ( is_wp_error($user_register) ){	
		$error  = $user_register->get_error_codes();
		
		if(in_array('empty_user_login', $error)){

			echo json_encode(array('error'=>true, 'message'=>__($user_register->get_error_message('empty_user_login'))));

		}elseif(in_array('existing_user_login',$error)){

			echo json_encode(array('error'=>true, 'message'=>__('This email is already registered.')));

		}elseif(in_array('existing_user_email',$error)){

			echo json_encode(array('error'=>true, 'message'=>__('This email address is already registered.')));
		}

    } else {

		 $user_id = $user_register;
   
	     update_user_meta( $user_id, 'user_location', $user_location );  
		 update_user_meta( $user_id, 'user_location_lat', $user_location_lat );  
		 update_user_meta( $user_id, 'user_location_long', $user_location_long );  
		 

	
        ///////////////////////////Mail SEND///////////////////////////////////

		 $code = sha1( $user_id . time() );
		 $user_active_link = add_query_arg( array( 'keys' => $code ), site_url());
		 $activation_link = '<a href="'.$user_active_link.'" target="_blank">';
		 $activation_link .= $user_active_link;
		 $activation_link .='</a>';
		 add_user_meta( $user_id, 'code_to_be_activated', $code, true );
		 update_user_meta( $user_id, '_member_status', 'inactive' );
		 
		 $from = get_field("sender_email", "option"); // Set whatever you want like mail@yourdomain.com
			 
			 if(!(isset($from) && is_email($from))) {		
				 $sitename = strtolower( $_SERVER['SERVER_NAME'] );
				 if ( substr( $sitename, 0, 4 ) == 'www.' ) {
					 $sitename = substr( $sitename, 4 );					
				 }
				 $from = 'admin@'.$sitename; 
			 }
			 
			 $to = $email;
			 $subject = 'Activate your account';
			 //$site_name = get_bloginfo( 'name' );
			// $site_name = "Florish - Plant Care Companion";
			 $sender = 'From: '.get_bloginfo( 'name' ).' <'.$from.'>' . "\r\n";
			 
			 $message_content = 'To activate your account please click on the following link : '.$activation_link;
			 //Emil Template Start 			
 
 
			 $custom_logo_id = get_theme_mod( 'custom_logo' );
			 $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );   
 
			 //$logo = $image[0];
			 $logo = get_field("footer_logo", "option");
			 $site_url = site_url();
			 $wbst = preg_replace('#^https?://#', '', $site_url);
			 $wbst_url = str_replace("/","",$wbst);
			

			 $message =
			 '<table border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#5fb526" width="800" class="main_tbl">
			   <tr>
				 <td width="52">&nbsp;</td>
				 <td width="696">
					 <table border="0" cellspacing="0" cellpadding="0" width="100%">
					   <tr>
						 <td>
							 <table border="0" cellspacing="0" cellpadding="0" style="background:#fff;" width="100%">
							   <tr>
								 <td width="36">&nbsp;</td>
								 <td>
									 <table border="0" cellspacing="0" cellpadding="0">
									   <tr height="25">
										 <td>&nbsp;</td>
									   </tr>
									   <tr>
										 <td><a href='.$site_url.'><img src='.$logo.' alt="logo" width="140" height="" class="logo"/></a></td>
									   </tr>
									   <tr>
										 <td>&nbsp;</td>
									   </tr>
									   <tr>
										 <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#011d32; padding:0; margin:0 0 20px;">
										  <p>Dear '.$first_name.'</p>
										  '.$message_content.'
										  <p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#011d32; padding:0; margin:0;"><br><br>Florish Team</p>
										  <p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#011d32; padding:0; margin:0;">Why not follow us on :   <a href="#" target="_blank" style="color:#3d6d91; text-decoration:underline;">Facebook</a>, <a href="#" target="_blank" style="color:#3d6d91; text-decoration:underline;">Twitter</a>, or <a href="#" target="_blank" style="color:#3d6d91; text-decoration:underline;">LinkedIn</a></p>
										 </td>
									   </tr>
									   <tr height="25">
										 <td>&nbsp;</td>
									   </tr> 
									 </table>
								 </td>
								 <td width="36">&nbsp;</td>
							   </tr>
							 </table>
						 </td>
					   </tr>
					   <tr>
						 <td>&nbsp;</td>
					   </tr>
					   <tr>
						 <td>
			 
							<p style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#fff; padding:0; margin:0 0 15px; text-align:center;"><a href='.site_url().' style="color:#fff; text-decoration:none;">Privacy Policy</a> | <a href='.site_url().' style="color:#fff; text-decoration:none;">Terms and Conditions</a></p>
							
							<p style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#fff; padding:0; margin:0 0 15px; text-align:center;">You are receiving this email because this email address has been used to join <a href='.$site_url.' style="color:#fff; text-decoration:none;">'.$wbst_url.'</a><br />
							To ensure you receive our emails please add <a href="mailto:info@florish.gmail.com" target="_blank" style="color:#fff; text-decoration:none;">info@florish.gmail.com</a> to your safe senders list</p>
			 
						 </td>
					   </tr>
					   <tr>
						 <td>&nbsp;</td>
					   </tr>
					 </table>
				 </td>
				 <td width="52">&nbsp;</td>
			   </tr>
			 </table>';
			 //Emil Template End 
			 $headers[] = 'MIME-Version: 1.0' . "\r\n";
			 $headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			 $headers[] = "X-Mailer: PHP \r\n";
			 $headers[] = $sender;
				 
			 $mail = wp_mail( $to, $subject, $message, $headers );
			 if( $mail ) {
				 $message = 'You have successfully created your account! To begin using this site you will need to activate your account via the email we have just sent to your address.';
			 }else{
				 $message = 'You have successfully created your account! System is unable to send you mail containg your activation link. Please contact Site Administrator';
			 }

			///////////////////////////Mail SEND///////////////////////////////////


		 echo json_encode(array('error'=>false, 'message'=>__($message), 'user_id'=>$user_id ));  
    }

    die();
}
/////////////USER REGISTRATION END////////////////

/////////////USER LOGIN START////////////////
add_action( 'wp_ajax_nopriv_ajax_user_login', 'ajax_user_login' );
function ajax_user_login(){

    check_ajax_referer( 'ajax-login-nonce', 'security' );

	$user_login = $_POST['email'];
	$password = $_POST['password'];

	$info = array();
    $info['user_login'] = $user_login;
    $info['user_password'] = $password;
    //$user = get_user_by( 'login', $info['user_login'] );
	$user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){	
		$error  = $user_signon->get_error_codes();	

		if($error[0] == 'Please verify your mail ID'){
			echo json_encode(array('error'=>true, 'message'=> 'Your Account is inactive. Contact Your Site Administrator.'));
		}else{
			echo json_encode(array('error'=>true, 'message'=>__($error[0],'default')));
		}
		//print_r($error);
		
    } else {
		wp_set_current_user($user_signon->ID); 
		echo json_encode(array('error'=>false, 'message'=>' Successful, redirecting...' ,'role' => $user_signon->roles ));
    }
	
	die();
}
/////////////USER LOGIN END////////////////

/*user active authentication*/
add_filter('wp_authenticate_user', function($user) {
	if ( $user->has_cap( 'administrator' ) ) {
		 return $user;
	}
    if (get_user_meta($user->ID, '_member_status', true) == 'active') {
        return $user;
    }

	return new WP_Error( 'Please verify your mail ID','Your Account is inactive. Contact Your Site Administrator.' );
}, 10, 2);


add_action( 'show_user_profile', 'hybrid_event_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'hybrid_event_extra_user_profile_fields' );
function hybrid_event_extra_user_profile_fields( $user ) {
	$mamber_status = get_user_meta( $user->ID, '_member_status');
	if( current_user_can( 'administrator' ) ){  ?>
<h3><?php _e("Member Status", "blank"); ?></h3>
<table class="form-table">
    <tr>
        <th><label for="st_member_status"><?php _e("User Status"); ?></label></th>
        <td><select name="st_member_status">
                <option value="">Select Status</option>
                <option value="active" <?php if($mamber_status[0]=='active'){echo "selected";}?>>Active</option>
                <option value="inactive" <?php if($mamber_status[0]=='inactive'){echo "selected";}?>>Inactive</option>
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

add_action( 'personal_options_update', 'hybrid_event_save_extra_user_fields' );
add_action( 'edit_user_profile_update', 'hybrid_event_save_extra_user_fields' );
function hybrid_event_save_extra_user_fields( $user_id ) {
    if( current_user_can( 'administrator' ) ){
		if ( current_user_can( 'edit_user', $user_id ) ) {
			update_user_meta( $user_id, '_member_status', $_POST['st_member_status'] );
		}
    }
	return true;
}
/*user active authentication End*/


//////////////////////////////////////////LOGIN & REGISTER END//////////////////////////////////////////////////

add_filter('woocommerce_product_related_products_heading',function(){

	return 'Best Sellers:';
 
 });

add_action( 'woocommerce_product_meta_end', 'add_custom_text_below_product_categories', 10 );
function add_custom_text_below_product_categories() {
    echo '<div class="single-slip">
	<div class="box">
	   <div class="icon">
		  <img src="'.get_template_directory_uri().'/assets/images/about-icn1.svg" alt="" />
	   </div>
	   <di class="text">
		  <h5>Free Shipping</h5>
		  <p>Ships Today</p>
	</div>
	<div class="box">
	   <div class="icon">
		  <img src="'.get_template_directory_uri().'/assets/images/about-icn2.svg" alt="" />
	   </div>
	   <di class="text">
		  <h5>24/7 Support </h5>
		  <p>Dedicated Support</p>
	</div>
	<div class="box">
	   <div class="icon">
		  <img src="'.get_template_directory_uri().'/assets/images/about-icn3.svg" alt="" />
	   </div>
	   <di class="text">
		  <h5>Secure Payment</h5>
		  <p>Best Payment Method</p>
	</div>
 </div>';
}

add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
    ob_start();
    $items_count = WC()->cart->get_cart_contents_count();
    ?>
    <span class="num_count" id="mini-cart-count"><?php echo $items_count ? $items_count : '0'; ?></span>
    <?php
    $fragments['#mini-cart-count'] = ob_get_clean();
    return $fragments;
}




///////quantity + - buton
add_action( 'woocommerce_after_quantity_input_field', 'florish_display_quantity_plus' );
  
function florish_display_quantity_plus() {
   echo '<button type="button" class="plus">+</button>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'florish_display_quantity_minus' );
  
function florish_display_quantity_minus() {
   echo '<button type="button" class="minus">-</button>';
}
function florish_js_code_example() {
	?>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqxHeRDjgzm72wXzGKE1oxS4lgyT3K6uM&libraries=places"></script>
	<script type="text/javascript">
		google.maps.event.addDomListener(window, "load", function () {
			var places = new google.maps.places.Autocomplete(
			document.getElementById("user_location")
			);

			google.maps.event.addListener(places, "place_changed", function () {
			var place = places.getPlace();
			//console.log(place);
			var latitude = place.geometry.location.lat();
			var longitude = place.geometry.location.lng();
			var address = place.formatted_address;

			jQuery("#user_location_lat").val(latitude);
			jQuery("#user_location_long").val(longitude);
			//   $("#address").val(address);
			});
		});
	</script>
	<?php
}
add_action( 'wp_footer', 'florish_js_code_example' );
add_action( 'wp_footer', 'florish_add_cart_quantity_plus_minus' );
  
function florish_add_cart_quantity_plus_minus() {
 
   if ( ! is_product() && ! is_cart() ) return;
    
   wc_enqueue_js( "   
           
      jQuery(document).on( 'click', 'button.plus, button.minus', function() {
  
         var qty = jQuery( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( jQuery( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
 
      });
        
   " );
   
}

/////////////////////////////////////////User Location insert//////////////////////////////////
add_action( 'admin_enqueue_scripts', 'florish_enqueue_custom_admin_script' );
function florish_enqueue_custom_admin_script() {
	wp_localize_script( 'ajax-script', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
	///google location
	wp_enqueue_script( 'florish-admin-google-place-location', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBqxHeRDjgzm72wXzGKE1oxS4lgyT3K6uM&libraries=places', array( 'jquery' ), '2015186611', true );
}

add_action('admin_footer', 'my_admin_footer_function', 100);
function my_admin_footer_function() {
	?>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			var autocomplete;
			autocomplete = new google.maps.places.Autocomplete((document.getElementById('user_location')), {
				types: ['geocode'],
			});
			google.maps.event.addListener(autocomplete, 'place_changed', function() {
				var place = autocomplete.getPlace();
				//document.getElementById('city').value = place.name;
				document.getElementById('user_location_lat').value = place.geometry.location.lat();
				document.getElementById('user_location_long').value = place.geometry.location.lng();
		
			});
			
		});
	</script>
<?php
}

function userMetaLocationForm( $user) {
	?>
	<h2>Your location.</h2>
	<table class="form-table">
		<tr>
			<th>
				<label for="user_location"><?php _e( 'Location' ); ?></label>
			</th>
			<td>
				<input type="text" name="user_location" id="user_location" value="<?php echo esc_attr( get_the_author_meta( 'user_location', $user->ID ) ); ?>" class="regular-text" />
				<input type="hidden" name="user_location_lat" id="user_location_lat" value="<?php echo esc_attr( get_the_author_meta( 'user_location_lat', $user->ID ) ); ?>" class="regular-text" />
				<input type="hidden" name="user_location_long" id="user_location_long" value="<?php echo esc_attr( get_the_author_meta( 'user_location_long', $user->ID ) ); ?>" class="regular-text" />
				
			</td>
		</tr>
	</table>
	<?php
	}
	add_action('show_user_profile', 'userMetaLocationForm'); 
	add_action('edit_user_profile', 'userMetaLocationForm'); 
	add_action('user_new_form', 'userMetaLocationForm'); 
	
	function userMetaLocationSave($userId) {
		if (!current_user_can('edit_user', $userId)) {
			return;
		}
	
		update_user_meta($userId, 'user_location', $_REQUEST['user_location']);
		update_user_meta($userId, 'user_location_lat', $_REQUEST['user_location_lat']);
		update_user_meta($userId, 'user_location_long', $_REQUEST['user_location_long']);
	}
	add_action('personal_options_update', 'userMetaLocationSave');
	add_action('edit_user_profile_update', 'userMetaLocationSave');
	add_action('user_register', 'userMetaLocationSave');


///////////ORDER LOCATION CALCULATE///////////////////////////////////////////////
	add_action( 'woocommerce_checkout_order_created', 'wp_woocommerce_checkout_order_created_action' );
	function wp_woocommerce_checkout_order_created_action( $order ){
		$order_id = $order->get_id();
		$location_lat_value = get_post_meta( $order_id, 'billing_customer_location_lat', true );
		$location_long_value = get_post_meta( $order_id, 'billing_customer_location_long', true );

		$ref = array($location_lat_value, $location_long_value);


		$items = $order->get_items();
		foreach ( $items as $item ) {
			$product_name = $item->get_name();
			$plant_id = $item->get_product_id();
			$product_variation_id = $item->get_variation_id();
		}
		

		$args = array(
			'role'    => 'nursery',
			'orderby' => 'user_nicename',
			'order'   => 'ASC'
		);
		$users = get_users( $args );
		$items = array();
		foreach ( $users as $user ) {
			$user_id = $user->ID;
			$location_lat = get_user_meta( $user_id, 'user_location_lat', true ); 
			$location_long = get_user_meta( $user_id, 'user_location_long', true ); 
			$user_avaliable_plant = get_user_meta( $user_id, '_avaliable_plant', true );
			if(in_array($plant_id, unserialize($user_avaliable_plant))){
				$items[] = array($user_id, $location_lat, $location_long);
			}else{
				$items[] = array($user_id, $location_lat, $location_long);
			}
			
		}
		$distances = array_map(function($item) use($ref) {
			$a = array_slice($item, -2);
			return distance($a, $ref);
		}, $items);
		
		asort($distances);

		$order->update_meta_data( '_assign_order', $items[key($distances)][0] );
		$order->update_meta_data( '_assign_order_datetime', date("Y-m-d h:i:s") );
		$order->update_status('wc-on-hold');
		//update_status("wc-on-hold", 'on-hold', true); //wc-pending //wc-processing
		$order->save();
	}


	function distance($a, $b)
		{
			list($lat1, $lon1) = $a;
			list($lat2, $lon2) = $b;
		
			$theta = $lon1 - $lon2;
			$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
			$dist = acos($dist);
			$dist = rad2deg($dist);
			$miles = $dist * 60 * 1.1515;
			return $miles;
		}



add_action( 'init', 'nursery_product_submit_form' );
function nursery_product_submit_form(  ){

	if(isset($_POST['save_plant'])  && wp_verify_nonce( $_POST['cform_generate_nonce'], 'submit_nursery_plant' )){

		$avaliable_plant = serialize($_POST['select_product_name']);
        foreach($_POST['select_product_name'] as $plant_id){
			//$plant_id;
			//print_r($_POST['select_product_pot_size_'.$plant_id]);
			update_post_meta( $plant_id, '_nursery_product_plant_list', serialize($_POST['select_product_pot_size_'.$plant_id]) );
		}
       // die();
		update_user_meta(get_current_user_id(), '_avaliable_plant', $avaliable_plant);
		$select_delivery_zone = $_POST['select_delivery_zone'];
		update_user_meta(get_current_user_id(), '_select_delivery_zone', $select_delivery_zone);
		wp_redirect( esc_url( get_page_link( 70 ) ) );
		die;
	}
	if(isset($_GET['oid']) && isset($_GET['status']) && is_numeric($_GET['oid'])){
		$order_id = $_GET['oid'];
		$order_status = $_GET['status'];
		$order = wc_get_order( $order_id );
		if( $order->get_status() == 'on-hold' ){
		$order->update_status( 'processing' );
		}
		// if( $order->get_status() == 'processing' ){
		// 	$order->update_status( 'completed' );
		// 	}
		wp_redirect( esc_url( get_page_link( 70 ) ) );
		die;
	}
	if(isset($_GET['userid']) && isset($_GET['in_status']) && is_numeric($_GET['userid'])){
		$user_id = $_GET['userid'];
		$use_status = $_GET['in_status'];
		    $status = get_user_meta( $user_id, '_member_status', true );
			 $code = get_user_meta( $user_id, 'code_to_be_activated', true );
			
			if( empty($status) || $status == 'inactive'){
				if($use_status == 'accept'){
				  update_user_meta( $user_id, '_member_status', 'active' );	
				  delete_user_meta( $user_id, 'code_to_be_activated' ); 

				  $from = get_field("sender_email", "option"); // Set whatever you want like mail@yourdomain.com
			 
                if(!(isset($from) && is_email($from))) {		
                    $sitename = strtolower( $_SERVER['SERVER_NAME'] );
                    if ( substr( $sitename, 0, 4 ) == 'www.' ) {
                        $sitename = substr( $sitename, 4 );					
                    }
                    $from = 'admin@'.$sitename; 
                }
    
                $user_info = get_userdata($user_id);
                $to = $user_info->user_email;
                $subject = 'Activated your account';
                $message = "<p>Dear ".$user_info->first_name.",<br> Congratulations, you have been approved as a Florish Nursery Partner!  Click the link below to begin on-boarding your nursery!</p>";
                
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: '.get_bloginfo( 'name' ).' <'.$from.'>' . "\r\n";
                    
                mail( $to, $subject, $message, $headers );

				} 
				if($use_status == 'decline') {
					$response = wp_delete_user( $user_id );
					if ( $response == 1 ) {
						return array(
							'code'   => 'valid_data',
							'data'   => array(
							'status' => 200,
							)
						  );

						  $from = get_field("sender_email", "option"); // Set whatever you want like mail@yourdomain.com
			 
                if(!(isset($from) && is_email($from))) {		
                    $sitename = strtolower( $_SERVER['SERVER_NAME'] );
                    if ( substr( $sitename, 0, 4 ) == 'www.' ) {
                        $sitename = substr( $sitename, 4 );					
                    }
                    $from = 'admin@'.$sitename; 
                }
    
                $user_info = get_userdata($user_id);
                $to = $user_info->user_email;
                $subject = 'Deleted your account';
                $message = "<p>Dear ".$user_info->first_name.",<br> Thank you for your application to become a Florish Nursery Partner. Unfortunately, your application was denied.  If you believe there was an error, please contact us at Hello@Florish.co”. Access to the dashboard will be denied but Florish admin will still have a record of the denied nursery in its Admin Portal.</p>";
                
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: '.get_bloginfo( 'name' ).' <'.$from.'>' . "\r\n";
                    
                mail( $to, $subject, $message, $headers );
						} else {
								wp_die( "user_not_deleted" );
						  }
				}
			}
			
			if($status == 'active' && $use_status == 'inactive'){
				update_user_meta( $user_id, '_member_status', 'inactive' );
				//update_user_meta( $user_id, 'code_to_be_activated', "jdghu878hwyd888d" );
			}
			if($status == 'inactive' && $use_status == 'active'){
				update_user_meta( $user_id, '_member_status', 'active' );

				
				$from = get_field("sender_email", "option"); // Set whatever you want like mail@yourdomain.com
			 
                if(!(isset($from) && is_email($from))) {		
                    $sitename = strtolower( $_SERVER['SERVER_NAME'] );
                    if ( substr( $sitename, 0, 4 ) == 'www.' ) {
                        $sitename = substr( $sitename, 4 );					
                    }
                    $from = 'admin@'.$sitename; 
                }
    
                $user_info = get_userdata($user_id);
                $to = $user_info->user_email;
                $subject = 'Activated your account';
                $message = "<p>Dear ".$user_info->first_name.",<br> Please login your account and select your plants. </p>";
                
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: '.get_bloginfo( 'name' ).' <'.$from.'>' . "\r\n";
                    
                mail( $to, $subject, $message, $headers );
				
			}
			
		wp_redirect( esc_url( get_page_link( 205 ) ) );
		die;
	}

}



add_filter( 'woocommerce_add_cart_item_data', 'woo_custom_add_to_cart_only_one' );

function woo_custom_add_to_cart_only_one( $cart_item_data ) {

    global $woocommerce;
    $woocommerce->cart->empty_cart();

    // Do nothing with the data and return
    return $cart_item_data;
}

add_action('wp_ajax_nursery_order_view', 'nursery_order_view');
add_action('wp_ajax_nopriv_nursery_order_view', 'nursery_order_view');
function nursery_order_view(){
	 $order_id = $_POST['order_id'];
	 $order = new WC_Order( $order_id );
   ?>
    <ul class="order_desc">
	<li><span>Order ID:</span> #<?php echo $order_id; ?></li>
	<li><span>Date:</span> <?php echo date('F j, Y, g:i:s A T',strtotime($order->get_date_created())); ?></li>
	<li><span>Name:</span> <?php echo $order->get_billing_first_name()." ".$order->get_billing_last_name(); ?></li>
	<li><span>Email:</span> <?php echo $order->get_billing_email(); ?></li>
	<li><span>Phone:</span> <?php echo $order->get_billing_phone(); ?></li>
	<li><span>Address:</span> <span class="form-addr"><?php echo get_post_meta( $order_id, 'billing_customer_location', true ); ?></span></li>
	</ul>
	<div class="table-responsive mdl-qt-tbl">
		<table class="table qty-tbl">
			<thead>
				<tr class="table_cart--heading">
				<th>Products</th>
				<th>Qty</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $order->get_items() as $item_id => $item ) { 
					$product_id = $item->get_product_id();
					$img_atts = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );
					?>
				<tr>
				<td>
				    <?php if($img_atts[0]){ ?>
                     <img class="qt-tree" src="<?php echo $img_atts[0]; ?>" alt="" />
                     <?php }else{ ?>
					<img class="qt-tree" src="<?php echo get_template_directory_uri(); ?>/assets/images/cate3.png" alt="" /> 
					<?php } ?>
					<?php echo $item->get_name(); ?>
				</td>
				<td><?php echo $item->get_quantity(); ?></td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
				<td>Sub Total</td>
				<td><?php echo wc_price($order->get_subtotal()); ?></td>
				</tr>
				<tr>
				<th><strong>Total Cost</strong></th>
				<th><?php echo $order->get_formatted_order_total( ); ?></th>
			</tr>
		</tfoot>
		</table>
	</div>
   <?php
  die();
}

add_action('wp_ajax_nursery_profile_view', 'nursery_profile_view');
add_action('wp_ajax_nopriv_nursery_profile_view', 'nursery_profile_view');
function nursery_profile_view(){
	$user_id = $_POST['user_id'];
	//$user_id = 13;
	$user_info = get_userdata($user_id);
	 //echo "<pre>"; print_r($user_info);
	 //echo "hfhj".$user_info->display_name;
	 $stage_status = get_user_meta( $user_id, '_stage_status', true );
	 $inventory_sumbit_status = get_user_meta( $user_id, '_inventory_sumbit_status', true );
	 if($stage_status == '' || $stage_status == 1 && $inventory_sumbit_status == ''){
   ?>
   <div class="accordion-info">
    <a href="#" class="accordion-toggle"> <h3>Vendor Info:</h3></a>
    <ul class="order_desc accordion-content" >
	<li><span>Nursery Name:</span> <?php echo get_user_meta( $user_id, 'nursery_name', true ); ?></li>
	<li><span>Retail Address:</span> <?php echo get_user_meta( $user_id, 'user_location', true ); ?></li>
	<li><span>Website:</span> <?php echo get_user_meta( $user_id, 'nursery_website', true ); ?></li>
	<li><span>First Name:</span> <?php echo  $user_info->first_name; ?></li>
	<li><span>Last Name:</span> <?php echo  $user_info->last_name; ?></li>
	<li><span>Phone:</span> <?php echo get_user_meta( $user_id, 'billing_phone', true ); ?></li>
	<li><span>Email:</span> <?php echo  $user_info->user_email; ?></li>
	</ul>
	</div>
	<?php }else{ ?>
	<div class="accordion-info">
	<a href="#" class="accordion-toggle"><h3>Vendor Info:</h3></a>
    <ul class="order_desc accordion-content">
	<li><span>Nursery Name:</span> <?php echo  $user_info->display_name; ?></li>
	<li><span>Account Owner Name:</span> <?php echo get_user_meta( $user_id, '_account_owner_name', true ); ?></li>
	<li><span>Account Owner Email:</span> <?php echo get_user_meta( $user_id, '_account_owner_email', true ); ?></li>
	<li><span>Account Owner Phone:</span> <?php echo get_user_meta( $user_id, '_account_owner_phone', true ); ?></li>
	<li><span>Corporate Entity Name:</span> <?php echo get_user_meta( $user_id, '_corporate_entity_name', true ); ?></li>
	<li><span>Corporate Mailing Address:</span> <?php echo get_user_meta( $user_id, '_corporate_mailing_address', true ); ?></li>
	<li><span>Website:</span> <?php echo get_user_meta( $user_id, 'nursery_website', true ); ?></li>
	</ul>
	</div>
	<div class="accordion-info">
	<a href="#" class="accordion-toggle"><h3>Location Manager Contact Info:</h3></a>
	<ul class="order_desc accordion-content">
	<li><span>Full Name:</span><?php echo get_user_meta( $user_id, '_manager_full_name', true ); ?> </li>
	<li><span>Email Address:</span><?php echo get_user_meta( $user_id, '_manager_email', true ); ?> </li>
	<li><span>Phone Number:</span><?php echo get_user_meta( $user_id, '_manager_phone_number', true ); ?> </li>
	<li><span>Location:</span> <?php echo get_user_meta( $user_id, 'user_location', true ); ?></li>
	<li><span>Delivery Radius:</span><?php echo get_user_meta( $user_id, '_select_delivery_zone', true ); ?> </li>
	
    </ul>
	</div>
	<div class="accordion-info">
	<a href="#" class="accordion-toggle"><h3>Delivery Days:</h3></a>
	<ul class="order_desc accordion-content">
	<li><?php foreach(unserialize(get_user_meta( $user_id, '_select_delivery_days', true )) as $key => $value){
		// print_r($key); print_r($value['start_time']); echo ','; ?>
		 <ul>
			<li><span><?php echo $key; ?>: </span></li>
			<li><?php echo date('g:i a',strtotime($value['start_time'])); ?></li>
			<li><?php echo date('g:i a',strtotime($value['end_time'])); ?></li>
		 </ul>
		<?php } ?> </li>
    </ul>
	</div>
	<!-- point-of-contact -->
	<div class="card_bxfl">
		<a href="#" class="accordion-toggle">
			<h3>Selected Plant:</h3>
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
					$user_avaliable_plant = get_user_meta( $user_id, '_avaliable_plant', true );
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
						$field_add = '_nursery_product_plant_variation_add_'.$user_id;
						$field_price = '_nursery_product_plant_variation_retail_price_'.$user_id;
						$field_status = '_nursery_product_plant_variation_status_'.$user_id;
				
						//update_post_meta( $varible_id, $field_status , '' );
						$select_product_pot_status = get_post_meta( $varible_id, $field_status, true );
						$select_product_pot_add = get_post_meta( $varible_id, $field_add, true );
						$select_product_pot_size_price = get_post_meta( $varible_id, $field_price, true );
						if($select_product_pot_add == 'Yes'){
							//echo the_title().'  '.$pa_pot_size_term_name."<br>";
							$currency_symbol =  get_woocommerce_currency_symbol();
					?>
			<div class="col-lg-4 col-md-6 col-sm-12">
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
	</div>
   <?php
	}
  die();
}


add_action('wp_logout','auto_redirect_after_logout');

function auto_redirect_after_logout(){

  wp_redirect( home_url() );
  exit();

}

//////////Order On Hold Status Change/////////////////////////
add_action( 'woocommerce_payment_complete', 'my_change_status_function' );
function my_change_status_function( $order_id ) {

    $order = wc_get_order( $order_id );
    $order->update_status( 'on-hold' );

}
add_action( 'woocommerce_checkout_order_processed', 'changing_order_status_before_payment', 10, 3 );
function changing_order_status_before_payment( $order_id, $posted_data, $order ){
    $order->update_status( 'on-hold' );
	//if( $order->get_status() == 'processing' )
}


/**
 * @snippet       Phone Mask @ WooCommerce Checkout
 */
 add_filter( 'woocommerce_checkout_fields', 'bbloomer_checkout_phone_us_format' );
   
 function bbloomer_checkout_phone_us_format( $fields ) {
	 $fields['billing']['billing_phone']['placeholder'] = '123-456-7890';
	 $fields['billing']['billing_phone']['maxlength'] = 12; // 123-456-7890 is 12 chars long
	 return $fields;
 }
  
 add_action( 'woocommerce_after_checkout_form', 'bbloomer_phone_mask_us' );
  
 function bbloomer_phone_mask_us() {
	wc_enqueue_js( "
	   $('#billing_phone')
	   .keydown(function(e) {
		  var key = e.which || e.charCode || e.keyCode || 0;
		  var phone = $(this);         
		  if (key !== 8 && key !== 9) {
			if (phone.val().length === 3) {
			 phone.val(phone.val() + '-'); // add dash after char #3
			}
			if (phone.val().length === 7) {
			 phone.val(phone.val() + '-'); // add dash after char #7
			}
		  }
		  return (key == 8 ||
			key == 9 ||
			key == 46 ||
			(key >= 48 && key <= 57) ||
			(key >= 96 && key <= 105));
		 });
		  
	" );
 }
 
 add_action('wp_footer', 'format_checkout_billing_phone');
 function format_checkout_billing_phone() {
	 if ( is_account_page()  ) :
	 ?>
	 <script type="text/javascript">
	 jQuery( function($){
		 $('#billing_phone').on( 'input focusout', function() {
			 var p = $(this).val();
 
			 p = p.replace(/[^0-9]/g, '');
			 p = p.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
			 $(this).val(p);
		 });
	 });
	 </script>
	 <?php
	 endif;
 }

 /////////Edit account add field
 // Add the custom field 
add_action( 'woocommerce_edit_account_form', 'add_extra_field_to_edit_account_form' );
function add_extra_field_to_edit_account_form() {
    $user = wp_get_current_user();
    ?>
        <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
        <label for="billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_phone" id="billing_phone" value="<?php echo esc_attr( $user->billing_phone ); ?>" />
    </p>
    <?php
	?>
	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
	<label for="location"><?php _e( 'Pickup Location', 'woocommerce' ); ?><span class="required">*</span></label>
	<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_customer_location" id="billing_customer_location" value="<?php echo esc_attr( $user->billing_customer_location ); ?>" />
	<input type="hidden" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_customer_location_lat" id="billing_customer_location_lat" value="<?php echo esc_attr( $user->billing_customer_location_lat ); ?>" />
	<input type="hidden" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_customer_location_long" id="billing_customer_location_long" value="<?php echo esc_attr( $user->billing_customer_location_long ); ?>" />
</p>
<?php
}

// Save the custom field 'favorite_color' 
add_action( 'woocommerce_save_account_details', 'save_extra_field_account_details', 12, 2 );
function save_extra_field_account_details( $user_id ) {
    // For billing Phone
    if( isset( $_POST['billing_phone'] ) )
        update_user_meta( $user_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );

    // For Billing location (added related to your comment)
    if( isset( $_POST['billing_customer_location'] ) )
        update_user_meta( $user_id, 'billing_customer_location', sanitize_text_field( $_POST['billing_customer_location'] ) );
		update_user_meta( $user_id, 'billing_customer_location_lat', sanitize_text_field( $_POST['billing_customer_location_lat'] ) );
		update_user_meta( $user_id, 'billing_customer_location_long', sanitize_text_field( $_POST['billing_customer_location_long'] ) );
}




function shortcode_my_orders( $atts ) {
    extract( shortcode_atts( array(
        'order_count' => -1
    ), $atts ) );

    ob_start();
    wc_get_template( 'myaccount/my-orders.php', array(
       // 'current_user'  => get_user_by( 'id', get_current_user_id() ),
        'order_count'   => $order_count
    ) );
    return ob_get_clean();
}
add_shortcode('my_orders', 'shortcode_my_orders');



///////////AFTER 24 HOURS ORDER LOCATION CHANGE///////////////////////////////////////////////
//add_action( 'init', 'wp_woocommerce_checkout_order_change_action' );
function wp_woocommerce_checkout_order_change_action( $order ){
	$orders = wc_get_orders( array(
		'numberposts' => -1,
		'status' => 'wc-on-hold',
		) );
	 //echo "<pre>"; print_r($orders);
	 foreach( $orders as $order ){ 
		
	$order_id = $order->get_id();
	$assign_order_date = get_post_meta( $order_id, '_assign_order_datetime', true );
	$location_lat_value = get_post_meta( $order_id, 'billing_customer_location_lat', true );
	$location_long_value = get_post_meta( $order_id, 'billing_customer_location_long', true );

	$ref = array($location_lat_value, $location_long_value);


	$items = $order->get_items();
	foreach ( $items as $item ) {
		$product_name = $item->get_name();
		$plant_id = $item->get_product_id();
		$product_variation_id = $item->get_variation_id();
	}
	

	$args = array(
		'role'    => 'nursery',
		'orderby' => 'user_nicename',
		'order'   => 'ASC'
	);
	$users = get_users( $args );
	$items = array();
	foreach ( $users as $user ) {
		$user_id = $user->ID;
		$location_lat = get_user_meta( $user_id, 'user_location_lat', true ); 
		$location_long = get_user_meta( $user_id, 'user_location_long', true ); 
		$user_avaliable_plant = get_user_meta( $user_id, '_avaliable_plant', true );
		if(in_array($plant_id, unserialize($user_avaliable_plant))){
			$items[] = array($user_id, $location_lat, $location_long);
		}else{
			$items[] = array($user_id, $location_lat, $location_long);
		}
		
	}
	$distances = array_map(function($item) use($ref) {
		$a = array_slice($item, -2);
		return distance($a, $ref);
	}, $items);
	
	asort($distances);

	$order->update_meta_data( '_assign_order', $items[key($distances)][1] );
	$order->update_meta_data( '_assign_order_datetime', date("Y-m-d h:i:s") );
	$order->update_status('wc-on-hold');
	//update_status("wc-on-hold", 'on-hold', true); //wc-pending //wc-processing
	$order->save();
  }
}



// Add a new column to Admin products list with a custom order
 //$arr = array( 'acquirable' => __( 'Credits', 'wootix' ) ) ;
///array_splice( $columns, 6, 0, $arr ) ;

add_filter( 'manage_edit-product_columns', 'acquirable_product_column', 10);
function acquirable_product_column($columns){
	unset( $columns['product_tag'] );
    $new_columns = [];
    foreach( $columns as $key => $column ){
        $new_columns[$key] = $columns[$key];
        if( $key == 'product_cat' ) { 
             $new_columns['acquirable'] = __( 'Acquirable','woocommerce');
        }
    }
    return $new_columns;
}

// Add content to new column raows in Admin products list
add_action( 'manage_product_posts_custom_column', 'acquirable_product_column_content', 10, 2 );
function acquirable_product_column_content( $column, $product_id ){
    global $post;

    if( $column =='acquirable' ){
		$product_acquirable = get_post_meta( $product_id, 'product_acquirable', true );
		?>
		<input type="checkbox"  <?php if($product_acquirable == 'For Sale'){ echo 'checked'; } ?> data-id="<?php echo $product_id; ?>"  data-toggle="toggle" data-on="For Sale" data-off="Not For Sale"  data-onstyle="success" data-offstyle="danger" data-style="pro-acquirable" id="pro_acquirable" >
		
		<?php
       
    }
}
add_action('admin_footer', 'my_admin_footer_extra');
function my_admin_footer_extra() {

	?>
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			
			jQuery(".pro-acquirable").on('click', function () {
				var product_id = jQuery(this).find("#pro_acquirable").attr("data-id");
                  
				var data = {
					'action': 'product_acquirable_update_function',
					'product_id': product_id
				};
				// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
				jQuery.post(ajaxurl, data, function(response) {
					//alert('Got this from the server: ' + response);
					alert('Successfully changes status!');
				});
			});

		
		});
	</script>
	<?php 
}
add_action('admin_head', 'my_admin_header_function');
function my_admin_header_function() {
	echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">';
	echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" >';
	?>
	<style>
	.toggle.pro-acquirable{ height:44px !important; }
	.toggle.pro-acquirable .btn{ font-size: 16px !important; }
	.toggle.pro-acquirable, .toggle-on.pro-acquirable, .toggle-off.pro-acquirable { border-radius: 20rem; }
	.toggle.pro-acquirable .toggle-handle { border-radius: 20rem; }
	</style>
  <?php 
}

add_action( 'wp_ajax_product_acquirable_update_function', 'product_acquirable_update_function' );

    function product_acquirable_update_function() {
		
		$product_id = $_POST['product_id'];
		$product_acquirable = get_post_meta( $product_id, 'product_acquirable', true );
		if(!empty($product_acquirable)){
		if($product_acquirable == 'For Sale' ){
		  $acquirable = 'Not For Sale';
		}else{
			$acquirable = 'For Sale';
		}
	}else{
		$acquirable = 'For Sale';
	}
		update_post_meta($product_id, 'product_acquirable', $acquirable );
		echo $product_id;
        wp_die(); 
}

// Change the shop query
add_action( 'woocommerce_product_query', 'action_woocommerce_product_query', 10, 2 );
function action_woocommerce_product_query( $q, $query ) {
    // Returns true when on the product archive page (shop) & isset
    if ( is_shop()  ) {        
        // Get any existing meta query
        $meta_query = $q->get( 'meta_query' );
        
        // Settings
        
        $meta_query[] = array(
            'key' => 'product_acquirable',
            'value' => 'For Sale',
            'compare' => '=',
        );

        // Set the new merged meta query
		$exclude_plant_list = get_option('exclude_plant_list');
	    $q->set( 'post__not_in', $exclude_plant_list );
        $q->set( 'meta_query', $meta_query );
		$q->set('posts_per_page', 12);
	
    }
}


add_filter( 'woocommerce_product_query_tax_query', 'exclude_specific_product_attribute_query', 10, 2 );
function exclude_specific_product_attribute_query( $tax_query, $query ) {
    // Only on Product Tag archives pages
    if( !is_shop()  ) return $tax_query;

	if (!empty($_COOKIE['customer_usda_zip'])) {
		$cookieValue = $_COOKIE['customer_usda_zip'];
		$decoded_json = json_decode(stripslashes($_COOKIE['customer_usda_zip']),true);
		$customer_usda_zip = $decoded_json['zone'];
		//print_r($decoded_json);
	 } else{
		if ( !is_user_logged_in() ) {
		   $customer_usda_zip = "";
		}else{
		   $customer_usda_zip_array = unserialize(get_user_meta( get_current_user_id(), '_customer_usda_zip', true ));
		   if(!empty($customer_usda_zip_array)){
		   $customer_usda_zip = $customer_usda_zip_array['zone'];
		   }else{
			  $customer_usda_zip = ""; 
		   }
		}
	 }
	 if(!empty($customer_usda_zip)){
    // HERE Define your product category SLUGs to be excluded 
    $terms = array( $customer_usda_zip ); // SLUGs only
    // The taxonomy for Product attribute
    $taxonomy = 'usda-zone'; 

    // Add your criteria
    $tax_query[] = array(
        'taxonomy' => 'pa_'.$taxonomy,
        'field'    => 'slug', // Or 'name' or 'term_id'
        'terms'    => $terms,
        'operator' => 'IN', 
    );
   }
    return $tax_query;
}

//woocommerce_related_products


add_filter( 'woocommerce_output_related_products_args', function( $args )
{
	if (!empty($_COOKIE['customer_usda_zip'])) {
		$cookieValue = $_COOKIE['customer_usda_zip'];
		$decoded_json = json_decode(stripslashes($_COOKIE['customer_usda_zip']),true);
		$customer_usda_zip = $decoded_json['zone'];
		//print_r($decoded_json);
	 } else{
		if ( !is_user_logged_in() ) {
		   $customer_usda_zip = "";
		}else{
		   $customer_usda_zip_array = unserialize(get_user_meta( get_current_user_id(), '_customer_usda_zip', true ));
		   if(!empty($customer_usda_zip_array)){
		   $customer_usda_zip = $customer_usda_zip_array['zone'];
		   }else{
			  $customer_usda_zip = ""; 
		   }
		}
	 }

	$taxonomy = 'usda-zone'; 
	$terms = array( $customer_usda_zip );
	if(!empty($customer_usda_zip)){
		$tax_query = array( 
			//'relation' => 'AND',
			array(
				'taxonomy' => 'pa_'.$taxonomy,
				'field'    => 'slug',
				'terms'    => $terms,
				'operator' => 'IN'
			),
		);
	}
	$exclude_plant_list = get_option('exclude_plant_list');
    $args = wp_parse_args( array(
        'post__not_in' => $exclude_plant_list,
		'posts_per_page' => 4,
        'meta_query' => array (
			'key' => 'product_acquirable',
			'value' => 'For Sale',
			'compare' => '=',
		),
		'tax_query' => $tax_query,
    ), $args );
    return $args;
});

////Update zipcode
add_action('init', 'customer_update_zipcode');
function customer_update_zipcode(){
	if ( is_user_logged_in() ) {
		$user_id = get_current_user_id();
		if (!empty($_COOKIE['customer_usd_zipcode'])) {
            $customer_usd_zipcode = $_COOKIE['customer_usd_zipcode'];
         }else{
            $customer_usd_zipcode = "";
         }
		 ///echo "hiiiiiiiii".$customer_usd_zipcode;
		 $zipd = get_user_meta( $user_id, '_customer_usd_zipcode' , true );
		 if($customer_usd_zipcode !=  $zipd && $customer_usd_zipcode!=""){
		 update_user_meta( $user_id, '_customer_usd_zipcode', $customer_usd_zipcode);
		 }


         if (!empty($_COOKIE['customer_usda_zip'])) {
			$cookieValue = $_COOKIE['customer_usda_zip'];
			$decoded_json = json_decode(stripslashes($_COOKIE['customer_usda_zip']),true);
			$customer_usda_zip = $decoded_json['zone'];
         } else{
            $customer_usda_zip = "#"; 
         }
		 if($customer_usd_zipcode !=  $zipd && $customer_usd_zipcode!=""){
		 update_user_meta( $user_id, '_customer_usda_zip', serialize($decoded_json) );
		 }
	}


////////Exclude Plant
$argsss     = array( 'post_type' => 'product', 'posts_per_page' => -1 );
$plant_list = get_posts( $argsss ); 
	
	$exclude_result = array();
	foreach ( $plant_list as $plants ) {
	   $plant_id = $plants->ID;
	  $check = check_plant_exists($plant_id);
	  if($check != 'Yes'){
		$exclude_result[] = $plant_id;
	  }
	  
 }
 update_option('exclude_plant_list', $exclude_result);

}
function check_plant_exists($plant_id){
	$args = array(
		'role'    => 'nursery',
		'orderby' => 'user_nicename',
		'order'   => 'ASC'
	 );
	 $users = get_users( $args );
	 $check = "";
	 foreach ( $users as $user ) {
		$user_id = $user->ID;
		$user_avaliable_plant = get_user_meta( $user_id, '_avaliable_plant', true );
		
		if(in_array($plant_id, unserialize($user_avaliable_plant))){
			$check = "Yes";
			break;
		}
	 }
	 return  $check;
}

////////Miles get
function get_distances_miles($lat1, $lon1, $lat2, $lon2, $unit) {
	if (($lat1 == $lat2) && ($lon1 == $lon2)) {
	  return 0;
	}
	else {
	  $theta = $lon1 - $lon2;
	  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	  $dist = acos($dist);
	  $dist = rad2deg($dist);
	  $miles = $dist * 60 * 1.1515;
	  $unit = strtoupper($unit);
  
	  if ($unit == "K") {
		return ($miles * 1.609344);
	  } else if ($unit == "N") {
		return ($miles * 0.8684);
	  } else {
		return $miles;
	  }
	}
  }

  //custom_sticker 
//add_action( 'woocommerce_shop_loop_item_title', 'custom_field_display_below_title', 2 );
add_action( 'woocommerce_before_shop_loop_item_title', 'custom_field_display_below_title', 2 );
function custom_field_display_below_title(){
    global $product;
	$plant_id = $product->get_id();
	
    // Get the custom field value
	if (!empty($_COOKIE['customer_usda_zip'])) {
			//$customer_usda_zip_array = $_COOKIE['customer_usda_zip'];
			$customer_usda_zip_array = json_decode(stripslashes($_COOKIE['customer_usda_zip']),true);
			$location_lat2 = $customer_usda_zip_array['coordinates']['lat'];
			$location_long2 = $customer_usda_zip_array['coordinates']['lon'];

	}else{
		   $customer_usda_zip_array = unserialize(get_user_meta( get_current_user_id(), '_customer_usda_zip', true ));
		if(!empty($customer_usda_zip_array)){
			$location_lat2 = $customer_usda_zip_array['coordinates']['lat'];
			$location_long2 = $customer_usda_zip_array['coordinates']['lon'];
		}else{
			$location_lat2 = '34.09';
			$location_long2 = '-118.406';
		}
	}
	
	$args = array(
		'role'    => 'nursery',
		'orderby' => 'user_nicename',
		'order'   => 'ASC'
	);
	$users = get_users( $args );
	
	$custom_sticker = '';
	foreach ( $users as $user ) {
		$user_id = $user->ID;
		$location_lat1 = get_user_meta( $user_id, 'user_location_lat', true ); 
		$location_long1 = get_user_meta( $user_id, 'user_location_long', true ); 
		$user_avaliable_plant = get_user_meta( $user_id, '_avaliable_plant', true );
		if(in_array($plant_id, unserialize($user_avaliable_plant))){
			
			$customer_delivery_zone = get_distances_miles($location_lat1, $location_long1, $location_lat2, $location_long2, "M");
			$select_delivery_zone = get_user_meta( $user_id, '_select_delivery_zone' , true );
			if($customer_delivery_zone <= $customer_delivery_zone){
				$custom_sticker = "This plant works in your zone.";
				break;
			}else{
				$custom_sticker = "This plant does not work in your zone.";
			}
			
		}else{
			
			$custom_sticker = "This plant does not work in your zone.";
		}
	}
	if ( !is_user_logged_in() && empty($_COOKIE['customer_usda_zip'])) {
       $custom_sticker = "";
	}
	
	//$custom_field = "This plant does not work in your zone.";
	//echo get_distances_miles(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
    //echo get_distances_miles(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
    //echo get_distances_miles(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";
    // Display
    if( ! empty($custom_sticker) ){
        echo '<div class="plants-zones">'.$custom_sticker.'</div>';
    }
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
function add_custom_text_after_product_title(){

	global $product;
	$plant_id = $product->get_id();
	
    // Get the custom field value
	if (!empty($_COOKIE['customer_usda_zip'])) {
			//$customer_usda_zip_array = $_COOKIE['customer_usda_zip'];
			$customer_usda_zip_array = json_decode(stripslashes($_COOKIE['customer_usda_zip']),true);
			$location_lat2 = $customer_usda_zip_array['coordinates']['lat'];
			$location_long2 = $customer_usda_zip_array['coordinates']['lon'];

	}else{
		   $customer_usda_zip_array = unserialize(get_user_meta( get_current_user_id(), '_customer_usda_zip', true ));
		if(!empty($customer_usda_zip_array)){
			$location_lat2 = $customer_usda_zip_array['coordinates']['lat'];
			$location_long2 = $customer_usda_zip_array['coordinates']['lon'];
		}else{
			$location_lat2 = '34.09';
			$location_long2 = '-118.406';
		}
	}
	
	$args = array(
		'role'    => 'nursery',
		'orderby' => 'user_nicename',
		'order'   => 'ASC'
	);
	$users = get_users( $args );
	
	$custom_text = '';
	foreach ( $users as $user ) {
		$user_id = $user->ID;
		$location_lat1 = get_user_meta( $user_id, 'user_location_lat', true ); 
		$location_long1 = get_user_meta( $user_id, 'user_location_long', true ); 
		$user_avaliable_plant = get_user_meta( $user_id, '_avaliable_plant', true );
		if(in_array($plant_id, unserialize($user_avaliable_plant))){

			$customer_delivery_zone = get_distances_miles($location_lat1, $location_long1, $location_lat2, $location_long2, "M");
			//$customer_delivery_zone = "15";
			//$select_delivery_zone = get_user_meta( $user_id, '_select_delivery_zone' , true );
			if($customer_delivery_zone >= 6 && $customer_delivery_zone <= 10.99){
				$custom_text = '<span class="extra-fee-sticker">This plant is far away and may cost more</span>';
		   }else if($customer_delivery_zone >= 11 && $customer_delivery_zone <= 15){
				$custom_text = '<span class="extra-fee-sticker">This plant is far away and may cost more</span>';
		   }else{
			   $custom_text = '<span class="extra-fee-sticker">This plants from Out of Zone</span>';
		   }

		}else{

			$custom_text = "";
		}
	}
	if ( !is_user_logged_in() && empty($_COOKIE['customer_usda_zip'])) {
       $custom_text = "";
	}

	if($customer_delivery_zone >= 6 && $customer_delivery_zone <= 10.99){
		 $custom_text = '<span class="extra-fee-sticker">This plant is far away and may cost more</span>';
	}else if($customer_delivery_zone >= 11 && $customer_delivery_zone <= 15){
		 $custom_text = '<span class="extra-fee-sticker">This plant is far away and may cost more</span>';
	}else{
		$custom_text = '';
	}
   
    the_title( '<h3 class="product_title entry-title">', $custom_text.'</h3>' );
}
add_action( 'woocommerce_single_product_summary', 'add_custom_text_after_product_title', 5);



/////////////Nursery Inventory START////////////////
add_action( 'wp_ajax_nursery_ajax_register_inventory', 'nursery_ajax_register_inventory' );
function nursery_ajax_register_inventory(){

    //Step 2
	$account_owner_name  = $_POST['account_owner_name'];
	$account_owner_email  = $_POST['account_owner_email'];
	$account_owner_phone  = $_POST['account_owner_phone'];
	$corporate_entity_name  = $_POST['corporate_entity_name'];
	$corporate_mailing_address  = $_POST['corporate_mailing_address'];
	$manager_full_name_1  = $_POST['manager_full_name_1'];
	$manager_email_1  = $_POST['manager_email_1'];
	$manager_phone_number_1  = $_POST['manager_phone_number_1'];
	$manager_location_1  = $_POST['manager_location_1'];
	$manager_location_lat_1  = $_POST['manager_location_lat_1'];
	$manager_location_long_1  = $_POST['manager_location_long_1'];
	$manager_delivery_radius_1  = $_POST['manager_delivery_radius_1'];
	$input_delivery_days_1  = $_POST['input_delivery_days_1'];
	
	//echo " hi";
	//var_dump($_POST);
	update_user_meta(get_current_user_id(), '_account_owner_name', $account_owner_name);
	update_user_meta(get_current_user_id(), '_account_owner_email', $account_owner_email);
	update_user_meta(get_current_user_id(), '_account_owner_phone', $account_owner_phone);
	update_user_meta(get_current_user_id(), '_corporate_entity_name', $corporate_entity_name);
	update_user_meta(get_current_user_id(), '_corporate_mailing_address', $corporate_mailing_address);
	update_user_meta(get_current_user_id(), '_manager_full_name', $manager_full_name_1);
	update_user_meta(get_current_user_id(), '_manager_email', $manager_email_1);
	update_user_meta(get_current_user_id(), '_manager_phone_number', $manager_phone_number_1);
	update_user_meta(get_current_user_id(), 'user_location', $manager_location_1);
	update_user_meta(get_current_user_id(), 'user_location_lat', $manager_location_lat_1);
	update_user_meta(get_current_user_id(), 'user_location_long', $manager_location_long_1);

	update_user_meta(get_current_user_id(), '_select_delivery_zone', $manager_delivery_radius_1);
	$delivery_days_arr = array();
	foreach($input_delivery_days_1 as $days){
		if($days == 'Sunday'){
			$delivery_days_arr[$days] = array('start_time' => $_POST['delivery_days_sunday_start_time'], 'end_time' => $_POST['delivery_days_sunday_end_time'] );
		}
		if($days == 'Monday'){
			$delivery_days_arr[$days] = array('start_time' => $_POST['delivery_days_monday_start_time'], 'end_time' => $_POST['delivery_days_monday_end_time'] );
		}
		if($days == 'Tuesday'){
			$delivery_days_arr[$days] = array('start_time' => $_POST['delivery_days_tuesday_start_time'], 'end_time' => $_POST['delivery_days_tuesday_end_time'] );
		}
		if($days == 'Wednesday'){
			$delivery_days_arr[$days] = array('start_time' => $_POST['delivery_days_wednesday_start_time'], 'end_time' => $_POST['delivery_days_wednesday_end_time'] );
		}
		if($days == 'Thursday'){
			$delivery_days_arr[$days] = array('start_time' => $_POST['delivery_days_thursday_start_time'], 'end_time' => $_POST['delivery_days_thursday_end_time'] );
		}
		if($days == 'Friday'){
			$delivery_days_arr[$days] = array('start_time' => $_POST['delivery_days_friday_start_time'], 'end_time' => $_POST['delivery_days_friday_end_time'] );
		}
		if($days == 'Saturday'){
			$delivery_days_arr[$days] = array('start_time' => $_POST['delivery_days_saturday_start_time'], 'end_time' => $_POST['delivery_days_saturday_end_time'] );
		}

	}
	   update_user_meta(get_current_user_id(), '_select_delivery_days', serialize($delivery_days_arr));
	
		update_user_meta(get_current_user_id(), '_inventory_sumbit_status', '1');


		///send Email
		$from = get_field("sender_email", "option"); // Set whatever you want like mail@yourdomain.com
			 
		if(!(isset($from) && is_email($from))) {		
			$sitename = strtolower( $_SERVER['SERVER_NAME'] );
			if ( substr( $sitename, 0, 4 ) == 'www.' ) {
				$sitename = substr( $sitename, 4 );					
			}
			$from = 'admin@'.$sitename; 
		}

		$user_info = get_userdata(get_current_user_id());
		$to = $user_info->user_email;
		$subject = 'Inventory Submit';
		$message = "<p>Dear ".$user_info->first_name.",<br> Thank you for your interest in becoming a Florish Nursery Partner!  We are currently reviewing your application.  Here is the link to your Nursery Portal; you may check the status of your account here.  If you would like to schedule a call with our COO to learn more about the program, you can schedule a meeting using this Calendly link.</p>";
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: '.get_bloginfo( 'name' ).' <'.$from.'>' . "\r\n";
			
		mail( $to, $subject, $message, $headers );
		
		//wp_redirect( esc_url( get_page_link( 70 ) ) );
	die();
}

add_action('wp_ajax_nursery_reg_status_change', 'nursery_reg_status_change');
function nursery_reg_status_change(){

	 $user_id = $_POST['user_id'];
	 $in_status = $_POST['in_status'];

	 ///Stage 1 approved

	 if($in_status == 1 && !empty($user_id) && is_numeric($user_id)){

		$from = get_field("sender_email", "option"); // Set whatever you want like mail@yourdomain.com
			 
		if(!(isset($from) && is_email($from))) {		
			$sitename = strtolower( $_SERVER['SERVER_NAME'] );
			if ( substr( $sitename, 0, 4 ) == 'www.' ) {
				$sitename = substr( $sitename, 4 );					
			}
			$from = 'admin@'.$sitename; 
		}

		$user_info = get_userdata($user_id);
		$to = $user_info->user_email;
		$subject = 'Approved Stage 1 Application';
		$message = "<p>Dear ".$user_info->first_name.",<br> Congratulations, you have been approved as a Florish Nursery Partner!  Click the link below to begin on-boarding your nursery!</p><p><a href='".esc_url( get_page_link( 14 ))."' target='_blank'>Click Here</a></p>";
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: '.get_bloginfo( 'name' ).' <'.$from.'>' . "\r\n";
			
		mail( $to, $subject, $message, $headers );

		update_user_meta( $user_id, '_stage_status', $in_status );	
		update_user_meta( $user_id, '_member_status', 'active' );	
        delete_user_meta( $user_id, 'code_to_be_activated' ); 
		echo $user_info->first_name." Stage 1 Approved";

	 }
	 ///Stage 2 approved

	 if($in_status == '2' && !empty($user_id) && is_numeric($user_id)){

		$from = get_field("sender_email", "option"); // Set whatever you want like mail@yourdomain.com
			 
		if(!(isset($from) && is_email($from))) {		
			$sitename = strtolower( $_SERVER['SERVER_NAME'] );
			if ( substr( $sitename, 0, 4 ) == 'www.' ) {
				$sitename = substr( $sitename, 4 );					
			}
			$from = 'admin@'.$sitename; 
		}

		$user_info = get_userdata($user_id);
		$to = $user_info->user_email;
		$subject = 'Approved Stage 2 Application';
		$message = "<p>Dear ".$user_info->first_name.",<br> Congratulations, you are now live on Florish!  Here is the link to your Florish Dashboard where you will manage your orders, view payment statuses, adjust inventory, and more! <a href='".esc_url( get_page_link( 14 ))."' target='_blank'>Click Here</a></p>";
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: '.get_bloginfo( 'name' ).' <'.$from.'>' . "\r\n";
			
		mail( $to, $subject, $message, $headers );

		update_user_meta( $user_id, '_stage_status', $in_status );	
		echo $user_info->first_name." Stage 2 Approved";

	 }

    ///Stage 1 Decline

	 if($in_status == 11 && !empty($user_id) && is_numeric($user_id)){

		$from = get_field("sender_email", "option"); // Set whatever you want like mail@yourdomain.com
			 
		if(!(isset($from) && is_email($from))) {		
			$sitename = strtolower( $_SERVER['SERVER_NAME'] );
			if ( substr( $sitename, 0, 4 ) == 'www.' ) {
				$sitename = substr( $sitename, 4 );					
			}
			$from = 'admin@'.$sitename; 
		}

		$user_info = get_userdata($user_id);
		$to = $user_info->user_email;
		$subject = 'Denied Stage 1 Application';
		$message = "<p>Dear ".$user_info->first_name.",<br> Thank you for your application to become a Florish Nursery Partner. Unfortunately, your application was denied.  If you believe there was an error, please contact us at Hello@Florish.co”. Access to the dashboard will be denied but Florish admin will still have a record of the denied nursery in its Admin Portal.
		</p>";
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: '.get_bloginfo( 'name' ).' <'.$from.'>' . "\r\n";
			
		mail( $to, $subject, $message, $headers );

		update_user_meta( $user_id, '_stage_status', $in_status );	
		echo $user_info->first_name." Stage 1 Denied";
	 }

///Stage 2 Decline

if($in_status == 22 && !empty($user_id) && is_numeric($user_id)){

	$from = get_field("sender_email", "option"); // Set whatever you want like mail@yourdomain.com
		 
	if(!(isset($from) && is_email($from))) {		
		$sitename = strtolower( $_SERVER['SERVER_NAME'] );
		if ( substr( $sitename, 0, 4 ) == 'www.' ) {
			$sitename = substr( $sitename, 4 );					
		}
		$from = 'admin@'.$sitename; 
	}

	$user_info = get_userdata($user_id);
	$to = $user_info->user_email;
	$subject = 'Denied Stage 2 Application';
	$message = "<p>Dear ".$user_info->first_name.",<br> Thank you for your application to become a Florish Nursery Partner. Unfortunately, your application was denied.  If you believe there was an error, please contact us at Hello@Florish.co”. Access to the dashboard will be denied but Florish admin will still have a record of the denied nursery in its Admin Portal.
	</p>";
	
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: '.get_bloginfo( 'name' ).' <'.$from.'>' . "\r\n";
		
	mail( $to, $subject, $message, $headers );

	update_user_meta( $user_id, '_stage_status', $in_status );	
	echo $user_info->first_name." Stage 2 Denied";
 }

 ///Deactive Account

if($in_status == 'inactive' && !empty($user_id) && is_numeric($user_id)){

	$from = get_field("sender_email", "option"); // Set whatever you want like mail@yourdomain.com
		 
	if(!(isset($from) && is_email($from))) {		
		$sitename = strtolower( $_SERVER['SERVER_NAME'] );
		if ( substr( $sitename, 0, 4 ) == 'www.' ) {
			$sitename = substr( $sitename, 4 );					
		}
		$from = 'admin@'.$sitename; 
	}

	$user_info = get_userdata($user_id);
	$to = $user_info->user_email;
	$subject = 'Deactivated Your Account';
	$message = "<p>Dear ".$user_info->first_name.",<br> . Unfortunately, your application was deactivated.  If you believe there was an error, please contact us at Hello@Florish.co”. Access to the dashboard will be deactivated but Florish admin will still have a record of the deactivated nursery in its Admin Portal.
	</p>";
	
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: '.get_bloginfo( 'name' ).' <'.$from.'>' . "\r\n";
		
	mail( $to, $subject, $message, $headers );
	update_user_meta( $user_id, '_member_status', 'inactive' );
	//update_user_meta( $user_id, '_stage_status', $in_status );	
	//update_user_meta( $user_id, '_member_status', 'active' );	
    //delete_user_meta( $user_id, 'code_to_be_activated' ); 
	echo $user_info->first_name." Deactivated";
 }

	 die();
}


add_action('wp_ajax_nursery_reg_add_inv', 'nursery_reg_add_inv');
function nursery_reg_add_inv(){

	 $search_plant = $_POST['search_plant'];
	 $post_id = $_POST['plant_id'];
	 if(empty($post_id)){
	 $args = array(
		'posts_per_page' => -1,
		'post_type' => 'product',
		'orderby' => 'title',
		'order' => 'ASC',
		's'     => $search_plant,
		'meta_query' => array(
			array(
				'key' => 'product_acquirable',
				'value' => 'For Sale',
				'compare' => '=',
			)
		),
	);
}else{
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'product',
		'orderby' => 'title',
		'order' => 'ASC',
		'post__in' => array($post_id),
		's'     => $search_plant,
		'meta_query' => array(
			array(
				'key' => 'product_acquirable',
				'value' => 'For Sale',
				'compare' => '=',
			)
		),
	);
}
	$products = new WP_Query( $args );
	if($products->have_posts()) : 
	while ( $products->have_posts() ) : $products->the_post();
	$user_avaliable_plant = get_user_meta( get_current_user_id(), '_avaliable_plant', true );
	// print_r(unserialize($user_avaliable_plant)); 
	$plant_id = get_the_ID();
	$attributes = wc_get_product_terms( get_the_ID(), 'pa_nursery-pot-size' );
	$select_product_pot_size = get_post_meta( get_the_ID(), '_nursery_product_plant_list'.get_current_user_id(), true ); 
	$product = wc_get_product($plant_id);
	
	if ( $product->is_type( 'variable' ) ) {
	if(!empty($attributes)){
		$available_variations = $product->get_available_variations();
		//echo "<pre>"; print_r($available_variations);
	 ?>
    <div class="pn_block">	
		<div class="plant-name">
			<h5><?php the_title(); ?></h5>
			<input name="select_product_name_1[]" type="hidden" <?php if(in_array($plant_id, unserialize($user_avaliable_plant))){ echo "checked"; } ?> value="<?php echo get_the_ID(); ?>" class="plant-name" id="product<?php echo get_the_ID(); ?>" >
		</div>
		<div class="content-wrapper">
			<div class="lft-wrap">
				<div class="lft-inr">
					<span>Size</span>
					<span>Price</span>
				</div>
			</div>
			<div class="main-box">
			<?php foreach ($available_variations as $available_variation) { 
				$pot_size_slug = $available_variation['attributes']['attribute_pa_nursery-pot-size'];
				$varible_id = $available_variation['variation_id'];
				$display_price = $available_variation['display_price'];
				//$display_price = "";
				$pa_pot_size_ = 'pa_nursery-pot-size';
				$pa_pot_size_meta = get_post_meta($available_variation['variation_id'], 'attribute_' . $pa_pot_size_, true);
				$pa_pot_size_term = get_term_by('slug', $pa_pot_size_meta, $pa_pot_size_);
				$pa_pot_size_term_name = $pa_pot_size_term->name;
				$pa_pot_size_term_id =  $pa_pot_size_term->term_id;
				$field_price = '_nursery_product_plant_variation_retail_price_'.get_current_user_id();
				$select_product_pot_size_price = get_post_meta( $varible_id, $field_price, true );
				if(!empty($select_product_pot_size_price)){
					$display_price = $select_product_pot_size_price;
				}
				?>
				<div class="flx-box">
					<label><input type="checkbox" name="select_product_pot_size_1_<?php echo get_the_ID(); ?>[]" <?php if(in_array($varible_id, unserialize($select_product_pot_size))){ echo "checked"; } ?> value="<?php echo $varible_id; ?>" id="product_attr_<?php echo get_the_ID(); ?>_<?php echo $pa_pot_size_term_name; ?>" class="product_attr_<?php echo get_the_ID(); ?>"> <?php echo $pa_pot_size_term_name; ?></label>
					<input type="number"  placeholder="Your retail price" name="select_product_pot_size_retail_price_1_<?php echo get_the_ID(); ?>_<?php echo $varible_id; ?>" class="form-control" value="<?php echo $display_price; ?>" />
					<!-- <input type="hidden" name="select_product_pot_size_variation_id_1_<?php echo get_the_ID(); ?>[]" class="form-control" value="<?php echo $varible_id; ?>" /> -->
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	 <?php
	 } }
		endwhile; 
		endif;
		wp_reset_postdata();
	 die();
}

//add_action( 'wp_ajax_nursery_ajax_register_inventory', 'nursery_ajax_register_inventory' );
add_action( 'init', 'nursery_add_inventory' );
function nursery_add_inventory(){
	if(isset($_POST['all_done']) && isset($_POST['select_product_name_1'])){
		
    $avaliable_plant = serialize($_POST['select_product_name_1']);
        foreach($_POST['select_product_name_1'] as $plant_id){
			//$plant_id;
			foreach($_POST['select_product_pot_size_1_'.$plant_id] as $vaiation_id){
			  // echo $vaiation_id."   "."  ".$_POST['select_product_pot_size_retail_price_1_'.$plant_id.'_'.$vaiation_id]."<br>";
			   $field_price = '_nursery_product_plant_variation_retail_price_'.get_current_user_id();
			   $field_status = '_nursery_product_plant_variation_status_'.get_current_user_id();
			   $field_insert = '_nursery_product_plant_variation_add_'.get_current_user_id();
			   update_post_meta( $vaiation_id, $field_price , $_POST['select_product_pot_size_retail_price_1_'.$plant_id.'_'.$vaiation_id] );
			   update_post_meta( $vaiation_id, $field_status , 'Yes' );
			   update_post_meta( $vaiation_id, $field_insert , 'Yes' );
			}
			$field_list = '_nursery_product_plant_list'.get_current_user_id();
			//echo "<pre>"; print_r($_POST['select_product_pot_size_1_'.$plant_id]);
			update_post_meta( $plant_id, $field_list , serialize($_POST['select_product_pot_size_1_'.$plant_id]) );
		}
		
		update_user_meta(get_current_user_id(), '_avaliable_plant', $avaliable_plant);
		//die();
		wp_redirect( esc_url( get_page_link( 1529 ) ) );
	}


	///////////////////////////////Markets Table START/////////////////////////////////////// 
	 global $wpdb;
	$wpdb->show_errors();
	$charset_collate = $wpdb->get_charset_collate();
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		define( 'WP_NURSERY_MARKETS_DB_VERSION', '7.0' );
		if ( get_option( "nursery_markets_db_version" ) != WP_NURSERY_MARKETS_DB_VERSION ) {
			
			dbDelta( "CREATE TABLE {$wpdb->prefix}nurser_market_table (
				id int(11) NOT NULL AUTO_INCREMENT,
				market_name varchar(255) NOT NULL,
				full_address text NOT NULL,
			    location varchar(255),
				miles varchar(255),
				latitude varchar(255),
				longitude varchar(255),
				zipcode varchar(255),
				take_rate varchar(255),
				nurser_count int(11) NOT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;" );
			
			update_option( 'nursery_markets_db_version', WP_NURSERY_MARKETS_DB_VERSION );
		}

		/////Add Market
		if(isset($_POST['added_market']) && isset($_POST['market_name'])){

			$market_tablename = $wpdb->prefix."nurser_market_table";
			$market_name = $_POST['market_name'];
			$fulladdress = $_POST['fulladdress'];
			$latitude = $_POST['latitude'];
			$longitude = $_POST['longitude'];
			$radious_miles = $_POST['radious_miles'];
			$zipcode = $_POST['zipcode'];
			$take_rate = $_POST['take_rate'];

			$wpdb->insert( $market_tablename, array(
				'market_name' => $market_name,
				'full_address' => $fulladdress,
				'location' => '',
				'miles' => $radious_miles,
				'latitude'=> $latitude,
				'longitude'=> $longitude,
				'zipcode'=> $zipcode,
				'take_rate'=> $take_rate,
				//'upd_date'=> date('Y-m-d'),
			));
			wp_redirect( esc_url( get_page_link( 205 ) ) );
		}

		////update market

		if(isset($_POST['update_market']) && isset($_POST['latitude1'])){
			$market_tablename = $wpdb->prefix."nurser_market_table";
			$market_id = $_POST['market_id']; 
			$market_name = $_POST['market_name1'];
			$fulladdress = $_POST['fulladdress1'];
			$latitude = $_POST['latitude1'];
			$longitude = $_POST['longitude1'];
			$radious_miles = $_POST['radious_miles1'];
			$take_rate1 = $_POST['take_rate1'];
			//$zipcode = $_POST['zipcode1'];
			$wpdb->update($market_tablename, array('market_name'=>$market_name, 'full_address'=>$fulladdress, 'miles'=>$radious_miles, 'latitude'=>$latitude, 'longitude'=>$longitude, 'take_rate'=>$take_rate1), array('id'=>$market_id));
			wp_redirect( esc_url( get_page_link( 205 ) ) );

		}

	//update_user_meta(get_current_user_id(), '_inventory_sumbit_status', '');





	/////Market nursery count////////////////////////

	global $wpdb;
	$tablename = $wpdb->prefix."nurser_market_table";
	$market_table = $wpdb->get_results("SELECT * FROM $tablename ORDER BY id DESC", ARRAY_A);
	if(count($market_table) > 0){
		foreach($market_table as $market_list){
			$market_id = $market_list['id'];
			$location_lat2 = $market_list['latitude'];
			$location_long2 = $market_list['longitude'];
			$miles = $market_list['miles'];
			$nurser_count = $market_list['nurser_count'];
			$args = array(
				'role'    => 'nursery',
				'orderby' => 'user_nicename',
				'order'   => 'ASC'
			);
			$users = get_users( $args );
			
			$market_list_nurser_count = 0;
			foreach ( $users as $user ) {
				$user_id = $user->ID;
				$user_avaliable_plant = get_user_meta( $user_id, '_avaliable_plant', true );
				$location_lat1 = get_user_meta( $user_id, 'user_location_lat', true ); 
				$location_long1 = get_user_meta( $user_id, 'user_location_long', true ); 
				$nursery_name = get_user_meta( $user_id, 'nursery_name', true );
				//if(in_array($plant_id, unserialize($user_avaliable_plant))){

			$customer_delivery_zone = get_distances_miles($location_lat1, $location_long1, $location_lat2, $location_long2, "M");
			if($customer_delivery_zone <= $miles){
				$market_list_nurser_count = $market_list_nurser_count+1;

			}
		}
		$wpdb->update($tablename, array( 'nurser_count'=> $market_list_nurser_count), array('id' => $market_id));
	}
}
  }


  add_action('wp_ajax_nursery_inventory_active_inactive', 'nursery_inventory_active_inactive');
 // add_action('wp_ajax_nopriv_nursery_inventory_active_inactive', 'nursery_inventory_active_inactive');
  function nursery_inventory_active_inactive(){
	  $vaiation_id = $_POST['varible_id'];
	  $status = $_POST['status'];
	  $field_status = '_nursery_product_plant_variation_status_'.get_current_user_id();
	  update_post_meta( $vaiation_id, $field_status , $status );
	  if($status == 'Yes'){
		echo "Your plants is Activated";
	  }else{
		echo "Your plants is Deactivated";
	  }
	 
	  die();
  }


  add_action('wp_ajax_get_market_nursery_view', 'get_market_nursery_view');
  function get_market_nursery_view(){
	
	global $wpdb;
	$tablename = $wpdb->prefix."nurser_market_table";


	   $location_lat2 = $_POST['lat'];
	   $location_long2 = $_POST['long'];
	   $miles = $_POST['miles'];
	   $market_id = $_POST['market_id'];
	   $market_name = $_POST['market_name'];
	   $take_rate = $_POST['take_rate'];
	   if(empty($take_rate)){
		$take_rate = 5;
	   }
	   ?>
	   <h3><?php echo $market_name; ?></h3>
	   <ul class="accordion-content">
		<?php
			$args = array(
				'role'    => 'nursery',
				'orderby' => 'user_nicename',
				'order'   => 'ASC'
			);
			$users = get_users( $args );
			
			$market_list_nurser_count = 0;
			foreach ( $users as $user ) {
				$user_id = $user->ID;
				$user_avaliable_plant = get_user_meta( $user_id, '_avaliable_plant', true );
				$location_lat1 = get_user_meta( $user_id, 'user_location_lat', true ); 
				$location_long1 = get_user_meta( $user_id, 'user_location_long', true ); 
				$nursery_name = get_user_meta( $user_id, 'nursery_name', true );
				//if(in_array($plant_id, unserialize($user_avaliable_plant))){

			$customer_delivery_zone = get_distances_miles($location_lat1, $location_long1, $location_lat2, $location_long2, "M");
			if($customer_delivery_zone <= $miles){
				$market_list_nurser_count = $market_list_nurser_count+1;
					?>
			<li class="nursery-nm"><a href="#" class="accordion-toggle "><button><i class="fa-solid fa-chevron-down"></i></button><span><?php echo $nursery_name; ?></span></a>
				<div class="accordion-content">
					<div class="table-responsive">
					<table class="table">
						<tr>
							<th>Plant</th>
							<th>Size</th>
							<th>Nursery Price</th>
							<th>MSRP Price</th>
							<th>Take Rate(<?php echo $take_rate;?>%)</th>
							<th>Gross Profit</th>
						</tr>
						<?php  $args = array(
								'posts_per_page' => -1,
								'post_type' => 'product',
								'orderby' => 'title',
								'order' => 'ASC',
								's'     => $search_plant,
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
							$user_avaliable_plant = get_user_meta( $user_id, '_avaliable_plant', true );
							// print_r(unserialize($user_avaliable_plant)); 
							$plant_id = get_the_ID();
							$attributes = wc_get_product_terms( get_the_ID(), 'pa_nursery-pot-size' );
							$select_product_pot_size = get_post_meta( get_the_ID(), '_nursery_product_plant_list'.$user_id, true ); 
							$product = wc_get_product($plant_id);
							
							if ( $product->is_type( 'variable' ) ) {
							if(!empty($attributes)){
								$available_variations = $product->get_available_variations();
							?>
							<?php foreach ($available_variations as $available_variation) { 
								$pot_size_slug = $available_variation['attributes']['attribute_pa_nursery-pot-size'];
								$varible_id = $available_variation['variation_id'];
								$display_price = $available_variation['display_price'];
								$pa_pot_size_ = 'pa_nursery-pot-size';
								$pa_pot_size_meta = get_post_meta($available_variation['variation_id'], 'attribute_' . $pa_pot_size_, true);
								$pa_pot_size_term = get_term_by('slug', $pa_pot_size_meta, $pa_pot_size_);
								$pa_pot_size_term_name = $pa_pot_size_term->name;
								$pa_pot_size_term_id =  $pa_pot_size_term->term_id;
								$field_add = '_nursery_product_plant_variation_add_'.$user_id;
								$field_price = '_nursery_product_plant_variation_retail_price_'.$user_id;
								$field_status = '_nursery_product_plant_variation_status_'.$user_id;
								$select_product_pot_size_price = get_post_meta( $varible_id, $field_price, true );
								if(!empty($select_product_pot_size_price)){
									$vendor_price = $select_product_pot_size_price;
								}
								
						
								//update_post_meta( $varible_id, $field_status , '' );
								$select_product_pot_status = get_post_meta( $varible_id, $field_status, true );
								$select_product_pot_add = get_post_meta( $varible_id, $field_add, true );
								$select_product_pot_size_price = get_post_meta( $varible_id, $field_price, true );
								if($select_product_pot_add == 'Yes'){
									//echo the_title().'  '.$pa_pot_size_term_name."<br>";
									$currency_symbol =  get_woocommerce_currency_symbol();
								?>
							<tr>
							<td><?php the_title(); ?></td>
							<td><?php echo $pa_pot_size_term_name; ?></td>
							<td><?php echo $currency_symbol.$vendor_price; ?></td>
							<td><?php echo $currency_symbol.$display_price; ?></td>
							<td><?php echo $currency_symbol.($vendor_price * $take_rate)/100; ?></td>
							<td><?php echo $currency_symbol; 
							$commission = ($vendor_price * $take_rate)/100;
							echo ($display_price - ($vendor_price - $commission));
							?></td>
						</tr>
						<?php
								}  }
								} }
							endwhile; 
							endif;
							wp_reset_postdata();
						?>
					</table>  
					</div>  
				</div>
			</li>
			<?php } } 
				$wpdb->update($tablename, array( 'nurser_count'=> $market_list_nurser_count), array('id' => $market_id));
				if($market_list_nurser_count == 0){
			?>
			<li class="nursery-nm-no">There are no nurseries within this market</li>
			<?php } ?>
		</ul>
      <?
    
	   die();
  }


//////get market details

add_action('wp_ajax_get_market_details_edit', 'get_market_details_edit');
function get_market_details_edit(){

    $market_id = $_POST['market_id'];
	global $wpdb;
	$tablename = $wpdb->prefix."nurser_market_table";
	$market_table = $wpdb->get_results("SELECT * FROM $tablename WHERE id = $market_id", ARRAY_A);
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

			echo $market_name.'!'.$location_lat2.'!'.$location_long2.'!'.$miles.'!'.$full_address.'!'.$take_rate;
		}
	}

	 die();
}

















































///add custom fee
add_action( 'woocommerce_before_calculate_totals', 'custom_fee_based_on_nursery_select_delivery_zone' );
//add_action( 'woocommerce_cart_calculate_fees', 'custom_fee_based_on_nursery_select_delivery_zone', 10, 1 );
function custom_fee_based_on_nursery_select_delivery_zone( $cart ) {

    //if ( is_admin() && ! defined( 'DOING_AJAX' ) ) return;

	if (!empty($_COOKIE['customer_usda_zip'])) {
		//$customer_usda_zip_array = $_COOKIE['customer_usda_zip'];
		$customer_usda_zip_array = json_decode(stripslashes($_COOKIE['customer_usda_zip']),true);
		$location_lat2 = $customer_usda_zip_array['coordinates']['lat'];
		$location_long2 = $customer_usda_zip_array['coordinates']['lon'];

		}else{
			$customer_usda_zip_array = unserialize(get_user_meta( get_current_user_id(), '_customer_usda_zip', true ));
			if(!empty($customer_usda_zip_array)){
				$location_lat2 = $customer_usda_zip_array['coordinates']['lat'];
				$location_long2 = $customer_usda_zip_array['coordinates']['lon'];
			}else{
				$location_lat2 = '34.09';
				$location_long2 = '-118.406';
			}
		}
		$args = array(
			'role'    => 'nursery',
			'orderby' => 'user_nicename',
			'order'   => 'ASC'
		);
		$users = get_users( $args );
		
		
	$delivery_fee = 0; 
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		 
		$plant_id = $cart_item['product_id']; 

		
		foreach ( $users as $user ) {
			$user_id = $user->ID;
			$location_lat1 = get_user_meta( $user_id, 'user_location_lat', true ); 
			$location_long1 = get_user_meta( $user_id, 'user_location_long', true ); 
			$user_avaliable_plant = get_user_meta( $user_id, '_avaliable_plant', true );
			if(in_array($plant_id, unserialize($user_avaliable_plant))){
	
				$customer_delivery_zone = get_distances_miles($location_lat1, $location_long1, $location_lat2, $location_long2, "M");
				
				// $select_delivery_zone = get_user_meta( $user_id, '_select_delivery_zone' , true );
				//$customer_delivery_zone = 10;
				if($customer_delivery_zone >= 6 && $customer_delivery_zone <= 10.99){
					$delivery_fee = 15;
					break;
				}else if($customer_delivery_zone >= 11 && $customer_delivery_zone <= 15){
					$delivery_fee = 30;
					break;
				}else{
					$delivery_fee = 0;
				}
	
			}else{
	
				$delivery_fee = 0;
			}
		}


		$cart_item_price = $cart_item['data']->price + $delivery_fee;
        $cart_item['data']->set_price($cart_item_price); 
    }
    
	 //$fee = 15;
	 if($delivery_fee == 0){
		$delivery_fee = "Free Delivery";
	 }

    if ( $delivery_fee != 0 ){ 
    $cart->add_fee( __( "Delivery fee", "woocommerce" ), $delivery_fee, false );
	}
}







































//add_filter('woocommerce_enable_order_notes_field', '__return_false');
//add_filter('woocommerce_ship_to_different_address_checked', '__return_true', 999);


//add_action( 'template_redirect', 'redirect' );
function redirect() {
	$user = wp_get_current_user();
    if ( is_user_logged_in() ) {
		if ( in_array( 'administrator', (array) $user->roles ) || in_array( 'customer', (array) $user->roles )  ) {
			wp_safe_redirect( home_url('/my-account') ); 
			exit;
		}else if(in_array( 'nursery', (array) $user->roles )){
			wp_safe_redirect( home_url('/vendor-dashboard') );
			exit;
		}else{
			wp_safe_redirect( home_url( ) );
			exit;
		}
		
    }
	//die();
}



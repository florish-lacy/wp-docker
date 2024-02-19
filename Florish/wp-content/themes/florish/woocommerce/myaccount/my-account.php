<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;


$user = wp_get_current_user();
if (  in_array( 'nursery', (array) $user->roles ) ) {
    wp_safe_redirect(home_url());
}
// $user = wp_get_current_user();
// //print_r((array)$user->roles);
// $user_info = get_userdata($user->ID);
// $roles = array (
// 	'administrator',
// 	'customer',
// );
// if ( !in_array( $roles, $user_info->roles )  ) {
//   //wp_safe_redirect(home_url());
// }
?><div class="custom-woocommerce"> <?php
/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
if (  !in_array( 'administrator', (array) $user->roles ) ) {
do_action( 'woocommerce_account_navigation' ); 
}
?>

<div class="woocommerce-MyAccount-content">
	<?php
		/**
		 * My Account content.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_content' );
	?>
</div>
</div>

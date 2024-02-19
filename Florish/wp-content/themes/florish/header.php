<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


	<!-- Header Section -->
	<nav class="navbar navbar-expand-lg">
		<div class="container-fluid">
			<div class="navbar__inner inn">
				<?php
				$custom_logo_id = get_theme_mod('custom_logo');
				$image = wp_get_attachment_image_src($custom_logo_id, 'full');
				$logo_src = !empty($image) ? $image[0] : get_template_directory_uri() . '/assets/images/logo.png';
				?>
				<a class="navbar-brand" href="<?php echo get_site_url(); ?>"><img src="<?php echo $logo_src; ?>" alt="" /></a>

				<div class="rt-side">
					<div class="collapse navbar-collapse" id="navbarNav">
						<button class="navbar-toggler navbar-toggler-main" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="stick"></span>
						</button>
						<?php
						wp_nav_menu(array(
							'menu'  => 'Main Menu',
							'menu_class' => 'navbar-nav',
						));
						?>
					</div>

					<?php
					$customer_usd_zipcode = !empty($_COOKIE['customer_usd_zipcode']) ? $_COOKIE['customer_usd_zipcode'] : '';
					if (is_user_logged_in()) {
						$customer_usd_zipcode = get_user_meta(get_current_user_id(), '_customer_usd_zipcode', true) ?: '';
					}

					$customer_usda_zip = '#';
					if (!empty($_COOKIE['customer_usda_zip'])) {
						$cookieValue = $_COOKIE['customer_usda_zip'];
						$decoded_json = json_decode(stripslashes($_COOKIE['customer_usda_zip']), true);
						$customer_usda_zip = $decoded_json['zone'];
					} elseif (is_user_logged_in()) {
						$customer_usda_zip_array = unserialize(get_user_meta(get_current_user_id(), '_customer_usda_zip', true));
						$customer_usda_zip = !empty($customer_usda_zip_array) ? $customer_usda_zip_array['zone'] : '#';
					}
					?>
					<div class="growing-btn">
						<a href="#view-zipcode-popup" class="open-popup-link">
							<div class="flex flex-col">
								<span>USDA Zone: <?php echo strtoupper($customer_usda_zip); ?></span>
								<span>Planting in <strong><?php echo $customer_usd_zipcode; ?></strong></span>
							</div>
						</a>
					</div>


					<div class="login">
						<?php $current_user = wp_get_current_user(); ?>
						<?php if (!is_user_logged_in()) { ?>
							<a href="#login-popup" class="open-popup-link"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/login.svg" alt="" /> Login</a>
						<?php } else { ?>
							<?php if (wc_user_has_role($current_user, 'administrator')) { ?>
								<a href="<?php echo esc_url(get_page_link(205)); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/account.svg" alt="" /><span class="">Account Settings</span></a>
							<?php } else if (wc_user_has_role($current_user, 'nursery')) { ?>
								<a href="<?php echo esc_url(get_page_link(1529)); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/account.svg" alt="" /><span class="">Account Settings</span></a>
							<?php } else { ?>
								<a href="<?php echo wc_get_page_permalink('myaccount'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/account.svg" alt="" /><span class="">Account Settings</span></a>
							<?php } ?>
							<span class="log-out"><a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></span>
							<ul class="dropdown-menu position-absolute d-grid gap-1 p-2 rounded-3 mx-0 shadow w-220px" data-bs-theme="light">
								<li><a class="dropdown-item rounded-2 active" href="#">My Account</a></li>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li><a class="dropdown-item rounded-2" href="#">Logout</a></li>
							</ul>
						<?php } ?>
					</div>


					<?php if (!wc_user_has_role($current_user, 'nursery')) { ?>
						<div class="cart">
							<?php
							$items_count = WC()->cart->get_cart_contents_count();
							$items_count = $items_count ? $items_count : '';
							?>
							<a href="<?php echo wc_get_cart_url() ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/cart.svg" alt="" />
								<span class="num_count" id="mini-cart-count"><?php echo $items_count; ?></span>
								<span class="sr-only">Cart</span>
							</a>
						</div>
					<?php } ?>

				</div>

				<button class="navbar-toggler navbar-toggler-main" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="stick"></span>
				</button>
			</div>
		</div>
	</nav>

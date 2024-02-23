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
	<nav class="fl-nav navbar navbar-expand-lg" aria-label="Offcanvas navbar large">
		<div class="container-fluid navbar__inner">

			<?php
			$custom_logo_id = get_theme_mod('custom_logo');
			$image = wp_get_attachment_image_src($custom_logo_id, 'full');
			$logo_src = !empty($image) ? $image[0] : get_template_directory_uri() . '/assets/images/logo.png';
			?>
			<a class="navbar-brand d-flex h-100" href="<?php echo get_site_url(); ?>"><img src="<?php echo $logo_src; ?>" alt="Florish" /></a>

			<div class="d-flex align-items-center justify-content-end gap-3">

				<div class="d-xl-none">
					<?php require('components/button-growing-zone.php') ?>
				</div>

				<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

			</div>

			<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
				<div class="offcanvas-header">
					<h5 class="inter offcanvas-title" id="offcanvasNavbarLabel">Welcome to Florish!</h5>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body d-flex flex-column-reverse justify-content-end flex-lg-row align-items-lg-center gap-3">
					<!-- NAV -->
					<?php
					wp_nav_menu(array(
						'menu'  => 'Main Menu',
						'menu_class' => 'navbar-nav justify-content-end flex-grow-lg-1 p-2 p-lg-0',
						'container' => false
					));
					?>

					<div class="d-none d-xl-block">
						<?php require('components/button-growing-zone.php') ?>
					</div>

					<!-- Search -->
					<form class="d-flex mt-3 mt-lg-0" role="search">
						<!--  -->
						<input class="form-control rounded-pill" type="search" placeholder="Search" aria-label="Search">
					</form>

					<div class="d-flex align-items-center justify-content-around gap-3">

						<!-- User Account Menu -->
						<div class="user-menu d-flex align-items-center justify-content-center flex-grow-1">
							<?php $current_user = wp_get_current_user(); ?>
							<?php if (!is_user_logged_in()) { ?>
								<a href="#login-popup" class="open-popup-link toggle-on-hover d-block p-2 flex-grow-1 text-center">
									<i class="fa-regular fa-user toggle-on-hover--off"></i>
									<i class="fa-solid fa-user toggle-on-hover--on"></i>
								</a>
							<?php } else { ?>
								<?php
								$account_url = wc_get_page_permalink('myaccount');
								if (wc_user_has_role($current_user, 'administrator')) {
									$account_url = esc_url(get_page_link(205));
								} else if (wc_user_has_role($current_user, 'nursery')) {
									$account_url = esc_url(get_page_link(1529));
								}

								?>
								<div class="dropdown">
									<a class="nav-link log-out" href="<?php echo $account_url ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										<i class="fa-solid fa-user"></i><span class="sr-only">Account Settings</span>
									</a>
									<ul class="dropdown-menu gap-1 p-2 rounded-3 mx-0 shadow" data-bs-theme="light">
										<li><a class="dropdown-item rounded-2 active" href="#">My Account</a></li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<li><a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></li>
									</ul>
								</div>
							<?php } ?>
						</div>


						<?php if (!wc_user_has_role($current_user, 'nursery')) { ?>
							<div class="cart d-flex align-items-center flex-grow-1">
								<?php
								$items_count = WC()->cart->get_cart_contents_count();
								$items_count = $items_count ? $items_count : '';
								?>
								<a href="<?php echo wc_get_cart_url() ?>" class="position-relative flex-grow-1 text-center">
									<i class="fa-solid fa-cart-shopping"></i>

									<?php if ($items_count) { ?>
										<span class="cart__badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
											<span id="mini-cart-count"><?php echo $items_count; ?></span>
											<span class="visually-hidden">items in cart</span>
										</span>
									<?php } ?>
								</a>
							</div>
						<?php } ?>



					</div>
				</div>
			</div>
		</div>
	</nav>

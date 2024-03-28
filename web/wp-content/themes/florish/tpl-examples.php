<?php /* Template Name: User Signup */ ?>
<?php
$current_user = wp_get_current_user();
if (is_user_logged_in()) {
	wp_safe_redirect(home_url());
	exit;
}
?>
<?php get_header(); ?>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
	<div class="col-md-6 p-lg-5 mx-auto my-5">
		<h1 class="display-3 fw-bold">Designed for engineers</h1>
		<h3 class="fw-normal text-muted mb-3">Build anything you want with Aperture</h3>
		<div class="d-flex gap-3 justify-content-center lead fw-normal">
			<a class="icon-link" href="#">
				Learn more
				<svg class="bi">
					<use xlink:href="#chevron-right"></use>
				</svg>
			</a>
			<a class="icon-link" href="#">
				Buy
				<svg class="bi">
					<use xlink:href="#chevron-right"></use>
				</svg>
			</a>
		</div>
	</div>
	<div class="product-device shadow-sm d-none d-md-block"></div>
	<div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>

<?php get_footer(); ?>

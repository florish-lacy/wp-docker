<!-- Footer Start -->
<div class="footer">
	<div class="container">
		<footer class="py-5">
			<div class="row mb-3">
				<div class="col-6 col-md-2">
					<h5>Section</h5>
					<?php
					wp_nav_menu(array(
						'menu'  => 'Footer Menu',
					));
					?>
				</div>

				<div class="col-6 col-md-2">
					<h5>Section</h5>
					<ul class="nav flex-column">
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
					</ul>
				</div>

				<div class="col-6 col-md-2">
					<h5>Section</h5>
					<ul class="nav flex-column">
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
					</ul>
				</div>

				<!-- Newsletter -->
				<div class="col-md-5 offset-md-1">
					<form>
						<h5><?php the_field('newsletters_title', 'option'); ?></h5>
						<p><?php the_field('newsletters_sub_title', 'option'); ?></p>

						<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>

					</form>
				</div>
			</div>

			<div class="footer__tail d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
				<a href="<?php echo get_site_url(); ?>" class="d-flex h-100">
					<?php if (get_field('footer_logo', 'option')) { ?>
						<img src="<?php the_field('footer_logo', 'option'); ?>" alt="Florish logo" />
					<?php } else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Florish logo" />
					<?php } ?>
				</a>

				<p><?php the_field('copyright_text', 'option'); ?></p>

				<ul class="list-unstyled d-flex">
					<li class="ms-3">
						<a class="link-body-emphasis link-offset-2-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="#">
							Schedule a Call
						</a>
					</li>
				</ul>
			</div>
		</footer>
	</div>
</div>

<?php require_once('components/growing-zone/popup-growing-zone.php'); ?>

<?php require_once('components/popup-login.php'); ?>

<?php require_once('components/popup-nursery.php'); ?>

<?php require_once('components/popup-nursery-inventory.php'); ?>

<?php require_once('components/popup-edit-market.php'); ?>


<?php wp_footer(); ?>

</body>

</html>

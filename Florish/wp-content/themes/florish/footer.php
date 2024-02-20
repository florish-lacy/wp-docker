<!-- Footer Start -->
<div class="footer">
	<div class="container">
		<div class="top-pnl">
			<h3><?php the_field('newsletters_title', 'option'); ?></h3>
			<h6><?php the_field('newsletters_sub_title', 'option'); ?></h6>
			<div class="newsletter-frm">
				<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
			</div>
		</div>
		<div class="btm-pnl">
			<div class="top">
				<div class="logo">
					<a href="<?php echo get_site_url(); ?>">
						<?php if (get_field('footer_logo', 'option')) { ?>
							<img src="<?php the_field('footer_logo', 'option'); ?>" alt="" />
						<?php } else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="" />
						<?php } ?>
					</a>
				</div>
				<div class="fot-nav">
					<?php
					wp_nav_menu(array(
						'menu'  => 'Footer Menu',
					));
					?>
				</div>
			</div>
			<div class="copyright">
				<p><?php the_field('copyright_text', 'option'); ?></p>
			</div>
		</div>
	</div>

	<div class="container">
		<footer class="py-5">
			<div class="row">
				<div class="col-6 col-md-2 mb-3">
					<h5>Section</h5>
					<ul class="nav flex-column">
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
					</ul>
				</div>

				<div class="col-6 col-md-2 mb-3">
					<h5>Section</h5>
					<ul class="nav flex-column">
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
					</ul>
				</div>

				<div class="col-6 col-md-2 mb-3">
					<h5>Section</h5>
					<ul class="nav flex-column">
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
						<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
					</ul>
				</div>

				<div class="col-md-5 offset-md-1 mb-3">
					<form>
						<h5>Subscribe to our newsletter</h5>
						<p>Monthly digest of what's new and exciting from us.</p>
						<div class="d-flex flex-column flex-sm-row w-100 gap-2">
							<label for="newsletter1" class="visually-hidden">Email address</label>
							<input id="newsletter1" type="text" class="form-control" placeholder="Email address">
							<button class="btn btn-primary" type="button">Subscribe</button>
						</div>
					</form>
				</div>
			</div>

			<div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
				<p>© 2023 Company, Inc. All rights reserved.</p>
				<ul class="list-unstyled d-flex">
					<li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
								<use xlink:href="#twitter"></use>
							</svg></a></li>
					<li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
								<use xlink:href="#instagram"></use>
							</svg></a></li>
					<li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
								<use xlink:href="#facebook"></use>
							</svg></a></li>
				</ul>
			</div>
		</footer>
	</div>
</div>

<?php require('components/popup-login.php'); ?>

<?php require('components/popup-nursery-inventory.php'); ?>

<?php require('components/popup-edit-market.php'); ?>


<?php wp_footer(); ?>

</body>

</html>

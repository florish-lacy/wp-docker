<?php /* Template Name: Nursery Information */ ?>

<?php

// Add body class to the header: Makes the header float above the content
// use .fl-nav__offset to give the header a top margin
Florish\add_body_class('fl-nav--floating fl-footer--sm');

get_header();

?>

<!-- HERO -->
<div class="fl-nav__offset fl-bg-pattern bg-repeat-x bg-body-tertiary">
	<div class="container py-6 text-center">
		<div class="row">

			<h1 class="text-body-emphasis">Where Nature Meets Innovation in Your Nursery!</h1>

			<div class="col-lg-8 mx-auto py-2">
				<p class="lead">
					Receive sales when your doors are closed, deliver them within 7 days, increase your revenue with
					no marketing and website costs.
				</p>
			</div>

			<div class="d-flex justify-content-center my-3">
				<a href="#signup" class="d-block p-2 fl-w-100">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/templates/nursery-landing/button-signup.png"
						class="" alt="Apply now button" loading="lazy">
				</a>
			</div>

			<div class="d-block">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/templates/nursery-landing/section-hero.png"
					class="img-fluid mb-4" alt="Happy healthy plants in a row" loading="lazy">
			</div>
		</div>
	</div>
</div>

<!-- FEATURES -->
<div class="container-fluid g-0 py-5 fl-bg-pattern--light bg-primary text-light">
	<h3 class="text-center pb-2">Benefit Statements</h3>

	<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 p-5 w-100 justify-content-center">
		<div class="col d-flex align-items-start justify-content-center">
			<div class="d-flex flex-column gap-3 align-items-center text-center">
				<div class="fl-icon">
					<i class="fa-solid fa-chart-simple"></i>
				</div>
				<h4 class="fw-bold mb-0 fs-4">Increase Sales</h4>
				<p>Make more money without needing more staff</p>
			</div>
		</div>
		<div class="col d-flex align-items-start justify-content-center">


			<div class="d-flex flex-column gap-3 align-items-center text-center">
				<div class="fl-icon">
					<i class="fa-solid fa-comment-dollar"></i>
				</div>
				<h4 class="fw-bold mb-0 fs-4">Generate Passive Revenue</h4>
				<p>Receive orders while your doors are closed</p>
			</div>
		</div>
		<div class="col d-flex align-items-start justify-content-center">
			<div class="d-flex flex-column gap-3 align-items-center text-center">
				<div class="fl-icon">
					<i class="fa-solid fa-calendar"></i>
				</div>
				<h4 class="fw-bold mb-0 fs-4">Waste less Time</h4>
				<p>Save time spent on customers not ready to purchase</p>
			</div>
		</div>
		<div class="col d-flex align-items-start justify-content-center">
			<div class="d-flex flex-column gap-3 align-items-center text-center">
				<div class="fl-icon">
					<i class="fa-solid fa-chart-simple"></i>
				</div>
				<h4 class="fw-bold mb-0 fs-4">Ensure Customer Success</h4>
				<p>Customers receive ongoing care, saving you time and ensuring plants live longer</p>
			</div>
		</div>
	</div>
</div>

<!-- STEPS - How it works -->
<div class="container py-5">
	<div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
		<div class="col-6 col-lg mx-auto d-flex flex-column align-items-start">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/templates/nursery-landing/section-how.png"
				class="img-fluid mb-4" alt="" loading="lazy">
		</div>

		<div class="col">
			<div class="row row-cols-1 g-4">
				<h3 class="pb-2">How it works</h3>

				<div class="col d-flex align-items-start gap-3">
					<div class="fl-icon--dark fl-icon--lg">
						<i class="fa-solid fa-seedling"></i>
					</div>
					<div class="d-flex flex-column gap-3">
						<h4 class="fw-semibold mb-0 text-body-emphasis">Step 1</h4>
						<p class="text-body-secondary">Sign up and tell us which plants you carry.</p>
					</div>
				</div>

				<div class="col d-flex align-items-start gap-3">
					<div class="fl-icon--dark fl-icon--lg">
						<i class="fa-solid fa-bag-shopping"></i>
					</div>
					<div class="d-flex flex-column gap-3">
						<h4 class="fw-semibold mb-0 text-body-emphasis">Step 2</h4>
						<p class="text-body-secondary">Go live and receive orders in your area.</p>
					</div>
				</div>

				<div class="col d-flex align-items-start gap-3">
					<div class="fl-icon--dark fl-icon--lg">
						<i class="fa-solid fa-truck"></i>
					</div>
					<div class="d-flex flex-column gap-3">
						<h4 class="fw-semibold mb-0 text-body-emphasis">Step 3</h4>
						<p class="text-body-secondary">Deliver the order within 7 days.</p>
					</div>
				</div>

				<div class="col d-flex align-items-start gap-3">
					<div class="fl-icon--dark fl-icon--lg">
						<i class="fa-solid fa-money-bill-trend-up"></i>
					</div>
					<div class="d-flex flex-column gap-3">
						<h4 class="fw-semibold mb-0 text-body-emphasis">Step 4</h4>
						<p class="text-body-secondary">Get paid.</p>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>

<!-- REQUIREMENTS -->

<div class="px-4 pt-5 my-5 text-center bg-body-tertiary">
	<h2 class="col-lg-8 mx-auto display-4 fw-bold text-body-emphasis">Requirements to apply</h2>
	<div class="col-lg-6 mx-auto">
		<p class="lead mb-4">Must have own truck and deliver and carry at least 10 of the plants listed for sale on
			the Florish Marketplace.</p>
	</div>
	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/templates/nursery-landing/section-requirements.png"
		class="img-fluid" alt="Delivery van dropping packages from the rear" width="650" loading="lazy">
</div>

<!-- SIGN-UP -->
<div class="container px-5 px-lg-10 py-5 bg-primary fl-bg-pattern-2" id="signup">
	<div class="row g-4 row-cols-1 row-cols-lg-3 text-white">
		<div class="feature col d-flex flex-column align-items-start justify-content-center">
			<h3 class="fs-2">Apply Now</h3>
			<p>Create an Account to start the application process</p>
			<a href="#" class="icon-link">
				Call to action
				<svg class="bi">
					<use xlink:href="#chevron-right"></use>
				</svg>
			</a>
		</div>

		<div class="feature col-lg-8 bg-body-tertiary">
			<div
				class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
				<svg class="bi" width="1em" height="1em">
					<use xlink:href="#collection"></use>
				</svg>
			</div>
			<h3 class="fs-2">Generate Passive Revenue</h3>
			<h3 class="fs-2">Generate Passive Revenue</h3>
			<h3 class="fs-2">Generate Passive Revenue</h3>
			<h3 class="fs-2">Generate Passive Revenue</h3>
			<p>Receive orders while your doors are closed</p>
			<div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
				<button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
				<button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
			</div>
		</div>

	</div>
</div>

<?php get_footer(); ?>

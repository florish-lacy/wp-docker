<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

<div class="fl__page--blog">
	<!-- Inner Banner -->
	<div class="inn-bann">
		<?php if (get_field('banner_image')) { ?>
			<img src="<?php the_field('banner_image'); ?>" alt="" />
		<?php } else { ?>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog.png" alt="" />
		<?php } ?>
		<div class="desc">
			<div class="container">
				<h1>
					<?php the_field('banner_title'); ?>
				</h1>
			</div>
		</div>
	</div>

	<div class="our-blog cmn-gap">
		<div class="container">
			<div class="grid">
				<?php
				$args = array(
					'post_type' => 'post',
					'orderby' => 'ID',
					'post_status' => 'publish',
					'order' => 'DESC',
					'posts_per_page' => -1 // this will retrive all the post that is published
				);
				$result = new WP_Query($args);
				if ($result->have_posts()):
					while ($result->have_posts()):
						$result->the_post();
						?>
						<div class="grid-item">
							<div class="img">
								<a href="<?php echo get_permalink($result->ID); ?>#">
									<?php if (has_post_thumbnail($result->ID)) {
										$image = wp_get_attachment_image_src(get_post_thumbnail_id($result->ID), 'single-post-thumbnail'); ?>
										<img src="<?php echo $image[0]; ?>" alt="" />
									<?php } else { ?>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog1.png" alt="" />
									</a>
								<?php } ?>
							</div>
							<div class="text">
								<div class="author">
									<div class="img">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/author.png" alt="" />
									</div>
									<div class="text">
										<p>
											<?php the_title(); ?>
										</p>
									</div>
								</div>
								<a class="title" href="<?php echo get_permalink($result->ID); ?>">
									<?php the_excerpt(); ?>
									</p>
									<div class="know-btn">
										<a href="<?php echo get_permalink($result->ID); ?>">Know More -</a>
									</div>
							</div>
						</div>
					<?php
					endwhile;
				endif;
				wp_reset_postdata();
				?>
			</div>
			<!-- <div id="pagination-container"></div> -->
		</div>
	</div>

</div>
<?php get_footer(); ?>

<?php get_header(); ?>

<section class="blog-details">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-8 col-12">
            <div class="text-block">
               <h2><?php the_title(); ?></h2>
               <h6><?php echo get_the_date( 'M d, Y' ); ?></h6>
               <div class="img-box">
                  <?php if (has_post_thumbnail( get_the_ID() ) ){ 
                  $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );?>
                  <img src="<?php echo $image[0]; ?>" alt="" />
                  <?php }else{ ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-details.png" alt="" />
                  <?php } ?> 
               </div>
               <?php the_content(); ?>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-12">
            <div class="sidebar">
               <h4>Recent Posts</h4>
               <div class="rt-blog">
               <?php 
						// the query
						$the_query = new WP_Query( array(
							'posts_per_page' => 6,
						)); 
						?>
					   <?php if ( $the_query->have_posts() ) : ?>
                     <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                  <div class="box">
                    <a href="<?php echo get_permalink($the_query->ID);?>">
                     <div class="img">
                        <?php if (has_post_thumbnail( $the_query->ID ) ){ 
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $the_query->ID ), 'single-post-thumbnail' );?>
                        <img src="<?php echo $image[0]; ?>" alt="" />
                        <?php }else{ ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-details.png" alt="" />
								<?php } ?>
                     </div>
                     <div class="text">
                        <h6><?php the_title(); ?></h6>
                        <p><?php echo get_the_date( 'M d, Y', $the_query->ID); ?></p>
                     </div>
                    </a>
                  </div>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>

                  <?php else : ?>
                  <p><?php __('No post available!'); ?></p>
                  <?php endif; ?>
                 
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php get_footer(); ?>
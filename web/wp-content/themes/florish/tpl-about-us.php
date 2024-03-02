<?php /* Template Name: About Us */ ?>

<?php get_header(); ?>

<!-- Inner Banner -->
<div class="inn-bann">
    <?php if(get_field('banner_image')){ ?>
      <img src="<?php the_field('banner_image'); ?>" alt="" />
      <?php }else{ ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-bann.png" alt="" />
   <?php } ?>
   
   <div class="desc">
      <div class="container">
         <h1><?php the_field('banner_title'); ?></h1>
      </div>
   </div>
</div>

<div class="inn-about cmn-gap">
   <div class="container">
      <div class="row">
         <div class="col-lg-5 col-md-6 col-sm-12">
            <div class="img-block">
               <?php if(get_field('about_image')){ ?>
                  <img src="<?php the_field('about_image'); ?>" alt="" />
                  <?php }else{ ?>
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-img.png" alt="" />
               <?php } ?>
            </div>
         </div>
         <div class="col-lg-7 col-md-6 col-sm-12">
            <div class="text-block">
               <h4><?php the_field('about_title'); ?></h4>
               <h2><?php the_field('about_sub_title'); ?></h2>
               <?php the_field('about_details'); ?>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="we-work">
   <div class="container">
      <div class="inn">
         <div class="row align-items-center">
            <div class="col-lg-4 col-md-4 col-sm-12">
               <div class="lt-txt">
                  <h3><?php the_field('how_we_work_title'); ?></h3>
                  <p><?php the_field('how_we_work_sub_title'); ?></p>
               </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
               <div class="row">
                 <?php if( have_rows('how_we_work') ): ?>
                  <?php while( have_rows('how_we_work') ): the_row();  ?>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                     <h4><?php the_sub_field('title'); ?></h4>
                     <p><?php the_sub_field('sub_title'); ?></p>
                  </div>
                  <?php endwhile; ?>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<section class="hm-product cmn-gap aboutp">
   <div class="container">
      <div class="title-pnl">
         <div class="lt-side">
            <h2>Best Sellers:</h2>
         </div>
      </div>
      <div class="row">
         <?php
            $args = array(
                  'posts_per_page' => 4,
                  'tax_query' => array(
                     'relation' => 'AND',
                     array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                        'operator' => 'IN', 
                     )
                  ),
                  'post_type' => 'product',
                  'orderby' => 'title'
            );
            $products = new WP_Query( $args );
            
            while ( $products->have_posts() ) : $products->the_post();
            $_product = wc_get_product( get_the_ID() );
            $regular_price =  (float) $_product->get_regular_price();
            $sale_price = (float) $_product->get_sale_price();
            $saving_percentage = round( ( $regular_price - $sale_price ) / $regular_price * 100 ).'%';
            //$_product->get_price();
            $img_atts = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
            
            ?>
         <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="box">
               <div class="img">
                  <a href="<?php the_permalink(); ?>">
                     <?php if($img_atts[0]){ ?>
                     <img src="<?php echo $img_atts[0]; ?>" alt="" />
                     <?php }else{ ?>
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/p1.png" alt="" />
                     <?php } ?>
                     <?php if($sale_price){ ?>
                     <span class="discount">- <?php echo $saving_percentage; ?></span>
                     <?php } ?>
                  </a>
               </div>
               <div class="text">
                  <div class="title">
                     <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                     <span class="price">
                        <?php if($sale_price){ ?>
                        <?php echo wc_price($sale_price); ?> <del><?php echo wc_price($regular_price); ?></del>
                        <?php } else { ?>
                        <?php echo wc_price($regular_price); ?>
                        <?php } ?>
                     </span>
                  </div>
                  <div class="cart">
                     <a href="<?php echo wc_get_cart_url().'?add-to-cart='.get_the_ID(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/wcart.svg" alt="" /></a>
                  </div>
               </div>
            </div>
         </div>
         <?php
            endwhile; 
            wp_reset_postdata();
            ?>
      </div>
   </div>
</section>

<?php get_footer(); ?>

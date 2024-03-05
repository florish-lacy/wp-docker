<?php get_header(); ?>

<!-- Banner Section -->
<section class="bnr-sec">
  <div class="container">
    <div class="bnr-innr">
      <div class="txt-pnl">
         <h1><?php the_field('banner_title'); ?></h1>
        <div class="bnr-btn">
         <a class="cmn-btn" href="<?php echo wc_get_page_permalink( 'shop' ) ?>"><?php the_field('banner_button_text'); ?></a>
        </div>
      </div>
      <div class="img-pnl">
         <h6><?php the_field('banner_sub_title'); ?></h6>
         <di class="img">
             <?php if(get_field('banner_image')){ ?>
					<img src="<?php the_field('banner_image'); ?>" alt="" />
					<?php }else{ ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bnr-img.png" alt="" />
					<?php } ?>
         </div>
      </div>
    </div>
  </div>
</section>

<!-- About Section -->
<section class="hm-about">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 col-md-6 col-12">
            <div class="text-wrap">
               <h6><?php the_field('about_title'); ?></h6>
               <h2><?php the_field('about_experience_the'); ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hm-ab-sape.png" alt="" />
                  <?php the_field('about_experience_the_sub_title'); ?>
               </h2>
               <a class="cmn-btn" href="<?php echo wc_get_page_permalink( 'shop' ) ?>"><?php the_field('explore_the_shop_button_text'); ?></a>
            </div>
         </div>
         <div class="col-lg-6 col-md-6 col-12">
            <div class="img-info">
                <?php if(get_field('about_banner_image')){ ?>
					<img src="<?php the_field('about_banner_image'); ?>" alt="" />
					<?php }else{ ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/hm-ab-img.png" alt="" />
					<?php } ?>
            </div>
         </div>
      </div>
      <div class="icon-wrapper">
      <?php
			if( have_rows('about_shop') ):
				while( have_rows('about_shop') ) : the_row();
				$image = get_sub_field('icon');
				?>
         <div class="box">
            <div class="icon">
               <?php if(!empty($image)){ ?>
					<img src="<?php echo $image; ?>" alt="">
					<?php }else{ ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-icn1.svg" alt="" />
					<?php } ?>
            </div>
            <di class="text">
               <h5><?php echo get_sub_field('title'); ?></h5>
               <p><?php echo get_sub_field('sub_title'); ?></p>
         </div>
         <?php
					endwhile;
				endif;
				wp_reset_query();
				?>
      </div>
      </div>
   </div>
</section>

<!-- Featured Section -->
<section class="hm-featured cmn-gap">
   <div class="container">
      <div class="title-pnl">
         <h2 class="cs-mb"><?php the_field('featured_categories_title'); ?></h2>
      </div>
      <div class="row">
         <?php
            $taxonomies = get_terms( array(
               'taxonomy' => 'product_cat',
               'hide_empty' => false,
               'parent' => 0,
               'exclude' => 15
            ) );

         if ( !empty($taxonomies) ) :
            $number = 1;
            foreach( $taxonomies as $product_term ) {
               $term_link = get_term_link( $product_term, 'product_cat' );
               $thumbnail_id = get_woocommerce_term_meta( $product_term->term_id, 'thumbnail_id', true );
               $image = wp_get_attachment_url( $thumbnail_id, 'thumbnail' );
               if ($number == 1 || $number == 4) {
                  $col_num = "col-lg-8 col-md-8 col-12";

               }else{
                  $col_num = "col-lg-4 col-md-4 col-12";
               }
            ?>
         <div class="<?php echo $col_num; ?>">
            <div class="box">
               <?php if($image){ ?>
                <img src="<?php echo $image; ?>" alt="" />
                  <?php }else{ ?>
               <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cate1.png" alt="" />
               <?php } ?>
               <div class="content">
                  <h4><?php  echo $product_term->name;?></h4>
                  <a href="<?php echo esc_url($term_link); ?>"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg" alt="" /></a>
               </div>
            </div>
         </div>
         <?php
         $number++;
            }
         endif; ?>
      </div>
   </div>
</section>

<!-- Create Section -->
<section class="hm-create">
  <div class="container-fluid">
   <div class="row">
      <div class="col-lg-6 col-md-6 col-12 p-0">
         <div class="img-block">
              <?php if(get_field('create_your_own_left_image')){ ?>
					<img src="<?php the_field('create_your_own_left_image'); ?>" alt="" />
					<?php }else{ ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/create.png" alt="" />
					<?php } ?>
         </div>
      </div>
      <div class="col-lg-6 col-md-6 col-12 p-0">
         <div class="text-block">
           <h2 class="cs-mb"><?php the_field('create_your_own_title'); ?></h2>
           <p><?php the_field('create_your_own_details'); ?> </p>
           <a class="cmn-btn" href="<?php echo wc_get_page_permalink( 'shop' ) ?>">Order Now</a>
           <div class="rt-img">
               <?php if(get_field('create_your_own_details_image')){ ?>
					<img src="<?php the_field('create_your_own_details_image'); ?>" alt="" />
					<?php }else{ ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/create-sape.png" alt="" />
					<?php } ?>
           </div>
         </div>
      </div>
   </div>
  </div>
</section>

<!-- Products Section -->
<section class="hm-product cmn-gap">
   <div class="container">
      <div class="title-pnl">
         <div class="lt-side">
            <h2><?php the_field('new_products_title'); ?></h2>
         </div>
         <div class="rt-side">
            <a class="cmn-btn" href="<?php echo wc_get_page_permalink( 'shop' ) ?>">VIEW PRODUCT</a>
         </div>
      </div>
      <div class="row">
         <?php
             $exclude_plant_list = get_option('exclude_plant_list');
             //echo "<pre>"; print_r(array_unique($exclude_result));
            if (!empty($_COOKIE['customer_usda_zip'])) {
               $cookieValue = $_COOKIE['customer_usda_zip'];
               $decoded_json = json_decode(stripslashes($_COOKIE['customer_usda_zip']),true);
               $customer_usda_zip = $decoded_json['zone'];
               //print_r($decoded_json);
            } else{
               if ( !is_user_logged_in() ) {
                  $customer_usda_zip = "";
               }else{
                  $customer_usda_zip_array = unserialize(get_user_meta( get_current_user_id(), '_customer_usda_zip', true ));
                  if(!empty($customer_usda_zip_array)){
                  $customer_usda_zip = $customer_usda_zip_array['zone'];
                  }else{
                  $customer_usda_zip = "";
                  }
               }
            }
            $taxonomy = 'usda-zone';
            $terms = array( $customer_usda_zip );
            if(!empty($customer_usda_zip)){
               $tax_query = array(
                  array(
                     'taxonomy' => 'pa_'.$taxonomy,
                     'field'    => 'slug',
                     'terms'    => $terms,
                    'operator' => 'IN'
                  ),
               );
            }
            $args = array(
                  'posts_per_page' => 8,
                  'post_type' => 'product',
                  'orderby'    => 'ID',
                  'post_status' => 'publish',
                  'post__not_in' => $exclude_plant_list,
                  'order'    => 'DESC',
                  'meta_query'    => array(
                     array(
                        'key' => 'product_acquirable',
                        'value' => 'For Sale',
                        'compare' => '=',
                     ),
                  ),
                  'tax_query' =>  $tax_query,
            );
            $products = new WP_Query( $args );
            if($products->have_posts()) :
            while ( $products->have_posts() ) : $products->the_post();
            $_product = wc_get_product( get_the_ID() );
            $regular_price =  (float) $_product->get_regular_price();
            $sale_price = (float) $_product->get_sale_price();

				// Fix: Uncaught DivisionByZeroError: Division by zero
				if ($regular_price > 0 && $sale_price > 0) {
					$saving_percentage = round(($regular_price - $sale_price) / $regular_price * 100) . '%';
				}

            //$_product->get_price();
            $img_atts = wp_get_attachment_image_src( get_post_thumbnail_id( $products->ID ), 'single-post-thumbnail' );
            //echo "<pre>"; print_r($img_atts);

            ?>
         <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="box">
               <div class="img">
                  <a href="<?php the_permalink(); ?>">
                     <?php if($img_atts[0]){ ?>
                     <img src="<?php echo $img_atts[0]; ?>" alt="" />
                     <?php }else{ ?>
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/no_image.jpg" alt="" />
                     <?php } ?>
                     <?php if($sale_price && $saving_percentage){ ?>
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
         endif;
            ?>

      </div>
   </div>
</section>

<!-- Blog Section -->
<!-- <section class="hm-blog cmn-gap">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 col-md-4 col-12">
            <div class="lt-wrap">
               <?php if(get_field('from_our_blog_banner')){ ?>
					<img src="<?php the_field('from_our_blog_banner'); ?>" alt="" />
					<?php }else{ ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/blg-lf.png" alt="" />
					<?php } ?>
            </div>
         </div>
         <div class="col-lg-8 col-md-8 col-12">
            <div class="rt-wrap">
               <div class="title-pnl">
                  <div class="title-lt">
                   <h2><?php the_field('from_our_blog_title'); ?></h2>
                  </div>
                  <a href="<?php echo esc_url( get_page_link( 21 ) ); ?>">See All</a>

                </div>
                <div class="blog-wrap">
                  <?php
                     $args = array(
                        'post_type'=> 'post',
                        'orderby'    => 'ID',
                        'post_status' => 'publish',
                        'order'    => 'DESC',
                        'posts_per_page' => 2 // this will retrive all the post that is published
                     );
                     $result = new WP_Query( $args );
                     if ( $result-> have_posts() ) :
                        while ( $result->have_posts() ) : $result->the_post();
                     ?>
                   <div class="box">
                      <div class="img-blog">
                         <a href="<?php echo get_permalink( $result->ID ); ?>">
                           <?php if (has_post_thumbnail( $result->ID ) ){
                           $image = wp_get_attachment_image_src( get_post_thumbnail_id( $result->ID ), 'single-post-thumbnail' );
                              ?>
                           <img src="<?php echo $image[0]; ?>" alt="" />
                           <?php }else{ ?>
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-1.png" alt="" />
                           <?php } ?>
                        </a>
                      </div>
                      <div class="text-block">
                         <span><?php echo get_the_date( 'M d, Y' ); ?></span>
                         <h6><a href="<?php echo get_permalink( $result->ID ); ?>"><?php the_title(); ?></a></h6>
                         <p><?php echo get_the_excerpt(); ?></p>
                         <a href="<?php echo get_permalink( $result->ID ); ?>">Read More</a>
                      </div>
                   </div>
                   <?php
                        endwhile;
                     endif;
                     wp_reset_postdata();
                     ?>
                </div>
            </div>
         </div>
      </div>
   </div>
</section> -->

<?php get_footer(); ?>

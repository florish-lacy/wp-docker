<?php /* Template Name: Contact Us */ ?>

<?php get_header(); ?>

<!-- Inner Banner -->
<div class="inn-bann">
   <?php if(get_field('banner_image')){ ?>
      <img src="<?php the_field('banner_image'); ?>" alt="" />
      <?php }else{ ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact-banner.png" alt="" />
   <?php } ?>
   <div class="desc">
      <div class="container">
         <h1><?php the_field('banner_title'); ?></h1>
      </div>
   </div>
</div>

<div class="get-in">
   <div class="container">
      <div class="inn">
         <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 p-0">
               <div class="text-pnl">
                  <h3><?php the_field('contact_us_title'); ?></h3>
                  <p><?php the_field('contact_us_sub_title'); ?></p>
                  <div class="contact-us-frm">
                     <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 p-0">
               <div class="address">
                  <h4>Registered Address:</h4>
                  <div class="block">
                     <div class="img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/map.png" alt="" />
                     </div>
                     <div class="text">
                        <h6>Address:</h6>
                        <p><?php the_field('address'); ?></p>
                     </div>
                  </div>
                  <div class="block">
                     <div class="img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/email.png" alt="" />
                     </div>
                     <div class="text">
                        <h6>Email:</h6>
                        <p><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
                     </div>
                  </div>
                  <div class="block">
                     <div class="img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.png" alt="" />
                     </div>
                     <div class="text">
                        <h6>Phone:</h6>
                        <p><a href="tel:<?php the_field('phone_1'); ?>"><?php the_field('phone_1'); ?></a> <a href="tel:<?php the_field('phone_2'); ?>"><?php the_field('phone_2'); ?></a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php get_footer(); ?>

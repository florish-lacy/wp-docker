<?php /* Template Name: Forgot Password */ ?>

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
         <h1>Forgot Password</h1>
      </div>
   </div>
</div>

<div class="get-in">
   <div class="container">
        <h2>Forgot Password</h2>
        <div class="response_essage"></div>
        <form action="" id="ForgotPasswordForm" method="post" >
         <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
             <p>Provide your email to recived a OTP for resetting your password</p>
               <div class="form-group">
                  <label for="forgot_email">Email</label>
                  <input  type="email" id="forgot_email" name="forgot_email" class="form-control" placeholder="Enter your email.." required>
               </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
               <button type="submit" name="submit"
                  class="sub-field sub-info-btn">Send OTP</button>
            </div>
         </div>
        </form>
        <form method="post" id="verify_email" class="digit-group" data-group-name="digits" data-autosubmit="false" autocomplete="off" style="display:none;">
         <input type="hidden" name="user_id" id="user_id" value="">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <p>Enter the OTP send to your email (<span class="set_email"></span>) to proceed with password reset.</p>
               <div class="form-group">
               <input type="text" id="digit-1" name="digit-1" data-next="digit-2" />
               <input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
               <input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
               <input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
               <input type="text" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" />
               <input type="text" id="digit-6" name="digit-6" data-previous="digit-5" />
               </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
               <button type="submit" name="continue"
                  class="sub-field sub-info-btn btn-continue">Continue</button>
            </div>
         </div>
        </form>
        <form action="" id="ChangePasswordForm" method="post"  style="display:none;">
        <input type="hidden" name="user_id" id="c_user_id" value="">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
             <p>Create and confirm your new password below to reagain access to your account</p>
               <div class="form-group">
                  <label for="new_password">New Password</label>
                  <input  type="password" id="new_password" name="new_password" class="form-control" placeholder="Enter your new password" required>
               </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
               <div class="form-group">
                  <label for="confirm_password">Confirm Password</label>
                  <input  type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
               </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
               <button type="submit" name="submit"
                  class="sub-field sub-info-btn">Save Password</button>
            </div>
         </div>
        </form>
   </div>
</div>

<?php get_footer(); ?>

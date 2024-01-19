<?php /* Template Name: Update Nursery Registration */ ?>
<?php
$current_user = wp_get_current_user();
if ( !wc_user_has_role( $current_user, 'nursery' )){
  wp_safe_redirect(home_url());
}
?>
<?php get_header(); ?>


<!-- Inner Banner -->
<div class="inn-bann">
    <?php if(get_field('banner_image')){ ?>
    <img src="<?php the_field('banner_image'); ?>" alt="" />
    <?php }else{ ?>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog.png" alt="" />
    <?php } ?>
    <div class="desc">
        <div class="container">
            <h1><?php the_field('banner_title'); ?></h1>
        </div>
    </div>
</div>

<div class="nursery-wrap cmn-gap">
    <div class="container">
      <?php if ( is_user_logged_in() ) { ?>
        <div class="nursery-registration">
        <?php echo do_shortcode('[gravityform id="7" title="false" description="false" ajax="true"]'); ?>
        </div>
        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>
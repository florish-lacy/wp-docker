<?php /* Template Name: Nursery Registration */ ?>

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
      <?php if ( !is_user_logged_in() ) { ?>
        <div class="nursery-registration">
        <?php echo do_shortcode('[gravityform id="4" title="false" description="false" ajax="false"]'); ?>
        </div>
        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>
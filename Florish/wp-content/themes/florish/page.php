<?php get_header(); ?>
<?php if(is_cart() || is_checkout() || is_account_page()){ ?>
<div class="single-shop">
<?php } ?>
<div class="container">

    <?php    
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    ?>
  
</div>
<?php if(is_cart() || is_checkout() || is_account_page()){ ?>
</div>
<?php } ?>
<?php get_footer(); ?>
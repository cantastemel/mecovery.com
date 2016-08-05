<?php
/*
Template Name: 404 Page
*/
?>
<?php get_header(); ?>

<section class="hero">
    <div class="row">
        <div class="small-12 medium-12 columns">
            <div class="masthead">
                <h1>Oops! This page may be broken.</h1>
                <h3>Thank goodness we have Mecovery to track this page's recovery process!</h3>
            </div>
        </div>    
    </div>
</section>
<section class="text-block">
    <div class="row">
        <div class="small-12 medium-10 large-8 medium-centered columns">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/404_image@2x.png" alt="404">
            <br><br><br><br>
            <a href="<?php echo home_url(); ?>" class="btn btn--solid-blue">Return Home</a>
        </div>
    </div>
</section>
<?php get_footer(); ?>
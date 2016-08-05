<?php
/*
Template Name: Signup
*/
?>
<?php get_header(); ?>

<section>
    <div class="row">
        <div class="small-10 medium-8 large-7 small-centered columns">
            <div class="masthead">
                <h2><?php the_field('signup_title'); ?></h2>
                <?php the_field('signup_text'); ?>
            </div>
            <div class="signup-container">
                <?php the_field('signup_form'); ?>
            </div>
            <div class="privacy-msg">
                <?php the_field('signup_privacy_text'); ?>
            </div>
        </div>    
    </div>
</section>
<?php get_footer(); ?>
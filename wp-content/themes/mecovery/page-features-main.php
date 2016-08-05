<?php
/*
Template Name: Features Main
*/
?>
<?php get_header(); ?>

<section class="hero">
    <div class="row">
        <div class="small-12 medium-12 columns">
            <div class="masthead">
                <h1><?php the_field('masthead_title'); ?></h1>
                <?php if(get_field( "masthead_text" )!= "") { ?>
                    <?php the_field('masthead_text'); ?>
                <?php } ?>
                <?php if(get_field( "masthead_image" )!= "") { ?>
                    <div class="masthead-img">
                        <img src="<?php the_field('masthead_image'); ?>">
                    </div>
                <?php } ?>
            </div>
        </div>    
    </div>
</section>

<?php

if( have_rows('main_features_list') ):

    while ( have_rows('main_features_list') ) : the_row();
?>

    <section class="feature-row">
        <div class="row">
            <div class="feature-col feature-col--image small-12 medium-10 medium-centered large-uncentered large-4 columns">
                <img src="<?php the_sub_field('main_feature_image'); ?>" alt="Legal Teams">
            </div>
            <div class="feature-col feature-col--text small-12 medium-10 medium-centered large-uncentered large-8 columns">
                <h2><?php the_sub_field('main_feature_title'); ?></h2>
                <?php the_sub_field('main_feature_text'); ?>
            </div>
        </div>
    </section>

<?php
    endwhile;

else :

    // no rows found

endif;

?>

<?php include 'modular-content.php'; ?>

<?php get_footer(); ?>
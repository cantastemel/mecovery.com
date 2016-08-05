<?php
/*
Template Name: Our Customers
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

if( have_rows('our_customers') ):

    while ( have_rows('our_customers') ) : the_row();
?>


<section class="customer-quote text-block">
    <div class="row">
        <div class="small-12 medium-10 large-7 medium-centered columns">
            <h2><?php the_sub_field('our_customers_title'); ?></h2>
            <h3><?php the_sub_field('our_customers_subtitle'); ?></h3>
            <p class="customer-quote--text">“<?php the_sub_field('our_customers_quote'); ?></p>
            <img src="<?php the_sub_field('our_customers_headshot'); ?>" class="customer-quote--img">
            <div class="customer-quote--meta">
                <?php the_sub_field('our_customers_name'); ?>
            </div>
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
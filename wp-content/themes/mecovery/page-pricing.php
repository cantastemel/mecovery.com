<?php
/*
Template Name: Pricing
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
<section class="pricing">
    <div class="row">
        <div class="small-12 large-10 large-centered columns">
            <h2><?php the_field('pricing_title'); ?></h2>

            <?php

            if( have_rows('pricing_tables') ): ?>
                
                <div class="pricing-columns">
                
            <?php while ( have_rows('pricing_tables') ) : the_row(); 
                if (get_sub_field('popular') != false) {
                    $popular = 'popular';
                }else{
                    $popular = '';
                }
            ?>
                <div class="pricing-column <?php echo $popular; ?>">
                    <?php if (get_sub_field('popular') != false && get_sub_field('popular_text') != '') { ?>
                        <div class="popular-header-container">
                            <div class="popular-header"><?php the_sub_field('popular_text'); ?></div>
                        </div>
                    <?php } ?> 
                    <div class="pricing-column--price">
                        <?php the_sub_field('price'); ?>
                    </div>
                    <div class="pricing-column--plan-type">
                        <?php the_sub_field('plan_type'); ?>
                    </div> 
                    <div class="pricing-column--plan-info">
                        <?php the_sub_field('plan_info'); ?>
                    </div> 
                    <div class="pricing-column--cta">
                        <?php the_sub_field('plan_cta'); ?>
                    </div> 
                </div>

            <?php endwhile; ?>

                </div> <!-- closing pricing-columns -->

            <?php else :

                // no rows found

            endif;

            ?>
            <div class="text-center">
            <p>&nbsp;</p>
            <a href="/privacy-policy">Privacy Policy</a>&nbsp;&nbsp; | &nbsp;&nbsp;
            <a href="/terms-of-service">Terms of Service</a>
            </div>
        </div>
    </div>
</section>

<?php include 'modular-content.php'; ?>


<?php get_footer(); ?>
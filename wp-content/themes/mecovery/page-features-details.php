<?php
/*
Template Name: Features Details
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

if( have_rows('feature_details_list') ):

    while ( have_rows('feature_details_list') ) : the_row();
        
        if (get_sub_field('full_bleed_image') != false) {
            $bleed = 'has-bleed';
        }else{
            $bleed = '';
        }
?>

<section class="feature-details-row <?php echo $bleed; ?>">
    <div class="row">
        <div class="feature-details-columns">
            <div class="feature-details-col feature-details-col--text">
                <h2><?php the_sub_field('feature_details_title'); ?></h2>
                <?php the_sub_field('feature_details_text'); ?>

                <?php if( have_rows('details_list') ): ?>
                    <div class="feature-details-list">
                     
                    <?php while( have_rows('details_list') ): the_row(); ?>
                    
                        <div class="feature-details-list--item">
                            <div class="feature-details-list--icon">
                                <img src="<?php the_sub_field('detail_icon'); ?>">
                            </div>
                            <div class="feature-details-list--title">
                                <?php the_sub_field('detail_title'); ?>
                            </div>
                            <div class="feature-details-list--text">
                                <p><?php the_sub_field('detail_text'); ?></p>
                            </div> 
                        </div>

                    <?php endwhile; ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="feature-details-col feature-details-col--img">
                <div class="img-wrap">
                    <img src="<?php the_sub_field('feature_details_image'); ?>">
                </div>
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
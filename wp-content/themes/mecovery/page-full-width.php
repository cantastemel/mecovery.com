<?php
/*
Template Name: Full Width
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
<section class="text-block text-left">
    <div class="row">
        <div class="small-12 large-9 large-centered columns">
            <?php the_field('body_text'); ?>
        </div>
    </div>
</section>

<?php include 'modular-content.php'; ?>

<?php get_footer(); ?>
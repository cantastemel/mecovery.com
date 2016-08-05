<?php
/*
Template Name: About
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
<section>
    <div class="row">
        <div class="small-12 large-8 columns text-left">
            <?php the_field('about_body_text'); ?>
        </div>
        <div class="small-12 large-4 columns about-img only-desktop">
            <img src="<?php the_field('about_body_image'); ?>">
        </div>
    </div>
</section>
<section>
    <div class="row">
        <div class="small-12 medium-12 columns">
            <h2 class="team-title"><?php the_field('team_title'); ?></h2>
        </div>
    </div>


        <?php

        if( have_rows('team_members') ): ?>

        <div class="team-list">

            <?php while ( have_rows('team_members') ) : the_row(); ?>

                <div class="team-member">
                    <div class="row">
                        <div class="columns team-member-left">
                        <div class="team-member--photo">
                            <img src="<?php the_sub_field('team_member_photo'); ?>" width="480" height="320">
                        </div>
                        </div>
                        <div class="columns team-member-right">
                            <h2 class="team-member--name"><?php the_sub_field('team_member_name'); ?> <span><?php the_sub_field('team_member_title'); ?></span></h2>
                            <div class="team-member--info">
                                <p><?php the_sub_field('team_member_info'); ?></p>
                            </div>

                            <?php

                            if( have_rows('team_member_social') ): ?>

                            <div class="team-member--social">
                                <ul>

                                    <?php while ( have_rows('team_member_social') ) : the_row(); ?>

                                    <li>
                                        <a href="<?php the_sub_field('social_url'); ?>"><img src="<?php the_sub_field('social_icon'); ?>" width="50" height="50"></a>
                                    </li>

                                    <?php endwhile; ?>

                                </ul>
                            </div>

                            <?php else :
                                // no rows found
                            endif;

                            ?>
                            
                        </div>
                    </div>
                </div>

        <?php endwhile; ?>

        </div> <!-- end team-list -->

        <?php else :

            // no rows found

        endif;

        ?>
</section>

<section class="no-pad-b">
    <div class="row">
        <div class="small-12 medium-12 columns">
            <h2><?php the_field('contact_title'); ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="contact-info-col contact-email">
            <?php the_field('contact_email'); ?>
        </div>
        <div class="contact-info-col contact-info-address">
            <?php the_field('contact_address'); ?>
        </div>
        <div class="contact-info-col contact-info-tel">
            <?php the_field('contact_phone'); ?>
        </div>
    </div>
    <div id="map"></div>
</section>

<?php include 'modular-content.php'; ?>

<?php get_footer(); ?>
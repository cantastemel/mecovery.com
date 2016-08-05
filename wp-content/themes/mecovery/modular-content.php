<?php
if( have_rows('modular_content') ):
    while ( have_rows('modular_content') ) : the_row();

        if (get_row_layout() == 'text_block' ){ ?>
            <section class="text-block">
                <div class="row">
                    <div class="small-12 large-9 large-centered columns">
                        <?php the_sub_field('text_area'); ?>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if (get_row_layout() == 'testimonial_block' ){ ?>
            <section class="testimonial-block">
                <div class="row">
                    <div class="small-12 large-9 large-centered columns">
                        <blockquote>“<?php the_sub_field('quote'); ?>” </blockquote>
                        <?php the_sub_field('sub_text_area'); ?>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if (get_row_layout() == 'features_block' ){ ?>

            <section class="features-block">
                <div class="row">   
                    <div class="small-12 large-12 large-centered columns">
                        <h2 class="section-title"><?php the_sub_field('block_title'); ?></h2>
                        <?php
                        // check if the nested repeater field has rows of data
                        if( have_rows('features_list') ):

                            echo '<ul class="content-block-list--three-col">';

                                // loop through the rows of data
                                while ( have_rows('features_list') ) : the_row();
                                    if (get_sub_field('feature_icon')) {
                                        $icon = get_sub_field('feature_icon');
                                    }
                                    if (get_sub_field('feature_title')) {
                                        $title = get_sub_field('feature_title');
                                    }
                                    if (get_sub_field('feature_text')) {
                                        $text = get_sub_field('feature_text');
                                    }

                                    echo '<li>';
                                        if (get_sub_field('feature_icon')) {
                                            echo '<div class="img-holder">';
                                            echo '<img src="'. $icon .'">';
                                            echo '</div>';
                                        }
                                        if (get_sub_field('feature_title')) {
                                            echo '<h3>'. $title .'</h3>';
                                        }
                                        if (get_sub_field('feature_text')) {
                                            echo '<p>'. $text .'</p>';
                                        }
                                    echo '</li>';

                                endwhile;

                            echo '</ul>';

                            echo the_sub_field('block_cta');
                        endif;
                        ?>

                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if (get_row_layout() == 'faq_block' ){ ?>
            <section class="faq-block">
                <div class="row">   
                    <div class="small-12 large-12 columns">
                        <h2><?php the_sub_field('faq_title'); ?></h2>
                        <div class="faq-container">
                            <ul class="faq-list">
                            <?php

                            if( have_rows('faq_list') ): ?>

                                <?php while ( have_rows('faq_list') ) : the_row(); ?>

                                    <li>
                                        <div class="faq-list--question">
                                            <?php the_sub_field('faq_question'); ?>
                                        </div>
                                        <div class="faq-list--answer">
                                            <?php the_sub_field('faq_answer'); ?>
                                        </div>
                                    </li>

                                <?php endwhile; ?>

                            <?php else :

                                // no rows found

                            endif;

                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?> <!-- end faq block -->

    <?php endwhile; ?>
<?php endif; ?>
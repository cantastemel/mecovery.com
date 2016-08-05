<?php
/*
Template Name: Blog Template
*/
?>
<?php get_header(); ?>

<section class="hero">
    <div class="row">
        <div class="small-12 medium-12 columns">
            <div class="masthead">
                <h1>The Mecovery Blog.</h1>
                <h3>Lorem Ipsum.</h3>
            </div>
        </div>    
    </div>
</section>
<main role="main">
    <section class="searchform">
        <div class="row">
            <div class="small-12 medium-12 large-9 large-centered columns">
                <?php get_template_part('searchform'); ?>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="small-12 medium-10 medium-centered large-8 large-uncentered columns">
                <div class="blog-posts-list">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                query_posts(array(
                    'post_type'      => 'post',
                    'paged'          => $paged,
                    'posts_per_page' => 4
                ));
                // make posts print only the first part with a link to rest of the post.
                global $more;
                $more = 0;
                if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>    
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-meta">
                        Written by <span class="author"><?php the_author(); ?></span>, posted on <?php the_date(); ?>
                        <p><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>
                    </div>
                    
                        <?php $blogImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                        <?php if ($blogImage): ?>
                            <div class="blog-image">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo $blogImage; ?>" alt="<?php the_title(); ?>"></a>
                            </div>
                        <?php endif ?>
                    
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="readmore-link">Read more</a>
                </article>
                <?php endwhile; ?>
                <?php show_numeric_posts_nav(); ?>
                <?php else : ?>
                    <p>No posts have been found.</p>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
                </div> <!-- end blog posts list -->
            </div>
            <?php get_sidebar(); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>
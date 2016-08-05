<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
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
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>

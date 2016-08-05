<?php get_header(); ?>
<main role="main">
	<section class="searchform">
		<div class="row">
	        <div class="small-12 medium-12 large-9 large-centered columns">
	            <?php get_template_part('searchform'); ?>
	        </div>
	    </div>
	</section>
	<section class="text-block text-left">
	    <div class="row">
	        <div class="small-12 medium-10 medium-centered large-8 large-uncentered columns">
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<h2 class="blog-title-single"><?php the_title() ?></h2>
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


						<?php the_content(); // Dynamic Content ?>

					</article>
					<!-- /article -->
					<?php comments_template(); ?>
				<?php endwhile; ?>

				<?php else: ?>

					<!-- article -->
					<article>

						<h2>Sorry, nothing to display.</h2>

					</article>
					<!-- /article -->

				<?php endif; ?>
	        </div>
	        <?php get_sidebar(); ?>
	    </div>
	</section>
</main>
<?php get_footer(); ?>
<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="text-block text-left">
		<div class="row">
        	<div class="small-12 medium-10 medium-centered large-8 large-uncentered columns">
        		<h2><?php the_title(); ?></h2>
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php the_content(); ?>

					</article>
					<!-- /article -->

				<?php endwhile; ?>

				<?php else: ?>

					<!-- article -->
					<article>

						<h2>Sorry, nothing to display.</h2>

					</article>
					<!-- /article -->

				<?php endif; ?>
        	</div>
        </div>
		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

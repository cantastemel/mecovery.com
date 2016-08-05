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
				<h2 class="section-title">Latest Posts</h2>

				<?php get_template_part('loop'); ?>

				<?php show_numeric_posts_nav(); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</section>
	<!-- /section -->
</main>

<?php get_footer(); ?>
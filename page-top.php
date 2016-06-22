<?php //Template Name: Page Top Content
			get_header();
			if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="container">
		<div class="row top-box">
			<?php the_content(); ?>
		</div>
	</div>
</section>

	<?php endwhile; ?>
<?php get_footer(); ?>
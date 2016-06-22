<?php get_header();
			if ( have_posts() ) while ( have_posts() ) : the_post();
				$pid = $post->ID;
				$heroMessage = get_post_meta($pid, 'heroMessage', true); ?>

<?php if ($heroMessage) : ?>
	<div class="container">
		<div class="hero-message">
			<?php echo $heroMessage; ?>
		</div>
	</div>
<?php endif; ?>
</section>

<?php $articleBG = get_post_meta($post->ID, 'articleBG', true);
		if ($articleBG) : ?>
			<article class="page-article" id="<?php the_slug(); ?>" style="<?php echo $articleBG ?>">
		<?php else : ?>
			<article class="page-article" id="<?php the_slug(); ?>">
		<?php endif; ?>
				<div class="container">
					<?php the_content(); ?>
				</div>
			</article>
<?php endwhile; ?>
<?php get_footer(); ?>
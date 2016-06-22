<?php //Template Name: Page Tree Loader
			get_header();
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

<?php if ( have_posts() ) while ( have_posts() ) : the_post();
			if (get_the_content()) : ?>

				<article class="page-article" id="<?php the_slug(); ?>">
					<div class="container">
						<?php the_content(); ?>
					</div>
				</article>
	
<?php endif; endwhile; ?>

<?php $page_query = query_posts(array(
				'post_parent' => $pid,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_type' => 'page',
				'posts_per_page' => -1
			));
			if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php $articleBG = get_post_meta($post->ID, 'articleBG', true);
		if ($articleBG) : ?>
			<article class="page-article" id="<?php the_slug(); ?>" style="<?php echo $articleBG ?>">
		<?php else : ?>
			<article class="page-article" id="<?php the_slug(); ?>">
		<?php endif; ?>
				<div class="container">
					<h2 class="bordered-headline"><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
			</article>
<?php endwhile; ?>
<?php get_footer(); ?>
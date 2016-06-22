<?php get_header(); ?>

	<div class="container">
		<h1 class="padded-headline text-center text-shadow">Here's what we found when you searched <strong><?php the_search_query(); ?></strong></h1>

			<?php $count=1; if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if ($count==1) : ?>
					<div id="search-results-carousel" class="carousel slide" data-interval="false">
						<div class="carousel-inner">
				<?php endif; ?>
							<div class="col-sm-4 single-search-result">
								<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
								<?php the_excerpt(); ?>
							</div>
							<?php $count++; ?>
				<?php if (!more_posts()) : ?>
						</div><!--carousel-inner-->
					</div><!--search-results-carousel-->
					<?php if ($count>4) : ?>
						<ul class="pager">
							<li class="previous"><a href="#search-results-carousel" data-slide="prev">&larr; This way</a></li>
							<li class="next"><a href="#search-results-carousel" data-slide="next">That way &rarr;</a></li>
						</ul>
					<?php endif; ?>
				<?php endif; ?>

			<?php endwhile; else: ?>
				<div class="text-center text-shadow">
					<h2>Absolutely nothing.</h2>
					<p class="lead half-width">We're not sure what you were hoping to find, but it's not here.</p>
					<p class="lead half-width">Interested in something else?</p>
					<?php get_search_form(); ?>
				</div><!--no-results-->
			<?php endif; ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>
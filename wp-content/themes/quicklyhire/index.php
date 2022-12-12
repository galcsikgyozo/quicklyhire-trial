<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $post_id = get_the_ID(); ?>
	<main>
		<section>
			<div class="container">
				<?php the_content(); ?>
			</div>
		</section>
	</main>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
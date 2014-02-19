<?php get_header(); ?>

<h2>This is a generic 'single' template.</h2>

<?php //get_sidebar(); ?>

<div class="main-content clearfix">

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php //get_template_part( 'content', 'page' ); ?>

					<?php //comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
		
</div><!-- .main-content -->
		
<?php //get_sidebar("secondary"); ?>
<?php get_footer(); ?>
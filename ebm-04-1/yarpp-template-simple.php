<?php 
/*
YARPP Template: Single
Description: The EBM YARPP template.
*/
?>

<?php if (have_posts()):?>
	<div class="relatedPosts">
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('module','postsnippet'); ?>
		<?php endwhile; ?>
	</div>
<?php else:
	// If there are no recent posts, show nothing
endif; ?>

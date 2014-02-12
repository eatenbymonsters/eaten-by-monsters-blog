<?php 
/*
YARPP Template: Simple
Author: mitcho (Michael Yoshitaka Erlewine)
Description: A simple example YARPP template.
*/
?><h3>Related Posts</h3>
<?php if (have_posts()):?>
<ol>
	<?php while (have_posts()) : the_post(); ?>
	<li class="related">
		<a href="<?php the_permalink() ?>" rel="bookmark">
		<div class="related-post clearfix">
			<div class="related-post-title">
				<h4>
					<?php $mini_description = get_post_meta($post->ID, 'mini-description', true);
					if ($mini_description) {
						echo get_post_meta($post->ID, 'mini-description', true);
					} else {
						the_title();
					}?>
				</h4>
			</div><!-- .related-post-title -->
			
			<div class="related-post-meta">
				<?php $meta_exists = get_post_meta($post->ID, 'meta-exists', true); if ($meta_exists){
					$meta_band = get_post_meta($post->ID, 'band-name', true); if ($meta_band) {?>
						<p>band name</p>
						<p class="related-meta"><?php echo get_post_meta($post->ID, 'band-name', true);?></p>
						<?php }
					$meta_release = get_post_meta($post->ID, 'release-name', true); if ($meta_release) {?>
						<p>release name</p>
						<p class="related-meta"><?php echo get_post_meta($post->ID, 'release-name', true);?></p>
					<?php }
				} else {?>
					<div class="related-excerpt">
						<?php the_excerpt(); ?>
					</div><!-- .related-excerpt -->
				<?php }?>
			</div><!-- .related-post-meta -->
			
			<?php $rating = get_post_meta($post->ID, 'rating', true);
			if ($rating){?>
				<div class="post-rating">
					<?php echo get_post_meta($post->ID, 'rating', true);?>
				</div><!-- .post-rating -->
			<?php }?>
			
			<div class="related-post-image">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail('thumbnail');
				} else {?>
					<img title="post-logo" alt="default post logo" src="/wp-content/themes/ebm-02-0/imgs/default-thumb-small.png">
				<?php }?>
			</div><!-- .related-post-image -->
		</div><!-- .related-post -->
		</a><!-- (<?php the_score(); ?>)-->
	</li>
	<?php endwhile; ?>
</ol>
<?php else: ?>
<p>No related posts.</p>
<?php endif; ?>

<?php
// YARPP Template: Thumbnails
// Description: Requires a theme which supports post thumbnails
//Author: mitcho (Michael Yoshitaka Erlewine)
 ?>

<h3>Related Posts</h3>
<div class="related-posts clearfix">

	<?php while (have_posts()) : the_post(); ?>
		<div class="related-post clearfix">
			
			<h4 class="title">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
						<?php
							$mini_description = get_post_meta($post->ID, 'mini-description', true);
							if ($mini_description) {?>
								<?php echo $mini_description;?>
						<?php } else {?>
							<?php the_title(); ?>
						<?php }?>
				</a>
			</h4><!-- .title -->
			
			<div class="related-post-meta">
				<?php $meta_band = get_post_meta($post->ID, 'band-name', true); if ($meta_band) {?>
				<p class="label">band name</p>
				<p class="meta"><?php echo $meta_band;?></p>
				<?php }?>
				<?php $meta_release = get_post_meta($post->ID, 'release-name', true); if ($meta_release) {?>
				<p class="label">release name</p>
				<p class="meta"><?php echo $meta_release;?></p>
				<?php }?>
			</div><!-- .rate-post-meta -->
			
			<div class="related-post-meta">
				<span class="post-rating"><?php echo get_post_meta($post->ID, 'rating', true);?></span>
			</div><!-- .post-rating -->
			
			<div class="related-post-meta related-post-image">
				<a href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('thumbnail');
					} else {?>
						<img title="post-logo" alt="default post logo" src="/img/build/default-thumb-small.png">
					<?php }?>
				</a>
			</div><!-- .rate-post-image -->
		</div><!-- .rate-post -->
	<?php endwhile; ?>

</div><!-- .related-posts -->

<?php /*else: ?>
<p>No related posts.</p>
<?php endif; */?>

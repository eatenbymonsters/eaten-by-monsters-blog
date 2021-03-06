<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<h3>Related Photos</h3>

	<?php while (have_posts()) : the_post(); ?>
		<div class="rate-post clearfix">
			<div class="rate-post-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
					<h2>
						<?php
							$mini_description = get_post_meta($post->ID, 'mini-description', true);
							if ($mini_description) {?>
								<?php echo get_post_meta($post->ID, 'mini-description', true);?>
						<?php } else {?>
							<?php the_title(); ?>
						<?php }?>
					</h2>
				
			</div><!-- .search-post-title -->
			<div class="rate-post-meta">
				<?php $meta_band = get_post_meta($post->ID, 'band-name', true); if ($meta_band) {?>
				<p>band name</p>
				<p class="rate-meta"><?php echo get_post_meta($post->ID, 'band-name', true);?></p>
				<?php }?>
				<?php $meta_release = get_post_meta($post->ID, 'release-name', true); if ($meta_release) {?>
				<p>release name</p>
				<p class="rate-meta"><?php echo get_post_meta($post->ID, 'release-name', true);?></p>
				<?php }?>
			</div><!-- .rate-post-meta -->
			<div class="post-rating">
				<?php echo get_post_meta($post->ID, 'rating', true);?>
			</div><!-- .post-rating -->
			<div class="rate-post-image">
				<a href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('thumbnail');
					} else {?>
						<img title="post-logo" alt="default post logo" src="/wp-content/themes/ebm-02-0/imgs/default-thumb-small.png">
					<?php }?>
				</a>
			</div><!-- .rate-post-image -->
			</a>
		</div><!-- .rate-post -->
	<?php endwhile; ?>

<?php else: ?>
<p>No related photos.</p>
<?php endif; ?>

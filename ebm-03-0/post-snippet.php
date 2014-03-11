<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="home-post clearfix">
		
		<div class="home-post-head clearfix">
			<div class="home-post-title">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
					<h2>
						<?php
							$mini_description = get_post_meta($post->ID, 'mini-description', true);
							if ($mini_description) {?>
								<?php echo get_post_meta($post->ID, 'mini-description', true);?>
						<?php } else {?>
							<?php the_title(); ?>
						<?php }?>
					</h2>
				</a>
			</div><!-- .home-post-title -->
			<?php
				$rating = get_post_meta($post->ID, 'rating', true);
				if ($rating) {?>
			<div class="post-rating">
				<?php echo get_post_meta($post->ID, 'rating', true);?>
			</div><!-- .post-rating -->
			<?php }?>			
		</div><!-- .home-post-head -->
		
		<?php if (in_category('review') && has_post_thumbnail()) {?>
		<div class="home-post-body clearfix">
			<?php $mini_meta = get_post_meta($post->ID, 'band-name', true); if ($mini_meta) {?>
			<div class="home-post-meta clearfix">
				<div class="home-post-meta-labels">
					<?php $meta_band = get_post_meta($post->ID, 'band-name', true); if ($meta_band) {?>
					<p>band name:</p>
					<?php }?>
				</div><!-- .home-post-meta-labels -->
				<div class="home-post-meta-info">
					<?php if ($meta_band) {?>
					<p><?php echo get_post_meta($post->ID, 'band-name', true);?></p>
					<?php }?>
				</div><!--home-post-meta-info-->
				<div class="home-post-meta-labels">
					<?php $meta_release = get_post_meta($post->ID, 'release-name', true); if ($meta_release) {?>
					<p>release name:</p>
					<?php }?>
				</div><!-- .home-post-meta-labels -->
				<div class="home-post-meta-info">
					<?php if ($meta_release) {?>
					<p><?php echo get_post_meta($post->ID, 'release-name', true);?></p>
					<?php }?>
				</div><!--home-post-meta-info-->
				<div class="home-post-meta-labels">
					<?php $meta_label = get_post_meta($post->ID, 'record-label', true); if ($meta_label) {?>
					<p>record label:</p>
					<?php }?>
				</div><!-- .home-post-meta-labels -->
				<div class="home-post-meta-info">
					<?php if ($meta_label) {?>
					<p><?php echo get_post_meta($post->ID, 'record-label', true);?></p>
					<?php }?>
				</div><!--home-post-meta-info-->
				<div class="home-post-meta-labels">
					<?php $meta_format = get_post_meta($post->ID, 'format', true); if ($meta_format) {?>
					<p>format:</p>
					<?php }?>
				</div><!-- .home-post-meta-labels -->	
				<div class="home-post-meta-info">
					<?php if ($meta_format) {?>
					<p><?php echo get_post_meta($post->ID, 'format', true);?></p>
					<?php }?>
				</div><!--home-post-meta-info-->
			</div><!-- .home-post-meta -->
			<?php the_excerpt();?>
			<div class="home-post-link">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
					<h3>Read the Review!</h3>
				</a>
			</div><!--home-post-link-->
			<?php } else {?>
				<?php the_excerpt();?>
				<div class="home-post-link">
					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
						<h3>Read the Review!</h3>
					</a>
				</div><!--home-post-link-->
			<?php }?>
		</div><!--home-post-body-->
		
		<div class="home-post-image">
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail('medium');
				}?>
			</a>
		</div><!--home-post-image-->
		
		<?php } else if (in_category('article') && has_post_thumbnail()) {?>
			<div class="home-post-body clearfix">
				<?php the_excerpt();?>
				<div class="home-post-link">
					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
						<h3>Read the full article!</h3>
					</a>
				</div><!--home-post-link-->
			</div><!-- .home-post-body -->
			<div class="home-post-image">
				<a href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('medium');
					}?>
				</a>
			</div><!--home-post-image-->
		
		<?php } else { ?>
			<div class="home-full-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
		<?php }?>

		
	</div><!-- .home-post -->
</article><!-- #post-<?php the_ID(); ?> -->
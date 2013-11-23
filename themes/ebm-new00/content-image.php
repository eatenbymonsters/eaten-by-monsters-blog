<?php
/**
 * The template for displaying posts in the Image Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package Toolbox
 * @since Toolbox 1.2
 */
?>

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
		
		<?php if ( has_post_thumbnail() ) {?>
		<div class="home-post-body">
			<?php $mini_meta = get_post_meta($post->ID, 'band-name', true); if ($mini_meta) {?>
			<div class="home-post-meta clearfix">
				<div class="home-post-meta-labels">
					<?php $meta_band = get_post_meta($post->ID, 'band-name', true); if ($meta_band) {?>
					<p>band name:</p>
					<?php }?>
					<?php $meta_release = get_post_meta($post->ID, 'release-name', true); if ($meta_release) {?>
					<p>release name:</p>
					<?php }?>
					<?php $meta_label = get_post_meta($post->ID, 'record-label', true); if ($meta_label) {?>
					<p>record label:</p>
					<?php }?>
					<?php $meta_format = get_post_meta($post->ID, 'format', true); if ($meta_format) {?>
					<p>format:</p>
					<?php }?>
				</div><!-- .home-post-meta-labels -->	
				<div class="home-post-meta-info">
					<p><?php echo get_post_meta($post->ID, 'band-name', true);?></p>
					<p><?php echo get_post_meta($post->ID, 'release-name', true);?></p>
					<p><?php echo get_post_meta($post->ID, 'record-label', true);?></p>
					<p><?php echo get_post_meta($post->ID, 'format', true);?></p>
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
						<h3>Read More!</h3>
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
		
		<?php } else { ?>
			<div class="home-full-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
		<?php }?>

		
	</div><!-- .home-post -->
</article><!-- #post-<?php the_ID(); ?> -->


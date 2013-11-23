<?php
/**
 * The template used to display Tag Archive pages
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>

		<section id="primary">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php if (is_tag(array('9', '8', '7', '6', '5', '4', '3', '2', '1'))) {?>
						<h1 class="page-title"><?php
							echo ("Reviews rated " . single_tag_title( '', false ));
						?></h1>
					<?php } else { ?>
					
					<h1 class="page-title"><?php
						printf( __( 'Tag Archives: %s', 'toolbox' ), '<span>' . single_tag_title( '', false ) . '</span>' );
					?></h1>
					<?php } ?>

					<?php
						$tag_description = tag_description();
						if ( ! empty( $tag_description ) )
							echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
					?>
				</header>

				<?php rewind_posts(); ?>

				<?php toolbox_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ): the_post();?>
					
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header clearfix">
						<div class="post-date">
							<?php the_time('j'); ?><br>
							<?php the_time('F'); ?><br>
							<?php the_time('Y'); ?>
						</div>
						<?php
							$rating = get_post_meta($post->ID, 'rating', true);
							if ($rating) {?>
						<div class="post-rating">
							<?php echo get_post_meta($post->ID, 'rating', true);?>
						</div>
						<?php }?>
						<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

						<footer class="entry-meta-top">
							<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
								<?php
									/* translators: used between list items, there is a space after the comma */
									$categories_list = get_the_category_list( __( ', ', 'toolbox' ) );
									if ( $categories_list && toolbox_categorized_blog() ) :
								?>
								<span class="cat-links">
									<?php printf( __( 'Posted in %1$s', 'toolbox' ), $categories_list ); ?>
								</span>
								<span class="sep"> | </span>
								<?php endif; // End if categories ?>
							<?php endif; // End if 'post' == get_post_type() ?>
							<?php edit_post_link( __( 'Edit', 'toolbox' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- #entry-meta-top -->

					</header><!-- .entry-header -->
				
					<div class="excerpt">
						<?php the_excerpt();?>
						<?php 
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						  the_post_thumbnail('thumbnail');
						} 
						?>
					</div>
				
				</article><!-- #post-<?php the_ID(); ?> -->

				<?php endwhile; ?>

				<?php toolbox_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'toolbox' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'toolbox' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
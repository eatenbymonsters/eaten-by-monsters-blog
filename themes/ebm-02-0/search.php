<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>

<div id="primary">
				<div id="content" role="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="search-title"><?php printf( __( 'Search Results for: %s', 'toolbox' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header>

					<?php wp_pagenavi(); ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<div class="search-post clearfix">
						<div class="search-post-title">
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
								<?php the_excerpt();?>
							</a>
						</div><!-- .search-post-title -->
						<div class="home-post-image">
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('medium');
								} else {?>
									<img title="post-logo" alt="default post logo" src="/wp-content/themes/ebm-02-0/imgs/default-thumb.png">
								<?php }?>
							</a>
						</div><!-- .home-post-image -->
					</div><!-- .search-post -->
					<?php endwhile; ?>

					<?php wp_pagenavi(); ?>

				<?php else : ?>

					<article id="post-0" class="post no-results not-found">
						<header class="entry-header">
							<h1 class="entry-title"><?php _e( 'Nothing Found', 'toolbox' ); ?></h1>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'toolbox' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-0 -->

				<?php endif; ?>

				</div><!-- #content -->
</div><!-- #primary -->
			
<?php get_sidebar(); ?>
		
<?php include("sidebar_two.php"); ?>
		
<?php get_footer(); ?>
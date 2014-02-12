<?php
/*
Template Name: Ratings Top
*/
get_header(); ?>

<div id="primary">
				<div id="content" role="main">
					<?php if ( have_posts() && !is_paged()) : while( have_posts() ) : the_post();{?>
						<div id="rating-header">
							<h3><?php the_title();?></h3>
						     <?php the_content(); ?>
						</div><!-- #rating-header -->
					<?php } endwhile; endif; ?>
					
					<?php
					
					$args = array(
						'posts_per_page' => '6',
						'paged' => get_query_var('paged'),
						'meta_query' => array(
							array(
								'key' => 'rating',
								'value' => array( 6.9, 10.0 ),
								'type' => 'numeric',
								'compare' => 'BETWEEN'
							)
						)
					);

					// The Query
					$wp_query = new WP_Query( $args );
					
					if ( is_paged()) { wp_pagenavi(); }

					// The Loop
					while ( $wp_query->have_posts() ) :
						$wp_query->the_post();{?>
					
					
					<div class="rate-post clearfix">
						<div class="rate-post-title">
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
							
						</div><!-- .search-post-title -->
						<div class="rate-post-meta">
							<?php $meta_band = get_post_meta($post->ID, 'band-name', true); if ($meta_band) {?>
							<p>band name</p>
							<?php }?>
							<?php if ($meta_band) {?>
							<p class="rate-meta"><?php echo get_post_meta($post->ID, 'band-name', true);?></p>
							<?php }?>
							<?php $meta_release = get_post_meta($post->ID, 'release-name', true); if ($meta_release) {?>
							<p>release name</p>
							<?php }?>
							<?php if ($meta_release) {?>
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
					
					<?php } endwhile;
					
					wp_pagenavi();
					
					wp_reset_postdata();
					?>
					
				</div><!-- #content -->
</div><!-- #primary -->
			
<?php get_sidebar(); ?>
		
<?php include("sidebar_two.php"); ?>
		
<?php get_footer(); ?>
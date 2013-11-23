<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */
?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>

				<aside id="archives" class="widget">
					<h2 class="widget-title"><?php _e( 'Archives', 'toolbox' ); ?></h2>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h2 class="widget-title"><?php _e( 'Meta', 'toolbox' ); ?></h2>
					<ul>
						<?php wp_register(); ?>
						<aside><?php wp_loginout(); ?></aside>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
			
			<aside id="recent-articles-small">
				<h2>Popular Articles</h2>
				<div class="clearfix">
					<?php $the_query = new WP_Query( 'showposts=3&category_name=article' ); ?>
			    	<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
			         	<div class="mini-post clearfix">
			            	<a href="<?php the_permalink() ?>">
			               		<div class="mini-image">
			                  		<?php if ( has_post_thumbnail() ) {the_post_thumbnail('thumbnail');}?>
			               		</div>
			               		<div class="mini-excerpt">
			                  		<h3><?php the_title(); ?></h3>
			               		</div>
			            	</a>
			         	</div>
			      	<?php endwhile;?>
				</div>
			</aside>
			
			<aside id="recent-posts-small">
				<h2>Recent Reviews</h2>
				<div class="clearfix">
					<?php $the_query = new WP_Query( 'showposts=3&category_name=review' ); ?>
					<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
					<div class="mini-post clearfix">
						<a href="<?php the_permalink() ?>">
							<div class="mini-image">
								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('thumbnail');
								}?>
							</div>
							<div class="mini-excerpt">
								<h3><?php echo get_post_meta($post->ID, 'band-name', true);?></h3>
								<p><?php echo get_post_meta($post->ID, 'mini-description', true);?></p>
							</div>
						</a>
					</div>
					<?php endwhile;?>
				</div>
			</aside>
		</div><!-- #secondary .widget-area -->

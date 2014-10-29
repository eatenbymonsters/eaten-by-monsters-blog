<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>

<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title not-found"><?php _e( 'Well this is somewhat embarrassing, isn&rsquo;t it?', 'toolbox' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'toolbox' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->


<div id="secondary">

			<aside id="recent-articles">
				<h2>Recent Articles</h2>
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

</div><!-- #secondary -->
<div id="tertiary">
			<aside id="recent-posts">
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
</div><!-- #tertiary -->

<?php get_footer(); ?>
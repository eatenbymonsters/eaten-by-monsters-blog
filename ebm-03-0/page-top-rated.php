<?php
/*
Template Name: Top Rated Records
*/
get_header(); ?>

<div class="main-content top-rated clearfix">
	<?php while ( have_posts() ) : the_post(); ?>
		
		<article>
      <header>
        <h1><?php the_title(); ?></h1>
        <?php $mini_description = get_post_meta($post->ID, 'mini-description', true);
        if ($mini_description) { echo "<h2>", $mini_description, "</h2>"; } ?>
      </header>

      <?php edit_post_link('edit this post'); ?>
        
      <?php the_content(); ?>
    </article>
    <hr/>
	<?php endwhile; // end of the loop. ?>
	
	<?php
	
	$args = array(
	  
		'posts_per_page' => '10',
		'paged' => get_query_var('paged'),
		'category_name' => 'albums',
		
		/*'meta_query' => array(
			array(
				'key' => 'rating',
				'value' => array( 6.9, 10.0 ),
				'type' => 'numeric',
				'compare' => 'BETWEEN'
			)
		)*/
		
		'meta_key' => 'rating',
		'orderby' => 'meta_value_num',
		'order' => 'DESC'
	);

	// The Query
	$wp_query = new WP_Query( $args );
	
	if ( is_paged()) { ?>
	  <div class="pagenavi-box top clearfix">
      <?php if(function_exists('wp_pagenavi')) {
        wp_pagenavi();
      } else { ?>
        <div class="prev-posts fallback"><?php previous_posts_link( '« Newer Entries' ); ?></div>
        <div class="next-posts fallback"><?php next_posts_link('Older Entries »', 0); ?></div>
      <?php } ?>
    </div><!-- .pagenavi-top -->
	<?php }

	// The Loop
	while ( $wp_query->have_posts() ) :
		$wp_query->the_post();{?>
	
	
	  <article>
	   <?php the_title(); ?>
	   <?php $rating = get_post_meta($post->ID, 'rating', true);
				if ($rating) {echo get_post_meta($post->ID, 'rating', true); } ?>
	   <?php the_excerpt(); ?>
	  </article>
	  <hr/>
	
	<?php } endwhile; ?>
	
	<div class="pagenavi-box bottom clearfix">
    <?php if(function_exists('wp_pagenavi')){
      wp_pagenavi();
    } else { ?>
      <div class="prev-posts fallback"><?php previous_posts_link( '« Newer Entries' ); ?></div>
      <div class="next-posts fallback"><?php next_posts_link('Older Entries »', 0); ?></div>
    <?php } ?>
  </div><!-- .pagenavi-bottom -->
	
	<?php wp_reset_postdata(); ?>
	
</div><!-- .main-content -->

<?php get_footer(); ?>
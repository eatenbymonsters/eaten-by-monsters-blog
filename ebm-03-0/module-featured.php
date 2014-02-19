<div class="featured-loop">
  
  <?php
  // Show only the most recent post with cat. of 'featured'
  $featured_args = array(
    'posts_per_page' => 1,
    'category_name' => 'featured'
  );
  $featured_posts = new WP_Query($featured_args);
  
  if($featured_posts->have_posts()) : 
    while($featured_posts->have_posts()) : 
      $featured_posts->the_post();
  ?>
  
		<?php
		$featuredImg = "http://eatenbymonsters.com/wp-content/uploads/2013/12/default-thumb-small.png";
		$theFeaturedImg = get_post_meta($post->ID, 'featured-header', true);
		if ($theFeaturedImg){
		  $featuredImg = $theFeaturedImg;
		}
		?>
		<a href="<?php the_permalink(); ?>" class="featured-post" style="background:url(<?php echo $featuredImg; ?>) center;background-size:cover;">
		  <div class="featured-post-meta">
		    <h3><?php the_title(); ?></h3>
  		  <?php the_excerpt(); ?>
		  </div><!-- .featured-post-meta -->
    </a><!-- .featured-post -->

  <?php
    endwhile;
  else: 
  ?>
  
    <!-- Shown if there isn't a featured post: -->
    <div class="featured-post">
      <h1>No Featured Post</h1>
    </div><!-- .featured-post -->
    
  <?php
  endif;
  wp_reset_postdata();
  ?>
</div><!-- .featured-loop -->
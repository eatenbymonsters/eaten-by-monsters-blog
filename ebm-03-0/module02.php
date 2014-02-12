<?php
// Show all posts with cat. of 'featured'
$featured_args = array(
  'posts_per_page'  => 10,
  'offset'          => 1,
  'category_name'   => 'featured'
);
$featured_posts = new WP_Query($featured_args);

if($featured_posts->have_posts()) : 
  while($featured_posts->have_posts()) : 
    $featured_posts->the_post();
?>
  
    <!-- Shown if there is a featured post: -->
    <div class="main-featured-loop">
		
		<div class="featured-post">
		  <h3><?php the_title(); ?></h3>	
    </div><!-- .featured-post -->
    
    </div><!-- .main-featured-loop -->

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
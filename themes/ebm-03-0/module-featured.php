<div class="featured-loop">
  
  <?php
  // Show only the most recent post with Meta_Data Key of 'featured'
  $featured_args = array(
    'posts_per_page' => 1,
    'meta_query' => array(
      array(
        'key' => 'featured'//,// Filter by Value as well as Key
        //'value' => 'yes'
      )
    )
  );
  $featured_posts = new WP_Query($featured_args);
  
  if($featured_posts->have_posts()) : 
    while($featured_posts->have_posts()) : 
      $featured_posts->the_post();
  ?>
  
    <!-- Shown if there is a featured post: -->
    <div class="featured-post" style="background-image: url(
      <?php
        $postheadimg = get_post_meta($post->ID, 'post-head-img', true);
        if ($postheadimg) {
  		    echo get_post_meta($post->ID, 'post-head-img', true);
  	    }else{ ?>
		      http://eatenbymonsters.com/wp-content/uploads/2013/12/default-thumb-small.png
		  <?php } ?>
		)">
			
    </div><!-- .featured-post -->

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
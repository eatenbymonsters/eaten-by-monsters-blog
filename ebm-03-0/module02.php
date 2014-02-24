<div class="main-featured-loop">
  
  <div class="band-cloud clearfix">
    
    <?php
    /*
    $tags = get_tags();
    $html = '<div class="post_tags">';
    foreach ( $tags as $tag ) {
    	$tag_link = get_tag_link( $tag->term_id );

    	$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
    	$html .= "{$tag->name}</a>";
    }
    $html .= '</div>';
    echo $html;
    //*/
    ?>
    
    <?php //*
    $args = array(
      'smallest'                  => 1, 
      'largest'                   => 1,
      'unit'                      => 'em', 
      'number'                    => 50,// how many tags to show
      'orderby'                   => 'count',//'name', 
      'order'                     => 'DESC',
      'topic_count_text_callback' => 'ebm_topic_count_text',
      'exclude'                   => null,
      'taxonomy'                  => 'post_tag'
    );
    wp_tag_cloud($args);
    //*/ ?>
  </div><!-- .band-cloud -->

<?php /*?>
  
<?php // Show all posts with cat. of 'featured'
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
		
		<div class="featured-post">
		  <h3><?php the_title(); ?></h3>	
    </div><!-- .featured-post -->

<?php endwhile; else: ?>
  
    <!-- Shown if there isn't a featured post: -->
    <div class="featured-post">
      <h1>No Featured Post</h1>
    </div><!-- .featured-post -->
    
<?php endif; wp_reset_postdata(); ?>

<? //*/ ?>

</div><!-- .main-featured-loop -->
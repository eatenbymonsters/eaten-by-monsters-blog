<article class="home-post clearfix">
  
  <? // The Post Title Bar ?>
  <div class="home-post-head clearfix">
    <? // The Post Title ?>
		<div class="home-post-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2>
				<?php $mini_description = get_post_meta($post->ID, 'mini-description', true);
					if ($mini_description) {
						echo $mini_description;
					} else {
					  the_title();
				} ?>
			</h2></a>
		</div><!-- .home-post-title -->
		<? // The Post Rating ?>
		<?php $rating = get_post_meta($post->ID, 'rating', true);
			  if ($rating) {?>
		      <a class="post-rating" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		        <?php echo $rating;?>
		      </a>
		<?php }?>
	</div><!-- .home-post-head -->
	<?//*?>
  
  <?php
  // Post Meta vars
  $meta_band = get_post_meta($post->ID, 'band-name', true);
	$meta_release = get_post_meta($post->ID, 'release-name', true);
	$meta_label = get_post_meta($post->ID, 'record-label', true);
	$meta_format = get_post_meta($post->ID, 'format', true);
	// "Meta Exists" var
	$mini_meta = $meta_band || $meta_release || $meta_label || $meta_format;
	
	if($mini_meta): // If the post has "Mini Meta", then do this: ?>
	
	<div class="home-post-body meta-exists meta clearfix">
		  
		<div class="home-post-meta-box">
		  <?php if ($meta_band) {?>
		    <div class="home-post-meta">
  		    <span class="labels">band name:</span>
  		    <span class="info"><?php echo $meta_band; ?></span>
  		  </div><!-- .home-post-meta -->
  		<?php } if ($meta_release) {?>
  		  <div class="home-post-meta">
  		    <span class="labels">release name:</span>
  		    <span class="info"><?php echo $meta_release; ?></span>
  		  </div><!-- .home-post-meta -->
  		<?php } if ($meta_label) {?>
  		  <div class="home-post-meta">
  		    <span class="labels">record label:</span>
  		    <span class="info"><?php echo $meta_label; ?></span>
  		  </div><!-- .home-post-meta -->
  		<?php } if ($meta_format) {?>
  		  <div class="home-post-meta">
  		    <span class="labels">format:</span>
  		    <span class="info"><?php echo $meta_format; ?></span>
  		  </div><!-- .home-post-meta -->
  		<?php } ?>
  	</div><!-- .home-post-meta-box -->
  	
  	<div class="home-excerpt">
  	  <?php the_excerpt();?>
  	</div><!-- .home-excerpt -->
  		
  	<div class="home-post-link">
  		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
  		  <?php if (in_category('review')) { ?>
  		    Read the Review!
  		  <?php }else if (in_category('article')) { ?>
  		    Read the Article!
  		  <?php } else {?>
  		    Read the full story!
  		  <?php } ?>
  		</a>
  	</div><!--home-post-link-->
  
  </div><!-- .home-post-body-->
  
  <?php if ( has_post_thumbnail() ) { ?>
    <a class="home-post-image" href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('thumbnail'); ?>
      <?php /* <img src="<?php echo get_template_directory_uri(); ?>/img/build/coverPlaceholder.png" alt="Oops, there's no cover image!"> */ ?>
    </a><!--home-post-image-->
  <?php } ?>

  <?php else ://if (in_category('article')) : // If post is an 'article', then do this: ?>
    
    <div class="home-full-content clearfix">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
		</div>
	
	<?php //else : ?>
	  
	<?php endif; // End of "Mini Meta" IF ?>
  
</article>
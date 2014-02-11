<article <?php post_class('home-post clearfix') ?> id="post-<?php the_ID(); ?>">
  
  <div class="home-post-head clearfix">
		
		<div class="home-post-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<h2>
					<?php
						$mini_description = get_post_meta($post->ID, 'mini-description', true);
						if ($mini_description) {?>
							<?php echo get_post_meta($post->ID, 'mini-description', true);?>
					<?php } else {?>
						<?php the_title(); ?>
					<?php }?>
				</h2>
			</a>
		</div><!-- .home-post-title -->
		
		<?php
			$rating = get_post_meta($post->ID, 'rating', true);
			if ($rating) {?>
		    <div class="post-rating">
			    <?php echo get_post_meta($post->ID, 'rating', true);?>
		    </div><!-- .post-rating -->
		<?php }?>
		
	</div><!-- .home-post-head -->
  
  <?php
  // Post Meta vars
  $meta_band = get_post_meta($post->ID, 'band-name', true);
	$meta_release = get_post_meta($post->ID, 'release-name', true);
	$meta_label = get_post_meta($post->ID, 'record-label', true);
	$meta_format = get_post_meta($post->ID, 'format', true);
	// "Meta Exists" var
	$mini_meta = $meta_band || $meta_release || $meta_label || $meta_format;
	
	if($mini_meta): // If the post has "Mini Meta", then do this: ?>
	
	<div class="home-post-body meta-exists clearfix">
		  
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
  		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read the Review!</a>
  	</div><!--home-post-link-->
  
  </div><!-- .home-post-body-->

  <div class="home-post-image">
    <a href="<?php the_permalink(); ?>">		
    	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
    </a>
  </div><!--home-post-image-->
		
	<?php else: // If there's no "Mini Meta", then do this: ?>
		  
		<p>No meta.</p>
		
	<?php endif; // End of "Mini Meta" IF ?>
	
		<?php /* 
		// Post Meta Vars
		$mini_meta = get_post_meta($post->ID, 'band-name', true);
		if ($mini_meta) {?>
		<div class="home-post-meta clearfix">
			<div class="home-post-meta-labels">
				<?php if ($meta_band) {?>
				<p>band name:</p>
				<?php }?>
			</div><!-- .home-post-meta-labels -->
			<div class="home-post-meta-info">
				<?php if ($meta_band) {?>
				<p><?php echo get_post_meta($post->ID, 'band-name', true);?></p>
				<?php }?>
			</div><!--home-post-meta-info-->
			<div class="home-post-meta-labels">
				<?php if ($meta_release) {?>
				<p>release name:</p>
				<?php }?>
			</div><!-- .home-post-meta-labels -->
			<div class="home-post-meta-info">
				<?php if ($meta_release) {?>
				<p><?php echo get_post_meta($post->ID, 'release-name', true);?></p>
				<?php }?>
			</div><!--home-post-meta-info-->
			<div class="home-post-meta-labels">
				<?php  if ($meta_label) {?>
				<p>record label:</p>
				<?php }?>
			</div><!-- .home-post-meta-labels -->
			<div class="home-post-meta-info">
				<?php if ($meta_label) {?>
				<p><?php echo get_post_meta($post->ID, 'record-label', true);?></p>
				<?php }?>
			</div><!--home-post-meta-info-->
			<div class="home-post-meta-labels">
				<?php  if ($meta_format) {?>
				<p>format:</p>
				<?php }?>
			</div><!-- .home-post-meta-labels -->	
			<div class="home-post-meta-info">
				<?php if ($meta_format) {?>
				<p><?php echo get_post_meta($post->ID, 'format', true);?></p>
				<?php }?>
			</div><!--home-post-meta-info-->
		</div><!-- .home-post-meta -->
		<?php the_excerpt();?>
		<div class="home-post-link">
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
				<h3>Read the Review!</h3>
			</a>
		</div><!--home-post-link-->
		<?php } else {?>
			<?php the_excerpt();?>
			<div class="home-post-link">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
					<h3>Read the Review!</h3>
				</a>
			</div><!--home-post-link-->
		<?php }?>
	</div><!--home-post-body-->
	
	<div class="home-post-image">
		<a href="<?php the_permalink(); ?>">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail('medium');
			}?>
		</a>
	</div><!--home-post-image-->
	
	<?php } else if (in_category('article') && has_post_thumbnail()) {?>
		<div class="home-post-body clearfix">
			<?php the_excerpt();?>
			<div class="home-post-link">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
					<h3>Read the full article!</h3>
				</a>
			</div><!--home-post-link-->
		</div><!-- .home-post-body -->
		<div class="home-post-image">
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail('medium');
				}?>
			</a>
		</div><!--home-post-image-->
	
	<?php } else { ?>
		<div class="home-full-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
	<?php } 
	//*/ 
	?>
  
</article>
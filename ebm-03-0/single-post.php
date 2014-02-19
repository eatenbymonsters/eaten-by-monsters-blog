<?php get_header(); ?>
<div class="main-content clearfix">
  <span class="template-identifier">This is a ‘Single Post’ template.</span>
<?php while ( have_posts() ) : the_post(); ?>
  
  <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p class="breadcrumbs">','</p>'); } ?>
  
  <?php // Single Post Vars //
    // "Mini Description" exists
    $mini_description = get_post_meta($post->ID, 'mini-description', true);
    // Post Meta vars
    $meta_band = get_post_meta($post->ID, 'band-name', true);
  	$meta_release = get_post_meta($post->ID, 'release-name', true);
  	$meta_label = get_post_meta($post->ID, 'record-label', true);
  	$meta_format = get_post_meta($post->ID, 'format', true);
  	// "Meta" exists
  	$mini_meta = $meta_band || $meta_release || $meta_label || $meta_format;
  	// "Rating"
  	$rating = get_post_meta($post->ID, 'rating', true);
  	// "Buy It" info
  	$website = get_post_meta($post->ID, 'website', true); 
		$amazon = get_post_meta($post->ID, 'amazon', true);
		$amazon_com = get_post_meta($post->ID, 'amazon-com', true);
		$amazon_uk = get_post_meta($post->ID, 'amazon-uk', true);
		$itunes = get_post_meta($post->ID, 'itunes', true);
		$bandcamp = get_post_meta($post->ID, 'bandcamp', true);
		// "Buy It" exists
		$band_links = $website || $amazon || $amazon_com || $amazon_uk || $itunes || $bandcamp;
  ?>
  
  <article class="single-post clearfix">
    <header>
      <h1><?php the_title(); ?></h1>
      <?php if ($mini_description) { echo "<h2>", $mini_description, "</h2>"; } ?>
      
      <?php if ($mini_meta) { ?>
        <div class="meta-box meta clearfix">
          
          <div class="meta-inner clearfix">
      		  <?php if ($meta_label) {?>
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
      		  
      		  <?php if ($band_links) { ?>
      		    <div class="band-links clearfix">
      		      <span class="band-links-label">buy this record:</span>
    					  <ul class="clearfix">
    					  	<?php if ($amazon) {?>
    					  	<li><a href="<?php echo $amazon;?>">Amazon</a></li>
    					  	<?php }?>
    					  	<?php if ($amazon_com) {?>
    					  	<li><a href="<?php echo $amazon_com;?>">Amazon.com</a></li>
    					  	<?php }?>
    					  	<?php if ($amazon_uk) {?>
    					  	<li><a href="<?php echo $amazon_uk;?>">Amazon.co.uk</a></li>
    					  	<?php }?>
    					  	<?php if ($itunes) {?>
    					  	<li><a href="<?php echo $itunes;?>">iTunes</a></li>
    					  	<?php }?>
    					  	<?php if ($bandcamp) {?>
    					  	<li><a href="<?php echo $bandcamp;?>">Bandcamp</a></li>
    					  	<?php }?>
    					  	<?php if ($website) {?>
    					  	<li><a href="<?php echo $website;?>">Band's Website</a></li>
    					  	<?php }?>
    					  </ul>
    					</div><!-- .band-links -->
      		  <?php } ?>
      		</div><!-- .meta-inner -->
      		
      		<?php if ($rating) {?>
      		  <div class="rating-box">
      		    <span class="post-rating"><?php echo $rating;?></span>
      		  </div><!-- .rating-box -->
      		<?php }?>
      	</div><!-- .meta-box -->
      <?php } ?>
    </header>
    
    <?php edit_post_link('edit this post'); ?>
    
    <div class="entry-content clearfix">

  		<?php if(in_category('article')){?>
  			<div class="intro">
  				<?php if(has_excerpt()){ ?>
  					<h3><?php the_excerpt();?></h3>
  				<?php } ?>
  			</div><!-- .intro -->
  		<?php }?>

  		<?php if ( has_post_thumbnail() && !in_category(array('media', 'article'))) {?>
  		  <div class="release-cover">
  		    <?php if ($amazon_com || $amazon_uk || $amazon) { ?><a href="<?php
  		      if ($amazon_com) { echo $amazon_com;
  		      } else if ($amazon_uk){ echo $amazon_uk;
  		      } else if ($amazon){ echo $amazon;
  		      }
  		    ?>"><?php }
  		  	  the_post_thumbnail('cover'); 
  		  	if ($amazon_com || $amazon_uk || $amazon) { ?></a><?php } ?>
  		  </div><!-- .release-cover -->
  		<?php } ?>

  		<?php the_content(); ?>
  		
  		<p class="subscribe-prompt">Enjoyed reading this? <a title="subscribe" href="http://eatenbymonsters.com/feed/">Subscribe</a> to ensure you never miss a review or article!</p>
  		
    </div><!-- .entry-content -->
    
    <footer class="post-footer">
      <div class="digg-plug">
    		<?php //if(function_exists('dd_twitter_generate')){dd_twitter_generate('Compact','twitter_username');} ?>
    		<?php //if(function_exists('dd_fblike_generate')){dd_fblike_generate('Like Button Count');} ?> 
    		<?php //if(function_exists('dd_pinterest_generate')){dd_pinterest_generate('Compact');} ?> 
    		<?php //if(function_exists('dd_google1_generate')){dd_google1_generate('Compact (20px)');} ?>
    		<?php //if(function_exists('dd_stumbleupon_generate')){dd_stumbleupon_generate('Compact');} ?>
    	</div>

  		<p class="post-date">Written on <?php the_time('F j, Y'); /*?> by <?php the_author(); */ ?></p>


  		<?php wp_link_pages(); ?>
  		
    </footer><!-- .post-footer -->
  </article>
  
  <nav class="post-next-prev clearfix">
		<?php next_post_link( '<span class="next">%link</span>'); ?>
		<?php previous_post_link( '<span class="prev">%link</span>'); ?>
	</nav>
	
	<?php related_posts();?>
	
<?php endwhile; // end of the loop. ?>
</div><!-- .main-content -->
<?php get_footer(); ?>
    
    <?/*?>

  	<div class="entry-content clearfix">

  		<?php if(in_category('article')){?>
  			<div class="intro">
  				<?php if(has_excerpt()){ ?>
  					<h3><?php the_excerpt();?></h3>
  				<?php } ?>
  			</div><!-- .intro -->
  		<?php }?>

  		<?php if ( has_post_thumbnail() ) {?>
  		<div class="cover">
  			<?php if ($amazon_com) {?>
  				<a href="<?php echo get_post_meta($post->ID, 'amazon-com', true);?>">
  					<?php the_post_thumbnail('cover'); ?>
  				</a>
  			<?php } else if ($amazon_uk){ ?>
  				<a href="<?php echo get_post_meta($post->ID, 'amazon-uk', true);?>">
  					<?php the_post_thumbnail('cover'); ?>
  				</a>
  			<?php } else if ($amazon){ ?>
  				<a href="<?php echo get_post_meta($post->ID, 'amazon', true);?>">
  					<?php the_post_thumbnail('cover'); ?>
  				</a>
  			<?php } else if ( !in_category(array('media', 'article'))){
  					the_post_thumbnail('cover');
  				}
  			?>
  		</div><!-- .cover -->
  		<?php } ?>


  		<?php the_content(); ?>

  		<p>
  			Enjoyed reading this? <a title="subscribe" href="http://eatenbymonsters.com/feed/">Subscribe</a> to ensure you never miss a review or article!
  		</p>

  		<p class="post-date">Posted on <?php the_time('F j, Y'); ?> by <?php the_author(); ?></p>


  		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
  	</div><!-- .entry-content -->

  	<div id="digg-plug">
  		<?php if(function_exists('dd_twitter_generate')){dd_twitter_generate('Compact','twitter_username');} ?>
  		<?php if(function_exists('dd_fblike_generate')){dd_fblike_generate('Like Button Count');} ?> 
  		<?php if(function_exists('dd_pinterest_generate')){dd_pinterest_generate('Compact');} ?> 
  		<?php if(function_exists('dd_google1_generate')){dd_google1_generate('Compact (20px)');} ?>
  		<?php if(function_exists('dd_stumbleupon_generate')){dd_stumbleupon_generate('Compact');} ?>
  	</div><!-- #social -->

  	<footer class="entry-foot clearfix">
  		<?php
  		$website = get_post_meta($post->ID, 'website', true); 
  		$amazon = get_post_meta($post->ID, 'amazon', true);
  		$amazon_com = get_post_meta($post->ID, 'amazon-com', true);
  		$amazon_uk = get_post_meta($post->ID, 'amazon-uk', true);
  		$itunes = get_post_meta($post->ID, 'itunes', true);
  		$bandcamp = get_post_meta($post->ID, 'bandcamp', true);

  		if ($website || $amazon || $amazon_com || $amazon_uk || $itunes || $bandcamp) {?>
  			<div class="entry-buy clearfix">
  				<div class="entry-meta-labels">
  					<p>Buy this record:</p>
  				</div><!-- .entry-meta-labels [2] -->
  				<ul class="entry-meta-links">
  					<?php $amazon = get_post_meta($post->ID, 'amazon', true); if ($amazon) {?>
  					<li><a href="<?php echo get_post_meta($post->ID, 'amazon', true);?>">Amazon</a></li>
  					<?php }?>
  					<?php $amazon_com = get_post_meta($post->ID, 'amazon-com', true); if ($amazon_com) {?>
  					<li><a href="<?php echo get_post_meta($post->ID, 'amazon-com', true);?>">Amazon.com</a></li>
  					<?php }?>
  					<?php $amazon_uk = get_post_meta($post->ID, 'amazon-uk', true); if ($amazon_uk) {?>
  					<li><a href="<?php echo get_post_meta($post->ID, 'amazon-uk', true);?>">Amazon.uk</a></li>
  					<?php }?>
  					<?php $itunes = get_post_meta($post->ID, 'itunes', true); if ($itunes) {?>
  					<li><a href="<?php echo get_post_meta($post->ID, 'itunes', true);?>">iTunes</a></li>
  					<?php }?>
  					<?php $bandcamp = get_post_meta($post->ID, 'bandcamp', true); if ($bandcamp) {?>
  					<li><a href="<?php echo get_post_meta($post->ID, 'bandcamp', true);?>">Bandcamp</a></li>
  					<?php }?>
  					<?php $website = get_post_meta($post->ID, 'website', true); if ($website) {?>
  					<li><a href="<?php echo get_post_meta($post->ID, 'website', true);?>">Band's Website</a></li>
  					<?php }?>
  				</ul><!--entry-meta-links-->
  			</div><!-- .entry-buy -->
  		<?php }?>
  	</footer><!-- .entry-foot -->
  	<?php if(function_exists('related_posts')) {
  	  related_posts();
  	} ?>
  </article>
  
<?php endwhile; // end of the loop. ?>
</div><!-- .main-content -->
<?php get_footer(); ?>
<? //*/ ?>
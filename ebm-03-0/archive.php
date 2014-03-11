<?php // Generic Archive Page ?>

<?php get_header(); ?>

			
<?php if ( have_posts() ) : ?>

	<h1>
	  <?php
		if(is_day()){
			printf(__('Daily Archive: %s'),  '<span>'.get_the_date().'</span>');
		}elseif(is_month()){
			printf(__('Monthly Archive: %s'),'<span>'.get_the_date('F Y').'</span>');
		}elseif(is_year()){
			printf(__('Yearly Archive: %s'), '<span>'.get_the_date('Y').'</span>');	
		}elseif(is_tag()){
		  printf(__('Band Archive: %s'),   '<span>'.single_tag_title('',false).'</span>');  
		}else{
			_e('Archives');
		} ?>
	</h1>
	
	<?php if ( is_paged()) { ?>
	  <div class="pagenavi-box top clearfix">
      <?php if(function_exists('wp_pagenavi')) {
        wp_pagenavi();
      } else { ?>
        <div class="prev-posts fallback"><?php previous_posts_link( '« Newer Entries' ); ?></div>
        <div class="next-posts fallback"><?php next_posts_link('Older Entries »', 0); ?></div>
      <?php } ?>
    </div><!-- .pagenavi-top -->
  <?php } ?>
  
  <div class="main-content archive clearfix">
    
  		<?php rewind_posts(); ?>
  		
  		<?php // Start the Loop ?>
  		<?php while ( have_posts() ) : the_post(); ?>
    
  			<?php include("archive-post.php"); //("post-snippet.php"); ?>
    
  		<?php endwhile; ?>
    
  	<?php else : ?>
    
  		<article id="post-0" class="post no-results not-found">
  			<header class="entry-header">
  				<h1 class="entry-title"><?php _e( 'Nothing Found', 'toolbox' ); ?></h1>
  			</header><!-- .entry-header -->
    
  			<div class="entry-content">
  				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'toolbox' ); ?></p>
  				<?php get_search_form(); ?>
  			</div><!-- .entry-content -->
  		</article><!-- #post-0 -->
  	<?php endif; ?>
  <?php //endif; ?>
</div><!-- .main-content -->

<div class="pagenavi-box bottom clearfix">
  <?php if(function_exists('wp_pagenavi')){
    wp_pagenavi();
  } else { ?>
    <div class="prev-posts fallback"><?php previous_posts_link( '« Newer Entries' ); ?></div>
    <div class="next-posts fallback"><?php next_posts_link('Older Entries »', 0); ?></div>
  <?php } ?>
</div><!-- .pagenavi-bottom -->
		
<?php //get_sidebar(); ?>
		
<?php //include("sidebar_two.php"); ?>
		
<?php get_footer(); ?>
<?php
/*
Template Name: No Comments Page
*/
get_header(); ?>

<div class="main-content clearfix">
	<?php while ( have_posts() ) : the_post(); ?>
	  <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p class="breadcrumbs">','</p>'); } ?>
	  
		<?php //get_template_part( 'content', 'page' ); ?>
		
		<article class="single-post clearfix">
      <header>
        <h1><?php the_title(); ?></h1>
        <?php $mini_description = get_post_meta($post->ID, 'mini-description', true);
        if ($mini_description) { echo "<h2>", $mini_description, "</h2>"; } ?>
      </header>

      <?php edit_post_link('edit this post'); ?>
      
      <div class="entry-content clearfix">

    		<?php the_content(); ?>
    		<p class="subscribe-prompt">Enjoyed reading this? <a title="subscribe" href="http://eatenbymonsters.com/feed/">Subscribe</a> to ensure you never miss a review or article!</p>
        <footer class="post-footer">  
          <?php /* // Sharing Links Need To Be Sorted Out ?>
          <div class="digg-plug">
        		<?php //if(function_exists('dd_twitter_generate')){dd_twitter_generate('Compact','twitter_username');} ?>
        		<?php //if(function_exists('dd_fblike_generate')){dd_fblike_generate('Like Button Count');} ?> 
        		<?php //if(function_exists('dd_pinterest_generate')){dd_pinterest_generate('Compact');} ?> 
        		<?php //if(function_exists('dd_google1_generate')){dd_google1_generate('Compact (20px)');} ?>
        		<?php //if(function_exists('dd_stumbleupon_generate')){dd_stumbleupon_generate('Compact');} ?>
        	</div>
        	<?php //*/ ?>
    		  <p class="post-date">Written on <?php the_time('F j, Y'); /*?> by <?php the_author(); */ ?></p>
    		  <?php wp_link_pages(); ?>
        </footer><!-- .post-footer -->
      </div><!-- .entry-content clearfix -->
    </article>
    
	<?php endwhile; // end of the loop. ?>
</div><!-- .main-content -->

<?php get_footer(); ?>
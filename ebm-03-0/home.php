<?php get_header(); ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if(is_home() && 1 == $paged ):
  
  //get_template_part('seasonal');  
  get_template_part('module01'); ?>
  <div class="main-content clearfix">
    
<?php else:?>
  
  <div class="main-content clearfix"> 
  <div class="pagenavi-box top clearfix">
    <?php if(function_exists('wp_pagenavi')) {
      wp_pagenavi();
    } else { ?>
      <div class="prev-posts fallback"><?php previous_posts_link( '« Newer Entries' ); ?></div>
      <div class="next-posts fallback"><?php next_posts_link('Older Entries »', 0); ?></div>
    <?php } ?>
  </div><!-- .pagenavi-top -->
  
<?php endif;?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php 
	// The Main Content Lives Here
	get_template_part('home-post'); ?>
<?php endwhile; ?>

<div class="pagenavi-box bottom clearfix">
  <?php if(function_exists('wp_pagenavi')){
    wp_pagenavi();
  } else { ?>
    <div class="prev-posts fallback"><?php previous_posts_link( '« Newer Entries' ); ?></div>
    <div class="next-posts fallback"><?php next_posts_link('Older Entries »', 0); ?></div>
  <?php } ?>
</div><!-- .pagenavi-bottom -->

<?php else : ?>

	<h2>Not Found</h2>

<?php endif; ?>

</div><!-- .main-content -->

<?php //get_template_part('module02'); ?>

<?php get_footer(); ?>
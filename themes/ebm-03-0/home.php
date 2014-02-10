<?php get_header(); ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if(is_home() && 1 == $paged ):
  
  //get_template_part('seasonal');
  
  get_template_part('module01'); 
else:?>
  <div class="pagenavi-box top">
    <?php wp_pagenavi(); ?>
  </div><!-- .pagenavi-top -->
<?php endif;?>

<div class="main-content clearfix">
  
<!--div class="test-loop-filtering-answer">
  <?php 
  /*
  if ($post_to_exclude_ID){
    echo $post_to_exclude_ID;
  }else{
    echo "nothing to see here";
  }
  //*/
  ?>
</div-->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

		<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

		<div class="entry">
			<?php the_excerpt(); ?>
		</div>

		<div class="postmetadata">
			<?php the_tags('Tags: ', ', ', '<br />'); ?>
			Posted in <?php the_category(', ') ?> | 
			<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
		</div>

	</div>

<?php endwhile; ?>

<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
<div class="pagenavi-box bottom">
  <?php wp_pagenavi(); ?>
</div><!-- .pagenavi-bottom -->

<?php else : ?>

	<h2>Not Found</h2>

<?php endif; ?>

</div><!-- .main-content -->

<?php //get_template_part('module02'); ?>

<?php get_footer(); ?>
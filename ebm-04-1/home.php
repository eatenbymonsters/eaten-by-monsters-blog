<?php include"header.php"; ?>

<section class="feedPage">
  
  <?php if( is_home() && get_option('page_for_posts') ) {
    $blog_page_id = get_option('page_for_posts');
    echo '<a href="'.site_url().'/blog/"><h1>'.get_page($blog_page_id)->post_title.'</h1></a>';
  } ?>

  <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

	<section class="mainContent blog">
    <?php if('page' == get_option('show_on_front') && get_option('page_for_posts') && is_home()):the_post();
        $page_for_posts_id = get_option('page_for_posts');
        setup_postdata(get_page($page_for_posts_id));
    ?>
      <div class="feedPageContent">
        <?php the_content(); ?>
      </div>

    <?php rewind_posts(); endif; ?>
    
    <?php get_template_part('module','filterPosts'); ?>

    <?php if(is_home() && 1 != $paged ){
      get_template_part('module','navigation');
    } ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php
			// The Main Content Lives Here
			get_template_part('content','post'); ?>
		<?php endwhile; ?>

		<?php if(is_home() || get_query_var('paged')){
      get_template_part('module','navigation');
    } ?>

		<?php else : ?>

			<h2>Not Found</h2>

		<?php endif; ?>
	</section>

</section>

<?php include"footer.php"; ?>

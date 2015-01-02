<?php include"header.php"; ?>

<section class="singlePost">
  
  <?php $blog_page_id = get_option('page_for_posts'); ?>
    <!--h1><a href="<?=get_site_url();?>/blog">
    <?php echo get_page($blog_page_id)->post_title; ?>
    </a></h1-->

  <section class="mainContent blog">
    <?php 
        $page_for_posts_id = get_option('page_for_posts');
        setup_postdata(get_page($page_for_posts_id));
    ?>
      <!--div class="feedPageContent">
        <?php the_content(); ?>
      </div-->

    <?php rewind_posts(); ?>

    <aside class="blogSearchFilterSingle clearfix">
      <div class="breadcrumbs"><a href="<?=get_site_url();?>/blog/">Back to the blog</a></div>
      <!--div class="searchPosts">
        <h3>Search Our Blog</h3>
        <form action="<?php bloginfo('url'); ?>" method="get">
          <input type="text" name="s">
          <input type="submit" value="Search">
        </form>
      </div-->
    </aside>
    <?php //get_template_part('module','filterPosts');

    if(is_home() && 1 != $paged ){
      get_template_part('module','navigation');
    }

    if (have_posts()) :
      while (have_posts()) : the_post();
        // The Main Content Lives Here
        get_template_part('content','single');
  
        get_template_part('module','navigation');
        
      endwhile;

      $prev_link = get_previous_post_link('%link');
      $next_link = get_next_post_link('%link');

      if($prev_link || $next_link){ ?>
        <div class="postNavigation clearfix">
          <?php if($prev_link){ ?>
            <div class="prev">
              <h4>Previous Post</h4>
              <?php echo $prev_link; ?>
            </div>
          <?php } ?>
          <?php if($next_link){ ?>
            <div class="next">
              <h4>Next Post</h4>
              <?php echo $next_link; ?>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
    
    <?php else : ?>

      <h2>Not Found</h2>

    <?php endif; ?>
  </section>

</section>

<?php include"footer.php"; ?>

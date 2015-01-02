<article class="homePost">
  <div class="postHeader">
    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
    <div class="postMeta">
      Posted by <span class="authorLink"><?php the_author(); ?></span> on <?php the_date(); ?>
    </div>
  </div>

  <?php if(has_post_thumbnail()){ ?>
    <div class="postThumbnail">
      <?php the_post_thumbnail(); ?>
    </div>
  <?php } ?>
  
  <div class="postWrapper">
    <?php the_excerpt(); ?>

    <div class="postFooter clearfix">
      <a href="<?php the_permalink(); ?>" class="readMore">Read more</a>
      <div class="shareLinks clearfix">
        <h4>Share:</h4>
        <a href="http://twitter.com/share?via=perfectstays&amp;url=<?=get_permalink();?>" class="shareLink twitter"><span class="icon"></span><span class="visuallyhidden">Twitter</span></a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?=get_permalink();?>" class="shareLink facebook"><span class="icon"></span><span class="visuallyhidden">Facebook</span></a>
      </div>
    </div>
  </div>
</article>

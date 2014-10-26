<?php get_header(); ?>

<div class="contentWrapper">
  <?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
      
      <?php

      // The AFC values:
      $post_releaseName = get_field('release-name');
      $post_format = get_field('format');
      $post_recordLabel = get_field('record-label');
      $post_rating = get_field('rating');
      $post_miniDescription = get_field('mini-description');
      $post_website = get_field('website');
      ?>

      <h1>
        <?php
        $terms = get_terms('band');
        if ( !empty( $terms ) && !is_wp_error( $terms ) ) {// If the post has "band" info stored as tags... 
          $count = count( $terms );// How many bands are attached to the post?
          $i=0;
          $bandList = '';// Set up a string to contain the band names.
          $bandListLinks = '';// Set up a string to contain the band names and a link to the band's archive page.
          foreach ( $terms as $term ){// Add each band name to the string:
            $i++;
            if ( $count != $i ) {
              // With a link:
              $bandListLinks .= '<a href="/bands/'.$term->slug.'">'.$term->name.'</a>, ';// Add a link, a comma and a space to every band name...
              // Without a link:
              $bandList .= $term->name.', ';// Add a comma and a space to every band name...
            } else {
              // With a link:
              $bandListLinks .= '<a href="/bands/'.$term->slug.'">'.$term->name.'</a> ';// ...but don't add a comma if it's the last band name in the string
              // Without a link:
              $bandList .= $term->name.' ';// ...but don't add a comma if it's the last band name in the string
            }
          } ?>
          <?= $bandList; // Print the list of bands ?>
          <span class="titleDivider">&mdash;</span>
          <span class="releaseName"><?= ' '.$post_releaseName; ?></span>
        <?php } else {
          the_title();
        } ?>

      </h1>
      
      <h2>
        <?php if( $post_miniDescription ){ echo $post_miniDescription; } ?>
      </h2>
      
      <div class="postMetaWrapper">
        <div class="postMeta">
          <?php if( $post_format ){ ?>
            <span class="metaLabel">Release Format:</span>
            <span class="metaValue"><?php echo $post_format; ?></span>
          <?php } ?>
        </div>
        <div class="postMeta">
          <?php if( $post_recordLabel ){ ?>
            <span class="metaLabel">Record Label:</span>
            <span class="metaValue"><a href=""><?php echo $post_recordLabel; ?></a></span>
          <?php } ?>
        </div>
        <div class="postMeta">
          <?php if( $post_rating ){ ?>
            <span class="metaLabel">Rating:</span>
            <span class="metaValue"><?php echo $post_rating; ?></span>
          <?php } ?>
        </div>
      </div>
      
      <div class="mainContent postMainContent">
        <?php the_excerpt(); ?>
        <?php the_content(); ?>
      </div>

      <div class="postFooter">
        <div class="postMeta">
          <?php if( $post_format ){ ?>
            <span class="metaLabel">Release Format:</span>
            <span class="metaValue"><?php echo $post_format; ?></span>
          <?php } ?>
        </div>
        <div class="postMeta">
          <?php if( $post_recordLabel ){ ?>
            <span class="metaLabel">Record Label:</span>
            <span class="metaValue"><?php echo $post_recordLabel; ?></span>
          <?php } ?>
        </div>
        <div class="postMeta">
          <?php if( $post_website ){ ?>
            <span class="metaLabel"><a href="<?php echo $post_website; ?>">Band Website</a></span>
          <?php } ?>
        </div>
        <div class="postMeta">
          <span class="metaValue">Read more reviews of <?= $bandListLinks; // Print the list of bands ?></span>
        </div>
      </div>

    <?php endwhile;
  endif; ?>
</div>

<?php get_footer(); ?>
<?php get_header(); ?>

<div class="contentWrapper">
  <?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
      
      <?php
      // If there are one or more 'band' tags added to the post,
      // save them into the $bandNames array:
      $terms = get_terms('band');
      if ( !empty( $terms ) && !is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
          $bandNames[] = $term->name;
        }
      }

      // The AFC values:
      $post_releaseName = get_field('release-name');
      $post_format = get_field('format');
      $post_recordLabel = get_field('record-label');
      $post_rating = get_field('rating');
      $post_miniDescription = get_field('mini-description');
      $post_website = get_field('website');
      ?>

      <h1>
        <?php if ( $bandNames ) {// If the post has "band" info stored as tags... 
          $count = count( $bandNames );// How many bands are attached to the post?
          $i=0;
          $bandList = '';// Set up a string to contain the band names.
          foreach ( $bandNames as $bandName ){// Add each band name to the string:
            $i++;
            if ( $count != $i ) {
              $bandList .= $bandName.', ';// Add a comma and a space to every band name...
            } else {
              $bandList .= $bandName.' ';// ...but don't add a comma if it's the last band name in the string
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
        <div class="postMeta">
          <?php if( $post_website ){ ?>
            <span class="metaLabel"><a href="<?php echo $post_website; ?>">Band Website</a></span>
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
          <?php if( $post_rating ){ ?>
            <span class="metaLabel">Rating:</span>
            <span class="metaValue"><?php echo $post_rating; ?></span>
          <?php } ?>
        </div>
        <div class="postMeta">
          <?php if( $post_website ){ ?>
            <span class="metaLabel"><a href="<?php echo $post_website; ?>">Band Website</a></span>
          <?php } ?>
        </div>
      </div>

    <?php endwhile;
  endif; ?>
</div>

<?php get_footer(); ?>
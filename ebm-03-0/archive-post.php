<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
  <article>
    <h2>
			<?php
			$mini_description = get_post_meta($post->ID, 'mini-description', true);
			if ($mini_description) {
			  echo $mini_description;
			} else {
			  the_title();
			} ?>
		</h2>
	  
	  
	  
	  <?php the_excerpt(); ?>
  </article>
</a>
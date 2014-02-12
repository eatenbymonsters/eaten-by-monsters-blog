<?php
/**
 * @package Toolbox
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header clearfix">
		<div class="entry-title">
			<h1><?php the_title(); ?></h1>
			<h2>
			<?php
			$mini_description = get_post_meta($post->ID, 'mini-description', true);
			if ($mini_description) {?>
				<?php echo get_post_meta($post->ID, 'mini-description', true);?>
				<?php }?>
			</h2>
		</div><!-- .entry-title -->
		<?php $meta_exists = get_post_meta($post->ID, 'meta-exists', true); if ($meta_exists) {?>
		<div class="entry-meta-box clearfix">
			<div class="entry-meta-body">
				<div class="entry-meta clearfix">
					<div class="entry-meta-labels">
						<?php $meta_label = get_post_meta($post->ID, 'record-label', true); if ($meta_label) {?>
							<p>record label:</p>
						<?php }?>
						<?php $meta_format = get_post_meta($post->ID, 'format', true); if ($meta_format) {?>
							<p>format:</p>
						<?php }?>
					</div><!-- .entry-meta-labels -->	
					<div class="entry-meta-info">
						<p><?php echo get_post_meta($post->ID, 'record-label', true);?></p>
						<p><?php echo get_post_meta($post->ID, 'format', true);?></p>
					</div><!--entry-meta-info-->
				</div><!-- .entry-meta -->
				<?php
				$website = get_post_meta($post->ID, 'website', true); 
				$amazon = get_post_meta($post->ID, 'amazon', true);
				$amazon_com = get_post_meta($post->ID, 'amazon-com', true);
				$amazon_uk = get_post_meta($post->ID, 'amazon-uk', true);
				$itunes = get_post_meta($post->ID, 'itunes', true);
				$bandcamp = get_post_meta($post->ID, 'bandcamp', true);
				
				if ($website || $amazon || $amazon_com || $amazon_uk || $itunes || $bandcamp) {?>
				<div class="entry-buy clearfix">
					<div class="entry-meta-labels">
						<p>Buy this record:</p>
					</div><!-- .entry-meta-labels [2] -->
					<ul class="entry-meta-links">
						<?php $amazon = get_post_meta($post->ID, 'amazon', true); if ($amazon) {?>
						<li><a href="<?php echo get_post_meta($post->ID, 'amazon', true);?>">Amazon</a></li>
						<?php }?>
						<?php $amazon_com = get_post_meta($post->ID, 'amazon-com', true); if ($amazon_com) {?>
						<li><a href="<?php echo get_post_meta($post->ID, 'amazon-com', true);?>">Amazon.com</a></li>
						<?php }?>
						<?php $amazon_uk = get_post_meta($post->ID, 'amazon-uk', true); if ($amazon_uk) {?>
						<li><a href="<?php echo get_post_meta($post->ID, 'amazon-uk', true);?>">Amazon.co.uk</a></li>
						<?php }?>
						<?php $itunes = get_post_meta($post->ID, 'itunes', true); if ($itunes) {?>
						<li><a href="<?php echo get_post_meta($post->ID, 'itunes', true);?>">iTunes</a></li>
						<?php }?>
						<?php $bandcamp = get_post_meta($post->ID, 'bandcamp', true); if ($bandcamp) {?>
						<li><a href="<?php echo get_post_meta($post->ID, 'bandcamp', true);?>">Bandcamp</a></li>
						<?php }?>
						<?php $website = get_post_meta($post->ID, 'website', true); if ($website) {?>
						<li><a href="<?php echo get_post_meta($post->ID, 'website', true);?>">Band's Website</a></li>
						<?php }?>
					</ul><!--entry-meta-links-->
				</div><!-- .entry-buy -->
				<?php }?>
			</div><!-- .entry-meta-body -->			
			<?php
			$rating = get_post_meta($post->ID, 'rating', true);
			if ($rating) {?>
				<div class="post-rating">
					<?php echo get_post_meta($post->ID, 'rating', true);?>
				</div>
			<?php }?>
		</div><!-- .entry-meta-box -->
		<?php }?>	
	</header><!-- .entry-header -->
	<?php edit_post_link( __( 'Edit', 'toolbox' ), '<span class="edit-link">', '</span>' ); ?>

	<div class="entry-content clearfix">
		
		<?php if(in_category('article')){?>
			<div class="intro">
				<?php if(has_excerpt()){ ?>
					<h3><?php the_excerpt();?></h3>
				<?php } ?>
			</div><!-- .intro -->
		<?php }?>
		
		<?php if ( has_post_thumbnail() ) {?>
		<div class="cover">
			<?php if ($amazon_com) {?>
				<a href="<?php echo get_post_meta($post->ID, 'amazon-com', true);?>">
					<?php the_post_thumbnail('cover'); ?>
				</a>
			<?php } else if ($amazon_uk){ ?>
				<a href="<?php echo get_post_meta($post->ID, 'amazon-uk', true);?>">
					<?php the_post_thumbnail('cover'); ?>
				</a>
			<?php } else if ($amazon){ ?>
				<a href="<?php echo get_post_meta($post->ID, 'amazon', true);?>">
					<?php the_post_thumbnail('cover'); ?>
				</a>
			<?php } else if ( !in_category(array('media', 'article'))){
					the_post_thumbnail('cover');
				}
			?>
		</div><!-- .cover -->
		<?php } ?>
		
		
		<?php the_content(); ?>
		
		<p>
			Enjoyed reading this? <a title="subscribe" href="http://eatenbymonsters.com/feed/">Subscribe</a> to ensure you never miss a review or article!
		</p>
		
		<p class="post-date">Posted on <?php the_time('F j, Y'); ?> by <?php the_author(); ?></p>
		
		
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	
	<div id="digg-plug">
		<?php if(function_exists('dd_twitter_generate')){dd_twitter_generate('Compact','twitter_username');} ?>
		<?php if(function_exists('dd_fblike_generate')){dd_fblike_generate('Like Button Count');} ?> 
		<?php if(function_exists('dd_pinterest_generate')){dd_pinterest_generate('Compact');} ?> 
		<?php if(function_exists('dd_google1_generate')){dd_google1_generate('Compact (20px)');} ?>
		<?php if(function_exists('dd_stumbleupon_generate')){dd_stumbleupon_generate('Compact');} ?>
	</div><!-- #social -->

	<footer class="entry-foot clearfix">
		<?php
		$website = get_post_meta($post->ID, 'website', true); 
		$amazon = get_post_meta($post->ID, 'amazon', true);
		$amazon_com = get_post_meta($post->ID, 'amazon-com', true);
		$amazon_uk = get_post_meta($post->ID, 'amazon-uk', true);
		$itunes = get_post_meta($post->ID, 'itunes', true);
		$bandcamp = get_post_meta($post->ID, 'bandcamp', true);
		
		if ($website || $amazon || $amazon_com || $amazon_uk || $itunes || $bandcamp) {?>
			<div class="entry-buy clearfix">
				<div class="entry-meta-labels">
					<p>Buy this record:</p>
				</div><!-- .entry-meta-labels [2] -->
				<ul class="entry-meta-links">
					<?php $amazon = get_post_meta($post->ID, 'amazon', true); if ($amazon) {?>
					<li><a href="<?php echo get_post_meta($post->ID, 'amazon', true);?>">Amazon</a></li>
					<?php }?>
					<?php $amazon_com = get_post_meta($post->ID, 'amazon-com', true); if ($amazon_com) {?>
					<li><a href="<?php echo get_post_meta($post->ID, 'amazon-com', true);?>">Amazon.com</a></li>
					<?php }?>
					<?php $amazon_uk = get_post_meta($post->ID, 'amazon-uk', true); if ($amazon_uk) {?>
					<li><a href="<?php echo get_post_meta($post->ID, 'amazon-uk', true);?>">Amazon.uk</a></li>
					<?php }?>
					<?php $itunes = get_post_meta($post->ID, 'itunes', true); if ($itunes) {?>
					<li><a href="<?php echo get_post_meta($post->ID, 'itunes', true);?>">iTunes</a></li>
					<?php }?>
					<?php $bandcamp = get_post_meta($post->ID, 'bandcamp', true); if ($bandcamp) {?>
					<li><a href="<?php echo get_post_meta($post->ID, 'bandcamp', true);?>">Bandcamp</a></li>
					<?php }?>
					<?php $website = get_post_meta($post->ID, 'website', true); if ($website) {?>
					<li><a href="<?php echo get_post_meta($post->ID, 'website', true);?>">Band's Website</a></li>
					<?php }?>
				</ul><!--entry-meta-links-->
			</div><!-- .entry-buy -->
		<?php }?>
	</footer><!-- .entry-foot -->
	<?php related_posts();?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
/*
Template Name: Bands Archive
*/
include"header.php"; ?>

<h1>Bands</h1>

<?php $bands = get_terms('band'); ?>
<?php //var_dump($bands);
	if ( !empty( $bands ) && !is_wp_error( $bands ) ) {
    foreach ( $bands as $band ){
    	$bandName = $band->name;
    	$bandSlug = $band->slug;
    	$bandCount = $band->count;
    	//$bandID = $band->term_taxonomy_id;
    ?>
		<article class="band">
			<?php if ( $bandCount > 1 ) { ?>
				<?= $bandCount; ?> posts about <a href="/bands/<?= $bandSlug; ?>"><?= $bandName; ?></a>
			<?php } else { ?>
				1 post about <a href="/bands/<?= $bandSlug; ?>"><?= $bandName; ?></a>
			<?php } ?>
		</article>
    <?php }
  } ?>

<?php include"footer.php"; ?>
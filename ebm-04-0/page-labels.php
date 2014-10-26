<?php
/*
Template Name: Labels Archive
*/
include"header.php"; ?>

<h1>Labels</h1>

<?php $labels = get_terms('label'); ?>
<?php //var_dump($labels);
	if ( !empty( $labels ) && !is_wp_error( $labels ) ) {
    foreach ( $labels as $label ){
    	$labelName = $label->name;
    	$labelSlug = $label->slug;
    	$labelCount = $label->count;
    	//$labelID = $label->term_taxonomy_id;
    ?>
		<article class="label">
			<?php if ( $labelCount > 1 ) { ?>
				<?= $labelCount; ?> posts about <a href="/labels/<?= $labelSlug; ?>"><?= $labelName; ?></a>
			<?php } else { ?>
				1 post about <a href="/labels/<?= $labelSlug; ?>"><?= $labelName; ?></a>
			<?php } ?>
		</article>
    <?php }
  } ?>

<?php include"footer.php"; ?>
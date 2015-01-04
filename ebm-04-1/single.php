<?php get_header(); ?>

<div class="contentWrapper">
    <?php if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            
            <?php

            // The AFC values:
            $post_bandName = get_field('band-name');
            $post_releaseName = get_field('release-name');
            $post_format = get_field('format');
            $post_rating = get_field('rating');
            $post_miniDescription = get_field('mini-description');
            $post_website = get_field('website');
            $post_label = get_field('record-label');
            // Get the URL of the post's featured image (large size):
            //$imageURL = wp_get_attachment_url( get_post_thumbnail_id($post->ID,'large'));


            // If the post has "band" and "label" info stored as tags, pull out their objects
            $bandNames = wp_get_post_terms($post->ID,'band');
            $labelNames = wp_get_post_terms($post->ID,'label');
            // Run those objects through a function to output a usable list (as an array)
            $bandList = getPostTaxData($bandNames);
            $labelList = getPostTaxData($labelNames);
            
            ?>

            <div class="postHeader">

                <h1><?php if ($bandList && isset($post_releaseName)) {
                            $count = count($bandList);
                            foreach ($bandList as $key => $band) {
                                echo $band['name'];
                                echo ($key+1 != $count ? ', ' : '');
                            } ?>
                        <span class="titleDivider"> &mdash; </span>
                        <span class="releaseName"><?= $post_releaseName; ?></span>
                    <?php } else {
                        the_title();
                    } ?></h1>
                
                <?php if( isset( $post_miniDescription ) ){ ?>
                    <h2><?= $post_miniDescription; ?></h2>
                <?php } ?>

                
                <div class="postMetaWrapper clearfix <?php if ($post_format || $labelList) {echo 'full'; } ?> ">

                    <?php if ($post_format || $labelList): ?>
                        
                        <div class="postMetaKeyValue clearfix">
                            
                            <?php if( $post_format ){ ?>
                                <div class="postMeta">
                                    <span class="metaLabel">Release Format:</span>
                                    <span class="metaValue"><?php echo $post_format; ?></span>
                                </div>
                            <?php } ?>

                            <?php if ($labelList && isset($post_releaseName)) { ?>
                                <div class="postMeta">
                                    <span class="metaLabel">Record Label:</span>
                                    <span class="metaValue">

                                        <?php $count = count($labelList);
                                        foreach ($labelList as $key => $label) {
                                            if ($label['link']) {
                                                echo "<a href='/label/{$label['slug']}' title='See more from the {$label['name']} record label'>{$label['name']}</a>";
                                            } else {
                                                echo $label['name'];
                                            }
                                            echo ($key+1 != $count ? ', ' : '');
                                        } ?>
                                    </span>
                                </div>
                            <?php } ?>

                        </div>
                    <?php endif ?>

                    <?php if ($post_rating): ?>
                        <div class="postRating"><?php echo $post_rating; ?></div>
                    <?php endif ?>
                </div>
            </div>

            <div class="mainContent postMainContent">
                <?php 

                if (has_excerpt()) {
                    the_excerpt();
                }

                if ( has_post_thumbnail() ) {
                    $postImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'large'); 
                    $postImgURL = $postImg[0]; ?>
                    <div class="postImg" style="background-image:url('<?= $postImgURL; ?>');"></div>
                    <?php
                }

                the_content(); ?>

                <div class="postFooter clearfix">
                    
                    <?php if( $post_format ) { ?>
                        <div class="postMeta">
                            <span class="metaLabel">Release Format:</span>
                            <span class="metaValue"><?php echo $post_format; ?></span>
                        </div>
                    <?php } ?>

                    <?php if ($labelList && isset($post_releaseName)) { ?>
                        <div class="postMeta">
                            <span class="metaLabel">Record Label:</span>
                            <span class="metaValue">

                                <?php $count = count($labelList);
                                foreach ($labelList as $key => $label) {
                                    if ($label['link']) {
                                        echo "<a href='/label/{$label['slug']}'>{$label['name']}</a>";
                                    } else {
                                        echo $label['name'];
                                    }
                                    echo ($key+1 != $count ? ', ' : '');
                                } ?>
                            </span>
                        </div>
                    <?php } ?>

                    <?php if ($bandList && isset($post_releaseName)) { ?>
                        <div class="postMeta">
                            <span class="metaLabel">Artist:</span>
                            <span class="metaValue">

                                <?php $count = count($bandList);
                                foreach ($bandList as $key => $band) {
                                    if ($band['link']) {
                                        echo "<a href='/band/{$band['slug']}'>{$band['name']}</a>";
                                    } else {
                                        echo $band['name'];
                                    }
                                    echo ($key+1 != $count ? ', ' : '');
                                } ?>
                            </span>
                        </div>
                    <?php } ?>
                    
                </div>

                <?php
                // Print a button for every band name
                /* if ( !empty( $bandNames ) && !is_wp_error( $bandNames ) ) {// If the post has "band" info stored as tags...
                    foreach ( $bandNames as $bandName ){
                        echo '<a href="/bands/'.$bandName->slug.'" class="button">see all '.$bandName->name.' reviews</a>';  
                    }
                } */

                // Print a button link to band's website
                /* if( $post_website ){ ?>
                    <a href="<?php echo $post_website; ?>" class="button">visit <?= $bandList; ?>&#8217;s website</a>
                <?php } */
                ?>

            </div>


            <?php related_posts();?>

        <?php endwhile;
    endif; ?>
</div>

<?php get_footer(); ?>
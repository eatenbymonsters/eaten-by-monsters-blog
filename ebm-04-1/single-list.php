<?php 
/*
Single Post Template: List Template
Description: For displaying list-style posts, most notably the End of Year Top Tens.
*/
 ?>
<?php get_header(); ?>

<div class="contentWrapper">
    <?php if (have_posts()) :
        while (have_posts()) : the_post();

            // If the post has "band" and "label" info stored as tags, pull out their objects
            $bandNames = wp_get_post_terms($post->ID,'band');
            $labelNames = wp_get_post_terms($post->ID,'label');
            // Run those objects through a function to output a usable list (as an array)
            $bandList = getPostTaxData($bandNames);
            $labelList = getPostTaxData($labelNames);
            
            ?>
            <div class="postHeader">
                <h1><?php the_title(); ?></h1>

                <?php if (has_excerpt()) { ?>
                    <h2><?= get_the_excerpt(); ?></h2>
                <?php } ?>
            </div>
            
            <div class="mainContent postMainContent">
                <?php 

                if ( has_post_thumbnail() ) {
                    $postImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'large'); 
                    $postImgURL = $postImg[0]; ?>
                    <div class="postImg" style="background-image:url('<?= $postImgURL; ?>');"></div>
                    <?php
                }

                the_content();

                get_template_part('module','list');

                ?>

                <div class="postFooter clearfix">

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


            </div>


            <?php related_posts();?>

        <?php endwhile;
    endif; ?>
</div>

<?php get_footer(); ?>
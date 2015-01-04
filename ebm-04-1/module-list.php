<section class="list_wrapper clearfix">
    <?php if (have_rows('list_entry')) {
        while (have_rows('list_entry')) {
            the_row();
            $list_artist = get_sub_field('artist');
            $list_name = get_sub_field('record_name');
            $list_desc = get_sub_field('description');
            $list_img = get_sub_field('cover');
            $list_imgLink = wp_get_attachment_image_src($list_img, 'full');
            $list_rank = get_sub_field('rank');
            $list_link = get_sub_field('review_link');
            ?>

            <article class="list_entry clearfix">
                <div class="list_img" style="background-image:url('<?= $list_imgLink[0]; ?>');"></div>
                <h4 class="list_heading"><span class="list_rank"><?= $list_rank; ?>. </span><span class="list_name"><?= $list_name; ?></span> by <?= $list_artist; ?></h4>
                <p><?= $list_desc; ?></p>
            </article>
        
        <?php }
    } ?>
</section>
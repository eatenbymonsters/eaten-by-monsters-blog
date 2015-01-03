<?php include"header.php"; ?>

<h1>Hello world!</h1>
<?php if (have_posts()):?>
    <div class="relatedPosts">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('module','postsnippet'); ?>
        <?php endwhile; ?>
    </div>
<?php else:
    // If there are no recent posts, show nothing
endif; ?>

<?php include"footer.php"; ?>
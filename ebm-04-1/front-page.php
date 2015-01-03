<?php include"header.php"; ?>

<h1>The Home Page!</h1>

<?php get_template_part('module','bandList'); ?>


<?php /* ?>
<?php if (have_posts()):?>
    <div class="relatedPosts">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('module','postsnippet'); ?>
        <?php endwhile; ?>
    </div>
<?php else:
    // If there are no recent posts, show nothing
endif; ?>
<?php //*/ ?>

<?php include"footer.php"; ?>
</div><!-- .main-wrapper -->

<footer class="main-footer">
	<h2>Footer</h2>
	<p>This is the footer.</p>
	<nav class="foot-access" role="navigation">
		<?php wp_nav_menu(array('theme_location' => 'footer_menu')); ?>
	</nav><!-- .foot-access -->
</footer><!-- .main-footer -->

<?php get_template_part('foot'); ?>
</div><!-- #main-wrapper -->

<footer id="footer">
	<h2>Footer</h2>
	<p>This is the footer.</p>
	<nav id="foot-access" role="navigation">
		<?php wp_nav_menu(array('theme_location' => 'footer_menu')); ?>
	</nav><!-- #access -->
</footer>

<?php get_template_part('scripts'); ?>
<?php wp_footer(); ?>
</body>
</html>
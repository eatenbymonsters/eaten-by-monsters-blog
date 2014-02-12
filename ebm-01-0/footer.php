<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */
?>

			</div><!-- #main -->
		</div><!-- #page -->
	<footer id="page-bottom" role="contentinfo">
		<nav id="reference" role="navigation">
			<ul>
				<li><a href="/" title="Home">Home</a></li>
				<li><a href="/about/">About</a></li>
				<li><a href="/colophon/">Design</a></li>
				<li><a href="/contact/">Contact</a></li>
			</ul>
		</nav> <!-- #reference -->
	</footer><!-- #page-bottom -->

<?php wp_footer(); ?>

<script>
	$(document).ready(function(){
	$('#subscribe-field').removeAttr("style");
	});
</script>

</body>
</html>
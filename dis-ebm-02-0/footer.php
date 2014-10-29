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

			
		</div><!-- #page -->
	<footer id="page-bottom" role="contentinfo">
		<nav id="reference" role="navigation">
			<?php wp_nav_menu( array('menu' => 'Foot Nav') ); ?>
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
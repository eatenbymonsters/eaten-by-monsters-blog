<div id="tertiary" class="widget-area" role="complementary">
	<h2>This is the Secondary Sidebar.</h2>
	
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Secondary Sidebar Widgets')) : ?>
		<aside>
			<h3>You should only see this message if there are no widgets in the second dynamic sidebar.</h3>
		</aside>
	<?php endif; ?>
</div><!-- #tertiary .widget-area -->
</div><!-- .main-wrapper -->

<footer class="main-footer">
	<?php wp_nav_menu(array(
	  'theme_location' => 'footer_menu',
	  'menu_class' => 'foot-nav clearfix'
	)); ?>
	
	<ul class="footer-icon-links clearfix">
    <li class="header-link link-unfocus">
      <a class="rss-link" title="Soundcloud" href="https://soundcloud.com/eaten-by-monsters-blog/">
        <span aria-hidden="true" data-icon="&#xe004;"></span>
        <span class="visuallyhidden">Soundcloud</span>
      </a>
    </li>
    <li class="header-link link-unfocus">
      <a class="rss-link" title="Twitter" href="http://twitter.com/eatenbymonsters/">
        <span aria-hidden="true" data-icon="&#xe001;"></span>
        <span class="visuallyhidden">Twitter</span>
      </a>
    </li>
    <li class="header-link link-unfocus">
      <a class="rss-link" title="RSS" href="/feed/">
        <span aria-hidden="true" data-icon="&#xe006;"></span>
        <span class="visuallyhidden">RSS</span>
      </a>
    </li>
  </ul><!-- .header-links -->
  
	<?php get_template_part('foot'); ?>
</footer><!-- .main-footer -->

</body>
</html>
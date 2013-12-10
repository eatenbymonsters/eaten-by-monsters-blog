<?php get_template_part('head'); ?>

<header class="main-header clearfix">
  <div class="site-title">
  	<?php if (is_home()){
  	  echo"<h1>"
  	;}else{
  	  echo"<h3>"
  	;}?>
      <a href="/" title="Eaten by Monsters homepage" rel="home">Eaten by Monsters</a>
  	<?php if (is_home()){
    	echo"</h1>"
    ;}else{
    	echo"</h3>"
    ;}?>
  	<h4 class="blog-tagline">Music Blog</h4>
  </div><!-- .site-title -->
  
  <ul class="header-links">
    <li class="header-link link-unfocus">
      <a class="rss-link" title="RSS" href="/feed/">
        <span aria-hidden="true" data-icon="&#xe607;"></span>
        <span class="visuallyhidden">Soundcloud</span>
      </a>
    </li>
    <li class="header-link link-unfocus">
      <a class="rss-link" title="RSS" href="/feed/">
        <span aria-hidden="true" data-icon="&#xe603;"></span>
        <span class="visuallyhidden">Twitter</span>
      </a>
    </li>
    <li class="header-link link-unfocus">
      <a class="rss-link" title="RSS" href="/feed/">
        <span aria-hidden="true" data-icon="&#xe605;"></span>
        <span class="visuallyhidden">RSS</span>
      </a>
    </li>
  </ul><!-- .header-links -->
</header><!-- .main-header -->

<div class="header-nav clearfix" role="navigation">
	<?php wp_nav_menu(array('theme_location' => 'header_menu')); ?>
	<?php get_search_form(); ?>
</div><!-- .header-nav -->

<div class="main-wrapper">
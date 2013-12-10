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
    <li class="header-link"><a class="rss-link" title="RSS" href="/feed/" aria-hidden="true" data-icon="&#xe601;">RSS</a></li>
    <li class="header-link"><a class="twitter-link" title="Twitter" href="http://twitter.com/eatenbymonsters/" aria-hidden="true" data-icon="&#xe602;">Twitter</a></li>
    <li class="header-link"><a class="soundcloud-link" title="Soundcloud" href="http://soundcloud.com/eaten-by-monsters-blog/" aria-hidden="true" data-icon="&#xe603;">Soundcloud</a></li>
  </ul><!-- .header-links -->
</header><!-- .main-header -->

<nav class="header-nav clearfix" role="navigation">
	<?php wp_nav_menu(array('theme_location' => 'header_menu')); ?>
	<?php get_search_form(); ?>
</nav><!-- .header-nav -->

<div class="main-wrapper">
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

  <ul class="header-links clearfix">
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
</header><!-- .main-header -->

<div class="header-nav clearfix" role="navigation">
	<?php wp_nav_menu(array('theme_location' => 'header_menu')); ?>
	<?php get_search_form(); ?>
</div><!-- .header-nav -->

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if(is_home() && 1 == $paged ){
  //get_template_part('seasonal');
  get_template_part('module01');
}?>
<div class="main-wrapper clearfix">

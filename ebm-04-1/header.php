<?php include"head.php"; ?>
<?php //include"tabs/tabsinc.php"; ?>


<header class="globalHeader">
  <div class="siteTitle">
    <a href="<?=get_site_url();?>/" title="The Beach House Company" rel="home">
      <div class="siteLogo"></div>
      <!-- <span class="titleText visuallyhidden"> -->
    	 <?php if (is_home()){
    	   echo"<h1>"
    	 ;}else{
    	   echo"<h3>"
    	 ;}?>
          The Beach House Co.
    	 <?php if (is_home()){
        	echo"</h1>"
        ;}else{
        	echo"</h3>"
        ;}?>
    	 <p class="tagline">Luxury properties on, by or near a beach</p>
      <!-- </span> -->
    </a>
  </div>

  <nav class="mainNav clearfix">
    <?php wp_nav_menu(array(
      'menu_class'      => 'menu clearfix',
      'theme_location'  => 'header_menu'
    )); ?>
  </nav>

</header>

<?php get_template_part('head'); ?>
<body>
  
<!--[if lt IE 7]>
  <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<header id="header">
  <div id="site-title">
  	<?php if (is_home())
  	  {echo "<h1>";}
  	else
  	  {echo "<h3>";}
  	?>

    <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

  				<?php if (is_home())
  					 {echo "</h1>";}
  					else
  					 {echo "</h3>";}
  				?>


  			<p id="tagline">Tagline: <?php bloginfo( 'description' ); ?></p>
  		</div><!-- #site-title -->

  		<nav id="access" role="navigation">
  			<?php wp_nav_menu(array('theme_location' => 'primary')); ?>
  		</nav><!-- #access -->
  	</header>

  	<div id="main-wrapper" class="clearfix">
<?php
/*
 * @package Toolbox
 * @since Toolbox 0.1
 */
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1.0, width=device-width" />

<!-- Typekit JS -->
<script type="text/javascript" src="//use.typekit.net/inm7kme.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<!-- Analytics -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36292016-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<!-- Google+ -->
<link href="https://plus.google.com/111879829548102811838" rel="publisher" />

<title><?php
/*
 * Print the <title> tag based on what is being viewed.
 */
global $page, $paged;

wp_title( '|', true, 'right' );

// Add the blog name.
bloginfo( 'name' );

// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
	echo " | $site_description";

// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
	echo ' | ' . sprintf( __( 'Page %s', 'toolbox' ), max( $paged, $page ) );

?></title>

<link rel="shortcut icon" href="/wp-content/themes/ebm-02-0/imgs/favicon.png" />
<link rel="stylesheet" type="text/css" media="all" href="/wp-content/themes/ebm-02-0/style.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<!-- Polyfills -->

<!-- Media Queries support for older versions of IE etc. -->
<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js" type="text/javascript"></script>

<!-- HTML5 shiv -->
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_enqueue_script("jquery"); ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>	
	
	<header id="branding" role="banner" class="clearfix">
		<div id="main-header" class="clearfix">
			<div id="site-title">
				<?php if (is_home())
					 {echo "<h1>";}
					else
					 {echo "<h3>";}
				?>
					
					<a href="/" title="Eaten by Monsters homepage" rel="home">Eaten by Monsters</a>
					
					<?php if (is_home())
						 {echo "</h1>";}
						else
						 {echo "</h3>";}
					?>
				
				
				<p id="tagline">Music Blog</p>
			</div><!-- #site-title -->
			
			<div id="header-corner">
			<a href="/about/" title="about"><h2 id="site-description">Music reviews, industry comment &amp; analysis</h2></a>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'toolbox' ); ?>"><?php _e( 'Skip to content', 'toolbox' ); ?></a></div>
				<div id="social-icons">
					<ul>
						<li><a href="https://soundcloud.com/eaten-by-monsters-blog/" alt="Soundcloud" title="EbM on Soundcloud">s</a></li>
						<li><a href="http://plus.google.com/111879829548102811838/" rel="author">g</a></li>
						<li><a href="http://twitter.com/eatenbymonsters/" alt="twitter" title="twitter">t</a></li>
					</ul>
				</div><!-- social-icons -->
			</div><!-- #header-corner -->
			
			<nav id="access" role="navigation">
				<h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'toolbox' ); ?></h1>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'toolbox' ); ?>"><?php _e( 'Skip to content', 'toolbox' ); ?></a></div>

				<?php wp_nav_menu( array('menu' => 'Main Nav' ) ); ?>
			</nav><!-- #access -->
		</div><!-- #main-header -->
		
		<?php if( is_home() || is_404() || is_page( array( 'about', 'contact', 'colophon','404' ) ) ) :?>
		<div id="sub-header" class="clearfix">
			<div id="note">
				<h3>What are you looking for?</h3>
			</div><!-- note -->
			
			<nav id="top-links">
				<ul>
					<li>
						<a href="/" rel="home">
							<h2 class="active">the Music Blog</h2>
							<p>eatenbymonsters.com</p>
							<p>Where you are now.</p>
						</a>
					</li>
					<li>
						<a href="http://fairgrieveandhorner.com/">
							<h2>the Record Label</h2>
							<p>fairgrieveandhorner.com</p>
							<p>Music that's so good we're releasing it ourselves.</p>
						</a>
					</li>
					<li>
						<a href="http://eatenbymonste.rs/">
							<h2>the Band</h2>
							<p>eatenbymonste.rs</p>
							<p>My own music-making efforts.</p>
						</a>
					</li>
				</ul>
			</nav><!-- top-links -->
		</div><!-- #sub-header -->
		<?php endif;?>
		
	</header><!-- #branding -->
	<div id="mini-top" class="clearfix">
		<div id="mini-search">
			<?php get_search_form(); ?>
		</div><!-- #mini-search -->
		<div id="mini-submit">
			<a href="/feed/">
				<div id="mini-submit-box">
					<h3>Subscribe now!</h3>
				</div><!-- #mini-submit-box -->
			</a>
		</div><!-- #mini-submit -->
	</div><!-- #mini-top -->
	
	<div id="page" class="hfeed, clearfix">
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
    <title>
        <?php
        // Print the <title> tag based on what is being viewed.
        global $page, $paged;
        wp_title( '|', true, 'right' );
        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 ) {
          echo ' | ' . sprintf( __( 'Page %s'), max( $paged, $page ) );
        }
        // If not homepage
        if (!is_home() && !is_front_page() && $psString === false) {
          echo ' | ';
          // Add the blog name.
          bloginfo( 'name' );
        }
        ?>
    </title>
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" />
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss2_url'); ?>" title="RSS Feed" />
    <link rel="alternate" type="application/atom+xml" title="RSS" href="<?php bloginfo('atom_url'); ?>" title="Atom Feed" />

    <!-- Modernizr -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/static/modernizr-2.6.2.min.js"></script>
    
    <!-- Google+ -->
    <link href="https://plus.google.com/111879829548102811838" rel="publisher" />

    <!-- Typekit JS -->
    <script type="text/javascript" src="//use.typekit.net/inm7kme.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    
    <!-- Polyfills -->
        <!-- Media Queries support for older versions of IE etc. -->
        <!-- HTML5 shiv -->
            <!--[if lt IE 9]>
            <script src="<?php echo get_template_directory_uri(); ?>/assets/js/static/respond.min.js" type="text/javascript"></script>
            <script src="<?php echo get_template_directory_uri(); ?>/assets/js/static/html5.js" type="text/javascript"></script>
            <![endif]-->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

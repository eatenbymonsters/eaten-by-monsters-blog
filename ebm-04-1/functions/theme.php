<?php 
// Theme-specific functions

// Declare Custom Menus
  register_nav_menus( array(
    'header_menu' => 'Header Menu',
    'footer_menu' => 'Footer Menu'
  ) );

// Featured Image Support
  if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'thumbnail', 150, 100, true );
    add_image_size( 'potfolio_s', 238, 119, true );
    add_image_size( 'mobile_gallery', 1000, 1000, false);
  }

// Excerpt Length
  function custom_excerpt_length( $length ) {
    return 20;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// strip width and height from featured images
  add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
  add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
  function remove_thumbnail_dimensions( $html ) {
      $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
      return $html;
  }

?>
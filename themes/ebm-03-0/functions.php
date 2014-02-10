<?php
/*
Contents
========
01. No Self Ping
02. Excerpt Length
03. Allow "rel" Links
04. Add RSS links to <head> section
05. Declare Woocommerce Support [DISABLED]
06. Include WooCommerce Custom Functions File [DISABLED]
07. Disable Admin Bar [DISABLED]
08. Clean Up wp_head
09. Clean up the <head>
10. call the slug with the_slug();
11. Remove hints on LogIn failure
12. Remove WP version # from head
13. Strip scroll link from ‘read more’ links. [DISABLED]
14. featured image support
15. strip width and height from featured images
16. Allow svg as featured image
17. Declare Custom Menus
18. Find latest post in a cat. [DISABLED]
19. Exclude from main loop
*/

// 01. No Self Ping
  function no_self_ping( &$links ) {
  	$home = get_option( 'home' );
  	foreach ( $links as $l => $link )
  		if ( 0 === strpos( $link, $home ) )
  			unset($links[$l]);
  }
  add_action( 'pre_ping', 'no_self_ping' );

// 02. Excerpt Length
  function custom_excerpt_length( $length ) {
  	return 20;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// 03. Allow "rel" Links
  function allow_rel() {
  	global $allowedtags;
  	$allowedtags['a']['rel'] = array ();
  }
  add_action( 'wp_loaded', 'allow_rel' );

// 04. Add RSS links to <head> section
  automatic_feed_links();

// 05. Declare Woocommerce Support
  /*
  add_theme_support('woocommerce');
  */

// 06. Include WooCommerce Custom Functions File
  /*
  include_once (TEMPLATEPATH . '/functions-woocommerce-custom.php');
  */

// 07. Disable Admin Bar
  /*
  // Disable the Admin Bar By Default
  add_filter( 'show_admin_bar', '__return_false' );
  // Remove the Admin Bar preference in user profile to remove temptation...
  remove_action( 'personal_options', '_admin_bar_preferences' );
  */

// 08. Clean Up wp_head
  remove_action('wp_head', 'feed_links_extra', 3); // Displays the links to the extra feeds such as category feeds
  remove_action('wp_head', 'feed_links', 2); // Displays the links to the general feeds: Post and Comment Feed
  remove_action('wp_head', 'rsd_link'); // Displays the link to the Really Simple Discovery service endpoint, EditURI link
  remove_action('wp_head', 'wlwmanifest_link'); // Displays the link to the Windows Live Writer manifest file.
  remove_action('wp_head', 'index_rel_link'); // index link
  remove_action('wp_head', 'parent_post_rel_link'); // prev link
  remove_action('wp_head', 'start_post_rel_link'); // start link
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head'); // Displays relational links for the posts adjacent to the current post.
  remove_action('wp_head', 'wp_generator'); // Displays the XHTML generator that is generated on the wp_head hook, WP version

// 09. Clean up the <head>
  function removeHeadLinks() {
  	remove_action('wp_head', 'rsd_link');
  	remove_action('wp_head', 'wlwmanifest_link');
  }
  add_action('init', 'removeHeadLinks');
  remove_action('wp_head', 'wp_generator');
  
// 10. call the slug with the_slug();
  function the_slug($echo=true){
    $slug = basename(get_permalink());
    do_action('before_slug', $slug);
    $slug = apply_filters('slug_filter', $slug);
    if( $echo ) echo $slug;
    do_action('after_slug', $slug);
    return $slug;
  }
  
  
// 11. Remove hints on LogIn failure
  add_filter('login_errors',create_function('$a', "return null;"));

// 12. Remove WP version # from head
  remove_action('wp_head', 'wp_generator');

// 13. Strip scroll link from ‘read more’ links.
  /*
  function remove_more_link_scroll( $link ) {
  	$link = preg_replace( '|#more-[0-9]+|', '', $link );
  	return $link;
  }
  add_filter( 'the_content_more_link', 'remove_more_link_scroll' );
  */

// 14. featured image support
  add_theme_support( 'post-thumbnails' );
  add_image_size( $name, $width, $height, $crop );
  if ( function_exists( 'add_image_size' ) ) { 
  	add_image_size( 'cover', 300, 300, false );
  }
  
// 15. strip width and height from featured images
  add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
  add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
  function remove_thumbnail_dimensions( $html ) {
      $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
      return $html;
  }

// 16. Allow svg as featured image
  function cc_mime_types( $mimes ){
  	$mimes['svg'] = 'image/svg+xml';
  	return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );

// 17. Declare Custom Menus
  register_nav_menus( array(
  	'header_menu' => 'Header Menu',
  	'footer_menu' => 'Footer Menu'
  ) );

/*// 18. Find latest post in a cat.
function get_lastest_post_of_category($cat){
    $args = array( 'posts_per_page' => 1, 'order'=> 'DESC', 'orderby' => 'date', 'category__in' => (array)$cat);
    $post_is = get_posts( $args );
    return $post_is[0]->ID;
}
//*/

// 19. Exclude from main loop

// Get Most Recent 'featured' post ID
$post_ids = get_posts(array(
    'numberposts'   => -1, // get all posts.
    'category_name' => 'featured',
    'fields'        => 'ids', // Only get post IDs
));
$post_to_exclude_ID = $post_ids[0];

//*// Filter Homepage Loop
function main_loop_excludes($query){
  if($query->is_main_query() && $query->is_home()){
    //$featured_cat_ID = "-531";
	  //$latest_featured_post_ID = 2162;
	  
	  // Make sure the var is accessible
	  //global $post_to_exclude_ID;
	  // Set the filter
    $query->set('cat','-531');//$post_to_exclude_ID);
  }
}
add_action('pre_get_posts','main_loop_excludes');
//*/
?>
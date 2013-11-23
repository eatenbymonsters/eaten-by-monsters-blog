<?php
/*
Plugin Name: EbM Plugs
Description: All the added functions for eatenbymonsters.com
Version: 1.0
Author: Tom Hazledine
Author URI: http://thomashazledine.com/
*/

/* No Self Ping */
function no_self_ping( &$links ) {
	$home = get_option( 'home' );
	foreach ( $links as $l => $link )
		if ( 0 === strpos( $link, $home ) )
			unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );

/*featured image support*/
add_theme_support( 'post-thumbnails' );
add_image_size( $name, $width, $height, $crop );
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'cover', 300, 300, false );
}

/*excerpt length*/
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*register multiple nav menus*/
register_nav_menus( array(
	'header_menu' => 'My Custom Header Menu',
	'footer_menu' => 'My Custom Footer Menu'
) );

/*allow "rel" links*/
function allow_rel() {
	global $allowedtags;
	$allowedtags['a']['rel'] = array ();
}
add_action( 'wp_loaded', 'allow_rel' );

/* clean up wp_head */
remove_action('wp_head', 'feed_links_extra', 3); // Displays the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Displays the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Displays the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Displays the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // index link
remove_action('wp_head', 'parent_post_rel_link'); // prev link
remove_action('wp_head', 'start_post_rel_link'); // start link
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head'); // Displays relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Displays the XHTML generator that is generated on the wp_head hook, WP version

/* Altered Comment Form */
function alter_comment_form_fields($fields){
    $fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '</br><input id="author" name="author" type="text" placeholder="John Smith" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
   
 	$fields['email'] = '<p class="comment-form-email">' . '<label for="email">' . __( 'Email address (will not be published)' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '</br><input id="email" name="email" type="text" placeholder="john@smith.com" value="' . esc_attr( $email['comment_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
	$fields['url'] = '<p class="comment-form-url">' . '<label for="url">' . __( 'Website' ) . '</label> ' . '</br><input id="url" name="url" type="text" placeholder="johnsmith.com" value="' . esc_attr( $email['comment_url'] ) . '" size="30"' . ' /></p>';

return $fields;
}

add_filter('comment_form_default_fields','alter_comment_form_fields');
?>
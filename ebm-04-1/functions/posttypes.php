<?php
// =========================================================
// =========================================================
// CREATE THE CUSTOM POST TYPES
// =========================================================
// =========================================================

// Register Custom Taxonomy
function locations_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Locations', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Locations', 'text_domain' ),
		'all_items'                  => __( 'All Locations', 'text_domain' ),
		'parent_item'                => __( 'Parent Location', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Location:', 'text_domain' ),
		'new_item_name'              => __( 'New Location Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Location', 'text_domain' ),
		'edit_item'                  => __( 'Edit Location', 'text_domain' ),
		'update_item'                => __( 'Update Location', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Locations', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Locations', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Locations', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'					 => array('slug' => 'location')
	);
	register_taxonomy( 'locations_tax', array( 'Property' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'locations_taxonomy', 0 );


// Register Custom Taxonomy
function inhouse_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Inhouse Services', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Inhouse Service', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Inhouse Services', 'text_domain' ),
		'all_items'                  => __( 'All Inhouse Services', 'text_domain' ),
		'parent_item'                => __( 'Parent Inhouse Service', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Inhouse Service:', 'text_domain' ),
		'new_item_name'              => __( 'New Inhouse Service Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Inhouse Service', 'text_domain' ),
		'edit_item'                  => __( 'Edit Inhouse Service', 'text_domain' ),
		'update_item'                => __( 'Update Inhouse Service', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Inhouse Services', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Inhouse Services', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Inhouse Services', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'inhouse_tax', array( 'Property' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'inhouse_taxonomy', 0 );


// Register Custom Taxonomy
function local_area_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Local Area', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Local Area', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Local Area', 'text_domain' ),
		'all_items'                  => __( 'All Local Area', 'text_domain' ),
		'parent_item'                => __( 'Parent Local Area', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Local Area:', 'text_domain' ),
		'new_item_name'              => __( 'New Local Area Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Local Area', 'text_domain' ),
		'edit_item'                  => __( 'Edit Local Area', 'text_domain' ),
		'update_item'                => __( 'Update Local Area', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Local Area', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Local Area', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Local Area', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'local_area_tax', array( 'Property' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'local_area_taxonomy', 0 );



// Register Custom Taxonomy
function perfect_for_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Perfect For', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Perfect For', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Perfect For', 'text_domain' ),
		'all_items'                  => __( 'All Perfect For', 'text_domain' ),
		'parent_item'                => __( 'Parent Perfect For', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Perfect For:', 'text_domain' ),
		'new_item_name'              => __( 'New Perfect For Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Perfect For', 'text_domain' ),
		'edit_item'                  => __( 'Edit Perfect For', 'text_domain' ),
		'update_item'                => __( 'Update Perfect For', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Perfect For', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Perfect For', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Perfect For', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'perfect_for_tax', array( 'Property' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'perfect_for_taxonomy', 0 );


// Register Custom Taxonomy
function features_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Features', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Feature', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Features', 'text_domain' ),
		'all_items'                  => __( 'All Features', 'text_domain' ),
		'parent_item'                => __( 'Parent Features', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Features:', 'text_domain' ),
		'new_item_name'              => __( 'New Feature Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Feature', 'text_domain' ),
		'edit_item'                  => __( 'Edit Feature', 'text_domain' ),
		'update_item'                => __( 'Update Feature', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Features', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Features', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Features', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'features_tax', array( 'Property' ), $args );
}

// Hook into the 'init' action
add_action( 'init', 'features_taxonomy', 0 );




// Register Custom Post Type
function properties_post_type() {

	$labels = array(
		'name'                => _x( 'Properties', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Property', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Properties', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Property:', 'text_domain' ),
		'all_items'           => __( 'All Properties', 'text_domain' ),
		'view_item'           => __( 'View Property', 'text_domain' ),
		'add_new_item'        => __( 'Add New Property', 'text_domain' ),
		'add_new'             => __( 'New Property', 'text_domain' ),
		'edit_item'           => __( 'Edit Property', 'text_domain' ),
		'update_item'         => __( 'Update Property', 'text_domain' ),
		'search_items'        => __( 'Search Properties', 'text_domain' ),
		'not_found'           => __( 'No properties found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No properties found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Property', 'text_domain' ),
		'description'         => __( 'Property information pages', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields', ),
		'taxonomies'          => array( 'locations_tax', 'inhouse_tax', 'perfect_for_tax', 'features_tax', 'local_area_tax'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon' 		  => 'dashicons-admin-home',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite'			  => array('slug' => 'property')
	);
	register_post_type( 'Property', $args );

}

// Hook into the 'init' action
add_action( 'init', 'properties_post_type', 0 );



// // Register Custom Post Type
// function perfect_for_post_type() {

// 	$labels = array(
// 		'name'                => _x( 'Perfect For', 'Post Type General Name', 'text_domain' ),
// 		'singular_name'       => _x( 'Perfect For', 'Post Type Singular Name', 'text_domain' ),
// 		'menu_name'           => __( 'Perfect For', 'text_domain' ),
// 		'parent_item_colon'   => __( 'Parent Perfect For:', 'text_domain' ),
// 		'all_items'           => __( 'All Perfect For', 'text_domain' ),
// 		'view_item'           => __( 'View Perfect For', 'text_domain' ),
// 		'add_new_item'        => __( 'Add New Perfect For', 'text_domain' ),
// 		'add_new'             => __( 'New Perfect For', 'text_domain' ),
// 		'edit_item'           => __( 'Edit Perfect For', 'text_domain' ),
// 		'update_item'         => __( 'Update Perfect For', 'text_domain' ),
// 		'search_items'        => __( 'Search Perfect For', 'text_domain' ),
// 		'not_found'           => __( 'No Perfect For found', 'text_domain' ),
// 		'not_found_in_trash'  => __( 'No Perfect For found in Trash', 'text_domain' ),
// 	);
// 	$args = array(
// 		'label'               => __( 'Perfect For', 'text_domain' ),
// 		'description'         => __( 'Perfect For information pages', 'text_domain' ),
// 		'labels'              => $labels,
// 		'supports'            => array( 'title', 'editor', 'custom-fields', ),
// 		'taxonomies'          => array(),
// 		'hierarchical'        => false,
// 		'public'              => true,
// 		'show_ui'             => true,
// 		'show_in_menu'        => true,
// 		'show_in_nav_menus'   => true,
// 		'show_in_admin_bar'   => true,
// 		'menu_position'       => 5,
// 		'menu_icon' 		=> 'dashicons-visibility',
// 		'can_export'          => true,
// 		'has_archive'         => true,
// 		'exclude_from_search' => true,
// 		'publicly_queryable'  => true,
// 		'capability_type'     => 'page',
// 	);
// 	register_post_type( 'Perfect For', $args );

// }

// // Hook into the 'init' action
// add_action( 'init', 'perfect_for_post_type', 0 );

// // Register Custom Post Type
// function inhouse_post_type() {

// 	$labels = array(
// 		'name'                => _x( 'Perfect Fors', 'Post Type General Name', 'text_domain' ),
// 		'singular_name'       => _x( 'Local Area', 'Post Type Singular Name', 'text_domain' ),
// 		'menu_name'           => __( 'Inhouse Services', 'text_domain' ),
// 		'parent_item_colon'   => __( 'Parent Inhouse Service:', 'text_domain' ),
// 		'all_items'           => __( 'All Inhouse Services', 'text_domain' ),
// 		'view_item'           => __( 'View Inhouse Service', 'text_domain' ),
// 		'add_new_item'        => __( 'Add New Inhouse Service', 'text_domain' ),
// 		'add_new'             => __( 'New Inhouse Service', 'text_domain' ),
// 		'edit_item'           => __( 'Edit Inhouse Service', 'text_domain' ),
// 		'update_item'         => __( 'Update Inhouse Service', 'text_domain' ),
// 		'search_items'        => __( 'Search Inhouse Services', 'text_domain' ),
// 		'not_found'           => __( 'No Inhouse Services found', 'text_domain' ),
// 		'not_found_in_trash'  => __( 'No Inhouse Services found in Trash', 'text_domain' ),
// 	);
// 	$args = array(
// 		'label'               => __( 'Inhouse Services', 'text_domain' ),
// 		'description'         => __( 'Inhouse Services information pages', 'text_domain' ),
// 		'labels'              => $labels,
// 		'supports'            => array( 'title', 'editor', 'custom-fields', ),
// 		'taxonomies'          => array(),
// 		'hierarchical'        => false,
// 		'public'              => true,
// 		'show_ui'             => true,
// 		'show_in_menu'        => true,
// 		'show_in_nav_menus'   => true,
// 		'show_in_admin_bar'   => true,
// 		'menu_position'       => 5,
// 		'menu_icon' 		=> 'dashicons-visibility',
// 		'can_export'          => true,
// 		'has_archive'         => true,
// 		'exclude_from_search' => true,
// 		'publicly_queryable'  => true,
// 		'capability_type'     => 'page',
// 	);
// 	register_post_type( 'Inhouse Services', $args );

// }

// // Hook into the 'init' action
// add_action( 'init', 'inhouse_post_type', 0 );


// Register Custom Post Type
// function features_post_type() {

// 	$labels = array(
// 		'name'                => _x( 'Features', 'Post Type General Name', 'text_domain' ),
// 		'singular_name'       => _x( 'Feature', 'Post Type Singular Name', 'text_domain' ),
// 		'menu_name'           => __( 'Features', 'text_domain' ),
// 		'parent_item_colon'   => __( 'Parent Feature:', 'text_domain' ),
// 		'all_items'           => __( 'All Features', 'text_domain' ),
// 		'view_item'           => __( 'View Feature', 'text_domain' ),
// 		'add_new_item'        => __( 'Add New Feature', 'text_domain' ),
// 		'add_new'             => __( 'New Feature', 'text_domain' ),
// 		'edit_item'           => __( 'Edit Feature', 'text_domain' ),
// 		'update_item'         => __( 'Update Feature', 'text_domain' ),
// 		'search_items'        => __( 'Search Features', 'text_domain' ),
// 		'not_found'           => __( 'No Features found', 'text_domain' ),
// 		'not_found_in_trash'  => __( 'No Features found in Trash', 'text_domain' ),
// 	);
// 	$args = array(
// 		'label'               => __( 'Features', 'text_domain' ),
// 		'description'         => __( 'Features information pages', 'text_domain' ),
// 		'labels'              => $labels,
// 		'supports'            => array( 'title', 'editor', 'custom-fields', ),
// 		'taxonomies'          => array(),
// 		'hierarchical'        => false,
// 		'public'              => true,
// 		'show_ui'             => true,
// 		'show_in_menu'        => true,
// 		'show_in_nav_menus'   => true,
// 		'show_in_admin_bar'   => true,
// 		'menu_position'       => 5,
// 		'menu_icon' 		=> 'dashicons-visibility',
// 		'can_export'          => true,
// 		'has_archive'         => true,
// 		'exclude_from_search' => true,
// 		'publicly_queryable'  => true,
// 		'capability_type'     => 'page',
// 	);
// 	register_post_type( 'Features', $args );

// }

// // Hook into the 'init' action
// add_action( 'init', 'features_post_type', 0 );


// // Register Custom Post Type
// function locations_post_type() {

// 	$labels = array(
// 		'name'                => _x( 'Locations', 'Post Type General Name', 'text_domain' ),
// 		'singular_name'       => _x( 'Location', 'Post Type Singular Name', 'text_domain' ),
// 		'menu_name'           => __( 'Locations', 'text_domain' ),
// 		'parent_item_colon'   => __( 'Parent Location:', 'text_domain' ),
// 		'all_items'           => __( 'All Locations', 'text_domain' ),
// 		'view_item'           => __( 'View Location', 'text_domain' ),
// 		'add_new_item'        => __( 'Add New Location', 'text_domain' ),
// 		'add_new'             => __( 'New Location', 'text_domain' ),
// 		'edit_item'           => __( 'Edit Location', 'text_domain' ),
// 		'update_item'         => __( 'Update Location', 'text_domain' ),
// 		'search_items'        => __( 'Search Locations', 'text_domain' ),
// 		'not_found'           => __( 'No Locations found', 'text_domain' ),
// 		'not_found_in_trash'  => __( 'No Locations found in Trash', 'text_domain' ),
// 	);
// 	$args = array(
// 		'label'               => __( 'Locations', 'text_domain' ),
// 		'description'         => __( 'Locations information pages', 'text_domain' ),
// 		'labels'              => $labels,
// 		'supports'            => array( 'title', 'editor', 'custom-fields', ),
// 		'taxonomies'          => array(''),
// 		'hierarchical'        => true,
// 		'public'              => true,
// 		'show_ui'             => true,
// 		'show_in_menu'        => true,
// 		'show_in_nav_menus'   => true,
// 		'show_in_admin_bar'   => true,
// 		'menu_position'       => 5,
// 		'menu_icon' 		=> 'dashicons-visibility',
// 		'can_export'          => true,
// 		'has_archive'         => true,
// 		'exclude_from_search' => true,
// 		'publicly_queryable'  => true,
// 		'capability_type'     => 'page',
// 	);
// 	register_post_type( 'Locations', $args );

// }

// // Hook into the 'init' action
// add_action( 'init', 'locations_post_type', 0 );



// Register Custom Post Type
function videos_post_type() {

	$labels = array(
		'name'                => _x( 'Videos', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Video', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Videos', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Video:', 'text_domain' ),
		'all_items'           => __( 'All Videos', 'text_domain' ),
		'view_item'           => __( 'View Video', 'text_domain' ),
		'add_new_item'        => __( 'Add New Video', 'text_domain' ),
		'add_new'             => __( 'New Video', 'text_domain' ),
		'edit_item'           => __( 'Edit Video', 'text_domain' ),
		'update_item'         => __( 'Update Video', 'text_domain' ),
		'search_items'        => __( 'Search Videos', 'text_domain' ),
		'not_found'           => __( 'No Videos found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No Videos found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Videos', 'text_domain' ),
		'description'         => __( 'Videos information pages', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'custom-fields', ),
		'taxonomies'          => array('people'),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon' 		=> 'dashicons-visibility',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'Videos', $args );

}

// Hook into the 'init' action
add_action( 'init', 'videos_post_type', 0 );




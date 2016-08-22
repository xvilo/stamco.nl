<?php
// Register Custom Post Type
function vastgoedaanbod_posttype() {

	$labels = array(
		'name'                  => _x( 'Vastgoed Aanbod', 'Post Type General Name', 'magneet-online' ),
		'singular_name'         => _x( 'object', 'Post Type Singular Name', 'magneet-online' ),
		'menu_name'             => __( 'Vastgoed aanbod', 'magneet-online' ),
		'name_admin_bar'        => __( 'Vastgoed aanbod', 'magneet-online' ),
		'archives'              => __( 'Vastgoed aanbod', 'magneet-online' ),
		'parent_item_colon'     => __( 'Hoofd object', 'magneet-online' ),
		'all_items'             => __( 'Alle objecten', 'magneet-online' ),
		'add_new_item'          => __( 'Voeg nieuw object toe', 'magneet-online' ),
		'add_new'               => __( 'Voeg toe', 'magneet-online' ),
		'new_item'              => __( 'Nieuw object', 'magneet-online' ),
		'edit_item'             => __( 'Pas object aan', 'magneet-online' ),
		'update_item'           => __( 'Update object', 'magneet-online' ),
		'view_item'             => __( 'Bekijk object', 'magneet-online' ),
		'search_items'          => __( 'Doorzoek object', 'magneet-online' ),
		'not_found'             => __( 'Not found', 'magneet-online' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'magneet-online' ),
		'featured_image'        => __( 'Featured Image', 'magneet-online' ),
		'set_featured_image'    => __( 'Set featured image', 'magneet-online' ),
		'remove_featured_image' => __( 'Remove featured image', 'magneet-online' ),
		'use_featured_image'    => __( 'Use as featured image', 'magneet-online' ),
		'insert_into_item'      => __( 'Voeg bij object in', 'magneet-online' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'magneet-online' ),
		'items_list'            => __( 'objecten lijst', 'magneet-online' ),
		'items_list_navigation' => __( 'objecten lijst navigatie', 'magneet-online' ),
		'filter_items_list'     => __( 'Filter objecten lijst', 'magneet-online' ),
	);
	$rewrite = array(
		'slug'                  => 'vastgoed',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Object', 'magneet-online' ),
		'description'           => __( 'Vastgoed aanbod!', 'magneet-online' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields', 'editor', 'excerpt' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-category',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'vastgoed',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
	);
	register_post_type( 'vastgoedaanbod', $args );

}
add_action( 'init', 'vastgoedaanbod_posttype', 0 );
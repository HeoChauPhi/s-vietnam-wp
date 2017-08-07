<?php

if ( ! function_exists('sw_team_cpt') ) {

// Register Custom Post Type
function sw_team_cpt() {

	$labels = array(
		'name'                  => _x( 'Team Members', 'Post Type General Name', 'fl-builder' ),
		'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'fl-builder' ),
		'menu_name'             => __( 'Team', 'fl-builder' ),
		'name_admin_bar'        => __( 'Team Members', 'fl-builder' ),
		'archives'              => __( 'Team Archives', 'fl-builder' ),
		'parent_item_colon'     => __( 'Parent Item:', 'fl-builder' ),
		'all_items'             => __( 'All Team Members', 'fl-builder' ),
		'add_new_item'          => __( 'Add New Team Member', 'fl-builder' ),
		'add_new'               => __( 'Add New', 'fl-builder' ),
		'new_item'              => __( 'New Team Member', 'fl-builder' ),
		'edit_item'             => __( 'Edit Team Member', 'fl-builder' ),
		'update_item'           => __( 'Update Team Member', 'fl-builder' ),
		'view_item'             => __( 'View Team Member', 'fl-builder' ),
		'search_items'          => __( 'Search Team Members', 'fl-builder' ),
		'not_found'             => __( 'Not found', 'fl-builder' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'fl-builder' ),
		'featured_image'        => __( 'Profile Picture', 'fl-builder' ),
		'set_featured_image'    => __( 'Set profile picture', 'fl-builder' ),
		'remove_featured_image' => __( 'Remove profile picture', 'fl-builder' ),
		'use_featured_image'    => __( 'Use as profile picture', 'fl-builder' ),
		'insert_into_item'      => __( 'Insert into Team Member', 'fl-builder' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Team Member', 'fl-builder' ),
		'items_list'            => __( 'Team Members list', 'fl-builder' ),
		'items_list_navigation' => __( 'Team Member navigation', 'fl-builder' ),
		'filter_items_list'     => __( 'Filter Team Member list', 'fl-builder' ),
	);
	$rewrite = array(
		'slug'                  => 'team_member',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Team Member', 'fl-builder' ),
		'description'           => __( 'Add Team Members to your site', 'fl-builder' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( '' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-users',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'sw_team', $args );

}
add_action( 'init', 'sw_team_cpt', 0 );

}

    function sw_register_team_meta_boxes( $meta_boxes ) {
        $prefix = 'sw_';

       // position meta box
        $meta_boxes[] = array(
            'id'       => 'team',
            'title'    => 'Team Member Info',
            'pages'    => array('sw_team'),
            'context'  => 'side',
            'priority' => 'low',
            'fields' => array(            

                array(
                    'name'  => 'Position',
                    'id'    => $prefix . 'team_position',
                    'type'  => 'text',
                ),


            )
        );
        
       // social meta boxes
        $meta_boxes[] = array(
            'id'       => 'social',
            'title'    => 'Social Media Info',
            'pages'    => array('sw_team'),
            'context'  => 'side',
            'priority' => 'low',
            'fields' => array(            

                array(
                    'name'  => 'Phone',
                    'id'    => $prefix . 'phone_url',
                    'type'  => 'text',
                ),
                
                array(
                    'name'  => 'Email',
                    'id'    => $prefix . 'email_url',
                    'type'  => 'text',
                ),
                
                array(
                    'name'  => 'Skype',
                    'id'    => $prefix . 'skype_url',
                    'type'  => 'text',
                ),
            
                array(
                    'name'  => 'Twitter',
                    'id'    => $prefix . 'twitter_url',
                    'type'  => 'text',
                ),
            
                array(
                    'name'  => 'Facebook',
                    'id'    => $prefix . 'facebook_url',
                    'type'  => 'text',
                ),
            
                array(
                    'name'  => 'LinkedIn',
                    'id'    => $prefix . 'linkedin_url',
                    'type'  => 'text',
                ),


            )
        );

        return $meta_boxes;
    }

    add_filter( 'rwmb_meta_boxes', 'sw_register_team_meta_boxes' );

    function create_sw_team_taxonomies() {
        register_taxonomy(
            'team_department',
            'sw_team',
            array(
                'labels' => array(
                    'name' => 'Department',
                    'add_new_item' => 'Add New Department',
                    'new_item_name' => "New Department"
                ),
                'show_ui' => true,
                'show_tagcloud' => true,
                'hierarchical' => true,
                'show_admin_column' => true,
                'rewrite' => array( 'slug' => 'department' )
            )
        );
    }
    add_action( 'init', 'create_sw_team_taxonomies', 0 );
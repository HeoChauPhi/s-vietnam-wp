<?php 

      add_action( 'init', 'sw_gallery_post_type' );

    /***************************
    * create gallery cpt
    ***************************/
    function sw_gallery_post_type() {
        register_post_type( 'sw-gallery',
            array(
                'labels' => array(
                    'name' => _x('Gallery', 'post type general name'),
                    'singular_name' => _x('Gallery', 'post type singular name'),
                    'add_new' => _x('Add New', 'gallery'),
                    'add_new_item' => __('Add New Gallery'),
                    'edit_item' => __('Edit Gallery'),
                    'new_item' => __('New Gallery'),
                    'all_items' => __('All Galleries'),
                    'view_item' => __('View Galleries'),
                    'search_items' => __('Search Galleries'),
                    'not_found' =>  __('Gallery wasn\'t found'),
                    'not_found_in_trash' => __('Gallery wasn\'t found in Trash'), 
                    'parent_item_colon' => '',
                    'menu_name' => 'SW Galleries'				
                ),
                'public' => true,
                'publicly_queryable' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'supports' => array( 'title', 'categories', 'tags' ),
                'capability_type' => 'post',
                'rewrite' => true,
                'menu_position' => 5,
                'hierarchical' => false,
                'menu_icon' => 'dashicons-images-alt',
            )
        );
    }


    /***************************
    * create gallery taxonomy
    ***************************/
    function create_sw_gallery_taxonomies() {
        register_taxonomy(
            'sw_gallery_category',
            'sw-gallery',
            array(
                'labels' => array(
                    'name' => 'Gallery Category',
                    'add_new_item' => 'Add New Gallery Category',
                    'new_item_name' => "New Gallery Category"
                ),
                'show_ui' => true,
                'show_tagcloud' => true,
                'hierarchical' => true,
                'show_admin_column' => true,
                'rewrite' => array( 'slug' => 'gallery' )
            )
        );
    }
    add_action( 'init', 'create_sw_gallery_taxonomies', 0 );

    /***************************
    * create gallery metaboxes
    ***************************/
    function sw_register_gallery_meta_boxes( $meta_boxes ) {
        $prefix = 'sw_';

       // gallery meta box
        $meta_boxes[] = array(
            'id'       => 'image',
            'title'    => 'Images',
            'pages'    => array('sw-gallery'),
            'context'  => 'normal',
            'priority' => 'high',

            'fields' => array(            

                array(
                    'name'  => 'Images',
                    'id'    => $prefix . 'gallery_image',
                    'type'  => 'image_advanced',
                ),


            )
        );

        return $meta_boxes;
    }

    add_filter( 'rwmb_meta_boxes', 'sw_register_gallery_meta_boxes' );

/***************************
* create media metaboxes
***************************/
    function sw_register_media_meta_boxes( $meta_boxes ) {
        $prefix = 'sw_';

       // media meta box
        $meta_boxes[] = array(
            'id'       => 'href',
            'title'    => 'Link used by SW Galleries',
            'pages'    => array('attachment'),
            'context'  => 'side',
            'priority' => 'high',

            'fields' => array(            

                array(
                    'name'  => 'URL',
                    'id'    => $prefix . 'link',
                    'type'  => 'url',
                ),


            )
        );

        return $meta_boxes;
    }

    add_filter( 'rwmb_meta_boxes', 'sw_register_media_meta_boxes' );
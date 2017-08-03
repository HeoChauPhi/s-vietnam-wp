<?php 

  /***************************
    * create media metaboxes
    ***************************/
    function sw_register_media_meta_boxes( $meta_boxes ) {
        $prefix = 'sw_';

       // gallery meta box
        $meta_boxes[] = array(
            'id'       => 'url',
            'title'    => 'Link for Horizontal Gallery',
            'pages'    => array('attachment'),
            'context'  => 'normal',
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
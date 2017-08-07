
    <div class="portfolio-navbar"></div>



    <ul class="portfolio-gallery">
        
        <?php // WP_Query arguments
            $args = array (
                'post_type'              => array( 'portfolio' ),
                'order'                  => 'DESC',
                'orderby'                => 'date',
                'posts_per_page'         => -1,
            );

            // The Query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    
                        $term_list = wp_get_post_terms(get_the_ID(), 'portfoliocat', array("fields" => "names"));
                        $thumb_id = get_post_thumbnail_id();
                        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                        $thumb_url = $thumb_url_array[0];
                        $thumbnail = $settings->thumbnail;
                        $width = $settings->custom_width;
                        $height = $settings->custom_height;
                    
                                echo '<li rel="portfolio" data-tags="';
                    
                                    foreach ($term_list as $terms) {
                                        echo $terms.',';
                                    }
                                    
                                    echo '">';
                                    
                                    echo '<a title="';
                                
                                            echo get_the_title( get_the_ID() );
                                                
                                    echo '" href="';
                                    
                                        if ($settings->lightbox == 'url') {
                                            echo the_permalink();
                                        } else {
                                            echo $thumb_url;
                                        }
                    
                                    echo '">';
                                        if ($thumbnail != 'custom') {
                                            the_post_thumbnail( $thumbnail );
                                        } else {
                                            the_post_thumbnail( array($width, $height) );
                                        }
                                    echo '</a>';
                            
                            echo '</li>';
        
                }
            } else {
                // no posts found
                echo '<h2>No Portfolio Posts found</h2>';
            }

            // Restore original Post Data
            wp_reset_postdata() ?>
        
    </ul>
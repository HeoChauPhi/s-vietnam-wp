<?php

$layout = $settings->layout;

$post_id = $settings->post;
$post = get_post($post_id);
$name = $post->post_name;

$random = $settings->shuffle;
$lightbox = $settings->lightbox;
$lightboxhoriz = $settings->horiz_lightbox;


if ( $layout == 'masonry') {

echo '<div class="' . $id . '-sw-masonry-gallery" style="display:none;">';
        $args = array( 'post_type' => 'sw-gallery', 'posts_per_page' => 1, 'name' => $name, );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
            $images = rwmb_meta( 'sw_gallery_image', 'type=image' );
            if ($random == 'yes') {
				shuffle($images);
            }
            
				foreach ( $images as $image ) {
                    
                $attachment_id = $image['ID'];                                               
                $url_meta = rwmb_meta( 'sw_link', 'type=url', $attachment_id );
                    
                if ($settings->links == 'true') {
                    if (!empty ($url_meta)) {
                    echo '<a href="' . $url_meta . '">';
                    }
                } // ends opening link
                  
                echo "<img alt='{$image['caption']}' src='{$image['full_url']}' data-image='{$image['full_url']}' data-description='{$image['description']}' />";

                    
            if ($settings->links == 'true') {
                if (!empty ($url_meta)) {
                echo '</a>';
                }
            } // ends closing link        
                    
                    
}  endwhile;
    
    echo '</div>';
    
} elseif ( $layout == 'horizontal' ) {

    ?> <div id="container" class="p52-horizontal-gallery"> 

        <div class="carousel"><?php
            
        $args = array( 'post_type' => 'sw-gallery', 'posts_per_page' => 1, 'name' => $name, );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
                $images = rwmb_meta( 'sw_gallery_image', 'type=image' );
                if ($random == 'yes') {
				    shuffle($images);
                }
    
                foreach ( $images as $image ) {
                   $attachment_id = $image['ID'];
                    $url_meta = rwmb_meta( 'sw_link', 'type=url', $attachment_id );
                    echo "<div class='contentBlock'>";
                        if ($lightboxhoriz == 'true' ) {                        
                            echo "<a href='{$image['full_url']}' class='p52-gallery-image swipebox' title='{$image['title']}'><img alt='{$image['caption']}' src='{$image['full_url']}' data-image='{$image['full_url']}' data-description='{$image['description']}' /></a>"; 

                        } else {                      
                            echo "<a href='{$url_meta}'><img alt='{$image['caption']}' src='{$image['full_url']}' data-image='{$image['full_url']}' data-description='{$image['description']}' /></a>";
                        } 
                    
                        echo "</div>";
                    
                    }
                    
    endwhile;
                
    echo '</div>';
    
echo '</div>';
    
}
            
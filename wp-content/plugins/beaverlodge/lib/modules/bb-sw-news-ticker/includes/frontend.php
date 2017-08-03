<div class="sw-news-ticker">
    
    <?php if ($settings->content == 'posts') {
    
        echo '<ul class="ticker-list">';
    
            $args = array (
                'post_type'              => array( 'post' ),
                'posts_per_page'         => $settings->post_count,
                'cat'                    => $settings->category,
            );

            $query = new WP_Query( $args );

            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post(); ?>

                    <li>
                    
                        <div class="article">
                    
                            <div class="post-thumbnail">
                                
                                <?php if ($settings->thumbnail == 'yes') {
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail( 'thumbnail' );
                                    }
                                 } ?>
                                
                            </div>
                        
                            <div class="content">
                                
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>

                                <?php the_excerpt(); ?>
                            
                            </div>
                    
                        </div>

                    </li>

                <?php }

            } else {
                // no posts found
            }

            wp_reset_postdata();
    
         echo '</ul>';
             
    } else {
    
        echo '<ul class="ticker-list">';
    
            $args = array (
                'post_type'              => array( 'post' ),
                'posts_per_page'         => $settings->post_count,
            );

            $query = new WP_Query( $args );

            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post(); ?>

                    <li>
                    
                        <div class="article">
                    
                            <div class="post-thumbnail">
                                
                                <?php if ($settings->thumbnail == 'yes') {
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail( 'thumbnail' );
                                    }
                                 } ?>
                                
                            </div>
                        
                            <div class="content">
                                
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                            
                            </div>
                    
                        </div>

                    </li>

                <?php }

            } else {
                // no posts found
            }

            wp_reset_postdata();
    
         echo '</ul>';
    
    } ?>
    
</div>

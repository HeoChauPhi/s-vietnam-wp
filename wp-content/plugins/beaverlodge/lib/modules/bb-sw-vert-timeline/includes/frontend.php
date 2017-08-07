<?php 

if ($settings->post_type == 'blog' ) { ?>

<div id="content" class="main">

    <ul class="cbp_tmtimeline items"> <?php
   
            $category = get_term_by( 'id', $settings->category, 'category', 'ARRAY_A' );
            $startdate = $settings->start_date;
            $enddate = $settings->end_date;

            if ($settings->filter_type == 'false') {
                $args = array (
                    'post_type'         => array( 'post' ),
                    'nopaging'          => true,
                    'category_name'     => $category[name],
                    'post_status'   => 'publish',
                );
            } else {
                $args = array (
                    'post_type'         => array( 'post' ),
                    'nopaging'          => true,
                    'category_name'     => $category[name],
                    'post_status'   => 'publish',
                    'date_query' => array(
                        array(
                            'after' => $startdate,
                            'before' => $enddate,
                        ),
                    ),
                );
            }
        $wp_query = new WP_Query( $args );
   
        if ( $wp_query->have_posts() ) :

	       while ( $wp_query->have_posts() ) : $wp_query->the_post();
                
                $customicon = rwmb_meta( 'sw_icon', 'type=text' );
                if ( !empty ($customicon) ) {
                    $icon = $customicon;
                } else {
                    $icon = 'fa-clock-o';
                }
             
            $post_date = the_date('d/m/Y', '', '', FALSE);
               
                ?>
                <li>
                
				    <time class="cbp_tmtime">
                        
                        <?php if($settings->time_switch == 'false') { ?>
                        
                            <span class="date-span"><?php echo $post_date; ?></span>

                            <span class="time-span"><?php the_time('g:i'); ?></span>
                        
                        <?php } else { ?>
                        
                            <span class="time-span"><?php the_time('g:i'); ?></span>
                                
                            <span class="date-span"><?php echo $post_date; ?></span>
                        
                        <?php } ?>
                    
                    </time>
					
                    <div class="cbp_tmicon fa <?php echo $icon; ?>"></div>
                    
					<div class="cbp_tmlabel">
                        
					   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title( '<h2 class="the_title">', '</h2>' ); ?></a>
                        
					   <?php the_excerpt( '<p>', '</p>' ); ?>
                     
                        <a href="<?php the_permalink(); ?>" title="read more" class="read-more" target="_<?php echo $settings->link_new_window; ?>"><?php echo $settings->readmore; ?></a>
					
                    </div>
                        
				</li>

        <?php endwhile;


wp_reset_postdata();

        else:  ?>
        
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        
        <?php endif; ?>
        
    </ul>

</div>

<?php } else { ?>

<?php $customposts = $settings->custom_posts; ?>

<div id="content" class="main">

    <ul class="cbp_tmtimeline items">
        
        <?php foreach ($customposts as $custompost) { ?>
    
        <li>
                
				    <time class="cbp_tmtime">
                        
                        <?php if($settings->time_switch == 'false') { ?>
                        
                            <span class="date-span"><?php echo $custompost->custom_date; ?></span>

                            <span class="time-span"><?php echo $custompost->custom_time; ?></span>
                        
                        <?php } else { ?>
                        
                            <span class="time-span"><?php echo $custompost->custom_time; ?></span>
                        
                            <span class="date-span"><?php echo $custompost->custom_date; ?></span>
                        
                        <?php } ?>
                    
                    </time>
					
                    <div class="cbp_tmicon <?php echo $custompost->custom_icon; ?>"></div>
                    
					<div class="cbp_tmlabel">
                        
                        <h2 class="the_title">
                            <?php if ($custompost->custom_url != '') { ?>
                                <a href="<?php echo $custompost->custom_url; ?>">
                            <?php } ?>
                                    <?php echo $custompost->custom_title; ?>
                             <?php if ($custompost->custom_url != '') { ?> </a> <?php } ?>
                        </h2>
                        
                        <p><?php echo $custompost->custom_text; ?></p>
						
						 <?php if ($custompost->custom_url != '') { ?>
						 
							<a href="<?php echo $custompost->custom_url; ?>" title="read more" class="read-more" target="_<?php echo $settings->link_new_window; ?>"><?php echo $settings->readmore; ?></a>
							
						 <?php } ?>
						 
                    </div>
                        
				</li>

        <?php } ?>

     </ul>

</div>

<?php } ?>
<?php
$hideexcerpt = $settings->excerpt;
$postqty = $settings->qty;
$posttype = $settings->post;
$custompanels = $settings->panel;

if ( $posttype == 'custom' ) {

    foreach ( $custompanels as $custompanel ) { ?>

        <div class="<?php echo $id; ?>-sw-hover-cards">

            <div class="col-lg-<?php echo $settings->desktop_qty_row; ?> col-sm-<?php echo $settings->tablet_qty_row; ?> col-xs-<?php echo $settings->mobile_qty_row; ?>">

                <?php if ($custompanel->url != '') { ?>
                    <a class ="hover-link-<?php echo $id; ?>" href="<?php echo $custompanel->url; ?>">
                        <?php } else { ?> <div class ="hover-link-<?php echo $id; ?>"> <?php } ?>

                    <div class="hover-panel">

                            <?php if ($custompanel->bg_layout == 'photo') { ?>

                                <figcaption style="background-image:url('<?php echo $custompanel->bg_photo_src; ?>');">

                            <?php }

                            if ($custompanel->bg_layout == 'color') { ?>

                                <figcaption style="background-color: #<?php echo $custompanel->bg_color; ?>">

                            <?php } ?>


                                    <?php if (!empty($custompanel->title)) { ?>    
                                    
                                        <h2 class="hover-title">

                                            <span class="title">

                                                <?php echo $custompanel->title; ?>

                                            </span>

                                        </h2>
                                    
                                    <?php } ?>

                                    <?php if ( $hideexcerpt != 'no' ) { ?>

                                        <span class="hover-excerpt">

                                            <?php echo $custompanel->text; ?>

                                        </span>

                                    <?php } ?>

                                </figcaption>

                    </div>

                        <?php if ($custompanel->url != '') { echo '</a>'; } else { echo '</div>'; }?>

            </div>
            
        </div>
            
    <?php }
    
}


if ( $posttype == 'sw_team' ) {  
    
    $category = get_term_by( 'id', $settings->teamcategory, 'team_department', 'ARRAY_A' );
    
    $args = array( 
        'team_department' => $category[name],
        'post_type' => 'sw_team', 
        'orderby' => 'title', 
        'order'   => 'ASC',
    ); 
    
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    
    
    ?>    
    
        <div class="<?php echo $id; ?>-sw-hover-cards; ?>">

            <div class="col-lg-<?php echo $settings->desktop_qty_row; ?> col-sm-<?php echo $settings->tablet_qty_row; ?> col-xs-<?php echo $settings->mobile_qty_row; ?>">
                
                <div class ="hover-link-<?php echo $id; ?>">

                    <div class="hover-panel">

                            <?php if ( has_post_thumbnail()) {
                                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                            ?>
                                <figcaption style="background-image:url('<?php echo $large_image_url[0]; ?>');">
                            <?php } else { ?>
                                <figcaption>
                            <?php } ?>

                                    <h2 class="hover-title">

                                        <span class="title">

                                            <?php echo the_title(); ?>

                                        </span>
                                        
                                    </h2>
                                    <?php
                                    $sociallinks = '<div class="social-links">
                                                <a class="col-xs-2" href="tel:'.rwmb_meta( 'sw_phone_url', 'type=text' ).'"><span class="fa fa-phone team_icon"></span></a>
                                            <a class="col-xs-2" href="mailto:'.rwmb_meta( 'sw_email_url', 'type=text' ).'"><span class="fa fa-envelope team_icon"></span></a>
                                            <a class="col-xs-2" href="skype:'.rwmb_meta( 'sw_skype_url', 'type=text' ).'"><span class="fa fa-skype team_icon"></span></a>
                                             <a class="col-xs-2" href="'.rwmb_meta( 'sw_twitter_url', 'type=text' ).'"><span class="fa fa-twitter team_icon"></span></a>
                                            <a class="col-xs-2" href="'.rwmb_meta( 'sw_facebook_url', 'type=text' ).'"><span class="fa fa-facebook team_icon"></span></a>
                                            <a class="col-xs-2" href="'.rwmb_meta( 'sw_linkedin_url', 'type=text' ).'"><span class="fa fa-linkedin team_icon"></span></a>
                                            </div>'; ?>
                                           

                                    <?php if ( $hideexcerpt != 'no' ) { ?>

                                        <div class="hover-excerpt">

                                            <?php echo the_excerpt(); ?>
                                            
                                            <div class="social-links">
                                                <?php if (rwmb_meta( 'sw_phone_url', 'type=text' ) != '') { ?>
                                                    <a class="col-xs-2" href="tel:<?php echo rwmb_meta( 'sw_phone_url', 'type=text' ); ?>"><span class="fa fa-phone team_icon"></span></a>
                                                <?php } ?>
                                                <?php if (rwmb_meta( 'sw_email_url', 'type=text' ) != '') { ?>
                                            <a class="col-xs-2" href="mailto:<?php echo rwmb_meta( 'sw_email_url', 'type=text' ); ?>"><span class="fa fa-envelope team_icon"></span></a>
                                                <?php } ?>
                                                <?php if (rwmb_meta( 'sw_skype_url', 'type=text' ) != '') { ?>
                                            <a class="col-xs-2" href="skype:<?php echo rwmb_meta( 'sw_skype_url', 'type=text' ); ?>"><span class="fa fa-skype team_icon"></span></a>
                                                <?php } ?>
                                                <?php if (rwmb_meta( 'sw_twitter_url', 'type=text' ) != '') { ?>
                                             <a class="col-xs-2" href="<?php echo rwmb_meta( 'sw_twitter_url', 'type=text' ); ?>"><span class="fa fa-twitter team_icon"></span></a>
                                                <?php } ?>
                                                <?php if (rwmb_meta( 'sw_facebook_url', 'type=text' ) != '') { ?>
                                            <a class="col-xs-2" href="<?php echo rwmb_meta( 'sw_facebook_url', 'type=text' ); ?>"><span class="fa fa-facebook team_icon"></span></a>
                                                <?php } ?>
                                                <?php if (rwmb_meta( 'sw_linkedin_url', 'type=text' ) != '') { ?>
                                            <a class="col-xs-2" href="<?php echo rwmb_meta( 'sw_linkedin_url', 'type=text' ); ?>"><span class="fa fa-linkedin team_icon"></span></a>
                                                <?php } ?>
                                            </div>
                                            
                                        </div>

                                    <?php } ?>

                                </figcaption>

                    </div>
                        
                        </div>

            </div>
            
        </div>
            
    <?php endwhile;
            
}



if ( $posttype == 'product' ) {  
    
    $category = get_term_by( 'id', $settings->woocategory, 'product_cat', 'ARRAY_A' );
    
    $args = array( 
        'product_cat' => $category[name],
        'post_type' => $posttype, 
        'posts_per_page' => $postqty, 
        'orderby' => 'title', 
        'order'   => 'ASC',
    ); 
    
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    
    $symbol = get_woocommerce_currency_symbol( $currency );
    $price = get_post_meta( get_the_ID(), '_regular_price', true);
    $sale = get_post_meta( get_the_ID(), '_sale_price', true);
    
    ?>    
    
        <div class="<?php echo $id; ?>-sw-hover-cards; ?>">

            <div class="col-lg-<?php echo $settings->desktop_qty_row; ?> col-sm-<?php echo $settings->tablet_qty_row; ?> col-xs-<?php echo $settings->mobile_qty_row; ?>">

                <a class ="hover-link-<?php echo $id; ?>" href="<?php echo the_permalink(); ?>">

                    <div class="hover-panel">

                            <?php if ( has_post_thumbnail()) {
                                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
                            ?>
                                <figcaption style="background-image:url('<?php echo $large_image_url[0]; ?>');">
                            <?php } else { ?>
                                <figcaption>
                            <?php } ?>

                                    <h2 class="hover-title">

                                        <span class="title col-xs-6">

                                            <?php echo the_title(); ?>

                                        </span>
                                        
                                        <span class="woo-price col-xs-6">
                                            <p class="text-right">
                                            <?php if (!empty($sale)) {
                                                echo $symbol;
                                                echo $sale;
                                            } else {
                                                echo $symbol;
                                                echo $price;
                                            } ?>
                                            </p>
                                        </span>

                                    </h2>


                                    <?php if ( $hideexcerpt != 'no' ) { ?>

                                        <span class="hover-excerpt">

                                            <?php echo the_excerpt(); ?>

                                        </span>

                                    <?php } ?>

                                </figcaption>

                    </div>

                </a>

            </div>
            
        </div>
            
    <?php endwhile;
            
}


if ( $posttype == 'post' ) {  
    
    $category = get_term_by( 'id', $settings->category, 'category', 'ARRAY_A' );
    
    $args = array( 
        'category_name' => $category[name],
        'post_type' => $posttype, 
        'posts_per_page' => $postqty, 
        'orderby' => $settings->orderby, 
        'order'   => $settings->order,
    ); 
    
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    
    ?>    
    
        <div class="<?php echo $id; ?>-sw-hover-cards; ?>">

            <div class="col-lg-<?php echo $settings->desktop_qty_row; ?> col-sm-<?php echo $settings->tablet_qty_row; ?> col-xs-<?php echo $settings->mobile_qty_row; ?>">

                <a class ="hover-link-<?php echo $id; ?>" href="<?php echo the_permalink(); ?>">

                    <div class="hover-panel">

                            <?php if ( has_post_thumbnail()) {
                                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
                            ?>
                                <figcaption style="background-image:url('<?php echo $large_image_url[0]; ?>');">
                            <?php } else { ?>
                                <figcaption>
                            <?php } ?>

                                    <h2 class="hover-title">

                                        <span class="title col-xs-12">

                                            <?php echo the_title(); ?>

                                        </span>

                                    </h2>


                                    <?php if ( $hideexcerpt != 'no' ) { ?>

                                        <span class="hover-excerpt">

                                           <?php echo '<p>' . bl_excerpt(25) . '</p>'; ?>

                                        </span>

                                    <?php } ?>

                                </figcaption>

                    </div>

                </a>

            </div>
            
        </div>
            
    <?php endwhile;
            
}
<?php 

$panels = $settings->panel; 

?>

<div class="sw-hover-<?php echo $id; ?>">
    
    <div class="grid">
    
    <?php if($settings->content_type == 'custom') { ?>
        
    <?php foreach ($panels as $panel) { ?>    

        <figure class="effect-<?php echo $settings->effect; ?>">
            <img class="effect-img" src="<?php echo $panel->bg_photo_src; ?>" alt="<?php echo $panel->label; ?>"/>
            <figcaption>
                <h2 class="effect-title"><?php echo $panel->title; ?></h2>
                <?php echo $panel->text; ?>
                <a class="effect-btn" href="<?php echo $panel->url; ?>"><?php echo $panel->button; ?></a>
            </figcaption>			
        </figure>

    <?php } ?>
        
        <!-- ... -->

    
    <?php } else {
    $cat = $settings->post_cat;
    $qty = $settings->post_qty;
    // WP_Query arguments
$args = array (
	'post_type'              => array( 'post' ),
	'cat'                    => $cat,
	'posts_per_page'         => $qty,
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
        ?>
      

        <figure class="effect-<?php echo $settings->effect; ?>">
            <?php the_post_thumbnail( 'full', array( 'class'=>'effect-img' )); ?>
            <figcaption>
                <h2 class="effect-title"><?php the_title(); ?></h2>
                <?php the_excerpt(); ?>
                <a class="effect-btn" href="<?php the_permalink(); ?>">Read More</a>
            </figcaption>			
        </figure>

    <?php }
    
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();
    
} ?>
    
</div>
</div>
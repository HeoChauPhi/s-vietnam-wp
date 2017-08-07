<div id="bl-masonry-<?php echo $id; ?>" class="container">

<?php

if ($settings->post_count != 'all') {
	$count = $settings->post_qty;
} else {
	$count = '-1';
}

$post = $settings->post_selection;

$args = array (
	'post_type'              => array( $post ),
	'cat'                    => $settings->post_cat,
	'posts_per_page'         => $count,
	'order'                  => $settings->post_order,
	'orderby'                => $settings->order_by,
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post(); ?>
		
		<div class="brick">
		
			<div class="brick_header">
			
			<h<?php echo $settings->title_class; ?>>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Click to view: <?php the_title_attribute(); ?>">
					<?php the_title(); ?>
				</a>
			</h<?php echo $settings->title_class; ?>>
			
			</div>
			
			<div class="brick_featured_image">
			
				<?php if ( has_post_thumbnail() ) {
					 $size=75;
					 ?>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Click to view: <?php the_title_attribute(); ?>">
							<?php the_post_thumbnail( $size ); ?>
						</a>
					
				<?php } ?>
						
			</div>
			
			<?php the_excerpt(); ?>
			
			<div class="more-btn">
			
				<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="read_more_link">
					<?php echo $settings->read_more; ?>
				</a>
				
			</div>
            
        </div>
    
	<?php }
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata(); ?>

</div>
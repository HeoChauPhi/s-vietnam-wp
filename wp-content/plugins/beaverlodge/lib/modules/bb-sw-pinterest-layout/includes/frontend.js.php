<?php
$padding = $settings->side_padding * 2;
$columns = $settings->columns;
?>

(function($) {

	$(function() {
        
        conWidth = $( '#bl-masonry-<?php echo $id; ?>' ).width();
        colWidth = conWidth / <?php echo $columns; ?>;
        brickColWidth = conWidth - <?php echo $padding; ?>;
        brickWidth = brickColWidth / <?php echo $columns; ?>;
        $( '.brick' ).css( 'width', brickWidth );
        $( '#bl-masonry-<?php echo $id; ?>' ).masonry( { columnWidth: colWidth } );

	});

})(jQuery);